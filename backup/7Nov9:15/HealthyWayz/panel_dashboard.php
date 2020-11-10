<?php 
	session_start();
	include"includes/config.php"; 
	if(!(isset($_SESSION['login_id'])) || ($_SESSION['role']=='Users')){
		header("location: index.php");
	}
	if($_SESSION['role']!='Admin'){
	    header("location: client_dashboard.php");			
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="images/favicon.png" type="image/png">

  <title>Gene-Thing | Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <style>
      
.bg-image {
  background-image: url("images/panel_bg.jpg");
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
  </style>
</head>

<body id="page-top" class="sidebar-toggled">
  <!-- navbar -->
  <?php include"includes/header.php"; ?>

  <div id="wrapper">

    <!-- Sidebar -->
    <?php include"includes/sidebar.php"; ?>

    <div id="content-wrapper" class="bg-image">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="panel_dashboard.php">Panel Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
          <!--<li class="breadcrumb-item">
            <a href="panel_create.php" class="btn  btn-primary text-light btn-sm"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Panel</a>
         </li>-->
        </ol>

        <!-- Page Content -->
        
        <div class="row">
          
    <?php if($_SESSION['role']=='Admin'){ ?>
         <!--   <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa fa-pizza-slice"></i>
                </div>
                <div class="mr-5">
            			Nutrition
		          </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="panel_nutrition.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-secondary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-ice-cream"></i>
                </div>
                <div class="mr-5">
            			Food Intolerance
		          </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          
          
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-dark bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-bicycle"></i>
                </div>
                <div class="mr-5">
            		Fitness
		          </div>
              </div>
              <a class="card-footer text-dark clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          
          
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-heartbeat"></i>
                </div>
                <div class="mr-5">
            			Health
		          </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-info o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-allergies"></i>
                </div>
                <div class="mr-5">
            			Skin
		          </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-cark bg-light o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-heading"></i>
                </div>
                <div class="mr-5">
            		 Hair
		          </div>
              </div>
              <a class="card-footer text-dark clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>-->
             <?php 
						$cnt=1;
						$qry = "select * from `panel_info`";
						$res = $conn->query($qry);
						while($row = $res->fetch_assoc()) {
						    
						    $bgcolor = "primary";
						    $txtcolor="dark";
						    //echo $cnt;
						    
						    if ($cnt % 7 == 0){ $bgcolor="secondary"; $txtcolor = "light";}
            						    elseif ($cnt % 6 == 0){ $bgcolor="dark"; $txtcolor="light";}
            						    elseif($cnt % 5 == 0){ $bgcolor = "info"; $txtcolor = "light";}
            						    elseif($cnt % 4 == 0){ $bgcolor = "danger"; $txtcolor = "light";}
            						    elseif($cnt % 3 == 0){ $bgcolor = "warning"; $txtcolor = "dark";}
            						    elseif($cnt % 2 == 0){ $bgcolor = "success"; $txtcolor = "light";}
            						    elseif($cnt == 1){ $bgcolor = "primary"; $txtcolor = "light";}
						    $cnt = $cnt +1;
						    
					?>	
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-cark bg-<?php echo "$bgcolor"; ?> text-<?php echo "$txtcolor"; ?> o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas <?php echo $row['fa_fa_icon']; ?>"></i>
                </div>
                <div class="mr-5">
            		 <?php echo $row['Name']; ?>
		          </div>
              </div>
              <a class="card-footer text-<?php echo "$txtcolor"; ?> clearfix small z-1" href="panel_details.php?id=<?php echo $row['id']; ?>">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
            </div>
            <?php }?>
    <?php }?>
        
       </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <?php include"includes/footer.php"; ?>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <!-- Logout Modal-->
  <?php include"includes/scroll-top.php"; ?>

  
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
  <script src="js/demo/datatables-demo.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

</body>

</html>
