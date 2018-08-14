<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
    <style media="screen">

    </style>
    <?php require_once 'head.php'; ?>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php require_once 'header.php'; ?>

        <?php require_once 'leftSidebar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Classroom Forms
              <small>Preview</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="#">Forms</a></li>
              <li class="active">Classroom Forms</li>
            </ol>
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="row">
              <!-- right column -->
              <form  action="<?php echo base_url('Cteacher/input_catalog'); ?>" method="post" enctype="multipart/form-data">
                <div class="col-md-6" id="forms_table">
                  <!-- Horizontal Form -->
                  <!-- form start -->
                  <div id="table">
                        <div class="form-horizontal">
                          <div class="box box-info">
                            <!-- /.box-header -->
                            <div class="box-header">
                              <h3 class="box-title">Classroom Forms</h3>
                            </div>
                            <?php if ($this->session->flashdata('message')): ?>
                              <div class="alert alert-danger">
                                  <strong><?php echo $this->session->flashdata('message'); ?></strong>
                              </div>
                            <?php endif; ?>
                            <div class="box-body">
                              <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Name of Subject</label>

                                <div class="col-sm-10">
                                  <input type="hidden" name="teacherID" value="<?php echo $teacherID; ?>">
                                  <input type="text" class="form-control" id="nameCatalog" placeholder="Nama Mata Pelajaran" name="titleCatalog" required>
                                  <span id="nameCatalogResult"></span>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-10">
                                  <textarea  rows="8" cols="80" class="form-control" name="descCatalog" required></textarea>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Image</label>
                                <div class="col-sm-10">
                                  <input type="file" value="" name="imageCatalog" id="image" onchange="readURL(this)" required>
                                  <p class="help-block">Example block-level help text here.</p>
                                  <div class="image_preview"></div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Type of Subject</label>

                                <div class="col-sm-10">
                                  <select class="form-control select2" style="width: 100%;" name="typeOfCatalogID" required>
                                    <?php foreach ($typeofcatalog as $key => $row): ?>
                                      <option value="<?php echo $row->typeOfCatalogID; ?>"><?php echo $row->nameTypeOfCatalog; ?> (<?php echo $row->nickNameTypeOfCatalog; ?>)</option>
                                    <?php endforeach; ?>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                              <button type="reset" class="btn btn-default">Reset</button>
                              <button type="submit" class="btn btn-info pull-right" name="Submit" id="submit">Submit</button>
                            </div>
                            <!-- /.box-footer -->
                          </div>
                        </div>


                  </div>
                </div>
                </form>
              <!--/.col (right) -->
            </div>
            <!-- /.row -->
          </section>
          <!-- /.content -->
        </div>

        <?php require_once 'footer.php'; ?>

        <?php require_once 'rightSidebar.php'; ?>
    </div>
    <?php require_once 'script.php'; ?>
    <script>
      $('#nameCatalog').keyup(function(event) {
        var nameCatalog = $('#nameCatalog').val();
        if (nameCatalog != '') {
          $.ajax({
            url:"<?php echo base_url(); ?>cteacher/check_catalog",
            method:"POST",
            data:{titleCatalog:nameCatalog},
            success:function(data){
              $('#nameCatalogResult').html(data);
            }
          });
        }else {

        }
      });

      function readURL(input) {
      $('#previewLoad').show();
        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
            $('.image_preview').html('<img src="'+e.target.result+'" alt="'+reader.name+'" class="img-thumbnail" width="304" height="236"/>');
          }

          reader.readAsDataURL(input.files[0]);
          $('#previewLoad').hide();
        }
      }
    </script>
  </body>
</html>
