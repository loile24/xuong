<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class TaiKhoan extends Authenticatable
{
    use HasFactory;

    const ROLE_ADMIN = '1';
    const ROLE_USER = '0';
    
    protected $table = 'tai_khoans';
    protected $fillable = [
        'ho_ten',
        'ngay_sinh',
        'email',
        'so_dien_thoai',
        'gioi_tinh',
        'dia_chi',
        'mat_khau',
        'chuc_vu_id',
        'trang_thai',
    ];
    protected $hidden = [
        'mat_khau',
    ];

    public function get_all_tai_khoan(){
        $tai_khoan = DB::table('tai_khoans')->get();

        return $tai_khoan;
    }

    public function update_tai_khoan($data){
        DB::table('tai_khoans')
        ->where('id', $data['id'])
        ->update($data);

    }


    //Phương thức hasMany được sử dụng khi một model cha (parent) có nhiều model con (child). Ví dụ, một người dùng (User) có nhiều bình luận (BinhLuan).
    //quan hệ với bảng bình luận
    public function binh_luans()
    {
        return $this->hasMany(BinhLuan::class, 'tai_khoan_id');
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
