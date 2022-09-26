<!DOCTYPE html>

<html>

<head>
	<title>Baby's Choice | Home</title>
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
</head>

<body class="homePage">
	<!-- Carousel -->
	<div>
		<div id="carousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#carousel" data-slide-to="0"></li>
				<li data-target="#carousel" data-slide-to="1"></li>
				<li data-target="#carousel" data-slide-to="2"></li>
			</ol>

			<!-- The slideshow -->
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="<?php echo base_url('assets/css/assets/images/c2.jpg'); ?>">
					<div class="carousel-caption">
						<h3 style="color:crimson"> FOR YOUR LOVELY BABY</h3>
						<p>We only rent good stuff here for your lovely baby.</p>
					</div>
				</div>
				<div class="carousel-item">
					<img src="<?php echo base_url('assets/css/assets/images/c3.jpg'); ?>">
					<div class="carousel-caption">
						<h3 style="color:crimson">SAFE TOYS FOR KIDS</h3>
						<p>With the most safe products for your baby like mother care.</p>
					</div>
				</div>
				<div class="carousel-item">
					<img src="<?php echo base_url('assets/css/assets/images/c1.jpg'); ?>">
					<div class="carousel-caption">
						<h3 style="color:crimson">EVERYTHING YOU NEED FOR YOUR BABY</h3>
						<p>All quality products for your baby like mothers care.</p>
					</div>
				</div>
			</div>

			<!-- Left and right controls -->
			<a class="carousel-control-prev" href="#carousel" data-slide="prev">
				<span class="carousel-control-prev-icon"></span>
			</a>
			<a class="carousel-control-next" href="#carousel" data-slide="next">
				<span class="carousel-control-next-icon"></span>
			</a>
		</div>
	</div>

	<center>
		<!-- Category -->
		<div class="container pl-4 category">
			<div class="row">
				<?php foreach ($category as $cate) : ?>
					<?php $id = $cate['category_id'];
					if ($id == 1) { ?>
						<div class="column d-flex justify-content-center">
							<div class="column-md">
								<div class="card">
									<a href="<?= base_url("home/ShowCategory?id=$id") ?>">
										<img class="card-img-top" height="525px" src="./assets/uploads/image/<?= $cate['category_image']; ?>">
									</a>
								</div>
							</div>
						</div>
					<?php } ?>

					<?php if ($id == 2) { ?>
						<div class="column d-flex align-items-center">
							<div class="row">
								<div class="column-sm">
									<div class="card">
										<a href="<?= base_url("home/ShowCategory?id=$id") ?>">
											<img height="250" width="250" src="./assets/uploads/image/<?= $cate['category_image']; ?>">
										</a>
									</div>
								</div>
							<?php }
						if ($id == 3) { ?>
								<div class="column-sm">
									<div class="card">
										<a href="<?= base_url("home/ShowCategory?id=$id") ?>">
											<img height="250" width="250" src="./assets/uploads/image/<?= $cate['category_image']; ?>">
										</a>
									</div>
								</div>
							</div>
						<?php } ?>

						<?php if ($id == 5) { ?>
							<div class="row justify-content-between">
								<div class="column-sm">
									<div class="card">
										<a href="<?= base_url("home/ShowCategory?id=$id") ?>">
											<img height="250" width="250" src="./assets/uploads/image/<?= $cate['category_image']; ?>">
										</a>
									</div>
								</div>
							<?php }
						if ($id == 6) { ?>
								<div class="column-sm">
									<div class="card">
										<a href="<?= base_url("home/ShowCategory?id=$id") ?>">
											<img height="250" width="250" src="./assets/uploads/image/<?= $cate['category_image']; ?>">
										</a>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
				<?php endforeach; ?>
			</div>
		</div>
	</center>

	<!-- Footer -->
	<footer class="footer">
		<div class="card">
			<img class="card-img-top" src="<?php echo base_url('assets/css/assets/images/footer6.png'); ?>">
		</div>
		<div class="isiFooter">
			<div class="container-fluid">
				<h1>About Company</h1>
				<hr>
				<div class="container-fluid">
					<div class="card" style="border: 1px solid white;">
						<table>
							<tr>
								<td class="descFooter" style="text-align: center; line-height: 1.5;">
									Baby's Choice telah berdiri sejak Juni 2021 yang juga merupakan bagian dari Salud. Awalnya pendiri dari Salud. sendiri cuman 3 orang, tetapi karena kita melebarkan bisnis ke bidang yang bisa dibilang cukup jauh dari yang sebelumnya restaurant online sekarang rental baby online dan ada satu proyek lain lagi yaitu hotel online maka kami pun merekrut orang baru untuk membantu kami dalam melebarkan bisnis kami. Cukup sekian ceritanya, sampai jumpa di lain kesempatan.
								</td>
								<td class="logoFooter" style="text-align: center; color: white;">
									<h1 style="font-size: 50px;"><b>Baby<a style="color:#FFD700;">'</a>s Choice</b></h1>
									Waste to Buy? Just Rent!
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>

			<h1>About Founder</h1>
			<hr>
			<div class="container">
				<img id="img1" src="<?php echo base_url('assets/css/assets/images/c_angel.jpg'); ?>">
				<div id="angel" class="ketFooter">
					<b>Angeline Felicia</b> <br>
					<div style="font-size: 12px;">
						@angel_liangg <br>
						angeline.felicia@student.umn.ac.id <br>
						Front-End
					</div>
				</div>
			</div>

			<div class="container">
				<img id="img2" src="<?php echo base_url('assets/css/assets/images/c_audric.jpg'); ?>">
				<div id="audric" class="ketFooter">
					<b>Audric Lysander</b> <br>
					<div style="font-size: 12px;">
						@audriclysander <br>
						audric.lysander@student.umn.ac.id <br>
						Back-End
					</div>
				</div>
			</div>

			<div class="container">
				<img id="img3" src="<?php echo base_url('assets/css/assets/images/c_grivia.jpg'); ?>">
				<div id="viya" class="ketFooter">
					<b>Grivia Trifosa Iskandar</b> <br>
					<div style="font-size: 12px;">
						@griviatrifosa <br>
						grivia.trifosa@student.umn.ac.id <br>
						Back-End
					</div>
				</div>
			</div>

			<div class="container">
				<img id="img4" src="<?php echo base_url('assets/css/assets/images/c_reva.jpg'); ?>">
				<div id="reva" class="ketFooter">
					<b>Rullyan Reva Pangestu</b> <br>
					<div style="font-size: 12px;">
						@revapangestu <br>
						rullyan.reva@student.umn.ac.id <br>
						Front-End
					</div>
				</div>
			</div>

			<div>
				&copy; Baby<a style="color:#FFD700;">'</a>s Choice 2021, Part of Salud<a style="color:#FFD700;">.</a>
			</div>
		</div>
	</footer>
</body>

</html>