@extends('layout')

@section('contenu')
    <h1>Formulaire d'ajout de Locataire</h1>

    <div class="container">

        <form class="needs-validation row g-3" method="POST" action="{{ route('locataires.store') }}" novalidate>
            @csrf
            <div class="formgroup col-md-6">
                <label for="nom" class="form-label">Nom<sup>*</sup></label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom') }}" required>
                @error('nom')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="invalid-feedback">
                    <p>Le champ loyer est obligatoire</p>
                </div>
            </div>

            <div class="formgroup col-md-6">
                <label for="prenom" class="form-label">Prenom<sup>*</sup></label>
                <input type="text" class="form-control" id="prenom" name="prenom" value="{{ old('prenom') }}" required>
                @error('prenom')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="invalid-feedback">
                    <p>Le champ prenom est obligatoire</p>
                </div>
            </div>


            <div class="formgroup col-12">
                <label for="email" class="form-label">Courriel<sup>*</sup></label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>



            <div class="formgroup col-12">
                <label for="emailcontact" class="form-label">Email de contact<sup>*</sup></label>
                <input type="email" class="form-control" id="emailcontact" name="emailcontact" value="{{ old('emailcontact') }}" required>
                @error('emailcontact')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="invalid-feedback">
                    <p>Le champ loyer est obligatoire</p>
                </div>
            </div>
            <div class="formgroup col-md-6">
                <label for="telephone" class="form-label">Telephone<sup>*</sup></label>
                <input type="text" class="form-control" id="telephone" name="telephone" value="{{ old('telephone') }}" required>
                @error('telephone')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <div class="invalid-feedback">
                    <p>Le champ loyer est obligatoire</p>
                </div>
            </div>
            <div class="formgroup col-md-6">
                <label for="nomentreprise" class="form-label">Nom de l'entreprise</label>
                <input type="text" class="form-control" id="nomentreprise" name="nomentreprise" value="{{ old('nomentreprise') }}">

            </div>

            <div class="formgroup col-12">
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
        </form>

    </div>
@endsection
