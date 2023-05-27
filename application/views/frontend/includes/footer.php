<div class="footer-section section" style="background: url(<?= ASSET_URL ?>frontend/images/footer.jpg);">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="cmpny-lgo">
					<img class="img-fluid" src="<?= ASSET_URL ?>frontend/images/logo.png" alt="img">
					<ul class="social-ftr-link">
						<li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
						<li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
						<li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
					</ul>
				</div>
			</div>

			<div class="col-md-4">
				<div class="footer-links">
					<h6>Links</h6>
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="about.html">About</a></li>
						<li><a href="faq.html">FAQs</a></li>
						<li><a href="contact.html">Contact</a></li>
					</ul>
				</div>
			</div>

			<div class="col-md-4">
				<div class="footer-links">
					<h6>Contact Info</h6>
					<div class="cntct-info-all mb-3">
						<div class="cntct-icon"><i class="fa-solid fa-location-dot"></i></div>
						<p>5157 Lorem Ipsum Dummy<br> Address Here</p>
					</div>
					<a href="tel:+975 32 202525">
						<div class="cntct-info-all mb-4">
							<div class="cntct-icon"><i class="fa-solid fa-phone"></i></div>
							<p>+975 32 202525</p>
						</div>
					</a>
					<a href="mailto:abc123@email.com">
						<div class="cntct-info-all">
							<div class="cntct-icon"><i class="fa-solid fa-envelope"></i></div>
							<p>abc123@email.com</p>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="white-line"></div>
	<div class="container nw-cls-space">
		<div class="row">
			<div class="col-md-6">
				<p class="font-14 mob-pb-5">© 2023 Army Welfare Project Limited • All Rights Reserved</p>
			</div>
			<div class="col-md-6">
				<div class="links-lst text-right text-mob-center">
					<a href="#" class="font-14">Trems & Conditions</a>
					<a href="#" class="font-14">Privacy Policy</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!--Footer Section-->

<!--Mobile Bottom Stiky-->
<div class="navigation-bar">
	<ul>
		<li><a href="#"><img src="<?= ASSET_URL ?>frontend/images/icon1.jpg" alt="nav-icon"></a></li>
		<li><a href="#"><img src="<?= ASSET_URL ?>frontend/images/icon2.jpg" alt="nav-icon"></a></li>
		<li><a href="#"><img src="<?= ASSET_URL ?>frontend/images/icon3.jpg" alt="nav-icon"></a></li>
		<li><a href="#"><img src="<?= ASSET_URL ?>frontend/images/icon4.jpg" alt="nav-icon"></a></li>
	</ul>
</div>
<!--Mobile Bottom Stiky-->
<!-- Bootstrap v4 js -->
<script src="<?= ASSET_URL ?>frontend/bootstrap/js/bootstrap.min.js"></script>
<!--Aos-->
<script src="<?= ASSET_URL ?>frontend/js/aos.js"></script>
<!--Owl Carousel cdn-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<!--Slick Slider-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script src="<?= ASSET_URL ?>frontend/js/custom.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script>
	//Aos Block page
	AOS.init({
		duration: 1000,
		once: true,
		disable: function() {
			var maxWidth = 991;
			return window.innerWidth < maxWidth;
		}
	});


	//=====Carousel owl===========//
jQuery("#carousel").owlCarousel({
    navigation : true,
    autoplay: true,
    lazyLoad: true,
    loop: true,
    margin: 30,
    nav:true,
    navText : [
        '<img src="<?=ASSET_URL?>frontend/images/left-a.png" alt="img">',
        '<img src="<?=ASSET_URL?>frontend/images/left-a.png" alt="img">'
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
</script>
</body>

</html>
