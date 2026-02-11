@extends('landing.layouts.navbar')
@section('title', 'Blog de la Quincaillerie Kaoural')
@section('suite')

<section class="blog_area section_padding_100">
    <div class="container">
        <div class="row justify-content-center">
            
            <div class="col-12 col-md-9 col-lg-8">
                
                <div class="single_blog_area mb-5">
                    <div class="blog_post_thumb">
                        <a href="single-blog.html"><img src="{{ asset('kaoural/img/bg-img/blog-1.jpg') }}" alt="blog-post-thumb"></a>
                        <div class="post-date">
                            <a href="#">9 Aug</a>
                            <span>3 min read</span>
                        </div>
                    </div>
                    <div class="blog_post_content">
                        <a href="single-blog.html" class="blog_title">Eye Fashion Week 9 - 16 Aug 2019</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, dolorem accusamus...</p>
                        <a href="single-blog.html">Continue Reading <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                    </div>
                </div>

                <div class="shop_pagination_area mt-5">
                    <nav aria-label="Page navigation">
                        <ul class="pagination pagination-sm justify-content-center">
                            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</section>

<style>
       .btn-primary:hover {
        background-color: #e6c200;
        border-color: #e6c200;
        color: #000;
        transform: scale(1.02);
    }

    </style>

@endsection