<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="resources/css/welcome.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/welcome.css') }}">

        <title>ReKrute.</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
         * {
                        padding: 0%;
                        margin: 0%;
                        box-sizing:border-box;
                        font-family: century;
                    }

                    body{
                    background-image: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)),url(/images/malsh-carrieres_site.jpeg);
                    height: 100vh;
                    background-size: cover;
                    background-position: center;
                    }

                    .logo a{
                        color: white;
                        padding: 0px 20px;
                        border: 1px solid white;
                        position: absolute;
                        top: 10px;
                        left: 10px;
                        text-transform:capitalize;
                        text-decoration:none;
                        font-weight: 900;
                        text-shadow: rgba(0,0, 0, 0);
                    }
                    .logo span{
                        color:blue;
                        font-weight: bold;
                        font-size: 2rem;
                    }
                    ul {
                        list-style: none;
                        float: right;
                        display: flex;
                        margin-top: 20px;
                    }
                    ul li a{
                        text-decoration: none;
                        color: aliceblue;
                        padding: 5px 10px;
                        text-transform:uppercase;
                        border: 1px solid #fff;
                        margin: 5px;
                        font-weight: 400;
                        /*pour animation du menu*/
                        transition: 0s ease;
                    }
                    ul li a:hover{
                        background-color: #fff;
                        color: black;
                    }
                    .titre{
                    
                        position:absolute;
                        top: 200px;
                        left: 510px;

                    }
                    .titre h1{
                        color: #fff;
                        font-size: 60px;
                    }
                    .button{
                        position: absolute;
                        top: 300px;
                        left: 544px;
                        
                    }
                    .button a{
                        text-decoration: none;
                        color:#fff;
                        text-transform:uppercase;
                        border: 1px solid #fff;
                        padding: 5px 10px;
                    }
                    .btn{
                        transition: 0.6s ease;
                    }
                    .btn:hover{
                        background-color: #fff;
                        color: black;
                    }
        </style>
    </head>
    <body >
        <div class="principal">
               <div class="logo">
                   <a href="#"><span>R</span>e<span>K</span>rute<span>.</span></a>   
               </div>
            
            @if (Route::has('login'))
                <ul>
                    <li>
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                   
                    </li>
                    @else
                    <li>
                        <a href="{{ route('login') }}">Log in</a>
                    </li>
                    @if (Route::has('register'))
                        <li>

                        <a href="{{ route('register') }}">Register</a>
                        @endif
                        </li>
                    @endauth
                    
                </ul>
            @endif
    
        <div class="titre">
            <h1>Bienvenue</h1>
        </div>
        <div class="button">
            <a href="{{ route('offre.showauth') }}"class="btn">Consulter les offres</a>
        </div>
    </body>
</html>
