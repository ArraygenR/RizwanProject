<?php 
	session_start();
	include"includes/config.php"; 
	
	if(!(isset($_SESSION['login_id']))){
		header("location: index.php");
	}
	
	if($_SESSION['role']!='Admin'){
	    header("location: client_dashboard.php");			
	}
	
	if(isset($_POST['edit_details'])){
		$sql = "UPDATE `panel_info` SET  `no_of_snp` ='".$_POST['no_of_snp']."' , `no_of_transit`='".$_POST['no_of_transit']."', `organism` ='".$_POST['organism']."', `build` ='".$_POST['build']."' WHERE `id` = '1'";
	    $conn->query($sql) ;
	}
	
	
if(isset($_FILES['import_panel_details_file']['name'])){
  
    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['import_panel_details_file']['name']) && in_array($_FILES['import_panel_details_file']['type'], $csvMimes)){
        
        // If the file is uploaded
        if(is_uploaded_file($_FILES['import_panel_details_file']['tmp_name'])){
            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['import_panel_details_file']['tmp_name'], 'r');
            
            // Skip the first line
            fgetcsv($csvFile,0, "\t");
            
            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile,0, "\t")) !== FALSE){
                // Get row data
                //echo $line[0];
                // Check whether member already exists in the database with the same email
                $prevQuery = "SELECT id FROM nutrition WHERE id = '".$line[0]."'";
                
                $prevResult = $conn->query($prevQuery);
                
                if($prevResult->num_rows > 0){
                    // Update member data in the database
                    $sql = "UPDATE nutrition SET phenotype = '".$line[1]."', traits = '".$line[2]."', gene_id = '".$line[3]."'
                    , gene_id = '".$line[3]."', gene = '".$line[4]."', genotype = '".$line[5]."', description = '".$line[6]."', all_publication = '".$line[7]."'
                    , snp = '".$line[8]."'  WHERE id = '".$line[0]."'";
                    $conn->query($sql);
                }else{
                    
                  
                    $sql= "INSERT INTO `nutrition` (`id`, `phenotype`, `traits`, `gene_id`, `gene`, `genotype`, `description`, `all_publication`, `snp`) VALUES ('".$line[0]."', '".$line[1]."', '".$line[2]."', '".$line[3]."',
                    '".$line[4]."', '".$line[5]."', '".$line[6]."', '".$line[7]."', '".$line[8]."')";
                    $conn->query($sql);
                }
            }
            
            // Close opened CSV file
            fclose($csvFile);
            
            $msg = 'Data Uploaded sucessfully';
        }else{
            $err = 'Problem in uploading file.. Please check file format';
        }
    }else{
        $err = 'Problem in uploading file.. Please check file format';
    }
}
	
if(isset($_FILES['import_snp_details_file']['name'])){
  
    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['import_snp_details_file']['name']) && in_array($_FILES['import_snp_details_file']['type'], $csvMimes)){
        
        // If the file is uploaded
        if(is_uploaded_file($_FILES['import_snp_details_file']['tmp_name'])){
            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['import_snp_details_file']['tmp_name'], 'r');
            
            // Skip the first line
            fgetcsv($csvFile,0, "\t");
            
            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile,0, "\t")) !== FALSE){
                // Get row data
                //echo $line[0];
                // Check whether member already exists in the database with the same email
                $prevQuery = "SELECT id FROM nutrition_snp WHERE id = '".$line[0]."'";
                
                $prevResult = $conn->query($prevQuery);
                
                if($prevResult->num_rows > 0){
                    // Update member data in the database
                    $sql = "UPDATE nutrition_snp SET  snp = '".$line[1]."' ,pubmed_id = '".$line[2]."', title = '".$line[3]."' , observed_genotype = '".$line[4]."' , others = '".$line[5]."'
                    , variation_support_paper = '".$line[6]."', clinical_significance = '".$line[7]."' WHERE id = '".$line[0]."'";
                    //echo $sql."<br/>";
                    $conn->query($sql);
                }else{
                    
                    // Insert member data in the database
                    $sql= "INSERT INTO `nutrition_snp` (`id`, `snp`, `pubmed_id`, `title`, 
                    `observed_genotype`, `others`, `variation_support_paper`, `clinical_significance`) VALUES ('".$line[0]."', '".$line[1]."', '".$line[2]."', '".$line[3]."',
                    '".$line[4]."', '".$line[5]."', '".$line[6]."', '".$line[7]."')";
                    $conn->query($sql);
                }
            }
            
            // Close opened CSV file
            fclose($csvFile);
            
            $msg = 'Data Uploaded sucessfully';
        }else{
            $err = 'Problem in uploading file.. Please check file format';
        }
    }else{
        $err = 'Problem in uploading file.. Please check file format';
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

  <title>Gene-Thing | Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  
  <?php if($_SESSION['role']=='Users'){ ?>
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <?php } ?>
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <style>
.nav-pills .nav-link.active, .nav-pills .show > .nav-link {
    color: #fff;
    background-color: #17a2b8;
}
  </style>
  
  <style>

#upload-photo {
   opacity: 0;
   position: absolute;
   z-index: -1;
}

