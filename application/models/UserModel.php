<?php
defined('BASEPATH') or exit('No direct script access allowed');

class userModel extends CI_Model
{
	private $table_name;

	function __construct()
	{
		parent::__construct();
		$this->table_name = 'user';
	}

	public function add_user($data)
	{
		if ($this->db->insert($this->table_name, $data)) {
			return $this->db->insert_id();
		} else {
			return false;
		}
	}

	public function checkUsernameExist($username, $admin_or_not)
	{
		$this->db->select();
		$this->db->from($this->table_name);
		$this->db->where('username', $username);
		if ($admin_or_not == 1) {
			$this->db->where('type', 0)->or_where('type', 1)->or_where('type', 2);
		} else {
			$this->db->where('type', 3)->or_where('type', 4)->or_where('type', 5);
		}
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			return false;
		} else {
			return $query->row();
		}
	}
	public function getadmin($id)
	{
		$this->db->select();
		$this->db->from($this->table_name);
		$this->db->where('id', $id);
		$this->db->where('type', 0)->or_where('type', 1)->or_where('type', 2);

		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			return false;
		} else {
			return $query->row();
		}
	}

	public function getanyuser($id)
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

	public function getusers()
	{
		$this->db->select();
		$this->db->from($this->table_name);
		$this->db->where('type', 1)->or_where('type', 2);
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			return false;
		} else {
			return $query->result();
		}
	}

	public function getdepotusers(){
		$this->db->select();
		$this->db->from($this->table_name);
		$this->db->where('type', 0);
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			return false;
		} else {
			return $query->result();
		}
	}

	public function update_user($data, $id)
	{
		$this->db->where('id', $id);
		if ($this->db->update($this->table_name, $data)) {
			return true;
		} else {
			return false;
		}
	}
	public function delete_user($id)
	{
		$this->db->where('id', $id);
		if ($this->db->delete($this->table_name)) {
			return true;
		} else {
			return false;
		}
	}
}
