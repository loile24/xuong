<?php

use App\Http\Controllers\BinhLuanController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\client\AuthController;
use App\Http\Controllers\client\BillController;
use App\Http\Controllers\client\CartController;
use App\Http\Controllers\client\CategoryController;
use App\Http\Controllers\client\ContactController;
use App\Http\Controllers\client\homeController;
use App\Http\Controllers\client\listController;
use App\Http\Controllers\client\MyOderController;
use App\Http\Controllers\client\ThongTinClientController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\TaiKhoanController;
use App\Http\Controllers\ThongKeController;
use App\Http\Controllers\ThongTinController;
use App\Models\ThongTin;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//ADMIN
Route::middleware('auth.admin')->group(function () {
    // Route::get('/admin', function () {
    //     return view('admin.dashboard');
    // });
    Route::resource('admin/danhmuc', DanhMucController::class);
    Route::resource('admin/sanpham', SanPhamController::class);
    Route::resource('admin/taikhoan', TaiKhoanController::class);
    Route::resource('admin/donhang', DonHangController::class);

    //xem đánh giá
    Route::get('admin/donhang/{id}/danhgia', [DonHangController::class, 'xemDanhgia'])->name('donhang.xemDanhgia');
    //Xóa bình luận
    Route::delete('admin/binhluan/{id}', [SanPhamController::class, 'deleteBinhLuan'])->name('binhluan.deleteBinhLuan');

    //Thống kê
    Route::get('admin/thongke/', [ThongKeController::class, 'getThongKe'])->name('thongke.getThongKe');

    //thông tin website
    Route::resource('admin/thongtin', ThongTinController::class);

});


//client
Route::get('/' ,[homeController::class, 'index'])->name('index');

//contact
Route::resource('contact', ContactController::class);
// sử dụng auth của laravel để chặn khi chưa đăng nhập
Route::middleware('auth')->group(function () {
    Route::resource('/home', HomeController::class);
    Route::resource('/list', ListController::class);
   
    //myOder
    Route::get('myOder',[MyOderController::class, 'list'])->name('myOder.list');
    Route::get('myOder/detailMyOder/{id}',[MyOderController::class, 'detailMyOder'])->name('myOder.detailMyOder');

    //GIỎ HÀNG
    Route::get('cart/list', [CartController::class, 'list'])->name('cart.list');
    Route::post('cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('cart/remove', [CartController::class, 'remove'])->name('cart.remove');

    //Đơn hàng
    Route::get('bill', [BillController::class, 'bill'])->name('bill');
    Route::post('bill/billconfirm',[BillController::class, 'billconfirm'])->name('billconfirm');

    //Đánh Giá
    Route::get('/products/{id}/reviews', [MyOderController::class, 'review'])->name('products.reviews');
    Route::post('/products/reviews', [MyOderController::class, 'store'])->name('products.reviews.store');

    //blog
    Route::resource('blogs', BlogController::class);

});



//Hieenr thi form ddawng nhập
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
// Xử lý đăng nhập
Route::post('login', [AuthController::class, 'login']);

// Hiển thị form đăng ký
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');

// Xử lý đăng ký
Route::post('register', [AuthController::class, 'register']);

// Xử lý đăng xuất
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

//blogs
Route::get('getBlogs',[BlogController::class,'getBlogs'])->name('getBlogs');

Route::get('/test', function () {
    $thong_tin = ThongTin::all();
    return view('client.blog',compact('thong_tin'));
});