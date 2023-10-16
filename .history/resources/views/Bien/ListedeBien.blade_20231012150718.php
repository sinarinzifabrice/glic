@extends('layout')

@section('contenu')
    <div>
        <div class=" titre">
            <h1>Liste des Biens</h1>
            <p><a href="/bien/create" class="btn btn-outline-success">Ajouter un bien</a></p>

        </div>

        <div class="container mt-4">
            @foreach ($biens as $bien)
                <div class="bien card mb-3 rounded-4" style="max-width: 60%;">
                    <div class="image">
                        @if ($bien->photo === null || $bien->photo === "pas-de-photo.jpg")

                            <img src={{ asset('storage/images/unnamed.jpg') }} class="img rounded-start" style="width: 300px;
                            aspect-ratio: auto 1 / 1" alt="">
                        @else
                        <img src={{ asset('storage/images/'.$bien->photo) }} class="img rounded-start" alt="" style="width: 300px;
                        aspect-ratio: auto 1 / 1" alt="">
                        @endif
                    </div>
                    <div class="row g-0">

                        <div class="col-md-8">
                            <div class="card-body">

                                @if ($bien->statut == '0')
                                    <p class="card-text"><span class="badge rounded-pill text-bg-danger">vide</span></p>
                                @endif
                                @if ($bien->statut == '1')
                                    <p class="card-text"><span class="badge rounded-pill text-bg-success">occupe</span></p>
                                @endif
                                <h2 class="card-title">{{ $bien->typede_Bien->type }} </h2>
                                <p class="card-text"><small class="text-muted">{{ $bien->numrue }} {{ $bien->nomrue }}</small>
                                </p>
                                <p class="card-text"><small class="text-muted">{{ $bien->quartier }}, {{ $bien->ville }},
                                    </small></p>
                                <p class="card-text">le loyer est de {{ $bien->loyer }}$</p>

                            </div>
                            <div class="card-body d-flex flex-row justify-content-between">
                                <a href="{{ route('bien.edit', $bien->id) }}" class="btn btn-outline-primary btn-sm"><i
                                        class="fa-regular fa-pen-to-square"></i>modifier</a>
                                <a href="{{ route('bien.show', $bien->id) }}" class="btn btn-outline-primary btn-sm">
                                    <i class="fa-regular fa-eye"></i>voire</a>
                                <form action="/bien/{{ $bien->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger btn-sm"
                                        onclick="return confirm('Souhaitez-vous procéder à la suppression du bien ?');">
                                        <i class="fa-regular fa-trash-can"></i>supprimer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>







@endsection