
@extends('layouts.admin')


@section('content')
<div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item">Danh sách tài khoản</li>
      <li class="breadcrumb-item"><a href="#">Sửa quyền</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">Thay đổi chức vụ</h3>
        <div class="tile-body">
          
          <form class="row" action="{{ route('taikhoan.update', $tai_khoan->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group col-md-3">
              <label class="control-label">Chức vụ</label>
              <select class="form-control" name="chuc_vu_id" id="control-label">
                <option  {{$tai_khoan->chuc_vu_id == 0 ? 'selected' : ''}} value="0">Member</option>
                <option  {{$tai_khoan->chuc_vu_id == 1 ? 'selected' : ''}} value="1">Admin</option>
              </select>
            </div>

        </div>
        <button class="btn btn-save" type="submit">Lưu lại</button>
        <a class="btn btn-cancel" href="{{route('taikhoan.index')}}">Hủy bỏ</a>
      </div>
      @endsection