<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThongTin extends Model
{
    use HasFactory;

    protected $table = 'thong_tin_web';

    protected $fillable =[
        'sdt',
        'logo',
    ];
}
