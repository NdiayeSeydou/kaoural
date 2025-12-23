 @extends('landing.layouts.navbar')
 @section('title', 'Blog de la Quincaillerie Kaoural')
 @section('suite')

     <section class="blog_area section_padding_100 justify-center-content-center">
         <div class="col-12 justify-center-content-center">
             <div class="container">

                 <div class="row">
                     <div class="col-12 col-md-7 col-lg-8">
                         <!-- Single News Area -->
                         <div class="single_blog_area">
                             <div class="blog_post_thumb">
                                 <a href="single-blog.html"><img src="{{ asset('kaoural/img/bg-img/blog-1.jpg') }}" alt="blog-post-thumb"></a>
                                 <!-- Post Date -->
                                 <div class="post-date">
                                     <a href="#">9 Aug</a>
                                     <span>3 min read</span>
                                 </div>
                             </div>
                             <div class="blog_post_content">
                                 <a href="single-blog.html" class="blog_title">Eye Fashion Week 9 - 16 Aug 2019</a>
                                 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, dolorem accusamus.
                                     Tenetur sit dolore nesciunt ipsum aspernatur nam et, expedita placeat labore alias
                                     consequatur accusamus autem aliquam optio assumenda obcaecati.</p>
                                 <a href="single-blog.html">Continue Reading <i class="fa fa-angle-double-right"
                                         aria-hidden="true"></i></a>
                             </div>
                         </div>

                         <!-- Single News Area -->
                         <div class="single_blog_area">
                             <div class="blog_post_thumb">
                                 <a href="single-blog.html"><img src="{{ asset('kaoural/img/bg-img/blog-1.jpg') }}" alt="blog-post-thumb"></a>
                                 <!-- Post Date -->
                                 <div class="post-date">
                                     <a href="#">8 Aug</a>
                                     <span>9 min read</span>
                                 </div>
                             </div>
                             <div class="blog_post_content">
                                 <a href="single-blog.html" class="blog_title">Casual Fashion Design Contest</a>
                                 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, dolorem accusamus.
                                     Tenetur sit dolore nesciunt ipsum aspernatur nam et, expedita placeat labore alias
                                     consequatur accusamus autem aliquam optio assumenda obcaecati.</p>
                                 <a href="single-blog.html">Continue Reading <i class="fa fa-angle-double-right"
                                         aria-hidden="true"></i></a>
                             </div>
                         </div>

                         <!-- Single News Area -->
                         <div class="single_blog_area">
                             <div class="blog_post_thumb">
                                 <a href="single-blog.html"><img src="{{ asset('kaoural/img/bg-img/blog-1.jpg') }}" alt="blog-post-thumb"></a>
                                 <!-- Post Date -->
                                 <div class="post-date">
                                     <a href="#">6 Aug</a>
                                     <span>4 min read</span>
                                 </div>
                             </div>
                             <div class="blog_post_content">
                                 <a href="single-blog.html" class="blog_title">Top 10 Handbags in 2019</a>
                                 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, dolorem accusamus.
                                     Tenetur sit dolore nesciunt ipsum aspernatur nam et, expedita placeat labore alias
                                     consequatur accusamus autem aliquam optio assumenda obcaecati.</p>
                                 <a href="single-blog.html">Continue Reading <i class="fa fa-angle-double-right"
                                         aria-hidden="true"></i></a>
                             </div>
                         </div>

                         <!-- Single News Area -->
                         <div class="single_blog_area">
                             <div class="blog_post_thumb">
                                 <a href="single-blog.html"><img src="{{ asset('kaoural/img/bg-img/blog-1.jpg') }}" alt="blog-post-thumb"></a>
                                 <!-- Post Date -->
                                 <div class="post-date">
                                     <a href="#">5 Aug</a>
                                     <span>2 min read</span>
                                 </div>
                             </div>
                             <div class="blog_post_content">
                                 <a href="single-blog.html" class="blog_title">Leather Shoes Festivals on DW Mart</a>
                                 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, dolorem accusamus.
                                     Tenetur sit dolore nesciunt ipsum aspernatur nam et, expedita placeat labore alias
                                     consequatur accusamus autem aliquam optio assumenda obcaecati.</p>
                                 <a href="single-blog.html">Continue Reading <i class="fa fa-angle-double-right"
                                         aria-hidden="true"></i></a>
                             </div>
                         </div>

                         <!-- Single News Area -->
                         <div class="single_blog_area">
                             <div class="blog_post_thumb">
                                 <a href="single-blog.html"><img src="{{ asset('kaoural/img/bg-img/blog-1.jpg') }}" alt="blog-post-thumb"></a>
                                 <!-- Post Date -->
                                 <div class="post-date">
                                     <a href="#">1 Aug</a>
                                     <span>11 min read</span>
                                 </div>
                             </div>
                             <div class="blog_post_content">
                                 <a href="single-blog.html" class="blog_title">Fashion carnival was held</a>
                                 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, dolorem accusamus.
                                     Tenetur sit dolore nesciunt ipsum aspernatur nam et, expedita placeat labore alias
                                     consequatur accusamus autem aliquam optio assumenda obcaecati.</p>
                                 <a href="single-blog.html">Continue Reading <i class="fa fa-angle-double-right"
                                         aria-hidden="true"></i></a>
                             </div>
                         </div>
                     </div>

                 </div>

                 <div class="row">
                     <div class="col-12 col-lg-8">
                         <!-- Shop Pagination Area -->
                         <div class="shop_pagination_area mt-5">
                             <nav aria-label="Page navigation">
                                 <ul class="pagination pagination-sm justify-content-center">
                                     <li class="page-item">
                                         <a class="page-link" href="#"><i class="fa fa-angle-left"
                                                 aria-hidden="true"></i></a>
                                     </li>
                                     <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                     <li class="page-item"><a class="page-link" href="#">2</a></li>
                                     <li class="page-item"><a class="page-link" href="#">3</a></li>
                                     <li class="page-item"><a class="page-link" href="#">4</a></li>
                                     <li class="page-item"><a class="page-link" href="#">5</a></li>
                                     <li class="page-item"><a class="page-link" href="#">...</a></li>
                                     <li class="page-item"><a class="page-link" href="#">8</a></li>
                                     <li class="page-item"><a class="page-link" href="#">9</a></li>
                                     <li class="page-item">
                                         <a class="page-link" href="#"><i class="fa fa-angle-right"
                                                 aria-hidden="true"></i></a>
                                     </li>
                                 </ul>
                             </nav>
                         </div>
                     </div>
                 </div>

             </div>
         </div>

     </section>

     

 @endsection
