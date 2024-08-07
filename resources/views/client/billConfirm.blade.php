@extends('layouts.client')

@section('content')
<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
    <div class="container">
        <h1 class="page-title">Đặt Hàng Thành Công<span>Shop</span></h1>
    </div><!-- End .container -->
</div><!-- End .page-header -->
<nav aria-label="breadcrumb" class="breadcrumb-nav">
   
</nav><!-- End .breadcrumb-nav -->

<div class="page-content">
    <a href="/">Quay Lại Trang Chủ</a>
    @if (session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif

    @if (session('error'))
    {{session('error')}}
@endif
</div><!-- End .page-content -->
@endsection


