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
    public function update($data, $id)
    {
        $this->db->where('id', $id);
        if ($this->db->update($this->table_name, $data)) {
            return true;
        } else {
            return false;
        }
    }
    public function getorderbyuser($user_id, $type)
    {
        $dpot_table = 'dpots';
        $this->db->select($this->table_name . '.*, ' . $dpot_table . '.name as depot_name');
        $this->db->from($this->table_name);
        $this->db->where($this->table_name . '.user_id', $user_id);
        $this->db->where($this->table_name . '.status', $type);
        $this->db->join($dpot_table, $dpot_table . '.id = ' . $this->table_name . '.dpot_id', 'left');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $query->result();
        }
    }
    public function getorderbyid($id)
    {
        $dpot_table = 'dpots';
        $this->db->select($this->table_name . '.*, ' . $dpot_table . '.name as depot_name');
        $this->db->from($this->table_name);
        $this->db->where($this->table_name . '.id', $id);
        $this->db->join($dpot_table, $dpot_table . '.id = ' . $this->table_name . '.dpot_id', 'left');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $query->row();
        }
    }
    public function getorderlistbyid($id)
    {
        $product_table = 'product';
        $this->db->select($this->table_name2 . '.*, ' . $product_table . '.name as product_name, ' . $product_table . '.f_img as product_img, ' . $product_table . '.size as product_size');
        $this->db->from($this->table_name2);
        $this->db->where($this->table_name2 . '.id', $id);
        $this->db->join($product_table, $product_table . '.id = ' . $this->table_name2 . '.product_id', 'left');
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $query->row();
        }
    }
}
