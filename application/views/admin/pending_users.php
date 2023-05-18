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
							<h4 class="card-title">Pending Users</h4>
						</div>
					</div>
					<hr>
					<div class="table-responsive">
						<table id="datatable" class="table table-hover">
							<thead>
								<tr>
									<th>Contact Name</th>
									<th>Distributor Type</th>
									<th>Phone</th>
									<th>Email</th>
									<th>License</th>
									<th>Address</th>
									<th>Order Quantity<br>(Minimum)</th>
									<th>Vehicle</th>
									<th>Contract Agreement</th>
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
								if (!empty($users)) {
									foreach ($users as $user) {
										if ($user->type == 4) {
											$type = 'Civil Distributer';
										} elseif ($user->type == 5) {
											$type = 'Defence Distributor';
										}
								?>
										<tr>
											<td><?= $user->full_name ?></td>
											<td><?= $type ?></td>
											<td><?= $user->phone ?></td>
											<td><?= $user->email ?></td>
											<td>
												<p><b>Name: </b><?= $user->l_name ?></p>
												<p><b>Number: </b><?= $user->l_number ?></p>
												<p><b>Date: </b><?= date('d-m-Y', strtotime($user->l_vdate)) ?></p>
											</td>
											<td class="text-wrap" style="min-width:150px">
												<?= $user->address . ',' . $user->dist . ', ' . $user->city ?>
											</td>
											<td><?= $user->moq ?></td>
											<td>
												<p><b>Type: </b><?= $user->v_type ?></p>
												<p><b>Number: </b><?= $user->v_number ?></p>
											</td>
											<td>
												<a href='<?= GET_UPLOADS ?>agreements/<?= $user->agreement_file ?>' target="_blank"><i class="fa-solid fa-eye"></i></a>
											</td>
											<?php
											if (admin_type() == SUPER) {
											?>
												<td>
													<a href="javascript:void(0)" onclick="approve_user(<?= $user->id ?>)" class="btn btn-success">Approve</a>
												</td>
											<?php
											}
											?>
										</tr>
								<?php
									}
								} else {
									echo '<tr><td align="center" colspan="9">No Users Found</td></tr>';
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
<!-- Modal -->
<div class="modal fade" id="approve_modal" tabindex="-1" role="dialog" aria-labelledby="jobinvoiceLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<form id="ap_user" method="post">
				<div class="modal-body">
				<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">Security Deposit Amount (<?=CURRENCY?>)</label>
						<input required type="Text" class="form-control inpt-fild" id="exampleInputEmail1" aria-describedby="emailHelp" name='sdepo'>
					</div>
					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">Username</label>
						<input required type="Text" class="form-control inpt-fild" id="exampleInputEmail1" aria-describedby="emailHelp" name='username'>
					</div>
				</div>
				<div class='text-danger' id="error_msg"></div>
				<div class="modal-footer">
					<button type='submit' class="btn btn-primary">Save</a>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	function approve_user(id) {
		var action_url = '<?= ADMIN_URL . 'Users/approve_user/' ?>' + id;
		$('#ap_user').attr('action', action_url);
		$('#approve_modal').modal('show');
	}
	$('#ap_user').submit(function(e) {
		e.preventDefault();
		var formdata = $(this).serialize();
		var url = $(this).attr('action');
		$.ajax({
			type: "POST",
			url: url,
			data: formdata,
			dataType: "json",
			success: function(res) {
				if (res.status == 1) {
					window.location.reload();
				} else if (res.status == 0) {
					$('#error_msg').html(res.error);
				}
			},
			error: function(xhr, status, error) {}
		});
	});
</script>
