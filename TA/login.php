<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
	<link rel="stylesheet" href="css/sss.css" />
	<title>Login</title>
</head>

<body>
	<div class="container" id="container">
		<div class="form-container sign-up">
			<form id="signUpForm">
				<h1>Create Account</h1>
				<div class="social-icons">
					<a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
					<a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
					<a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
					<a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
				</div>
				<span>or use your email for registration</span>
				<input type="text" placeholder="Name" id="nameInput" required />
				<span class="text-danger" id="nameError"></span>
				<input type="email" placeholder="Email" id="emailInput" required />
				<span class="text-danger" id="emailError"></span>
				<input type="password" placeholder="Password" id="passwordInput" required />
				<span class="text-danger" id="passwordError"></span>
				<select id="genderInput" required>
					<option value="" disabled selected>Select your gender</option>
					<option value="male">Male</option>
					<option value="female">Female</option>
				</select>
				<span class="text-danger" id="genderError"></span>
				<button type="submit">Sign Up</button>
			</form>
		</div>
		<div class="form-container sign-in">
			<form id="signInForm">
				<h1>Sign In</h1>
				<div class="social-icons">
					<a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
					<a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
					<a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
					<a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
				</div>
				<span>or use your email password</span>
				<input type="email" placeholder="Email" id="emailInputSignIn" required />
				<span class="text-danger" id="emailErrorSignIn"></span>
				<input type="password" placeholder="Password" id="passwordInputSignIn" required />
				<span class="text-danger" id="passwordErrorSignIn"></span>
				<a href="#">Forget Your Password?</a>
				<button type="submit">Sign In</button>
			</form>
		</div>
		<div class="toggle-container">
			<div class="toggle">
				<div class="toggle-panel toggle-left">
					<h1>Welcoome, KING!</h1>
					<p>LogIn dengan data yang sudah anda daftarkan!</p>
					<button class="hidden" id="login">Sign In</button>
				</div>
				<div class="toggle-panel toggle-right">
					<h1>Hello, KING!</h1>
					<p>Register dengan data pribadimu tuk dapatkan paket member!</p>
					<button class="hidden" id="register">Sign Up</button>
				</div>
			</div>
		</div>
	</div>

	<script src="js/sc.js"></script>
</body>

</html>