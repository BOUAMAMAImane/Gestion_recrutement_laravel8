@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Offres d'emploi</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Titre</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Date de publication</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($offres as $offre)
                                    <tr>
                                        <th scope="row">{{ $offre->id }}</th>
                                        <td>{{ $offre->titre }}</td>
                                        <td>{{ $offre->description }}</td>
                                        <td>{{ $offre->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
