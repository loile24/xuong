<?php

namespace App\Http\Controllers;

use App\Models\TaiKhoan;
use Illuminate\Http\Request;

class TaiKhoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $tai_khoan;

    public function __construct(){
        $this->tai_khoan = new TaiKhoan();
    }
    public function index()
    {
        $tai_khoan = $this->tai_khoan->get_all_tai_khoan();
        return view('admin.taikhoan.index',compact('tai_khoan'));
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

        $tai_khoan = $this->tai_khoan->find($id);
        return view('admin.taikhoan.edit',compact('tai_khoan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tai_khoan = $this->tai_khoan->find($id);
        $dataUpdate = [
            'id'=>$id,
            'chuc_vu_id'=>$request->chuc_vu_id
        ];
        $tai_khoan->update_tai_khoan($dataUpdate);
        return redirect()->route('taikhoan.index')->with('updateRoleSuccess', 'Sửa trạng thái thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tai_khoan = $this->tai_khoan->find($id);
        $tai_khoan->delete();
        return redirect()->route('taikhoan.index')->with('deleteSuccess', 'Xóa thành công!');
    }
}
