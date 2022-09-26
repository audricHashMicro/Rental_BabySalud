<!DOCTYPE html>

<html>

<head>
	<title>Baby's Choice | Category</title>
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

<body class="productPage">
	<center>
		<!-- Product -->
		<div id="product" class="card">
			<div class="row">
				<div class="left">
					<?php foreach ($category as $cate) : ?>
						<?php $id_ = $cate['category_id']; ?>
						<div class="logo">
							<a href="<?= base_url("home/ShowCategory?id=$id_") ?>">
								<img src="<?= base_url() ?>./assets/uploads/image/<?= $cate['category_image']; ?>">
							</a>
							<div class="ket"><?php echo $cate['category_name']; ?></div>
						</div>
					<?php endforeach; ?>
				</div>

				<div class="right">
					<div class="container">
						<div>
							<?php if ($id == 1) : echo "<h1>Music Instrumental</h1>";
							elseif ($id == 2) : echo "<h1>Ride On</h1>";
							elseif ($id == 3) : echo "<h1>Sport</h1>";
							elseif ($id == 5) : echo "<h1>Puzzle</h1>";
							elseif ($id == 6) : echo "<h1>Doll</h1>";
							endif;
							?>
							<?php foreach ($item as $row) {
								$id = $row['item_id'];
								$cat_id = $row['item_category_id']; ?>

								<div class="col-md-3 productCard">
									<div class="card mb-2" style="height: 260px;">
										<a href="<?= base_url("home/ShowDetail?id=$id"); ?>"><img class="card-img-top" src="<?= base_url('assets/uploads/photo/') ?><?= $row['item_photo']; ?>" alt="Card image cap"></a>
										<a class="p-1" style="font-size: 16px;" href="<?= base_url("home/ShowDetail?id=$id"); ?>"><?= $row['item_name']; ?></a>
									</div>
								</div>

							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</center>

	<!-- Footer -->
	<footer class="footer">
		<div class="card" style="width:100%;">
			<img class="card-img-top" src="<?php echo base_url('assets/css/assets/images/footer6.png'); ?>">
		</div>
		<div class="isiFooter">
			<div class="container-fluid">
				<h1>About Company</h1>
				<hr>
				<div class="container-fluid">
					<div class="card" style="border: 1px solid white; width: 100%; margin-left: 0px;">
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