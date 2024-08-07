@extends('layouts.client')

@section('content')

<div class="intro-section bg-lighter pt-3">
    <div class="container">
        <div class="banner-group">
            <div class="row">
                <div class="col-lg-5">
                    <div class="banner banner-big banner-overlay">
                        <a href="theme/client/#">
                            <img src="{{asset('theme/client/assets/images/demos/demo-17/banners/banner-1.jpg')}}" alt="Banner">
                        </a>

                        <div class="banner-content banner-content-bottom">
                            <h4 class="banner-subtitle text-white"><a href="theme/client/#">Trending now</a></h4><!-- End .banner-subtitle -->
                            <h3 class="banner-title text-white"><a href="theme/client/#">The Focus and Accent <br>On Your Spring Wardrobe</a></h3><!-- End .banner-title -->
                            <a href="theme/client/#" class="banner-link">Discover Now <i class="icon-long-arrow-right"></i></a>
                        </div><!-- End .banner-content -->
                    </div><!-- End .banner -->
                </div><!-- End .col-lg-5 -->

                <div class="col-lg-7">
                    <div class="banner banner-overlay">
                        <a href="theme/client/#">
                            <img src="{{asset('theme/client/assets/images/demos/demo-17/banners/banner-2.jpg')}}" alt="Banner">
                        </a>

                        <div class="banner-content banner-content-right">
                            <h4 class="banner-subtitle text-white"><a href="theme/client/#">clearance</a></h4><!-- End .banner-subtitle -->
                            <h3 class="banner-title text-white"><a href="theme/client/#">Clearance It’s On <br>Up To 50% Off</a></h3><!-- End .banner-title -->
                            <a href="theme/client/#" class="banner-link">Shop Now <i class="icon-long-arrow-right"></i></a>
                        </div><!-- End .banner-content -->
                    </div><!-- End .banner -->

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="banner banner-overlay">
                                <a href="theme/client/#">
                                    <img src="{{asset('theme/client/assets/images/demos/demo-17/banners/banner-3.jpg')}}" alt="Banner">
                                </a>

                                <div class="banner-content banner-content-top ">
                                    <h4 class="banner-subtitle text-white"><a href="theme/client/#">you might love</a></h4><!-- End .banner-subtitle -->
                                    <h3 class="banner-title text-white"><a href="theme/client/#">This Week's <br>Most Wanted</a></h3><!-- End .banner-title -->
                                    <a href="#" class="banner-link">Shop Now <i class="icon-long-arrow-right"></i></a>
                                </div><!-- End .banner-content -->
                            </div><!-- End .banner -->
                        </div><!-- End .col-sm-6 -->

                        <div class="col-sm-6">
                            <div class="banner banner-overlay">
                                <a href="#">
                                    <img src="{{asset('theme/client/assets/images/demos/demo-17/banners/banner-4.jpg')}}" alt="Banner">
                                </a>

                                <div class="banner-content  banner-content-top banner-content-reverse">
                                    <h4 class="banner-subtitle text-white"><a href="#">The new pretty</a></h4><!-- End .banner-subtitle -->
                                    <h3 class="banner-title text-white"><a href="#">How To Dress<br>For Spring</a></h3><!-- End .banner-title -->
                                    <a href="#" class="banner-link">Discover Now <i class="icon-long-arrow-right"></i></a>
                                </div><!-- End .banner-content -->
                            </div><!-- End .banner -->
                        </div><!-- End .col-sm-6 -->
                    </div><!-- End .row -->
                </div><!-- End .col-lg-7 -->
            </div><!-- End .row -->
        </div><!-- End .banner-group -->
    </div><!-- End .container -->

    <div class="icon-boxes-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="icon-box icon-box-side">
                        <span class="icon-box-icon">
                            <i class="icon-rocket"></i>
                        </span>

                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Free Shipping</h3><!-- End .icon-box-title -->
                            <p>Orders $50 or more</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-sm-6 col-lg-3 -->
                
                <div class="col-sm-6 col-lg-3">
                    <div class="icon-box icon-box-side">
                        <span class="icon-box-icon">
                            <i class="icon-rotate-left"></i>
                        </span>

                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Free Returns</h3><!-- End .icon-box-title -->
                            <p>Within 30 days</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="icon-box icon-box-side">
                        <span class="icon-box-icon">
                            <i class="icon-info-circle"></i>
                        </span>

                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Get 20% Off 1 Item</h3><!-- End .icon-box-title -->
                            <p>When you sign up</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="icon-box icon-box-side">
                        <span class="icon-box-icon">
                            <i class="icon-life-ring"></i>
                        </span>

                        <div class="icon-box-content">
                            <h3 class="icon-box-title">We Support</h3><!-- End .icon-box-title -->
                            <p>24/7 amazing services</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-sm-6 col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .icon-boxes-container -->
