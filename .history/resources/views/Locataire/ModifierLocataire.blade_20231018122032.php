@extends('layout')

@section('contenu')
    <h1>Formulaire de modification de Bien</h1>

    <div class="container">

        <form id="locataire" name="locataire" class="needs-validation row g-3" method="POST"
            action="{{ route('locataires.update', $locataire->id) }}" novalidate>
            @method('PUT')
            @csrf
            <div class="formgroup col-md-6">
                <label for="nom" class="form-label">Nom<sup>*</sup></label>
                <input type="text" class="form-control" id="nom" name="nom"
                    value="{{ old('nom') ? old('nom') : $locataire->nom }}" required>
                @error('loyer')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="invalid-feedback">
                    <p>Le champ nom est obligatoire</p>
                </div>
            </div>
            <div class="formgroup col-md-6">
                <label for="prenom" class="form-label">prenom<sup>*</sup></label>
                <input type="text" class="form-control" id="prenom" name="prenom"
                    value="{{ old('prenom') ? old('prenom') : $locataire->prenom }}" required>
                @error('prenom')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="invalid-feedback">
                    <p>Le champ loyer est obligatoire</p>
                </div>
            </div>
            <div class="formgroup col-6">
                <label for="email" class="form-label">Courriel<sup>*</sup></label>
                <input type="email" class="form-control" id="email" name="email"
                    value="{{ old('email') ? old('email') : $locataire->email }}" required>
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="invalid-feedback">
                    <p>Le champ loyer est obligatoire</p>
                </div>
            </div>
            <div class="formgroup col-md-6">
                <label for="emailcontact" class="form-label">Courriel de contact<sup>*</sup></label>
                <input type="email" class="form-control" id="emailcontact" name="emailcontact"
                    value="{{ $locataire->emailcontact }}" required>
                @error('emailcontact')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="invalid-feedback">
                    <p>Le champ loyer est obligatoire</p>
                </div>
            </div>
            <div class="formgroup col-6">
                <label for="telephone" class="form-label">Telephone<sup>*</sup></label>
                <input type="text" class="form-control" id="telephone" name="telephone"
                    value="{{ old('telephone') ? old('telephone') : $locataire->telephone }}"
                    required
                >
                @error('telephone')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="invalid-feedback">
                    <p>Le champ loyer est obligatoire</p>
                </div>
            </div>
            <div class="formgroup col-md-6">
                <label for="nomentreprise" class="form-label">Nom Entreprise</label>
                <input type="text" class="form-control" id="nomentreprise" name="nomentreprise"
                    value="{{ $locataire->nomentreprise }}" required>
                @error('nomentreprise')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="invalid-feedback">
                    <p>Le champ loyer est obligatoire</p>
                </div>
            </div>
            <div class="formgroup col-12">
                <button type="submit" class="btn btn-primary">Modifier</button>
            </div>
        </form>

    </div>
@endsection
