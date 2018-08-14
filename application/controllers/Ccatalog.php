<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ccatalog extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mcatalog');
  }

  public function show_catalog($teacherID)
  {
    $where_teacher = array('catalog.teacherID' => $teacherID);
    $data['teacherID'] = $teacherID;
    $data['catalog'] = $this->Mcatalog->get_join_catalog_typeOfCatalog($where_teacher)->result();
    $this->load->view('dashboardTeacher/Vcatalog', $data);
  }

  public function check_catalog()
  {
    $data = array('titleCatalog' => $_POST['titleCatalog']);
    $catalog = $this->Mteacher->get_all_condition('catalog',$data);
    if ($catalog->num_rows() > 0) {
      echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Name Already exists</label>';
    }else {
      echo '<label class="text-success"><span class="glyphicon glyphicon-ok"></span> Name Available</label>';
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

}
