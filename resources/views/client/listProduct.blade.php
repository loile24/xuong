@extends('layouts.client')

@section('content')
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Danh Sách Sản Phẩm<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Danh Sách Sản Phẩm</a></li>

            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="toolbox">
                <div class="toolbox-left">
                    <div class="header-search header-search-extended header-search-visible d-none d-lg-block">
                        <form action="{{route('list.index')}}" method="GET">
                            <div class="header-search-wrapper search-wrapper-wide">
                                <input type="search" class="form-control" name="SearchProduct" id="q" placeholder="Search product ..." required>
                            </div><!-- End .header-search-wrapper -->
                        </form>
                    </div><!-- End .header-search -->
                </div><!-- End .toolbox-left -->

                <div class="toolbox-center">
                    <div class="toolbox-info">
                    </div><!-- End .toolbox-info -->
                </div><!-- End .toolbox-center -->

                <div class="toolbox-right">
                    
                    <div class="toolbox-sort">
                        <form action="{{ route('list.index') }}" method="GET">
                            <select name="danh_muc_id" onchange="this.form.submit()" class="form-control">
                                <option value="">Tất cả danh mục</option>
                                @foreach($category as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </form>

                    </div><!-- End .toolbox-sort -->
                </div><!-- End .toolbox-right -->
            </div><!-- End .toolbox -->

            <div class="products">
                <div class="row">

                    @foreach ($listProducts as $item)
                        <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                            <div class="product">
                                <figure class="product-media">
                                    <span class="product-label label-new">New</span>
                                    <a href="{{ route('home.show', $item->id) }}">
                                        <img src="{{ Storage::url($item->image) }}" alt="Product image"
                                            class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to
                                                wishlist</span></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action action-icon-top">
                                        <form action="{{ route('cart.add') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="san_pham_id" value="{{ $item->id }}">
                                            <input type="hidden" name="so_luong" id="qty" class="form-control"
                                                value="1" min="1" max="10" step="1" required>

                                            <button class="btn-product btn-cart" type="submit"
                                                style="width: 276px; border:none;">add to cart</button>
                                        </form>
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

            <div class="sidebar-filter-overlay"></div><!-- End .sidebar-filter-overlay -->
            <aside class="sidebar-shop sidebar-filter">
                <div class="sidebar-filter-wrapper">
                    <div class="widget widget-clean">
                        <label><i class="icon-close"></i>Filters</label>
                        <a href="#" class="sidebar-filter-clear">Clean All</a>
                    </div><!-- End .widget -->
                    <div class="widget widget-collapsible">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true"
                                aria-controls="widget-1">
                                Category
                            </a>
                        </h3><!-- End .widget-title -->

                        <div class="collapse show" id="widget-1">
                            <div class="widget-body">
                                <div class="filter-items filter-items-count">
                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="cat-1">
                                            <label class="custom-control-label" for="cat-1">Dresses</label>
                                        </div><!-- End .custom-checkbox -->
                                        <span class="item-count">3</span>
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="cat-2">
                                            <label class="custom-control-label" for="cat-2">T-shirts</label>
                                        </div><!-- End .custom-checkbox -->
                                        <span class="item-count">0</span>
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="cat-3">
                                            <label class="custom-control-label" for="cat-3">Bags</label>
                                        </div><!-- End .custom-checkbox -->
                                        <span class="item-count">4</span>
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="cat-4">
                                            <label class="custom-control-label" for="cat-4">Jackets</label>
                                        </div><!-- End .custom-checkbox -->
                                        <span class="item-count">2</span>
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="cat-5">
                                            <label class="custom-control-label" for="cat-5">Shoes</label>
                                        </div><!-- End .custom-checkbox -->
                                        <span class="item-count">2</span>
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="cat-6">
                                            <label class="custom-control-label" for="cat-6">Jumpers</label>
                                        </div><!-- End .custom-checkbox -->
                                        <span class="item-count">1</span>
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="cat-7">
                                            <label class="custom-control-label" for="cat-7">Jeans</label>
                                        </div><!-- End .custom-checkbox -->
                                        <span class="item-count">1</span>
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="cat-8">
                                            <label class="custom-control-label" for="cat-8">Sportwear</label>
                                        </div><!-- End .custom-checkbox -->
                                        <span class="item-count">0</span>
                                    </div><!-- End .filter-item -->
                                </div><!-- End .filter-items -->
                            </div><!-- End .widget-body -->
                        </div><!-- End .collapse -->
                    </div><!-- End .widget -->

                    <div class="widget widget-collapsible">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-2" role="button" aria-expanded="true"
                                aria-controls="widget-2">
                                Size
                            </a>
                        </h3><!-- End .widget-title -->

                        <div class="collapse show" id="widget-2">
                            <div class="widget-body">
                                <div class="filter-items">
                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="size-1">
                                            <label class="custom-control-label" for="size-1">XS</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="size-2">
                                            <label class="custom-control-label" for="size-2">S</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" checked id="size-3">
                                            <label class="custom-control-label" for="size-3">M</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" checked id="size-4">
                                            <label class="custom-control-label" for="size-4">L</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="size-5">
                                            <label class="custom-control-label" for="size-5">XL</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="size-6">
                                            <label class="custom-control-label" for="size-6">XXL</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .filter-item -->
                                </div><!-- End .filter-items -->
                            </div><!-- End .widget-body -->
                        </div><!-- End .collapse -->
                    </div><!-- End .widget -->

                    <div class="widget widget-collapsible">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-3" role="button" aria-expanded="true"
                                aria-controls="widget-3">
                                Colour
                            </a>
                        </h3><!-- End .widget-title -->

                        <div class="collapse show" id="widget-3">
                            <div class="widget-body">
                                <div class="filter-colors">
                                    <a href="#" style="background: #b87145;"><span class="sr-only">Color
                                            Name</span></a>
                                    <a href="#" style="background: #f0c04a;"><span class="sr-only">Color
                                            Name</span></a>
                                    <a href="#" style="background: #333333;"><span class="sr-only">Color
                                            Name</span></a>
                                    <a href="#" class="selected" style="background: #cc3333;"><span
                                            class="sr-only">Color Name</span></a>
                                    <a href="#" style="background: #3399cc;"><span class="sr-only">Color
                                            Name</span></a>
                                    <a href="#" style="background: #669933;"><span class="sr-only">Color
                                            Name</span></a>
                                    <a href="#" style="background: #f2719c;"><span class="sr-only">Color
                                            Name</span></a>
                                    <a href="#" style="background: #ebebeb;"><span class="sr-only">Color
                                            Name</span></a>
                                </div><!-- End .filter-colors -->
                            </div><!-- End .widget-body -->
                        </div><!-- End .collapse -->
                    </div><!-- End .widget -->

                    <div class="widget widget-collapsible">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-4" role="button" aria-expanded="true"
                                aria-controls="widget-4">
                                Brand
                            </a>
                        </h3><!-- End .widget-title -->

                        <div class="collapse show" id="widget-4">
                            <div class="widget-body">
                                <div class="filter-items">
                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="brand-1">
                                            <label class="custom-control-label" for="brand-1">Next</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="brand-2">
                                            <label class="custom-control-label" for="brand-2">River Island</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="brand-3">
                                            <label class="custom-control-label" for="brand-3">Geox</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="brand-4">
                                            <label class="custom-control-label" for="brand-4">New Balance</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="brand-5">
                                            <label class="custom-control-label" for="brand-5">UGG</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="brand-6">
                                            <label class="custom-control-label" for="brand-6">F&F</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="brand-7">
                                            <label class="custom-control-label" for="brand-7">Nike</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .filter-item -->

                                </div><!-- End .filter-items -->
                            </div><!-- End .widget-body -->
                        </div><!-- End .collapse -->
                    </div><!-- End .widget -->

                    <div class="widget widget-collapsible">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true"
                                aria-controls="widget-5">
                                Price
                            </a>
                        </h3><!-- End .widget-title -->

                        <div class="collapse show" id="widget-5">
                            <div class="widget-body">
                                <div class="filter-price">
                                    <div class="filter-price-text">
                                        Price Range:
                                        <span id="filter-price-range"></span>
                                    </div><!-- End .filter-price-text -->

                                    <div id="price-slider"></div><!-- End #price-slider -->
                                </div><!-- End .filter-price -->
                            </div><!-- End .widget-body -->
                        </div><!-- End .collapse -->
                    </div><!-- End .widget -->
                </div><!-- End .sidebar-filter-wrapper -->
            </aside><!-- End .sidebar-filter -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
@endsection
