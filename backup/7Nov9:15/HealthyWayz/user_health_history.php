<?php 
	session_start();
	include"includes/config.php"; 
	if(!(isset($_SESSION['login_id']))){
		header("location: index.php");
	}
	if(isset($_POST['submit'])){
	    
    	$sql = "UPDATE `user_details` SET  `hemoglobin_count`='".$_POST['hemoglobin_count']."' , rbc_count = '".$_POST['rbc_count']."',
    	`pcv_count`='".$_POST['pcv_count']."' , mcv_count = '".$_POST['mcv_count']."',
    	`mch_count`='".$_POST['mch_count']."' , mchc_count = '".$_POST['mchc_count']."',
    	`rdw_count`='".$_POST['rdw_count']."' , total_wbc_count = '".$_POST['total_wbc_count']."',
    	`absolute_neutrophil_count`='".$_POST['absolute_neutrophil_count']."' , absolute_lymphocyte_count = '".$_POST['absolute_lymphocyte_count']."',
    	`absolute_monocyte_count`='".$_POST['absolute_monocyte_count']."' , absolute_eosinophil_count = '".$_POST['absolute_eosinophil_count']."',
    	`absolute_basophile_count`='".$_POST['absolute_basophile_count']."' , neutrophils_count = '".$_POST['neutrophils_count']."',
    	`lymphocytes_count`='".$_POST['lymphocytes_count']."' , monocytes_count = '".$_POST['monocytes_count']."',
    	`eosinophils_count`='".$_POST['eosinophils_count']."' , basophils_count = '".$_POST['basophils_count']."',
    	`platelet_count`='".$_POST['platelet_count']."' , mpv_count = '".$_POST['mpv_count']."',
    	`pct_count`='".$_POST['pct_count']."' , pdw_count = '".$_POST['pdw_count']."',
    	`morphology_rbc`='".$_POST['morphology_rbc']."' , morphology_wbc = '".$_POST['morphology_wbc']."',
    	`smea_platelet`='".$_POST['smea_platelet']."' , esr_count = '".$_POST['esr_count']."'
    	 where `user_id`='".$_SESSION['login_id']."' ";
        if ($conn->query($sql) === TRUE) {
           $msg= "Health Profile Updated successfully";
        }
        //echo $sql;
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
  <style>
      .report_table tbody tr{
          box-shadow: 0px 1px 5px rgba(162, 196, 234, 0.4);
        -webkit-box-shadow: 0px 1px 5px rgba(162, 196, 234, 0.4);
      }
      .table th, .table td {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e600;
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
          <li class="breadcrumb-item active">Health Profile </li>
        </ol>


<?php

                     $hemoglobin_count=""; $rbc_count=""; $pcv_count=""; $mcv_count=""; $mch_count=""; $mchc_count=""; $rdw_count=""; 
                     $total_wbc_count=""; $absolute_neutrophil_count=""; $absolute_lymphocyte_count=""; $absolute_monocyte_count=""; 
                     $absolute_eosinophil_count=""; $absolute_basophile_count=""; $neutrophils_count=""; $lymphocytes_count=""; 
                     $monocytes_count=""; $eosinophils_count=""; $basophils_count=""; $platelet_count=""; 
                     $mpv_count=""; $pct_count=""; $pdw_count=""; $morphology_rbc=""; 
                     $morphology_wbc=""; $smea_platelet=""; $esr_count=""; 
                     
                     
                     $qry = "select * from `user_details` where user_id='".$_SESSION['login_id']."'";
                     $res = $conn->query($qry);
                     if($res->num_rows != 0)
                     {	
                     	while($row = $res->fetch_assoc()) {
                     		$hemoglobin_count=$row['hemoglobin_count'];$rbc_count=$row['rbc_count'];$pcv_count=$row['pcv_count'];
                     		$mcv_count=$row['mcv_count'];$mch_count=$row['mch_count'];$mchc_count=$row['mchc_count'];$rdw_count=$row['rdw_count'];
                     		$total_wbc_count=$row['total_wbc_count'];$absolute_neutrophil_count=$row['absolute_neutrophil_count'];
                     		$absolute_lymphocyte_count=$row['absolute_lymphocyte_count'];$absolute_monocyte_count=$row['absolute_monocyte_count'];
                     		$absolute_eosinophil_count=$row['absolute_eosinophil_count']; $absolute_basophile_count=$row['absolute_basophile_count']; 
                     		$neutrophils_count=$row['neutrophils_count']; $lymphocytes_count=$row['lymphocytes_count']; $monocytes_count=$row['monocytes_count']; 
                     		$eosinophils_count=$row['eosinophils_count']; $basophils_count=$row['basophils_count']; $platelet_count=$row['platelet_count'];
                     		$mpv_count=$row['mpv_count']; 	$pct_count=$row['pct_count']; $pdw_count=$row['pdw_count']; 
                     		$morphology_rbc=$row['morphology_rbc']; $morphology_wbc=$row['morphology_wbc'];
                     		$smea_platelet=$row['smea_platelet']; $esr_count=$row['esr_count']; 
                     		
                     	}
                     } 

?>

        <!-- Page Content -->
        
        <div class="row">
            
             <div class="col-md-12">
                  <div class="card mb-3">
            		<div class="card-header">
            			<img src="images/user_panel/health_history.png"> Health Profile
            		</div>
            		<div class="card-body">
            		    <?php if(isset($msg)){ 
                     ?>
                  <div class="col-md-8 alert alert-success">
                     <?php echo $msg; ?>
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <?php
                     }?>
            		     <h5>Complete Blood Count(CBC)</h5>
                    		<form method ="POST" action="">
                                <div class="table-responsive">
                                  <table class="table report_table">
                                    <thead>
                                      <tr class="table-info text-info">
                                        <th width="40%">Test</th>
                                        <th width="20%">Value</th>
                                        <th width="20%">Unit</th>
                                        <th width="20%">Reference Range</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>Hemoglobin</td>
                                        <td>
                                            <input type="text" name="hemoglobin_count" class="form-control" value="<?php echo $hemoglobin_count; ?>">
                     
                                        </td>
                                        <td>gm/dl</td>
                                        <td>13.5 - 18</td>
                                      </tr>
                                      <tr>
                                        <td>Erythrocyte (R.B.C.) Count</td>
                                        <td>
                                            <input type="text" name="rbc_count" class="form-control" value="<?php echo $rbc_count; ?>">
                                        </td>
                                        <td>mill/cu.mm</td>
                                        <td>4.7 - 6.0</td>
                                      </tr>
                                      <tr>
                                        <td>PCV (Packed Cell Volume)</td>
                                        <td>
                                            <input type="text" name="pcv_count" class="form-control" value="<?php echo $pcv_count; ?>">
                                        </td>
                                        <td>%</td>
                                        <td>42 - 52</td>
                                      </tr>
                                      <tr>
                                        <td>MCV (Mean Corpuscular Volume)</td>
                                        <td>
                                            <input type="text" name="mcv_count" class="form-control" value="<?php echo $mcv_count; ?>">
                                        </td>
                                        <td>fL</td>
                                        <td>78 - 100</td>
                                      </tr>
                                      <tr>
                                        <td>MCH (Mean Corpuscular Hb)</td>
                                        <td>
                                            <input type="text" name="mch_count" class="form-control" value="<?php echo $mch_count; ?>">
                                        </td>
                                        <td>pg</td>
                                        <td>27 - 31</td>
                                      </tr>
                                      <tr>
                                        <td>MCHC (Mean Corpuscular Hb Concn.)</td>
                                        <td>
                                            <input type="text" name="mchc_count" class="form-control" value="<?php echo $mchc_count; ?>">
                                        </td>
                                        <td>g/dL</td>
                                        <td>32 - 36</td>
                                      </tr>
                                      <tr>
                                        <td>RDW (Red Cell Distribution Width)</td>
                                        <td>
                                            <input type="text" name="rdw_count" class="form-control" value="<?php echo $rdw_count; ?>">
                                        </td>
                                        <td>%</td>
                                        <td>11.5 - 14.0</td>
                                      </tr>
                                      <tr colspan="3">
                                        <td><b>WBC Parameters</b></td>
                                      </tr>
                                      <tr>
                                        <td>Total W.B.C. Count</td>
                                        <td>
                                            <input type="text" name="total_wbc_count" class="form-control" value="<?php echo $total_wbc_count; ?>">
                                        </td>
                                        <td>cells/cu.mm</td>
                                        <td>4000 - 10500</td>
                                      </tr>
                                      <tr>
                                        <td>Absolute Neutrophils Count</td>
                                        <td>
                                            <input type="text" name="absolute_neutrophil_count" class="form-control" value="<?php echo $absolute_neutrophil_count; ?>">
                                        </td>
                                        <td>/c.mm</td>
                                        <td>2000 - 7000</td>
                                      </tr>
                                      <tr>
                                        <td>Absolute Lymphocyte Count</td>
                                        <td>
                                            <input type="text" name="absolute_lymphocyte_count" class="form-control" value="<?php echo $absolute_lymphocyte_count; ?>">
                                        </td>
                                        <td>/c.mm</td>
                                        <td>1000 - 3000</td>
                                      </tr>
                                      <tr>
                                        <td>Absolute Monocyte Count</td>
                                        <td>
                                            <input type="text" name="absolute_monocyte_count" class="form-control" value="<?php echo $absolute_monocyte_count; ?>">
                                        </td>
                                        <td>/c.mm</td>
                                        <td>200 - 1000</td>
                                      </tr>
                                      <tr>
                                        <td>Absolute Eosinophil Count</td>
                                        <td>
                                            <input type="text" name="absolute_eosinophil_count" class="form-control" value="<?php echo $absolute_eosinophil_count; ?>">
                                        </td>
                                        <td>/c.mm</td>
                                        <td>20 - 500</td>
                                      </tr>
                                      <tr>
                                        <td>Absolute Basophil Count</td>
                                        <td>
                                            <input type="text" name="absolute_basophile_count" class="form-control" value="<?php echo $absolute_basophile_count; ?>">
                                        </td>
                                        <td>/c.mm</td>
                                        <td>20 - 100</td>
                                      </tr>
                                      <tr>
                                        <td>Neutrophils</td>
                                        <td>
                                            <input type="text" name="neutrophils_count" class="form-control" value="<?php echo $neutrophils_count; ?>">
                                        </td>
                                        <td>%</td>
                                        <td>40 - 80</td>
                                      </tr>
                                      <tr>
                                        <td>Lymphocytes</td>
                                        <td>
                                            <input type="text" name="lymphocytes_count" class="form-control" value="<?php echo $lymphocytes_count; ?>">
                                        </td>
                                        <td>%</td>
                                        <td>20 - 40</td>
                                      </tr>
                                      <tr>
                                        <td>Monocytes</td>
                                        <td>
                                            <input type="text" name="monocytes_count" class="form-control" value="<?php echo $monocytes_count; ?>">
                                        </td>
                                        <td>%</td>
                                        <td>2.0 - 10</td>
                                      </tr>
                                      <tr>
                                        <td>Eosinophils</td>
                                        <td>
                                            <input type="text" name="eosinophils_count" class="form-control" value="<?php echo $eosinophils_count; ?>">
                                        </td>
                                        <td>%</td>
                                        <td>1 - 6</td>
                                      </tr>
                                      <tr>
                                        <td>Basophils</td>
                                        <td>
                                            <input type="text" name="basophils_count" class="form-control" value="<?php echo $basophils_count; ?>">
                                        </td>
                                        <td>%</td>
                                        <td>0 - 2</td>
                                      </tr>
                                      <tr colspan="3">
                                        <td><b>Platelet Parameters</b></td>
                                      </tr>
                                      <tr>
                                        <td>Platelet Count</td>
                                        <td>
                                            <input type="text" name="platelet_count" class="form-control" value="<?php echo $platelet_count; ?>">
                                        </td>
                                        <td>10^3 / μl</td>
                                        <td>150 - 450</td>
                                      </tr>
                                      <tr>
                                        <td>MPV (Mean Platelet Volume)</td>
                                        <td>
                                            <input type="text" name="mpv_count" class="form-control" value="<?php echo $mpv_count; ?>">
                                        </td>
                                        <td>fL</td>
                                        <td>6 - 9.5</td>
                                      </tr>
                                      <tr>
                                        <td>PCT ( Platelet Haematocrit)</td>
                                        <td>
                                            <input type="text" name="pct_count" class="form-control" value="<?php echo $pct_count; ?>">
                                        </td>
                                        <td>%</td>
                                        <td>0.2 - 0.5</td>
                                      </tr>
                                      <tr>
                                        <td>PDW (Platelet Distribution Width)</td>
                                        <td>
                                            <input type="text" name="pdw_count" class="form-control" value="<?php echo $pdw_count; ?>">
                                        </td>
                                        <td>%</td>
                                        <td>9 - 17</td>
                                      </tr>
                                      <tr colspan="3">
                                        <td><b>Peripheral Smear Findings</b></td>
                                      </tr>
                                      <tr>
                                        <td>Morphology of R.B.C.s</td>
                                        <td>
                                            <input type="text" name="morphology_rbc" class="form-control" value="<?php echo $morphology_rbc; ?>">
                                        </td>
                                        <td></td>
                                        <td></td>
                                      </tr>
                                      <tr>
                                        <td>Morphology of W.B.C.s</td>
                                        <td>
                                            <input type="text" name="morphology_wbc" class="form-control" value="<?php echo $morphology_wbc; ?>">
                                        </td>
                                        <td></td>
                                        <td></td>
                                      </tr>
                                      <tr>
                                        <td>Platelets on Smea</td>
                                        <td>
                                            <input type="text" name="smea_platelet" class="form-control" value="<?php echo $smea_platelet; ?>">
                                        </td>
                                        <td></td>
                                        <td></td>
                                      </tr>
                                      <tr colspan="3">
                                        <td><b>E.S.R. (whole blood)</b></td>
                                      </tr>
                                      <tr>
                                        <td>E.S.R.</td>
                                        <td>
                                            <input type="text" name="esr_count" class="form-control" value="<?php echo $esr_count; ?>">
                                        </td>
                                        <td>mm/hr</td>
                                        <td>0 - 15</td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>	
                                <div class="col-sm-12">
                                    <button class="btn btn-primary" type="submit" name="submit">
                                        Update Details
                                    </button>
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
