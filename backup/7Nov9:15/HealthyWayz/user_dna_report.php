<?php 
	session_start();
	include"includes/config.php"; 
	if(!(isset($_SESSION['login_id']))){
		header("location: index.php");
	}
	if(isset($_GET['dna_report']))
    {
    $_SESSION['dna_report'] = $_GET['dna_report'];
    
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
  
  .carousel ul li{
    margin: 5px;
    padding-bottom: 10px;
  }
  .carousel ul .active{
     
    border-bottom: 5px solid #00b4cd;
  }
  .border-2{
    border-width:2px !important;
 }
 .risk .text-muted {
    color: #d0d0d0 !important;
}
 .risk .text-danger {
    color: #ff0018 !important;
}
.report_table tbody tr {
    box-shadow: 0px 1px 5px rgba(162, 196, 234, 0.4);
    -webkit-box-shadow: 0px 1px 5px rgba(162, 196, 234, 0.4);
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
          <li class="breadcrumb-item active"> DNA Report </li>
        </ol>

        <!-- Page Content -->
               <!-- Page Content -->
                 <?php if($_SESSION['role']=='Users'){ ?>
             <div class="row">
                <div class="col-md-12">
                  <div class="card mb-3">
            		<div class="card-header">
            			<img src="images/user_panel/dna_report.png"> DNA Report
            		</div>
            		<div class="card-body">
            			
                <div id="myCarousel" class="carousel slide"  data-interval="false" data-ride="carousel" data-pause="hover" >
                
                    <ul class="nav nav-pills nav-justified">
                             <?php 
            						$cnt=0;
            						$qry = "select `panel_info`.* from `panel_info` join `panel_details` on `panel_info`.Name = `panel_details`.panel where `panel_details`.user_id='".$_SESSION['login_id']."'";
            						$res = $conn->query($qry);
            						while($row = $res->fetch_assoc()) {
            						    
            						    $bgcolor = "primary";
            						    $txtcolor="dark";
            						    $cnt = $cnt +1; 
            						    
            						     if ($cnt % 7 == 0){ $bgcolor="secondary"; $txtcolor = "light";}
            						    elseif ($cnt % 6 == 0){ $bgcolor="dark"; $txtcolor="light";}
            						    elseif($cnt % 5 == 0){ $bgcolor = "info"; $txtcolor = "light";}
            						    elseif($cnt % 4 == 0){ $bgcolor = "danger"; $txtcolor = "light";}
            						    elseif($cnt % 3 == 0){ $bgcolor = "warning"; $txtcolor = "dark";}
            						    elseif($cnt % 2 == 0){ $bgcolor = "success"; $txtcolor = "light";}
            						    elseif($cnt == 1){ $bgcolor = "primary"; $txtcolor = "light";}
            						  
            						    
            					?>	
                      <li data-target="#myCarousel" class="<?php if(!isset($_GET['Name'])){if($cnt-1 == 0)echo 'active'; }elseif($row['Name'] ==$_GET['Name'] ) echo 'active'; ?>" data-slide-to="<?php echo $cnt-1; ?>">
                          <a href="">
                              <button class="btn btn-<?php echo "$bgcolor"; ?> text-<?php echo "$txtcolor"; ?> "> <i class="fa <?php echo $row['fa_fa_icon']; ?> bg-<?php echo $bgcolor; ?> text-<?php echo $txtcolor; ?>"></i> <?php echo $row['Name']; ?> </button>
                           </a>
                        </li>
                      <?php  } ?>
                    </ul>
                    <br/>
                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">
                   <?php 
            						$cnt=0;
            						$qry = "select `panel_info`.* from `panel_info` join `panel_details` on `panel_info`.Name = `panel_details`.panel where `panel_details`.user_id='".$_SESSION['login_id']."'";
            						$res = $conn->query($qry);
            						while($row = $res->fetch_assoc()) {
            						    
            						    $bgcolor = "primary";
            						    $txtcolor="dark";
            						     $cnt = $cnt +1;
            						    
            						    if ($cnt % 7 == 0){ $bgcolor="secondary"; $txtcolor = "light";}
            						    elseif ($cnt % 6 == 0){ $bgcolor="dark"; $txtcolor="light";}
            						    elseif($cnt % 5 == 0){ $bgcolor = "info"; $txtcolor = "light";}
            						    elseif($cnt % 4 == 0){ $bgcolor = "danger"; $txtcolor = "light";}
            						    elseif($cnt % 3 == 0){ $bgcolor = "warning"; $txtcolor = "dark";}
            						    elseif($cnt % 2 == 0){ $bgcolor = "success"; $txtcolor = "light";}
            						    elseif($cnt == 1){ $bgcolor = "primary"; $txtcolor = "light";}
            						  
            						    
            					?>	
                    <div class="carousel-item <?php if(!isset($_GET['Name'])) {if($cnt-1 == 0)echo 'active';} elseif($row['Name'] ==$_GET['Name'] )echo 'active';  ?>">
                        <div style="padding:10px;" class="border border-2 border-<?php echo "$bgcolor"; ?>  rounded">
                         <!--  <h3> <?php echo $row['Name']; ?></h3>
                            -->
            <?php 
            
            
            $qry_phenotype = "select phenotype from `panel` where panel_info_id= ".$row['id']." group by `phenotype`";
			$res_phenotype = $conn->query($qry_phenotype);
			while($row_phenotype = $res_phenotype->fetch_assoc()) {
			    
                $Traits=array();
                $qry_Traits = "select traits from `panel` where panel_info_id=".$row['id']." && phenotype = '".$row_phenotype['phenotype']."' group by `Traits`";
    			$res_Traits = $conn->query($qry_Traits);
    			while($row_Traits = $res_Traits->fetch_assoc()) {
    			    array_push($Traits,$row_Traits['traits']);
    			}
    		
            ?>             
            <h5><?php echo $row_phenotype['phenotype']; ?></h5>
            <div class="table-responsive">
              <table class="table report_table">
                <thead>
                  <tr class="table-<?php echo "$bgcolor"; ?> text-<?php echo "$bgcolor"; ?>">
                    <th width="30%">Traits</th>
                    <th width="15%">Risk</th>
                    <th width="10%">Score</th>
                    <th colspan="2" width="45%">Short Description</th>
                  </tr>
                </thead>
                <tbody>         
                 
                       <?php
                       
                       for ($x = 0; $x < count($Traits); $x+=1) { 
                
                //$trait_img = "images/pdf_report/safetyResponse.jpg"; 
                $trait_img = "";
                $trait_desc = '';
                $qry_img = "select * from `traits_image` where traits = '".$Traits[$x]."'";
    			$res_img = $conn->query($qry_img);
    			$row_img = $res_img->fetch_assoc();
    			if ( $row_img['image'] != ''){
    			    $trait_img= $row_img['image'];
    			}
                
                if ( $row_img['description'] != ''){
    			    $trait_desc= $row_img['description'];
    			}
    			$score = $x%11;
    			if ($score>=0 && $score <=2){
    			    $risk = 'Excellent';
    			    $score_color = 'success';
    			    $risk_i =' <i class="fas fa-square text-'.$score_color.'""></i>
                          <i class="fas fa-square text-muted"></i>
                          <i class="fas fa-square text-muted"></i>
                          <i class="fas fa-square text-muted"></i>
                          <i class="fas fa-square text-muted"></i>';
    			}elseif ($score> 2 && $score <=4){
    			    $risk = 'Good';
    			    $score_color= 'info';
    			    $risk_i =' <i class="fas fa-square text-muted"></i>
                          <i class="fas fa-square text-'.$score_color.'""></i>
                          <i class="fas fa-square text-muted"></i>
                          <i class="fas fa-square text-muted"></i>
                          <i class="fas fa-square text-muted"></i>';
    			}elseif ($score> 4 && $score <=6){
    			    $risk = 'Typical';
    			    $score_color= 'primary';
    			    $risk_i =' <i class="fas fa-square text-muted"></i>
                          <i class="fas fa-square text-muted"></i>
                          <i class="fas fa-square text-'.$score_color.'""></i>
                          <i class="fas fa-square text-muted"></i>
                          <i class="fas fa-square text-muted"></i>';
    			}elseif ($score> 6 && $score <=8){
    			    $risk = 'Poor';
    			    $score_color= 'warning';
    			    $risk_i =' <i class="fas fa-square text-muted"></i>
                          <i class="fas fa-square text-muted"></i>
                          <i class="fas fa-square text-muted"></i>
                          <i class="fas fa-square text-'.$score_color.'""></i>
                          <i class="fas fa-square text-muted"></i>';
    			}else{
    			    $risk = 'Very Poor';
    			    $score_color= 'danger';
    			    $risk_i =' <i class="fas fa-square text-muted"></i>
                          <i class="fas fa-square text-muted"></i>
                          <i class="fas fa-square text-muted"></i>
                          <i class="fas fa-square text-muted"></i>
                          <i class="fas fa-square text-'.$score_color.'"></i>';
    			}
    			
    		    
    			
                       ?>
                   
                    <tr class="poor">
                        
                      <td>
                          <div class="d-flex">
                            <div>
                               <a href="user_traits_details.php?trait_name=<?php echo $Traits[$x]; ?>">  <img src="<?php echo $trait_img; ?>" style="width:70px;" class="d-inline-block genomics_img"></a>
                            </div>
                            <div class="align-self-center pl-3">
                                <a href="user_traits_details.php?trait_name=<?php echo $Traits[$x]; ?>">  <span class="black report_title text-dark"><?php echo $Traits[$x]; ?></span> </a>
                            </div>                   
                          </div>
                       
                      </td>
                     
                      <td class="risk">
                        <div>
                         <?php echo $risk_i; ?>
                        </div>
                        <span class="statu text-<?php echo $score_color; ?>"><?php echo $risk; ?></span>
                      </td>
                      <td class="rating text-<?php echo $score_color; ?>"><?php echo $score; ?></td>
                      <td><p>As per your genetics, your <?php echo $Traits[$x]; ?> is <?php echo $risk; ?>.</p>  </td>
                      <td>
                            <a href="user_traits_details.php?trait_name=<?php echo $Traits[$x]; ?>"> <i class="fa fa-chevron-right text-muted" aria-hidden="true"></i></a>  
                      </td>
                        
                    </tr>
                      
                      <?php } ?>
                </tbody>
              </table>
            
          </div>
              <?php } ?>              
                            
                            
                        </div>
                   </div><!-- End Item -->
                    <?php    } ?>
                            
                  </div><!-- End Carousel Inner -->
                </div><!-- End Carousel -->
            				
            		</div>
            	</div>
               </div>
             </div>      
             <?php } ?>
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

$('#myCarousel').on('slid.bs.carousel', function(e) {//attach its event
    var current=$(e.target).find('.carousel-item.active'); //get the current active slide
    $('.carousel li').removeClass('active') //remove active class from all the li of carousel indicator
    var indx=$(current).index(); //get its index
    indx = indx+1
    $('.carousel ul li:nth-child('+indx+')').addClass('active');//set the respective indicator active

});

</script>
</body>

</html>
