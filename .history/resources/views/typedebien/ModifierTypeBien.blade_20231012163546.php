@extends('layout')

@section('contenu')

    

    <div class="titre">
        <h1>Formulaire de modification de type bien</h1>
    </div>


    <div class="container">

        <form id="typebien" name="typebien" class="needs-validation row g-3" method="POST"
            action="{{ route('typedebiens.update', $typedebien->id) }}" novalidate>
            @method('PUT')
            @csrf
            <div class="formgroup col-6">
                <label for="type" class="form-label">Type<sup>*</sup></label>
                <input type="text" class="form-control" id="type" name="type" value="{{ $typedebien->type }}">
                @error('type')
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
