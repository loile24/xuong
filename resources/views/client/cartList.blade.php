@extends('layouts.client')

@section('content')
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Shopping Cart<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="cart">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <table class="table table-cart table-mobile">
                            @if (session('cart'))
                            <thead>
                                <tr>
                                    <th>Sản Phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>     
                                    
                                @if (session()->has('cart'))
                                    @foreach (session('cart') as $item) 
                                 
                                        <tr>
                                            <td class="product-col">
                                                <div class="product">
                                                    <figure class="product-media">
                                                        <a href="#">
                                                            <img src="{{ Storage::url($item['image']) }}"
                                                                alt="Product image">
                                                        </a>
                                                    </figure>

                                                    <h3 class="product-title">
                                                        <a href="#">{{ $item['name'] }}</a>
                                                    </h3><!-- End .product-title -->
                                                </div><!-- End .product -->
                                            </td>
                                            <td class="price-col">{{ number_format($item['price']) }} VND</td>
                                            <td class="quantity-col">
                                                <div class="cart-product-quantity">
                                                    <input type="number" name="so_luong" id="qty" class="form-control" value="{{$item['so_luong']}}" min="1" max="100" step="1" required>
                                                </div><!-- End .cart-product-quantity -->
                                            </td>
                                            <td class="total-col">{{ number_format($item['so_luong']*$item['price'])}}đ</td>

                                            <td class="remove-col">
                                                <!-- Form xóa sản phẩm -->
                                                <form action="{{ route('cart.remove') }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    <input type="hidden" name="san_pham_id" value="{{$item['id']}}">
                                                    <button class="btn-remove" type="submit"><i class="icon-close"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <button type="submit" class="btn btn-outline-dark-2">UPDATE CART<i class="icon-refresh"></i></button>
                                    @endif
                                @else
                                    <p>Không Có Sản Phẩm Nào Trong Giỏ Hàng Của Bạn</p>
                                @endif

                            </tbody>
                        </table><!-- End .table table-wishlist -->

                        <div class="cart-bottom">
                            <div class="cart-discount">
                               
                            </div><!-- End .cart-discount -->
                        </div><!-- End .cart-bottom -->
                    </div><!-- End .col-lg-9 -->
                    <aside class="col-lg-3">
                        <div class="summary summary-cart">
                            <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

                            <table class="table table-summary">
                                <tbody>
                                    <tr class="summary-subtotal">
                                        <td>Subtotal:</td>
                                        <td>{{ number_format($totalAmount) }}VND</td>
                                    </tr><!-- End .summary-subtotal -->
                                    <tr class="summary-shipping">
                                        <td>Shipping:</td>
                                        <td>&nbsp;</td>
                                    </tr>

                                    <tr class="summary-shipping-row">
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="free-shipping" name="shipping"
                                                    class="custom-control-input">
                                                <label class="custom-control-label" for="free-shipping">Free
                                                    Shipping</label>
                                            </div><!-- End .custom-control -->
                                        </td>
                                        <td>$0.00</td>
                                    </tr><!-- End .summary-shipping-row -->

                                  


                                    <tr class="summary-total">
                                        <td>Total:</td>
                                        <td>{{ number_format($totalAmount) }} VNĐ</td>
                                    </tr><!-- End .summary-total -->
                                </tbody>
                            </table><!-- End .table table-summary -->

                            <a href="{{route('bill')}}" class="btn btn-outline-primary-2 btn-order btn-block">TIẾN HÀNH THANH
                                TOÁN</a>
                        </div><!-- End .summary -->

                        <a href="/" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE
                                SHOPPING</span><i class="icon-refresh"></i></a>
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .cart -->
    </div><!-- End .page-content -->
@endsection
