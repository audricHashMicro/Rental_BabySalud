<!DOCTYPE html>

<html>

<head>
	<title>Baby's Choice | Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Captcha -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>

	<!-- Bootstrap 4 -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">

	<style>
		table td {
			text-align: left;
		}

		.loginLabel {
			padding-left: 10px;
			font-size: 16px;
		}

		h1 {
			font-size: 40px;
		}

		.loginInput,
		.captcha {
			padding-bottom: 10px;
			padding-top: 10px;
		}

		.btn {
			opacity: 0.8;
			margin-top: 15px;
		}

		.caLogin {
			margin-left: 10px;
		}
	</style>
</head>

<body class="loginPage">
	<div class="card loginCard">
		<h1><b>LOGIN</b></h1>
		<hr>
		<form method="post" action="">
			<?= $this->session->flashdata('message'); ?>
			<table>
				<tr>
					<td class="loginLabel">
						<label for="email"><b>Email</b></label>
					</td>
					<td>
						<input class="loginInput" type="email" id="email" name="email" value="<?= set_value('email') ?>" size="53">
						<small class="text-danger">
							<?= form_error('email'); ?>
						</small>
					</td>
				</tr>
				<tr>
					<td class="loginLabel">
						<label for="password"><b>Password</b></label>
					</td>
					<td>
						<input class="loginInput" type="password" id="password" name="password" size="53">
						<small class="text-danger">
							<?= form_error('password'); ?>
						</small>
					</td>
				</tr>
				<tr>
					<td class="loginLabel" style="color: #0038FF;">
						<label for="captcha"><b><a>Captcha</a></b></label>
					</td>
					<td>
						<div class="g-recaptcha captcha" data-image="image" data-sitekey="6LerPyAbAAAAAONS6w3xdbAk2bqnd33Q6PhwS1CJ"></div>
						<small class="text-danger">
							<?= $this->session->flashdata('captcha'); ?>
						</small>
					</td>
				</tr>
			</table>
			<?= $this->session->flashdata('wrong'); ?>
			<div style="text-align: right;">
				<button class="btn btn-info btn-lg" type="submit">Login</button>
				<a class="btn btn-danger btn-lg" href="<?= base_url('home'); ?>">Cancel</a>
				<div style="text-align: left;">
					<a class="caLogin" href="<?= base_url('authentication/registration'); ?>">Create Account</a>
				</div>
			</div>
		</form>
	</div>
</body>

</html>