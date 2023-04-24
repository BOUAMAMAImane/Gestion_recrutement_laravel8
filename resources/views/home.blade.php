@extends('layouts.app')

@section('content')
<style>
    .btn-primary {
    margin-right: 10px;
}

.btn-danger {
    margin-left: 10px;
}
.offre-liste {
    margin-top: 25px; /* add desired margin in pixels here */
  
    box-sizing: border-box;
  }

</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Espace Candidat') }}</div>
                <a class="btn btn-primary" href="{{ route('offre.showauth') }}">Consulter les offres</a>
                <div class="card-body">
                <form method="POST" action="{{ route('paragraphs.store') }}">
                    @csrf

                        <div class="form-group">
                            <label for="content">Contenu du paragraphe :</label>
                            <textarea id="content" name="content" class="form-control" rows="5">{{ old('content') }}</textarea>

                            @error('content')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                    <button type="submit" class="btn btn-primary">Ajouter le paragraphe</button>
                </form>
                <form action="{{ route('pdf.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Titre du PDF</label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="pdf_file">PDF</label>
                            <input type="file" name="pdf_file" id="pdf_file" class="form-control-file">
                        </div>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>     
                </form>
            </div>
        </div>
    </div>
</div>
<div class="container offre-liste">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Mes CV ') }}</div>

                <div class="card-body">
                @foreach ($pdfs as $pdf)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $pdf->title }}</h5>
                            <a href="{{ route('pdf.show', ['id' => $pdf->id]) }}" class="btn btn-primary">Afficher</a>
                            <a href="{{ route('pdfs.edit', $pdf->id) }}" class="btn btn-warning">Modifier</a>
                            <form action="{{ route('pdfs.destroy', $pdf->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce PDF ?')">Supprimer</button>
                            </form>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="container offre-liste">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Mes lettres de motivation ') }}</div>

                <div class="card-body">
                    @foreach($paragraphs as $paragraph)
                    <div class="card mb-3">
                        <div class="card-body">
                            <p class="card-text">{{ $paragraph->content }}</p>
                            <form action="{{ route('paragraphs.update', $paragraph->id) }}" method="POST" class="d-inline-block">
                                <a href="{{ route('paragraphs.edit', $paragraph->id) }}" class="btn btn-primary">Modifier</a>
                            </form>
                            <form action="{{ route('paragraphes.destroy', $paragraph->id ) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="paragraphe_id" value="{{ $paragraph->id }}">
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </div>
                    </div>
                    @endforeach     
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
