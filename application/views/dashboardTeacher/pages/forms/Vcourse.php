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
              General Form Elements
              <small>Preview</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="#">Forms</a></li>
              <li class="active">Teacher Form</li>
            </ol>
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="row">
              <!-- right column -->
              <form  action="<?php echo base_url('Ccatalog/input_course'); ?>" method="post">
                <div class="col-md-6" id="forms_table">
                  <!-- Horizontal Form -->
                  <!-- form start -->
                  <div id="table">


                        <div class="form-horizontal">
                          <div class="box box-info">
                            <!-- /.box-header -->
                            <div class="box-header">
                              <h3 class="box-title">Course Form</h3>

                              <div class="box-tools pull-right">
                                  <!-- <button id="gone" type="button" class="btn btn-danger btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                                  </button> -->
                              </div>
                            </div>

                            <div class="box-body">
                              <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Catalog</label>
                                <div class="col-sm-10">
                                  <select class="form-control select2" style="width: 100%;" name="CatalogID[]">
                                    <?php foreach ($catalog as $row): ?>
                                      <option value="<?php echo $row->CatalogID;?>"><?php echo $row->SubTitle; ?></option>
                                    <?php endforeach; ?>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Title</label>

                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="inputPassword3" placeholder="Title" name="Title[]">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Image</label>

                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="inputPassword3" placeholder="Image" name="Image[]">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Progress</label>

                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="inputPassword3" placeholder="Progress" name="Progress[]">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Description</label>

                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="inputPassword3" placeholder="Description" name="Description[]">
                                </div>
                              </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                              <button type="submit" class="btn btn-default">Reset</button>
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

            <div class="row">
              <!-- right column -->
              <div class="col-md-6">
                <div class="box box-default">
                  <div class="box-header with-border">
                    <h3 class="box-title">Add Forms</h3>

                    <div class="box-tools pull-right">
                      <button id="add" type="button" class="btn btn-success"><i class="fa fa-plus"></i></button>
                    </div>
                    <!-- /.box-tools -->
                  </div>
                  <!-- /.box-header -->
                </div>
                <!-- /.box -->
              </div>
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
      $(document).ready(function() {
        //variabels
        var html = $("#table");
        var contex = '<div class="form-horizontal"><div class="box box-info"><div class="box-header"><h3 class="box-title">Course Form</h3><div class="box-tools pull-right"><button id="gone" type="button" class="btn btn-danger btn-sm" data-widget="remove"><i class="fa fa-times"></i></button></div></div><div class="box-body"><div class="form-group"><label for="inputEmail3" class="col-sm-2 control-label">Catalog</label><div class="col-sm-10"><select class="form-control select2" style="width: 100%;" name="CatalogID[]"><?php foreach ($catalog as $row): ?><option value="<?php echo $row->CatalogID;?>"><?php echo $row->SubTitle; ?></option><?php endforeach; ?></select></div></div><div class="form-group"><label for="inputEmail3" class="col-sm-2 control-label">Title</label><div class="col-sm-10"><input type="text" class="form-control" id="inputPassword3" placeholder="Title" name="Title[]"></div></div><div class="form-group"><label for="inputPassword3" class="col-sm-2 control-label">Image</label><div class="col-sm-10"><input type="text" class="form-control" id="inputPassword3" placeholder="Image" name="Image[]"></div></div><div class="form-group"><label for="inputPassword3" class="col-sm-2 control-label">Progress</label><div class="col-sm-10"><input type="text" class="form-control" id="inputPassword3" placeholder="Progress" name="Progress[]"></div></div><div class="form-group"><label for="inputPassword3" class="col-sm-2 control-label">Description</label><div class="col-sm-10"><input type="text" class="form-control" id="inputPassword3" placeholder="Description" name="Description[]"></div></div></div><div class="box-footer"><button type="submit" class="btn btn-default">Reset</button><button type="submit" class="btn btn-info pull-right" name="Submit" id="submit">Submit</button></div></div></div>';
        var gone = $("#gone");
        //add table
          $("button#add").click(function(){
            $("#forms_table").append(contex);
          });

          $("#forms_table").on('click', '#gone', function() {
            $(this).parent('div').parent('div').parent('div').remove();
          });


      });
    </script>
  </body>
</html>
