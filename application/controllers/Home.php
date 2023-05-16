<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('UserMealsModel');
	}
	public function index()
	{
		$data['folder'] = 'staff';
		$data['template'] = 'scanner';
		$data['title'] = 'Scan User';
		$this->load->view('layout', $data);
	}
	public function user($id)
	{
		$data['folder'] = 'staff';
		$data['template'] = 'user_meals';
		$data['title'] = 'User Meals';
		$data['user'] = $this->UserModel->getuser($id);
		$user_meals = $this->UserMealsModel->getusermealsbyuser($id);
		$currentDate = new DateTime();
		$today = date('Y-m-d');
		$meal = array();
		foreach ($user_meals as $user_meal) {
		
			if (strtotime($today) == strtotime($user_meal->date)) {
				$startTime = $user_meal->meal_from_time;
				$endTime = $user_meal->meal_to_time;
				if ($currentDate->format('H:i') >= $startTime && $currentDate->format('H:i') <= $endTime) {
						$meal = $user_meal;
				}
			}
		}
		// var_dump($meal);die;
		$data['meal'] = $meal;
		$this->load->view('layout', $data);
	}
	public function complete_meal($id)
	{
		if (!isset($_POST['cash'])) {
			$_POST['cash'] = 0;
		}
		if ($this->UserMealsModel->update_completedmeals($_POST, $id) == true) {
			$this->session->set_flashdata('log_suc', 'Success');
			redirect(base_url(), 'refresh');
		} else {
			$this->session->set_flashdata('log_err', 'Something Went Wrong..!!');
			redirect($_SERVER['HTTP_REFERER'], 'refresh');
		}
	}
}
