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
							<h4 class="card-title">Events</h4>
						</div>
						<div>
							<a href="<?= ADMIN_URL . 'Events/add_event' ?>" class="btn btn-primary">Add New Event</a>
						</div>
					</div>
					<hr>
					<div class="table-responsive">
						<table id="datatable" class="table table-hover">
							<thead>
								<tr>
									<th>Name</th>
									<th>From</th>
									<th>To</th>
									<th>Location</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if (!empty($events)) {
									foreach ($events as $event) {
								?>
										<tr>
											<td><?= $event->name ?></td>
											<td><?= $event->form_date ?></td>
											<td><?= $event->to_date ?></td>
											<td><?= $event->location ?></td>
											<td>
												<a href="<?= ADMIN_URL ?>event/edit/<?= $event->id ?>" class="btn btn-warning">Edit</a>
												<a href="<?= ADMIN_URL ?>event/delete/<?= $event->id ?>" class="btn btn-danger">Delete</a>
											</td>
										</tr>
								<?php
									}
								} else {
									echo '<tr><td align="center" colspan="9">No Events Found</td></tr>';
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
