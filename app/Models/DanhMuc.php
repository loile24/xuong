<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DanhMuc extends Model
{
    use HasFactory;
    protected $table = 'danh_mucs';

    protected $fillable = [
        'name'
    ];

    public function get_all_dm(){
        $danh_muc = DB::table('danh_mucs')
        ->orderBy('danh_mucs.id', 'DESC')
        ->get();
        ;
        return $danh_muc;
    }
    public function insert_dm($data){
        DB::table('danh_mucs')
        ->insert($data);
    }

    public function update_dm($data){
        DB::table('danh_mucs')
        ->where('id', $data['id'])
        ->update($data);
    }
    
}
