<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
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
              <div class="col-md-6">
                <!-- Horizontal Form -->
                <div class="box box-info">
                  <div class="box-header with-border">
                    <h3 class="box-title">Teacher Form</h3>
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                  <form class="form-horizontal" action="<?php echo base_url('cteacher/input_teacher'); ?>" method="post">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="inputText3" class="col-sm-2 control-label">Name</label>

                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputEmail3" placeholder="Name" name="Name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputPassword3" placeholder="Email" name="Email">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Username</label>

                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputPassword3" placeholder="username" name="Username">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="Password">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Confirm Password</label>

                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="inputPassword3" placeholder="Confirm Password" name="ConfirmPassword">
                        </div>
                      </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                      <button type="submit" class="btn btn-default">Reset</button>
                      <button type="submit" class="btn btn-info pull-right">Submit</button>
                    </div>
                    <!-- /.box-footer -->
                  </form>
                </div>
              </div>
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
  </body>
</html>
