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

		if(isset($_POST['change_password_admin'])){ $role='Admin'; }else if(isset($_POST['change_password_employee'])){ $role='Employee';}
		$qry = "select * from login where role='$role' and password='".$_POST['old_password']."'";
		$res = $conn->query($qry);
		if($res->num_rows > 0)
		{
			$sql = "UPDATE `login` SET `password`='".$_POST['password']."' where `role` ='".$role."'";
			if ($conn->query($sql) === TRUE) {
					   $msg= "$role Password changed Successfully";
			}
		}else{

			$err="Entered old password is incorrect.";
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
  <title>Gene-Thing | Change Password</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>
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
  <script type="text/javascript">
    function Validate1() {
        var password = document.getElementById("inputPassword1").value;
        var confirmPassword = document.getElementById("inputConfirmPassword1").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
  </script>
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
          <li class="breadcrumb-item active">Change Password</li>
        </ol>

        <!-- Page Content -->
<div class="col-md-6 offset-md-3">
      <div class="card mb-3">
		<div class="card-header">
			<i class="fas fa-key"></i> Change Password
		</div>
		<div class="card-body">
			<?php if(isset($msg)){ 
		?>
			<div class="col-md-12 alert alert-success">
			 <?php echo $msg; ?>
			 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			 </button>
			</div>
		<?php
		}?>
		<?php
		if(isset($err)){
	?>
		<div class="col-md-12 alert alert-danger">
		  <strong><i class="far fa-frown" aria-hidden="true"></i></strong> <?php echo "$err"; ?>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			 </button>
		</div>
	<?php
		}
	?>
			<div class="col-sm-12">
				
					<h4>Admin</h4>
					<hr>
					<form method="POST" action="">
						<div class="row">
							
								<div class="col-sm-12">
									<div class="form-group">
										<div class="form-label-group">
											<input type="password" id="inputOldPassword" class="form-control"
												value="" name="old_password" required="required">
											<label for="inputOldPassword">Old Password *</label>
										</div>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group">
										<div class="form-label-group">
											<input type="password" id="inputPassword" class="form-control"
												value="" name="password" required="required">
											<label for="inputPassword">Password *</label>
										</div>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group">
										<div class="form-label-group">
											<input type="password"  value="" class="form-control" id="inputConfirmPassword"
												required="required"> <label for="inputConfirmPassword">Confirm Password *</label>
										</div>
									</div>
								</div>
								<div class="col-sm-12">
									<button class="btn btn-primary" name="change_password_admin" type="submit" onclick="return Validate()" >Change Password</button>
								</div>
						</div>
					</form>
				</div>
				
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

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
 <script src="js/demo/datatables-demo.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

</body>

</html>
