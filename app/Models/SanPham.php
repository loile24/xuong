<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SanPham extends Model
{
    use HasFactory;

    //get product admin
    public function get_all(){
        $products = DB::table('san_phams')
        ->join('danh_mucs', 'san_phams.danh_muc_id', '=', 'danh_mucs.id')
        ->select('san_phams.*', 'danh_mucs.name')
        ->orderBy('san_phams.id','DESC')
        ->get();

        return $products;
    }

    public function insert_product($data){
        DB::table('san_phams')->insert($data);
    }

    public function update_product($data){
        DB::table('san_phams')
        ->where('id', $data['id'])
        ->update($data);
    }
    //end admin

    protected $table = 'san_phams';
    protected $fillable = [
        'product_code',
        'title',
        'name',
        'image',
        'price',
        'date_add',
        'description',
        'status',
        'danh_muc_id '
    ];
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
