<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use Illuminate\Http\Request;

class DanhMucController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $danh_muc;
    public function __construct(){
        $this->danh_muc = new DanhMuc();
    }
    public function index()
    {
        // 
        $danh_mucs = $this->danh_muc->get_all_dm();

        return view('admin.danhmuc.index', compact('danh_mucs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('admin.danhmuc.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $insertData = [
            'name'=>$request->name
        ];

        $this->danh_muc->insert_dm($insertData);
        return redirect()->route('danhmuc.index')->with('add_success', 'Thêm danh mục thành công');
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
       $danh_muc = $this->danh_muc->find($id);

       return view('admin.danhmuc.edit',compact('danh_muc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        
        $updateData = [
            'id'=>$id,
            'name'=>$request->name
        ];

        $this->danh_muc->update_dm($updateData);
        return redirect()->route('danhmuc.index')->with('edit_success', 'Sửa danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $danh_muc = $this->danh_muc->find($id);

        $danh_muc->delete();
        return redirect()->route('danhmuc.index')->with('delete_success', 'Xóa danh mục thành công');

    }
}
