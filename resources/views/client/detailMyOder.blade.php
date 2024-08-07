@extends('layouts.client')

@section('content')
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Chi tiết đơn hàng<span></span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/myOder">MyOder</a></li>
                <li class="breadcrumb-item active" aria-current="page">Chi tiết đơn hàng</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <a href="/myOder" class="btn" style="background-color: #c96; color:white">Quay Lại Danh Sách Order</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>Tên Người Đặt</th>
                        <th>Email người đặt</th>
                        <th>Số điện thoại</th>
                        <th>Địa Chỉ</th>
                        <th>Ghi Chú</th>
                        <th>Ngày Đặt</th>
                        <th>Tổng Tiền</th>
                    </tr>
                </thead>

                <tbody>
                        <tr>
                            <td>{{ $myOrder->ten_nguoi_nhan }}</td>
                            <td>{{ $myOrder->email_nguoi_nhan }}</td>
                            <td>{{ $myOrder->sdt_nguoi_nhan }}</td>
                            <td>{{ $myOrder->dia_chi_nguoi_nhan }}</td>
                            <td>{{ $myOrder->ghi_chu }}</td>
                            <td>{{ \Carbon\Carbon::parse($myOrder->ngay_dat)->format('d/m/Y') }}</td>
                            <td>{{ number_format($myOrder->tong_tien, 0, ',', '.') }}đ</td>
                        </tr>

                </tbody>
            </table>    
            <h4>Sản Phẩm Đã Đặt :</h4>
            <table class="table">
                    <thead>
                        <th>Mã Sản Phẩm</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Hình Ảnh</th>
                        <th>Đơn Giá</th>
                        <th>Số Lượng</th>
                    </thead>
                    <tbody>
                        @foreach ($san_pham_don_hang as $item)
                            <tr>
                                <td>{{$item['product_code']}}</td>
                                <td>{{$item['name']}}</td>
                                <td><img src="{{Storage::url($item['image'])}}" alt="" width="100"></td>
                                <td>{{ number_format($item['price'], 0, ',', '.') }}đ</td>
                                <td>{{$item['so_luong']}}</td>
                            </tr>
                        @endforeach
                    </tbody>
            </table>

        </div><!-- End .container -->
    </div><!-- End .page-content -->
@endsection
