<div class="log-in-section section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="form-all-cstm">
					<div class="all-use-txt text-center txt-cr-chng">
						<h2>Sign Up</h2>
						<p>Alredy have an account? <a href="<?= BASE_URL ?>login">Login</a></p>
					</div>
					<div class="form-devider" id='choose_type'>
						<div class="select-box-top">
							<label class="img-btn">
								<input type="radio" name="r_type" value='0'>
								<div class="img-chk-box">
									<img src="<?= ASSET_URL ?>frontend//images/user.png" alt="Sri Lanka Flag">
									<p>I am a Customer</p>
								</div>
							</label>

							<label class="img-btn">
								<input type="radio" name="r_type" value='1'>
								<div class="img-chk-box">
									<img src="<?= ASSET_URL ?>frontend//images/distribute.png" alt="India Flag">
									<p>I am a Distributor</p>
								</div>
							</label>
						</div>
						<button class="btn btn-same-all login-btn" type='button' id='choose_type_btn'>Next</button>
					</div>

					<div class="form-devider" id='gen_form' style="display: none;">
						<form class="cstm-log-from signupform" method="post" action='<?= base_url('Home/signup') ?>' id='' enctype="multipart/form-data">
							<input type="hidden" name='created_at' value='<?= date('Y-m-d H:i:s') ?>'>
							<input type="hidden" name='type' value='3'>
							<div class="sign-up-nw">
								<div class="mb-3">
									<label for="ful-name" class="form-label">Full Name*</label>
									<input type="Text" class="form-control inpt-fild" id="ful-name" name='full_name'>
								</div>

								<div class="mb-3">
									<label for="usr-name" class="form-label">Username*</label>
									<input type="Text" class="form-control inpt-fild" id="usr-name" name='username'>
								</div>

								<div class="mb-3">
									<label for="email-s" class="form-label">Email Address*</label>
									<input type="email" class="form-control inpt-fild" id="email-s" name='email'>
								</div>

								<div class="mb-3">
									<label for="passwr-d" class="form-label">Password*</label>
									<input type="password" class="form-control inpt-fild" id="passwr-d" name='password'>
								</div>
								<button class="btn btn-same-all sbmit-btn login-btn sbmit-btn" type='submit'>Sign Up</button>
							</div>
						</form>
					</div>

					<div class="form-devider" id='dist_form' style="display: none;">
						<form class="cstm-log-from signupform" method="post" action='<?= base_url('Home/signup') ?>' id='' enctype="multipart/form-data">
							<input type="hidden" name='created_at' value='<?= date('Y-m-d H:i:s') ?>'>
							<div class="mb-3">
								<label for="contact-n" class="form-label">Contact Name*</label>
								<input type="Text" class="form-control inpt-fild" id="contact-n" aria-describedby="emailHelp" name='full_name'>
							</div>
							<div class="mb-3">
								<label class="form-label">Applying as Distributor Type *</label>
								<select class="form-select inpt-fild" aria-label="Default select example" name='type'>
									<option selected value="">Select</option>
									<option value="4">Civil Distributer</option>
									<option value="5">Defence Distributor</option>
								</select>
							</div>
							<div class="row">
								<div class="col-6">
									<div class="mb-3">
										<label for="phone-n" class="form-label">Phone Number *</label>
										<input type="number" class="form-control inpt-fild" id="phone-n" name='phone'>
									</div>
								</div>

								<div class="col-6">
									<div class="mb-3">
										<label for="emil" class="form-label">Email id *</label>
										<input type="email" class="form-control inpt-fild" id="emil" name='email'>
									</div>
								</div>

								<div class="col-6">
									<div class="mb-3">
										<label for="license-n" class="form-label">License Name *</label>
										<input type="text" class="form-control inpt-fild" id="license-n" name='l_name'>
									</div>
								</div>

								<div class="col-6">
									<div class="mb-3">
										<label for="license-num" class="form-label">License Number *</label>
										<input type="number" class="form-control inpt-fild" id="license-num" name='l_number'>
									</div>
								</div>

								<div class="col-6">
									<div class="mb-3">
										<label for="license-d" class="form-label">License Validity Date *</label>
										<input type="date" class="form-control inpt-fild" id="license-d" name='l_vdate'>
									</div>
								</div>

								<div class="col-6">
									<div class="mb-3">
										<label for="district" class="form-label">District *</label>
										<input type="text" class="form-control inpt-fild" id="district" name='dist'>
									</div>
								</div>

								<div class="col-6">
									<div class="mb-3">
										<label for="city" class="form-label">City*</label>
										<input type="text" class="form-control inpt-fild" id="city" name='city'>
									</div>
								</div>

								<div class="col-6">
									<div class="mb-3">
									<label for="city" class="form-label">Depot*</label>	
									<select name="dpot_id" class="form-select inpt-fild" aria-label="Default select example">
									<option value="" selected>Select Depo</option>
									<?php
									if (!empty($depos)) {
										foreach ($depos as $depo) {
									?>
											<option value="<?= $depo->id ?>"><?= $depo->name ?></option>
									<?php
										}
									}
									?>
                                        </select>
									</div>
								</div>
							</div>

							<div class="mb-3">
								<label for="location" class="form-label">Address *</label>
								<input type="text" class="form-control inpt-fild" id="location" name='address'>
							</div>

							<div class="row">
								<div class="col-6">
									<div class="mb-3">
										<label class="form-label">Minimum Order Quantity *</label>
										<input type="number" class="form-control inpt-fild" id="location" name='moq'>
									</div>
								</div>

								<div class="col-6">
									<div class="mb-3">
										<label class="form-label">Vehicle Type *</label>
										<input type="text" class="form-control inpt-fild" id="location" name='v_type'>
									</div>
								</div>

								<div class="col-6">
									<div class="mb-3">
										<label for="vehicle-n" class="form-label">Vehicle No. *</label>
										<input type="text" class="form-control inpt-fild" id="vehicle-n" name='v_number'>
									</div>
								</div>

								<div class="col-6">
									<!-- input file upload js cstm -->
									<div class="custom-file mb-3">
										<label class="" for="customFile">Contract Agreement *</label>
										<div class="file-uplod">
											<span id="file-nm">No file choosen</span>
											<div class="uplod-icon"><i class="fa-solid fa-upload"></i>upload</div>
											<input type="file" class="custom-file-input inpt-fild" id="customFile" name='file' accept='.pdf'>
										</div>
										<span class="pdf-fil">(.pdf file only)</span>
									</div>
									<!-- input file upload js cstm -->
								</div>
							</div>
							<button class="btn btn-same-all sbmit-btn login-btn sbmit-btn" type='submit'>Sign Up</button>
						</form>
					</div>
					<div class='text-danger' id="error_msg"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$('#choose_type_btn').click(function() {
		var val = $('input[name="r_type"]:checked').val();
		if (val) {
			$('#choose_type').hide();
			if (val == 0) {
				$('#gen_form').show();
				$('#dist_form').hide();
			} else if (val == 1) {
				$('#gen_form').hide();
				$('#dist_form').show();
			}
		}
	});
	$('.signupform').submit(function(e) {
		e.preventDefault();
		var formData = new FormData($(this)[0]);
		$.ajax({
			type: "post",
			url: $(this).attr('action'),
			data: formData,
			dataType: 'json',
			processData: false,
			contentType: false,
			success: function(res) {
				if (res.status == 1) {
					var url = '<?= BASE_URL . 'login' ?>';
					window.location.replace(url);
				} else if (res.status == 0) {
					$('#error_msg').html(res.error);
				}
			},
			error: function(xhr, status, error) {}
		});
	});

	//input file name upload js cstm
	var fileSelector = document.getElementById('customFile');
	fileSelector.addEventListener('change', (event) => {
		var imageFiles = event.target.files;
		if (imageFiles.length > 0) {
			for (const imageFile of imageFiles) {
				const reader = new FileReader();
				reader.readAsDataURL(imageFile);
				reader.addEventListener('load', () => {
					var arr = new Array();
					arr['type'] = imageFile.name;
					$('#file-nm').text(arr['type']);
				});
			}
		}
	});
</script>
<!--log In section-->