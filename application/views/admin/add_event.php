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
					<h4 class="card-title">Add New Event</h4>
					<hr>
					<form class="forms-sample" method="post" action="<?= ADMIN_URL ?><?= !empty($event_data) ? 'events/edit_event/' . $event_data->id : 'Events/add_event' ?>">
						<div>
							<div class="form-group">
								<label for="exampleInputEmail1">Name</label>
								<input required type="text" name="name" placeholder="Name" class="form-control" value="<?= !empty($event_data) ? $event_data->name : '' ?>">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Location</label>
								<textarea required name="location" placeholder="Location" class="form-control"><?= !empty($event_data) ? $event_data->location : '' ?></textarea>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">From-To</label>
								
								 
								  <input type="date"
									class="form-control" name="form_date" id="" aria-describedby="helpId" placeholder="" value='<?= !empty($event_data) ? $event_data->form_date : '' ?>'>
								  
									<input type="date"
									class="form-control" name="to_date" id="" aria-describedby="helpId" placeholder="" value='<?= !empty($event_data) ? $event_data->to_date : '' ?>'>
							</div>
						</div>

						<button type="submit" class="btn btn-success"><?= !empty($event_data) ? 'Update' : 'Add' ?></button>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>

