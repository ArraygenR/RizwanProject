<?php
	session_start();
	include"includes/config.php"; 
	if(!(isset($_SESSION['login_id']))){
		header("location: index.php");
	}
	if($_SESSION['role']!='Admin'){
	    header("location: client_dashboard.php");			
	}
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{	
	    
		if(isset($_POST['acount_create'])){
			 $qry = "select * from login where uname='".$_POST['uname']."'";
            $res = $conn->query($qry);
            if($res->num_rows == 0)
            {
                $qry = "select * from user_details where contact_no='".$_POST['contact_no']."'";
                $res = $conn->query($qry);
                if($res->num_rows == 0)
                {
                            
                    $qry = "select * from login where (uname='".$_POST['uname']."' and barcode = '".$_POST['barcode']."') or (uname !='' and barcode = '".$_POST['barcode']."')";
                    $res = $conn->query($qry);
                    if($res->num_rows == 0)
                    {	
        				$sql = "INSERT INTO `login` (`id`, `uname`, `password`,`barcode`, `role`, `date`) VALUES (NULL, '".$_POST['uname']."', '".$_POST['password']."','".$_POST['barcode']."', 'Users', CURRENT_TIMESTAMP)";
        				if ($conn->query($sql) === TRUE) {
        				    $msg= "New record created successfully";
        				    $last_id = $conn->insert_id;
        				    //	$msg= "Patient Added Successfully";
        				}
                    }else{
                        $err="Enter barcode correctly...";
                    }
                }else{
                    $err="Your Contact Number Already Exists...";
                }    
            }else{
                $err="Your Email Already Exists...";
            } 
		}



		if(isset($_POST['Active'])||isset($_POST['Inactive'])){
			if(isset($_POST['Active'])){ $status='Inactive'; }else{ $status='Active';}
			$sql = "UPDATE `login` SET `status`='".$status."' where `id` ='".$_POST['id']."'";
			if ($conn->query($sql) === TRUE) {
				   $msg= "Status changed Successfully";
			}
		}
		if($_FILES['import_file']['tmp_name']!=''){
		   // echo "<script type='text/javascript'>alert('hello');</script>";
		    // Allowed mime types
            $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
            
            // Validate whether selected file is a CSV file
            if(!empty($_FILES['import_file']['name']) && in_array($_FILES['import_file']['type'], $csvMimes)){
                
                // If the file is uploaded
                if(is_uploaded_file($_FILES['import_file']['tmp_name'])){
                    
                    // Open uploaded CSV file with read-only mode
                    $csvFile = fopen($_FILES['import_file']['tmp_name'], 'r');
                    
                    // Skip the first line
                    fgetcsv($csvFile);
                    
                    // Parse data from CSV file line by line
                    while(($line = fgetcsv($csvFile)) !== FALSE){
                        // Get row data
                        if(sizeof($line) == 9){
                        
                            $qry = "select * from login where uname='".$line[0]."' and barcode = '".$line[1]."'";
                			$res = $conn->query($qry);
                			if($res->num_rows == 0)
                			{	
                				$sql = "INSERT INTO `login` (`id`, `uname`, `password`, `barcode`, `role`, `date`) VALUES (NULL, '".$line[0]."', '".$line[2]."', '".$line[1]."', 'Users', CURRENT_TIMESTAMP)";
                				if ($conn->query($sql) === TRUE) {
                				    $msg= "New records created successfully";
                				    $last_id = $conn->insert_id;
                				    $sql= "INSERT INTO `user_details` (`id`, `user_id`, `name`, `email`, `contact_no`, `dob`, `gender`, `organisation`, `designation`, `photo`) 
			                                VALUES (NULL, '".$last_id."', '".$line[3]."', '".$line[0]."', '".$line[4]."', '".$line[6]."', '".$line[5]."', '".$line[7]."', '".$line[8]."', '') ";
			
			                        $conn->query($sql);
			                        
			                        $arr = array('Nutrition','Food Intolerance','Fitness','Health', 'Skin','Hair');
                                    foreach ($arr as &$value) {
            			                $sql = "INSERT INTO `panel_details` (`id`, `user_id`, `panel`) VALUES (NULL, '".$last_id."', '".$value."')";
            			                $conn->query($sql);
                                    }
                				}
                			}else{
                				$row = $res->fetch_assoc();
                				$qry = "select * from user_details where user_id='".$row['id']."'";
                    			$res = $conn->query($qry);
                    			if($res->num_rows == 0)
                    			{
                    			    $sql= "INSERT INTO `user_details` (`id`, `user_id`, `name`, `email`, `contact_no`, `dob`, `gender`, `organisation`, `designation`, `photo`) 
			                                VALUES (NULL, '".$row['id']."', '".$line[3]."', '".$line[0]."', '".$line[4]."', '".$line[6]."', '".$line[5]."', '".$line[7]."', '".$line[8]."', '') ";
			
			                        $conn->query($sql);
			                        
			                        $arr = array('Nutrition','Food Intolerance','Fitness','Health', 'Skin','Hair');
                                    foreach ($arr as &$value) {
            			                $sql = "INSERT INTO `panel_details` (`id`, `user_id`, `panel`) VALUES (NULL, '".$row['id']."', '".$value."')";
            			                $conn->query($sql);
                                    }
			                        
                    			}else{
                    			    $sql = "UPDATE `user_details` SET  `name`='".$line[3]."', `contact_no`='".$line[4]."' ,`dob` = '".$line[6]."', `gender` = '".$line[5]."', 
					                    `organisation` = '".$line[7]."', `designation` = '".$line[8]."' where `user_id`='".$row['id']."'";
					               //echo $sql;
					               $conn->query($sql);
				
                    			}
                    			
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
            header("location: user.php");
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
          <li class="breadcrumb-item active">Users</li>
          
        </ol>
   
        <!-- Page Content -->
         <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-user"></i>
            Create User Account
            <span class="float-right">
            <a href="downoad_account_file.php?download_account_file" target ="_blank" class="btn  btn-info text-light btn-sm"><i class="fa fa-download" aria-hidden="true"></i> Account Format</a>
         
         <!-- CSV file upload form -->
         <form action="" method="post" enctype="multipart/form-data"style="display:inline;">
            <label for="upload-photo" class="label_file"><i class="fa fa-upload" aria-hidden="true"></i> Account Upload </label>
            <input type="file" name="import_file" id="upload-photo" onchange="this.form.submit();"/>
        </form>
          &nbsp;
         
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
		
		?>
	      <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" autocomplete="off">
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<div class="form-label-group">
											<input type="email" id="inputUsername" class="form-control" autocomplete="off" readonly 
onfocus="this.removeAttribute('readonly');" value="" required="required" name="uname">
											<label for="inputUsername">Username (Email) *</label>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<div class="form-label-group">
											<input type="password" id="inputPassword" class="form-control"
												value="" name="password" required="required">
											<label for="inputPassword">Password *</label>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<div class="form-label-group">
											<input type="password"  value="" class="form-control" id="inputConfirmPassword"
												required="required"> <label for="inputConfirmPassword">Confirm Password *</label>
										</div>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group">
										<div class="form-label-group">
											<input type="text"  value="" class="form-control" id="inputBarcode"
												required="required" name ="barcode"> <label for="inputBarcode">Barcode *</label>
										</div>
									</div>
								</div>
							</div>
							<button class="btn btn-primary" name="acount_create" type="submit" onclick="return Validate()" >Add Account</button>
	      </form>
	  </div>
	</div>


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
							<th>Username</th>
							<th>Barcode</th>
							<th>Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Sr. No.</th>
							<th>Username</th>
							<th>Barcode</th>
							<th>Name</th>
							<th>Action</th>
						</tr>
					</tfoot>
					<tbody>
					<?php 
						$cnt=1;
						$qry = "select `login`.uname,`login`.barcode,`login`.role,`login`.status,`login`.id,`user_details`.name 
						        from `login` left join `user_details` 
						        on `user_details`.user_id=`login`.id
						        where `login`.`role`='Users' 
						        order by `login`.`id` desc";
						$res = $conn->query($qry);
						while($row = $res->fetch_assoc()) {
					?>	<tr>
						<td><?php echo $cnt++; ?></td>
						<td><?php echo $row["uname"]; ?></td>
						<td><?php echo $row["barcode"]; ?></td>
						<td><?php echo $row["name"]; ?></td>
						<td>
							<a href="user_details.php?id=<?php echo $row['id']; ?>&uname=<?php echo $row["uname"]; ?>" data-toggle="tooltip" title="Add More Info of User">		
								<i class="fa fa-user-plus" aria-hidden="true"></i>
							</a>&nbsp;
							<a onclick="return confirm('Are you sure ?')" href="delete.php?table=login&return=user.php&id=<?php  echo $row['id'];  ?>" class="float-right" data-toggle="tooltip" title="Delete Account">		
								<i class="fa fa-trash"></i>
							</a>&nbsp;
								<form method="POST" style="display: inline;">
								    <input value="<?php echo $row['id']; ?>" name="id" type="hidden">
								    <button type="submit" name="<?php echo $row['status']; ?>" class="btn btn-sm <?php if($row['status']=='Active'){ echo 'btn-success'; }else{ echo 'btn-danger'; } ?>"><?php echo $row['status']; ?></button>
								</form>
							&nbsp;
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