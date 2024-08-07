@extends('layouts.admin')

@section('content')
   
<div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">Danh sách</li>
        <li class="breadcrumb-item"><a href="#">Sửa trạng thái</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Sửa danh mục</h3>
            <div class="tile-body">
                <form class="row" action="{{ route('donhang.update', $don_hang_id->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group col-md-3">
                        <label class="control-label">Trạng Thái Đơn Hàng</label>
                        <select name="trang_thai" id="" class="form-control">
                            <option {{$don_hang_id->trang_thai == 0 ? 'selected' : ''}} value="0">Chưa Xác Nhận</option>
                            <option {{$don_hang_id->trang_thai == 1 ? 'selected' : ''}} value="1">Đang Giao Hàng</option>
                            <option {{$don_hang_id->trang_thai == 2 ? 'selected' : ''}} value="2">Hoàn Tất</option>
                        </select>
                    </div>
            </div>

                <div class="tile-footer">
                    <button class="btn btn-save" type="submit">Lưu lại</button>
                    <a class="btn btn-cancel" href="{{route('donhang.index')}}">Hủy bỏ</a>
                </div>
                </form>
           
        </div>
    </div>
</div>

@endsection
