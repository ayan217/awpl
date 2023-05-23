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
	public function getproductcalculateddetails($product_id, $user_id = null)
	{
		$product_row = $this->getproduct($product_id);
		$actual_price = $product_row->price;
		$discount = $product_row->disc;
		$net_amount = $actual_price - $discount;
		if ($product_row->type == 1) {
			$excise_duty_rate = $product_row->exc_duty;
			$excise_duty_amount = ($net_amount * $excise_duty_rate) / 100;
			$dist_fee_amount = $product_row->dist_fee;
			$pri_fee_amount = $product_row->pri_dist_fee;
			$total_product_price = $net_amount + $excise_duty_amount + $dist_fee_amount + $pri_fee_amount;
			$data = compact('actual_price', 'net_amount', 'excise_duty_amount', 'total_product_price');
		} else {
			$tds_rate = $product_row->tds;
			$tds_amount = ($net_amount * $tds_rate) / 100;
			$total_product_price = $net_amount - $tds_amount;
			$data = compact('actual_price', 'net_amount', 'tds_amount', 'total_product_price');
		}
		return $data;
	}
	public function getproductbydpot($dpot_id = null, $limit = null, $type = null, $rand = 1)
	{
		$dpot_table = 'dpots';
		$this->db->select($this->table_name . '.*, ' . $dpot_table . '.name as depot_name');
		$this->db->from($this->table_name);
		if ($dpot_id !== null) {
			$this->db->where('dpot_id', $dpot_id);
		}
		if ($limit !== null) {
			$this->db->limit($limit);
		}
		if ($type !== null) {
			$this->db->where('type', $type);
		}
		$this->db->join($dpot_table, $dpot_table . '.id = ' . $this->table_name . '.dpot_id', 'left');
		if ($rand !== null) {
			$this->db->order_by('rand()');
		}
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
