<!DOCTYPE html>

<html>

<head>
	<title>Admin | Transaction</title>
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
		.card {
			background: white;
			margin-top: 0px;
			width: 70%;
			padding: 20px;
			margin-bottom: 20px;
		}

		label {
			padding: 10px;
			padding-right: 40px;
			font-size: 16px;
			font-weight: bold;
		}

		input {
			margin-bottom: 10px;
		}

		textarea {
			width: 231px;
			margin-bottom: 10px;
		}

		.container {
			width: 60%;
		}
	</style>
</head>

<body class="adminPage">
	<!-- Table -->
	<div class="container">
		<center>
			<h1>Detail Order</h1>
			<div class="card">
				<?php $idx = 0; ?>
				<?php $price = 0; ?>
				<?php foreach ($list as $row) : ?>
					<?php $id = $list[0]['trans_user_id']; ?>
					<?php $duration = $list[0]['duration']; ?>
					<?php $price = $price + $list[0]['trans_total']; ?>
					<?php foreach ($item as $items) : ?>
						<?php if ($row['trans_item_id'] == $items['item_id']) {
							if ($idx == 0) {
								$string = $items['item_name'];
								$temp = "";
							} else {
								$temp = $items['item_name'];
								$string = $string . ", " . $temp;
							}
							$idx++;
						} ?>
					<?php endforeach; ?>

					<?php foreach ($status as $stat) : ?>
						<?php $id_stat = $list[0]['trans_status_id']; ?>
						<?php if ($id_stat == $stat['status_id']) {
							$hubungan = $stat['status_name'];
							$id_hubungan = $stat['status_id'];
						} ?>

						<?php if ($id_stat + 1 == $stat['status_id']) {
							$next_hub = $stat['status_name'];
						} ?>
					<?php endforeach; ?>
				<?php endforeach; ?>

				<form>
					<table>
						<tr>
							<td><label for="name">Name </label></td>
							<td><input disabled id="name" value="<?= $user[0]['user_name']; ?>"></td>
						</tr>
						<tr>
							<td><label for="address">Address </label></td>
							<td><input disabled id="address" value="<?= $user[0]['user_address']; ?>"></td>
						</tr>
						<tr>
							<td><label for="item">Item </label></td>
							<td><textarea disabled id="item"><?= $string; ?></textarea></td>
						</tr>
						<tr>
							<td><label for="duration">Duration </label></td>
							<td><input disabled id="item" value="<?= $duration; ?> Days"></td>
						</tr>
						<tr>
							<td><label for="price">Price </label></td>
							<td><input disabled id="price" value="Rp <?= $price; ?>"></td>
						</tr>
						<tr>
							<td><label for="status">Status </label></td>
							<td><input disabled id="status" value="<?= $hubungan; ?>"></td>
						</tr>
					</table>
				</form>

				<?php if ($id_hubungan == '1') {
					$button = "admin/arrive?id=$id";
					$simbol = "fas fa-box";
				} else if ($id_hubungan == '2') {
					$button = '';
					$disabled = "disabled";
					$simbol = "fas fa-box";
				} else if ($id_hubungan == '3') {
					$button = "admin/done?id=$id";
					$simbol = "fas fa-check";
				}
				?>

				<!-- EDIT -->
				<a href="<?= base_url($button); ?>"><button <?php if ($id_hubungan == '2') echo 'disabled'; ?> class="btn btn-warning"><span class="<?php echo $simbol; ?>"></span> <?= $next_hub ?></button></a>

		</center>
	</div>
	</div>
</body>

</html>