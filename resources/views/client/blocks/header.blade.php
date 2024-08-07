<div class="header-top">
    <div class="container">
        <div class="header-left">
            <ul class="top-menu top-link-menu d-none d-md-block">
                <li>
                    <a href="#">Links</a>
                    <ul>
                        <li><a href="tel:#"><i class="icon-phone"></i>Call: +@foreach ($thong_tin as $item)
                                    {{ $item->sdt }}
                                @endforeach
                            </a></li>
                    </ul>
                </li>
            </ul><!-- End .top-menu -->
        </div><!-- End .header-left -->

        <div class="header-right">
            <div class="social-icons social-icons-color">
                <a href="#" class="social-icon social-facebook" title="Facebook" target="_blank"><i
                        class="icon-facebook-f"></i></a>
                <a href="#" class="social-icon social-twitter" title="Twitter" target="_blank"><i
                        class="icon-twitter"></i></a>
                <a href="#" class="social-icon social-instagram" title="Pinterest" target="_blank"><i
                        class="icon-instagram"></i></a>
                <a href="#" class="social-icon social-pinterest" title="Instagram" target="_blank"><i
                        class="icon-pinterest-p"></i></a>
            </div><!-- End .soial-icons -->
            <ul class="top-menu top-link-menu">

                @if (Auth::check())
                    <li>User: {{ Auth::user()->ho_ten }}</li>
                @else
                    <li>
                        <a href="#">Links</a>
                        <ul>
                            <li><a href="/login" data-toggle="modal"><i class="icon-user"></i>Login</a></li>
                        </ul>
                    </li>
                @endif

            </ul><!-- End .top-menu -->

            <div class="top-menu" style="margin-left: 10px;">
                @if (Auth::check())
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                        Đăng xuất
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endif

            </div><!-- End .header-dropdown -->


        </div><!-- End .header-right -->
    </div>
</div>
<div class="header-middle">
    <div class="container">
        <div class="header-left">
            <div class="header-search header-search-extended header-search-visible d-none d-lg-block">
                <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                <form action="#" method="get">
                    <div class="header-search-wrapper search-wrapper-wide">
                        <label for="q" class="sr-only">Search</label>
                        <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                        <input type="search" class="form-control" name="q" id="q"
                            placeholder="Search product ..." required>
                    </div><!-- End .header-search-wrapper -->
                </form>
            </div><!-- End .header-search -->
        </div>
        <div class="header-center">
            <a href="/home" class="logo">
                @foreach ($thong_tin as $item)
                    <img src="{{ Storage::url($item->logo) }}" alt="Molla Logo" width="82" height="20">
                @endforeach
            </a>
        </div><!-- End .header-left -->

        <div class="header-right">
            <a href="wishlist.html" class="wishlist-link">
                <i class="icon-heart-o"></i>
                <span class="wishlist-count">3</span>
                <span class="wishlist-txt">My Wishlist</span>
            </a>

            <div class="dropdown cart-dropdown">
                <a href="{{ route('cart.list') }}" class="dropdown-toggle" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" data-display="static">
                    <i class="icon-shopping-cart"></i>
                    {{-- <span class="cart-count">2</span> --}}
                    <span class="wishlist-txt">My Cart</span>
                </a>


            </div><!-- End .cart-dropdown -->
        </div>
    </div><!-- End .container -->
</div><!-- End .header-middle -->

<div class="header-bottom sticky-header">
    <div class="container">
        <div class="header-left">
            <nav class="main-nav">
                <ul class="menu sf-arrows">
                    <li class="megamenu-container active">
                        <a href="/home" class="sf-with">Home</a>
                    </li>

                    <li>
                        <a href="/list" class="sf-with">Product</a>
                    </li>

                    <li>
                        <a href="{{route('contact.create')}}" class="sf-with">Contact</a>
                    </li>
                    <li>
                        <a href="{{ route('getBlogs') }}" class="sf-with">Blog</a>
                    </li>
                    <li>
                        <a href="{{ route('myOder.list') }}" class="sf-with">My order</a>
                    </li>
                </ul><!-- End .menu -->
            </nav><!-- End .main-nav -->

            <button class="mobile-menu-toggler">
                <span class="sr-only">Toggle mobile menu</span>
                <i class="icon-bars"></i>
            </button>
        </div><!-- End .header-left -->

        <div class="header-right">
            <i class="la la-lightbulb-o"></i>
            <p>Clearance Up to 30% Off</span></p>
        </div>
    </div><!-- End .container -->
</div><!-- End .header-bottom -->
