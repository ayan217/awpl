<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
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
                      <a class="nav-link" href="index.html">Home</a>
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
    
    <!--log In section-->
    <div class="log-in-section section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-all-cstm">
                        <div class="all-use-txt text-center txt-cr-chng">
                            <h2>LogiN</h2>
                            <p>Don't have an account? <a href="#">Sign Up</a></p>
                        </div>
                        <form class="cstm-log-from">
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">User Name</label>
                              <input type="Text" class="form-control inpt-fild"  id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Password</label>
                              <input type="password" class="form-control inpt-fild" id="exampleInputPassword1" minlength="8" maxlength="10">
                            </div>
                            <div class="mb-3 form-check d-flex justify-content-between">
                                <div>
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label check-label" for="exampleCheck1">Keep me logged in</label>
                                </div>
                                <p class="forget-password"><a href="#"><i>Forgot password?</i></a></p>
                            </div>
                            <button class="btn btn-same-all sbmit-btn login-btn">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--log In section-->

    <!--Footer Section-->
    <div class="footer-section section" style="background: url(images/footer.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="cmpny-lgo">
                        <img class="img-fluid" src="images/logo.png" alt="img">
                        <ul class="social-ftr-link">
                            <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3">
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