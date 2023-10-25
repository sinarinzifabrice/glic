@extends('layout')

@section('contenu')
    <div class="container">
        <div class="titre">
            <h1>Locataire</h1>
            <p>
                <a href="/locataires" class="btn btn-outline-success">retour à la page liste</a>
            </p>
        </div>
    <div class="mt-4">

    </div>

    < class="container">

        <div class="card mb-6" style="max-width: 540px;">
            <div class="row">

                <div class="col-12">
                    <div class="card-body">
                        <h2 class="card-title">Nom complet : {{ $locataire->nom }} {{ $locataire->prenom }}</h2>
                        <h2 class="card-title">Courriel : {{ $locataire->email }} </h2>
                        <h2 class="card-title">Courriel de contact: {{ $locataire->emailcontact }} </h2>
                        <h2 class="card-text">Téléphone : {{ $locataire->telephone }}</h2>

                        @if ($locataire->nomentreprise != null)
                            <h2 class="card-text">Nom entreprise : {{ $locataire->nomentreprise }} </h2>
                        @endif

                    </div>
                </div>
            </div>
        </div>

    
    </div>

@endsection
