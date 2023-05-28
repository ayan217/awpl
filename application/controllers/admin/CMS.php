<?php
defined('BASEPATH') or exit('No direct script access allowed');
class CMS extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        admin_login_check();
    }
    public function about()
    {
        $data['folder'] = 'admin';
        $data['template'] = 'about';
        $data['title'] = 'CMS About';
        $data['admin_data'] = logged_in_admin_row();
        $this->load->view('layout', $data);
    }
    public function terms()
    {
        $data['folder'] = 'admin';
        $data['template'] = 'terms';
        $data['title'] = 'CMS Terms';
        $data['admin_data'] = logged_in_admin_row();
        $this->load->view('layout', $data);
    }
    public function privacy()
    {
        $data['folder'] = 'admin';
        $data['template'] = 'privacy';
        $data['title'] = 'CMS Privacy';
        $data['admin_data'] = logged_in_admin_row();
        $this->load->view('layout', $data);
    }
    public function faq()
    {
        $data['folder'] = 'admin';
        $data['template'] = 'faq';
        $data['title'] = 'CMS FAQ';
        $data['admin_data'] = logged_in_admin_row();
        $this->load->view('layout', $data);
    }
}
