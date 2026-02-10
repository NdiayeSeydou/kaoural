@extends('admin.layout.navbar')

@section('title', 'Modifier l\'article | kaoural')

@section('suite')

<div class="custom-container">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-12">

            <div class="mb-6 d-flex justify-content-between align-items-center">
                <h1 class="h2">Modifier l'article</h1>
                <a class="btn btn-dark" href="{{ route('admin.blog.index') }}">
                    <i class="fe fe-arrow-left me-2"></i>Retour à la liste
                </a>
            </div>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">Accueil</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.blog.index') }}">Blog</a>
                    </li>
                    <li class="breadcrumb-item active">Modifier</li>
                </ol>
            </nav>

            <div class="card border-0 shadow-sm">
                <div class="card-body p-lg-5">

                    <form action="{{ route('admin.blog.update', $blog->public_id) }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <div class="row g-4">

                            {{-- TITRE --}}
                            <div class="col-12">
                                <label class="form-label fw-bold">Titre de l'article</label>
                                <input type="text"
                                       name="title"
                                       class="form-control @error('title') is-invalid @enderror"
                                       value="{{ old('title', $blog->title) }}"
                                       required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- IMAGE --}}
                            <div class="col-12">
                                <label class="form-label fw-bold">Image de couverture</label>

                                @if(!empty($blog->image))
                                    <div class="mb-3">
                                        <p class="small text-muted mb-2">Image actuelle :</p>
                                        <img src="{{ asset('storage/'.$blog->image) }}"
                                             alt="Image actuelle"
                                             class="rounded-3 border"
                                             width="150"
                                             height="100"
                                             style="object-fit: cover;">
                                    </div>
                                @endif

                                <input type="file"
                                       name="image"
                                       class="form-control @error('image') is-invalid @enderror">

                                <small class="text-muted">
                                    Laissez vide pour conserver l'image actuelle (JPG, PNG, Max 2Mo)
                                </small>

                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- DESCRIPTION --}}
                            <div class="col-12">
                                <label class="form-label fw-bold">Description / Contenu</label>
                                <textarea name="description"
                                          rows="10"
                                          class="form-control @error('description') is-invalid @enderror"
                                          required>{{ old('description', $blog->description) }}</textarea>

                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- BOUTON --}}
                            <div class="col-12 text-end mt-4">
                                <button type="submit" class="btn btn-primary px-4">
                                    <i class="fe fe-save me-2"></i>
                                    Enregistrer les modifications
                                </button>
                            </div>

                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection
