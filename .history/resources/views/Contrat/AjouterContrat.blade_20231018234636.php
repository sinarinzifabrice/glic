@extends('layout')

@section('contenu')
    <h1>Formulaire de création de contrat</h1>

    <div class="container">

        <form class="needs-validation row g-3" method="POST" action="{{ route('contrats.store') }}" novalidate>
            @csrf
            <div class="formgroup col-md-6">
            <label for="datedebut" class="form-label">Date de début de contrat<sup>*</sup></label>
            <input type="date" class="form-control" id="datedebut" name="datedebut"
                value="{{ old('datedebut', date('Y-m-d')) }}" required>
            @error('datedebut')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <div class="invalid-feedback">
                <p>Le champ datedebut est obligatoire</p>
                <p id="error-datedebut"></p>
            </div>
    </div>
    <div class="formgroup col-md-6">
        <label for="datefin" class="form-label">Date de fin de contrat<sup>*</sup></label>
        <input type="date" class="form-control" value="{{ old('datefin', date('Y-m-d')) }}" id="datefin" name="datefin"
            required>
        @error('datefin')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <div class="invalid-feedback">
            <p>Le champ datefin est obligatoire</p>
        </div>
    </div>

    <div class="formgroup col-md-4">
        <label for="bien" class="form-label">sélectionner le bien</label>
        <select id="bien" class="form-select" name="bien" required>
            @foreach ($biens as $bien)
                <option value="{{ $bien->id }}">
                    {{ $bien->quartier }}, {{ $bien->numappartement }}-{{ $bien->numrue }} {{ $bien->nomrue }},
                    {{ $bien->ville }}</option>
            @endforeach

        </select>
        @error('bien')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <div class="invalid-feedback">
            <p>Le champ loyer est obligatoire</p>
        </div>
    </div>

    <div class="formgroup col-md-4">
        <label for="locataire" class="form-label">sélectionner le locataire<sup>*</sup></label>
        <select id="locataire" class="form-select" name="locataire" required>
            @foreach ($locataires as $locataire)
                <option value="{{ $locataire->id }}">
                    {{ $locataire->nom }} {{ $locataire->prenom }} {{ $locataire->email }} </option>
            @endforeach

        </select>
        @error('locataire')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <div class="invalid-feedback">
            <p>Le champ loyer est obligatoire</p>
        </div>
    </div>
    {{-- @can('access-admin') --}}
        <div class="formgroup col-12">
            <label for="approuve" class="form-label">Approuver</label>
            <input type="checkbox" name="approuve" value="{{ old('approuve') }}">

        </div>
    {{-- @endcan --}}
    <div class="formgroup col-12">
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </div>
    </form>

    </div>
@endsection
