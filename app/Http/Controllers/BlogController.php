<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\ThongTin;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getBlogs(){
        $thong_tin = ThongTin::all();

        $blogs = Blog::orderByDesc('id')->get();
        return view('client.blog',compact('blogs','thong_tin'));
    }

    public function index()
    {
        $thong_tin = ThongTin::all();

        $blogs = Blog::orderByDesc('id')->get();
        return view('admin.blog.index',compact('blogs','thong_tin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('admin.blog.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        if($request->hasFile('image')){
            $filename = $request->file('image')->store('uploads/baiviet', 'public');
        } else {
            $filename = null;
        }
        $ngaydang = Carbon::now()->format('Y-m-d H:i');

        $data = [
            'title' => $request->title,
            'date' => $ngaydang,
            'image' => $filename,
            'content' => $request->content,
        ];
        Blog::create($data);
        return redirect()->route('blogs.index')->with('success','Thêm bài viết thành công!');
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
        $blog = Blog::find($id);
        
        return view('admin.blog.edit', compact('blog'));
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
        $blog = Blog::find($id);

        $blog->delete();
        return redirect()->route('blogs.index');
    }
}
