@extends('layouts.app')

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


<style>
    .offre-titre {
    font-size: 1.5em;
    font-weight: bold;
    color:blue;
    }
    body {
      background-color: #f0f0f0;
      background-image: url('/images/malsh-carrieres_site.jpeg');
      font-family: Arial, sans-serif;
      font-size: 16px;
      line-height: 1.5;
    }

    h1 {
      font-size: 2em;
      text-align: center;
      margin-top: 20px;
    }

    ul {
      list-style: none;
      padding: 0;
      margin: 0 auto;
      width: fit-content;
    }

    .card {
      width: 500px;
      margin: 0 auto;
      background-color: #fff;
      border-radius: 50px;
      box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.2);
      margin: 10px;
      overflow: hidden;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
    }

    .card-body {
      width: 80%;
      margin: auto;
      text-align: center;
    }

    .card-sm {
      width: 200px;
    }

    .card-title {
      margin-top: 0;
    }

    .card-text {
      margin-bottom: 5px;
    }
    </style>

<body>
    <div>
        <h1>Les offres d'emploi</h1>
        <ul>
            @foreach($offres as $offre)
                <div class="card mb-3">
                    <div class="card-body">
                        <h4 class="card-title offre-titre">{{ $offre->titre }}</h4>
                        <p class="card-text">Titre de poste: {{ $offre->titre_poste }}</p>
                        <p class="card-text">Type de contrat : {{ $offre->type_contrat }}</p>
                        <p class="card-text">Ville : {{ $offre->ville }}</p>
                        <p class="card-text">Entreprise : {{ $offre->entreprise }}</p>
                        <p class="card-text">Description : {{ $offre->description }}</p>
                        <form method="POST" action="{{ route('offres.postuler', ['offre' => $offre]) }}" id="postuler-form">
                            @csrf
                            <input type="submit" id="submit-btn" class="btn btn-primary postuler-btn" value="Postuler" onclick="return checkIfAlreadyApplied()">
                        </form>
                    </div>   
                </div>
            @endforeach
        </ul>
      <script>
      function checkIfAlreadyApplied() {
        // Get the user ID and job ID from the form action URL
        const url = document.getElementById('postuler-form').getAttribute('action');
        const userId = '{{ Auth::id() }}';
        const jobId = url.split('/').pop();
        
        // Check if the user has already applied for the job
        if (localStorage.getItem(`applied-${userId}-${jobId}`)) {
          alert('Vous avez déjà postulé pour cette offre.');
          return false;
        }
        
        // Set a flag to indicate that the user has applied for the job
        localStorage.setItem(`applied-${userId}-${jobId}`, 'true');
        
        return true;
      }
      </script>

    </div> 
</body>
          
@endsection