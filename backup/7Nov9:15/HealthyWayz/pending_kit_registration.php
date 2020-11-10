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
			<i class="fa fa-users" aria-hidden="true"></i> Kit Registration Pending List
			
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable">
					<thead>
						<tr>
							<th>Sr. No.</th>
							<th>Barcode</th>
							<th>Awb No</th>
							<th>Mobile No</th>
							<th>Order Status</th>
							<th>Registration Status</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Sr. No.</th>
							<th>Barcode</th>
							<th>Awb No</th>	
							<th>Mobile No</th>
							<th>Order Status</th>
							<th>Registration Status</th>
						</tr>
					</tfoot>
					<tbody>
					<?php 
						$cnt=1;
						$qry = "select `login`.awb_number1,`login`.barcode,`login`.order_status,`login`.status,`login`.id,`login`.mobile_no ,
						`user_details`.user_id , `user_details`.address, `user_details`.city, `user_details`.country, `user_details`.pincode
						        from `login` left join `user_details` 
						        on `user_details`.user_id =`login`.id
						        where `login`.`role`='Users' 
						        order by `login`.`id` desc";
						$res = $conn->query($qry);
						while($row = $res->fetch_assoc()) {
						   if ($row['user_id']== ''){
					?>	<tr>
						<td><?php echo $cnt++; ?></td>
						<td><?php echo $row["barcode"]; ?></td>
						<td><?php echo $row["awb_number1"]; ?></td>
						<td><?php echo $row["mobile_no"]; ?></td>
						<td><?php echo $row["order_status"]; ?></td>
						<td><?php if ($row['user_id']== ''){echo "Not Registered";}else{ echo "Registration done ";}?></td>
						
						</tr>
					<?php 
						} 
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
  <div class="modal" id="addressModal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">

	      	<!-- Modal Header -->
		      <div class="modal-header">
    			<h4 class="modal-title"><i class="fa fa-address-card" aria-hidden="true"></i> Address</h4>
    			<button type="button" class="close" data-dismiss="modal">&times;</button>
		      </div>
		
	     	<!-- Modal body -->
		      <div class="modal-body">
		          <div><strong>Address: </strong> <span id ="address_model"></span></div>
		          <div><strong>City: </strong> <span id ="city_model"></span></div>
		          <div><strong>Country: </strong> <span id ="country_model"></span></div>
		          <div><strong>Pincode: </strong> <span id ="pincode_model"></span></div>
		      </div>

		      <!-- Modal footer -->
		      <div class="modal-footer">
			<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		      </div>


	    </div>
	  </div>
	</div>	
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
  $(document).on("click", ".open-addressModal", function () {
     $("#addressModal .modal-body #address_model").text( $(this).data('address') );
     $("#addressModal .modal-body #city_model").text( $(this).data('city') );
     $("#addressModal .modal-body #country_model").text( $(this).data('country') );
     $("#addressModal .modal-body #pincode_model").text( $(this).data('pincode') );
  });
  
 </script>
</body>

</html>