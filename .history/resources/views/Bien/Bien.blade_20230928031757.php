@extends('layout')

@section('contenu')

    <h1>Bien</h1>
    <p><a href="/bien" class="btn btn-outline-success">retour à la page liste</a></p>

    <div class="container">

        <div class="card mb-3" style="max-width: 60%;">
            <div class="row g-0">

                <div class="image">
                    @if ($bien->photo === null || $bien->photo === "pas-de-photo.jpg")

                        <img src={{ asset('storage/images/unnamed.jpg') }} class="img rounded-start" style="width: 300px;
                        aspect-ratio: auto 1 / 1" alt="">
                    @else
                    <img src={{ asset('storage/images/'.$bien->photo) }} class="img rounded-start" alt="" style="width: 300px;
                    aspect-ratio: auto 1 / 1" alt="">
                    @endif
                </div>
                <div class="col-md-8">
                    <div class="card-body">

                        @if ($bien->statut == '0')
                            <p class="card-text">
                                <span class="badge rounded-pill text-bg-danger">vide</span>
                            </p>
                        @endif
                        @if ($bien->statut == '1')
                            <p class="card-text">
                                <span class="badge rounded-pill text-bg-success">occupe</span>
                            </p>
                        @endif

                        <h2 class="card-title">
                            Adresse : {{ $bien->quartier }}, {{ $bien->numrue }} {{ $bien->nomrue }}
                        </h2>
                        <h2 class="card-title">Ville : {{ $bien->ville }}</h2>

                        <p class="card-text">le loyer est de {{ $bien->loyer }}$</p>

                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
