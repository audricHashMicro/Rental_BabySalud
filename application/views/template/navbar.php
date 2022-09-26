<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">

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
			<li class="nav-item"><a class="nav-link" href="<?= base_url('home'); ?>">Home</a></li>
			<li class="nav-item"><a class="nav-link" href="<?= base_url('home/product'); ?>">Product</a></li>
			<?php if ($this->session->userdata('user') == 'user') : ?>
				<li class="nav-item"><a class="nav-link" href="<?= base_url('cart'); ?>">Cart</a></li>
			<?php endif; ?>
		</ul>
		<?php if ($this->session->userdata('user') != 'user') : ?>
			<ul class="nav navbar-nav ml-auto">
				<li class="nav-item"><a class="nav-link" href="<?= base_url('authentication/registration'); ?>">Register</a></li>
				<li class="nav-item"><a class="nav-link" href="<?= base_url("authentication"); ?>">Login</a></li>
			</ul>
		<?php endif; ?>
		<?php if ($this->session->userdata('user') == 'user') : ?>
			<ul class="nav navbar-nav ml-auto">
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown">
						Hello, <?php echo $this->session->userdata('user_name'); ?>
					</a>
					<ul class="dropdown-menu">
						<li><a href="<?= base_url('authentication/logout'); ?>">&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="30" height="15" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 14 14">
									<path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
									<path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
								</svg> Logout</a></li>
					</ul>
				</li>
			</ul>
		<?php endif; ?>
	</div>
</nav>