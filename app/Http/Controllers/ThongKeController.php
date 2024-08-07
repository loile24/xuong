<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\SanPham;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThongKeController extends Controller
{
    public function getThongKe()
    {
         // Các truy vấn thống kê
         $user_count = DB::table('tai_khoans')->count();
         $tong_tien_don_hang = DB::table('don_hangs')->sum('tong_tien');

         $tong_so_don_hang = DB::table('don_hangs')->count();
         $tong_so_san_pham = DB::table('san_phams')->count();

        //dd($tong_tien_don_hang,$tong_so_san_pham);
         return view('admin.dashboard', compact('user_count', 'tong_tien_don_hang', 'tong_so_don_hang','tong_so_san_pham'));
    }
}
