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
					<h4 class="card-title">Add New Product</h4>
					<hr>
					<div class="mt-5 text-center">
						<img style="border-radius: 50%;" width="150" class="width-class" src="<?= GET_UPLOADS . 'products/' ?><?= !empty($product_data) ? $product_data->f_img : 'product_default.png' ?>" id="profile_picture" alt="">
					</div>
					<div class="text-center">

						<button type="button" id="edit-icon" class="btn btn-primary mt-3 mb-4">Add Featured
							Image</button>
					</div>
					<input type="file" id="file-upload" style="display:none;">
					<form id="product_form" class="forms-sample" method="post" action="<?= ADMIN_URL ?><?= !empty($product_data) ? 'Products/edit/' . $product_data->id : 'Products/add_product' ?>" enctype="multipart/form-data">
						<input type="hidden" name="f_img" required value="<?= !empty($product_data) ? $product_data->f_img : null ?>">
						<div class="form-group">
							<label for="exampleInputEmail1">Depo Name</label>
							<select name="dpot_id" id="" required class="form-control">
								<option value="" selected>Select Depo</option>
								<?php
								if (!empty($depos)) {
									foreach ($depos as $depo) {
								?>
										<option <?= (!empty($product_data) && $product_data->dpot_id == $depo->id) ? 'selected' : '' ?> value="<?= $depo->id ?>"><?= $depo->name ?></option>
								<?php
									}
								}
								?>
							</select>
						</div>
						<div>
							<?php
							if (!empty($product_data)) {
								$s_imgs_strn = $product_data->s_imgs;
								if ($s_imgs_strn !== null && $s_imgs_strn !== '') {
									$s_imgs = explode(',', $s_imgs_strn);
									foreach ($s_imgs as $s_img) {
							?>
										<img src='<?= GET_UPLOADS ?>products/<?= $s_img ?>' height='50px'>
							<?php
									}
								}
							}
							?>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Slider Images</label>
							<input type="file" name="files[]" placeholder="" class="form-control" value="" multiple>
							<?php
							if (!empty($product_data)) {
								$s_imgs_strn = $product_data->s_imgs;
								if ($s_imgs_strn !== null && $s_imgs_strn !== '') {
							?>
									<small class='text-danger'>*Uploading new set of images will automatically overwrite the old slider images.</small></small>
							<?php
								}
							}
							?>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Product Type</label>
							<div>
								<?php
								if (!empty($product_data)) {
								?>
									<label for="type1">Water<input <?= ($product_data->type == 0) ? 'checked' : 'disabled' ?> id="type1" type="radio" name="type" value="0"></label>
									<label for="type3">Mask<input <?= ($product_data->type == 2) ? 'checked' : 'disabled' ?> id="type3" type="radio" name="type" value="2"></label>
									<label for="type4">Sanitizer<input <?= ($product_data->type == 3) ? 'checked' : 'disabled' ?> id="type4" type="radio" name="type" value="3"></label>
									<label for="type2">Alcohol<input <?= ($product_data->type == 1) ? 'checked' : 'disabled' ?> id="type2" type="radio" name="type" value="1"></label>
								<?php
								} else {
								?>
									<label for="type1">Water<input id="type1" type="radio" name="type" value="0"></label>
									<label for="type3">Mask<input id="type3" type="radio" name="type" value="2"></label>
									<label for="type4">Sanitizer<input id="type4" type="radio" name="type" value="3"></label>
									<label for="type2">Alcohol<input id="type2" type="radio" name="type" value="1"></label>
								<?php
								}
								?>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Brand Name</label>
							<input required type="text" name="name" placeholder="" class="form-control" value="<?= !empty($product_data) ? $product_data->name : null ?>">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">PACKING SIZE (IN ML )</label>
							<input required type="text" name="size" placeholder="" class="form-control" value="<?= !empty($product_data) ? $product_data->size : null ?>">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">RATE PER CASE</label>
							<input required type="text" name="price" placeholder="" class="form-control" value="<?= !empty($product_data) ? $product_data->price : null ?>">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">DISCOUNT </label>
							<input required type="text" name="disc" placeholder="" class="form-control" value="<?= !empty($product_data) ? $product_data->disc : null ?>">
						</div>
						<div id="alcohol_block" style="display: none;">
							<div class="form-group">
								<label for="exampleInputEmail1">Excise Duty Rate %</label>
								<input type="text" name="exc_duty" placeholder="" class="form-control" value="<?= !empty($product_data) ? $product_data->exc_duty : null ?>">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">DIST PERT FEE</label>
								<input type="text" name="dist_fee" placeholder="" class="form-control" value="<?= !empty($product_data) ? $product_data->dist_fee : null ?>">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">PRINCIPAL DIST FEE</label>
								<input type="text" name="pri_dist_fee" placeholder="" class="form-control" value="<?= !empty($product_data) ? $product_data->pri_dist_fee : null ?>">
							</div>
						</div>
						<div id="normal_block" style="display: none;">
							<div class="form-group">
								<label for="exampleInputEmail1">TDS %</label>
								<input type="text" name="tds" placeholder="" class="form-control" value="<?= !empty($product_data) ? $product_data->tds : null ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">IN STOCK</label>
							<input <?= (!empty($product_data) && $product_data->in_stock == 0) ? 'checked' : '' ?> type="checkbox" name="in_stock" class="" value="0">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Product Description</label>
							<input type="hidden" name="des" id="quill1">
							<div id="editor1"></div>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Product About</label>
							<div id="editor2"></div>
							<input type="hidden" name="about" id="quill2">
						</div>

						<button type="submit" class="btn btn-success"><?= !empty($product_data) ? 'Update' : 'Add' ?></button>
					</form>
					<div id="err_div" class="text-danger"></div>
				</div>
			</div>
		</div>
	</div>
