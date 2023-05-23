<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		admin_login_check();
		$this->load->model('DpotModel');
		$this->load->model('ProductModel');
	}
	public function index()
	{
		$data['folder'] = 'admin';
		$data['template'] = 'product';
		$data['title'] = 'Manage Product';
		$data['admin_data'] = logged_in_admin_row();
		if (admin_type() == SUPER || admin_type() == MANAGE) {
			$data['products'] = $this->ProductModel->getproducts();
		} elseif (admin_type() == DEPOT) {
			$data['products'] = $this->ProductModel->getproductbydpot($data['admin_data']->dpot_id, null, null, null);
		}
		$this->load->view('layout', $data);
	}
	public function add_product($id = null)
	{
		if ($this->input->post()) {
			$this->form_validation->set_rules('name', 'Brand Name', 'required');
			$this->form_validation->set_rules('dpot_id', 'Depo Name', 'required');
			$this->form_validation->set_rules('type', 'Product Type', 'required');
			$this->form_validation->set_rules('f_img', 'Featured Image', 'required');
			$this->form_validation->set_rules('size', 'Product Size', 'required');
			$this->form_validation->set_rules('price', 'Rate Per Case', 'required|regex_match[/^\d+(\.\d{1,2})?$/]');
			$this->form_validation->set_rules('disc', 'Discount', 'required|regex_match[/^\d+(\.\d{1,2})?$/]');
			if ($_POST['type'] == 1) {
				$this->form_validation->set_rules('exc_duty', 'Excise Duty', 'required|regex_match[/^\d+(\.\d{1,2})?$/]');
				$this->form_validation->set_rules('dist_fee', 'DIST PERT FEE', 'required|regex_match[/^\d+(\.\d{1,2})?$/]');
				$this->form_validation->set_rules('pri_dist_fee', 'PRINCIPAL DIST FEE', 'required|regex_match[/^\d+(\.\d{1,2})?$/]');
			} else {
				$this->form_validation->set_rules('tds', 'TDS %', 'required|regex_match[/^\d+(\.\d{1,2})?$/]');
			}
			if ($this->form_validation->run() == TRUE) {
				$file_name_array = array();
				if (!isset($_POST['in_stock'])) {
					$_POST['in_stock'] = 1;
				} else {
					$_POST['in_stock'] = 0;
				}

				// multiple slider images upload code
				if (!empty($_FILES['files']['name'][0])) {
					// Create a folder to store the images
					$folderPath = UPLOAD_PATH . 'products/';
					$thumbFolderPath = UPLOAD_PATH . 'products/thumb/';
					if (!is_dir($folderPath)) {
						mkdir($folderPath, 0777, true);
					}

					// Handle file uploads
					$files = $_FILES['files'];
					$fileCount = count($files['name']);
					$file_name_array = array(); // Array to store the file names

					for ($i = 0; $i < $fileCount; $i++) {
						// Check if the uploaded file is an image
						if (getimagesize($files['tmp_name'][$i])) {
							$fileExt = pathinfo($files['name'][$i], PATHINFO_EXTENSION);
							$fileName = uniqid() . '.' . $fileExt;
							$filePath = $folderPath . $fileName;

							// Move the uploaded file to the destination folder
							if (move_uploaded_file($files['tmp_name'][$i], $filePath)) {
								$file_name_array_thumb[] = $this->createThumbnail($filePath, $thumbFolderPath, 100, 100);
								$file_name_array[] = $fileName;
							} else {
								// Error in file upload
								$error = 'Error in moving uploaded file.';
								$res = array('status' => 0, 'err' => $error);
								echo json_encode($res);
								return;
							}
						}
					}
				}
				// multiple slider images upload code

				$_POST['s_imgs'] = implode(',', $file_name_array);
				$_POST['s_imgs_thumb'] = implode(',', $file_name_array_thumb);

				$data = $_POST;
				if ($this->ProductModel->add_product($data) !== false) {
					$this->session->set_flashdata('log_suc', 'Product Added');
					$res = array('status' => 1);
				} else {
					$res = array('status' => 0, 'err' => 'Something Went Wrong...!!');
				}
			} else {
				$res = array('status' => 0, 'err' => validation_errors());
			}
			echo json_encode($res);
		} else {
			if ($id == null) {
				$data['title'] = 'Add Product';
				$data['depos'] = $this->DpotModel->getdepots();
			} else {
				$data['title'] = 'Edit Depot';
				$data['depos'] = $this->DpotModel->getdepots();
				$data['product_data'] = $this->ProductModel->getproduct($id);
			}
			$data['folder'] = 'admin';
			$data['admin_data'] = logged_in_admin_row();
			$data['template'] = 'add_product';
			$this->load->view('layout', $data);
		}
	}
	public function createThumbnail($sourcePath, $destinationPath, $thumbnailWidth, $thumbnailHeight)
	{
		// Get the source image type
		$sourceExtension = pathinfo($sourcePath, PATHINFO_EXTENSION);
		$sourceExtension = strtolower($sourceExtension);

		// Load the source image based on its type
		switch ($sourceExtension) {
			case 'jpg':
			case 'jpeg':
				$sourceImage = imagecreatefromjpeg($sourcePath);
				break;
			case 'png':
				$sourceImage = imagecreatefrompng($sourcePath);
				break;
			case 'webp':
				$sourceImage = imagecreatefromwebp($sourcePath);
				break;
			default:
				// Unsupported image type
				return false;
		}

		// Get the source image dimensions
		$sourceWidth = imagesx($sourceImage);
		$sourceHeight = imagesy($sourceImage);

		// Calculate the thumbnail dimensions while maintaining the aspect ratio
		$thumbnailRatio = $thumbnailWidth / $thumbnailHeight;
		$sourceRatio = $sourceWidth / $sourceHeight;

		if ($thumbnailRatio > $sourceRatio) {
			$thumbnailWidth = $thumbnailHeight * $sourceRatio;
		} else {
			$thumbnailHeight = $thumbnailWidth / $sourceRatio;
		}

		// Create a new thumbnail image with the desired dimensions
		$thumbnailImage = imagecreatetruecolor($thumbnailWidth, $thumbnailHeight);

		// Resize and copy the original image to the thumbnail image
		imagecopyresampled($thumbnailImage, $sourceImage, 0, 0, 0, 0, $thumbnailWidth, $thumbnailHeight, $sourceWidth, $sourceHeight);

		// Generate a unique file name for the thumbnail
		$thumbnailName = 'thumb_' . uniqid() . '.' . $sourceExtension;
		$thumbnailPath = $destinationPath . $thumbnailName;

		// Save the thumbnail image based on its type
		switch ($sourceExtension) {
			case 'jpg':
			case 'jpeg':
				imagejpeg($thumbnailImage, $thumbnailPath);
				break;
			case 'png':
				imagepng($thumbnailImage, $thumbnailPath);
				break;
			case 'webp':
				imagewebp($thumbnailImage, $thumbnailPath);
				break;
		}

		// Free up memory
		imagedestroy($sourceImage);
		imagedestroy($thumbnailImage);

		// Return the name of the created thumbnail image
		return $thumbnailName;
	}

	public function edit($id)
	{
		if ($this->input->post()) {
			$product_row = $this->ProductModel->getproduct($id);
			$this->form_validation->set_rules('name', 'Brand Name', 'required');
			$this->form_validation->set_rules('dpot_id', 'Depo Name', 'required');
			$this->form_validation->set_rules('type', 'Product Type', 'required');
			$this->form_validation->set_rules('f_img', 'Featured Image', 'required');
			$this->form_validation->set_rules('size', 'Product Size', 'required');
			$this->form_validation->set_rules('price', 'Rate Per Case', 'required|regex_match[/^\d+(\.\d{1,2})?$/]');
			$this->form_validation->set_rules('disc', 'Discount', 'required|regex_match[/^\d+(\.\d{1,2})?$/]');
			if ($_POST['type'] == 1) {
				$this->form_validation->set_rules('exc_duty', 'Excise Duty', 'required|regex_match[/^\d+(\.\d{1,2})?$/]');
				$this->form_validation->set_rules('dist_fee', 'DIST PERT FEE', 'required|regex_match[/^\d+(\.\d{1,2})?$/]');
				$this->form_validation->set_rules('pri_dist_fee', 'PRINCIPAL DIST FEE', 'required|regex_match[/^\d+(\.\d{1,2})?$/]');
			} else {
				$this->form_validation->set_rules('tds', 'TDS %', 'required|regex_match[/^\d+(\.\d{1,2})?$/]');
			}
			if ($this->form_validation->run() == TRUE) {
				$file_name_array = array();
				if (!isset($_POST['in_stock'])) {
					$_POST['in_stock'] = 1;
				} else {
					$_POST['in_stock'] = 0;
				}

				// multiple slider images upload code
				if (!empty($_FILES['files']['name'][0])) {
					// Create a folder to store the images
					$folderPath = UPLOAD_PATH . 'products/';
					$thumbFolderPath = UPLOAD_PATH . 'products/thumb/';
					if (!is_dir($folderPath)) {
						mkdir($folderPath, 0777, true);
					}

					// Handle file uploads
					$files = $_FILES['files'];
					$fileCount = count($files['name']);
					$file_name_array = array(); // Array to store the file names

					for ($i = 0; $i < $fileCount; $i++) {
						// Check if the uploaded file is an image
						if (getimagesize($files['tmp_name'][$i])) {
							$fileExt = pathinfo($files['name'][$i], PATHINFO_EXTENSION);
							$fileName = uniqid() . '.' . $fileExt;
							$filePath = $folderPath . $fileName;

							// Move the uploaded file to the destination folder
							if (move_uploaded_file($files['tmp_name'][$i], $filePath)) {
								$file_name_array_thumb[] = $this->createThumbnail($filePath, $thumbFolderPath, 100, 100);
								$file_name_array[] = $fileName;
							} else {
								// Error in file upload
								$error = 'Error in moving uploaded file.';
								$res = array('status' => 0, 'err' => $error);
								echo json_encode($res);
								return;
							}
						}
					}
				}
				// multiple slider images upload code

				if (!empty($file_name_array)) {
					$_POST['s_imgs'] = implode(',', $file_name_array);
					$_POST['s_imgs_thumb'] = implode(',', $file_name_array_thumb);
				} else {
					$_POST['s_imgs'] = $product_row->s_imgs;
				}
				$data = $_POST;
				if ($this->ProductModel->update_product($data, $id) !== false) {
					$this->session->set_flashdata('log_suc', 'Product Updated');
					$res = array('status' => 1);
				} else {
					$res = array('status' => 0, 'err' => 'Something Went Wrong...!!');
				}
			} else {
				$res = array('status' => 0, 'err' => validation_errors());
			}
			echo json_encode($res);
		}
	}
	public function image_upload($height = null, $width = null)
	{
		if (isset($_POST['crop_image'])) {
			$data = $_POST;
			$crop_res = final_crop($data);
			if ($crop_res !== false) {
				$res = [
					'status' => 1,
					'img_name' => $crop_res
				];
			} else {
				$res = [
					'status' => 0
				];
			}
		} else {
			$data = [
				'name' => $_FILES['image']['name'],
				'tmp_name' => $_FILES['image']['tmp_name'],
			];
			$resized_image = image_resize($data, $height, $width);
			if ($resized_image !== false) {
				$res = $resized_image;
			} else {
				$res = [
					'status' => 0
				];
			}
		}
		echo json_encode($res);
	}
	public function delete($id)
	{
		if ($this->ProductModel->delete_product($id) == true) {
			$this->session->set_flashdata('log_suc', 'Product Deleted');
			redirect('admin/Products', 'refresh');
		} else {
			$this->session->set_flashdata('log_err', 'Something Went Wrong..!!');
			redirect($_SERVER['HTTP_REFERER'], 'refresh');
		}
	}
}
