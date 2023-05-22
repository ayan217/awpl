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
					<h4 class="card-title">Add New User</h4>
					<hr>
					<form class="forms-sample" method="post" action="<?= ADMIN_URL ?><?= !empty($user_data) ? 'Users/edit_user/' . $user_data->id : 'Users/add_user' ?>" id='add_user_form'>
						<div>

							<input required type="hidden" name="<?= !empty($user_data) ? 'updated_at' : 'created_at' ?>" class="form-control" value="<?= date('Y-m-d H:i:s') ?>">
							<div class="form-group">
								<label for="exampleInputEmail1">Name</label>
								<input required type="text" name="full_name" placeholder="Name" class="form-control" value="<?= !empty($user_data) ? $user_data->full_name : '' ?>">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Email</label>
								<input required type="email" name="email" placeholder="Email" class="form-control" value="<?= !empty($user_data) ? $user_data->email : '' ?>">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Phone Number</label>
								<input required type="text" name="phone" placeholder="Phone Number" class="form-control" value="<?= !empty($user_data) ? $user_data->phone : '' ?>">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">User Type</label>
								<select class="form-control" name="type" id="" required onchange="choose_depot();">
									<option disabled selected>Select</option>
									<option <?php
											if (!empty($user_data)) {
												if ($user_data->type == 1) {
													echo 'selected';
												}
											}
											?> value='1'>Depot Admin</option>
									<option <?php
											if (!empty($user_data)) {
												if ($user_data->type == 2) {
													echo 'selected';
												}
											}
											?> value='2'>Management Staff</option>
								</select>
							</div>
							<div class="form-group" id='choose_depot' style='display:none'>
								<label for="exampleInputEmail1">Select Depot</label>
								<select class="form-control" name="dpot_id" id="">
									<option disabled selected>Select</option>
									<?php
									if (!empty($depots)) {
										foreach ($depots as $depot) {
									?>
											<option <?php
											if (!empty($user_data)) {
												if ($user_data->dpot_id == $depot->id) {
													echo 'selected';
												}
											}
											?> value="<?= $depot->id ?>"><?= $depot->name ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
							<h4 class="card-title">Login Details</h4>
							<hr>
							<div class="form-group">
								<label for="exampleInputEmail1">Username</label>
								<input <?= !empty($user_data) ? 'readonly' : '' ?> required type="text" name="username" placeholder="Username" class="form-control" value="<?= !empty($user_data) ? $user_data->username : '' ?>">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Password</label>
								<input <?= !empty($user_data) ? '' : 'required' ?> type="password" name="password" placeholder="Password" class="form-control" value="">
							</div>
						</div>

						<button type="submit" class="btn btn-success"><?= !empty($user_data) ? 'Update' : 'Add' ?></button>

					</form>
					<div class='text-danger' id="error_msg"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		choose_depot();
	});

	function choose_depot() {
		var type = $('[name="type"]').val();
		if (type == 1) {
			$('#choose_depot').show();
		} else {
			$("[name='dpot_id']").prop("selectedIndex", 0);
			$('#choose_depot').hide();
		}
	};

	$('#add_user_form').submit(function(event) {
		event.preventDefault();
		var formData = $(this).serialize();

		// Send AJAX request
		$.ajax({
			type: 'POST',
			url: $(this).attr('action'),
			data: formData,
			dataType: 'json',
			success: function(res) {
				if (res.status == 1) {
					var url = '<?= ADMIN_URL . 'Users' ?>';
					window.location.replace(url);
				} else if (res.status == 0) {
					$('#error_msg').html(res.error);
				}
			},
			error: function(xhr, status, error) {}
		});
	});
</script>
