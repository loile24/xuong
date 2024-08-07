<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonHangController extends Controller
{
    public $don_hang;
    public function __construct(){
        $this->don_hang = new Bill();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $don_hang = DB::table('don_hangs')->orderBy('don_hangs.id','DESC')->get();

        return view('admin.donhang.index',compact('don_hang'));
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
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $don_hang = $this->don_hang->find($id);
        $san_pham_don_hang = json_decode($don_hang->cart, true);

        return view('admin.donhang.show',compact('san_pham_don_hang','don_hang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $don_hang_id = $this->don_hang->find($id);

        return view('admin.donhang.edit',compact('don_hang_id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $don_hang_id = $this->don_hang->find($id);

        $dataUpdate = [
            'id'=>$id,
            'trang_thai'=>$request->trang_thai
        ];

        $don_hang_id->sua_trang_thai($dataUpdate);
        return redirect()->route('donhang.index')->with('success','Sửa trạng thái thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function xemDanhgia(string $id){
        $review = Review::where('product_id', $id)->get();
        return view('admin.donhang.review',compact('review'));
    }
}
