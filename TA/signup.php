<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Signup</title>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap-icons.css">
	<style>
		body {
			min-height: 100vh;
			justify-content: center;
			background: url(assets/images/bcgym.jpg);
			background-size: cover;
			background-position: center;
		}

		.card-profile {
			background-color: white;
			padding: 20px;
			border-radius: 10px;
		}

		.white-text {
			color: white;
		}
	</style>
</head>

<body>

	<form method="post" onsubmit="myaction.collect_data(event, 'signup')">
		<div class="col-md-8 col-lg-4 border rounded mx-auto mt-5 p-4 shadow">

			<div class="h2 white-text">Signup</div>

			<div class="input-group mt-3">
				<span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
				<input name="firstname" type="text" class="form-control p-3" placeholder="First name">
			</div>
			<div><small class="js-error js-error-firstname text-danger"></small></div>

			<div class="input-group mt-3">
				<span class="input-group-text" id="basic-addon1"><i class="bi bi-person-square"></i></span>
				<input name="lastname" type="text" class="form-control p-3" placeholder="Last name">
			</div>
			<div><small class="js-error js-error-lastname text-danger"></small></div>

			<div class="input-group mt-3">
				<span class="input-group-text" id="basic-addon1"><i class="bi bi-gender-ambiguous"></i></span>
				<select class="form-select" name="gender">
					<option selected value="">--Select Gender--</option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				</select>
			</div>
			<div><small class="js-error js-error-gender text-danger"></small></div>

			<div class="input-group mt-3">
				<span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope"></i></span>
				<input name="email" type="text" class="form-control p-3" placeholder="Email">
			</div>
			<div><small class="js-error js-error-email text-danger"></small></div>

			<div class="input-group mt-3">
				<span class="input-group-text" id="basic-addon1"><i class="bi bi-key"></i></span>
				<input name="password" type="password" class="form-control p-3" placeholder="Password">
			</div>
			<div><small class="js-error js-error-password text-danger"></small></div>

			<div class="input-group mt-3">
				<span class="input-group-text" id="basic-addon1"><i class="bi bi-key-fill"></i></span>
				<input name="retype_password" type="password" class="form-control p-3" placeholder="Retype Password">
			</div>

			<div class="progress mt-3 d-none">
				<div class="progress-bar" role="progressbar" style="width: 50%;">Working... 25%</div>
			</div>

			<button class="mt-3 btn btn-primary col-12">Signup</button>
			<div class="m-2 white-text">
				Already have an account? <a href="loginmember.php">login here</a>
			</div>

		</div>
	</form>

</body>

</html>

<script>

	var myaction =
	{
		collect_data: function (e, data_type) {
			e.preventDefault();
			e.stopPropagation();

			var inputs = document.querySelectorAll("form input, form select");
			let myform = new FormData();
			myform.append('data_type', data_type);

			for (var i = 0; i < inputs.length; i++) {

				myform.append(inputs[i].name, inputs[i].value);
			}

			myaction.send_data(myform);
		},

		send_data: function (form) {

			var ajax = new XMLHttpRequest();

			document.querySelector(".progress").classList.remove("d-none");

			document.querySelector(".progress-bar").style.width = "0%";
			document.querySelector(".progress-bar").innerHTML = "Working... 0%";

			ajax.addEventListener('readystatechange', function () {

				if (ajax.readyState == 4) {
					if (ajax.status == 200) {
						myaction.handle_result(ajax.responseText);
					} else {
						console.log(ajax);
						alert("An error occurred");
					}
				}
			});

			ajax.upload.addEventListener('progress', function (e) {

				let percent = Math.round((e.loaded / e.total) * 100);
				document.querySelector(".progress-bar").style.width = percent + "%";
				document.querySelector(".progress-bar").innerHTML = "Working..." + percent + "%";
			});

			ajax.open('post', 'ajax.php', true);
			ajax.send(form);
		},

		handle_result: function (result) {
			console.log(result);
			var obj = JSON.parse(result);
			if (obj.success) {
				alert("Profile created successfully");
				window.location.href = 'loginmember.php';
			} else {

				let error_inputs = document.querySelectorAll(".js-error");

				for (var i = 0; i < error_inputs.length; i++) {
					error_inputs[i].innerHTML = "";
				}

				for (key in obj.errors) {
					document.querySelector(".js-error-" + key).innerHTML = obj.errors[key];
				}
			}
		}
	};

</script>