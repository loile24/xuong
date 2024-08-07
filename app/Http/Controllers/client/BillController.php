<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Mail\XacThucMail;
use App\Models\Bill;
use App\Models\ThongTin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class BillController extends Controller
{
    
    public $bill;
    public function __construct(){
        $this->bill = new Bill();
    }
    public function bill()
    {
        $thong_tin = ThongTin::all();
        $cart = session('cart');
        $user = Auth::user();
        $pttt = DB::table('phuong_thuc_thanh_toans');
        $totalAmount = 0;
        foreach ($cart as $item) {
            $totalAmount += $item['so_luong'] * ($item['price']);
        }
        return view('client.checkOut', compact('cart', 'user', 'totalAmount', 'pttt','thong_tin'));
    }

    public function billconfirm(Request $request)
    {
        $thong_tin = ThongTin::all();
        $user = Auth::user();
        $cart = session('cart');
        $cartJson = $request->input('cart');

        //chuyển dạng json thành dạng mảng
        //$cart1 = json_decode($cartJson, true);

        $ngayDatHang = Carbon::now()->format('Y-m-d H:i');

        $dataInsert = [
            'tai_khoan_id' => $user->id,
            'ten_nguoi_nhan' => $request->ten_nguoi_nhan,
            'email_nguoi_nhan' => $request->email_nguoi_nhan,
            'sdt_nguoi_nhan' => $request->sdt_nguoi_nhan,
            'dia_chi_nguoi_nhan' => $request->dia_chi_nguoi_nhan,
            'ngay_dat' => $ngayDatHang,
            'tong_tien' => $request->tong_tien,
            'ghi_chu' => $request->ghi_chu,
            'phuong_thuc_thanh_toan_id' => $request->pttt,
            'cart'=> $cartJson
        ];
         // Kiểm tra kết quả
        try {
            $this->bill->insert_bill($dataInsert);
                        
            // Tạo đối tượng Bill từ dữ liệu mảng
            $bill = new Bill($dataInsert);
            Mail::to($request->email_nguoi_nhan)->send(new XacThucMail($bill));

            // xóa giỏ hàng session()->forget();
            session()->forget('cart');
            
            return view('client.billConfirm', compact('thong_tin'))->with('success', 'Đặt hàng thành công!');
        } catch (\Exception $e) {
            //nếu lỗi
            return view('client.billConfirm')->with('error', 'Đặt hàng thất bại. Vui lòng thử lại.');
        }
        
    }
}
