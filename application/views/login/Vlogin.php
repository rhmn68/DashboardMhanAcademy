<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Random Login Form</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/dashboard/bower_components/bootstrap/dist/css/bootstrap.min.css">

  <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      @import url(https://fonts.googleapis.com/css?family=Exo:100,200,400);
      @import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);

      body{
      	margin: 0;
      	padding: 0;
      	background: #fff;

      	color: #fff;
      	font-family: Arial;
      	font-size: 12px;
      }

      .body{
      	position: absolute;
      	top: -20px;
      	left: -20px;
      	right: -40px;
      	bottom: -40px;
      	width: auto;
      	height: auto;
      	background-image: url(https://timryan.house.gov/sites/timryan.house.gov/files/styles/congress_featured_image/public/featured_image/issues/Education-OpportunitySmall.jpg?itok=4TOUyO9s);
      	background-size: cover;
      	-webkit-filter: blur(5px);
      }

      .grad{
      	position: absolute;
      	top: -20px;
      	left: -20px;
      	right: -40px;
      	bottom: -40px;
      	width: auto;
      	height: auto;
      	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0)), color-stop(100%,rgba(0,0,0,0.65))); /* Chrome,Safari4+ */
      	opacity: 0.7;
      }

      .header{
      	position: absolute;
      	top: calc(50% - 35px);
      	left: calc(50% - 255px);
      }

      .header div{
      	float: left;
      	color: #fff;
      	font-family: 'Exo', sans-serif;
      	font-size: 35px;
      	font-weight: 200;
      }

      .header div span{
      	color: #5379fa !important;
      }

      .login {
      	position: absolute;
      	top: calc(50% - 75px);
      	left: calc(50% - 50px);
      	height: 150px;
      	width: 350px;
      	padding: 10px;
      	z-index: 2;
      }

      .login input[type=text]{
      	width: 260px;
      	height: 40px;
      	background: transparent;
      	border: 1px solid rgba(255,255,255,0.6);
      	border-radius: 2px;
      	color: #fff;
      	font-family: 'Exo', sans-serif;
      	font-size: 16px;
      	font-weight: 400;
      	padding: 8px;
      }

      .login input[type=password]{
      	width: 260px;
      	height: 40px;
      	background: transparent;
      	border: 1px solid rgba(255,255,255,0.6);
      	border-radius: 2px;
      	color: #fff;
      	font-family: 'Exo', sans-serif;
      	font-size: 16px;
      	font-weight: 400;
      	padding: 8px;
      	margin-top: 10px;
      }

      .login input[type=submit]{
      	width: 260px;
      	height: 35px;
      	background: #fff;
      	border: 1px solid #fff;
      	cursor: pointer;
      	border-radius: 2px;
      	color: #a18d6c;
      	font-family: 'Exo', sans-serif;
      	font-size: 16px;
      	font-weight: 400;
      	padding: 6px;
      	margin-top: 10px;
      }

      .login input[type=submit]:hover{
      	opacity: 0.8;
      }

      .login input[type=submit]:active{
      	opacity: 0.6;
      }

      .login input[type=text]:focus{
      	outline: none;
      	border: 1px solid rgba(255,255,255,0.9);
      }

      .login input[type=password]:focus{
      	outline: none;
      	border: 1px solid rgba(255,255,255,0.9);
      }

      .login input[type=submit]:focus{
      	outline: none;
      }

      ::-webkit-input-placeholder{
         color: rgba(255,255,255,0.6);
      }

      ::-moz-input-placeholder{
         color: rgba(255,255,255,0.6);
      }
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body>

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
        </div>
        <div class="modal-body">
          <div class="alert alert-danger">
            <strong>Username or Password Wrong!!!</strong>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<div>Site<span>Random</span></div>
		</div>
		<br>
    <form class="login" action="<?php echo base_url('cauth/login'); ?>" method="post">
				<input type="text" placeholder="username" name="username"><br>
				<input type="password" placeholder="password" name="password"><br>
				<input type="submit" value="Login">
		</form>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <!-- jQuery 3 -->
  <script src="<?php echo base_url();?>/assets/dashboard/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url();?>/assets/dashboard/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

  <?php if ($this->session->flashdata('message')): ?>
    <script>
      $('#myModal').modal('show');
    </script>
  <?php endif; ?>

</body>

</html>
