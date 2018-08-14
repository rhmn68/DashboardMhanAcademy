<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mcatalog extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function fetch_all_catalog()
  {
    $query = $this->db->get('catalog');

    foreach ($query->result() as $row)
    {
        $result[] = array(
          'CatalogID' => $row->CatalogID,
          'Title' => $row->Title,
          'SubTitle' => $row->SubTitle,
          'Description' => $row->Description,
          'Image' => $row->Image
        );
    }
    return $result;
  }

  public function fetch_all_course()
  {
    $query = $this->db->get('course');

    foreach ($query->result() as $row)
    {
        $result[] = array(
          'CourseID' => $row->CourseID,
          'CatalogID' => $row->CatalogID,
          'Title' => $row->Title,
          'Image' => $row->Image,
          'Progress' => $row->Progress,
          'Description' => $row->Description
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

  public function delete_data($table, $data)
  {
    $this->db->where($data);
    $this->db->delete($table);
  }

  public function get_data_id($table, $where)
  {
    $this->db->where($where);
    return $this->db->get($table);
  }

  public function update_data($table, $data, $where){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

  public function get_join_data($where)
  {
    $this->db->select("*");
    $this->db->from("catalog");
    $this->db->join("course",'catalog.CatalogID = course.CatalogID');
    $this->db->where($where);
    return $this->db->get();
  }

	function get_images(){
		$this->db->from('uploaded_images');
		$this->db->order_by('date_uploaded', 'asc');
		$query = $this->db->get();

		return $query->result();

	}

  public function get_join_catalog_typeOfCatalog($where)
  {
    $this->db->select("*");
    $this->db->from("catalog");
    $this->db->join("typeofcatalog",'catalog.typeOfCatalogID = typeofcatalog.typeOfCatalogID');
    $this->db->join("teacher",'catalog.teacherID = teacher.teacherID');
    $this->db->where($where);
    return $this->db->get();
  }

}
