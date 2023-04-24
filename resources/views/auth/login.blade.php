<!DOCTYPE html>
<html>
<head>
	<title>Page d'authentification</title>
    <style>
         *{
            padding: 0%;
            margin: 0%;
            box-sizing:border-box;
            font-family: century;
            }
            body {
            min-height: 83vh;
            background-image: url('/images/malsh-carrieres_site.jpeg');
            background-size: cover;
            background-repeat: no-repeat;
            font-family: Arial, sans-serif;
            }
            
            .container {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            margin: 100px auto;
            padding: 20px;
            max-width: 400px;
            }
            
            form {
            display: flex;
            flex-direction: column;
            align-items: center;
            }
            input[type=text], input[type=password] {
            padding: 10px;
            margin: 8px 0;
            border: none;
            border-radius: 5px;
            width: 100%;
            }
            input[type=text], input[type=email] {
            padding: 10px;
            margin: 8px 0;
            border: none;
            border-radius: 5px;
            width: 100%;
            }
            button[type=submit] {
            background-color:#354a8d;
            color: white;
            padding: 10px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            }
            
            button[type=submit]:hover {
            background-color: #354a8d;
            }
            
            label {
            display: block;
            margin: 10px 0;
            }
            
            #remember-me {
            margin-right: 5px;
            }
            
            a {
            text-align: center;
            display: block;
            margin-top: 10px;
            }
         
    </style>
</head>
<body>
	<div class="container">
		<form method="POST" action="{{ route('login') }}">
			@csrf
			<label for="email"><b>Adresse Mail :</b></label>
			<input type="email" placeholder="Entrez votre adresse email" name="email" required>

			<label for="password"><b>Mot de passe :</b></label>
			<input type="password" placeholder="Entrez votre mot de passe" name="password" required>

			<label for="remember-me"><input type="checkbox" id="remember-me" name="remember-me"> Se souvenir de moi</label>

			<a href="{{ route('password.request') }}">Mot de passe oublié?</a>

			<button type="submit">Se connecter</button>
		
		</form>
	</div>
</body>
</html>
