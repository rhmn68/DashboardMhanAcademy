<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url();?>/assets/dashboard/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $this->session->userdata('name'); ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li >
        <a href="<?php echo base_url('Cteacher');?>">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-edit"></i> <span>Forms</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url('Cteacher/teacher_index');?>"><i class="fa fa-circle-o"></i> Teacher Input</a></li>
          <li><a href="<?php echo base_url('Cforms/user_index');?>"><i class="fa fa-circle-o"></i>User Input</a></li>
          <li><a href="<?php echo base_url('Ccatalog/catalog_index');?>"><i class="fa fa-circle-o"></i>Catalog Input</a></li>
          <li><a href="<?php echo base_url('Ccatalog/course_index');?>"><i class="fa fa-circle-o"></i>Course Input</a></li>
          <li><a href="<?php echo base_url('Ccatalog/content_index');?>"><i class="fa fa-circle-o"></i>Content Input</a></li>
          <li><a href="<?php echo base_url('Cforms/questions_index');?>"><i class="fa fa-circle-o"></i>Question Input</a></li>
          <li><a href="<?php echo base_url('Cforms/typeoftest_index');?>"><i class="fa fa-circle-o"></i>Type Of Test Input</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-table"></i> <span>Tables</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url('Cteacher/teacher_views');?>"><i class="fa fa-circle-o"></i> Teacher Tables</a></li>
          <li><a href="<?php echo base_url('Cteacher/teacher_views');?>"><i class="fa fa-circle-o"></i> User Tables</a></li>
          <li><a href="<?php echo base_url('Ccatalog/catalog_views');?>"><i class="fa fa-circle-o"></i> Catalog Tables</a></li>
          <li><a href="<?php echo base_url('Ccatalog/typeOfTest_views');?>"><i class="fa fa-circle-o"></i> Type of test Tables</a></li>
        </ul>
      </li>
      <li>
        <a href="pages/mailbox/mailbox.html">
          <i class="fa fa-envelope"></i> <span>Mailbox</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-yellow">12</small>
            <small class="label pull-right bg-green">16</small>
            <small class="label pull-right bg-red">5</small>
          </span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
