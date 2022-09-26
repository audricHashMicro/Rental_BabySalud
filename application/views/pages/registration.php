<!DOCTYPE html>

<html>

<head>
	<title>Baby's Choice | User Registration</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap 4 -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">

	<style>
		input[type='number'] {
			width: 229px;
		}
	</style>
</head>

<body class="registerPage">
	<div class="wrapper">
		<div class="slide">
			<div class="container">
				<h1>Create Account</h1>
				<hr>
				<form method="post" action="">
					<table>
						<tr>
							<td>
								<label for="name">Name</label> <br>
								<input type="text" id="name" name="name" value="<?= set_value('name') ?>">
								<small class="text-danger">
									<?= form_error('name'); ?>
								</small>
							</td>
							<td>
								<label for="address">Address</label> <br>
								<input type="text" id="address" name="address" value="<?= set_value('address') ?>">
								<small class="text-danger">
									<?= form_error('address'); ?>
								</small>
							</td>
						</tr>
						<tr>
							<td>
								<label for="email">Email</label> <br>
								<input type="email" id="email" name="email" value="<?= set_value('email') ?>">
								<small class="text-danger">
									<?= form_error('email'); ?>
								</small>
							</td>
							<td>
								<label for="phone">Phone Number</label> <br>
								<input type="number" id="phone" name="phone" value="<?= set_value('phone') ?>">
								<small class="text-danger">
									<?= form_error('phone'); ?>
								</small>
							</td>
						</tr>
						<tr>
							<td>
								<label for="password">Password</label> <br>
								<input type="password" id="password" name="password">
								<small class="text-danger">
									<?= form_error('password'); ?>
								</small>
							</td>
							<td>
								<label for="cpassword">Confirm Password</label> <br>
								<input type="password" id="cpassword" name="cpassword">
								<small class="text-danger">
									<?= form_error('cpassword'); ?>
								</small>
							</td>
						</tr>
					</table>
					<div style="margin-top: 25px;">
						<a>Already have an Account?
							<span><a class="gotoLogin" href="<?= base_url('authentication'); ?>">Login</a></span>
						</a>
						<div style="text-align: right; margin-top: 20px;">
							<button class="btn btn-info" type="submit">Register</button>
							<a href="<?= base_url('home'); ?>" class="btn btn-danger">Cancel</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="registerKet">
		<img src="<?php echo base_url('assets/css/assets/images/bg-register2.jpg'); ?>">
		<h1 style="margin-top:10px;">Baby's Choice</h1>
		You can contact us below!!!
		<div class="logo-ig">
			<a href="https://www.instagram.com/angel_liangg" target="_blank"><img src="<?php echo base_url('assets/css/assets/images/logo-ig.png'); ?>"></a>
			<a href="https://www.instagram.com/audriclysander" target="_blank"><img src="<?php echo base_url('assets/css/assets/images/logo-ig.png'); ?>"></a>
			<a href="https://www.instagram.com/griviatrifosa" target="_blank"><img src="<?php echo base_url('assets/css/assets/images/logo-ig.png'); ?>"></a>
			<a href="https://www.instagram.com/revapangestu" target="_blank"><img src="<?php echo base_url('assets/css/assets/images/logo-ig.png'); ?>"></a>
		</div>
	</div>
</body>

</html>