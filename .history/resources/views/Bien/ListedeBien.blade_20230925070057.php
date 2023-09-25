


    <h1>Liste des Biens</h1>
    <p><a href="/bien/create" class="btn btn-outline-success">ajouter un bien</a></p>
    @if (session('statut'))
        <p class="alert alert-success alert-dismissible fade show">
            {{ session('statut') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </p>
    @endif --}}
    {{-- <div class="container">
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



    <div class="container">
        @foreach ($biens as $bien)

        @if ($bien->statut == '0')
            <span class="bg-red-100 text-red-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Vide</span>
        @endif
        @if ($bien->statut == '1')
            <span class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Occupé</span>
        @endif

        <a href="#" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $bien->numrue }} {{ $bien->nomrue }}</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
            </div>
        </a>
        @endforeach
    </div>





