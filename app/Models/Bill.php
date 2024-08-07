<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Bill extends Model
{
    use HasFactory;
    protected $table='don_hangs';

    protected $fillable = [
        'tai_khoan_id',
        'ten_nguoi_nhan',
        'email_nguoi_nhan',
        'sdt_nguoi_nhan',
        'dia_chi_nguoi_nhan',
        'ngay_dat',
        'tong_tien',
        'ghi_chu',
        'phuong_thuc_thanh_toan_id',
        'trang_thai',
        'cart'
    ];


    public function insert_bill($data){
        DB::table('don_hangs')->insert($data);
    }

    public function sua_trang_thai($data){
        DB::table('don_hangs')
        ->where('id', $data['id'])
        ->update($data);
    }
}
