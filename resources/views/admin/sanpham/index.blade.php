@extends('layouts.admin')


@section('content')
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="#"><b>Danh sách sản phẩm</b></a></li>
        </ul>
        <div id="clock"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="row element-button">
                        <div class="col-sm-2">

                            <a class="btn btn-add btn-sm" href="{{ route('sanpham.create') }}" title="Thêm"><i
                                    class="fas fa-plus"></i>
                                Tạo mới sản phẩm</a>
                        </div>
                        {{--
                    <div class="col-sm-2">
                      <a class="btn btn-delete btn-sm nhap-tu-file" type="button" title="Nhập" onclick="myFunction(this)"><i
                          class="fas fa-file-upload"></i> Tải từ file</a>
                    </div>
      
                    <div class="col-sm-2">
                      <a class="btn btn-delete btn-sm print-file" type="button" title="In" onclick="myApp.printTable()"><i
                          class="fas fa-print"></i> In dữ liệu</a>
                    </div>
                    <div class="col-sm-2">
                      <a class="btn btn-delete btn-sm print-file js-textareacopybtn" type="button" title="Sao chép"><i
                          class="fas fa-copy"></i> Sao chép</a>
                    </div>
      
                    <div class="col-sm-2">
                      <a class="btn btn-excel btn-sm" href="" title="In"><i class="fas fa-file-excel"></i> Xuất Excel</a>
                    </div>
                    <div class="col-sm-2">
                      <a class="btn btn-delete btn-sm pdf-file" type="button" title="In" onclick="myFunction(this)"><i
                          class="fas fa-file-pdf"></i> Xuất PDF</a>
                    </div> 
                        <div class="col-sm-2">
                            <a class="btn btn-delete btn-sm" type="button" title="Xóa" onclick="myFunction(this)"><i
                                    class="fas fa-trash-alt"></i> Xóa tất cả </a>
                        </div> --}}
                    </div>
                    {{-- Thêm thành công --}}
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Sửa thành công --}}
                    @if (session('update_success'))
                        <div class="alert alert-success">
                            {{ session('update_success') }}
                        </div>
                    @endif
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th width="10"><input type="checkbox" id="all"></th>
                                <th>Mã sản phẩm</th>
                                <th>Tiêu đề</th>
                                <th>Tên sản phẩm</th>
                                <th>Ảnh</th>
                                <th>Giá tiền</th>
                                <th>Ngày Đăng Sản Phẩm</th>
                                <th>Tình trạng</th>
                                <th>Danh mục</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listSanPham as $item)
                                <tr>
                                    <td width="10"><input type="checkbox" name="check1" value="1"></td>
                                    <td>{{ $item->product_code }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <img src="{{ Storage::url($item->image) }}" width="110" height="110">
                                    </td>
                                    <td>{{ number_format($item->price, 0, ',', '.') }}đ</td>
                                    <td>{{ $item->date_add }}</td>
                                    <td>
                                        <div
                                            class="btn disabled {{ $item->status == 1 ? 'btn-success' : 'btn-danger' }}">
                                            {{ $item->status == 1 ? 'Còn hàng' : 'Hết hàng' }}
                                        </div>
                                    </td>
                                    <td>{{ $item->name }}</td>

                                    <td>
                                        <form action="{{ route('sanpham.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            {{-- <button class="btn btn-primary btn-sm trash" type="submit" onclick="return confirm('Bạn có chắc muốn xóa không?')"><i class="fas fa-trash-alt"></i> </button> --}}
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Bạn có chắc muốn xóa không?')"><i
                                                    class="fas fa-trash-alt"></i></button>
                                        </form>

                                        <a href="{{ route('sanpham.edit', $item->id) }}"><button
                                                class="btn btn-warning btn-sm edit" type="button" title="Sửa"
                                                id="show-emp" data-toggle="modal" data-target="#ModalUP"><i
                                                    class="fas fa-edit"></i></button>
                                        </a>
                                        <a href="{{route('sanpham.show',$item->id)}}" class="btn btn-info">Chi tiết sản phẩm</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
