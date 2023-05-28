<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Orders extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        admin_login_check();
        $this->load->model('OrderModel');
    }
    public function index()
    {
        $data['folder'] = 'admin';
        $data['template'] = 'order';
        $data['title'] = 'Manage Order';
        $data['admin_data'] = logged_in_admin_row();
        if (admin_type() == SUPER || admin_type() == MANAGE) {
            $data['orders'] = $this->OrderModel->getallorder();
        } elseif (admin_type() == DEPOT) {
            $data['orders'] = $this->OrderModel->getallorder($data['admin_data']->dpot_id);
        }
        $this->load->view('layout', $data);
    }
    public function approve($order_id)
    {
        $data = [
            'status' => 1
        ];
        $order_row = $this->OrderModel->getorderbyid($order_id);
        $user_id = $order_row->user_id;
        $user_row = $this->UserModel->getuser($user_id);
        if ($this->OrderModel->update($data, $order_id)) {
            //order mail
            if ($_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['HTTP_HOST'] == 'localhost') {
                // code to run if server is localhost
            } else {
                $to_mail = $user_row->email;
                $subject = 'AWPL Order Delivered';
                $html = 'Your Order No : ' . $order_row->order_no . ' has been delivered.';
                $this->multipleNeedsModel->mail($to_mail, $subject, $html);
            }
            //mail end
            $this->session->set_flashdata('log_suc', 'Success');
            redirect($_SERVER['HTTP_REFERER'], 'refresh');
        } else {
            $this->session->set_flashdata('log_err', 'Something Went Wrong..!!');
            redirect($_SERVER['HTTP_REFERER'], 'refresh');
        }
    }
}
