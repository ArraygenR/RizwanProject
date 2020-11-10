<?php 
	session_start();
	include"includes/config.php"; 
	if(!(isset($_SESSION['login_id']))){
		header("location: index.php");
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

    
.panel_tabs .nav-item {
    padding-right: 15px;
    margin-bottom: 15px;
}

.panel_tabs .nav-item .nav-link {
    background-color: #fff;
    color: #808080;
    box-shadow: 0 0.1rem 1rem rgba(0, 0, 0, 0.15);
    -webkit-box-shadow: 0 0.1rem 1rem rgba(0, 0, 0, 0.15);
    -moz-box-shadow: 0 0.1rem 1rem rgba(0, 0, 0, 0.15);
    -o-box-shadow: 0 0.1rem 1rem rgba(0, 0, 0, 0.15);
    padding: 10px 15px;
    position: relative;
    text-transform: capitalize;
}


.panel_tabs .nav-item .nav-link.active::after {

    content: "";
    border-bottom: 5px solid #00b4cd;
    border-radius: 20px;
    position: absolute;
    bottom: 0;
    height: 5px;
    width: 100%;
    left: 0;
    right: 0;
    margin: 0 auto;

}
.trait .fa{
    font-size: 40px;
    padding: 30px;
    background-color: #1094b5;
    border-radius: 100%;
    margin-top: -50px;
    text-align: center;
    color:white;

}
.trait .carousel-control-prev, .trait .carousel-control-next {
    position: inherit;
    top: 0;
    bottom: 0;
    padding: 7px 10px;
    display: block;
    width: max-content;
    background-color: #00b4cd;
    border-radius: 100%;
}



.trait .carousel-indicators li {
    text-indent: inherit;
    cursor: initial;
    border-top: 0px solid transparent;
    border-bottom: 0px solid transparent;
    color:#0020cd;
    width:auto;
    height:auto;
    font-size: large;
    margin-top: 30px;
}

.trait .carousel-indicators li.active {
    text-indent: inherit;
    cursor: initial;
    border-top: 0px solid transparent;
    border-bottom: 0px solid transparent;
    color:#0020cd;
    width:auto;
    height:auto;
    font-size: x-large;
    margin-top: 30px;
}

.trait .carousel-indicators{
    position: inherit;
     display:inline-block;
     padding-left: 0;
    margin-right: 0;
    margin-left: 10%;
     list-style-type:square;
}
.trait .carousel-item.active, .trait .carousel-item-next, .trait .carousel-item-prev {
    display: inherit;
}

.trait .carousel-item .bg-success{
    padding:20px;
    border-radius:20px;
    margin-top:10px;
    background-color: #81c36b !important;
}

.trait .carousel-item .bg-warning{
    padding:20px;
    border-radius:20px;
    margin-top:10px;
    background-color: #ffb16b !important
}


.trait .carousel-item .bg-danger{
    padding:20px;
    border-radius:20px;
    margin-top:10px;
    background-color: #fc6d6f !important;
}



.trait .title_cube {
    width: 100%;
    /*min-height: 500px;*/
    background-color: white;
    box-shadow: 0 0.1rem 1rem rgba(0, 0, 0, 0.15);
    -webkit-box-shadow: 0 0.1rem 1rem rgba(0, 0, 0, 0.15);
    -moz-box-shadow: 0 0.1rem 1rem rgba(0, 0, 0, 0.15);
    -o-box-shadow: 0 0.1rem 1rem rgba(0, 0, 0, 0.15);
    position: relative;
    margin: 70px 0px;
}
.genetic_list li img {
    width: 50px;
    height: 50px;
}
img.genomics_img {
    width: 50px;
    height: 50px;
    border-radius: 100%;
    object-fit: cover;
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
          <li class="breadcrumb-item active"> Genetic Snapshot</li>
        </ol>





        <!-- Page Content -->
               <!-- Page Content -->
                 <?php if($_SESSION['role']=='Users'){ ?>
             <div class="row">
                <div class="col-md-12">
                  <div class="card mb-3">
            		<div class="card-header">
            			<img src="images/user_panel/genetic_snapshot.png"> Genetic Snapshot 
            		</div>
            		<div class="card-body">
            		
            		
            		
 <ul class="nav nav-pills panel_tabs" role="tablist">
     
     
           <?php 
            						$cnt=0;
            						$qry = "select `panel_info`.* from `panel_info` join `panel_details` on `panel_info`.Name = `panel_details`.panel where `panel_details`.user_id='".$_SESSION['login_id']."'";
            						$res = $conn->query($qry);
            						while($row = $res->fetch_assoc()) {
            						    
            						    $bgcolor = "primary";
            						    $txtcolor="dark";
            						    $cnt = $cnt +1; 
            						    
            						    
            					?>	
  <li class="nav-item">
    <a class="nav-link  <?php if($cnt-1 == 0){echo 'active '; } ?>" data-toggle="tab" href="#panel<?php echo $cnt; ?>" role="tab"><?php echo $row['Name']; ?></a>
  </li>
  
  
  <?php } ?>
</ul>

  <!-- Tab panes -->
  <div class="tab-content">
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
     <div class="tab-pane <?php if($cnt-1 == 0)echo 'active '; ?>" id="panel<?php echo $cnt; ?>" role="tabpanel">
     
      
      
      
      <div id="trait<?php echo $cnt; ?>" class="carousel slide trait" data-interval="false" data-ride="carousel">
          
          <a class="carousel-control-next" href="#trait<?php echo $cnt; ?>" data-slide="next">
            <span class="carousel-control-next-icon"></span>
          </a>
          <div class="row">
              <div class="col-sm-6">
                  <div class="title_cube">
                            <center>
                                <i class="fa <?php echo $row['fa_fa_icon']; ?> bg-<?php echo $bgcolor; ?> text-<?php echo $txtcolor; ?>"></i>
                                <h3 class="bold mt-2"><?php echo $row['Name']; ?></h3>
                            </center>
                            <ul class="carousel-indicators">
                            
                                    <?php
                                    $pheno_cnt = 0;
                                     $qry_phenotype = "select phenotype from `panel` where panel_info_id= ".$row['id']." group by `phenotype`";
                        			$res_phenotype = $conn->query($qry_phenotype);
                        			while($row_phenotype = $res_phenotype->fetch_assoc()) {
                                    ?>
                                    <li data-target="#trait<?php echo $cnt; ?>" data-slide-to="<?php echo $pheno_cnt; ?>" class="<?php if ($pheno_cnt == 0){ echo 'active'; } ?>"> <?php echo $row_phenotype['phenotype']; ?> </li>
                                    <?php $pheno_cnt= $pheno_cnt+1;  } ?>
                                   
                            </ul>
                      
                  </div>
                  
                
              </div>
              <div class="col-sm-6">
                  <div class="carousel-inner">
                       <?php
                                    $pheno_cnt = 0;
                                     $qry_phenotype = "select phenotype from `panel` where panel_info_id= ".$row['id']." group by `phenotype`";
                        			$res_phenotype = $conn->query($qry_phenotype);
                        			while($row_phenotype = $res_phenotype->fetch_assoc()) {
                                    ?>
                    <div class="carousel-item <?php if ($pheno_cnt == 0){ echo 'active'; } ?>">
                      <div class="row">
                          
                          <div class="col-sm-12" >
                              <?php //echo $row_phenotype['phenotype']; ?> 
                              <div class=" bg-success text-light">
                                  <h5>
                                     <b>
                                         Favourable Response
                                     </b> 
                                  </h5>
                                    <ul class="list-unstyled best_genetic_list genetic_list">
                                        <li>
                                          <img src="https://thegenebox.com/uploads/traits/original/16gp7ewYxzUaQsFh.jpg" class="mr-3 genomics_img">
                                          <span class="align-self-center">Caffeine Metabolism</span>
                                        </li>
                                  </ul>
                              </div>
                          </div>
                          <div class="col-sm-12 ">
                              <div class="bg-warning text-light">
                                  <h5>
                                      <b>
                                          Average Response
                                      </b>
                                      
                                  </h5>
                                  <ul class="list-unstyled good_genetic_list genetic_list"><div class="text-center">
                                  <img src="https://thegenebox.com//assets/dashboard/images/default.png">
                                </div></ul>
                              </div>
                          </div>
                          <div class="col-sm-12">
                              <div class=" bg-danger text-light">
                                  <h5>
                                      <b>
                                          Unfavourable Response
                                      </b>
                                  </h5>
                                  <ul class="list-unstyled poor_genetic_list genetic_list"><li>
                                      <img src="https://thegenebox.com/uploads/traits/original/JxXdkab3DSVQ59mN.jpg" class="mr-3 genomics_img">
                                      <span class="align-self-center">Childhood Nephrotic Syndrome</span>
                                    </li><li>
                                      <img src="https://thegenebox.com/uploads/traits/original/fqVvIp9KZPB74xM2.jpg" class="mr-3 genomics_img">
                                      <span class="align-self-center">Salt Metabolism</span>
                                    </li><li>
                                      <img src="https://thegenebox.com/uploads/traits/original/ZEutiXdeHvgCj6pA.jpg" class="mr-3 genomics_img">
                                      <span class="align-self-center">Gluten Intolerance</span>
                                    </li><li>
                                      <img src="https://thegenebox.com/uploads/traits/original/RPxYqt6sTGJio27f.jpg" class="mr-3 genomics_img">
                                      <span class="align-self-center">Lactose Intolerance</span>
                                    </li></ul>
                              </div>
                          </div>
                      </div>
                    </div>
                    
                    <?php  $pheno_cnt= $pheno_cnt+1; } ?>
                  </div>
              </div>
          </div>
          <a class="carousel-control-prev" href="#trait<?php echo $cnt; ?>" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </a>
        </div>
      
      
      
      
    </div>
    
     <?php } ?>
    
    
  </div>
  
            		
            		
            		
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
