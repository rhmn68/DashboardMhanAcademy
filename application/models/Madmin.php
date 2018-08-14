<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Madmin extends CI_Model{

  public function fetch_all_admin()
  {
    $query = $this->db->get('admin');

    foreach ($query->result() as $row)
    {
        $result[] = array(
          'AdminID' => $row->AdminID,
          'Name' => $row->Name,
          'Email' => $row->Email,
          'Username' => $row->Username,
          'Password' => $row->Password
        );
    }
    $result_final->admin[] = array();
    $result_final->admin = $result;
    return $result;
  }

}
