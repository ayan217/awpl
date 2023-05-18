<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		admin_login_check();
		$this->load->model('DpotModel');
	}
	public function index()
	{
		$data['folder'] = 'admin';
		$data['template'] = 'users';
		$data['title'] = 'Manage Users';
		$data['admin_data'] = logged_in_admin_row();
		$data['users'] = $this->UserModel->getadminusers();
		$this->load->view('layout', $data);
	}
	public function add_user($id = null)
	{
		if ($this->input->post()) {
			$this->form_validation->set_rules('full_name', 'Full Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('phone', 'Phone(Only numbers are allowed)', 'required|regex_match[/^[0-9]{10}$/]');
			$this->form_validation->set_rules('type', 'User type', 'required');
			if ($_POST['type'] == 1) {
				$this->form_validation->set_rules('dpot_id', 'Depot', 'required');
			}
			$this->form_validation->set_rules('created_at', 'created_at', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
			if ($this->form_validation->run() == TRUE) {
				$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
				$data = $_POST;
				$user_id = $this->UserModel->add_user($data);
				if ($user_id !== false) {
					$this->session->set_flashdata('log_suc', 'User Added');
					$res = array('status' => 1);
				} else {
					$res = array('status' => 0, 'error' => 'Something Went Wrong..!!');
				}
			} else {
				$res = array('status' => 0, 'error' => validation_errors());
			}
			echo json_encode($res);
		} else {
			if ($id == null) {
				$data['title'] = 'Add User';
			} else {
				$data['title'] = 'Edit User';
				$data['user_data'] = $this->UserModel->getadmin($id);
			}
			$data['folder'] = 'admin';
			$data['admin_data'] = logged_in_admin_row();
			$data['template'] = 'add_user';
			$data['depots'] = $this->DpotModel->getdepots();
			$this->load->view('layout', $data);
		}
	}
	public function edit_user($id)
	{
		if ($this->input->post()) {
			$this->form_validation->set_rules('full_name', 'Full Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('phone', 'Phone(Only numbers are allowed)', 'required|regex_match[/^[0-9]{10}$/]');
			$this->form_validation->set_rules('type', 'User type', 'required');
			if ($_POST['type'] == 1) {
				$this->form_validation->set_rules('dpot_id', 'Depot', 'required');
			}
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('updated_at', 'created_at', 'required');
			if ($this->form_validation->run() == TRUE) {
				$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
				$data = $_POST;
				if ($this->UserModel->update_user($data, $id) !== false) {
					$this->session->set_flashdata('log_suc', 'User Updated');
					$res = array('status' => 1);
				} else {
					$res = array('status' => 0, 'error' => 'Something Went Wrong..!!');
				}
			} else {
				$res = array('status' => 0, 'error' => validation_errors());
			}
			echo json_encode($res);
		}
	}
	public function delete_user($id)
	{
		if ($this->UserModel->delete_user($id) == true) {
			$this->session->set_flashdata('log_suc', 'User Deleted');
			redirect('admin/Users', 'refresh');
		} else {
			$this->session->set_flashdata('log_err', 'Something Went Wrong..!!');
			redirect($_SERVER['HTTP_REFERER'], 'refresh');
		}
	}
	public function approved_users()
	{
		$data['folder'] = 'admin';
		$data['template'] = 'approved_users';
		$data['title'] = 'Approved Users';
		$data['admin_data'] = logged_in_admin_row();
		$data['users'] = $this->UserModel->getfrontendusersbystatus(1);
		$this->load->view('layout', $data);
	}
	public function pending_users()
	{
		$data['folder'] = 'admin';
		$data['template'] = 'pending_users';
		$data['title'] = 'Pending Users';
		$data['admin_data'] = logged_in_admin_row();
		$data['users'] = $this->UserModel->getfrontendusersbystatus(0);
		$this->load->view('layout', $data);
	}
	public function approve_user($id)
	{
		echo encrypt_number($id);
		echo '<br>';
		echo decrypt_number(encrypt_number($id));
		die;
		if ($this->input->post()) {
			$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
			$this->form_validation->set_rules('sdepo', 'Security Deposit', 'required|regex_match[/^\d+(\.\d+)?$/]');
			if ($this->form_validation->run() == true) {
				$_POST['password'] = password_hash($_POST['username'], PASSWORD_DEFAULT);
				$_POST['status'] = 1;
				$_POST['sdepo_status'] = 0;
				$data = $_POST;

				$this->UserModel->update_user($data, $id);
				$this->session->set_flashdata('log_suc', 'Approved');
				$res = array('status' => 1);
				//send mail to the user with payment link
				if ($_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['HTTP_HOST'] == 'localhost') {
					// code to run if server is localhost
				} else {
					// Encrypt the number
					$encrypted_id = encrypt_number($id);
					// code to run if server is not localhost
					$payment_link = base_url('payment/' . $encrypted_id);
					$user_row = $this->UserModel->getanyuser($id);
					$to_mail = $user_row->email;
					$subject = 'Payment link for Security Deposit - AWPL';
					$msg = '<div>Pay: ' . CURRENCY . $data['sdepo'] . '</div><a href="' . $payment_link . '">' . $payment_link . '</a>';
					$this->multipleNeedsModel->mail($to_mail, $subject, $msg);
				}
				//mail end
			} else {
				$res = array('status' => 0, 'error' => validation_errors());
			}
			echo json_encode($res);
		}
	}
}
