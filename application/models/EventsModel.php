<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EventsModel extends CI_Model
{
	private $table_name;

	function __construct()
	{
		parent::__construct();
		$this->table_name = 'events';
	}

	public function add_event($data)
	{
		if ($this->db->insert($this->table_name, $data)) {
			return $this->db->insert_id();
		} else {
			return false;
		}
	}

	public function getevent($id)
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

	public function getevents()
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

	public function update_event($data, $id)
	{
		$this->db->where('id', $id);
		if ($this->db->update($this->table_name, $data)) {
			return true;
		} else {
			return false;
		}
	}
	public function delete_event($id)
	{
		$this->db->where('id', $id);
		if ($this->db->delete($this->table_name)) {
			return true;
		} else {
			return false;
		}
	}
}
