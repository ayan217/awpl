<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$data['folder'] = 'frontend';
		$data['template'] = 'index';
		$data['title'] = 'AWPL';
		$this->load->view('layout', $data);
	}
	public function signup()
	{
		if ($this->input->post()) {
			$this->form_validation->set_rules('full_name', 'Full Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			if ($_POST['type'] == 3) {
				$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
				$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
				$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
				$_POST['status'] = 1;
			} else {
				$this->form_validation->set_rules('type', 'Distributor Type', 'required');
				$this->form_validation->set_rules('phone', 'Phone Number', 'required');
				$this->form_validation->set_rules('l_name', 'License Name', 'required');
				$this->form_validation->set_rules('l_number', 'License Number', 'required');
				$this->form_validation->set_rules('l_vdate', 'License Validity Date', 'required');
				$this->form_validation->set_rules('dist', 'District', 'required');
				$this->form_validation->set_rules('city', 'City', 'required');
				$this->form_validation->set_rules('address', 'Address', 'required');
				$this->form_validation->set_rules('moq', 'Minimum Order Quantity ', 'required');
				$this->form_validation->set_rules('v_type', 'Vehicle Type', 'required');
				$this->form_validation->set_rules('v_number', 'Vehicle No', 'required');
				$_POST['status'] = 0;
			}
			if ($this->form_validation->run() == true) {
				if ($_POST['type'] !== 3) {

					if (!empty($_FILES['file']['name'])) {
						$_FILES['file']['name'] = $_FILES['file']['name'];
						$_FILES['file']['type'] = $_FILES['file']['type'];
						$_FILES['file']['tmp_name'] = $_FILES['file']['tmp_name'];
						$_FILES['file']['error'] = $_FILES['file']['error'];
						$_FILES['file']['size'] = $_FILES['file']['size'];
						$file_extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
						$filename = str_replace(' ', '_', $_POST['full_name']) . '_contract_agreement.' . $file_extension;
						$uploadPath = UPLOAD_PATH . 'agreements';
						$config['upload_path'] = $uploadPath;
						$config['allowed_types'] = 'pdf';
						$config['max_size'] = 0;
						$config['file_name'] = $filename;
						$this->upload->initialize($config);
						if ($this->upload->do_upload('file')) {
							$_POST['agreement_file'] = $filename;
						} else {
							$res = array('status' => 0, 'error' => $this->upload->display_errors());
							echo json_encode($res);
							die;
						}
					}
				}
				$data = $_POST;
				$user_id = $this->UserModel->add_user($data);
				if ($user_id !== false) {
					$this->session->set_flashdata('log_suc', '');
					$res = array('status' => 1);
				} else {
					$res = array('status' => 0, 'error' => 'Something Went Wrong..!!');
				}
			} else {
				$res = array('status' => 0, 'error' => validation_errors());
			}
			echo json_encode($res);
		} else {
			$data['folder'] = 'frontend';
			$data['template'] = 'signup';
			$data['title'] = 'AWPL Signup';
			$this->load->view('layout', $data);
		}
	}
	public function payment($link_code)
	{
		$explode = explode('-', $link_code);
		$user_id = $explode[1];
		$user_row = $this->UserModel->getanyuser($user_id);
		$data['amount'] = $user_row->sdepo;
		$data['user_id'] = $user_id;
		$data['folder'] = 'frontend';
		$data['template'] = 'payment';
		$data['title'] = 'AWPL Payment';
		$this->load->view('layout', $data);
	}
	public function complete_payment($id)
	{
		$data = [
			'sdepo_status' => 1
		];
		if ($this->UserModel->update_user($data, $id) == true) {
			$user_row = $this->UserModel->getanyuser($id);
			//send mail to the user with username and password
			if ($_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['HTTP_HOST'] == 'localhost') {
				// code to run if server is localhost
			} else {
				$username = $user_row->username;
				$to_mail = $user_row->email;
				$subject = 'LOGIN - AWPL';
				$msg = '<div>Username: ' . $username . '</div><div>Password: ' . $username . '</div><a href="' . base_url('login') . '">' . base_url('login') . '</a>';
				$this->multipleNeedsModel->mail($to_mail, $subject, $msg);
			}
			//mail end
			$this->session->set_flashdata('log_suc', 'Success');
			redirect('login');
		} else {
			$this->session->set_flashdata('log_err', 'Error');
			redirect($_SERVER['HTTP_REFERER'], 'refresh');
		}
	}
}
