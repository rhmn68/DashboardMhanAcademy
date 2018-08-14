<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mauth extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function login($table, $where)
  {
    return $this->db->get_where($table, $where);
  }

  public function input_data($table, $data)
  {
    $this->db->insert($table, $data);
  }
}
