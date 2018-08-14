<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cteacher extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mteacher');
  }

  /**
  *Display alll view here
  *
  */

  function index()
  {
    $this->load->view('dashboardTeacher/Vhome');
  }

  public function teacher_class($teacherID)
  {
    $data['teacherID'] = $teacherID;
    $data['classroom'] = $this->Mteacher->get_join_classroom_catalog()->result();
    $catalog = $this->Mteacher->get_all_data('catalog');

    if ($catalog->num_rows() == 0) {
      redirect('cteacher/forms_catalog/'.$teacherID);
    }else {
      $this->load->view('dashboardTeacher/Vkelas', $data);
    }
  }

  public function forms_classroom($teacherID)
  {
    $data['catalog'] = $this->Mteacher->get_all_data('catalog')->result();
    $data['teacherID'] = $teacherID;
    $this->load->view('dashboardTeacher/pages/forms/Vkelas', $data);
  }

  public function forms_catalog($teacherID)
  {
    $data['typeofcatalog'] = $this->Mteacher->get_all_data('typeofcatalog')->result();
    $data['teacherID'] = $teacherID;
    $this->load->view('dashboardTeacher/pages/forms/Vcatalog', $data);
  }

  /* end of display views*/


  /*
  * Check forms ...
  */
  public function check_classroom()
  {
    $data = array('nameClassRoom' => $_POST['nameClassRoom']);
    $classRoom = $this->Mteacher->get_all_condition('classroom',$data);
    if ($classRoom->num_rows() > 0) {
      echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Name Already exists</label>';
    }else {
      echo '<label class="text-success"><span class="glyphicon glyphicon-ok"></span> Name Available</label>';
    }

  }
  /**
  *Input forms classroom, catalog, etc
  *
  */
  public function input_classroom()
  {
    // config timezone in asia/bangkok
    date_default_timezone_set("Asia/Bangkok");
    //end of//
    $nameClassRoom = $this->input->post('nameClassRoom');
    $catalogID = $this->input->post('catalogID');
    $teacherID = $this->input->post('teacherID');
    $date = date("Y-m-d H:i:s");

    $this->form_validation->set_rules('nameClassRoom', 'Name Class Room', 'trim|required');

    // random strin for get random code//
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    $codeClassRoom = '';
    for ($i = 0; $i < 4; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    // end of random///
    $whereCodeClassRoom = array('codeClassRoom' => $randomString);
    $code = $this->Mteacher->get_all_condition('classroom', $whereCodeClassRoom);
    if ($code->num_rows() == 0) {
      $codeClassRoom = $randomString;
    }else {
      echo "Code sudah ada coy";
    }

    if ($this->form_validation->run() == FALSE){
      $this->session->set_flashdata('message', validation_errors());
      redirect('cteacher/forms_classroom/'.$teacherID);
    }else {
      $data_classRoom = array(
        'nameClassRoom' => $nameClassRoom,
        'teacherID' => $teacherID,
        'catalogID' => $catalogID,
        'codeClassRoom' => $codeClassRoom,
        'createdClassRoom' => $date
      );

      $this->Mteacher->input_data('classroom', $data_classRoom);

      $this->session->set_flashdata('message', "Data kelas berhasil ditambahkan");
      redirect('cteacher/teacher_class/'.$teacherID);
    }
  }

  public function input_catalog()
  {
    $teacherID = $this->input->post('teacherID');
    $titleCatalog = $this->input->post('titleCatalog');
    $descCatalog = $this->input->post('descCatalog');
    $createdCatalog = date("Y-m-d H:i:s");
    $typeOfCatalogID = $this->input->post('typeOfCatalogID');

    //config for image
    $new_name = time().$_FILES["imageCatalog"]['name'];
    $config['upload_path'] = 'uploads/images/';
    $config['allowed_types'] = 'gif|jpeg|jpg|png';
    $config['overwrite'] = TRUE;
    $config['file_name'] = $new_name;

    $this->upload->initialize($config);

    if ($this->upload->do_upload('imageCatalog')) {
      $uploadData = $this->upload->data();
      $picture = $uploadData['file_name'];

      //Compress Image
      $config['image_library']='gd2';
      $config['source_image']='./uploads/images/'.$picture;
      $config['create_thumb']= FALSE;
      $config['maintain_ratio']= TRUE;
      $config['quality']= '100%';
      $config['overwrite'] = TRUE;
      $config['width']= 1024;
      $config['height']= 768;
      $this->load->library('image_lib', $config);
      $this->image_lib->resize();

      // if success than upload to database and direct to teache_catalog
      $data_catalog = array(
        'teacherID' => $teacherID,
        'titleCatalog' => $titleCatalog,
        'descCatalog' => $descCatalog,
        'imageCatalog' => base_url('uploads/images/'.$picture),
        'createdCatalog' => $createdCatalog,
        'typeOfCatalogID' => $typeOfCatalogID
      );
      $this->Mteacher->input_data('catalog', $data_catalog);
      redirect('cteacher/teacher_catalog/'.$teacherID);
    }else {
      echo $this->upload->display_errors();
    }
  }
  /*end of input*/

  /*
  * delete forms
  */

  public function delete_classroom($classRoomID, $teacherID)
  {
    $data = array('classRoomID' => $classRoomID);
    $this->Mteacher->delete_data('classroom', $data);
    redirect('cteacher/teacher_class/'.$teacherID);
  }

  public function delete_catalog($catalogID, $teacherID)
  {
    $data = array('catalogID' => $catalogID);
    $this->Mteacher->delete_data('catalog', $data);
    redirect('cteacher/teacher_catalog/'.$teacherID);
  }

  /*end of delete forms*/

  function generateRandomString($length = 4) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    echo  $randomString;
}
}
