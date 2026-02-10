@extends('admin.layout.navbar')
@section('title', 'ajouter une nouvelle catégorie | kaoural')
@section('suite')


    <div class="custom-container">
        <div class="row justify-content-center">
            <div class="col-xl-9 col-12">

                <!-- HEADER -->
                <div class="mb-6 d-flex justify-content-between align-items-center">
                    <h1 class="h2">Ajouter une nouvelle catégorie</h1>
                    <a class="btn btn-dark" href="{{ route('admin.categorie.index') }}">
                        Retour à la liste
                    </a>
                </div>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>

                        <li class="breadcrumb-item"><a href="{{ route('admin.categorie.index') }}">catégories</a></li>
                        <li class="breadcrumb-item active">Ajouter</li>
                    </ol>
                </nav>

                <form action="{{ route('admin.categorie.store') }}" method="POST">
                    @csrf
                    <div class="mb-5">
                        <h3>Nouvelle catégorie</h3>



                        <div class="row g-4">
                            <!-- Nom de la catégorie -->
                            <div class="col-md-6">
                                <label class="form-label">Nom de la catégorie</label>

                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="Ex: Plomberie"
                                    value="{{ old('name') }}" required>

                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                            <!-- Bouton -->
                            <div class="col-12 text-end">
                                <button class="btn btn-success">
                                    Enregistrer la catégorie
                                </button>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>


@endsection
