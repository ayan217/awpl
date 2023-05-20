<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProductModel extends CI_Model
{
    private $table_name;

    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'product';
    }

    public function add_product($data)
    {
        if ($this->db->insert($this->table_name, $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
    public function getproducts()
    {
        $this->db->select();
        $this->db->from($this->table_name);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $query->result();
        }
    }
}
