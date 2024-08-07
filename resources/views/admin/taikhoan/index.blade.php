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
                     {{-- xóa thành công --}}
                     @if (session('deleteSuccess'))
                     <div class="alert alert-success">
                         {{ session('deleteSuccess') }}
                     </div>
                 @endif
                 {{-- Sửa trạng thái thành công --}}
                 @if (session('updateRoleSuccess'))
                 <div class="alert alert-success">
                     {{ session('updateRoleSuccess') }}
                 </div>
             @endif
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th width="10"><input type="checkbox" id="all"></th>
                                <th>Họ và tên</th>
                                <th>Ngày Sinh</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Giới tính</th>
                                <th>Địa Chỉ</th>
                                <th>Chức vụ</th>
                                <th>Trạng thái</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>

                          
                           @foreach ($tai_khoan as $item)
                            <tr>
                            <td width="10"><input type="checkbox" name="check1" value="1"></td>
                            <td>{{ $item->ho_ten }}</td>
                            <td>{{ $item->ngay_sinh }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->so_dien_thoai }}</td>
                            <td>{{ $item->gioi_tinh == 0 ? 'Nam' : 'Nữ' }}</td>

                            <td>{{ $item->dia_chi }}</td>
                            <td>
                                <div
                                    class="btn disabled {{ $item->chuc_vu_id == 0 ? 'btn-success' : 'btn-danger' }}">
                                    {{ $item->chuc_vu_id == 0 ? 'Member' : 'Admin' }}
                                </div>
                            </td>

                            <td>
                                <div
                                    class="btn disabled {{ $item->trang_thai == 0 ? 'btn-success' : 'btn-danger' }}">
                                    {{ $item->trang_thai == 0 ? 'Đang hoạt động' : 'Ngừng hoạt động' }}
                                </div>
                            </td>
                            
                            <td>
                                <form action="{{route('taikhoan.destroy', $item->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    {{-- <button class="btn btn-primary btn-sm trash" type="submit" onclick="return confirm('Bạn có chắc muốn xóa không?')"><i class="fas fa-trash-alt"></i> </button> --}}
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Bạn có chắc muốn xóa không?')"><i
                                            class="fas fa-trash-alt"></i></button>
                                </form>

                                <a href="{{route('taikhoan.edit', $item->id)}}"><button
                                        class="btn btn-warning btn-sm edit" type="button" title="Sửa"
                                        id="show-emp" data-toggle="modal" data-target="#ModalUP"><i
                                            class="fas fa-edit"></i></button>
                                </a>
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
