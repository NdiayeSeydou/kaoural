@extends('landing.layouts.navbar')
@section('title', 'Blog de la Quincaillerie Kaoural')
@section('suite')

    <section class="blog_area section_padding_100">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-12 col-md-9 col-lg-8">

                    <div class="row">
                        @forelse ($blogs as $blog)
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="single_blog_area mb-5">
                                    <div class="blog_post_thumb">
                                        <a href="{{ route('detailsblog', $blog->public_id) }}">

                                            <img src="{{ asset('storage/' . $blog->image) }}" alt="blog-post-thumb">
                                        </a>
                                        <div class="post-date">
                                            <a
                                                href="{{ route('detailsblog', $blog->public_id) }}">{{ 

                                                $blog->created_at->translatedFormat('d M') }}</a>

                                            <span>

                                                @php

                                                    $mots = str_word_count(strip_tags($blog->contenu));

                                                    $tempsLecture = ceil($mots / 200);

                                                @endphp

                                                {{ $tempsLecture < 1 ? 1 : $tempsLecture }} min

                                            </span>
                                        </div>


                                    </div>
                                    <div class="blog_post_content">

                                        <a href="{{ route('detailsblog', $blog->public_id) }}" class="blog_title">
                                            
                                            {{ $blog->titre }}
                                        </a>
                                        <p>{{ Str::limit($blog->description, 100) }}</p>

                                        <a href="{{ route('detailsblog', $blog->public_id) }}">
                                            Continuer la lecture <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center py-5">
                                <div class="no-blog-content">
                                    <i class="icofont- ghost" style="font-size: 4rem; color: #ddd;"></i>
                                    <h3 class="mt-3">Aucun article disponible</h3>
                                    <p class="text-muted">Revenez bientôt pour découvrir nos dernières actualités.</p>
                                    <a href="{{ url('/') }}" class="btn btn-primary mt-3">Retour à l'accueil</a>
                                </div>
                            </div>
                        @endforelse
                    </div>


                    <div class="shop_pagination_area mt-5">
                        <nav aria-label="Page navigation">
                            @if ($blogs->hasPages())
                                <ul class="pagination pagination-sm justify-content-center">
                                   
                                    @if ($blogs->onFirstPage())
                                        <li class="page-item disabled"><span class="page-link"><i
                                                    class="fa fa-angle-left"></i></span></li>
                                    @else
                                        <li class="page-item"><a class="page-link"
                                                href="{{ $blogs->previousPageUrl() }}"><i class="fa fa-angle-left"></i></a>
                                        </li>
                                    @endif

                                 
                                    @foreach ($blogs->getUrlRange(1, $blogs->lastPage()) as $page => $url)
                                        @if ($page == $blogs->currentPage())
                                            <li class="page-item active"><span class="page-link">{{ $page }}</span>
                                            </li>
                                        @else
                                            <li class="page-item"><a class="page-link"
                                                    href="{{ $url }}">{{ $page }}</a></li>
                                        @endif
                                    @endforeach

                                   
                                    @if ($blogs->hasMorePages())
                                        <li class="page-item"><a class="page-link" href="{{ $blogs->nextPageUrl() }}"><i
                                                    class="fa fa-angle-right"></i></a></li>
                                    @else
                                        <li class="page-item disabled"><span class="page-link"><i
                                                    class="fa fa-angle-right"></i></span></li>
                                    @endif
                                </ul>
                            @endif
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


