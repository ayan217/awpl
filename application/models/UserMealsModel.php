<?php

defined('BASEPATH') or exit('No direct script access allowed');

class UserMealsModel extends CI_Model
{
	private $table_name;

	public function __construct()
	{
		parent::__construct();
		$this->table_name = 'assigned_meals';
	}

	public function add_usermeals($data)
	{
		if ($this->db->insert($this->table_name, $data)) {
			return $this->db->insert_id();
		} else {
			return false;
		}
	}
	public function complete_meal($data)
	{
		if ($this->db->insert('completed_meals', $data)) {
			return $this->db->insert_id();
		} else {
			return false;
		}
	}

	public function getusermeal($id)
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

	public function getusermeals()
	{
		$user_table = 'user';
		$event_table = 'events';
		$meal_table = 'meals';
		$this->db->select($this->table_name . '.*, ' . $user_table . '.name as user_name, ' . $event_table . '.name as event_name, ' . $meal_table . '.name as meal_name');
		$this->db->from($this->table_name);
		$this->db->join($user_table, $user_table . '.id = ' . $this->table_name . '.user_id', 'left');
		$this->db->join($event_table, $event_table . '.id = ' . $this->table_name . '.event_id', 'left');
		$this->db->join($meal_table, $meal_table . '.id = ' . $this->table_name . '.meal_id', 'left');
		$this->db->order_by($this->table_name . '.id', 'DESC');
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			return false;
		} else {
			return $query->result();
		}
	}

	public function getcompletedmeals()
	{
		$user_table = 'user';
		$event_table = 'events';
		$meal_table = 'meals';
		$user_meal_table = 'assigned_meals';
		$completed_meal_table = 'completed_meals';

		$this->db->select($completed_meal_table . '.*, ' . $user_table . '.name as user_name, ' . $event_table . '.name as event_name, ' . $meal_table . '.name as meal_name, '.$user_meal_table.'.price as value');
		$this->db->from($completed_meal_table);
		$this->db->join($user_meal_table, $user_meal_table . '.id = ' . $completed_meal_table . '.assigned_meals_id', 'left');
		$this->db->join($user_table, $user_table . '.id = ' . $user_meal_table . '.user_id', 'left');
		$this->db->join($event_table, $event_table . '.id = ' . $user_meal_table . '.event_id', 'left');
		$this->db->join($meal_table, $meal_table . '.id = ' . $user_meal_table . '.meal_id', 'left');
		// $this->db->order_by($completed_meal_table . '.id', 'DESC');
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			return false;
		} else {
			return $query->result();
		}
	}

	public function update_completedmeals($data, $id)
	{
		$completed_meal_table = 'completed_meals';
		$this->db->where('id', $id);
		if ($this->db->update($completed_meal_table, $data)) {
			return true;
		} else {
			return false;
		}
	}

	public function update_usermeals($data, $id)
	{
		$this->db->where('id', $id);
		if ($this->db->update($this->table_name, $data)) {
			return true;
		} else {
			return false;
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
	public function getusermealsbyuser($user_id)
	{
		$user_table = 'user';
		$event_table = 'events';
		$meal_table = 'meals';
		$user_meal_table = 'assigned_meals';
		$completed_meal_table = 'completed_meals';

		$this->db->select($completed_meal_table . '.*, ' . $user_table . '.name as user_name, ' . $event_table . '.name as event_name, ' . $meal_table . '.name as meal_name, ' . $user_meal_table . '.price as value, ' . $meal_table . '.from_time as meal_from_time, ' . $meal_table . '.to_time as meal_to_time');
		$this->db->from($completed_meal_table);
		$this->db->join($user_meal_table, $user_meal_table . '.id = ' . $completed_meal_table . '.assigned_meals_id', 'left');
		$this->db->join($user_table, $user_table . '.id = ' . $user_meal_table . '.user_id', 'left');
		$this->db->join($event_table, $event_table . '.id = ' . $user_meal_table . '.event_id', 'left');
		$this->db->join($meal_table, $meal_table . '.id = ' . $user_meal_table . '.meal_id', 'left');
		$this->db->where($user_meal_table . '.user_id', $user_id);
		$this->db->where($completed_meal_table . '.taken IS NULL');
		// $this->db->order_by($completed_meal_table . '.id', 'DESC');
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			return false;
		} else {
			return $query->result();
		}
	}
}
