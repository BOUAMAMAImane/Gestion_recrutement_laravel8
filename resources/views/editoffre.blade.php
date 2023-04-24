@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifier une offre d'emploi</h1>

        <form action="{{ route('offre.update', $offre) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="titre_poste">Titre de poste</label>
                <input type="text" class="form-control" id="titre_poste" name="titre_poste" value="{{ $offre->titre_poste }}">
            </div>

            <div class="form-group">
                <label for="type_contrat">Type de contrat</label>
                <input type="text" class="form-control" id="type_contrat" name="type_contrat" value="{{ $offre->type_contrat }}">
            </div>

            <div class="form-group">
                <label for="ville">Ville</label>
                <input type="text" class="form-control" id="ville" name="ville" value="{{ $offre->ville }}">
            </div>

            <div class="form-group">
                <label for="entreprise">Entreprise</label>
                <input type="text" class="form-control" id="entreprise" name="entreprise" value="{{ $offre->entreprise }}">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="5">{{ $offre->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
@endsection
