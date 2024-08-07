<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use App\Models\SanPham;
use App\Models\ThongTin;
use Illuminate\Http\Request;

class listController extends Controller
{
   
    public function index(Request $request)
    {
        $danh_muc_id = $request->input('danh_muc_id'); 
        $SearchProduct = $request->input('SearchProduct');
    
        $query = SanPham::query();
    
        if ($danh_muc_id) {
            $query->where('danh_muc_id', $danh_muc_id);
        }
    
        if ($SearchProduct) {
            $query->where(function($q) use ($SearchProduct) {
                $q->where('name', 'like', "%{$SearchProduct}%")
                  ->orWhere('product_code', 'like', "%{$SearchProduct}%");
            });
        }
    
        $listProducts = $query->get();
    
        $thong_tin = ThongTin::all();
        $category = DanhMuc::all();
    
        return view('client.listProduct', compact('listProducts', 'thong_tin', 'category'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
