<!DOCTYPE html>

<html>

<head>
	<title>Baby's Choice | Cart</title>
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

<body class="cartPage">
	<?php $duration = 1; ?>
	<?php $total = 0; ?>
	<?php $idx = 0; ?>
	<?php $num = 0; ?>
	<?php foreach ($item as $row) {
		$idx++;
	} ?>
	<?php foreach ($list as $row) : ?>
		<?php if ($row['trans_status_id'] < 4) {
			$disabled = "disabled";
		} else {
			$disabled = "";
		} ?>
	<?php endforeach; ?>

	<!-- Table -->
	<div class="container">
		<h1>Your Order</h1>
		<?php if ($idx != 0) { ?>
			<table class="table table-striped">
				<thead>
					<tr>
						<th class="num">#</th>
						<th>Name</th>
						<th>Category</th>
						<th>Image</th>
						<th>Price</th>
						<!-- <?php if ($disabled != "disabled") : ?> -->
						<th>Action</th>
						<!-- <?php endif; ?> -->
					</tr>
				</thead>
				<tbody>
					<?php $x = 1;
					foreach ($list as $row) : ?>
						<?php if ($row['trans_status_id'] < 4) {
							$disabled = "disabled";
						} else {
							$disabled = "";
						} ?>

						<?php $iditem = $list[$num]['trans_item_id']; ?>
						<?php $idstat = $list[$num]['trans_status_id']; ?>
						<?php $total += $list[$num]['trans_total']; ?>
						<?php foreach ($item as $items) {
							if ($iditem == $items[0]['item_id']) {
								$name = $items[0]['item_name'];
								$image = $items[0]['item_photo'];
								$price = $items[0]['item_price'];
								$idcate = $items[0]['item_category_id'];
							}
						} ?>

						<?php foreach ($category as $cate) {
							if ($idcate == $cate['category_id']) {
								$cates = $cate['category_name'];
							}
						} ?>

						<?php foreach ($status as $stat) {
							if ($idstat == $stat['status_id']) {
								$statname = $stat['status_name'];
								$idstat = $stat['status_id'];
							}
						} ?>

						<tr>
							<td class="num"><?php echo $x++; ?></td>
							<td style="width: 450px;"><?= $name; ?></td>
							<td><?= $cates; ?></td>
							<td><img height="50px" width="50px" src="<?= base_url('assets/uploads/photo/') ?><?= $image; ?>" </td>
							<td>Rp <?= $price; ?></td>
							<?php if ($disabled != "disabled") : ?>
								<td>
									<a href="<?php echo base_url("cart/del/$iditem"); ?>"><button class="btn btn-sm btn-danger"><span class="fas fa-trash"></span> Delete</button></a>
									<a href="<?= base_url("home/ShowDetail?id=$iditem"); ?> ?>"><button class="btn btn-sm btn-primary"><span class="fa fa-search"></span> Detail&nbsp;</button></a>
								</td>
							<?php endif; ?>
						</tr>
						<?php $num++; ?>
					<?php endforeach; ?>
				</tbody>
				<tfoot>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td style="text-align:right;"><b>Total</b></td>
						<td>Rp <?= $total; ?></td>
						<?php if ($disabled != "disabled") : ?>
							<td></td>
						<?php endif; ?>
					</tr>
				</tfoot>
			</table>

			<form method="post" action="">
				<div>
					<label for="duration">Order for </label>
					<input type="number" size="10" min="1" id="duration" name="duration" value="<?= $list[0]['duration']; ?>" <?= $disabled ?>> days <br>
					<small class="text-danger"><?= form_error('duration'); ?></small>
				</div>

				<?php if ($disabled == "disabled") : ?>
					<h6 style="text-align:right;"><b>Status</b> : <?= $statname; ?></h6>
				<?php endif; ?>
				<?php if ($disabled != "disabled") { ?>

					<div style="text-align:right;">
						<a href="<?= base_url("cart/payment/$duration"); ?>"><button type="submit" class="btn btn-success">Pay Here!</button></a>
					</div><br>
				<?php } ?>
			</form>

			<?php if ($idstat == 2) : ?>
				<div style="text-align:right;">
					<a href="<?= base_url("cart/pickup") ?>"><button class="btn btn-sm btn-warning"><span class="fas fa-truck"></span> Pick Up</button></a>
				</div><br>
			<?php endif; ?>

			<!-- No Data -->
		<?php } else if ($idx == 0) { ?>
			<div style="text-align: center;">
				<h4 style="color: salmon;">Don't see anything? Click the button below!</h4>
				<a href="<?= base_url("home") ?>"><button class="btn btn-warning">Buy Now!</button></a>
			</div>
		<?php } ?>
	</div>
</body>

</html>