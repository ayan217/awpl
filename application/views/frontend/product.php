<!--Banner sub pages-->
<div class="banner-subpages relative-class" style="background: url(<?= ASSET_URL . 'frontend/' ?>images/bnr-sub1.jpg);">
	<div class="mob-social-links">
		<ul>
			<li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
			<li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
			<li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
		</ul>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="sub-banner-cntnt">
					<h1>product description</h1>
					<nav aria-label="breadcrumb" class="cstm-bread-crumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?= BASE_URL ?>">Home</a></li>
							<i class="fa-solid fa-angle-right"></i>
							<li class="breadcrumb-item" aria-current="page">Product Description</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
</div>
<!--Banner sub pages-->

<!--Single Malt-->
<div class="product-single-section section">
	<div class="container">
		<div class="row align-cntr-tab">
			<div class="col-md-6">
				<div class="owl-product-slider">
					<div class="vehicle-detail-banner banner-content clearfix">
						<div class="banner-slider thum-desk-block">
							<div class="slider slider-nav thumb-image">

								<?php
								if ($product) {
									$thumb_str = $product->s_imgs_thumb;
									if ($thumb_str !== null && $thumb_str !== '') {
										$thumbs = explode(',', $thumb_str);
										array_unshift($thumbs, $product->f_img);
										// var_dump($thumbs);
										foreach ($thumbs as $k => $thumb) {
								?>
											<div class="thumbnail-image">
												<div class="thumbImg">
													<img src="<?= GET_UPLOADS ?>products/<?= $k !== 0 ? 'thumb/' : '' ?><?= $thumb ?>" alt="slider-img">
												</div>
											</div>

								<?php
										}
									}
								}
								?>

							</div>
							<div class="slider slider-for">
								<?php
								if ($product) {
									$org_str = $product->s_imgs;
									if ($org_str !== null && $org_str !== '') {
										$orgs = explode(',', $org_str);
										array_unshift($orgs, $product->f_img);
										foreach ($orgs as $k => $org) {
								?>
											<div class="slider-banner-image">
												<img src="<?= GET_UPLOADS ?>products/<?= $org ?>" alt="Car-Image">
											</div>

								<?php
										}
									}
								}
								?>

							</div>
						</div>
					</div>
				</div>


				<div class="product-mob-version tab-mob-show">

					<div class="tab-content" id="nav-tabContent">
						<?php
						if ($product) {
							$thumb_str = $product->s_imgs;
							if ($thumb_str !== null && $thumb_str !== '') {
								$thumbs = explode(',', $thumb_str);
								$id = 0;
								foreach ($thumbs as $thumb) {
						?>
									<div class="tab-pane fade <?= $id == 0 ? 'show active' : '' ?>" id="nav-home<?= $id ?>" role="tabpanel" aria-labelledby="nav-home-tab<?= $id ?>">
										<img src="<?= GET_UPLOADS ?>products/<?= $thumb ?>" alt="img">
									</div>

						<?php
									$id++;
								}
							}
						}
						?>


					</div>
					<nav>
						<div class="nav nav-tabs" id="nav-tab" role="tablist">
							<?php
							if ($product) {
								$org_str = $product->s_imgs_thumb;
								if ($org_str !== null && $org_str !== '') {
									$orgs = explode(',', $org_str);
									$id = 0;
									foreach ($orgs as $org) {
							?>
										<a class="nav-item nav-link <?= $id == 0 ? 'active' : '' ?>" id="nav-home-tab<?= $id ?>" data-toggle="tab" href="#nav-home<?= $id ?>" role="tab" aria-controls="nav-home<?= $id ?>" aria-selected="true">
											<img src="<?= GET_UPLOADS ?>products/thumb/<?= $org ?>" alt="img">
										</a>
							<?php
										$id++;
									}
								}
							}
							?>

						</div>
					</nav>
				</div>
			</div>

			<div class="col-md-6">
				<div class="product-all-dtls">
					<!-- <p class="stoke">In Stoke</p> -->
					<h2 class="prdct-name"><?= $product->name ?></h2>
					<h3 class="prdct-rps"><?= user_login_check() == true ? CURRENCY . ' ' . $product_rate['total_product_price'] : '' ?></h3>
					<span class="prdct-size">Size</span>
					<div class="bottle-size">
						<p class="ml-qnty"><?= $product->size ?></p>
					</div>
					<span class="prdct-size">Quantity</span>
					<div class="qun-t-cls prdct-nw-qnty">
						<div class="qty-container">
							<button class="qty-btn-minus btn-light" type="button"><i class="fa fa-minus"></i></button>
							<input type="text" name="qty" value="0" class="input-qty">
							<button class="qty-btn-plus btn-light" type="button"><i class="fa fa-plus"></i></button>
						</div>
					</div>
					<button class="btn btn-same-all">Add to Cart</button>
				</div>
			</div>

			<div class="col-md-12">
				<div class="product-text-all">
					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="home-tab-Description" data-toggle="tab" href="#home-Description" role="tab" aria-controls="home-Description" aria-selected="true">Description</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="profile-tab-About" data-toggle="tab" href="#profile-About" role="tab" aria-controls="profile-About" aria-selected="false">About</a>
						</li>
					</ul>
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="home-Description" role="tabpanel" aria-labelledby="home-tab-Description"><?= $product->des ?></div>
						<div class="tab-pane fade" id="profile-About" role="tabpanel" aria-labelledby="profile-tab-About"><?= $product->about ?></div>
					</div>
				</div>
			</div>

			<!-- <div class="col-md-12">
				<div class="product-text-all">
					<nav>
						<div class="nav nav-tabs" id="nav-tab" role="tablist">
							<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Description</a>
							<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">About</a>
						</div>
					</nav>
					<div class="tab-content" id="nav-tabContent">
						<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
						</div>
						<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
						</div>
					</div>
				</div>
			</div> -->
		</div>
	</div>
</div>
<!--Single Malt-->

<!--Similar Product-->
<div class="similer-product-section section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="all-use-txt text-center new-prodct-mrgn">
					<h2>Similar Product</h2>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div id="carousel" class="owl-carousel smilir-crsl-prdct">
					<?php
					if (!empty($products)) {
						foreach ($products as $fi_product) {
					?>
							<div class="item">
								<a href="<?= base_url('product/' . $fi_product->id) ?>">
									<div class="product-all-list">
										<div class="list-product-img">
											<img src="<?= GET_UPLOADS . 'products/' . $fi_product->f_img ?>" alt="img" class="img-fluid">
										</div>
										<p><?= $fi_product->name ?></p>
										<!-- <span>Nu 780.00</span> -->
									</div>
								</a>
							</div>

					<?php
						}
					}
					?>

				</div>
			</div>
		</div>
	</div>
</div>
<!--Similar Product-->

<!--Head Line all-2-->
<div class="headline-section section" style="background: url(<?= ASSET_URL . 'frontend/' ?>images/abou-2.jpg);">
	<div class="container">
		<div class="row">
			<div class="col-md-6 display-none"></div>
			<div class="col-md-6">
				<div class="distributors-text">
					<div class="all-use-txt">
						<h2 class="mb-2" style="color: #fff;">Dummy Heading</h2>
						<p class="mb-4" style="color: #fff;">All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making </p>
						<a href="#" class="btn btn-same-all abt-btn">contact us</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--Head Line all-2-->
