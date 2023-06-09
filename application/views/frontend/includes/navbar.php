<?php
$this->load->model('CartModel');
if (user_login_check() == true) {
	$cart_res = $this->CartModel->getcart(logged_in_user_row()->id);
	if ($cart_res !== false) {
		$cart_count = count($cart_res);
	} else {
		$cart_count = 0;
	}
} else {
	$cart_count = 0;
}
?>
<header class="nav-top lgo-scrll unset-scroll">
	<div class="cstm-container pdng-lr-0" style="position: relative;">
		<a href="<?= base_url() ?>"><img class="main-logo scrl-img" src="<?= ASSET_URL ?>frontend/images/logo.png" alt="" class="logo"></a>
		<nav class="navbar navbar-expand-lg mobile-nav-bar flex-reverse">
			<a class="navbar-brand mob-cart" href="<?= base_url('cart') ?>" style="position: relative;"><img class="bskt" src="<?= ASSET_URL ?>frontend/images/cartimg.png" alt="" class="cart"><span class="add-cart"><?= $cart_count ?></span></a>
			<button class="navbar-toggler pdng-lr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<i class="fa-solid fa-bars"></i>
			</button>
			<div class="collapse navbar-collapse nav-option-link" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link active-nav-color" href="<?= base_url() ?>">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('about') ?>">About</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('faq') ?>">FAQs</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('contact-us') ?>">Contact</a>
					</li>
					<?php
					if (user_login_check() == false) {
					?>
						<li class="nav-item mob-show-only">
							<a class="nav-link" href="<?= base_url('login') ?>">Log In</a>
						</li>
						<li class="nav-item mob-show-only">
							<a class="nav-link" href="<?= BASE_URL ?>signup">Sign Up</a>
						</li>
					<?php
					} else {
					?>
						<li class="nav-item mob-show-only">
							<a class="nav-link" href="<?=base_url('my-account')?>">My Account</a>
						</li>
						<li class="nav-item mob-show-only log-out-my-acnt">
							<a class="nav-link" href="<?= base_url('logout') ?>">Log Out</a><span>("<?= logged_in_user_row()->full_name ?>")</span>
						</li>
					<?php
					}
					?>
				</ul>
				<div class="social-links dsk-social-links">
					<ul>
						<?php
						if (user_login_check() == false) {
						?>
							<li><a href="<?= base_url('cart') ?>" style="position: relative;"><img src="<?= ASSET_URL ?>frontend/images/cartimg.png" alt="" class="bskt"><span class="add-cart"><?= $cart_count ?></span></a></li>
							<li><a href="<?= base_url('login') ?>">LOGIN</a></li>
							<li><a href="<?= BASE_URL ?>signup" class="scl-nav-btn">Sign up</a></li>
							<li><a href="<?= base_url('') ?>"><i class="fa-brands fa-facebook-f"></i></a></li>
							<li><a href="<?= base_url('') ?>"><i class="fa-brands fa-linkedin-in"></i></a></li>
							<li><a href="<?= base_url('') ?>" style="margin-right: 0;"><i class="fa-brands fa-instagram"></i></a></li>
						<?php
						} else {
						?>
							<li><a href="#">Hi, <?= logged_in_user_row()->full_name ?></a></li>
							<li><a href="<?=base_url('my-account')?>">My Account</a></li>
							<li><a href="<?= base_url('logout') ?>" class="scl-nav-btn">Logout</a></li>
							<li><a href="<?= base_url('cart') ?>" style="position: relative;"><img src="<?= ASSET_URL ?>frontend/images/cartimg.png" alt="" class="bskt"><span class="add-cart"><?= $cart_count ?></span></a></li>
						<?php
						}
						?>
					</ul>
				</div>
			</div>
		</nav>
	</div>
</header>
<div class="blank-space"></div>