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
		$data['folder'] = 'frontend';
		$data['template'] = 'signup';
		$data['title'] = 'AWPL Signup';
		$this->load->view('layout', $data);
	}
}
