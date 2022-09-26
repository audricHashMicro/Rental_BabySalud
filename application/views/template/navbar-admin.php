<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Navbar -->
<nav class="navbar navbar-expand-sm fixed-top">
	<a class="navbar-brand">
		<h1><b>Baby<span style="color:#FFD700;">'</span>s Choice</b></h1>
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="nav navbar-nav">
			<li class="nav-item"><a class="nav-link" href="<?= base_url('admin/index'); ?>">Items</a></li>
			<li class="nav-item"><a class="nav-link" href="<?= base_url('admin/transaction'); ?>">Transaction</a></li>
			<!-- <li class="nav-item"><a class="nav-link" href="<?= base_url('admin/category'); ?>">Category</a></li> -->
		</ul>
	</div>

	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav ml-auto">
			<li class="nav-item">
				<a class="nav-link">Hello, <?php echo $this->session->userdata('user_name'); ?></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?= base_url('authentication/logout'); ?>">Logout</a>
			</li>
		</ul>
	</div>
</nav>