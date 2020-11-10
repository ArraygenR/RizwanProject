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
  
    <?php if($_SESSION['role']=='Users'){ ?>
  <style>
      .top {
    padding-top: 40px;
    padding-left: 13% !important;
    padding-right: 13% !important
}

#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    color: #455A64;
    padding-left: 0px;
    margin-top: 30px
}

#progressbar li {
    list-style-type: none;
    font-size: 13px;
    width: 25%;
    float: left;
    position: relative;
    font-weight: 400
}

#progressbar .step0:before {
    font-family: "Font Awesome 5 Free";
    font-weight: 100;
    content: "\f111";
    color: #fff;
}

#progressbar li:before {
    width: 40px;
    height: 40px;
    line-height: 45px;
    display: block;
    font-size: 20px;
    background: #8DB4CC;
    border-radius: 50%;
    margin: auto;
    padding: 0px
}

#progressbar li:after {
    content: '';
    width: 100%;
    height: 12px;
    background: #8DB4CC;
    position: absolute;
    left: 0;
    top: 16px;
    z-index: -1
}

#progressbar li:last-child:after {
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
    position: absolute;
    left: -50%
}

#progressbar li:nth-child(2):after,
#progressbar li:nth-child(3):after {
    left: -50%
}

#progressbar li:first-child:after {
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px;
    position: absolute;
    left: 50%
}

#progressbar li:last-child:after {
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px
}

#progressbar li:first-child:after {
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px
}

#progressbar li.active:before,
#progressbar li.active:after {
    background:  linear-gradient(to right, #007acc , #00bce9);/*#0070FF*/
}

#progressbar li.active:before {
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    content: "\f00c";
   
}

.icon {
    width: 60px;
    height: 60px;
    margin-right: 15px
}

.icon-content {
    padding-bottom: 20px
}

@media screen and (max-width: 992px) {
    .icon-content {
        width: 50%
    }
  </style>
    <?php } ?>
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
          <li class="breadcrumb-item active">Overview </li>
        </ol>

        <!-- Page Content -->
        
        <div class="row">
          
    <?php if($_SESSION['role']=='Users'){ ?>
    <?php   $qry = "select * from `login` where `login`.`id`=".$_SESSION['login_id'] ;
                        $res = $conn->query($qry);
                        $row = $res->fetch_assoc();
                        
                      //  echo $row['awb_number2'];
                        ?>
          <div class="col-sm-12">
              <div class="row d-flex justify-content-center">
                    <div class="col-12">
                        <ul id="progressbar" class="text-center">
                            <li class="active step0"></li>
                            <li class="<?php if(($row['order_status'] == 'Delivered' && $row['awb_number2'] != '') || ($row['order_status'] == 'Received' && $row['awb_number2'] != '') || ($row['order_status'] == 'Dispatched' && $row['awb_number2'] != '')) echo 'active'; ?> step0"></li>
                            <li class="<?php if(($row['order_status'] == 'Received' && $row['awb_number2'] != '') || ($row['order_status'] == 'Dispatched' && $row['awb_number2'] != '')) echo 'active'; ?> step0"></li>
                            <li class="<?php if( $row['order_status'] == 'Dispatched' && $row['awb_number2'] != '') echo 'active'; ?> step0"></li>
                        </ul>
                    </div>
                </div>
                <div class="row justify-content-between top">
                    
                    <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/HdsziHP.png">
                        <div class="d-flex flex-column">
                            <p class="font-weight-bold">In Route For<br>Sample Collection</p>
                        </div>
                    </div>
                    <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/TkPm63y.png">
                        <div class="d-flex flex-column">
                            <p class="font-weight-bold">Arriving<br>To Company</p>
                        </div>
                    </div>
                    <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/u1AzR7w.png">
                        <div class="d-flex flex-column">
                            <p class="font-weight-bold">Recieved<br>To Company</p>
                        </div>
                    </div>
                    <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/9nnc9Et.png">
                        <div class="d-flex flex-column">
                            <p class="font-weight-bold">Preocessing<br>In Lab</p>
                        </div>
                    </div>
                    
                </div>
         
          </div>
          
               <?php 
               if($row['order_status'] =='Dispatched'){
                   ?>
                   
                <div class="col-sm-12">
        		    <hr/>
        		</div>   
			    <?php	$cnt=1;
						$qry = "select `panel_info`.* from `panel_info` join `panel_details` on `panel_info`.Name = `panel_details`.panel where `panel_details`.user_id='".$_SESSION['login_id']."'";
						//echo $qry;
						
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
            <div  class="col-sm-12">
                <div class="card text-cark bg-<?php echo "$bgcolor"; ?> text-<?php echo "$txtcolor"; ?> o-hidden h-100">
                  <div class="card-body">
                    <div class="card-body-icon">
                      <i class="fas <?php echo $row['fa_fa_icon']; ?>"></i>
                    </div>
                    <div class="mr-4">
                        <a href= "user_panel_pdf.php?id=<?php echo $row['id']; ?>&download" class="btn btn-sm btn-outline-<?php echo $txtcolor; ?> text-<?php echo $txtcolor; ?>" ><i class="fa fa-download" aria-hidden="true"></i></a>
                            <?php echo $row['Name']; ?>
    		          </div>
                  </div>
                   <a class="card-footer text-<?php echo "$txtcolor"; ?> clearfix small z-1" href="user_dna_report.php?Name=<?php echo $row['Name']; ?>"> 
               <!--<a class="card-footer text-<?php echo "$txtcolor"; ?> clearfix small z-1" target="_blank" href="user_panel_pdf.php?id=<?php echo $row['id']; ?>">-->
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                      <i class="fas fa-angle-right"></i>
                    </span>
                  </a>
                </div>
            </div>
            <center>
                <br/>
                
            </center>
            </div>
            <?php } }?>
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
        $('.logoutModal').modal();
    </script>
</body>

</html>
