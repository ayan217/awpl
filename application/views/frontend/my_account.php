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
                    <h1><?= logged_in_user_row()->full_name ?></h1>
                    <nav aria-label="breadcrumb" class="cstm-bread-crumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
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
                            <?= $type == 1 ? 'Past Orders' : 'Currents Orders' ?>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="drop-manu-item">
                            <a class="dropdown-item table-filter-items" href="<?= base_url('my-account/0') ?>">Currents Orders</a>
                            <a class="dropdown-item table-filter-items" href="<?= base_url('my-account/1') ?>">Past Orders</a>
                        </div>
                    </div>
                </div>

                <div class="responsive-table-all">
                    <table id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">Order No.</th>
                                <th scope="col">Date</th>
                                <th scope="col">Total (Nu)</th>
                                <th scope="col">Depot No.</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($orders)) {
                                foreach ($orders as $order) {
                            ?>
                                    <tr>
                                        <td data-label="Order No."><?= $order->order_no ?></td>
                                        <td data-label="Date"><?= date('d-m-Y', strtotime($order->created_at)) ?></td>
                                        <td data-label="Total (Nu)"><?= number_format($order->total, 2) ?></td>
                                        <td data-label="Depot No."><?= $order->depot_name ?></td>
                                        <td data-label="">
                                            <div class="eye-icon" data-toggle="modal" data-target="#exampleModal" onclick="show_details(<?= $order->id ?>)"><i class="fa-regular fa-eye"></i></div>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <!-- <div class="pagination-cstm">
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
                </div> -->

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
        <div class="modal-content cstm-modal-open" id="show_details">



        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script>
    function show_details(id) {
        var url = '<?= base_url('Home/show_order_detail/') ?>' + id;
        $.ajax({
            url: url,
            success: function(res) {
                $('#show_details').html(res);
            }
        });
    }
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
</body>

</html>