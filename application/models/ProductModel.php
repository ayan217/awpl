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
        $dpot_table = 'dpots';
        $this->db->select($this->table_name . '.*, ' . $dpot_table . '.name as depot_name');
        $this->db->from($this->table_name);
        $this->db->join($dpot_table, $dpot_table . '.id = ' . $this->table_name . '.dpot_id', 'left');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $query->result();
        }
    }
    public function getproduct($id)
    {
        $this->db->select();
        $this->db->from($this->table_name);
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $query->row();
        }
    }
    public function getproductbydpot($dpot_id, $limit = null, $type = null)
    {
        $this->db->select();
        $this->db->from($this->table_name);
        $this->db->where('dpot_id', $dpot_id);
        if ($limit !== null) {
            $this->db->limit($limit);
        }
        if ($type !== null) {
            $this->db->where('type', $type);
        }
        $this->db->order_by('rand()');
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $query->result();
        }
    }
    public function update_product($data, $id)
    {
        $this->db->where('id', $id);
        if ($this->db->update($this->table_name, $data)) {
            return true;
        } else {
            return false;
        }
    }
    public function delete_product($id)
    {
        $this->db->where('id', $id);
        if ($this->db->delete($this->table_name)) {
            return true;
        } else {
            return false;
        }
    }
}
