
@extends('layouts.admin')


@section('content')
<div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item">Danh sách sản phẩm</li>
      <li class="breadcrumb-item"><a href="#">Sửa sản phẩm</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">Tạo mới sản phẩm</h3>
        <div class="tile-body">
          
          <form class="row" action="{{ route('sanpham.update', $san_pham->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group col-md-3">
              <label class="control-label">Mã sản phẩm </label>
              <input class="form-control" type="text" placeholder="" name="product_code"  value="{{$san_pham->product_code}}">
            </div>
            <div class="form-group col-md-3">
              <label class="control-label">Tên sản phẩm</label>
              <input class="form-control" type="text" name="name"  value="{{$san_pham->name}}">
            </div>

            <div class="form-group col-md-3">
                <label class="control-label">Tiêu đề sản phẩm</label>
                <input class="form-control" type="text" name="title"  value="{{$san_pham->title}}">
              </div>

              <div class="form-group col-md-3">
                <label class="control-label">Ngày đăng</label>
                <input class="form-control" type="date" name="date_add" value="{{$san_pham->date_add}}">
              </div>

            <div class="form-group col-md-3 ">
              <label for="exampleSelect1" class="control-label">Tình trạng</label>
              <select class="form-control" id="exampleSelect1" name="status">
                <option {{$san_pham->status == 1 ? 'selected' : ''}} value="1">Còn hàng</option>
                <option {{$san_pham->status == 0 ? 'selected' : ''}} value="0">Hết hàng</option>
              </select>
            </div>
            <div class="form-group col-md-3">
              <label for="exampleSelect1" class="control-label">Danh mục</label>
              <select class="form-control" id="exampleSelect1" name="danh_muc_id">
                <option>-- Chọn danh mục --</option>
                @foreach ($danh_mucs as $item)
                    <option {{$item->id == $san_pham->danh_muc_id ? 'selected' : ''}} value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
              </select>
            </div>
          
            <div class="form-group col-md-3">
              <label class="control-label">Giá bán</label>
              <input class="form-control" type="text" name="price" value="{{$san_pham->price}}">
            </div>
           
            <div class="form-group col-md-12">
              <label class="control-label">Ảnh sản phẩm</label>
              <div id="myfileupload">
                <img src="{{ Storage::url($san_pham->image) }}" alt="" width="100">
                <input type="file" id="uploadfile" onchange="readURL(this);"  name="image"/>
              </div>
              <div id="thumbbox">
                <img height="450" width="400" alt="Thumb image" id="thumbimage" style="display: none" />
                <a class="removeimg" href="javascript:"></a>
              </div>
              <div id="boxchoice">
                <a href="javascript:" class="Choicefile"><i class="fas fa-cloud-upload-alt"></i> Chọn ảnh</a>
                <p style="clear:both"></p>
              </div>

            </div>
            <div class="form-group col-md-12">
              <label class="control-label">Mô tả sản phẩm</label>
              <textarea class="form-control" name="description" id="mota">{{$san_pham->description}}</textarea>
              <script>CKEDITOR.replace('mota');</script>
            </div>

        </div>
        <button class="btn btn-save" type="submit">Lưu lại</button>
        <a class="btn btn-cancel" href="{{route('sanpham.index')}}">Hủy bỏ</a>
      </div>
      @endsection