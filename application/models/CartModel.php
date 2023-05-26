<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CartModel extends CI_Model
{
	private $table_name;

	public function __construct()
	{
		parent::__construct();
		$this->table_name = 'cart';
	}

	public function add($data)
	{
		if ($this->db->insert($this->table_name, $data)) {
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
	public function getcart($user_id)
	{
		$dpot_table = 'dpots';
		$product_table = 'product';
		$this->db->select($this->table_name . '.*, ' . $dpot_table . '.name as depot_name, ' . $product_table . '.name as product_name, ' . $product_table . '.f_img as product_img, ' . $product_table . '.size as product_size');
		$this->db->from($this->table_name);
		$this->db->where($this->table_name . '.user_id', $user_id);
		$this->db->where($this->table_name . '.status', 0);
		$this->db->join($dpot_table, $dpot_table . '.id = ' . $this->table_name . '.dpot_id', 'left');
		$this->db->join($product_table, $product_table . '.id = ' . $this->table_name . '.product_id', 'left');
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			return false;
		} else {
			return $query->result();
		}
	}
	public function delete($id)
	{
		$this->db->where('id', $id);
		if ($this->db->delete($this->table_name)) {
			return true;
		} else {
			return false;
		}
	}
}
