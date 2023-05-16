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
							<h4 class="card-title">Assigned Meals</h4>
						</div>
						<div>
							<a href="<?= ADMIN_URL . 'UserMeals/add_usermeals' ?>" class="btn btn-primary">Assign Meals</a>
						</div>
					</div>
					<hr>
					<div class="table-responsive">
						<table id="datatable" class="table table-hover">
							<thead>
								<tr>
									<th>User</th>
									<th>Event</th>
									<th>Meal</th>
									<th>Start Date</th>
									<th>End Date</th>
									<th>Serving Days</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
	                            if (!empty($user_meals)) {
	                                foreach ($user_meals as $user_meal) {
	                                    ?>
										<tr>
											<td><?= $user_meal->user_name ?></td>
											<td><?= $user_meal->event_name ?></td>
											<td><?= $user_meal->meal_name ?></td>
											<td><?= date('m-d-Y', strtotime($user_meal->start_date)) ?></td>
											<td><?= date('m-d-Y', strtotime($user_meal->end_date)) ?></td>
											<td><?= $user_meal->days ?></td>
											<td>
												<a href="<?= ADMIN_URL ?>user-meal/delete/<?= $user_meal->id ?>" class="btn btn-danger">Delete</a>
											</td>
										</tr>
								<?php
	                                }
	                            } else {
	                                echo '<tr><td align="center" colspan="9">No Assigned Meals Found</td></tr>';
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
