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
					<h4 class="card-title">Assign New Meals</h4>
					<hr>
					<form class="forms-sample" method="post" action="<?= ADMIN_URL ?>UserMeals/add_usermeals">
						<div>
							<select name="user_id" id="" required class='form-control'>
								<option selected disabled value="">Select User</option>
								<?php
	                            if(!empty($all_users)) {
	                                foreach($all_users as $user) {
	                                    ?>
								<option value='<?=$user->id?>'><?=$user->name?></option></option>
										<?php
	                                }
	                            }
	?> 
							</select>
							<select name="event_id" id="" required class='form-control' onchange="limit_date($(this).val())">
								<option selected disabled value="">Select Event</option>
								<?php
	if(!empty($events)) {
	    foreach($events as $event) {
	        ?>
								<option value='<?=$event->id?>'><?=$event->name?></option></option>
										<?php
	    }
	}
	?> 
							</select>
							<select name="meal_ids[]" id="" required class='form-control multi_select' multiple>
								
								<?php
	if(!empty($meals)) {
	    foreach($meals as $meal) {
	        ?>
								<option value='<?=$meal->id?>'><?=$meal->name?></option></option>
										<?php
	    }
	}
	?> 
							</select>
							<div class="form-group">
							  <label for="">Start Date</label>
							  <input type="date"
								class="form-control" disabled name="start_date" id="" aria-describedby="helpId" placeholder="">
						
							</div>
							<div class="form-group">
							  <label for="">End Date</label>
							  <input type="date"
								class="form-control" disabled name="end_date" id="" aria-describedby="helpId" placeholder="">
						
							</div>
							<select name="days[]" id="" required class='form-control multi_select' multiple>
								
								<?php
	                           
$date = new DateTime();
	
	if ($date->format('D') != 'Sun') {
	    $date->modify('next Sunday');
	}
	
	$dates = array();
	for ($i = 0; $i < 7; $i++) {
	    $dates[] = $date->format('l');
	    $date->add(new DateInterval('P1D'));
	}
	if(!empty($dates)) {
	    foreach($dates as $date) {
	        ?>
								<option value='<?=$date?>'><?=$date?></option></option>
										<?php
	    }
	}
	?> 
							</select>
						</div>
						<button type="submit" class="btn btn-success">Add</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		$('.multi_select').select2();
	});
	function limit_date(event_id){
		url = '<?=ADMIN_URL.'UserMeals/limit_date/'?>'+event_id;
		$.ajax({
			url: url,
			dataType: "json",
			success: function (res) {
				if(res.status==1){
					$('input[type="date"]').attr('disabled', false);
					$('input[type="date"]').prop('min', res.start_date);
					$('input[type="date"]').prop('max', res.end_date);
				}
			}
		});
		
	}
</script>
