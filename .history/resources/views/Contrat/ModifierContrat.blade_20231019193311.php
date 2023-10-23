@extends('layout')

@section('contenu')
    <h1>Formulaire de modification de Contrat</h1>

    <div class="container">

        <form class="needs-validation row g-3" method="POST" action="{{ route('contrats.update', $contrat->id) }}" novalidate>
            @method('PUT')
            @csrf
            <div class="formgroup col-md-6">
                <label for="datedebut" class="form-label">Date de début de contrat<sup>*</sup></label>
                <input type="date" class="form-control" id="datedebut" name="datedebut"
                    value="{{ old('datedebut') ? old('datedebut') : $contrat->datedebut }}">
                @error('loyer')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="invalid-feedback">
                    <p>Le champ date debut est obligatoire</p>
                </div>
            </div>
            <div class="formgroup col-md-6">
                <label for="datefin" class="form-label">Date de début de contrat<sup>*</sup></label>
                <input type="date" class="form-control" id="datefin" name="datefin"
                    value="{{ old('datefin') ? old('datefin') : $contrat->datefin }}"
                    title="le champ est obligatoire">
                @error('datefin')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="invalid-feedback">
                    <p id="error-datefin">Le champ date fin est obligatoire. </p>
                    <p></p>
                </div>
            </div>

            <div class="formgroup col-md-4">
                <label for="bien" class="form-label">sélectionner le bien<sup>*</sup></label>
                <select id="bien" class="form-select" name="bien">
                    @foreach ($biens as $bien)
                        <option value="{{ $bien->id }}" @if ($contrat->bien == $bien->id) selected @endif>
                            {{ $bien->quartier }}, {{ $bien->numappartement }}-{{ $bien->numrue }} {{ $bien->nomrue }},  {{ $bien->ville }}</option>
                    @endforeach

                </select>
                @error('bien')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="formgroup col-md-4">
                <label for="locataire" class="form-label">sélectionner le locataire<sup>*</sup></label>
                <select id="locataire" class="form-select" name="locataire">
                    @foreach ($locataires as $locataire)
                        <option value="{{ $locataire->id }}" @if ($contrat->locataire == $locataire->id) selected @endif>
                            {{ $locataire->nom }} {{ $locataire->prenom }} {{ $locataire->email }} </option>
                    @endforeach

                </select>
                @error('locataire')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="formgroup col-12">
                <label for="approuve" class="form-label">Approuver</label>
                <input type="checkbox" name="approuve" value="1" @checked($contrat->approuve || old('approuve', 0) === 1)>

            </div>

            <div class="formgroup col-12">
                <button type="submit" class="btn btn-primary">Modifier</button>
            </div>
        </form>

    </div>
@endsection
