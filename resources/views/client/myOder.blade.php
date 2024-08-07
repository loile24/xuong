@extends('layouts.client')

@section('content')
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">My Oder<span></span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">myOder</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            {{-- error --}}
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th>Tên Người Đặt</th>
                        <th>Phương Thức Thanh Toán</th>
                        <th>Ngày Đặt</th>
                        <th>Tổng Tiền</th>
                        <th>Trạng Thái</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($myOrders as $item)
                        <tr>
                            <th>{{ $item->ten_nguoi_nhan }}</th>
                            <th>{{ $item->phuong_thuc_thanh_toan_id == 1 ? 'Thanh toán khi nhận hàng' : 'Thanh Toán Online' }}
                            </th>
                            <th>{{ \Carbon\Carbon::parse($item->ngay_dat)->format('d/m/Y') }}</th>
                            <th>{{ number_format($item->tong_tien, 0, ',', '.') }}đ</th>
                            <th
                                class="{{ $item->trang_thai == 0 ? 'text-danger' : ($item->trang_thai == 1 ? 'text-warning' : ($item->trang_thai == 2 ? 'text-success' : '')) }}">
                                @if ($item->trang_thai == 0)
                                    {{ 'Chưa xác nhận' }}
                                @elseif($item->trang_thai == 1)
                                    {{ 'Đang giao hàng' }}
                                @elseif($item->trang_thai == 2)
                                    {{ 'Hoàn Tất' }}
                                @endif
                            </th>
                            <th>
                                <a href="{{ route('myOder.detailMyOder', $item->id) }}" class="btn"
                                    style="background-color: #c96; color:white">Chi tiết đơn hàng</a>

                                @if ($item->trang_thai == 2)
                                    <a href="{{ route('products.reviews', $item->id) }}" class="btn"
                                        style="background-color: #c96; color:white">Đánh giá</a>
                                @endif
                            </th>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div><!-- End .container -->
    </div><!-- End .page-content -->
@endsection
