<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProductModel extends CI_Model
{
    private $table_name;

    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'products';
    }

    public function add_product($data)
    {
        if ($this->db->insert($this->table_name, $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
}
