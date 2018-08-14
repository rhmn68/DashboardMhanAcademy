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
            Data Catalog
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data Catalog</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Catalog</h3>

                  <div class="box-tools pull-right">
                    <a href="<?php echo base_url('Ccatalog/catalog_index'); ?>"><button type="button" class="btn btn-primary">Add Catalog</button></a>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th style="width: 10px">No.</th>
                      <th>Title</th>
                      <th>Sub Title</th>
                      <th>Description</th>
                      <th style="width: 10px">Edit.</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($catalog as $key => $row): ?>
                      <tr id="hover" data-href='<?php echo base_url('Ccatalog/course_views/'.$row->CatalogID.'/'.$row->SubTitle);?>'>
                        <td><?php echo $key+1; ?></td>
                        <td><?php echo $row->Title; ?></td>
                        <td><?php echo $row->SubTitle; ?></td>
                        <td><?php echo $row->Description; ?></td>
                        <td>
                          <div class="btn">
                            <a href="<?php echo base_url('Ccatalog/delete_catalog/'.$row->CatalogID);?>"><button type="button" class="btn btn-danger btn-sm">Remove</button></a>
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