</div><!-- End .bg-lighter -->

<div class="container">
    <h2 class="title text-center">Danh Sách Sản Phẩm Mới</h2><!-- End .title -->

    <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="tab-new-link" data-toggle="tab" href="#tab-new" role="tab" aria-controls="tab-new" aria-selected="true">New</a>
        </li>
       
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="tab-new" role="tabpanel" aria-labelledby="tab-new-link">
            <div class="row justify-content-center">


                @foreach ($list_sp_home as $item)
                    
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="product product-4">
                        <figure class="product-media">
                            <a href="{{route('home.show', $item->id)}}">
                                <img src="{{ Storage::url($item->image) }}" alt="Product image" class="product-image">
                                <img src="{{ Storage::url($item->image) }}" alt="Product image" class="product-image-hover">
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                            </div><!-- End .product-action -->

                            {{-- form add to cart --}}
                            <div class="product-action">
                                <form action="{{ route('cart.add') }}" method="post">
                                    @csrf
                                <input type="hidden" name="san_pham_id" value="{{$item->id}}">
                                <input type="hidden" name="so_luong" id="qty" class="form-control" value="1" min="1" max="10" step="1" required>

                                <button class="btn-product btn-cart" type="submit" style="width: 276px; border:none;">add to cart</button>
                                </form>

                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <div
                                    class="disabled {{ $item->status == 1 ? 'text-success' : 'text-danger' }}">
                                    {{ $item->status == 1 ? 'Còn hàng' : 'Hết hàng' }}
                                </div>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="product.html">{{$item->name}}</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                {{ number_format($item->price, 0, ',', '.') }} VNĐ
                            </div><!-- End .product-price -->
                            <div class="product-nav product-nav-dots">
                                <td>Ngày đăng: {{ \Carbon\Carbon::parse($item->date_add)->format('d/m/Y') }}</td>
                            </div><!-- End .product-nav -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                @endforeach

            </div><!-- End .row -->
        </div><!-- .End .tab-pane -->

    
    </div><!-- End .tab-content -->

    <div class="mb-3"></div><!-- End .mb-6 -->
</div><!-- End .container -->

<div class="cta bg-image bg-dark pt-4 pb-5" style="background-image: url(assets/images/demos/demo-17/bg-1.jpg);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-8 col-lg-6">
                <div class="cta-heading text-center">
                    <h3 class="cta-title text-white">Sign up for email & get 25% off </h3><!-- End .cta-title -->
                    <p class="cta-desc text-white">Subcribe to get information about products and coupons</p><!-- End .cta-desc -->
                </div><!-- End .text-center -->
            
                <form action="#">
                    <div class="input-group">
                        <input type="email" class="form-control" placeholder="Enter your Email Address" aria-label="Email Adress" required>
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit"><span>Subscribe</span><i class="icon-long-arrow-right"></i></button>
                        </div><!-- .End .input-group-append -->
                    </div><!-- .End .input-group -->
                </form>
            </div><!-- End .col-sm-10 col-md-8 col-lg-6 -->
        </div><!-- End .row -->
    </div><!-- End .container -->
</div><!-- End .cta -->
@endsection