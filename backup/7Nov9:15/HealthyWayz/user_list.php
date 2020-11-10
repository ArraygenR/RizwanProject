<?php
	session_start();
	include"includes/config.php"; 
	if(!(isset($_SESSION['login_id']))){
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
  <title>Gene-Thing</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

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
          <li class="breadcrumb-item active">All Users</li>
        </ol>

        <!-- Page Content -->
   
	<!-- DataTables Example -->
	<div class="card mb-3">
		<div class="card-header">
			<i class="fas fa-graduation-cap"></i> Users Account Details
		</div>
		<div class="card-body">
		<?php if(isset($_GET['delete'])){ 
		?>
			<div class="col-md-8 alert alert-success">
			 Record is Deleted Successfully
			 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			 </button>
			</div>
		<?php
			}
		?>
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable">
					<thead>
						<tr>
							<th>Sr. No.</th>
							<th>Barcode</th>
							<th>Name</th>
							<th>Panel</th>
							<th>Contact No</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$cnt=1;
						$qry = "select `login`.uname,`login`.role ,`login`.barcode ,`login`.status,`login`.id,`user_details`.name ,  
						GROUP_CONCAT( DISTINCT `panel_details`.panel) as panel, `user_details`.contact_no 
						        from `login` left join `user_details` 
						        on `user_details`.user_id=`login`.id left join `panel_details` on `panel_details`.user_id=`login`.id 
						        where `login`.`role`='Users' group by `login`.id
						        order by `login`.`id` desc";
						//echo $qry;        
						$res = $conn->query($qry);
						while($row = $res->fetch_assoc()) {
					?>	<tr>
						<td><?php echo $cnt++; ?></td>
						<td><?php echo $row["barcode"]; ?></td>
						<td><?php echo $row["name"]; ?></td>
						<td><?php echo $row["panel"]; ?></td>
						<td><?php echo $row["contact_no"]; ?></td>
						<td>
							<a href="#" data-toggle="tooltip" title="View More Info of User">		
								<i class="fa fa-eye" aria-hidden="true"></i>
							</a>&nbsp;
						</td>
						</tr>
					<?php 
						} 

					?>
					</tbody>
				</table>
			</div>
	
		</div>
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
  <script src="js/sb-admin.min.js"></script>=
</body>

</html>