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
            Data Kelas
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('cteacher') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Kelas</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Kelas</h3>

                  <div class="box-tools pull-right">
                    <a href="<?php echo base_url('Cteacher/forms_catalog/'.$teacherID); ?>"><button type="button" class="btn btn-success">Add Subject</button></a>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>Subject Name</th>
                      <th>Description</th>
                      <th>Type Of Subject</th>
                      <th>Created</th>
                      <th style="width: 10px">Edit.</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($catalog as $key => $value): ?>
                    <tr>
                      <td><?php echo $key+1; ?></td>
                      <td><?php echo $value->titleCatalog; ?></td>
                      <td><?php echo $value->descCatalog; ?></td>
                      <td><?php echo $value->nickNameTypeOfCatalog; ?></td>
                      <td><?php echo $value->createdCatalog; ?></td>
                      <td>
                        <div class="btn">
                          <a href="<?php echo base_url('Cteacher/teacher_edit/'.$value->catalogID);?>" class="btn btn-success btn-sm">Edit</a>
                          &nbsp;
                          <a href="<?php echo base_url('Cteacher/delete_catalog/'.$value->catalogID.'/'.$value->teacherID);?>" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure ?')">Remove</a>
                        </div>
                      </td>
                    </tr>
                    <?php endforeach; ?>
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
    <?php if ($this->session->flashdata('message')): ?>
      <script>
        alert('Data kelas berhasil ditambahkan!!!');
      </script>
    <?php else: ?>
      <?php echo "" ?>
    <?php endif; ?>
  </body>
</html>
