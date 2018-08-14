<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cauth extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mauth');
  }

  /*
  * For Load view login
  */
  function index()
  {
    $this->load->view('login/Vlogin');
  }

  /*
  * Form for function login
  */
  public function login()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $where = array(
      'usernameTeacher' => $username,
      'passwordTeacher' => md5($password)
    );

    $check_teacher = $this->Mauth->login("teacher", $where);

    if ($check_teacher->num_rows() > 0) {
      foreach ($check_teacher->result() as $key => $row) {
        if ($row->isAdmin == 0) {
          $data_session = array(
            'teacherID' => $row->teacherID,
            'level' => "Teacher",
            'name' => $username,
            'status' =>  "login"
          );

          $data_log = array(
            'userID' => $row->teacherID,
            'isLogin' => 1,
            'timeLogin' => date("Y-m-d H:i:s")
          );
          $this->Mauth->input_data('log', $data_log);
          $this->session->set_userdata($data_session);
          redirect(base_url("Cteacher"));
        }else {
          $data_session = array(
            'teacherID' => $row->teacherID,
            'level' => "Admin",
            'name' => $username,
            'status' =>  "login"
          );
          $this->session->set_userdata($data_session);
          redirect(base_url("Cadmin"));
        }
      }
    }else {
      $this->session->set_flashdata('message', "Username atau Password salah");
      redirect('cauth/index');
    }
  }

  /*
  * function for logou
  */
  public function logout($teacherID)
  {
    $data_log = array(
      'userID' => $teacherID,
      'isLogin' => 0,
      'timeLogin' => date("Y-m-d H:i:s")
    );
    $this->Mauth->input_data('log', $data_log);
    $this->session->sess_destroy();
    redirect(base_url("cauth"));
  }
}
