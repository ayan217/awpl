<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>

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
                        <a class="nav-link" href="log-in.html">My Account</a>
                    </li>
                    <li class="nav-item mob-show-only log-out-my-acnt">
                        <a class="nav-link" href="sign-up.html">Log Out</a><span>("Name")</span>
                    </li>
                  </ul>
                  <div class="social-links dsk-social-links">
                    <ul>
                        <li><a href="#">Hi, John</a></li>
                        <li><a href="#">My Account</a></li>
                        <li><a href="log-in.html" class="scl-nav-btn">Logout</a></li>
                        <li><a href="#" style="position: relative;"><img src="images/cartimg.png" alt="" class="bskt"><span class="add-cart">0</span></a></li>
                        <!-- <li><a href="sign-up.html" class="scl-nav-btn">Sign up</a></li>
                        <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                        <li><a href="#" style="margin-right: 0;"><i class="fa-brands fa-instagram"></i></a></li> -->
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
                        <h1>John Doe</h1>
                        <nav aria-label="breadcrumb" class="cstm-bread-crumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#">Home</a></li>
                              <i class="fa-solid fa-angle-right"></i>
                              <li class="breadcrumb-item" aria-current="page">My Account</li>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="ordr-hding">
                        <h3>Order History</h3>
                        <div class="dropdown">
                            <span>View</span>
                            <button class="btn dropdown-toggle " type="button" id="drop-manu-item" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Currents Orders
                            </button>
                            <div class="dropdown-menu" aria-labelledby="drop-manu-item">
                              <a class="dropdown-item table-filter-items" href="#">Currents Orders</a>
                              <a class="dropdown-item table-filter-items" href="#">Past Orders</a>
                            </div>
                        </div>
                    </div>

                    <div class="responsive-table-all">
                        <table>
                            <thead>
                              <tr>
                                <th scope="col">Order No.</th>
                                <th scope="col">Date</th>
                                <th scope="col">Qty.</th>
                                <th scope="col">Amount (Nu)</th>
                                <th scope="col">Shipping (Nu)</th>
                                <th scope="col">Total (Nu)</th>
                                <th scope="col">Depot No.</th>
                                <th scope="col"></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td data-label="Order No.">0682345</td>
                                <td data-label="Date">05-05-23</td>
                                <td data-label="Qty.">5</td>
                                <td data-label="Amount (Nu)">1450.00</td>
                                <td data-label="Shipping (Nu)">40.00</td>
                                <td data-label="Total (Nu)">1800.00</td>
                                <td data-label="Depot No.">15</td>
                                <td data-label=""><div class="eye-icon" data-toggle="modal" data-target="#exampleModal"><i class="fa-regular fa-eye"></i></div></td>
                              </tr>
                              <tr>
                                <td data-label="Order No.">012345</td>
                                <td data-label="Date">04-05-2023</td>
                                <td data-label="Qty.">3</td>
                                <td data-label="Amount (Nu)">1080.00</td>
                                <td data-label="Shipping (Nu)">20.00</td>
                                <td data-label="Total (Nu)">1100.00</td>
                                <td data-label="Depot No.">--</td>
                                <td data-label=""><div class="eye-icon" data-toggle="modal" data-target="#exampleModal"><i class="fa-regular fa-eye"></i></div></td>
                              </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="pagination-cstm">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                              <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                              <li class="page-item"><a class="page-link" href="#">1</a></li>
                              <li class="page-item"><a class="page-link" href="#">2</a></li>
                              <li class="page-item"><a class="page-link" href="#">3</a></li>
                              <li class="page-item"><a class="page-link" href="#">4</a></li>
                              <li class="page-item"><a class="page-link" href="#">5</a></li>
                              <li class="page-item"><a class="page-link" href="#">6</a></li>
                              <li class="page-item"><a class="page-link" href="#">7</a></li>
                              <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Responsive-table-->

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



    <!---Modal View-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog max-modal" role="document">
            <div class="modal-content cstm-modal-open">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">Order Number <span>0682345</span></h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="responsive-table-all cart-table">
                                <table>
                                    <thead>
                                      <tr>
                                        <th scope="col">Product</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Qty.</th>
                                        <th class="with-unset" scope="col">Total</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td data-label="Product">
                                            <div class="prodct-wth-img justify-unset">
                                                <div class="prdct-main-img">
                                                    <img src="images/prdct1.png" alt="image">
                                                </div>
                                                <div class="prdct-nm-here">
                                                    <p>Product Name Here</p>
                                                    <span>750ml</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-label="Price">Nu 360.00</td>
                                        <td class="qun-t-cls" data-label="Qty.">01</td>
                                        <td data-label="Total">Nu 1450.00</td>
                                      </tr>

                                      <tr>
                                        <td data-label="Product">
                                            <div class="prodct-wth-img justify-unset">
                                                <div class="prdct-main-img">
                                                    <img src="images/prdct2.png" alt="image">
                                                </div>
                                                <div class="prdct-nm-here">
                                                    <p>Product Name Here</p>
                                                    <span>750ml</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-label="Price">Nu 360.00</td>
                                        <td class="qun-t-cls" data-label="Qty.">01</td>
                                        <td data-label="Total">Nu 1450.00</td>
                                      </tr>

                                      <tr>
                                        <td data-label="Product">
                                            <div class="prodct-wth-img justify-unset">
                                                <div class="prdct-main-img">
                                                    <img src="images/prdct3.png" alt="image">
                                                </div>
                                                <div class="prdct-nm-here">
                                                    <p>Product Name Here</p>
                                                    <span>750ml</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-label="Price">Nu 360.00</td>
                                        <td class="qun-t-cls" data-label="Qty.">01</td>
                                        <td data-label="Total">Nu 1450.00</td>
                                      </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="mobile-cart-product">
                                <div class="product-cntnt borer-btm-c">
                                    <div class="prduct-cntnt-img">
                                        <img src="images/prdct1.png" alt="img">
                                    </div>
                                    <div class="rspnv-prdct-dtls-mob w-90-cart">
                                        <div class="prdct-name-here"><p>Product Name <span class="ml-btl">750ml</span></p><span>01</span> <span>Nu 8020.00</span></div>
                                    </div>
                                </div>

                                <div class="product-cntnt borer-btm-c">
                                    <div class="prduct-cntnt-img">
                                        <img src="images/prdct2.png" alt="img">
                                    </div>
                                    <div class="rspnv-prdct-dtls-mob w-90-cart">
                                        <div class="prdct-name-here"><p>Product Name <span class="ml-btl">750ml</span></p><span>01</span> <span>Nu 8020.00</span></div>
                                    </div>
                                </div>

                                <div class="product-cntnt">
                                    <div class="prduct-cntnt-img">
                                        <img src="images/prdct3.png" alt="img">
                                    </div>
                                    <div class="rspnv-prdct-dtls-mob w-90-cart">
                                        <div class="prdct-name-here"><p>Product Name <span class="ml-btl">750ml</span></p><span>01</span> <span>Nu 8020.00</span></div>
                                    </div>
                                </div>

                                <div class="price-qunty mob-sub-bg">
                                    <p class="price-txt">Sub Total</p>
                                    <p class="price-txt">Nu 8020.00</p>
                                </div>
                                <div class="price-qunty mob-sub-bg">
                                    <p class="price-txt">Shipping</p>
                                    <p class="price-txt">Nu 20.00</p>
                                </div>
                                <div class="price-qunty total-pay">
                                    <p class="price-txt">Total</p>
                                    <p class="price-txt fnt-bold">Nu 8040.00</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7"></div>
                        <div class="col-md-5">
                            <div class="sub-total-new">
                                <div class="total-nmbr mb-3">
                                    <p>Sub Total</p>
                                    <p>Nu 1080.00</p>
                                </div>
                                <div class="total-nmbr mb-3">
                                    <p>Shipping</p>
                                    <p>Nu 20.00</p>
                                </div>
                                <div class="total-nmbr">
                                    <p>Total</p>
                                    <p style="font-size: 20px;">Nu 1100.00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="close-btn-btm">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap v4 js -->
    <script src="jquery/js/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>