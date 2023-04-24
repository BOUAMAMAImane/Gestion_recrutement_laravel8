@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Candidate Dashboard</div>

                    <div class="card-body">
                        Welcome {{ Auth::user()->name }}, you are logged in as a candidate!
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
