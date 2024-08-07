<?php

namespace App\Http\Controllers;

use App\Models\ThongTin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ThongTinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $thong_tin = ThongTin::all();

        return view('admin.thongtin.index', compact('thong_tin'));
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

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $thong_tin = ThongTin::findOrFail($id);

        return view('admin.thongtin.edit', compact('thong_tin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $thong_tin = ThongTin::findOrFail($id);

        if ($request->hasFile('logo')) {
            if ($thong_tin->logo) {
                Storage::disk('public')->delete($thong_tin->logo);
            }
            $filename = $request->file('logo')->store('uploads/sanpham', 'public');
        } else {
            $filename = $thong_tin->logo;
        }
        $updateData = [
            'id' => $id,
            'sdt' => $request->sdt,
            'logo' => $filename,
        ];
        $thong_tin->update($updateData);
        return redirect()->route('thongtin.index')->with('update_success', 'Sửa thông tin thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
