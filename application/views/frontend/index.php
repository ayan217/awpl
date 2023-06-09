<!-- Age verification prompt -->
<div class="modal fade" id="age-verification" tabindex="-1" role="dialog" aria-labelledby="age-verification-title" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="age-verification-title">Age Verification</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Please confirm that you are 18 years or older to access this website.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="confirm-age">I am 18+</button>
				<button type="button" class="btn btn-secondary" id="reject-age">I am not 18</button>
			</div>
		</div>
	</div>
</div>


<!--Banner Section-->
<div class="main-banner" style="background: url(<?= ASSET_URL ?>frontend/images/banner-img.jpg);">
	<div class="mob-social-links">
		<ul>
			<li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
			<li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
			<li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
		</ul>
	</div>
	<div class="cstm-container">
		<div class="row">
			<div class="col-md-6">
				<div class="banner-text">
					<h1>Buy Products</h1>
					<h6>Form Army welfare project Limited </h6>
					<a href="<?= base_url('shop-now') ?>" class="btn btn-same-all">Shop Now</a>
				</div>
			</div>
			<div class="col-md-6"></div>
		</div>
	</div>
</div>
<!--Banner Section-->

<!--About Section-->
<div class="about-section section">
	<div class="right-side-img" data-aos="zoom-out-left" data-aos-anchor-placement="top-center" data-aos-duration="1000"><img class="img-fluid" src="<?= ASSET_URL ?>frontend/images/glass.png" alt="right"></div>
	<div class="left-side-img" data-aos="fade-right" data-aos-anchor-placement="top-center" data-aos-duration="800"><img class="img-fluid img-60" src="<?= ASSET_URL ?>frontend/images/left.png" alt="right"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-6 marg-right-10 tab-full-width-100">
				<div class="about-text-box">
					<div class="all-use-txt">
						<h6>Who we are</h6>
						<h2>About us</h2>
					</div>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
						incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
						nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
						Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
						eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
						sunt in culpa qui officia deserunt mollit anim id</p>
					<a href="#" class="btn btn-same-all">Learn More</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!--About Section-->

<!--Product Section-->
<div class="product-section section" style="background: url(<?= ASSET_URL ?>frontend/images/product-bg.jpg);">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="all-use-txt text-center new-prodct-mrgn">
					<h2>Products</h2>
				</div>
			</div>
			<?php
			if (!empty($products)) {
				foreach ($products as $product) {
			?>
					<div class="col-md-3 mob-width-50">
						<div class="prodect-dtls">
							<div class="prodect-img">
								<img src="<?= GET_UPLOADS . 'products/' . $product->f_img ?>" alt="product" class="img-fluid">
							</div>
							<p><?= $product->name ?></p>
							<div class="text-center">
								<a href="<?= base_url('product/' . $product->id) ?>" class="product-btn">Shop Now</a>
							</div>
						</div>
					</div>
			<?php
				}
			}
			?>

		</div>
	</div>
</div>
<!--Product Section-->

<!--Distributors Section-->
<div class="distributors-section section" style="background: url(<?= ASSET_URL ?>frontend/images/distribution-bg.jpg);">
	<div class="btm-dwn-0"><img class="img-fluid" src="<?= ASSET_URL ?>frontend/images/backjpg.png" alt="right"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-3 display-none"></div>
			<div class="col-md-8">
				<div class="distributors-text">
					<div class="all-use-txt">
						<h2 class="mb-2" style="color: #db651d;">Distributors</h2>
						<p class="mb-4">All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. </p>
						<a href="<?= base_url('signup') ?>" class="btn btn-same-all">Register Now</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--Distributors Section-->

<!--How Works Section-->
<div class="how-work-section section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 mb-3">
				<div class="all-use-txt text-center new-prodct-mrgn">
					<h2 class="how-it-wrk mb-5 tab-mb-0">How it works<br> for distributors</h2>
				</div>
			</div>

			<div class="col-md-4">
				<div class="work-points">
					<div class="points-icon">
						<h2>1</h2>
						<div class="circle-icon">
							<img class="img-fluid" src="<?= ASSET_URL ?>frontend/images/step1img.png" alt="stape">
						</div>
					</div>
					<h3>Registration</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>
				</div>
			</div>

			<div class="col-md-4">
				<div class="work-points">
					<div class="points-icon">
						<h2 class="lft-70">2</h2>
						<div class="circle-icon">
							<img class="img-fluid" src="<?= ASSET_URL ?>frontend/images/step2.png" alt="stape">
						</div>
					</div>
					<h3>Shop Products</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>
				</div>
			</div>

			<div class="col-md-4">
				<div class="work-points">
					<div class="points-icon">
						<h2 class="lft-70">3</h2>
						<div class="circle-icon">
							<img class="img-fluid" src="<?= ASSET_URL ?>frontend/images/step3.png" alt="stape">
						</div>
					</div>
					<h3>Collect from Store</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		var ageConfirmed = false;

		// Check if the age confirmation cookie exists
		if (document.cookie.indexOf("ageConfirmation=1") > -1) {
			ageConfirmed = true;
		}

		// If the age is not confirmed, show the verification prompt
		if (!ageConfirmed) {
			$('#age-verification').modal('show');
		} else {
			$('body').show(); // Show the body content if age is confirmed
		}

		// Handle the age confirmation
		$("#confirm-age").click(function() {
			// Set the age confirmation cookie to expire in 30 days
			var expiryDate = new Date();
			expiryDate.setDate(expiryDate.getDate() + 30);
			document.cookie = "ageConfirmation=1; expires=" + expiryDate.toUTCString() + "; path=/";
			ageConfirmed = true;

			// Hide the verification prompt modal
			$('#age-verification').modal('hide');
			$('body').show(); // Show the body content after age is confirmed
		});

		// Handle the rejection of age confirmation
		$("#reject-age").click(function() {
			// Redirect to a different page or show an appropriate message
			window.location.href = "<?= base_url('restricted') ?>";
		});
	});
</script>
<!--How Works Section-->