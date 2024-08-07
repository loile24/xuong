<?php

namespace App\Http\Controllers;

use App\Models\BinhLuan;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $san_phams;
    public function __construct(){
        $this->san_phams = new SanPham();
    }
    public function index()
    {
        $listSanPham = $this->san_phams->get_all();
        // dd($listSanPham);
        return view('admin.sanpham.index',compact('listSanPham'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $danh_mucs = DB::table('danh_mucs')->get();

        return view('admin.sanpham.add',compact('danh_mucs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->hasFile('image')){
            //nếu có đẩy hình ảnh
            $filename = $request->file('image')->store('uploads/sanpham', 'public'); //store:  tự động render chuỗi thay thế vào tên fileS
        } else {
            $filename = null;
        }
        $dataInsert = [
            'image'=> $filename,
            'product_code'=> $request->product_code,
            'title'=> $request->title,
            'name'=> $request->name,
            'price'=> $request->price,
            'date_add'=> $request->date_add,
            'description'=> $request->description,
            'status'=> $request->status,
            'danh_muc_id'=>$request->danh_muc_id,
        ];
       
        
        $this->san_phams->insert_product($dataInsert);
        return redirect()->route('sanpham.index')->with('success','Thêm sản phẩm thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $san_pham = SanPham::find($id);

        $binh_luan_product_id = BinhLuan::where('san_pham_id', $san_pham->id)
        ->orderByDesc('id')
        ->get();

        return view('admin.sanpham.show',compact('san_pham','binh_luan_product_id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $danh_mucs = DB::table('danh_mucs')->get();

        $san_pham = $this->san_phams->find($id);

        if(!$san_pham){
            return redirect()->route('sanpham.index');
        }
        return view('admin.sanpham.edit',compact('danh_mucs', 'san_pham'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // Sử lý logic update
         $san_pham = $this->san_phams->find($id);

         //xử lý nếu có ảnh mới được upload
        if($request->hasFile('image')){
            //nếu có ảnh cũ thì xóa 
            if($san_pham->hinh_anh){
                Storage::disk('public')->delete($san_pham->image);
            }

            //lưu ảnh mới
            $fileName = $request->file('image')->store('uploads/sanpham', 'public'); 
        } else {
            $fileName = $san_pham->image;
        }
        $dataUpdate = [
            'id'=>$id,
            'image'=> $fileName,
            'product_code'=> $request->product_code,
            'title'=> $request->title,
            'name'=> $request->name,
            'price'=> $request->price,
            'date_add'=> $request->date_add,
            'description'=> $request->description,
            'status'=> $request->status,
            'danh_muc_id'=>$request->danh_muc_id,
        ];
        $san_pham->update_product($dataUpdate); 
        return redirect()->route('sanpham.index')->with('update_success','Sửa sản phẩm thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         //xóa sản phẩm
         $san_pham = $this->san_phams->find($id);
         if(!$san_pham){
            return redirect()->route('sanpham.index');
        }
        if($san_pham->image){
            Storage::disk('public')->delete($san_pham->image);
        }
        $san_pham->delete();
        return redirect()->route('sanpham.index');

    }
    public function deleteBinhLuan(string $id)
    {
        $binhLuan = BinhLuan::find($id);
        
        if ($binhLuan) {
            $sanPhamId = $binhLuan->san_pham_id;
            $binhLuan->delete();

            return redirect()->route('sanpham.show', ['sanpham' => $sanPhamId]);
        }

        return redirect()->back()->with('error', 'Bình luận không tồn tại.');
    }
}
