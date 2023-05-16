<?php

defined('BASEPATH') or exit('No direct script access allowed');

class UserMeals extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		admin_login_check();
		$this->load->model('EventsModel');
		$this->load->model('MealsModel');
		$this->load->model('UserMealsModel');
	}
	public function index()
	{
		$data['folder'] = 'admin';
		$data['template'] = 'user_meals';
		$data['title'] = 'Manage User Meals';
		$data['admin_data'] = logged_in_admin_row();
		$data['user_meals'] = $this->UserMealsModel->getusermeals();
		$this->load->view('layout', $data);
	}
	public function completed_meals()
	{
		$data['folder'] = 'admin';
		$data['template'] = 'user_completed_meals';
		$data['title'] = 'Completed Meals';
		$data['admin_data'] = logged_in_admin_row();
		$data['completed_meals'] = $this->UserMealsModel->getcompletedmeals();
		// var_dump($data['completed_meals']);
		// die();
		$this->load->view('layout', $data);
	}
	public function add_usermeals($id = null)
	{
		if ($this->input->post()) {

			$this->form_validation->set_rules('user_id', 'user_id', 'required');
			$this->form_validation->set_rules('meal_ids[]', 'meal_id', 'required');
			$this->form_validation->set_rules('event_id', 'event_id', 'required|date');
			$this->form_validation->set_rules('start_date', 'start_date', 'required|date');
			$this->form_validation->set_rules('end_date', 'end_date', 'required|date|callback_check_date');
			$this->form_validation->set_rules('days[]', 'days', 'required');
			if ($this->form_validation->run() == true) {
				$data = $_POST;
				$days  = implode(',', $_POST['days']);
				$data['days'] = $days;
				foreach ($_POST['meal_ids'] as $meal_id) {
					$meal_row = $this->MealsModel->getmeal($meal_id);
					$data['price'] = $meal_row->price;
					$data['meal_id'] = $meal_row->id;
					unset($data['meal_ids']);
					$user_meal_id = $this->UserMealsModel->add_usermeals($data);
					foreach ($_POST['days'] as $meal_day) {
						$start_date = new DateTime($_POST['start_date']);
						$end_date = new DateTime($_POST['end_date']);
						$interval = DateInterval::createFromDateString('1 day');
						$period = new DatePeriod($start_date, $interval, $end_date);
						$completed_data = array();
						foreach ($period as $dt) {
							if ($dt->format('l') == $meal_day) {
								$matched_date = $dt->format('Y-m-d');
								$completed_data = [
									'assigned_meals_id' => $user_meal_id,
									'date' => $matched_date
								];
								$this->UserMealsModel->complete_meal($completed_data);
							}
						}
					}
				}

				$this->session->set_flashdata('log_suc', 'New Meal Assigned Added');
				redirect('admin/user-meals', 'refresh');
			} else {
				$this->session->set_flashdata('log_err', validation_errors());
				redirect($_SERVER['HTTP_REFERER'], 'refresh');
			}
		} else {
			if ($id == null) {
				$data['title'] = 'Assign Meals';
			} else {
				$data['title'] = 'Edit Assigned Meals';
				$data['user_meal'] = $this->UserMealsModel->getusermeal($id);
			}
			$data['folder'] = 'admin';
			$data['admin_data'] = logged_in_admin_row();
			$data['template'] = 'add_usermeals';
			$data['all_users'] = $this->UserModel->getusers();
			$data['events'] = $this->EventsModel->getevents();
			$data['meals'] = $this->MealsModel->getmeals();
			$this->load->view('layout', $data);
		}
	}
	public function limit_date($event_id)
	{
		$event_row = $this->EventsModel->getevent($event_id);
		$res = [
			'start_date' => $event_row->form_date,
			'end_date' => $event_row->to_date,
			'status' => 1
		];
		echo json_encode($res);
	}
	public function check_date($to_date)
	{
		$form_date = $this->input->post('start_date');
		if ($form_date > $to_date) {
			$this->form_validation->set_message('check_date', 'To Date should be greater than From Date.');
			return false;
		}
		return true;
	}

	public function delete($id)
	{
		if ($this->UserMealsModel->delete($id) == true) {
			$this->session->set_flashdata('log_suc', 'Assigned Meal Deleted');
			redirect('admin/user-meals', 'refresh');
		} else {
			$this->session->set_flashdata('log_err', 'Something Went Wrong..!!');
			redirect($_SERVER['HTTP_REFERER'], 'refresh');
		}
	}
}
