<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
           .pdf-form {
    margin-top: 20px;
    padding: 20px;
    background-color: #f5f5f5;
    border-radius: 5px;
}

.pdf-form label {
    font-weight: bold;
}

.pdf-form .form-control {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    margin-bottom: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

.pdf-form .form-control-file {
    margin-top: 5px;
    margin-bottom: 10px;
}

.pdf-form .btn {
    margin-top: 10px;
}

        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body >
    <div class="pdf-form">
    <form action="{{ route('pdfs.update', $pdf->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Titre :</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $pdf->title }}" required>
        </div>
        <div class="form-group">
            <label for="pdf">PDF :</label>
            <input type="file" name="pdf" id="pdf" class="form-control-file" accept=".pdf" required>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
    </form>
</div>

        
            
                  
    </body>
</html>
