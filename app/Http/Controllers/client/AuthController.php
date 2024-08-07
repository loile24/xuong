<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'mat_khau' => 'required',
        ]);

        $taiKhoan = TaiKhoan::where('email', $request->email)->first();

        if ($taiKhoan && Hash::check($request->mat_khau, $taiKhoan->mat_khau)) {
            Auth::login($taiKhoan); // đăng nhập người dùng

            // Kiểm tra role người dùng
            if ($taiKhoan->chuc_vu_id === TaiKhoan::ROLE_ADMIN) {
                return redirect()->route('thongke.getThongKe');
            } else {
                return redirect()->route('home.index');
            }
        }

        return back()->withErrors(['email' => 'Thông tin đăng nhập không đúng.']);

    }

    public function showRegisterForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {


        $taiKhoan = new TaiKhoan([
            'ho_ten' => $request->ho_ten,
            'email' => $request->email,
            'mat_khau' => Hash::make($request->mat_khau),
            'ngay_sinh' => $request->ngay_sinh,
            'gioi_tinh' => $request->gioi_tinh,
            'so_dien_thoai' => $request->so_dien_thoai,
            'dia_chi' => $request->dia_chi
        ]);

        $taiKhoan->save();

        Auth::login($taiKhoan);

        return redirect()->intended('register')->with('success', 'Bạn đã đăng ký thành công!'); // Hoặc trang bạn muốn điều hướng sau khi đăng ký
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }


}
