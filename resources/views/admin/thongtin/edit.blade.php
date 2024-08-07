@extends('layouts.admin')


@section('content')
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"></li>
            <li class="breadcrumb-item"><a href="#">Sửa thông tin</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Tạo mới sản phẩm</h3>
                <div class="tile-body">

                    <form class="row" action="{{ route('thongtin.update', $thong_tin->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf


                        <div class="form-group col-md-3">
                            <label class="control-label">Số điện thoại</label>
                            <input class="form-control" type="text" name="sdt" value="{{ $thong_tin->sdt }}">
                        </div>

                        <div class="form-group col-md-12">
                            <label class="control-label">Ảnh sản phẩm</label>
                            <div id="myfileupload">
                                <img src="{{ Storage::url($thong_tin->logo) }}" alt="" width="100">
                                <input type="file" id="uploadfile" onchange="readURL(this);" name="logo" />
                            </div>
                            <div id="thumbbox">
                                <img height="450" width="400" alt="Thumb image" id="thumbimage"
                                    style="display: none" />
                                <a class="removeimg" href="javascript:"></a>
                            </div>
                            <div id="boxchoice">
                                <a href="javascript:" class="Choicefile"><i class="fas fa-cloud-upload-alt"></i> Chọn
                                    ảnh</a>
                                <p style="clear:both"></p>
                            </div>

                        </div>
                   

                </div>
                <button class="btn btn-save" type="submit">Lưu lại</button>
                <a class="btn btn-cancel" href="{{ route('thongtin.index') }}">Hủy bỏ</a>
            </div>
        @endsection
