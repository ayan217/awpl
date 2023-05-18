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
							<h4 class="card-title">Approved Users</h4>
						</div>
					</div>
					<hr>
					<div class="table-responsive">
						<table id="datatable" class="table table-hover">
							<thead>
								<tr>
									<th>Contact Name</th>
									<th>Username</th>
									<th>Distributor Type</th>
									<th>Phone</th>
									<th>Email</th>
									<th>License</th>
									<th>Address</th>
									<th>Order Quantity<br>(Minimum)</th>
									<th>Vehicle</th>
									<th>Contract Agreement</th>
									<th>Security Deposit</th>
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
										} elseif ($user->type == 3) {
											$type = 'General visitors';
										}
								?>
										<tr>
											<td><?= $user->full_name ?></td>
											<td><?= $user->username ?></td>
											<td><?= $type ?></td>
											<td><?= $user->phone ? $user->phone : '_ _' ?></td>
											<td><?= $user->email ?></td>
											<td>
												<?php
												if ($user->type !== '3') {
												?>
													<p><b>Name: </b><?= $user->l_name ?></p>
													<p><b>Number: </b><?= $user->l_number ?></p>
													<p><b>Date: </b><?= date('d-m-Y', strtotime($user->l_vdate)) ?></p>
												<?php
												} else {
													echo '_ _';
												}
												?>
											</td>
											<td class="text-wrap" style="min-width:150px">
												<?php
												if ($user->type !== '3') {
												?>
													<?= $user->address . ',' . $user->dist . ', ' . $user->city ?>
												<?php
												} else {
													echo '_ _';
												}
												?>
											</td>
											<td><?= $user->moq ? $user->moq : '_ _' ?></td>
											<td>
												<?php
												if ($user->type !== '3') {
												?>
													<p><b>Type: </b><?= $user->v_type ?></p>
													<p><b>Number: </b><?= $user->v_number ?></p>
												<?php
												} else {
													echo '_ _';
												}
												?>
											</td>
											<td>
												<?php
												if ($user->type !== '3') {
												?>
													<a href='<?= GET_UPLOADS ?>agreements/<?= $user->agreement_file ?>' target="_blank"><i class="fa-solid fa-eye"></i></a>
												<?php
												} else {
													echo '_ _';
												}
												?>
											</td>
											<td>
												<?php
												if ($user->type !== '3') {
												?>
													<?= CURRENCY . $user->sdepo ?>&nbsp;&nbsp;<?= $user->sdepo_status == 1 ? '<i class="fa-solid fa-check text-success"></i>' : '<i class="fa-solid fa-x text-danger"></i>' ?>
												<?php
												} else {
													echo '_ _';
												}
												?>
											</td>
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
