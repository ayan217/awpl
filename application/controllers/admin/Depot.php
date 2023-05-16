<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Depot extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		admin_login_check();
		$this->load->model('DpotModel');
	}
	public function index()
	{
		$data['folder'] = 'admin';
		$data['template'] = 'depot';
		$data['title'] = 'Manage Depot';
		$data['admin_data'] = logged_in_admin_row();
		$data['depots'] = $this->DpotModel->getdepots();
		$this->load->view('layout', $data);
	}
	public function add_depot($id = null)
	{
		if ($this->input->post()) {
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('address', 'Address', 'required');
			if ($this->form_validation->run() == TRUE) {
				$data = $_POST;
				if ($this->DpotModel->add_depot($data) !== false) {
					$this->session->set_flashdata('log_suc', 'Dpot Added');
					redirect('admin/Depot', 'refresh');
				} else {
					$this->session->set_flashdata('log_err', 'Something Went Wrong..!!');
					redirect($_SERVER['HTTP_REFERER'], 'refresh');
				}
			} else {
				$this->session->set_flashdata('log_err', validation_errors());
				redirect($_SERVER['HTTP_REFERER'], 'refresh');
			}
		} else {
			if ($id == null) {
				$data['title'] = 'Add Depot';
			} else {
				$data['title'] = 'Edit Depot';
				$data['depot_data'] = $this->DpotModel->getdepot($id);
			}
			$data['folder'] = 'admin';
			$data['admin_data'] = logged_in_admin_row();
			$data['template'] = 'add_depot';
			$this->load->view('layout', $data);
		}
	}
	public function edit($id)
	{
		if ($this->input->post()) {
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('address', 'Address', 'required');
			if ($this->form_validation->run() == TRUE) {
				$data = $_POST;
				if ($this->DpotModel->update_depot($data, $id) !== false) {
					$this->session->set_flashdata('log_suc', 'Depot Updated');
					redirect('admin/Depot', 'refresh');
				} else {
					$this->session->set_flashdata('log_err', 'Something Went Wrong..!!');
					redirect($_SERVER['HTTP_REFERER'], 'refresh');
				}
			} else {
				$this->session->set_flashdata('log_err', validation_errors());
				redirect($_SERVER['HTTP_REFERER'], 'refresh');
			}
		}
	}
	public function delete($id)
	{
		if ($this->DpotModel->delete_depot($id) == true) {
			$this->session->set_flashdata('log_suc', 'Depot Deleted');
			redirect('admin/Depot', 'refresh');
		} else {
			$this->session->set_flashdata('log_err', 'Something Went Wrong..!!');
			redirect($_SERVER['HTTP_REFERER'], 'refresh');
		}
	}
}
