@extends('layout')

@section('contenu')
    <h1>Formulaire de modification de Bien</h1>

    <div class="container">

        <form id="bien" name="bien" class="needs-validation row g-3" method="POST" action="{{ route('bien.update', $bien->id) }}" novalidate enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="formgroup col-md-6">
                <label for="loyer" class="form-label">Loyer<sup>*</sup></label>
                <input type="number" class="form-control" id="loyer" name="loyer"
                    value="{{ old('loyer') ? old('loyer') : $bien->loyer }}">
                @error('loyer')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

            </div>
            <div class="formgroup col-md-6">
                <label for="numappartement" class="form-label">Numéro d'appartement<sup>*</sup></label>
                <input type="number" class="form-control" id="numappartement" name="numappartement"
                    value="{{ old('numappartement') ? old('numappartement') : $bien->numappartement }}"
                    title="le champ est obligatoire">
                @error('numappartement')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

            </div>
            <div class="formgroup col-6">
                <label for="numrue" class="form-label">Numéro de rue<sup>*</sup></label>
                <input type="number" class="form-control" id="numrue" name="numrue"
                    value="{{ old('numrue') ? old('numrue') : $bien->numrue }}" title="le champ est obligatoire">
                @error('numrue')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

            </div>
            <div class="formgroup col-6">
                <label for="nomrue" class="form-label">Nom de rue<sup>*</sup></label>
                <input type="text" class="form-control" id="nomrue" name="nomrue"
                    value="{{ old('nomrue') ? old('nomrue') : $bien->nomrue }}" title="le champ est obligatoire">
                @error('nomrue')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

            </div>
            <div class="formgroup col-md-6">
                <label for="quartier" class="form-label">Quartier<sup>*</sup></label>
                <input type="text" class="form-control" id="quartier" name="quartier" value="{{ $bien->quartier }}"
                    title="le champ est obligatoire">
                @error('quartier')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

            </div>
            <div class="formgroup col-md-6">
                <label for="ville" class="form-label">Ville<sup>*</sup></label>
                <input type="text" class="form-control" id="ville" name="ville" value="{{ $bien->ville }}"
                    title="le champ est obligatoire">
                @error('ville')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

            </div>
            <div class="formgroup col-12">
                <label for="statut" class="form-label">Occupé</label>
                <input type="checkbox" name="statut" value="1" @checked($bien->statut || old('statut', 0) === 1)>

            </div>

            <div class="col-8">
                <label for="photo" class="form-label">Default file input example</label>
                @if ($bien->photo === null || $bien->photo === "pas-de-photo.jpg")

                <input class="form-control" type="file" value ="{{ $bien->pho }}" name="photo" id="photo">
                @else
                    <img src={{ asset('storage/images/'.$bien->photo) }} class="img-fluid" alt="">
                    @endif
                <input class="form-control" type="file" value="/public/storage/images" name="photo" id="photo">
              </div>

            <div class="formgroup col-12">
                <button type="submit" class="btn btn-primary">Modifier</button>
            </div>
        </form>

    </div>
@endsection
