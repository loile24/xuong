@extends('layouts.client')

@section('content')
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Checkout<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="checkout">
            <div class="container">
                <div class="checkout-discount">
                    <form action="#">
                        <input type="text" class="form-control" required id="checkout-discount-input">
                        <label for="checkout-discount-input" class="text-truncate">Have a coupon? <span>Click here to enter
                                your code</span></label>
                    </form>
                </div><!-- End .checkout-discount -->
                <form action="{{ route('billconfirm') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-9">
                            <h2 class="checkout-title">Chi tiết thanh toán</h2><!-- End .checkout-title -->
                            <input type="hidden" class="form-control" name="cart" value='{{ json_encode($cart) }}'>
                            <input type="hidden" class="form-control" name="tong_tien" value='{{ $totalAmount }}'>


                            <label>Tên khách hàng *</label>
                            <input type="text" class="form-control" value='{{ $user->ho_ten }}' name="ten_nguoi_nhan">

                            <label>Số điện thoại *</label>
                            <input type="text" class="form-control" value='{{ $user->so_dien_thoai }}'
                                name="sdt_nguoi_nhan">

                            <label>Địa Chỉ Nhận Hàng *</label>
                            <input type="text" class="form-control" value='{{ $user->dia_chi }}'
                                name="dia_chi_nguoi_nhan">



                            <label>Email address *</label>
                            <input type="email" class="form-control" value='{{ $user->email }}' name="email_nguoi_nhan">

                            <label>Ghi chú về đơn hàng (tùy chọn)</label>
                            <textarea class="form-control" cols="30" rows="4" placeholder="Ghi chú về đơn hàng của bạn..." name="ghi_chu"></textarea>
                        </div><!-- End .col-lg-9 -->
                        <aside class="col-lg-3">
                            <div class="summary">
                                <h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

                                <table class="table table-summary">
                                    <thead>
                                        <tr>
                                            <th>Sản Phẩm</th>
                                            <th>Đơn Giá</th>
                                            <th>Số Lượng</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($cart as $item)
                                            <tr>
                                                <td><a href="#">{{ $item['name'] }}</a></td>
                                                <td>{{ number_format($item['price'], 0, ',', '.') }} VNĐ</td>
                                                <td>{{ $item['so_luong'] }}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td>Shipping:</td>
                                            <td>Free shipping</td>
                                        </tr>
                                        <tr class="summary-total">
                                            <td>Total:</td>
                                            <td>{{ number_format($totalAmount, 0, ',', '.') }}VNĐ</td>
                                        </tr><!-- End .summary-total -->
                                    </tbody>
                                </table><!-- End .table table-summary -->

                                <div class="accordion-summary" id="accordion-payment">
                                    <div class="card">
                                        <div class="card-header" id="heading-1">
                                            <h2 class="card-title">
                                                <input  id="pttt" class="card-title" type="radio" name="pttt" value='1'>
                                                <label for="pttt"> Thanh toán khi giao hàng</label>

                                            </h2>
                                        </div><!-- End .card-header -->

                                    </div><!-- End .card -->

                                    <div class="card">
                                        <div class="card-header" id="heading-4">
                                            <h2 class="card-title">
                                                <input id="pttt1" class="card-title" type="radio" name="pttt" value='2'>
                                                <label for="pttt1"> Thanh toán online</label>
                                            </h2>
                                        </div><!-- End .card-header -->

                                    </div><!-- End .card -->
                                </div><!-- End .accordion -->

                                <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                    <span class="btn-text">Place Order</span>
                                    <span class="btn-hover-text">Proceed to Checkout</span>
                                </button>
                            </div><!-- End .summary -->
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </form>
            </div><!-- End .container -->
        </div><!-- End .checkout -->
    </div><!-- End .page-content -->
@endsection
