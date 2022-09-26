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
</head>

<body class="adminPage">
	<!-- Table -->
	<div class="container">
		<h1>List of Orders</h1>
		<table class="table table-striped table-light">
			<thead>
				<tr>
					<th class="num">#</th>
					<th>User</th>
					<th>Status</th>
					<th>Option</th>
				</tr>
			</thead>

			<?php $number = 1; ?>
			<?php $array[$number - 1] = "1"; ?>

			<tbody>
				<?php foreach ($list as $row) : ?>
					<?php $flag = false; ?>
					<?php $id = $row['trans_user_id']; ?>
					<?php for ($i = 0; $i < $number; $i++) : ?>
						<?php if ($array[$i] == $id) : ?>
							<?php $flag = true; ?>
						<?php endif; ?>
					<?php endfor; ?>

					<?php if ($flag == false) : ?>
						<tr>
							<td class="num"><?= $number; ?></td>
							<td>
								<?php foreach ($user as $orang) : ?>
									<?php if ($orang['user_id'] == $id) : ?>
										<?= $orang['user_name']; ?>
									<?php endif; ?>
								<?php endforeach; ?>
							</td>
							<td>
								<?php foreach ($status as $stat) : ?>
									<?php if ($stat['status_id'] == $row['trans_status_id']) : ?>
										<?= $stat['status_name']; ?>
									<?php endif; ?>
								<?php endforeach; ?>
							</td>
							<td>
								<a href="<?= base_url("admin/transaction_detail?id=$id"); ?>"><button class="btn btn-primary"><span class="fas fa-search"></span> Detail</button></a>
							</td>
						</tr>
						<?php $array[$number] = $id; ?>
						<?php $number++; ?>
					<?php endif; ?>

				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</body>

</html>