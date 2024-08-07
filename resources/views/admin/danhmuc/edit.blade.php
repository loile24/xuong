
@extends('layouts.admin')


@section('content')
<div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item">Danh sách danh mục</li>
      <li class="breadcrumb-item"><a href="#">Sửa danh mục</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">Sửa danh mục</h3>
        <div class="tile-body">
          
          <form class="row" action="{{ route('danhmuc.update', $danh_muc->id) }}" method="POST">
            @csrf
        
            <div class="form-group col-md-3">
              <label class="control-label">Tên danh mục</label>
              <input class="form-control" type="text" name="name" value="{{$danh_muc->name}}">
            </div>

        
        </div>
        <button class="btn btn-save" type="submit">Lưu lại</button>
        <a class="btn btn-cancel" href="{{route('danhmuc.index')}}">Hủy bỏ</a>
      </div>
      @endsection