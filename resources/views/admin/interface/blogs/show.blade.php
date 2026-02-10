@extends('admin.layout.navbar')
@section('title', $blog->title . ' | kaoural')
@section('suite')

<div class="custom-container">
    <div class="row justify-content-center">
        <div class="col-xl-9 col-12">
            
            <div class="mb-6 d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h2 mb-1">{{ $blog->title }}</h1>
                    <p class="mb-0 text-muted">
                        Publié le {{ $blog->created_at->translatedFormat('d F Y') }} par <strong>Super Admin</strong>
                    </p>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.blog.index') }}" class="btn btn-dark">
                        <i class="fe fe-arrow-left me-2"></i>Retour
                    </a>
                   
                </div>
            </div>

            <div class="card border-0 shadow-sm mb-5">
                <img src="{{ asset('storage/' . $blog->image) }}" 
                     class="card-img-top rounded-3" 
                     alt="{{ $blog->title }}" 
                     style="max-height: 450px; object-fit: cover;">
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-body p-lg-5">
                    <div class="blog-content" style="line-height: 1.8; font-size: 1.1rem; color: #334155;">
                        {{-- On utilise nl2br pour conserver les retours à la ligne du textarea --}}
                        {!! nl2br(e($blog->description)) !!}
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<style>
    .blog-content {
        white-space: pre-line; /* Aide aussi à respecter les sauts de ligne */
    }
</style>

@endsection