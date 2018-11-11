<?php
include'functions.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>ESforRPD2: Expert System for Rice Plant Disease Diagnosis</title>
<link rel="icon" href="unmul.png"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Bootstrap -->
<link href="assets/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="assets/css/style.css" rel='stylesheet' type='text/css' />
<link href="assets/css/carousel.css" rel='stylesheet' type='text/css' />
<link href="assets/css/login.css" rel="stylesheet" type="text/css" />
<!-- Font Google -->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<!-- FontAwesome -->
<link href="assets/font-awesome/css/font-awesome.css" rel='stylesheet' type='text/css' />
<!-- DataTables -->
<link rel="stylesheet" href="assets/DataTables-1.10.12/css/jquery.dataTables.min.css" type="text/css" />
<!-- Select2 -->
<link href="assets/select2/css/select2.min.css" rel="stylesheet" />
<!-- Sweet Alert-->
<link href="assets/sweetalert/sweetalert.css" rel="stylesheet" />
<!-- Javascript -->
<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</head>
  
<body>
	<!--start-main-->
    <div class="header">
		        <div class="header-top">
			        <div class="container">
						<div class="logo">
                            <img src="assets/images/index.png" style="float:left;" width="100" height="100">
                            <h1>ESforRPD2: Expert System for Rice Plant Disease Diagnosis</h1></a>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			
<!--head-bottom-->
<div class="head-bottom">
    <nav>
      <div class="container">
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <?php if($_SESSION[login]):?>
            <li><a href="?m=home"><span class="fa fa-home"></span> Home</a></li>
            <li><a href="?m=diagnosa"><span class="fa fa-thumb-tack"></span> Diagnosis</a></li>
            <li><a href="?m=gejala"><span class="fa fa-flash"></span> Gejala</a></li>
            <li><a href="?m=relasi"><span class="fa fa-star"></span> Relasi</a></li>            
            <li><a href="?m=konsultasi"><span class="fa fa-bar-chart"></span> Konsultasi</a></li>
            <li><a href="?m=about"><span class="fa fa-pencil"></span> About</a></li>
            <li><a href="?m=help"><span class="fa fa-question"></span> Help</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  <span class="fa fa-user"></span> Akun <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="?m=password"><span class="fa fa-key"> Ubah Kata Sandi</a></li>
				<li><a href="aksi.php?act=logout"><span class="fa fa-sign-out"> Logout</a></li>
              </ul>
            </li>
            <?php else:?>
            <li><a href="?m=home"><span class="fa fa-home"></span> Home</a></li>       
            <li><a href="?m=konsultasi"><span class="fa fa-bar-chart"></span> Konsultasi</a></li>
            <li><a href="?m=login"><span class="fa fa-sign-in"></span> Login</a></li>
            <li><a href="?m=about"><span class="fa fa-pencil"></span> About</a></li>
            <li><a href="?m=help"><span class="fa fa-question"></span> Help</a></li>  
            <?php endif?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
</div>
<!--head-bottom-->
</div>
    
    <?php
        if(file_exists($mod.'.php'))
            include $mod.'.php';
        else
            include 'home.php';
    ?>

<?php include('footer.php');?>