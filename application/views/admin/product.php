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
							<h4 class="card-title">Products</h4>
						</div>
						<?php
						if (admin_type() == SUPER) {
						?>
							<div>
								<a href="<?= ADMIN_URL . 'Products/add_Product' ?>" class="btn btn-primary">Add New Product</a>
							</div>
						<?php
						}
						?>
					</div>
					<hr>
					<div class="table-responsive">
						<table id="datatable" class="table table-hover">
							<thead>
								<tr>
									<th>Name</th>
									<th>Type</th>
									<th>Depot</th>
									<th>Size</th>
									<th>Rate Per Case</th>
									<th>Discount</th>
									<th>Excise Duty Rate %</th>
									<th>Dist Pert Fee</th>
									<th>Principal Dist Fee</th>
									<th>TDS %</th>
									<?php
									if (admin_type() == SUPER) {
									?>
										<th>Action</th>
									<?php
									}
									?>
								</tr>
							</thead>
							<tbody>
								<?php
								if (!empty($products)) {
									foreach ($products as $product) {
										if ($product->type == 0) {
											$type = 'Water';
											$exc = '_ _';
											$df = '_ _';
											$pdf = '_ _';
											$tds = $product->tds . ' %';
										} elseif ($product->type == 1) {
											$type = 'Alcohol';
											$exc = $product->exc_duty . ' %';
											$df = CURRENCY . ' ' . $product->dist_fee;
											$pdf = CURRENCY . ' ' . $product->pri_dist_fee;
											$tds = '_ _';
										}elseif($product->type == 2){
											$type = 'Mask';
											$exc = '_ _';
											$df = '_ _';
											$pdf = '_ _';
											$tds = $product->tds . ' %';
										}elseif($product->type == 3){
											$type = 'Sanitizer';
											$exc = '_ _';
											$df = '_ _';
											$pdf = '_ _';
											$tds = $product->tds . ' %';
										}
								?>
										<tr>
											<td>
												<img src="<?= GET_UPLOADS . 'products/' . $product->f_img ?>" alt="">&nbsp;&nbsp;&nbsp;
												<?= $product->name ?>
											</td>
											<td><?= $type ?></td>
											<td><?= $product->depot_name ?></td>
											<td><?= $product->size ?></td>
											<td><?= CURRENCY . ' ' . $product->price ?></td>
											<td><?= CURRENCY . ' ' . $product->disc ?></td>
											<td><?= $exc ?></td>
											<td><?= $df ?></td>
											<td><?= $pdf ?></td>
											<td><?= $tds ?></td>
											<?php
											if (admin_type() == SUPER) {
											?>
												<td>
													<a href="<?= ADMIN_URL ?>product/edit/<?= $product->id ?>" class="btn btn-warning">Edit</a>
													<a href="<?= ADMIN_URL ?>product/delete/<?= $product->id ?>" class="btn btn-danger">Delete</a>
												</td>
											<?php
											}
											?>
										</tr>
								<?php
									}
								} else {
									echo '<tr><td align="center" colspan="9">No Dpots Found</td></tr>';
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