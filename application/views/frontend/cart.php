<!--Banner sub pages-->
<div class="banner-subpages relative-class" style="background: url(<?= ASSET_URL . 'frontend/' ?>images/bnr-sub1.jpg);">
	<!-- <div class="mob-social-links">
            <ul>
                <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
            </ul>
        </div> -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="sub-banner-cntnt">
					<h1>My Cart</h1>
					<nav aria-label="breadcrumb" class="cstm-bread-crumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<i class="fa-solid fa-angle-right"></i>
							<li class="breadcrumb-item" aria-current="page">My Cart</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
</div>
<!--Banner sub pages-->

<!--Responsive-table-->
<div class="order-history-section section">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-md-9 max-65">
				<div class="ordr-hding">
					<h3>Shopping Cart</h3>
					<a href="#" class="cntnu-shping dsk-block">Continue Shopping <i class="fa-solid fa-arrow-right"></i></a>
				</div>

				<div class="responsive-table-all cart-table">
					<table>
						<thead>
							<tr>
								<th scope="col">Product</th>
								<th scope="col">Price</th>
								<th scope="col">Qty.</th>
								<th scope="col">Total</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
							<?php
							if (!empty($cart_data)) {
								$this->load->model('ProductModel');
								foreach ($cart_data as $cart) {
									$product_data = $this->ProductModel->getproductcalculateddetails($cart->product_id, $cart->user_id);
							?>
									<tr>
										<td data-label="Product">
											<div class="prodct-wth-img">
												<div class="prdct-main-img">
													<img width="50" src="<?= GET_UPLOADS ?>products/<?= $cart->product_img ?>" alt="image">
												</div>
												<div class="prdct-nm-here">
													<p><?= $cart->product_name ?></p>
													<span><?= $cart->product_size ?></span>
												</div>
											</div>
										</td>
										<td data-label="Price"><?= CURRENCY . ' ' . number_format($product_data['total_product_price'], 2) ?></td>
										<td class="qun-t-cls" data-label="Qty.">
											<div class="qty-container">
												<button class="qty-btn-minus btn-light" type="button"><i class="fa fa-minus"></i></button>
												<input readonly type="text" name="qtny" value="<?= $cart->qnty ?>" class="input-qty" />
												<button class="qty-btn-plus btn-light" type="button"><i class="fa fa-plus"></i></button>
											</div>
										</td>
										<td data-label="Total"><?= CURRENCY . ' ' . number_format($product_data['total_product_price'] * $cart->qnty, 2) ?></td>
										<td data-label="">
											<div class="del-icon"><a href='<?= base_url('delete-cart/' . $cart->id) ?>'><i class="fa-regular fa-trash-can"></i></a></div>
										</td>
									</tr>
							<?php
								}
							}
							?>
						</tbody>
					</table>
				</div>

				<div class="mobile-cart-product">
					<!-- <h6>Product</h6> -->
					<div class="product-cntnt">
						<div class="prduct-cntnt-img">
							<img src="images/prdct1.png" alt="img">
						</div>
						<div class="rspnv-prdct-dtls-mob">
							<div class="prdct-name-here">
								<p>Product Name </p><span>750ml</span><i class="fa-regular fa-trash-can"></i>
							</div>
							<div class="price-qunty">
								<p class="price-txt">$8320.00</p>
								<div class="qty-container">
									<button class="qty-btn-minus btn-light" type="button"><i class="fa fa-minus"></i></button>
									<input type="text" name="qty" value="0" class="input-qty" />
									<button class="qty-btn-plus btn-light" type="button"><i class="fa fa-plus"></i></button>
								</div>
							</div>
						</div>
					</div>
					<div class="price-qunty total-pay">
						<p class="price-txt">Total</p>
						<p class="price-txt">$1200.00</p>
					</div>
				</div>

				<div class="mobile-cart-product">
					<!-- <h6>Product</h6> -->
					<div class="product-cntnt">
						<div class="prduct-cntnt-img">
							<img src="images/prdct2.png" alt="img">
						</div>
						<div class="rspnv-prdct-dtls-mob">
							<div class="prdct-name-here">
								<p>Product Name </p><span>750ml</span><i class="fa-regular fa-trash-can"></i>
							</div>
							<div class="price-qunty">
								<p class="price-txt">$8320.00</p>
								<div class="qty-container">
									<button class="qty-btn-minus btn-light" type="button"><i class="fa fa-minus"></i></button>
									<input type="text" name="qty" value="0" class="input-qty" />
									<button class="qty-btn-plus btn-light" type="button"><i class="fa fa-plus"></i></button>
								</div>
							</div>
						</div>
					</div>
					<div class="price-qunty total-pay">
						<p class="price-txt">Total</p>
						<p class="price-txt">$1200.00</p>
					</div>
				</div>

				<div class="mobile-cart-product">
					<!-- <h6>Product</h6> -->
					<div class="product-cntnt">
						<div class="prduct-cntnt-img">
							<img src="images/prdct3.png" alt="img">
						</div>
						<div class="rspnv-prdct-dtls-mob">
							<div class="prdct-name-here">
								<p>Product Name </p><span>750ml</span><i class="fa-regular fa-trash-can"></i>
							</div>
							<div class="price-qunty">
								<p class="price-txt">$8320.00</p>
								<div class="qty-container">
									<button class="qty-btn-minus btn-light" type="button"><i class="fa fa-minus"></i></button>
									<input type="text" name="qty" value="0" class="input-qty" />
									<button class="qty-btn-plus btn-light" type="button"><i class="fa fa-plus"></i></button>
								</div>
							</div>
						</div>
					</div>
					<div class="price-qunty total-pay">
						<p class="price-txt">Total</p>
						<p class="price-txt">$1200.00</p>
					</div>
				</div>
				<a href="<?=base_url('shop-now')?>" class="cntnu-shping dsk-none"><i class="fa-solid fa-arrow-left"></i> Continue Shopping</a>
			</div>

			<div class="col-md-4 max-30">
				<div class="ordr-smry">
					<h3>Order Summary</h3>
					<div class="sub-total">
						<p>Sub Total</p>
						<p>Nu 1080.00</p>
					</div>

					<div class="sub-total">
						<p>Shipping</p>
						<p>Nu 20.00 <span>Estimate</span></p>
					</div>

					<div class="prmo-cod">
						<p>Promocode</p>
						<div class="field" id="searchform">
							<input type="text" id="searchterm" />
							<button type="button" id="search">APPLY</button>
						</div>
						<div class="whit-line"></div>
					</div>

					<div class="sub-total">
						<p>Total</p>
						<p class="fnt-18">Nu 1100.00</p>
					</div>
					<button class="btn btn-same-all abt-btn pding-18">Proceed to ckeckout</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!--Responsive-table-->

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
