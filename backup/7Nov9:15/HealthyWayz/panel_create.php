<?php
	session_start();
	include"includes/config.php"; 
	if(!(isset($_SESSION['login_id']))){
		header("location: index.php");
	}
	if($_SESSION['role']!='Admin'){
	    header("location: client_dashboard.php");			
	}
	
    if(isset($_POST['panel_info'])){

		if(isset($_GET['id'])){
			$sql = "UPDATE`panel_info` SET `Name`='".$_POST['name']."', `fa_fa_icon`='".$_POST['fa_fa_icon']."' where `id`='".$_GET['id']."'";
			if ($conn->query($sql) === TRUE) {
				$msg_t= "Panel Updated successfully";
				header("location: panel_create.php");
			}

		}else{
			$sql = "INSERT INTO `panel_info` (`id`, `Name`, `fa_fa_icon`) VALUES (NULL, '".$_POST['name']."', '".$_POST['fa_fa_icon']."')";
			if ($conn->query($sql) === TRUE) {
				$msg_t= "Panel Added successfully";
			}
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

  <title>Arraygen Schedule</title>

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
            <a href="panel_dashboard.php">Panel Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Panel</li>
        </ol>

        <!---------------- Trainer Deatils ------------>
        <div class="card mb-3">
          <div class="card-header">
           <i class="fa fa-cog" aria-hidden="true"></i>
            Panel Details</div>
          <div class="card-body">
		<div class="row">


			<div class="col-md-4">
	<?php
		if(isset($msg_t)){
	?>
		<div class="alert alert-success">
		  <?php echo "$msg_t"; ?>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
	<?php
		}
	?>
<?php
$name='';$fa_fa_icon='';
if(isset($_GET['id']))
{
	$qry = "select * from `panel_info` where id='".$_GET['id']."'";
	$res = $conn->query($qry);
	if($res->num_rows != 0)
	{	
		while($row = $res->fetch_assoc()) {
			$name=$row['Name'];$fa_fa_icon=$row['fa_fa_icon'];
		}
	} 
}
			?>	<form method="POST" autocomplete="off">
					<div class="form-group">
						<div class="form-label-group">
							<input type="text" id="inputPanelName" class="form-control" placeholder="Panel Name *" required="required" name="name" value='<?php echo $name; ?>'>
							<label for="inputPanelName">Panel Name *</label>
						</div>
					</div>
					
					<div class="form-group">
						<div class="form-label-group">
							<input type="text" id="inputfa_fa_icon" value='<?php echo $fa_fa_icon; ?>' class="form-control" placeholder="fa fa icon * " name="fa_fa_icon" required="required">
								
							<label for="inputfa_fa_icon">fa fa icon *</label>
						</div>
						<a class ="float-right" href="https://fontawesome.com/v4.7.0/icons/" target="_blabk">Check All Icons</a>
					</div>
					<button class="btn btn-primary" name="panel_info" type="submit"> <?php if(isset($_GET['id'])){echo 'Edit';}else{echo 'Add';} ?> Panel</button>
					
					
				</form>
			</div>	

			<div class=" col-md-8">
			<?php if(isset($_GET['delete'])){ 
			?>
				<div class="col-md-9 alert alert-success">
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
							<th>Name</th>
							<th>fa fa icon</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$cnt=1;
						$qry = "select * from `panel_info`";
						$res = $conn->query($qry);
						while($row = $res->fetch_assoc()) {
					?>	<tr>
						<td><?php echo $row["Name"]; ?></td>
						<td><?php echo $row["fa_fa_icon"]; ?></td>
						<td>


                            <a href="panel_create.php?id=<?php echo $row["id"]; ?>" data-toggle="tooltip" title="Edit Panel Details">		
								<i class="fa fa-edit" aria-hidden="true"></i>
							</a>&nbsp;
							<a href="delete.php?table=panel_info&return=panel_create.php&id=<?php  echo $row['id'];  ?>" onclick="return confirm('Are you sure?')" data-toggle="tooltip" title="Delete Panel Details">		
								<i class="fa fa-trash"></i>
							</a>


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
  $(document).on("click", ".open-clientInfo", function () {
     $("#client_info_name").text( $(this).data('name') );
     $("#client_info_address").text( $(this).data('address') );
     var c_no=$(this).data('contact_no');
     if(c_no == 0){
         c_no="Not Available";
     }
     $("#client_info_contact_no").text( c_no );
     $("#client_info_email").text( $(this).data('email') );
     
  });</script>
</body>

</html>
