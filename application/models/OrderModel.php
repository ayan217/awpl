<?php
defined('BASEPATH') or exit('No direct script access allowed');

class OrderModel extends CI_Model
{
    private $table_name;
    private $table_name2;

    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'orderdetails';
        $this->table_name2 = 'orderlist';
    }
    public function add($data)
    {
        if ($this->db->insert($this->table_name, $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
    public function add2($data)
    {
        if ($this->db->insert($this->table_name2, $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
}
