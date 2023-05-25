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
					<h1>shop Products</h1>
					<nav aria-label="breadcrumb" class="cstm-bread-crumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
							<i class="fa-solid fa-angle-right"></i>
							<li class="breadcrumb-item" aria-current="page">Shop Now</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
</div>
<!--Banner sub pages-->

<!--Product filter option-->
<div class="product-filter-section section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="nav nav-tabs shop-btn-top" id="myTab" role="tablist">
					<?php
					if (user_login_check() == true) {
						if (logged_in_user_row()->type !== '3') {
					?>
							<li class="nav-item">
								<a class="nav-link active" id="liquore-tab" data-toggle="tab" href="#liquore" role="tab" aria-controls="liquore" aria-selected="true">Liquors</a>
							</li>
						<?php
						}
					} else {
						?>
						<li class="nav-item">
							<a class="nav-link active" id="liquore-tab" data-toggle="tab" href="#liquore" role="tab" aria-controls="liquore" aria-selected="true">Liquors</a>
						</li>
					<?php
					}
					?>
					<li class="nav-item">
						<a class="nav-link <?php
											if (user_login_check() == true) {
												if (logged_in_user_row()->type == '3') {
													echo 'active';
												}
											} ?>" id="water-tab" data-toggle="tab" href="#water" role="tab" aria-controls="water" aria-selected="<?php
																																					if (user_login_check() == true) {
																																						if (logged_in_user_row()->type !== '3') {
																																							echo 'true';
																																						} else {
																																							echo 'false';
																																						}
																																					} else {
																																						echo 'false';
																																					} ?>">Water</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="mask-tab" data-toggle="tab" href="#mask" role="tab" aria-controls="mask" aria-selected="false">Masks</a>
					</li>
					<li class="nav-item">
						<a class="nav-link position-unset" id="sanitizers-tab" data-toggle="tab" href="#sanitizers" role="tab" aria-controls="sanitizers" aria-selected="false">Sanitizers</a>
					</li>
				</ul>
				<div class="tab-content" id="myTabContent">
					<?php
					if (user_login_check() == true) {
						if (logged_in_user_row()->type !== '3') {
					?>
							<div class="tab-pane fade show active" id="liquore" role="tabpanel" aria-labelledby="liquore-tab">
								<div class="row">
									<?php
									$this->load->model('ProductModel');
									if (user_login_check() == true) {
										$l_products = $this->ProductModel->getproductbydpot(logged_in_user_row()->dpot_id, null, 1);
									} else {
										$l_products = $this->ProductModel->getproductbydpot(null, null, 1);
									}
									if (!empty($l_products)) {
										foreach ($l_products as $l_product) {
									?>
											<div class="col-md-3 w-mob-50">
												<a href="<?= base_url('product/' . $l_product->id) ?>">
													<div class="product-all-list">
														<div class="list-product-img">
															<img src="<?= GET_UPLOADS . 'products/' . $l_product->f_img ?>" alt="img" class="img-fluid">
														</div>
														<p><?= $l_product->name ?></p>
														<?php
														if (user_login_check() == true) {
														?>
															<span><?= CURRENCY . ' ' . $l_product->price ?></span>
														<?php
														}
														?>
													</div>
												</a>
											</div>

									<?php
										}
									}
									?>
								</div>
							</div>
						<?php
						}
					} else {
						?>
						<div class="tab-pane fade show active" id="liquore" role="tabpanel" aria-labelledby="liquore-tab">
							<div class="row">
								<?php
								$this->load->model('ProductModel');
								if (user_login_check() == true) {
									$l_products = $this->ProductModel->getproductbydpot(logged_in_user_row()->dpot_id, null, 1);
								} else {
									$l_products = $this->ProductModel->getproductbydpot(null, null, 1);
								}
								if (!empty($l_products)) {
									foreach ($l_products as $l_product) {
								?>
										<div class="col-md-3 w-mob-50">
											<a href="<?= base_url('product/' . $l_product->id) ?>">
												<div class="product-all-list">
													<div class="list-product-img">
														<img src="<?= GET_UPLOADS . 'products/' . $l_product->f_img ?>" alt="img" class="img-fluid">
													</div>
													<p><?= $l_product->name ?></p>
													<?php
													if (user_login_check() == true) {
													?>
														<span><?= CURRENCY . ' ' . $l_product->price ?></span>
													<?php
													}
													?>
												</div>
											</a>
										</div>

								<?php
									}
								}
								?>
							</div>
						</div>
					<?php
					}
					?>
					<div class="tab-pane fade <?php
												if (user_login_check() == true) {
													if (logged_in_user_row()->type == '3') {
														echo 'show active';
													}
												} ?>" id="water" role="tabpanel" aria-labelledby="water-tab">
						<div class="row">
							<?php
							$this->load->model('ProductModel');
							if (user_login_check() == true) {
								$w_products = $this->ProductModel->getproductbydpot(logged_in_user_row()->dpot_id, null, 0);
							} else {
								$w_products = $this->ProductModel->getproductbydpot(null, null, 0);
							}
							if (!empty($w_products)) {
								foreach ($w_products as $w_product) {
							?>
									<div class="col-md-3 w-mob-50">
										<a href="<?= base_url('product/' . $w_product->id) ?>">
											<div class="product-all-list">
												<div class="list-product-img">
													<img src="<?= GET_UPLOADS . 'products/' . $w_product->f_img ?>" alt="img" class="img-fluid">
												</div>
												<p><?= $w_product->name ?></p>
												<?php
												if (user_login_check() == true) {
												?>
													<span><?= CURRENCY . ' ' . $w_product->price ?></span>
												<?php
												}
												?>
											</div>
										</a>
									</div>

							<?php
								}
							}
							?>
						</div>
					</div>
					<div class="tab-pane fade" id="mask" role="tabpanel" aria-labelledby="mask-tab">
						<div class="row">
							<?php
							$this->load->model('ProductModel');
							if (user_login_check() == true) {
								$m_products = $this->ProductModel->getproductbydpot(logged_in_user_row()->dpot_id, null, 2);
							} else {
								$m_products = $this->ProductModel->getproductbydpot(null, null, 2);
							}
							if (!empty($m_products)) {
								foreach ($m_products as $m_product) {
							?>
									<div class="col-md-3 w-mob-50">
										<a href="<?= base_url('product/' . $m_product->id) ?>">
											<div class="product-all-list">
												<div class="list-product-img">
													<img src="<?= GET_UPLOADS . 'products/' . $m_product->f_img ?>" alt="img" class="img-fluid">
												</div>
												<p><?= $m_product->name ?></p>
												<?php
												if (user_login_check() == true) {
												?>
													<span><?= CURRENCY . ' ' . $m_product->price ?></span>
												<?php
												}
												?>
											</div>
										</a>
									</div>

							<?php
								}
							}
							?>
						</div>
					</div>
					<div class="tab-pane fade" id="sanitizers" role="tabpanel" aria-labelledby="sanitizers-tab">
						<div class="row">
							<?php
							$this->load->model('ProductModel');
							if (user_login_check() == true) {
								$s_products = $this->ProductModel->getproductbydpot(logged_in_user_row()->dpot_id, null, 3);
							} else {
								$s_products = $this->ProductModel->getproductbydpot(null, null, 3);
							}
							if (!empty($s_products)) {
								foreach ($s_products as $s_product) {
							?>
									<div class="col-md-3 w-mob-50">
										<a href="<?= base_url('product/' . $s_product->id) ?>">
											<div class="product-all-list">
												<div class="list-product-img">
													<img src="<?= GET_UPLOADS . 'products/' . $s_product->f_img ?>" alt="img" class="img-fluid">
												</div>
												<p><?= $s_product->name ?></p>
												<?php
												if (user_login_check() == true) {
												?>
													<span><?= CURRENCY . ' ' . $s_product->price ?></span>
												<?php
												}
												?>
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
	</div>
</div>
<!--Product filter option-->

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
