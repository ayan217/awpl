<!--Owl Carousel cdn-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
<!--Slick Slider-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
<!--Slick Slider-->
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
										foreach ($thumbs as $thumb) {
								?>
											<div class="thumbnail-image">
												<div class="thumbImg">
													<img src="<?= GET_UPLOADS ?>products/thumb/<?= $thumb ?>" alt="slider-img">
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
										foreach ($orgs as $org) {
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
						<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
							<img src="images/add-cart.png" alt="img">
						</div>
						<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
							<img src="images/add-cart1.png" alt="img">
						</div>
						<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
							<img src="images/add-cart.png" alt="img">
						</div>
						<div class="tab-pane fade" id="nav-contact-lst" role="tabpanel" aria-labelledby="nav-contact-tab-lst">
							<img src="images/add-cart1.png" alt="img">
						</div>
					</div>
					<nav>
						<div class="nav nav-tabs" id="nav-tab" role="tablist">
							<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
								<img src="images/thm2.jpg" alt="img">
							</a>
							<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
								<img src="images/thm1.jpg" alt="img">
							</a>
							<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">
								<img src="images/thm1.jpg" alt="img">
							</a>
							<a class="nav-item nav-link" id="nav-contact-tab-lst" data-toggle="tab" href="#nav-contact-lst" role="tab" aria-controls="nav-contact-lst" aria-selected="false">
								<img src="images/thm2.jpg" alt="img">
							</a>
						</div>
					</nav>
				</div>
			</div>

			<div class="col-md-6">
				<div class="product-all-dtls">
					<!-- <p class="stoke">In Stoke</p> -->
					<h2 class="prdct-name"><?=$product->name?></h2>
					<h3 class="prdct-rps"><?php
					if(user_login_check()==true){
						
					}
					?></h3>
					<!-- <span class="prdct-size">Size</span>
					<div class="bottle-size">
						<p class="ml-qnty">180 ml</p>
						<p class="ml-qnty">375 ml</p>
						<p class="ml-qnty">500 ml</p>
						<p class="ml-qnty">750 ml</p>
						<p class="ml-qnty">1000 ml</p>
					</div> -->
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
					<nav>
						<div class="nav nav-tabs" id="nav-tab" role="tablist">
							<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Description</a>
							<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">About</a>
						</div>
					</nav>
					<div class="tab-content" id="nav-tabContent">
						<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"><?= $product->des ?>1
						</div>
						<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"><?= $product->about ?>2
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--Single Malt-->
<!--Owl Carousel cdn-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<!--Slick Slider-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
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
								<div class="product-all-list">
									<div class="list-product-img">
										<img src="<?= GET_UPLOADS . 'products/' . $fi_product->f_img ?>" alt="img" class="img-fluid">
									</div>
									<p><?= $fi_product->name ?></p>
									<!-- <span>Nu 780.00</span> -->
								</div>
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

<script>
	//=====Carousel owl===========//
jQuery("#carousel").owlCarousel({
    navigation : true,
    autoplay: true,
    lazyLoad: true,
    loop: true,
    margin: 30,
    nav:true,
    navText : [
        '<img src="images/left-a.png" alt="img">',
        '<img src="images/left-a.png" alt="img">'
    ],
    responsiveClass: true,
    autoHeight: true,
    autoplayTimeout: 3000,
    dots: false,
    smartSpeed: 2000,
    responsive: {
      0: {
        items: 2
      },
  
      600: {
        items: 3
      },
  
      1024: {
        items: 4
      },
  
      1366: {
        items: 4
      }
    }
});


//slick
$('.slider-for').slick({
  slidesToShow: 1,
  // slidesToScroll: false,
  swipe: false,
  arrows: true,
  fade: true,
  asNavFor: '.slider-nav'
});
$('.slider-nav').slick({
  slidesToShow: 4,
  slidesToScroll: 1,
  vertical:true,
  asNavFor: '.slider-for',
  dots: false,
  focusOnSelect: true,
  verticalSwiping:false,
  nav: true,
  responsive: [
  {
      breakpoint: 992,
      settings: {
        vertical: false,
      }
  },
  {
    breakpoint: 768,
    settings: {
      vertical: false,
    }
  },
  {
    breakpoint: 580,
    settings: {
      vertical: false,
      slidesToShow: 3,
    }
  },
  {
    breakpoint: 380,
    settings: {
      vertical: false,
      slidesToShow: 2,
    }
  }
  ]
});

</script>
