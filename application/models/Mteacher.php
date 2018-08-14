<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mteacher extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function fetch_all_teacher()
  {
    $query = $this->db->get('teacher');

    foreach ($query->result() as $row)
    {
        $result[] = array(
          'TeacherID' => $row->TeacherID,
          'AdminID' => $row->AdminID,
          'Name' => $row->Name,
          'Email' => $row->Email,
          'Username' => $row->Username,
          'Password' => $row->Password
        );
    }
    return $result;
  }

  public function fetch_all_myclass()
  {
    $query = $this->db->get('myclass');

    foreach ($query->result() as $row)
    {
        $result[] = array(
          'MyClassID' => $row->MyClassID,
          'AdminID' => $row->AdminID,
          'UserID' => $row->UserID,
          'CatalogID' => $row->CatalogID,
          'NameClass' => $row->NameClass,
          'NameTeacher' => $row->NameTeacher,
          'NameUser' => $row->NameUser,
          'NameCatalog' => $row->NameCatalog
        );
    }
    return $result;
  }

  public function fetch_all_questions()
  {
    $query = $this->db->get('questions');

    foreach ($query->result() as $row)
    {
        $result[] = array(
          'QuestionsID' => $row->QuestionsID,
          'TypeOfTestID' => $row->TypeOfTestID,
          'CatalogID' => $row->CatalogID,
          'CourseID' => $row->CourseID,
          'Question' => $row->Question,
          'Image' => $row->Image,
          'AnswerA' => $row->AnswerA,
          'AnswerB' => $row->AnswerB,
          'AnswerC' => $row->AnswerC,
          'AnswerC' => $row->AnswerC,
          'CorrectAnswer' => $row->CorrectAnswer
        );
    }
    return $result;
  }

  public function fetch_all_typeoftest()
  {
    $query = $this->db->get('typeoftest');

    foreach ($query->result() as $row)
    {
        $result[] = array(
          'TypeOfTestID' => $row->TypeOfTestID,
          'Name' => $row->Name
        );
    }
    return $result;
  }

  public function input_data($table, $data)
  {
    $this->db->insert($table, $data);
  }

  public function get_all_data($table)
  {
    return $this->db->get($table);
  }

  public function get_all_condition($table, $where)
  {
    return $this->db->get_where($table, $where);
  }

  public function get_join_data($where)
  {
    $this->db->select("*");
    $this->db->from("classroom");
    $this->db->join("catalog",'classroom.CatalogID = catalog.CatalogID');
    $this->db->where($where);
    return $this->db->get();
  }

  public function get_join_classroom_catalog()
  {
    $this->db->select("*");
    $this->db->from("classroom");
    $this->db->join("catalog",'classroom.catalogID = catalog.catalogID');
    return $this->db->get();
  }

  public function delete_data($table, $data)
  {
    $this->db->where($data);
    $this->db->delete($table);
  }

  public function edit_data($table, $data)
  {
    return $this->db->get_where($table, $data);
  }

  public function update_data($table, $data, $where){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

}
