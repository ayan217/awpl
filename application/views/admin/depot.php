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
							<h4 class="card-title">Manage Depots</h4>
						</div>
						<?php
						if (admin_type() == SUPER) {
						?>
							<div>
								<a href="<?= ADMIN_URL . 'Depot/add_depot' ?>" class="btn btn-primary">Add New Depot</a>
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
									<th>Address</th>
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
								if (!empty($depots)) {
									foreach ($depots as $depot) {
								?>
										<tr>
											<td><?= $depot->name ?></td>
											<td><?= $depot->address ?></td>
											<?php
											if (admin_type() == SUPER) {
											?>
												<td>
													<a href="<?= ADMIN_URL ?>depot/edit/<?= $depot->id ?>" class="btn btn-warning">Edit</a>
													<a href="<?= ADMIN_URL ?>depot/delete/<?= $depot->id ?>" class="btn btn-danger">Delete</a>
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
