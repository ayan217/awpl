<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
     <!--Bootstrap v4 Css-->
     <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>
     <!--Fontawesome Icon-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
     <!--Main Css-->
     <link rel="stylesheet" href="css/custom.css">
</head>
<body>
     <!--Nav bar-->
     <header class="nav-top lgo-scrll unset-scroll">
        <div class="cstm-container pdng-lr-0" style="position: relative;">
            <a href="index.html"><img class="main-logo scrl-img" src="images/logo.png" alt="" class="logo"></a>
            <nav class="navbar navbar-expand-lg mobile-nav-bar flex-reverse">
                <a class="navbar-brand mob-cart" href="index.html" style="position: relative;"><img class="bskt" src="images/cartimg.png" alt="" class="cart"><span class="add-cart">0</span></a>
                <button class="navbar-toggler pdng-lr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse nav-option-link" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link active-nav-color" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="about.html">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="faq.html">FAQs</a>
                      </li>
                    <li class="nav-item">
                      <a class="nav-link" href="contact.html">Contact</a>
                    </li>
                    <li class="nav-item mob-show-only">
                        <a class="nav-link" href="log-in.html">Log In</a>
                    </li>
                    <li class="nav-item mob-show-only">
                        <a class="nav-link" href="sign-up.html">Sign Up</a>
                    </li>
                  </ul>
                  <div class="social-links dsk-social-links">
                    <ul>
                        <li><a href="#" style="position: relative;"><img src="images/cartimg.png" alt="" class="bskt"><span class="add-cart">0</span></a></li>
                        <li><a href="log-in.html">LOGIN</a></li>
                        <li><a href="sign-up.html" class="scl-nav-btn">Sign up</a></li>
                        <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                        <li><a href="#" style="margin-right: 0;"><i class="fa-brands fa-instagram"></i></a></li>
                    </ul>
                  </div>
                </div>
            </nav>
        </div>
    </header>
    <div class="blank-space"></div>
    <!--Nav bar-->

    <!--Banner sub pages-->
    <div class="banner-subpages relative-class" style="background: url(images/bnr-sub1.jpg);">
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
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                        <li class="nav-item">
                          <a class="nav-link active" id="liquore-tab" data-toggle="tab" href="#liquore" role="tab" aria-controls="liquore" aria-selected="true">Liquors</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="water-tab" data-toggle="tab" href="#water" role="tab" aria-controls="water" aria-selected="false">Water</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="mask-tab" data-toggle="tab" href="#mask" role="tab" aria-controls="mask" aria-selected="false">Masks</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link position-unset" id="sanitizers-tab" data-toggle="tab" href="#sanitizers" role="tab" aria-controls="sanitizers" aria-selected="false">Sanitizers</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="liquore" role="tabpanel" aria-labelledby="liquore-tab">
                            <div class="row">
                                <div class="col-md-3 w-mob-50">
                                    <a href="#">
                                        <div class="product-all-list">
                                            <div class="list-product-img">
                                                <img src="images/pa1.png" alt="img" class="img-fluid">
                                            </div>
                                            <p>Lorem Ipsum Product</p>
                                            <span>Nu 780.00</span>
                                        </div>
                                    </a>
                                </div>
    
                                <div class="col-md-3 w-mob-50">
                                    <a href="#">
                                        <div class="product-all-list">
                                            <div class="list-product-img">
                                                <img src="images/pa2.png" alt="img" class="img-fluid">
                                            </div>
                                            <p>Lorem Ipsum Product</p>
                                            <span>Nu 780.00</span>
                                        </div>
                                    </a>
                                </div>
    
                                <div class="col-md-3 w-mob-50">
                                    <a href="#">
                                        <div class="product-all-list">
                                            <div class="list-product-img">
                                                <img src="images/pa1.png" alt="img" class="img-fluid">
                                            </div>
                                            <p>Lorem Ipsum Product</p>
                                            <span>Nu 780.00</span>
                                        </div>
                                    </a>
                                </div>
    
                                <div class="col-md-3 w-mob-50">
                                    <a href="#">
                                        <div class="product-all-list">
                                            <div class="list-product-img">
                                                <img src="images/pa2.png" alt="img" class="img-fluid">
                                            </div>
                                            <p>Lorem Ipsum Product</p>
                                            <span>Nu 780.00</span>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-md-3 w-mob-50">
                                    <a href="#">
                                        <div class="product-all-list">
                                            <div class="list-product-img">
                                                <img src="images/pa2.png" alt="img" class="img-fluid">
                                            </div>
                                            <p>Lorem Ipsum Product</p>
                                            <span>Nu 780.00</span>
                                        </div>
                                    </a>
                                </div>
    
                                <div class="col-md-3 w-mob-50">
                                    <a href="#">
                                        <div class="product-all-list">
                                            <div class="list-product-img">
                                                <img src="images/pa1.png" alt="img" class="img-fluid">
                                            </div>
                                            <p>Lorem Ipsum Product</p>
                                            <span>Nu 780.00</span>
                                        </div>
                                    </a>
                                </div>
    
                                <div class="col-md-3 w-mob-50">
                                    <a href="#">
                                        <div class="product-all-list">
                                            <div class="list-product-img">
                                                <img src="images/pa2.png" alt="img" class="img-fluid">
                                            </div>
                                            <p>Lorem Ipsum Product</p>
                                            <span>Nu 780.00</span>
                                        </div>
                                    </a>
                                </div>
    
                                <div class="col-md-3 w-mob-50">
                                    <a href="#">
                                        <div class="product-all-list">
                                            <div class="list-product-img">
                                                <img src="images/pa1.png" alt="img" class="img-fluid">
                                            </div>
                                            <p>Lorem Ipsum Product</p>
                                            <span>Nu 780.00</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row tab-pane fade" id="water" role="tabpanel" aria-labelledby="water-tab">
                            <div class="col-md-3">
                                <img src="images/pa2.png" alt="img" class="img-fluid">
                            </div>
                        </div>
                        <div class="tab-pane fade" id="mask" role="tabpanel" aria-labelledby="mask-tab">
                            <div class="col-md-3">
                                <img src="images/pa1.png" alt="img" class="img-fluid">
                            </div>
                        </div>
                        <div class="tab-pane fade" id="sanitizers" role="tabpanel" aria-labelledby="sanitizers-tab">
                            <div class="col-md-3">
                                <img src="images/pa2.png" alt="img" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Product filter option-->

    <!--Head Line all-2-->
    <div class="headline-section section" style="background: url(images/abou-2.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-6 display-none"></div>
                <div class="col-md-6">
                    <div class="distributors-text">
                        <div class="all-use-txt">
                            <h2 class="mb-2" style="color: #fff;">Dummy Heading</h2>
                            <p class="mb-4" style="color: #fff;">All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making  </p>
                            <a href="#" class="btn btn-same-all abt-btn">contact us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Head Line all-2-->

    <!--Footer Section-->
    <div class="footer-section section" style="background: url(images/footer.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="cmpny-lgo">
                        <img class="img-fluid" src="images/logo.png" alt="img">
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
            <li><a href="#"><img src="images/icon1.jpg" alt="nav-icon"></a></li>
            <li><a href="#"><img src="images/icon2.jpg" alt="nav-icon"></a></li>
            <li><a href="#"><img src="images/icon3.jpg" alt="nav-icon"></a></li>
            <li><a href="#"><img src="images/icon4.jpg" alt="nav-icon"></a></li>
        </ul>
    </div>
    <!--Mobile Bottom Stiky-->

    <!-- Bootstrap v4 js -->
    <script src="jquery/js/jquery-3.2.1.slim.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    
</body>
</html>