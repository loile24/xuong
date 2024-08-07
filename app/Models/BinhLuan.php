<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    use HasFactory;

    protected $table = 'binh_luans';

    protected $fillable = [
        'san_pham_id',
        'tai_khoan_id',
        'noi_dung',
        'ngay_dang',
    ];


    //Phương thức belongsTo được sử dụng khi một model con (child) thuộc về một model cha (parent). Ví dụ, một bình luận (BinhLuan) thuộc về một người dùng (User).
    //liên kết quan hệ với bảng tài khoản
    public function tai_khoans()
    {
        return $this->belongsTo(TaiKhoan::class, 'tai_khoan_id');
    }
}
