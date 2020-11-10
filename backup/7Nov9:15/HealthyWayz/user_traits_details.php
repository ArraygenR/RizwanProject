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
  .rounded_img img {
    border-radius: 15px;
    box-shadow: 0.877px 1.798px 4px rgba(162, 196, 234, 0.4);
    background-color: #ffd7d7;
    display: block;
    margin: 0 auto;
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
.gene-table{
                    border: 2px solid #cacaca;
                    padding: 5px 20px;
                    border-radius: 15px;
                    margin:5px 0px;
               }
               .gene-table-btn1{
                    border: 1px solid #0065aa;
                    padding: 8px;
                    border-radius: 15px;
                    background-color: #0065aa;
                    margin: 15px 0px;
                    color: white;
                    /*font-size: 20px;*/
               }
               .gene-table-btn2{
                    border: 1px solid #cacaca;
                    padding: 8px;
                    border-radius: 15px;
                    background-color: #cacaca;
                    margin:15px 0px;
                    color: white;
                    /*font-size: 20px;*/
               }
   
               .do{
                   border: 1px solid #00e339;
                   background-color: #f1ffea;
                   border-radius:15px;
                   margin:30px;
                   padding: 20px;
               }
               
               .dont{
                   border: 1px solid #ff8c8c;
                   background-color: #ffecde;
                   border-radius:15px;
                   padding: 20px;
                   margin:30px;
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
          <li class="breadcrumb-item">
            <a href="user_dna_report.php"> DNA Report</a>
          </li>
          <li class="breadcrumb-item active"> <?php echo $_GET['trait_name']; ?> </li>
        </ol>
<?php 


            $trait_img = "images/pdf_report/safetyResponse.jpg"; 
                $trait_desc = '';
                $qry_img = "select * from `traits_image` where traits = '".$_GET['trait_name']."'";
    			$res_img = $conn->query($qry_img);
    			$row_img = $res_img->fetch_assoc();
    			if ( $row_img['image'] != ''){
    			    $trait_img= $row_img['image'];
    			}
                
                if ( $row_img['description'] != ''){
    			    $trait_desc= $row_img['description'];
    			}

?>
        <!-- Page Content -->
               <!-- Page Content -->
                 <?php if($_SESSION['role']=='Users'){ ?>
             <div class="row">
                <div class="col-md-12">
                  <div class="card mb-3">
                    <div class="card-header">
                        <h2>
            		         <?php echo $_GET['trait_name']; ?>
            		         
            		    </h2>
                    </div>
            		<div class="card-body">
            		    <div class="row ">
            		        <div class="col-sm-9">
                            <div class="">
                              <h5><b>What is <?php echo $_GET['trait_name']; ?> ?</b></h5>
                              <p class=""> 
                              <?php echo $trait_desc; ?> 
                               </p>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="rounded_img">
                                    <img src="<?php echo $trait_img; ?>" class="img-fluid" width="200" height="200"> 
                                  </div>
                          </div>
                          </div>
            		      <div class="row">      
                              <div class="col-sm-3 risk" style="text-align: center;">
                                  <b>
                                  <div class="rating text-success">1</div>
                                <div>
                                  <i class="fas fa-square text-success" ></i>
                                  <i class="fas fa-square text-muted"></i>
                                  <i class="fas fa-square text-muted"></i>
                                  <i class="fas fa-square text-muted"></i>
                                  <i class="fas fa-square text-muted"></i>                       
                                 </div>
                                <span class="statu text-success">Excellent</span>
                                </b>
                              </div>
                              <div class="col-sm-9">
                                <div class="">
                                  <h5><b>Interpretation</b></h5>
                                  <p class="">As per your genotype, you have a slightly elevated risk of developing Obesity. People with this genotype should maintain a healthy weight, as obesity can further lead to osteoarthritis, heart disease, blood lipid abnormalities, stroke, type 2 diabetes, sleep apnea, reproductive problems, gallstones, and certain cancers.                                </p>
                                </div>
                              </div>
                            </div>  
            		    
            		    <hr>
            		    <div class="row">
            		        <div class="col-sm-12" style="text-align: center;">
            		             <h5><b>Symptoms</b></h5>
            		             <br/>
            		        </div>
            		       
            		        <div class="col-sm-12">
            		            <p>
            		                Above-average body weight, trouble sleeping, sleep apnea 
            		                (breathing is irregular and periodically stops during sleep),
            		                shortness of breath, varicose veins, skin problems caused by moisture that accumulates in the folds of your skin,
            		                gallstones, and osteoarthritis in weight-bearing joints, especially the knees.
            		            </p>
            		        </div>
            		        
            		    </div>
            		      <hr>
            		      <div class="row">
            		          <div class="col-sm-12" style="text-align: center;">
            		             <h5><b>Gene Table</b></h5>
            		             <br/>
            		             
            		             
            		        </div>
            		        
            		        <?php 
            		        $qry_gene = "select gene, genotype, description, traits from `panel` where traits = '".$_GET['trait_name']."'";
    			$res_gene = $conn->query($qry_gene);
    			while($row_gene = $res_gene->fetch_assoc()) { ?>
            		       <div class="col-sm-12">
            		           <div class="gene-table">
                                    <button class="btn gene-table-btn1">Gene Name: <?php echo $row_gene['gene']; ?> </button> 
                                     <button class="btn gene-table-btn2">Your Genotype:   <?php echo $row_gene['genotype']; ?></button>
                                
                                <div>
                                
                                  <p class="mb0"> <?php echo $row_gene['description']; ?></p>
                                </div>
                              </div>
            		           
            		       </div>
            		       <?php }?>
            		      </div>
            		       <hr>
            		      
            		       <div class="row">
            		           <div class="col-sm-12" style="text-align: center;">
            		             <h5><b>Do's and Don'ts</b></h5>
            		             <br/>
            		               </div>
            		             <div class="col-sm-12">
            		                 <div class="row">
            		                     <div class="col-sm-5 do">
            		                         <h5>
                                                Do's
                                            </h5>
                                            <p>
                                                <ul>
                                                    <li>Maintain intervals of 2.5-3 hours between each meal.</li>
                                                    <li>Increase the protein and fiber content in your meals so that excessive intake of simple carbohydrates and fats is avoided.</li>
                                                    <li>Maintain a good lifestyle, exercise regularly, and follow a healthy eating pattern.</li>
                                                </ul>
                                                
                                            </p>
            		                     </div>
            		                     <div class="col-sm-5 dont">
                                            <h5>
                                                Don'ts
                                            </h5>
                                            <p>
                                                <ul>
                                                    <li>Avoid intake of excessive amounts of simple carbohydrates, deep fried foods, and junk foods.</li>
                                                    <li>Avoid binging on empty calories, snacks with a high salt content, and high calorie meals.</li>
                                                    <li>Avoid improper chewing of food and finishing meals very quickly.</li>
                                                </ul>
                                            </p>
            		                     </div>
            		                 </div>
            		             </div>
            		     
            		           
            		           
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
