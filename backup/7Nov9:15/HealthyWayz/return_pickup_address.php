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
  <title>Gene-Thing </title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

  <script type="text/javascript">
    function Validate() {
        var password = document.getElementById("inputPassword").value;
        var confirmPassword = document.getElementById("inputConfirmPassword").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
  </script>
  <style>
 .label_file {
cursor: pointer;
color: #fff;
background-color: #007bff;
border-color: #007bff;
padding: 0.25rem 0.5rem;
font-size: 0.875rem;
line-height: 1.5;
border-radius: 0.2rem;
}

#upload-photo {
   opacity: 0;
   position: absolute;
   z-index: -1;
}

 .label_file1 {
cursor: pointer;
color: #fff;
background-color: #007bff;
border-color: #007bff;
padding: 0.25rem 0.5rem;
font-size: 0.875rem;
line-height: 1.5;
border-radius: 0.2rem;
}

#upload-photo1 {
   opacity: 0;
   position: absolute;
   z-index: -1;
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
          <li class="breadcrumb-item active">Orders</li>
          
        </ol>
   

	<!-- DataTables Example -->
	<div class="card mb-3">
		<div class="card-header">
			<i class="fa fa-truck" aria-hidden="true"></i> Return Pickup List with Address
		
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable">
					<thead>
						<tr>
							<th>Sr. No.</th>
							<th>Name</th>
							<th>Barcode</th>
							<th>Address</th>
							<th>City</th>
							<th>County</th>
							<th>Pincode</th>
							<th>Mobile No</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Sr. No.</th>
							<th>Name</th>
							<th>Barcode</th>
							<th>Address</th>
							<th>City</th>
							<th>County</th>
							<th>Pincode</th>	
							<th>Mobile No</th>
						</tr>
					</tfoot>
					<tbody>
					<?php 
						$cnt=1;
						$qry = "select `login`.awb_number1,`login`.barcode,`login`.order_status,`login`.status,`login`.id,`login`.mobile_no ,`user_details`.name ,
						`user_details`.user_id , `user_details`.address, `user_details`.city, `user_details`.country, `user_details`.pincode
						        from `login` inner join `user_details` 
						        on `user_details`.user_id =`login`.id
						        where `login`.`role`='Users' and (`login`.awb_number2 IS NULL or `login`.awb_number2='')
						        order by `login`.`id` desc";
						$res = $conn->query($qry);
						while($row = $res->fetch_assoc()) {
					?>	<tr>
						<td><?php echo $cnt++; ?></td>
						<td><?php echo $row["name"]; ?></td>
						<td><?php echo $row["barcode"]; ?></td>
						<td><?php echo $row["address"]; ?></td>
						<td><?php echo $row["city"]; ?></td>
						<td><?php echo $row["country"]; ?></td>
						<td><?php echo $row["pincode"]; ?></td>
						<td><?php echo $row["mobile_no"]; ?></td>
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
  <script src="js/sb-admin.min.js"></script>
  
</body>

</html>