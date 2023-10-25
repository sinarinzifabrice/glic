@extends('layout')

@section('contenu')

    <div class="container">
        <div class="titre">
            <h1>Formulaire d'ajout de Bien</h1>
        </div>

        <div class="mt-4">

            <form id="bien" class="needs-validation needs-validations row g-3" method="POST" action="{{ route('bien.store') }}" novalidate enctype="multipart/form-data">
                @csrf
                <div class="formgroup col-md-6">
                    <label for="loyer" class="form-label">Loyer<sup>*</sup></label>
                    <input type="number" class="form-control" id="loyer" name="loyer" min="120000"
                        value="{{ old('loyer') }}" required
                    >
                    @error('loyer')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="invalid-feedback">
                        <p>Le champ loyer est obligatoire et le montant minimum est de 120000</p>
                    </div>
                </div>
                <div class="formgroup col-md-6">
                    <label for="numappartement" class="form-label">Numéro d'appartement</label>
                    <input type="number" class="form-control" value="{{ old('numappartement') }}" id="numappartement"
                        name="numappartement">

                </div>
                <div class="formgroup col-12">
                    <label for="numrue" class="form-label">Numéro de rue<sup>*</sup></label>
                    <input type="number" class="form-control" value="{{ old('numrue') }}" id="numrue" name="numrue"
                        required>
                    <div class="invalid-feedback">
                        <p>Le champ numéro de rue est obligatoire</p>
                    </div>
                    @error('numrue')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="formgroup col-12">
                    <label for="nomrue" class="form-label">Nom de rue<sup>*</sup></label>
                    <input type="text" class="form-control" value="{{ old('nomrue') }}" id="nomrue" name="nomrue"
                        required>
                    <div class="invalid-feedback">
                        <p>Le champ nom de rue est obligatoire</p>
                    </div>
                    @error('nomrue')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="formgroup col-md-6">
                    <label for="quartier" class="form-label">Quartier<sup>*</sup></label>
                    <input type="text" class="form-control" value="{{ old('quartier') }}" id="quartier" name="quartier"
                        required>
                    <div class="invalid-feedback">
                        <p>Le champ quartier est obligatoire</p>
                    </div>
                    @error('quartier')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="formgroup col-md-6">
                    <label for="ville" class="form-label">Ville<sup>*</sup></label>
                    <input type="text" class="form-control" value="{{ old('ville') }}" id="ville" name="ville"
                        required>
                    <div class="invalid-feedback">
                        <p>Le champ ville est obligatoire</p>
                    </div>
                    @error('ville')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="formgroup col-md-4">
                    <label for="typede_bien" class="form-label">Type de Bien</label>
                    <select id="typede_bien" class="form-select" name="typede_bien">
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}">
                                {{ $type->type }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="formgroup col-md-4">
                    <label for="statut" class="form-label">Statut</label>
                    <input type="number" class="form-control" value="0" id="statut" name="statut" readonly d>

                    {{-- <select id="statut" class="form-select" name="statut">
                        <option @selected(old('statut') === 'vide') value="0">Vide</option>
                        <option @selected(old('statut') === 'occupe') value="1">Occupe</option>
                    </select> --}}
                </div>

                <div class="col-8">
                    <label for="photo" class="form-label">Mettre l'image du bien</label>
                    <input class="form-control" type="file" name="photo" id="photo" accept="image/jpg, image/jpeg, image/png">
                </div>

                <div class="formgroup col-12">
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </form>

        </div>
    </div>

@endsection