<div class="content-wrapper">
    <?php
    if ($this->session->flashdata('log_suc')) {
    ?>
        <button type="button" class="cpy-alert btn btn-inverse-success btn-fw mb-2 w-100"><?= $this->session->flashdata('log_suc') ?></button>
    <?php
    } elseif ($this->session->flashdata('log_err')) {
    ?>
        <button type="button" class="cpy-alert btn btn-inverse-danger btn-fw mb-2 w-100"><?= $this->session->flashdata('log_err') ?></button>
    <?php
    }
    ?>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="card-title">Orders</h4>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Order No.</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Total (Nu)</th>
                                    <th scope="col">Depot No.</th>
                                    <th scope="col">View</th>
                                    <?php
                                    if (admin_type() == SUPER || admin_type() == DEPOT) {
                                    ?>
                                        <th>Action</th>
                                    <?php
                                    } else {
                                        echo '<th scope="col">Status</th>';
                                    }
                                    ?>
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
                                                <div class="eye-icon" onclick="show_details(<?= $order->id ?>)"><i class="fa-regular fa-eye"></i></div>
                                            </td>
                                            <?php
                                            if (admin_type() == SUPER || admin_type() == DEPOT) {
                                                if ($order->status == 0) {
                                            ?>
                                                    <td>
                                                        <a href="<?= ADMIN_URL ?>order/approve/<?= $order->id ?>" class="btn btn-warning">Mark as delivered</a>
                                                    </td>
                                            <?php
                                                } else {
                                                    echo '<td class="text-success">Delivered</td>';
                                                }
                                            } else {
                                                if ($order->status == 0) {
                                                    echo '<td class="text-warning">Pending</td>';
                                                } else {
                                                    echo '<td class="text-success">Delivered</td>';
                                                }
                                            }
                                            ?>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo '<tr><td align="center" colspan="9">No Orders Found</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!---Modal View-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog max-modal" role="document">
        <div class="modal-content cstm-modal-open" id="show_details">
        </div>
    </div>
</div>
<script>
    function show_details(id) {
        var url = '<?= base_url('Home/show_order_detail/') ?>' + id;
        $.ajax({
            url: url,
            success: function(res) {
                $('#exampleModal').modal('show');
                $('#show_details').html(res);
            }
        });
    }
</script>