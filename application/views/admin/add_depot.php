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
					<h4 class="card-title">Add New Depot</h4>
					<hr>
					<form class="forms-sample" method="post" action="<?= ADMIN_URL ?><?= !empty($depot_data) ? 'Depot/edit/' . $depot_data->id : 'Depot/add_depot' ?>">
						<div>
							<div class="form-group">
								<label for="exampleInputEmail1">Name</label>
								<input required type="text" name="name" placeholder="Name" class="form-control" value="<?= !empty($depot_data) ? $depot_data->name : '' ?>">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Address</label>
								<textarea required type="text" name="address" placeholder="Address" class="form-control"><?= !empty($depot_data) ? $depot_data->address : '' ?></textarea>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Phone</label>
								<input type="text" name="phn" placeholder="Phone no" class="form-control" value="<?= !empty($depot_data) ? $depot_data->phn : '' ?>">
							</div>
						</div>
						<button type="submit" class="btn btn-success"><?= !empty($meal_data) ? 'Update' : 'Add' ?></button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