</div>


<script>
	var quill;
	var quill2;
	$(document).ready(function() {
		quill = new Quill('#editor1', {
			theme: 'snow'
		});
		quill2 = new Quill('#editor2', {
			theme: 'snow'
		});
	});
	<?php
	if (!empty($product_data)) {
	?>

		$(document).ready(function() {

			quill.root.innerHTML = '<?= $product_data->des ?>';
			quill2.root.innerHTML = '<?= $product_data->about ?>';
		});

	<?php
	}
	?>

	function updateHiddenInput() {
		var editorValue1 = quill.root.innerHTML;
		document.getElementById('quill1').value = editorValue1;
		var editorValue2 = quill2.root.innerHTML;
		document.getElementById('quill2').value = editorValue2;
	}

	$(document).ready(function() {
		pd_type();
	});
	$('input[name="type"]').click(function(e) {
		pd_type();
	});

	function pd_type() {
		var val = $('input[name="type"]:checked').val();
		if (val) {
			if (val == 1) {
				$('#normal_block').hide();
				$('#alcohol_block').show();
			} else {
				$('#normal_block').show();
				$('#alcohol_block').hide();
			}
		}
	}
	$('#product_form').submit(function(e) {
		e.preventDefault();
		updateHiddenInput();
		var url = $(this).attr('action');
		var formdata = new FormData(this);

		$.ajax({
			type: 'POST',
			url: url,
			data: formdata,
			processData: false, // Prevent jQuery from automatically transforming the data into a query string
			contentType: false, // Let the browser set the Content-Type header
			dataType: 'json',
			success: function(res) {
				// Handle the response here
				if (res.status == 1) {
					var success_url = '<?= ADMIN_URL . 'Products' ?>';
					window.location.replace(success_url);
				} else if (res.status == 0) {
					$('#err_div').html(res.err);
				}
			}
		});
	});
</script>


<!-- feature image of the product cutting functions -->
<!-- Modal -->
<div class="modal fade" id="crop-modal" tabindex="-1" role="dialog" aria-labelledby="jobinvoiceLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<form id="crop_image_form" method="post" action="<?= base_url('admin/Products/image_upload') ?>">
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
					var img_src = '<?= GET_UPLOADS . 'products/' ?>' + image_name;
					$('#profile_picture').attr('src', img_src);
					$('input[name="f_img"]').val(image_name);
					$('#crop-modal').modal('hide');
				}
			},
			error: function(xhr, status, error) {
				// Handle error
			}
		});
	});
</script>
<script>
	$(document).ready(function() {
		$('#edit-icon').on('click', function() {
			$('#file-upload').click();
		});

		$('#file-upload').on('change', function() {
			var file_data = $('#file-upload').prop('files')[0];
			var form_data = new FormData();
			var img_height = 400;
			var img_width = 400;
			form_data.append('image', file_data);
			var url = '<?= base_url('admin/Products/image_upload/') ?>' + img_height + '/' + img_width;
			$.ajax({
				url: url,
				cache: false,
				contentType: false,
				processData: false,
				data: form_data,
				type: 'post',
				dataType: 'json',
				success: function(res) {
					console.log(res);
					if (res.status == 1) {
						var path = '<?= GET_UPLOADS . 'products/' ?>' + res.image_name;
						$('#crop-modal').modal('show');
						$('#resized_image').attr('src', path);
						$('#fv1').val(res.resizedimg);
						$('#fv2').val(res.maxWidth);
						$('#fv3').val(res.maxHeight);
						$('#fv4').val(res.dir_path);
						$('#fv5').val(res.thumbFileName);
						$('#fv6').val(res.ext);
						$('#crop_wrapper').css('width', res.resize_width);
						$('#crop_wrapper').css('height', res.resize_height);
						$('#crop_wrapper img').css('width', res.resize_width);
						$('#crop_wrapper img').css('height', res.resize_height);
						$('#crop_div').css('width', res.selector_width);
						$('#crop_div').css('height', res.selector_height);

					}
				}
			});
		});
	});
</script>
<!-- feature image of the product cutting functions -->
