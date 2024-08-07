<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('don_hangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tai_khoan_id');
            $table->string('ten_nguoi_nhan');
            $table->string('email_nguoi_nhan');
            $table->string('sdt_nguoi_nhan');
            $table->string('dia_chi_nguoi_nhan');
            $table->date('ngay_dat');
            $table->string('tong_tien');
            $table->string('ghi_chu')->nullable();
            $table->unsignedBigInteger('phuong_thuc_thanh_toan_id');
            $table->boolean('trang_thai')->default(0);
            $table->json('cart');
              //tạo khóa ngoại tài khoản
              $table->foreign('tai_khoan_id')->references('id')->on('tai_khoans')->onDelete('cascade');

              //tạo khóa ngoại phương thức thanhh toán
              $table->foreign('phuong_thuc_thanh_toan_id')->references('id')->on('phuong_thuc_thanh_toans')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('don_hangs');
    }
};
