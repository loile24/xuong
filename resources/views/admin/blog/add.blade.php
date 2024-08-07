@extends('layouts.admin')


@section('content')
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">Danh sách blog</li>
            <li class="breadcrumb-item"><a href="#">Thêm bài viết</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Tạo Mới Bài Viết</h3>
                <div class="tile-body">

                    <form class="row" action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group col-md-3">
                            <label class="control-label">Tiêu đề</label>
                            <input class="form-control" type="text" name="title">
                        </div>

                        <input class="form-control" type="hidden" name="date">

                        <div class="form-group col-md-12">
                            <label class="control-label">Ảnh sản phẩm</label>
                            <div id="myfileupload">
                                <input type="file" id="uploadfile" onchange="readURL(this);" name="image" />
                            </div>
                            <div id="thumbbox">
                                <img height="450" width="400" alt="Thumb image" id="thumbimage"
                                    style="display: none" />
                                <a class="removeimg" href="javascript:"></a>
                            </div>
                            <div id="boxchoice">
                                <a href="javascript:" class="Choicefile"><i class="fas fa-cloud-upload-alt"></i> Chọn ảnh</a>
                                <p style="clear:both"></p>
                            </div>

                        </div>
                        <div class="form-group col-md-3">
                            <label class="control-label">Nội dung</label>
                            <textarea name="content" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                </div>
                <button class="btn btn-save" type="submit">Lưu lại</button>
                <a class="btn btn-cancel" href="{{ route('blogs.index') }}">Hủy bỏ</a>
            </div>
        @endsection
