<?php
	session_start();
	include"message_api_exec.php";
	include"includes/config.php"; 
	if(!(isset($_SESSION['login_id']))){
		header("location: index.php");
	}
	
	if($_SESSION['role']!='Admin'){
		header("location: dashboard.php");
	}
	
	if(isset($_POST['submit']))
    {
    	$count=count($_POST["id"]);
        for($i=0;$i<$count;$i++){
            $sql="UPDATE `login` SET order_status='" . $_POST['order_status'][$i] . "' WHERE id='" . $_POST['id'][$i] . "'";
            
            if( $_POST['order_status'][$i] == 'Delivered'){
                $qry = "select * from login where id='".$_POST['id'][$i]."'";
                $res = $conn->query($qry);
                if($res->num_rows != 0)
                {
                   // echo  $_POST['order_status'][$i]; 
                    $row = $res->fetch_assoc();
                    $url="http://m1.sarv.com/api/v2.0/sms_campaign.php?token=286180875f842dabd37c50.24771892&user_id=47729449&route=TR&template_id=3118&sender_id=PHWAYZ&language=EN&template=Dear+Customer%2C+your+GeneThing+kit+has+been+delivered.+Please+register+on+www.genething.com+with+required+details.+Regards+Gene-thing+by+Healthywayz.&contact_numbers=".$row['mobile_no']."";
                    sendSMS($url);
                }
            }
            $conn->query($sql);
        }
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
          <li class="breadcrumb-item active">Order</li>
          
        </ol>
   
       <form method ="post" >

	<!-- DataTables Example -->
	<div class="card mb-3">
		<div class="card-header">
			<i class="fa fa-shopping-cart" aria-hidden="true"></i> In Transit Report
			<span class="float-right"> <button type="submit" name="submit" class="btn btn-sm btn-warning">Update Status</button></span>
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
						        where `login`.`role`='Users' and `login`.`order_status` = 'Not delivered' or `login`.`order_status` = ''
						        order by `login`.`id` desc";
						$res = $conn->query($qry);
						while($row = $res->fetch_assoc()) {
					?>	<tr>
						<td><?php echo $cnt++; ?></td>
						<td><?php echo $row["barcode"]; ?></td>
						<td><?php echo $row["awb_number1"]; ?></td>
						<td><?php echo $row["mobile_no"]; ?></td>
						<td>
						     <div class="form-group">
                              <select class="form-control" id="order_status" name ="order_status[]" reuired>
                                <option value="">--Select Status--</option>
                                <option value="Not delivered " <?php if($row["order_status"]=="Not delivered ") echo"selected";  ?>>Not delivered</option>
                                <option value="Delivered" <?php if($row["order_status"]=="Delivered") echo"selected";  ?>>Delivered</option>
                              </select>
                            </div> 
                            <input type="hidden" name ="id[]" value=<?php echo $row['id']; ?>>
						</td>
						<td><?php if ($row['user_id']== ''){echo "Not Registered";}else{ echo "Registration done ";}?></td>
					
						</tr>
					<?php 
						} 

					?>
					</tbody>
				</table>
			</div>

		</div>
	</div>
	</form>
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