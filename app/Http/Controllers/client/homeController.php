<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\BinhLuan;
use App\Models\SanPham;
use App\Models\ThongTin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_sp_home = SanPham::limit(8)->orderByDesc('id')->get();

        $thong_tin = ThongTin::all();
        return view('client.home',compact('list_sp_home','thong_tin'));
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
        $thong_tin = ThongTin::all();

        $san_pham = SanPham::find($id);

        // Tìm các sản phẩm tương tự, không lặp sản phẩmhienj tại
        $similarProducts = SanPham::where('danh_muc_id', $san_pham->danh_muc_id)
            ->where('id', '!=', $san_pham->id)
            ->limit(5)
            ->get();

        $binh_luan_product_id = BinhLuan::where('san_pham_id', $san_pham->id)
        ->orderByDesc('id')
        ->with('tai_khoans') // Eager load user thông tin
        ->get();
        return view('client.detailProduct',compact('san_pham','similarProducts','binh_luan_product_id','thong_tin'));
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
        $thong_tin = ThongTin::all();

        $san_pham = SanPham::find($id);

        if (!$san_pham) {
            return redirect()->back()->withErrors(['error' => 'Sản phẩm không tồn tại.']);
        }

        $ngayBinhLuan = Carbon::now()->format('Y-m-d H:i');

        // Thêm bình luận mới nếu người dùng đã đăng nhập và sản phẩm tồn tại
        if (Auth::check()) {
            $validated = $request->validate([
                'binhluan' => 'required|string|max:255',
            ]);
            $insertData = [
                'san_pham_id' => $san_pham->id,
                'tai_khoan_id' => Auth::id(),
                'noi_dung' => $validated['binhluan'],
                'ngay_dang' => $ngayBinhLuan,
            ];

            BinhLuan::create($insertData);
        }

        // Redirect tới trang chi tiết sản phẩm để tránh duplicate bình luận
        return redirect()->route('home.show', $san_pham->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
