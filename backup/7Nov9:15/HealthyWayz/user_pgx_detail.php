<?php 
	session_start();
	include"includes/config.php"; 
	if(!(isset($_SESSION['login_id']))){
		header("location: index.php");
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

.report_table tbody tr {
    box-shadow: 0px 1px 5px rgba(162, 196, 234, 0.4);
    -webkit-box-shadow: 0px 1px 5px rgba(162, 196, 234, 0.4);
}
  </style>
</head>

<body id="page-top" class="sidebar-toggled">
  <!-- navbar -->
  <?php include"includes/header.php"; ?>

  <div id="wrapper">

    <!-- Sidebar -->
    <?php include"includes/sidebar.php"; ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="dashboard.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">PGx Detailed Report</li>
        </ol>


               <!-- Page Content -->
        <?php if($_SESSION['role']=='Users'){ ?>
             <div class="row">
                <div class="col-md-12">
                  <div class="card mb-3">
            		<div class="card-header">
            			<img src="images/user_panel/pgx_report.png"> PGx Detailed Report
            		</div>
            		<div class="card-body">
            		
            		
            		
            		
            		
            		
            		
            		
            		<h5>Normal Metabolizer</h5>
            		<div class="card card-default">
        <div class="card-body">
            
            		<span style="min-width: 220px;border-radius: 20px;" class="btn btn-sm bg-secondary text-light float-right mb-3">Normal Metabolizer</span>
            		
            		<br/>
            			<br/>
            		<div class="row clear">
            <div class="col-sm-3">
              <span class="font-weight-bolder">Category</span>
              <p>Cannabinoid</p>
            </div>
            <div class="col-sm-3">
              <span class="font-weight-bolder">Drug</span>
              <p>Dronabinol</p>
            </div>
            <div class="col-sm-3">
              <span class="font-weight-bolder">Genetic Variants</span>
                              <p>CYP2C9:*1/*1</p>
                          </div>
            <div class="col-sm-3 text-center">
              <span class="font-weight-bolder">Scientific Actions</span>
                              <p><img src="https://thegenebox.com/assets/dashboard/images/normal_meta.png" width="40px">&nbsp; Consume</p>
                          </div>
          </div>
           </div>
    </div>	 		
       <br/>     		
      <div class="card card-default">
        <div class="card-body">
          <div>
            <h6 class="font-weight-bolder">Detail Information</h6>
            <p></p>
          </div>
                  </div>
      </div>	
            		
            		
            		
            		
            		
            		
            	</div>
               </div>
             </div>      
             <?php } ?>
        </div>
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
<script>

$('#myCarousel').on('slid.bs.carousel', function(e) {//attach its event
    var current=$(e.target).find('.carousel-item.active'); //get the current active slide
    $('.carousel li').removeClass('active') //remove active class from all the li of carousel indicator
    var indx=$(current).index(); //get its index
    indx = indx+1
    $('.carousel ul li:nth-child('+indx+')').addClass('active');//set the respective indicator active

});

</script>
</body>

</html>
