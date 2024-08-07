@extends('layouts.client')

@section('content')
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container d-flex align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Products</a></li>
                <li class="breadcrumb-item active" aria-current="page">Default</li>
            </ol>


        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="product-details-top">
                <div class="row">
                    <div class="col-md-6">
                        <div class="product-gallery product-gallery-vertical">
                            <div class="row">
                                <figure class="product-main-image">
                                    <img id="product-zoom" src="{{ Storage::url($san_pham->image) }}"
                                        data-zoom-image="assets/images/products/single/1-big.jpg" alt="product image">

                                    <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                        <i class="icon-arrows"></i>
                                    </a>
                                </figure><!-- End .product-main-image -->


                            </div><!-- End .row -->
                        </div><!-- End .product-gallery -->
                    </div><!-- End .col-md-6 -->

                    <div class="col-md-6">
                        <div class="product-details">
                            <h1 class="product-title">{{ $san_pham->title }}</h1><!-- End .product-title -->

                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: 96%;"></div><!-- End .ratings-val -->
                                </div><!-- End .ratings -->
                                <a class="ratings-text" href="#product-review-link" id="review-link">( 125 Reviews )</a>
                            </div><!-- End .rating-container -->

                            <div class="product-price">
                                {{ number_format($san_pham->price, 0, ',', '.') }} VNĐ
                            </div><!-- End .product-price -->

                            <div class="product-content">
                                <p>{{ $san_pham->description }}</p>
                            </div><!-- End .product-content -->

                            <form action="{{ route('cart.add') }}" method="post">
                                @csrf
                                <input type="hidden" name="san_pham_id" value="{{ $san_pham->id }}">

                                <div class="details-filter-row details-row-size">
                                    <label for="qty">Qty:</label>
                                    <div class="product-details-quantity">
                                        <input type="number" name="so_luong" id="qty" class="form-control"
                                            value="1" min="1" max="10" step="1" required>
                                    </div><!-- End .product-details-quantity -->
                                </div><!-- End .details-filter-row -->

                                <div class="product-details-action">
                                    <button class="btn-product btn-cart" type="submit">add to cart</button>


                                    <div class="details-action-wrapper">
                                        <a href="#" class="btn-product btn-wishlist" title="Wishlist"><span>Add to
                                                Wishlist</span></a>
                                        <a href="#" class="btn-product btn-compare" title="Compare"><span>Add to
                                                Compare</span></a>
                                    </div><!-- End .details-action-wrapper -->
                                </div><!-- End .product-details-action -->
                            </form>


                            <div class="product-details-footer">
                                <div class="product-cat">
                                    <span>Category:</span>
                                    {{ $san_pham->danh_muc_id }}
                                </div><!-- End .product-cat -->

                                <div class="social-icons social-icons-sm">
                                    <span class="social-label">Share:</span>
                                    <a href="#" class="social-icon" title="Facebook" target="_blank"><i
                                            class="icon-facebook-f"></i></a>
                                    <a href="#" class="social-icon" title="Twitter" target="_blank"><i
                                            class="icon-twitter"></i></a>
                                    <a href="#" class="social-icon" title="Instagram" target="_blank"><i
                                            class="icon-instagram"></i></a>
                                    <a href="#" class="social-icon" title="Pinterest" target="_blank"><i
                                            class="icon-pinterest"></i></a>
                                </div>
                            </div><!-- End .product-details-footer -->
                        </div><!-- End .product-details -->
                    </div><!-- End .col-md-6 -->
                </div><!-- End .row -->
            </div><!-- End .product-details-top -->

            <div class="product-details-tab">
                <ul class="nav nav-pills justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab"
                            role="tab" aria-controls="product-desc-tab" aria-selected="true">Bình Luận</a>
                    </li>

                </ul>

                <div class="header-search-wrapper search-wrapper-wide d-flex mt-1">
                    <form action="{{ route('home.update', $san_pham->id) }}" method="POST" enctype="multipart/form-data"
                        class="d-flex" style="width:1200px;">
                        @method('PUT')
                        @csrf
                        <input type="search" class="form-control" name="binhluan" id="q"
                            placeholder="Bình luận ...">
                        <button class="btn btn-primary" type="submit" style="height: 40px;">Gửi</button>
                    </form>
                </div><!-- End .header-search-wrapper -->

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel"
                        aria-labelledby="product-desc-link">
                        <div class="product-desc-content">
                            {{-- Bình luận --}}
                            @foreach ($binh_luan_product_id as $item)
                                <div>
                                    <h3>{{$item->tai_khoans->ho_ten}} - Ngày bình luận : {{$item->ngay_dang}}</h3>
                                    <p>{{$item->noi_dung}}</p>
                                    <hr>
                                </div>
                            @endforeach

                        </div><!-- End .product-desc-content -->
                    </div><!-- .End .tab-pane -->

                </div><!-- End .tab-content -->
            </div><!-- End .product-details-tab -->

            <h2 class="title text-center mb-4">Sản Phẩm Tương Tự</h2><!-- End .title text-center -->


            <div class="products">
                <div class="row">

                    @foreach ($similarProducts as $item)
                        <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                            <div class="product">
                                <figure class="product-media">
                                    <span class="product-label label-new">New</span>
                                    <a href="{{ route('home.show', $item->id) }}">
                                        <img src="{{ Storage::url($item->image) }}" alt="Product image"
                                            class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add
                                                to wishlist</span></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action action-icon-top">
                                        <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                        <a href="popup/quickView.html" class="btn-product btn-quickview"
                                            title="Quick view"><span>quick view</span></a>
                                        <a href="#" class="btn-product btn-compare"
                                            title="Compare"><span>compare</span></a>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <div class="disabled {{ $item->status == 1 ? 'text-success' : 'text-danger' }}">
                                            {{ $item->status == 1 ? 'Còn hàng' : 'Hết hàng' }}
                                        </div>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="product.html">{{ $item->name }}</a></h3>
                                    <!-- End .product-title -->
                                    <div class="product-price">
                                        {{ number_format($item->price, 0, ',', '.') }} VNĐ
                                    </div><!-- End .product-price -->
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 95%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">( 200 Reviews )</span>
                                    </div><!-- End .rating-container -->

                                    <div class="product-nav product-nav-dots">
                                        <td>Ngày đăng: {{ \Carbon\Carbon::parse($item->date_add)->format('d/m/Y') }}</td>
                                    </div><!-- End .product-nav -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                        </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
                    @endforeach


                </div><!-- End .row -->

                <div class="load-more-container text-center">
                    <a href="#" class="btn btn-outline-darker btn-load-more">More Products <i
                            class="icon-refresh"></i></a>
                </div><!-- End .load-more-container -->
            </div><!-- End .products -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
@endsection
