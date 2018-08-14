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
              <form  action="<?php echo base_url('Cteacher/input_classroom'); ?>" method="post">
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
                                <label for="inputEmail3" class="col-sm-2 control-label">Nama Kelas</label>

                                <div class="col-sm-10">
                                  <input type="hidden" name="teacherID" value="<?php echo $teacherID; ?>">
                                  <input type="text" class="form-control" id="nameClassRoom" placeholder="Nama Kelas" name="nameClassRoom" required>
                                  <span id="nameClassResult"></span>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Mata Pelajaran</label>

                                <div class="col-sm-10">
                                  <select class="form-control select2" style="width: 100%;" name="catalogID">
                                    <?php foreach ($catalog as $key => $row): ?>
                                      <option value="<?php echo $row->catalogID; ?>"><?php echo $row->titleCatalog; ?></option>
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
      $('#nameClassRoom').keyup(function(event) {
        var nameClassRoom = $('#nameClassRoom').val();
        if (nameClassRoom != '') {
          $.ajax({
            url:"<?php echo base_url(); ?>cteacher/check_classroom",
            method:"POST",
            data:{nameClassRoom:nameClassRoom},
            success:function(data){
              $('#nameClassResult').html(data);
            }
          });
        }else {
          
        }
      });
    </script>
  </body>
</html>
