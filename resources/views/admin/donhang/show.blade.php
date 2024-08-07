@extends('layouts.admin')

@section('content')
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="#"><b>Chi tiết đơn hàng</b></a></li>
        </ul>
        <div id="clock"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <a href="{{ route('donhang.index') }}" class="btn btn-warning">Danh Sách Đơn Hàng</a>

                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>Mã sản phẩm</th>
                                <th>Hình ảnh</th>
                                <th>Tên sản phẩm</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($san_pham_don_hang as $item)
                                <tr>
                                    <td>{{ $item['product_code'] }}</td>
                                    <td><img src="{{ Storage::url($item['image']) }}" alt="" width="100"></td>
                                    <td>{{ $item['name'] }}</td>
                                </tr>
                            @endforeach


                        </tbody>
                 
                        <tr>
                            <th>Tên Người Nhận</th>
                            <th>Số Điện Thoại</th>
                            <th>Địa Chỉ</th>
                            <th>Tổng Tiền</th>
                            <th>Ngày đặt</th>
                            <th>Ghi Chú</th>
                        </tr>
                        <tr>
                            <td>{{ $don_hang->ten_nguoi_nhan }}</td>
                            <td>{{ $don_hang->sdt_nguoi_nhan }}</td>
                            <td>{{ $don_hang->dia_chi_nguoi_nhan }}</td>
                            <td>{{ number_format($don_hang->tong_tien, 0, ',', '.') }}đ</td>
                            <td>{{ $don_hang->ngay_dat }}</td>
                            <td>{{ $don_hang->ghi_chu }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
