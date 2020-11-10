<?php
	session_start();
	include"message_api_exec.php";
	include"includes/config.php"; 
	if(!(isset($_SESSION['login_id']))){
		header("location: index.php");
	}
	
	if($_SESSION['role']!='Admin'){
	    header("location: client_dashboard.php");			
	}
    if(isset($_POST['acount_create'])){
		    
                    if(isset($_GET['id'])){
		        
		                $sql = "UPDATE `login` SET  `barcode` ='".$_POST['barcode']."', `order_id` = '".$_POST['order_id']."', `mobile_no`='".$_POST['mobile_no']."', `awb_number1` ='".$_POST['awb_number1']."' WHERE `id` = '".$_GET['id']."'";
            				//echo $sql;
            		    if ($conn->query($sql) === TRUE) {
            				$msg= "record Updated successfully";
            				   header("location: barcode.php");
            			}
		        
		           }else{       
                        $qry = "select * from login where (mobile_no='".$_POST['mobile_no']."' and barcode = '".$_POST['barcode']."') or (mobile_no !='' and barcode = '".$_POST['barcode']."')";
                        $res = $conn->query($qry);
                        if($res->num_rows == 0)
                        {	
                            
                            
            				$sql = "INSERT INTO `login` (`id`,  `barcode`, `order_id`, `mobile_no`, `awb_number1`, `role`, `date`) VALUES (NULL,'".$_POST['barcode']."', '".$_POST['order_id']."' , '".$_POST['mobile_no']."' ,'".$_POST['awb_number1']."', 'Users', CURRENT_TIMESTAMP)";
            				if ($conn->query($sql) === TRUE) {
            				    $msg= "New record created successfully";
            				    $last_id = $conn->insert_id;

                                //API URL
                                $url="http://m1.sarv.com/api/v2.0/sms_campaign.php?token=286180875f842dabd37c50.24771892&user_id=47729449&route=TR&template_id=3117&sender_id=PHWAYZ&language=EN&template=Dear+Customer%2C+your+GeneThing+kit+has+been+dispatched+through++courier+with+AWB+no.+".$_POST['awb_number1']."+and+it+will+reach+you+in+7+working+days.+Thank+you+for+choosing+Gene-Thing+by++Healthywayz.&contact_numbers=".$_POST['mobile_no']."";
                                //echo $url;
                                sendSMS($url);
            				    header("location: barcode.php");
            				    
            				}
		                 
                        }else{
                            $err="Enter barcode correctly...";
                        }
		          }
                
		    
		}



		if($_FILES['import_barcode_file']['tmp_name']!=''){
		// Allowed mime types
            $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
            
            // Validate whether selected file is a CSV file
            if(!empty($_FILES['import_barcode_file']['name']) && in_array($_FILES['import_barcode_file']['type'], $csvMimes)){
                
                // If the file is uploaded
                if(is_uploaded_file($_FILES['import_barcode_file']['tmp_name'])){
                    
                    // Open uploaded CSV file with read-only mode
                    $csvFile = fopen($_FILES['import_barcode_file']['tmp_name'], 'r');
                    
                    // Skip the first line
                    fgetcsv($csvFile);
                    
                    // Parse data from CSV file line by line
                    while(($line = fgetcsv($csvFile)) !== FALSE){
                    //   echo count($line);
                        
                         if(sizeof($line) <= 4){
                        
                            $qry = "select * from login where barcode = '".$line[0]."'";
                			$res = $conn->query($qry);
                			if($res->num_rows == 0)
                			{
                			    $sql = "INSERT INTO `login` (`id`,  `order_id`, `barcode`,  `awb_number1`, `mobile_no`, `role`, `date`) VALUES (NULL, '".$line[0]."', '".$line[1]."', '".$line[2]."', '".$line[3]."', 'Users', CURRENT_TIMESTAMP)";
                		//	echo $sql;
                		        $url="http://m1.sarv.com/api/v2.0/sms_campaign.php?token=286180875f842dabd37c50.24771892&user_id=47729449&route=TR&template_id=3117&sender_id=PHWAYZ&language=EN&template=Dear+Customer%2C+your+GeneThing+kit+has+been+dispatched+through++courier+with+AWB+no.+".$line[2]."+and+it+will+reach+you+in+7+working+days.+Thank+you+for+choosing+Gene-Thing+by++Healthywayz.&contact_numbers=".$line[3]."";
                                sendSMS($url);
                				$conn->query($sql);

                			}
                         }else{
                            echo "<script type='text/javascript'>alert('Please check file format...');</script>";
                            break;
                        }
                    }
                }
            }else{
                echo "<script type='text/javascript'>alert('File Type is wrong...');</script>";
            }
            header("location: barcode.php");
		    
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
          <li class="breadcrumb-item active">Barcode</li>
          
        </ol>
   
        <!-- Page Content -->
         <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-barcode"></i>
            Add barcode
            <span class="float-right">
          
         
            <a href="downoad_account_file.php?download_barcode_file" target ="_blank" class="btn  btn-info text-light btn-sm"><i class="fa fa-download" aria-hidden="true"></i> Barcode Format</a>
         
         <!-- CSV file upload form -->
         <form action="" method="post" enctype="multipart/form-data"style="display:inline;">
            <label for="upload-photo1" class="label_file1"><i class="fa fa-upload" aria-hidden="true"></i> Barcode Upload <i class="fa fa-barcode" aria-hidden="true"></i></label>
            <input type="file" name="import_barcode_file" id="upload-photo1" onchange="this.form.submit();"/>
        </form>
         </span>
         
            </div>
          <div class="card-body">
		<?php if(isset($err)){ 
		    
		?>
			<div class="col-md-8 alert alert-danger">
			 <?php echo $err; ?>
			 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			 </button>
			</div>
		<?php
		
		}else if(isset($msg)){ 
		    
		?>
			<div class="col-md-8 alert alert-success">
			 <?php echo $msg; ?>
			 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			 </button>
			</div>
		<?php
		
		}
		$barcode='';$awb_number='';$mobile_no=''; $order_id ='';
                            if(isset($_GET['id']))
                            {
                                $qry = "select * from `login` where id='".$_GET['id']."'";
                                $res = $conn->query($qry);
                                if($res->num_rows != 0)
                                {	
                                    while($row = $res->fetch_assoc()) {
                                       
                                        $barcode=$row['barcode'];$awb_number=$row['awb_number1'];$mobile_no=$row['mobile_no'];
                                        $order_id = $row['order_id'];
                                    }
                                } 
                            }
		?>
		
		
	      <form method="POST" action="" autocomplete="off">
							<div class="row">
							    <div class="col-sm-3">
									<div class="form-group">
										<div class="form-label-group">
											<input type="text"  value="<?php echo $order_id; ?>" class="form-control" id="inputorder_id"
												required="required" name ="order_id"> <label for="inputBarcode">Order Id *</label>
										</div>
									</div>
								</div>
							    <div class="col-sm-3">
									<div class="form-group">
										<div class="form-label-group">
											<input type="text"  value="<?php echo $barcode; ?>" class="form-control" id="inputBarcode"
												required="required" name ="barcode"> <label for="inputBarcode">Barcode *</label>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<div class="form-label-group">
											<input type="text" id="inputUsername" class="form-control" autocomplete="off" value="<?php echo $awb_number; ?>" required="required" name="awb_number1">
											<label for="inputUsername">Awb No *</label>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<div class="form-label-group">
											<input type="number" id="inputPassword" class="form-control"
												value="<?php echo $mobile_no; ?>" name="mobile_no" required="required">
											<label for="inputPassword">Mobile No *</label>
										</div>
									</div>
								</div>
							</div>
							<button class="btn btn-primary" name="acount_create" type="submit" ><?php if(isset($_GET['id'])){echo 'Edit';}else{echo 'Add';} ?> Barcode</button>
	      </form>
	  </div>
	</div>


	<!-- DataTables Example -->
	<div class="card mb-3">
		<div class="card-header">
			<i class="fas fa-table"></i> All Details
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
							<th>Order Id</th>
							<th>Barcode</th>
							<th>Awb No</th>
							<th>Mobile No</th>
							<th>Order Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Sr. No.</th>
							<th>Order Id</th>
							<th>Barcode</th>
							<th>Awb No</th>	
							<th>Mobile No</th>
							<th>Order Status</th>
							<th>Action</th>
						</tr>
					</tfoot>
					<tbody>
					<?php 
						$cnt=1;
						$qry = "select `login`.awb_number1,`login`.order_id,`login`.barcode,`login`.order_status,`login`.status,`login`.id,`login`.mobile_no 
						        from `login` left join `user_details` 
						        on `user_details`.user_id=`login`.id
						        where `login`.`role`='Users' 
						        order by `login`.`id` desc";
						$res = $conn->query($qry);
						while($row = $res->fetch_assoc()) {
					?>	<tr>
						<td><?php echo $cnt++; ?></td>
						<td><?php echo $row["order_id"]; ?></td>
						<td><?php echo $row["barcode"]; ?></td>
						<td><?php echo $row["awb_number1"]; ?></td>
						<td><?php echo $row["mobile_no"]; ?></td>
						<td><?php echo $row["order_status"]; ?></td>
						<td>
							<a href="user_details.php?id=<?php echo $row['id']; ?>&uname=<?php echo $row["uname"]; ?>" data-toggle="tooltip" title="Add More Info of User">		
								<i class="fa fa-user-plus" aria-hidden="true"></i>
							</a>&nbsp;
							<a href="barcode.php?id=<?php echo $row['id']; ?>" data-toggle="tooltip" title="Edit Info of User">		
								<i class="fa fa-edit" aria-hidden="true"></i>
							</a>&nbsp;
							<a onclick="return confirm('Are you sure ?')" href="delete.php?table=login&return=barcode.php&id=<?php  echo $row['id'];  ?>" class="float-right" data-toggle="tooltip" title="Delete Account">		
								<i class="fa fa-trash"></i>
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