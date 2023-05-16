<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Events extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        admin_login_check();
        $this->load->model('EventsModel');
    }
    public function index()
    {
        $data['folder'] = 'admin';
        $data['template'] = 'events';
        $data['title'] = 'Manage events';
        $data['admin_data'] = logged_in_admin_row();
        $data['events'] = $this->EventsModel->getevents();
        $this->load->view('layout', $data);
    }
    public function add_event($id = null)
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('location', 'Location', 'required');
            $this->form_validation->set_rules('form_date', 'From Date', 'required|date');
            $this->form_validation->set_rules('to_date', 'To Date', 'required|date|callback_check_date');
            if ($this->form_validation->run() == true) {
                $data = $_POST;
                if ($this->EventsModel->add_event($data) !== false) {
                    $this->session->set_flashdata('log_suc', 'Event Added');
                    redirect('admin/Events', 'refresh');
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
                $data['title'] = 'Add Event';
            } else {
                $data['title'] = 'Edit Event';
                $data['event_data'] = $this->EventsModel->getevent($id);
            }
            $data['folder'] = 'admin';
            $data['admin_data'] = logged_in_admin_row();
            $data['template'] = 'add_event';
            $this->load->view('layout', $data);
        }
    }
    public function check_date($to_date)
    {
        $form_date = $this->input->post('form_date');
        if ($form_date > $to_date) {
            $this->form_validation->set_message('check_date', 'To Date should be greater than From Date.');
            return false;
        }
        return true;
    }
    public function edit_event($id)
    {
        if ($this->input->post()) {
			$this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('location', 'Location', 'required');
            $this->form_validation->set_rules('form_date', 'From Date', 'required|date');
            $this->form_validation->set_rules('to_date', 'To Date', 'required|date|callback_check_date');
            if ($this->form_validation->run() == true) {
                $data = $_POST;
                if ($this->EventsModel->update_event($data, $id) !== false) {
                    $this->session->set_flashdata('log_suc', 'Event Updated');
                    redirect('admin/Events', 'refresh');
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
    public function delete_event($id)
    {
        if ($this->EventsModel->delete_event($id) == true) {
            $this->session->set_flashdata('log_suc', 'Event Deleted');
            redirect('admin/Events', 'refresh');
        } else {
            $this->session->set_flashdata('log_err', 'Something Went Wrong..!!');
            redirect($_SERVER['HTTP_REFERER'], 'refresh');
        }
    }
}
