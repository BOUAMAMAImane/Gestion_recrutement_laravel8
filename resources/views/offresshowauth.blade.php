@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des candidatures pour {{ $offre->titre }}</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Nom et prenom</th>
                <th>Emails</th>
                <th>CV</th>
                <th>lettres de motivation</th>
            </tr>
        </thead>
        <tbody>
          @foreach($candidatures as $candidature)
          <tr>
              <td>{{ $candidature->user->name }}</td>
              <td>{{ $candidature->user->email }}</td>
              <td><a href="{{ route('pdf.show', ['id' => $candidature->pdfs_id]) }}">{{ $candidature->pdf->title }}</a></td>
              <td>{{ $candidature->paragraph->content }}</td>
          </tr>
          @endforeach
        </tbody>

    </table>
</div>
@endsection
