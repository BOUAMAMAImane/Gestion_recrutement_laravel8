@extends('layouts.app')

@section('content')
<style>
  .offre-liste {
    margin-top: 25px; /* add desired margin in pixels here */
    width: 500%;
    height: 300px;
    box-sizing: border-box;
  }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Formulaire de recrutement') }}</div>

                <div class="card-body">
                <form method="POST" action="{{ route('offres.store') }}">
                            @csrf
                            
                            <div class="form-group row mt-3">
                                <label for="titre_poste" class="col-md-4 col-form-label text-md-right">{{ __('Titre de poste') }}</label>

                                <div class="col-md-6">
                                    <input id="titre_poste" type="text" class="form-control @error('titre_poste') is-invalid @enderror" name="titre_poste" value="{{ old('titre_poste') }}" required autocomplete="titre_poste" autofocus>

                                    @error('titre_poste')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="type_contrat" class="col-md-4 col-form-label text-md-right">{{ __('Type de contrat') }}</label>

                                <div class="col-md-6">
                                    <input id="type_contrat" type="text" class="form-control @error('type_contrat') is-invalid @enderror" name="type_contrat" value="{{ old('type_contrat') }}" required autocomplete="type_contrat">

                                    @error('type_contrat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="entreprise" class="col-md-4 col-form-label text-md-right">{{ __('Entreprise') }}</label>

                                <div class="col-md-6">
                                    <input id="entreprise" type="text" class="form-control @error('entreprise') is-invalid @enderror" name="entreprise" value="{{ old('entreprise') }}" required autocomplete="entreprise">

                                    @error('entreprise')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="ville" class="col-md-4 col-form-label text-md-right">{{ __('Ville') }}</label>

                                <div class="col-md-6">
                                    <input id="ville" type="text" class="form-control @error('ville') is-invalid @enderror" name="ville" value="{{ old('ville') }}" required autocomplete="ville">

                                    @error('ville')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description">{{ old('description') }}</textarea>

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row mt-3">
                                <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Enregistrer') }}
                                </button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div> 

<div class="container offre-liste">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Liste des offres ') }}</div>

                <div class="card-body">
                    
                    @foreach($offres as $offre)
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $offre->titre }}</h4>
                                    <p class="card-text">Titre de poste: {{ $offre->titre_poste }}</p>
                                    <p class="card-text">Type de contrat : {{ $offre->type_contrat }}</p>
                                    <p class="card-text">Ville : {{ $offre->ville }}</p>
                                    <p class="card-text">Entreprise : {{ $offre->entreprise }}</p>
                                    <p class="card-text">Description : {{ $offre->description }}</p>
                                    <form action="{{ route('offre.destroy', $offre->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                    <a href="{{ route('offre.edit', $offre->id) }}" class="btn btn-primary d-inline ml-2">Modifier</a>
                                    <a href="{{ route('offres.showauth', $offre->id) }}" class="btn btn-primary">Consulter les candidatures</a>
                                </div>
                            </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div> 

                
@endsection
