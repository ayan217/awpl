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
					<h4 class="card-title">Edit About</h4>
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
										if (admin_type() == SUPER) {
								?>
											<option <?= (!empty($product_data) && $product_data->dpot_id == $depo->id) ? 'selected' : '' ?> value="<?= $depo->id ?>"><?= $depo->name ?></option>
											<?php
										} else {
											if ($admin_data->dpot_id == $depo->id) {
											?>
												<option selected value="<?= $depo->id ?>"><?= $depo->name ?></option>
								<?php
											}
										}
									}
								}

								?>
							</select>
						</div>
						<div>
							<?php
							if (!empty($product_data)) {
								$s_imgs_strn = $product_data->s_imgs_thumb;
								if ($s_imgs_strn !== null && $s_imgs_strn !== '') {
									$s_imgs = explode(',', $s_imgs_strn);
									foreach ($s_imgs as $s_img) {
							?>
										<img src='<?= GET_UPLOADS ?>products/thumb/<?= $s_img ?>'>
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
</script>
