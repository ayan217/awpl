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
					<form class="forms-sample" method="post" action="<?= ADMIN_URL ?><?= !empty($user_data) ? 'Users/edit_user/' . $user_data->id : 'Users/add_user' ?>">
						<div>

							<input required type="hidden" name="<?= !empty($user_data) ? 'updated_at' : 'created_at' ?>" class="form-control" value="<?= date('Y-m-d H:i:s') ?>">
							<div class="form-group">
								<label for="exampleInputEmail1">Name</label>
								<input required type="text" name="name" placeholder="Name" class="form-control" value="<?= !empty($user_data) ? $user_data->name : '' ?>">
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
								<select class="form-control" name="" id="" required>
									<option disabled selected>Select</option>
									<option value='1'>Depot Admin</option>
									<option value='2'>Management Staff</option>
								</select>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Select Depot</label>
								<select class="form-control" name="" id="" required>
									<option disabled selected>Select</option>
									<?php
									if (!empty($depots)) {
										foreach ($depots as $depot) {
									?>
											<option value="<?= $depot->id ?>"><?= $depot->name ?></option>
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
								<input required type="text" name="name" placeholder="Name" class="form-control" value="<?= !empty($user_data) ? $user_data->name : '' ?>">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Password</label>
								<input required type="password" name="email" placeholder="Email" class="form-control" value="<?= !empty($user_data) ? $user_data->email : '' ?>">
							</div>
						</div>

						<button type="submit" class="btn btn-success"><?= !empty($user_data) ? 'Update' : 'Add' ?></button>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="crop-modal" tabindex="-1" role="dialog" aria-labelledby="jobinvoiceLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<form id="crop_image_form" method="post" action="<?= base_url('admin/Users/image_upload') ?>">
				<script type="text/javascript">
					$(function() {
						$("#crop_div").draggable({
							containment: "parent"
						});
					});

					function crop() {
						var posi = document.getElementById('crop_div');
						document.getElementById("top").value = posi.offsetTop;
						document.getElementById("left").value = posi.offsetLeft;
						document.getElementById("right").value = posi.offsetWidth;
						document.getElementById("bottom").value = posi.offsetHeight;
						return true;
					}
				</script>

				<style>
					#crop_wrapper {
						position: relative;
						margin: 50px auto auto auto;
						overflow: hidden;
					}

					#crop_div {
						border: 1px solid red;
						position: absolute;
						top: 0px;
						box-sizing: border-box;
						box-shadow: 0 0 0 99999px rgba(255, 255, 255, 0.5);
					}
				</style>
				<div class="modal-body">
					<div id="crop_wrapper">
						<img src="" id="resized_image">
						<div id="crop_div">
						</div>

						<input type="hidden" value="" id="top" name="top">
						<input type="hidden" value="" id="left" name="left">
						<input type="hidden" value="" id="right" name="right">
						<input type="hidden" value="" id="bottom" name="bottom">
						<input type="hidden" id='fv1' name="image">
						<input type="hidden" id='fv2' name="maxWidth">
						<input type="hidden" id='fv3' name="maxHeight">
						<input type="hidden" id='fv4' name="dirPath">
						<input type="hidden" id='fv5' name="thumbFileName">
						<input type="hidden" id='fv6' name="ext">
						<input type="hidden" name="crop_image">

					</div>
				</div>
				<div class="modal-footer">
					<button type='submit' class="btn btn-primary">Crop & Save</a>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	$('#crop_image_form').submit(function(event) {
		// Prevent default form submission
		event.preventDefault();
		crop();
		// Serialize form data
		var formData = $(this).serialize();

		// Send AJAX request
		$.ajax({
			type: 'POST',
			url: $(this).attr('action'),
			data: formData,
			dataType: 'json',
			success: function(res) {
				// Handle successful response
				if (res.status == 1) {
					var image_name = res.img_name;
					var img_src = '<?= GET_PROFILE ?>' + image_name;
					$('#profile_picture').attr('src', img_src);
					$('input[name="photo"]').val(image_name);
					$('#crop-modal').modal('hide');
				}
			},
			error: function(xhr, status, error) {
				// Handle error
			}
		});
	});
</script>
