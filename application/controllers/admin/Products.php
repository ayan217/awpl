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
        // $data['products'] = $this->ProductModel->getproducts();
        $this->load->view('layout', $data);
    }
}
