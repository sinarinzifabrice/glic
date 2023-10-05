@extends('layout')

@section('contenu')
    <h1>Liste des Biens</h1>
    <p><a href="/bien/create" class="btn btn-outline-success">ajouter un bien</a></p>
    @if (session('statut'))
    <div class="toast align-items-center text-bg-suc border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
          <div class="toast-body">
            Hello, world! This is a toast message.
          </div>
          <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
      </div>
    @endif

    </div>

    <div class="container">
        @foreach ($biens as $bien)
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">

                    <div class="col-md-8">
                        <div class="card-body">

                            @if ($bien->statut == '0')
                                <p class="card-text"><span class="badge rounded-pill text-bg-danger">vide</span></p>
                            @endif
                            @if ($bien->statut == '1')
                                <p class="card-text"><span class="badge rounded-pill text-bg-success">occupe</span></p>
                            @endif

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



@endsection
