<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
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
            Data Teacher
            <small>SMKN 1 CIMAHI</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data Teacher</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Teacher</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th style="width: 10px">No.</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Username</th>
                      <th style="width: 10px">Edit.</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($teacher as $key => $row): ?>
                      <tr>
                        <td style="display:none" id="idTeacher"><?php echo $row->TeacherID; ?></td>
                        <td><?php echo $key+1; ?></td>
                        <td><?php echo $row->Name; ?></td>
                        <td><?php echo $row->Email; ?></td>
                        <td><?php echo $row->Username; ?></td>
                        <td>
                          <div class="btn">
                            <a href="<?php echo base_url('Cteacher/teacher_edit/'.$row->TeacherID);?>"><button type="button" class="btn btn-success btn-sm">Edit</button></a>
                            &nbsp;
                            <a href="<?php echo base_url('Cteacher/delete_teacher/'.$row->TeacherID);?>"><button type="button" class="btn btn-danger btn-sm">Remove</button></a>
                          </div>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
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
