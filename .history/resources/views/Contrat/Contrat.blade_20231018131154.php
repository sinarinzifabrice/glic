@extends('layout')

@section('contenu')
    <h1>Contrat</h1>
    <p><a href="/contrats" class="btn btn-outline-success">retour à la page liste</a></p>

    <div class="container">

        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">

                <div class="col-md-8">
                    <div class="card-body">
                        <h2 class="card-title">Locataire : {{ $contrat->Locataire->nom }} {{ $contrat->Locataire->prenom }} </h2>
                        <h2 class="card-title">Contrat Du :{{ $contrat->datedebut }}  Au :{{ $contrat->datefin }}</h2>
                        @if ($contrat->approuve == '0')
                            <p class="card-text"><span class="badge rounded-pill text-bg-warning">en attante</span></p>
                        @endif
                        @if ($contrat->approuve == '1')
                            <p class="card-text"><span class="badge rounded-pill text-bg-success">approuvé</span></p>
                        @endif
                        <p class="card-text">Adresse: <small class="text-muted">{{ $contrat->Bien->numrue }} {{ $contrat->Bien->nomrue }}</small></p>
                        <p class="card-text">Quarier : <small class="text-muted">{{ $contrat->Bien->quartier }}</small></p>
                        <p class="card-text">Ville : <small class="text-muted">{{ $contrat->Bien->ville }}</small></p>
                        <p class="card-text">le loyer est de : <small class="text-muted">{{ $contrat->Bien->loyer }} BIF </small></p>

                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