#upload-photo1 {
   opacity: 0;
   position: absolute;
   z-index: -1;
}
.table{
  font-size: 13px;
}
.nav-pills .nav-link {
     background-color: #17a2b82e;
}
  </style>
</head>

<body id="page-top" class="sidebar-toggled">
  <!-- navbar -->
  <?php include"includes/header.php"; ?>

  <div id="wrapper">

    <!-- Sidebar -->
    <?php include"includes/sidebar.php"; ?>

    <div id="content-wrapper" >

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="panel_dashboard.php">Panel Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Nutrition </li>
          
          <li class="breadcrumb-item">
            <a href="panel_food_intolerance.php">Food Intolerance</a>
          </li>
          <li class="breadcrumb-item">
            <a href="panel_fitness.php">Fitness</a>
          </li>
          <li class="breadcrumb-item">
            <a href="panel_health.php">Health</a>
          </li>
        <!--  <li class="breadcrumb-item">
            <a href="panel_skin.php">Skin</a>
          </li>
          <li class="breadcrumb-item">
            <a href="panel_hair.php">Hair</a>
          </li>-->
        </ol>

        <!-- Page Content -->
        
       
        <!-- Page Content -->
         <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-fw fa-pizza-slice"></i>
            Nutrition
            <span class="float-right">
          <?php if(!isset($_POST['edit'])){?>
            <form method="post">
                
                <button href="" target ="_blank" class="btn  btn-info text-light btn-sm" name="edit" type="submit"><i class="fa fa-edit" aria-hidden="true"></i> Update below details</button>
            </form>
            <?php } ?>
         
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
		$no_of_snp='';$no_of_transit='';$organism='';$build='';
                            $qry = "select * from `panel_info` where id='1'";
                                $res = $conn->query($qry);
                                if($res->num_rows != 0)
                                {	
                                    while($row = $res->fetch_assoc()) {
                                       
                                        $no_of_snp=$row['no_of_snp'];$no_of_transit=$row['no_of_transit'];$organism=$row['organism'];$build=$row['build'];
                                    }
                                } 
                            
                            
                            if(isset($_POST['edit'])){
		?>
		
		
	      <form method="POST" action="" autocomplete="off">
							<div class="row">
							    	<div class="col-sm-3">
									<div class="form-group">
										<div class="form-label-group">
											<input type="number"  value="<?php echo $no_of_snp; ?>" class="form-control" id="inputBarcode"
												required="required" name ="no_of_snp"> <label for="inputBarcode">No of SNP *</label>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<div class="form-label-group">
											<input type="number" id="inputno_of_transit" class="form-control" autocomplete="off" value="<?php echo $no_of_transit; ?>" 
											    required="required" name="no_of_transit">
											<label for="inputno_of_transit">No of Traits *</label>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<div class="form-label-group">
											<input type="text" id="inputOrganism" class="form-control"
												value="<?php echo $organism; ?>" name="organism" required="required">
											<label for="inputOrganism">Organism *</label>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<div class="form-label-group">
											<input type="text" id="inputbuild" class="form-control"
												value="<?php echo $build; ?>" name="build" required="required">
											<label for="inputbuild">Genome Build *</label>
										</div>
									</div>
								</div>
							</div>
							<button class="btn btn-primary" name="edit_details" type="submit" >Edit Nutrition details</button>
	      </form>
	      <?php }else{ ?>
	      
	      <h6>No of SNP : <span class="text-secondary"><?php echo $no_of_snp; ?></span></h6>
	      <h6>No of Traits : <span class="text-secondary"><?php echo $no_of_transit; ?></span></h6>
	      <h6>Organism : <span class="text-secondary"><?php echo $organism; ?></span></h6>
	      <h6>Genome Build : <span class="text-secondary"><?php echo $build; ?></span></h6>
	      <?php } ?>
	      <hr/>
	       <!-- Nav pills -->
  <ul class="nav nav-pills nav-justified" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="pill" href="#panel_details">Panel Details</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="pill" href="#snp_details">SNP Details</a>
    </li>
  </ul>
    <hr/>
  <!-- Tab panes -->
  <div class="tab-content">
    <div id="panel_details" class="container tab-pane active"><br>
      <h3>Panel Details  <!-- CSV file upload form -->
         <form action="" method="post" enctype="multipart/form-data"style="display:inline;">
            <label for="upload-photo" class="btn btn-primary btn-sm" style="margin-top: 0.5rem;"><i class="fa fa-upload" aria-hidden="true"></i></label>
            <input type="file" name="import_panel_details_file" id="upload-photo" onchange="this.form.submit();"/>
        </form>
        <a href="downoad_panel_file.php?downoad_panel=Nutrition&details=details" target ="_blank" class="btn  btn-info text-light btn-sm"><i class="fa fa-download" aria-hidden="true"></i></a>

        </h3>
      
      
      <div class="table-responsive">
				<table class="table table-bordered" id="dataTable1">
					<thead>
						<tr>
							<th>Phenotype</th>
                            <th>Traits</th>
                            <th>Gene id</th>
                            <th>Gene</th>
                            <th>Genotype</th>
                            <th>Description</th>
                            <th>Publication</th>
                            <th>SNP</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Phenotype</th>
                            <th>Traits</th>
                            <th>Gene id</th>
                            <th>Gene</th>
                            <th>Genotype</th>
                            <th>Description</th>
                            <th>Publication</th>
                            <th>SNP</th>
						</tr>
					</tfoot>
					<tbody>
					<?php 
						$cnt=1;
						$qry = "select * from `nutrition`";
						$res = $conn->query($qry);
						while($row = $res->fetch_assoc()) {
						    
					?>	<tr>
<td><?php echo  $row['phenotype'];  ?></td>
<td><?php echo $row['traits'];  ?></td>
<td><a href ="https://www.ncbi.nlm.nih.gov/gene/<?php echo  $row['gene_id'];  ?>" target="_blank"> <?php echo  $row['gene_id'];  ?></a> </td>
<td><?php echo $row['gene'];  ?></td>
<td><?php echo  $row['genotype'];  ?></td>
<td><?php echo $row['description'];  ?></td>
<td><a href ="<?php echo  $row['all_publication'];  ?>" target="_blank"><?php echo  $row['all_publication'];  ?></a></td>
<td><a href ="https://www.ncbi.nlm.nih.gov/snp/<?php echo  $row['gene_id'];  ?>" target="_blank"> <?php echo $row['snp'];  ?> </a> </td>
						</tr>
					<?php 
						} 

					?>
					</tbody>
				</table>
			</div>
      
    </div>
    <div id="snp_details" class="container tab-pane fade"><br>
      <h3>SNP Details  <form action="" method="post" enctype="multipart/form-data"style="display:inline;">
            <label for="upload-photo1"  class="btn btn-primary btn-sm" style="margin-top: 0.5rem;"><i class="fa fa-upload" aria-hidden="true"></i></label>
            <input type="file" name="import_snp_details_file" id="upload-photo1" onchange="this.form.submit();"/>
        </form> 
        
         <a href="downoad_panel_file.php?downoad_panel=Nutrition&details=snp" target ="_blank" class="btn  btn-info text-light btn-sm"><i class="fa fa-download" aria-hidden="true"></i></a>
         </h3>
      
        
      <div class="table-responsive">
				<table class="table table-bordered" id="dataTable2">
				<thead>
						<tr>
                            <th>SNP</th>
							<th>PubMED ID</th>
                            <th>Title</th>
                            <th>ObservedGenotype</th>
                            <th>Others</th>
                            <th>Variation support paper</th>
                            <th>clinical significance</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>SNP</th>
							<th>PubMED ID</th>
                            <th>Title</th>
                            <th>ObservedGenotype</th>
                            <th>Others</th>
                            <th>Variation support paper</th>
                            <th>clinical significance</th>
						</tr>
					</tfoot>
					<tbody>
					<?php 
						$cnt=1;
						$qry = "select * from `nutrition_snp`";
						$res = $conn->query($qry);
						while($row = $res->fetch_assoc()) {
						    
					?>	<tr>
                        <td><a href ="https://www.ncbi.nlm.nih.gov/snp/<?php echo  $row['gene_id'];  ?>" target="_blank"> <?php echo $row['snp'];  ?> </a></td>
                        <td><?php echo  $row['pubmed_id'];  ?></td>
                        <td><?php echo $row['title'];  ?></td>
                        <td><?php echo  $row['observed_genotype'];  ?></td>
                        <td><?php echo $row['others'];  ?></td>
                        <td><?php if($row['variation_support_paper'] !="NA") { ?><a href ="<?php echo  $row['variation_support_paper'];  ?>" target="_blank"> <?php } ?> <?php echo  $row['variation_support_paper'];  ?>
                            <?php if($row['variation_support_paper'] !="NA") { ?></a> <?php } ?> </td>
                        <td>
                            
                            <?php if($row['clinical_significance'] !="NA") { ?>
                            <a href ="<?php if($row['clinical_significance'] !="NA") echo  $row['clinical_significance'];  ?>" target="_blank">
                                 <?php } ?> 
                                 <?php echo $row['clinical_significance'];  ?>
                        
                        <?php if($row['clinical_significance'] !="NA") { ?></a> <?php } ?></td>
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

</body>

</html>
