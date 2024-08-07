<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\SanPham;
use App\Models\ThongTin;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function list()
    {
        $thong_tin = ThongTin::all();
        $cart = session('cart');

        if ($cart) {
            // Nếu giỏ hàng tồn tại, tính tổng số tiền
            $totalAmount = 0; // Khởi tạo biến tổng số tiền
            foreach ($cart as $item) {
                $totalAmount += $item['so_luong'] * $item['price'];
            }
        } else {
            // Nếu không có giỏ hàng, gán $cart bằng null và tổng số tiền là 0
            $cart = null;
            $totalAmount = 0;
        }
        return view('client.cartList', compact('totalAmount','thong_tin'));
    }

    public function add()
    {
        $product = SanPham::query()->findOrFail(\request('san_pham_id'));

        if (!isset(session('cart')[$product->id])) {
            $data = $product->toArray()
                + ['so_luong' => \request('so_luong')];

            session()->put('cart.' . $product->id, $data);
        } else {
            $data = session('cart')[$product->id];
            $data['so_luong']+=request('so_luong');

            session()->put('cart.' . $product->id, $data);
        }

        return redirect()->route('cart.list');
    }

    public function remove(Request $request)
    {   
        $productId = $request->input('san_pham_id');
        // dd($productId);
        $cart = session('cart', []);

        // Nếu sản phẩm tồn tại trong giỏ hàng, xóa nó
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            // Cập nhật lại giỏ hàng trong session
            session()->put('cart', $cart);
        }

        // Chuyển hướng về trang danh sách giỏ hàng
        return redirect()->route('cart.list');
    }
}
