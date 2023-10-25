@extends('layout')
@section('contenu')
    <div class="container">
        <div class="titre">
            
        </div>
        <h1>Liste des Locataires</h1>

    <p><a href="/locataires/create" class="btn btn-outline-success">Nouveau Locataire</a></p>

    @if (session('statut'))
        <p class="alert alert-success alert-dismissible fade show">
            {{ session('statut') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </p>
    @endif

    <div class="container">

        @foreach ($locataires as $locataire)
            <div class="card" style="max-width: 540px;">
                <div class="card-body">
                    <h2 class="card-title">{{ $locataire->nom }} {{ $locataire->prenom }}</h2>
                    <h3 class="card-subtitle mb-2 text-muted">{{ $locataire->emailcontact }}</h3>
                    <h3 class="card-subtitle mb-2 text-muted">{{ $locataire->telephone }}</h3>
                    <div class="card-body d-flex flex-row justify-content-between">
                        <a href="{{ route('locataires.edit', $locataire->id) }}" class="btn btn-outline-primary btn-sm"><i
                                class="fa-regular fa-pen-to-square"></i> modifier
                        </a>
                        <a href="{{ route('locataires.show', $locataire->id) }}" class="btn btn-outline-primary btn-sm">
                            <i class="fa-regular fa-eye"></i> plus d'info
                        </a>
                        <form action="/locataires/{{ $locataire->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger btn-sm"
                                onclick="return confirm('Souhaitez-vous procéder à la suppression du locataire {{ $locataire->nom }} {{ $locataire->prenom }} ?');">
                                <i class="fa-regular fa-trash-can"></i>
                                supprimer
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    </div>

@endsection
