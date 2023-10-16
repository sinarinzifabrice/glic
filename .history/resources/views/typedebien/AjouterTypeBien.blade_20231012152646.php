@extends('layout')

@section('contenu')

    <div class="container">
        <div class="titre">
            <h1>Formulaire d'ajout de Type de bien</h1>
        </div>
    </div>




    <div class="container">

        <form class="row g-3" method="POST" action="{{ route('typedebiens.store') }}">
            @csrf
            <div class="formgroup col-6">
                <label for="type" class="form-label">Type<sup>*</sup></label>
                <input type="text" class="form-control" id="type" name="type" value="{{ old('type') }}" required>
            </div>
            @error('type')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <div class="formgroup col-12">
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
        </form>

    </div>
@endsection
