@extends('layouts.client')

@section('content')
<style>
    /* Định dạng chung cho trang */
.page-header {
    background-size: cover;
    background-position: center;
    padding: 50px 0;
    color: #fff;
}

.page-header .page-title {
    font-size: 2.5rem;
    margin: 0;
}

.breadcrumb-nav {
    margin: 20px 0;
}

.breadcrumb-nav .breadcrumb {
    background: none;
    padding: 0;
}

.breadcrumb-nav .breadcrumb-item a {
    color: #007bff;
}

.breadcrumb-nav .breadcrumb-item.active {
    color: #6c757d;
}

/* Định dạng cho phần nội dung */
.page-content {
    padding: 30px 0;
}

.rating {
    direction: rtl;
    display: inline-block;
    font-size: 2rem;
}

.rating input[type="radio"] {
    display: none;
}

.rating label {
    color: #d3d3d3;
    cursor: pointer;
    font-size: 2rem;
    transition: color 0.3s;
}

.rating input[type="radio"]:checked ~ label {
    color: #f39c12;
}

.rating label:hover,
.rating label:hover ~ label {
    color: #f39c12;
}

textarea {
    width: 100%;
    height: 150px;
    padding: 10px;
    margin-top: 10px;
    border: 1px solid #ced4da;
    border-radius: 5px;
}

button {
    padding: 10px 20px;
    color: #fff;
    background-color: #007bff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1rem;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #0056b3;
}

</style>
<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
    <div class="container">
        <h1 class="page-title">Đánh giá đơn hàng<span></span></h1>
    </div><!-- End .container -->
</div><!-- End .page-header -->
<nav aria-label="breadcrumb" class="breadcrumb-nav">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/myOder">MyOder</a></li>
            <li class="breadcrumb-item active" aria-current="page">Đánh giá Đơn Hàng</li>
        </ol>
    </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->

<div class="page-content">
    <div class="container">
        <form action="{{route('products.reviews.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name='product_id' value="{{$myOrder->id}}">

            <div class="rating">
                <input type="radio" name="rating" id="star5" value="5">
                <label for="star5" title="5 stars">★</label>
                
                <input type="radio" name="rating" id="star4" value="4">
                <label for="star4" title="4 stars">★</label>
                
                <input type="radio" name="rating" id="star3" value="3">
                <label for="star3" title="3 stars">★</label>
                
                <input type="radio" name="rating" id="star2" value="2">
                <label for="star2" title="2 stars">★</label>
                
                <input type="radio" name="rating" id="star1" value="1">
                <label for="star1" title="1 star">★</label>
            </div>
            <br>
            <label for="comment">Comment:</label>
            <textarea name="comment" id="comment"></textarea>
        
            <button type="submit">Submit</button>
        </form>
    </div><!-- End .container -->
</div><!-- End .page-content -->

@endsection