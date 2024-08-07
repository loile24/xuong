@extends('layouts.client')

@section('content')
<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
    <div class="container">
        <h1 class="page-title">Blog Grid 3 Columns<span>Blog</span></h1>
    </div><!-- End .container -->
</div><!-- End .page-header -->
<nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Blog</a></li>
            <li class="breadcrumb-item active" aria-current="page">Grid 3 Columns</li>
        </ol>
    </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->

<div class="page-content">
    <div class="container">
     

        <div class="entry-container max-col-3" data-layout="fitRows">

            @foreach ($blogs as $item)
                
            <div class="entry-item lifestyle shopping col-sm-6 col-lg-4">
                <article class="entry entry-grid text-center">
                    <figure class="entry-media">
                        <a href="#">
                            <img src="{{Storage::url($item->image)}}" alt="image desc">
                        </a>
                    </figure><!-- End .entry-media -->

                    <div class="entry-body">
                        <div class="entry-meta">
                            <span class="meta-separator">|</span>
                            <a href="#">{{ \Carbon\Carbon::parse($item->date)->format('d/m/Y') }}</a>
                            <span class="meta-separator">|</span>

                        </div><!-- End .entry-meta -->

                        <h2 class="entry-title">
                            <a href="single.html">{{$item->title}}.</a>
                        </h2><!-- End .entry-title -->

                        <div class="entry-cats">
                            <a href="#">Shopping</a>
                        </div><!-- End .entry-cats -->

                        <div class="entry-content">
                            <p>{{$item->content}}</p>
                            <a href="single.html" class="read-more">Continue Reading</a>
                        </div><!-- End .entry-content -->
                    </div><!-- End .entry-body -->
                </article><!-- End .entry -->
            </div><!-- End .entry-item -->
            @endforeach

           
        </div><!-- End .entry-container -->

        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
                        <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
                    </a>
                </li>
                <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item">
                    <a class="page-link page-link-next" href="#" aria-label="Next">
                        Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                    </a>
                </li>
            </ul>
        </nav>
    </div><!-- End .container -->
</div><!-- End .page-content -->
@endsection