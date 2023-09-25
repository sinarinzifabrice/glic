@extends('layout')

@section('contenu')
    <h1>Liste des Biens</h1>
    <p><a href="/bien/create" class="btn btn-outline-success">ajouter un bien</a></p>
    @if (session('delete'))
        <script>
            toastr.options = {
                "progressBar"
            }
        </script>
    @endif
    <div id="toast-success" class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
            </svg>
            <span class="sr-only">Check icon</span>
        </div>
        <div class="ml-3 text-sm font-normal">Le Bien a été bien enregisté.</div>
        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
    @endif
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
