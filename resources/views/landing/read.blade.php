@extends('landing.layouts.navbar')

@section('title', $blog->title . ' | Quincaillerie Kaoural')

@section('suite')

  

    <section class="single_blog_details_area section_padding_100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-9">
                    <div class="single_blog_post_details">

                        <div class="post_thumbnail mb-5">
                            <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->titre }}"
                                class="img-fluid rounded w-100" style="max-height: 450px; object-fit: cover;);">
                        </div>

                        <div class="post_content">
                            <div class="post_date mb-3">
                                <span class="text-muted"><i class="fa fa-calendar"></i>
                                    {{ $blog->created_at->format('d/m/Y') }}</span>
                                <span class="text-muted ml-3">
                                    <i class="fa fa-clock-o"></i>
                                    @php

                                        $mots = str_word_count(strip_tags($blog->contenu));

                                        $tempsLecture = ceil($mots / 200);
                                    @endphp
                                    {{ $tempsLecture < 1 ? 1 : $tempsLecture }} min de lecture
                                </span>
                            </div>

                            <h2 class="post_title mb-4" style="font-weight: 700; color: #222;">{{ $blog->title }}</h2>

                            <div class="post_description"
                                style="text-align: justify; line-height: 1.8; font-size: 1.1rem; color: #444; white-space: pre-line;">

                                @if ($blog->description)
                                    <div class="intro_blog mb-4"
                                        style="border-left: 5px solid #ffbb00; padding: 15px 20px; background-color: #f9f9f9; font-style: italic; border-radius: 0 5px 5px 0;">
                                        {{ $blog->description }}
                                    </div>
                                @endif


                            </div>
                        </div>

                        <div class="post_footer d-flex align-items-center justify-content-between  pt-4 border-top">
                            <div class="share_links">
                                <h6 class="mb-2">Partager :</h6>
                                <a href="https://wa.me/?text={{ urlencode($blog->title . ' ' . url()->current()) }}"
                                    target="_blank" class="btn btn-sm btn-success text-white mr-2"><i
                                        class="fa fa-whatsapp"></i> WhatsApp</a>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"
                                    target="_blank" class="btn btn-sm btn-primary text-white"><i class="fa fa-facebook"></i>
                                    Facebook</a>
                            </div>

                            <a href="{{ route('blog') }}" class="btn btn-dark">
                                <i class="fa fa-arrow-left"></i> Retour
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
