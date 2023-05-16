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
							<h4 class="card-title">Meals Report</h4>
						</div>
					</div>
					<hr>
					<div class="table-responsive">
						<table id="datatable" class="table table-hover">
							<thead>
								<tr>
									<th>Date</th>
									<th>Event</th>
									<th>Person</th>
									<th>Meals Taken</th>
									<th>Meals Value</th>
									<th>Meals Taken Amount</th>
									<th>Paid Cash</th>
									<th>Balance</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if (!empty($completed_meals)) {
									foreach ($completed_meals as $completed_meal) {
										$date_obj = date_create($completed_meal->date);
										$date =  date_format($date_obj, 'l jS F, Y');
								?>
										<tr>
											<td><?= $date ?></td>
											<td><?= $completed_meal->event_name ?></td>
											<td><?= $completed_meal->user_name ?></td>
											<td><?= $completed_meal->meal_name ?></td>
											<td>&euro;<?= number_format((float)$completed_meal->value, 2, '.', '') ?></td>
											<td>&euro;<?= number_format((float)$completed_meal->taken, 2, '.', '') ?></td>
											<td>&euro;<?= number_format((float)$completed_meal->cash, 2, '.', '') ?></td>
											<td>&euro;<?= ($completed_meal->cash == 0) ? number_format((float)($completed_meal->value - $completed_meal->taken), 2, '.', '')  : 0.00 ?></td>
										</tr>
								<?php
									}
								} else {
									echo '<tr><td align="center" colspan="9">No Completed Meals Found</td></tr>';
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
