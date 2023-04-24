<!DOCTYPE html>
<html>
<head>
	<title>Page d'authentification</title>
    <header>
    <style>
    *{
	padding: 0%;
	margin: 0%;
	box-sizing:border-box;
	font-family: century;
	}
	body {
	min-height: 50vh;
    background-image: url('/images/malsh-carrieres_site.jpeg');
	background-size: cover;
	background-repeat: no-repeat;
	font-family: Arial, sans-serif;
	}
	
	.container {
	background-color: rgba(255, 255, 255, 0.8);
	border-radius: 10px;
	box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
	margin: 47px auto;
	padding: 20px;
	max-width: 400px;
	}
	
	form {
	display: flex;
	flex-direction: column;
	align-items: center;
	}
	input[type=text], input[type=user_type] {
		padding: 10px;
		margin: 8px 0;
		border: none;
		border-radius: 5px;
		width: 100%;
		}
	input[type=text], input[type=password] {
	padding: 10px;
	margin: 8px 0;
	border: none;
	border-radius: 5px;
	width: 100%;
	}
   

    select#user_type {
    border: 1px solid #ccc;
    border-radius: 4px;
    padding: 5px;
    font-size: 16px;
    }

	input[type=text], input[type=password-confirm] {
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
</style>
    </header>

<body>
<div class="container">
    <form method="POST" action="{{ route('register') }}">
        @csrf
        
        <label for="name"><b>Nom d'utilisateur</b></label>
        <input id="name" placeholder="Confirmer votre mot de passe"type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    
        <label for="user_type"><b>User Type</b></label>
        <select id="user_type" name="user_type">
            <option value="candidate">{{ __('Candidate') }}</option>
            <option value="recruiter">{{ __('Recruiter') }}</option>
        </select>
        @error('user_type')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror    
        <label for="email"><b>Adresse Mail :</b></label>
        <input id="email" placeholder="Entrez votre adress mail" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
             
        <label for="password"><b>Mot de passe :</b></label>
        <input id="password" placeholder="Entrez votre mot de passe" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
 
        <label for="password-confirm"><b>Confirm Password :</b></label>
        
        <input id="password-confirm" placeholder="Confirmez votre mot de passe" type="password" name="password_confirmation" required autocomplete="new-password">
        <button type="submit">{{ __('Register') }}</button>
    
</form>
</div>
</body>
</html>
