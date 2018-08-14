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
              <form id="form_text" action="<?php echo base_url('Ccatalog/input_content/'.$CourseID); ?>" method="post" enctype="multipart/form-data">

              <input type="hidden" name="CourseID" value="">
                <!-- Horizontal Form -->
                <div class="col-md-6" id="forms_table">
                <!-- form start -->
                  <div class="form-horizontal">
                    <div class="box box-info">
                      <!-- /.box-header -->
                      <div class="box-header">
                        <h3 class="box-title">Course Form</h3>

                        <div class="box-tools pull-right">
                            <button id="gone" type="button" class="btn btn-danger btn-sm"><i class="fa fa-times"></i>
                            </button>
                        </div>
                      </div>

                      <div class="box-body">
                        <input type="hidden" name="Page[]" value="" id="page">
                        <input type="hidden" name="ContentIndex[]" value="" id="contentIndex">
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Catalog</label>
                          <div class="col-sm-10">
                            <select class="form-control select2" style="width: 100%;" disabled>
                              <?php foreach ($course as $key => $row): ?>
                                <option value="<?php echo $row->CatalogID; ?>"><?php echo $row->SubTitle; ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                          <?php foreach ($course as $key => $row): ?>
                            <input type="hidden" name="CatalogID[]" value="<?php echo $row->CatalogID; ?>">
                            <input type="hidden" name="CourseID[]" value="<?php echo $row->CourseID; ?>">
                          <?php endforeach; ?>
                        </div>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Course</label>
                          <div class="col-sm-10">
                            <select class="form-control select2" style="width: 100%;" disabled>
                              <?php foreach ($course as $key => $row): ?>
                                <option value=""><?php echo $row->Title; ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Type</label>
                          <div class="col-sm-10">
                            <input type="text" value="Text" class="form-control" disabled>
                            <input type="hidden" name="Type[]" value="Text" class="form-control">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Text</label>
                          <div class="col-sm-10">
                            <textarea  rows="8" cols="80" class="form-control" name="Text[]"></textarea>
                          </div>
                        </div>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer">
                        <button type="submit" class="btn btn-default">Reset</button>
                        <button type="submit" class="btn btn-info pull-right" name="Submit" id="submit" value="Submit">Submit</button>
                      </div>
                      <!-- /.box-footer -->
                    </div>
                  </div>
                </div>
              </form>
            </div>

            <div class="row">
              <!-- right column -->
              <div class="col-md-6">
                <div class="box box-default">
                  <div class="box-header with-border">
                    <label for="inputEmail3" class="col-sm-1 control-label">Type</label>
                    <div class="col-sm-6">
                      <select class="form-control select2" style="width: 100%;" name="" id="data_type">
                        <option value="Text">Text</option>
                        <option value="Image">Image</option>
                        <option value="Video">Video</option>
                        <option value="Question">Question</option>
                      </select>
                    </div>
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
        var contex_text = '<input type="hidden" name="Page[]" value="" id="page"> <input type="hidden" name="ContentIndex[]" value="" id="contentIndex"><div class="form-horizontal"> <div class="box box-info"> <!-- /.box-header --> <div class="box-header"> <h3 class="box-title">Course Form</h3> <div class="box-tools pull-right"> <button id="gone" type="button" class="btn btn-danger btn-sm" data-widget="remove"><i class="fa fa-times"></i> </button> </div> </div> <div class="box-body"> <div class="form-group"> <label for="inputEmail3" class="col-sm-2 control-label">Catalog</label> <div class="col-sm-10"> <select class="form-control select2" style="width: 100%;" disabled> <?php foreach ($course as $key => $row): ?> <option value="<?php echo $row->CatalogID; ?>"><?php echo $row->SubTitle; ?></option> <?php endforeach; ?> </select> </div> <?php foreach ($course as $key => $row): ?> <input type="hidden" name="CatalogID[]" value="<?php echo $row->CatalogID; ?>"> <?php endforeach; ?> </div> <div class="form-group"> <label for="inputEmail3" class="col-sm-2 control-label">Course</label> <div class="col-sm-10"> <select class="form-control select2" style="width: 100%;" name="CourseID[]"> <?php foreach ($course as $key => $row): ?> <option value="<?php echo $row->CourseID;?>"><?php echo $row->Title; ?></option> <?php endforeach; ?> </select> </div> </div> <div class="form-group"> <label for="inputEmail3" class="col-sm-2 control-label">Type</label> <div class="col-sm-10"><input type="text" value="Text" class="form-control" disabled> <input type="hidden" name="Type[]" value="Text" class="form-control"> </div> </div> <div class="form-group"> <label for="inputEmail3" class="col-sm-2 control-label">Text</label> <div class="col-sm-10"> <textarea rows="8" cols="80" class="form-control" name="Text[]"></textarea> </div> </div> </div> <!-- /.box-body --> <div class="box-footer"> <button type="submit" class="btn btn-default">Reset</button> <button type="submit" class="btn btn-info pull-right" name="Submit" id="submit" value="Submit">Submit</button> </div> <!-- /.box-footer --> </div> </div>';

        var contex_image = '<input type="hidden" name="Page[]" value="" id="page"> <input type="hidden" name="ContentIndex[]" value="" id="contentIndex"><div class="form-horizontal"> <div class="box box-info"> <!-- /.box-header --> <div class="box-header"> <h3 class="box-title">Course Form</h3> <div class="box-tools pull-right"> <button id="gone" type="button" class="btn btn-danger btn-sm" data-widget="remove"><i class="fa fa-times"></i> </button> </div> </div> <div class="box-body"> <div class="form-group"> <label for="inputEmail3" class="col-sm-2 control-label">Catalog</label> <div class="col-sm-10"> <select class="form-control select2" style="width: 100%;" disabled> <?php foreach ($course as $key => $row): ?> <option value="<?php echo $row->CatalogID; ?>"><?php echo $row->SubTitle; ?></option> <?php endforeach; ?> </select> </div> <?php foreach ($course as $key => $row): ?> <input type="hidden" name="CatalogID[]" value="<?php echo $row->CatalogID; ?>"> <?php endforeach; ?> </div> <div class="form-group"> <label for="inputEmail3" class="col-sm-2 control-label">Course</label> <div class="col-sm-10"> <select class="form-control select2" style="width: 100%;" name="CourseID[]"> <?php foreach ($course as $key => $row): ?> <option value="<?php echo $row->CourseID;?>"><?php echo $row->Title; ?></option> <?php endforeach; ?> </select> </div> </div> <div class="form-group"> <label for="inputEmail3" class="col-sm-2 control-label">Type</label> <div class="col-sm-10"> <input type="text" value="Image" class="form-control" disabled> <input type="hidden" name="Type[]" value="Image" class="form-control"> </div> </div> <div class="form-group"> <label for="inputEmail3" class="col-sm-2 control-label">Image</label> <div class="col-sm-10"> <input type="file" value="" name="Image[]"id="image" onchange="readURL(this)"> <p class="help-block">Example block-level help text here.</p> <div class="image_preview"></div> </div> </div> </div> <!-- /.box-body --> <div class="box-footer"> <button type="submit" class="btn btn-default">Reset</button> <button type="submit" class="btn btn-info pull-right" name="Submit" id="submit" value="Submit">Submit</button> </div> <!-- /.box-footer --> </div> </div>';
        var gone = $("#gone");
        var count = 1;
        var maxForms = 15;
        //add table

        $("button#add").click(function(){
          if (count <= maxForms) {
            var data = $("select#data_type").val();
            if (data == "Text") {
              $("#forms_table").append(contex_text);
            }else if (data == "Image") {
              $("#forms_table").append(contex_image);
            }
            count++;
          }else {
            alert('Maximum Forms');
          }
        });

        $("#forms_table").on('click', '#gone', function(e) {
            $(this).parent('div').parent('div').parent('div').remove();
            count--;
        });
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
