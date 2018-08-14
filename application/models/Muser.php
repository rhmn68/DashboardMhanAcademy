<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Muser extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function fetch_all_user()
  {
    $query = $this->db->get('user');

    foreach ($query->result() as $row)
    {
        $result[] = array(
          'UserID' => $row->UserID,
          'Name' => $row->Name,
          'Email' => $row->Email,
          'Username' => $row->Username,
          'Password' => $row->Password
        );
    }
    return $result;
  }

  public function fetch_all_mycourse()
  {
    $query = $this->db->get('mycourse');

    foreach ($query->result() as $row)
    {
        $result[] = array(
          'MyCourseID' => $row->MyCourseID,
          'CatalogID' => $row->CatalogID,
          'UserID' => $row->UserID,
          'TitleCatalog' => $row->TitleCatalog,
          'SubTitleCatalog' => $row->SubTitleCatalog
        );
    }
    return $result;
  }

  public function fetch_all_rank()
  {
    $query = $this->db->get('rank');

    foreach ($query->result() as $row)
    {
        $result[] = array(
          'RankID' => $row->RankID,
          'ScoreID' => $row->ScoreID,
          'UserID' => $row->UserID,
          'TotalCourse' => $row->TotalCourse,
          'TotalScore' => $row->TotalScore
        );
    }
    return $result;
  }

  public function fetch_all_score()
  {
    $query = $this->db->get('score');

    foreach ($query->result() as $row)
    {
        $result[] = array(
          'ScoreID' => $row->ScoreID,
          'UserID' => $row->UserID,
          'QuestionID' => $row->QuestionID,
          'Score' => $row->Score
        );
    }
    return $result;
  }

  public function insert_database($table, array $data)
  {
    $this->db->insert($table, $data);
    return $this->db->insert_id();
  }

  public function login_user($table, array $data)
  {
    $this->db->where($data);
    $query = $this->db->get($table);

    if ($query->num_rows()) {
      return $query->row();
    }else {
      return FALSE;
    }
  }

}
