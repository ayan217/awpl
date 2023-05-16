<style>
	@media only screen and (max-width: 767px) {
		.logo-top {
			width: 150px;
			margin: 20px auto 10px;
			z-index: 10;
			position: relative;
		}

		.user-img {
			width: 200px;
			margin: auto auto 20px;
			height: 200px;
		}

		.user-img img {
			border-radius: 100%;
		}

		.box-data {
			display: flex;
			align-items: center;
		}

		.box-data p {
			font-weight: 600;
			font-size: 16px;
			margin-right: 19px;
		}

		.main-box-all {
			margin-left: 25px;
			margin-right: 25px;
		}

		.modal-box {
			border: 1px solid #027649;
			padding-bottom: 20px;
			margin-top: 20px;
			border-radius: 10px;
		}

		.box-data input {
			width: 25%;
			padding: 3px;
		}

		.box-data:not(:last-child) {
			margin-bottom: 10px;
		}

		.box-data button:not(:last-child) {
			margin-right: 10px;
		}

		.mb-10 {
			margin-bottom: 10px;
		}
	}
</style>

<div class='container'>
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
	<?php
	if (!empty($meal)) {
	?>
		<div class="modal-box">
			<div class="logo-top">
				<img src="<?= ASSET_URL ?>images/logo.jpg" alt="logo" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
			</div>
			<div class="user-img">
				<img src="<?= GET_PROFILE . $user->photo ?>" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
			</div>
			<form class="main-box-all" action="<?= base_url('Home/complete_meal/' . $meal->id) ?>" method="post">
				<div class="box-data">
					<p>Name:- </p><span><?= $user->name ?></span>
				</div>
				<div class="box-data">
					<p>Event:- </p><span><?= $meal->meal_name ?></span>
				</div>
				<div class="box-data">
					<p>Meal:- </p><span><?= $meal->event_name ?></span>
				</div>
				<div class="box-data">
					<p>Amount:- </p><span>&euro;<?= $meal->value ?></span>
				</div>
				<div class="box-data" id='amount_div'>
					<p>Spent:- </p><input type="text" class="form-control" name="taken" id="spent_amount" aria-describedby="helpId" placeholder="&euro;">
				</div>
				<div id='amount_div2' style="display:none"></div>
				<div class="box-data">
					<button id="submit" type="button" class="btn btn-primary">Submit</button>
					<a name="" id="" class="btn btn-primary" href="https://democenter.net/pm/millstreet/" role="button">Back To Scanner</a>
				</div>
			</form>
		</div>

	<?php
	} else {
		echo 'NO MEAL FOUND.';
	}
	?>

</div>

<script>
	$('#submit').click(function(e) {
		e.preventDefault();
		var spent_amount = $('#spent_amount').val();
		var assigned_amount = <?= $meal->value ?>;
		if (spent_amount !== '') {
			if (parseFloat(spent_amount) > parseFloat(assigned_amount)) {
				var extra_amount = parseFloat(spent_amount) - parseFloat(assigned_amount);
				var output = '<input type="text" class="form-control mb-10" name="cash" aria-describedby="helpId" placeholder="&euro;" value="' + extra_amount.toFixed(2) + '" readonly><button type="submit" class="btn btn-success mb-10">Paid</button>';
			} else {
				var output = '<button type="submit" class="btn btn-success mb-10">Okay</button>';
			}
			$('#amount_div').hide();
			$('#amount_div2').html(output);
			$('#amount_div2').show();
		}
	});
</script>
