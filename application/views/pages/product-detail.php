<!DOCTYPE html>

<html>

<head>
	<title>Baby's Choice | Detail Item</title>
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

<body class="productDPage">
	<div class="container">
		<?= $this->session->flashdata('add'); ?>
		<?= $this->session->flashdata('added'); ?>

		<?php foreach ($item as $row) { ?>
			<div class="row">
				<div class="left">
					<img class="card-img-top" src="<?= base_url('assets/uploads/photo/') ?><?= $row['item_photo']; ?>">
					<?php $iditems = $row['item_id']; ?>
				</div>
				<div class="right">
					<h1><?= $row['item_name']; ?></h1><br>
					<a><b>Description</b></a> <br>
					<p class="isiDesc"><?= $row['item_desc']; ?></p>
					<table>
						<tr>
							<td><b>Category<b></td>
							<td class="isi">
								<?php if ($row['item_category_id'] == 1) : echo "Music Instrumental";
								elseif ($row['item_category_id'] == 2) : echo "Ride On";
								elseif ($row['item_category_id'] == 3) : echo "Sport";
								elseif ($row['item_category_id'] == 4) : echo "Puzzle";
								elseif ($row['item_category_id'] == 5) : echo "Doll";
								endif;
								?>
							</td>
						</tr>
						<tr>
							<td><b>Price<b></td>
							<td class="isi"><?= $row['item_price']; ?> IDR / day</td>
						</tr>
						<tr>
							<td><b>Stock<b></td>
							<td class="isi"><?= $row['item_qty']; ?></td>
						</tr>
					</table>
					<?php if ($this->session->userdata('user') != 'user') : ?>
						<a href="<?= base_url("authentication"); ?>"><button class="btn btn-success btn-sm"><span class="fas fa-cart-plus"></span> Add to Cart</button></a>
					<?php endif; ?>

					<?php if ($this->session->userdata('user') == 'user') : ?>
						<?php $category = "category" . $row['item_category_id']; ?>
						<?php if ($row['item_qty'] != 0) { ?>
							<?php if ($this->session->userdata($category) == FALSE) { ?>
								<?php if (!$this->session->userdata('paid')) { ?>
									<a href="<?= base_url("home/addCart?id=$id") ?>"><button class="btn btn-success btn-sm"><span class="fas fa-cart-plus"></span> Add to Cart</button></a>
								<?php } else { ?>
									<button class="btn btn-success btn-sm" disabled><span class="fas fa-cart-plus"></span> Add to Cart</button></a><br>
									<small style="color: red;">Can't add items to cart, complete the existing order to add items to cart.</small>
								<?php } ?>
							<?php } else { ?>
								<button class="btn btn-success btn-sm" disabled><span class="fas fa-cart-plus"></span> Add to Cart</button></a><br>
								<small style="color: red;">This category item has been added.</small>
							<?php }
						} else { ?>
							<button class="btn btn-success btn-sm" disabled><span class="fas fa-cart-plus"></span> Add to Cart</button></a><br>
							<small style="color: red;">Out of stock.</small>
					<?php }
					endif; ?>
				</div>
			</div>
		<?php } ?>

		<!-- Another Product -->
		<h1>Another Product</h1>
		<hr>
		<?php foreach ($product as $row) {
			$id = $row['item_id']; ?>
			<?php if ($id != $iditems) : ?>
				<div class="col-md-2.5 anotherProduct">
					<div class="card mb-2">
						<a href="<?= base_url("home/ShowDetail?id=$id"); ?>"><img class="card-img-top" src="<?= base_url('assets/uploads/photo/') ?><?= $row['item_photo']; ?>" alt="Card image cap"></a>
						<a style="font-size: 16" class="p-1" href="<?= base_url("home/ShowDetail?id=$id"); ?>"><?= $row['item_name']; ?></a>
					</div>
				</div>
			<?php endif; ?>
		<?php } ?>
	</div>

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