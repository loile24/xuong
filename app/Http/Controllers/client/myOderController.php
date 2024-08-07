<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Review;
use App\Models\ThongTin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class myOderController extends Controller
{

    public function list()
    {
        $thong_tin = ThongTin::all();

        $tai_khoan_id = Auth::id();
        $myOrders = Bill::where('tai_khoan_id', $tai_khoan_id)->orderByDesc('id')->get();

        return view('client.myOder', compact('myOrders', 'thong_tin'));
    }

    public function detailMyOder(string $id)
    {
        $thong_tin = ThongTin::all();

        $myOrder = Bill::where('id', $id)->first();

        if ($myOrder) {
            $san_pham_don_hang = json_decode($myOrder->cart, true);
        } else {
            dd('Đơn hàng không tồn tại');
        }
        return view('client.detailMyOder', compact('myOrder', 'san_pham_don_hang', 'thong_tin'));
    }

    public function review(string $id)
    {
        $thong_tin = ThongTin::all();

        // Kiểm tra xem đã có đánh giá nào cho đơn hàng từ người dùng hiện tại chưa
        $existingReview = Review::where('product_id', $id)
            ->where('user_id', Auth::id())
            ->first();

        // Nếu đã có đánh giá, không cho phép thêm mới
        if ($existingReview) {
            return redirect()->route('myOder.list')->with('error', 'Bạn đã đánh giá đơn hàng này rồi.');
        }

        //nếu chưa: thực hiện đánh giá
        $myOrder = Bill::where('id', $id)->first();
        return view('client.review', compact('thong_tin', 'myOrder'));
    }

    public function store(Request $request)
    {
        $data = [
            'product_id' => $request->product_id,
            'user_id' => Auth::id(),
            'rating' => $request->rating,
            'comment' => $request->comment
        ];

        Review::create($data);
        return redirect()->route('myOder.list')->with('success', 'Đánh giá đã được lưu.');
        ;
    }
}
