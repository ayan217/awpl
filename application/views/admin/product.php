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
									<th>Size</th>
									<th>Rate Per Case</th>
									<th>Discount</th>
									<th>Net</th>
									<th>Excise Duty Rate</th>
									<th>Excise Duty Per C/S</th>
									<th>Dist Pert Fee</th>
									<th>Principal Dist Fee</th>
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

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>