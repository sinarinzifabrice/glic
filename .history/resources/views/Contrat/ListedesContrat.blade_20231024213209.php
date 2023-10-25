@extends('layout')
@section('contenu')
    <div class="container">
        <div class="titre">
            <h1>Liste des contrats</h1>
            <p>
                <a href="/contrats/create" class="btn btn-outline-success">Nouveau Contrat</a>
            </p>
        </div>

        <div class="mt-4">
            
        </div>

    @if (session('statut'))
        <p class="alert alert-success alert-dismissible fade show">
            {{ session('statut') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </p>
    @endif

    <div class="container">

        @foreach ($contrats as $contrat)
            <div class="card" style="max-width: 540px;">
                <div class="card-body">
                    <h2 class="card-title">{{ $contrat->Locataire->nom }} {{ $contrat->Locataire->prenom }} </h2>

                    <h2 class="card-title">Contrat Du {{ $contrat->datedebut }} Au {{ $contrat->datefin }}</h2>
                    @if ($contrat->approuve == '0')
                        <p class="card-text"><span class="badge rounded-pill text-bg-warning">en attante</span></p>
                    @endif
                    @if ($contrat->approuve == '1')
                        <p class="card-text"><span class="badge rounded-pill text-bg-success">approuvé</span></p>
                    @endif
                    <div class="card-body d-flex flex-row justify-content-between">
                        <a href="{{ route('contrats.edit', $contrat->id) }}" class="btn btn-outline-primary btn-sm"><i
                                class="fa-regular fa-pen-to-square"></i> modifier
                        </a>
                        <a href="{{ route('contrats.show', $contrat->id) }}" class="btn btn-outline-primary btn-sm">
                            <i class="fa-regular fa-eye"></i> plus d'info
                        </a>
                        <form action="/contrats/{{ $contrat->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger btn-sm"
                                onclick="return confirm('Souhaitez-vous procéder à la suppression du contrat de \n {{ $contrat->Locataire->nom }} {{ $contrat->Locataire->prenom }} \n sur le bien \n {{ $contrat->Bien->numrue }} {{ $contrat->Bien->nomrue }} {{ $contrat->Bien->quartier }} ?');">
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
