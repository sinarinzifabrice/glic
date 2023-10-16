@extends('layout')
@section('contenu')

    <div class="container">
        <div class="titre">
            <h1>Liste de type de bien</h1>
            <p>
                <a href="/typedebiens/create" class="btn btn-outline-success">Nouveau Type</a>
            </p>
        </div>

        <div class="mt-4">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Numéro</th>
                        <th>Type</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($types as $type)
                        <tr>
                            <td>{{ $type->id }}</td>
                            <td>{{ $type->type }}</td>
                            <td><a href="{{ route('typedebiens.edit', $type->id) }}" class="btn btn-outline-primary"><i
                                        class="fa-regular fa-pen-to-square"></i>modifier</a>

                            </td>
                            <td>
                                <form action="/typedebiens/{{ $type->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger btn-sm"
                                        onclick="return confirm('Souhaitez-vous procéder à la suppression de ce type ?');">
                                        <i class="fa-regular
                                        fa-trash-can"></i>
                                        supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>


    </div>






@endsection
