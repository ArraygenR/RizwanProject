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

    
.genetic_tabs.pgx_tabs .nav-item:first-child .nav-link {
    background-image: linear-gradient(68deg, #f48b9f 0%, #fb54e9 100%);
}
.genetic_tabs.pgx_tabs .nav-item .nav-link {
    color: #fff;
    /*
    padding: 25px 50px;
    border-radius: 20px;
    font-size: 1.25rem;
    font-weight: 500;*/
}
.genetic_tabs .nav-item .nav-link {
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

.genetic_tabs .nav-item {
    padding-right: 15px;
    margin-bottom: 15px;
}

.genetic_tabs.pgx_tabs .nav-item:last-child .nav-link {

    background-image: linear-gradient(68deg, #74cae4 0%, #86de96 100%);

}


.genetic_tabs.pgx_tabs .nav-item .nav-link.active::after {

    bottom: -10px;
    width: 90%;

}
.genetic_tabs .nav-item .nav-link.active::after {

    content: "";
    border-bottom: 5px solid #1094b5;
    border-radius: 20px;
    position: absolute;
    bottom: 0;
    height: 5px;
    width: 100%;
    left: 0;
    right: 0;
    margin: 0 auto;

}


.arrow_tabs .arrow_wrapper {
    position: relative;
    padding: 0 25px;
}
.hexagon_wrapper {
    width: 70px;
    height: 70px;
    text-align: center;
    position: absolute;
    top: -7px;
    left: -5px;
}
.arrow_tabs .arrow_wrapper:first-child .hexagon {
    background-color: #a9de97;
}
.arrow_tabs .arrow_wrapper:nth-child(2) .hexagon {
    background-color: #f5d49a;
}
.arrow_box .active::before {
    border-right: 20px solid #81c36b;
}
.arrow_tabs .arrow_wrapper:nth-child(2) .arrow_box.active::before {
    border-right: 20px solid #fab63f;
}
.arrow_tabs .arrow_wrapper:first-child .arrow_box.active::before {
    border-right: 20px solid #81c36b;
}
.arrow_tabs .arrow_wrapper:last-child .arrow_box.active::before {
    border-right: 20px solid #e388a6;
}
.hexagon_wrapper .hexagon {
    height: 100%;
    width: calc(100% * 0.57735);
    display: inline-block;
}
.arrow_tabs .arrow_wrapper:last-child .hexagon {
    background-color: #fbbbd0;
}
.hexagon_wrapper .hexagon::before {
    position: absolute;
    top: 0;
    right: calc((100% / 2) - ((100% * 0.57735) / 2));
    background-color: inherit;
    height: inherit;
    width: inherit;
    content: "";
    transform: rotateZ(60deg);
}

.arrow_tabs .arrow_wrapper:nth-child(2) .arrow_box.active {
    background-color: #fab63f;
}
.arrow_tabs .arrow_wrapper:first-child .arrow_box.active {
    background-color: #81c36b;
}
.arrow_tabs .arrow_wrapper:last-child .arrow_box.active {
    background-color: #e388a6;
}
.hexagon_wrapper .hexagon::after {

    position: absolute;
    top: 0;
    right: calc((100% / 2) - ((100% * 0.57735) / 2));
    background-color: inherit;
    height: inherit;
    width: inherit;
    content: "";
    transform: rotateZ(-60deg);

}
.arrow_tabs .arrow_wrapper .arrow_box {
    width: 200px;
    height: 55px;
    background: #efefef;
    position: relative;
}
.arrow_tabs .arrow_wrapper .arrow_box::before {
    content: "";
    position: absolute;
    left: -20px;
    bottom: 0;
    width: 0;
    height: 0;
    border-top: 27px solid transparent;
    border-right: 20px solid #efefef;
    border-bottom: 27px solid transparent;
}
.black {
    color: #1b1b1b;
}

.arrow_tabs .arrow_wrapper .arrow_box::after {

    content: "";
    position: absolute;
    right: 0;
    bottom: 0;
    width: 0;
    height: 0;
    border-top: 27px solid transparent;
    border-right: 20px solid #fff;
    border-bottom: 27px solid transparent;

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
          <li class="breadcrumb-item active">PGx Report</li>
        </ol>


               <!-- Page Content -->
        <?php if($_SESSION['role']=='Users'){ ?>
             <div class="row">
                <div class="col-md-12">
                  <div class="card mb-3">
            		<div class="card-header">
            			<img src="images/user_panel/pgx_report.png"> PGx Report
            		</div>
            		<div class="card-body">
            		
            		
            		
            		
            		
            		
            		
            		<div class="col-12">
      <ul class="nav nav-pills genetic_tabs pgx_tabs mb-3 mt30" role="tablist">
  <li class="nav-item">
  		    <a class="nav-link active" data-toggle="pill" href="#pgx_snapshot" >PGx Snapshot</a>
	    </li>
  <li class="nav-item">
  		    <a class="nav-link " data-toggle="pill" href="#pgx_summary">PGx Summary</a>
	    </li>
</ul>    

<div class="tab-content" >
    <div id="pgx_snapshot" class="tab-pane active">
  <div class="row">
    <div class="col-12">
      <ul class="nav nav-pills mt30 mb50 arrow_tabs" role="tablist">
        <li class="nav-item arrow_wrapper">
          <div class="hexagon_wrapper">
            <div class="hexagon"></div>
          </div>
          <a class="nav-link arrow_box d-flex" data-toggle="pill" href="#snapshot1">
            <span class="align-self-center justify-content-center black medium">Normal Response Expected</span>
          </a>
        </li>
        <li class="nav-item arrow_wrapper">
          <div class="hexagon_wrapper">
            <div class="hexagon"></div>
          </div>
          <a class="nav-link arrow_box d-flex" data-toggle="pill" href="#snapshot2">
            <span class="align-self-center justify-content-center black medium">Use With Caution</span>
          </a>
        </li>
        <li class="nav-item arrow_wrapper">
          <div class="hexagon_wrapper">
            <div class="hexagon"></div>
          </div>
          <a class="nav-link arrow_box d-flex active" data-toggle="pill" href="#snapshot3">
            <span class="align-self-center justify-content-center black medium">Use With Great Caution</span>
          </a>
        </li>                
      </ul>
    </div>
    <div class="col-12">
      <div class="tab-content" style="padding-top: 50px;">
        <div id="snapshot1" class="tab-pane">  
          <h6 class="medium">Normal Metabolizer</h6>
          <div class="table-responsive">
            <table class="table report_table">
              <thead>
                <tr class="table-info text-info">
                  <th>Category</th>
                  <th>Drug</th>
                </tr>
              </thead>
              <tbody>
                                    <tr>
                      <td><span>Cannabinoid</span></td>
                      <td><span>Dronabinol</span></td>
                    </tr>
                                      <tr>
                      <td><span>Sulfonylureas</span></td>
                      <td><span>Tolbutamide</span></td>
                    </tr>
                                      <tr>
                      <td><span>Antimicrobials</span></td>
                      <td><span>Efavirenz</span></td>
                    </tr>
                                      <tr>
                      <td><span>Antiretroviral</span></td>
                      <td><span>Atripla</span></td>
                    </tr>
                                      <tr>
                      <td><span>Anti-inflammatory</span></td>
                      <td><span>Celecoxib</span></td>
                    </tr>
                                      <tr>
                      <td><span>Anti-inflammatory</span></td>
                      <td><span>Flurbiprofen</span></td>
                    </tr>
                                      <tr>
                      <td><span>Anti-inflammatory</span></td>
                      <td><span>Piroxicam</span></td>
                    </tr>
                                      <tr>
                      <td><span>Nonsteroidal anti-inflammatory drug</span></td>
                      <td><span>Meloxicam</span></td>
                    </tr>
                                      <tr>
                      <td><span>Selective sphingosine-1-phosphate receptor modulator</span></td>
                      <td><span>Siponimod</span></td>
                    </tr>
                                      <tr>
                      <td><span>Serotonin receptor 1a agonist/serotonin receptor 2a antagonist</span></td>
                      <td><span>Flibanserin</span></td>
                    </tr>
                                      <tr>
                      <td><span>Urate transporter inhibitor</span></td>
                      <td><span>Lesinurad</span></td>
                    </tr>
                                </tbody>
            </table>
          </div> 
        </div>
        <div id="snapshot2" class="tab-pane"> 
          <h6 class="medium">Use With Caution</h6>
          <div class="table-responsive">
            <table class="table report_table">
              <thead>
                <tr class="table-info text-info">
                  <th>Category</th>
                  <th>Drug</th>
                  <th>Dosage Adjustment</th>
                  <th>Consider Alternative</th>
                </tr>
              </thead>
              <tbody>
                                    <tr>
                      <td><span>Sulfonylureas</span></td>
                      <td><span>Glibenclamide</span></td>
                      <td><span>-</span></td>
                      <td><span>-</span></td>
                    </tr>
                                      <tr>
                      <td><span>Sulfonylureas</span></td>
                      <td><span>Gliclazide</span></td>
                      <td><span>-</span></td>
                      <td><span>-</span></td>
                    </tr>
                                      <tr>
                      <td><span>Sulfonylureas</span></td>
                      <td><span>Glimepiride</span></td>
                      <td><span>-</span></td>
                      <td><span>-</span></td>
                    </tr>
                                      <tr>
                      <td><span>Proton pump inhibitor</span></td>
                      <td><span>Rabeprazole</span></td>
                      <td><span>-</span></td>
                      <td><span>-</span></td>
                    </tr>
                                      <tr>
                      <td><span>Antimicrobials</span></td>
                      <td><span>Voriconazole</span></td>
                      <td><span>Initiate with standard dose</span></td>
                      <td><span>-</span></td>
                    </tr>
                                      <tr>
                      <td><span>Antidepressant</span></td>
                      <td><span>Sertraline</span></td>
                      <td><span>Initiate with standard starting dose</span></td>
                      <td><span>-</span></td>
                    </tr>
                                      <tr>
                      <td><span>Selective serotonin reuptake inhibitor</span></td>
                      <td><span>Citalopram</span></td>
                      <td><span>Initiate with standard dose.</span></td>
                      <td><span>-</span></td>
                    </tr>
                                      <tr>
                      <td><span>Selective serotonin reuptake inhibitor</span></td>
                      <td><span>Escitalopram</span></td>
                      <td><span>Initiate with standard dose.</span></td>
                      <td><span>-</span></td>
                    </tr>
                                      <tr>
                      <td><span>Tricyclic antidepressant</span></td>
                      <td><span>Clomipramine</span></td>
                      <td><span>-</span></td>
                      <td><span>-</span></td>
                    </tr>
                                </tbody>
            </table>
          </div>
        </div>
        <div id="snapshot3" class="tab-pane active">
          <h6 class="medium">Use With Great Caution</h6>
          <div class="table-responsive">
            <table class="table report_table">
              <thead>
                <tr class="table-info text-info">
                  <th>Category</th>
                  <th>Drug</th>
                  <th>Dosage Adjustment</th>
                  <th>Consider Alternative</th>
                </tr>
              </thead>
              <tbody>
                                    <tr>
                      <td><span>Antiplatelets</span></td>
                      <td><span>Clopidogrel</span></td>
                      <td><span>-</span></td>
                      <td><span>Prasugrel,</span></td>
                    </tr>
                                      <tr>
                      <td><span>Antiplatelets</span></td>
                      <td><span>Ticagrelor</span></td>
                      <td><span>-</span></td>
                      <td><span>-</span></td>
                    </tr>
                                      <tr>
                      <td><span>Proton pump inhibitor</span></td>
                      <td><span>Dexlansoprazole</span></td>
                      <td><span>-</span></td>
                      <td><span>-</span></td>
                    </tr>
                                      <tr>
                      <td><span>Proton pump inhibitor</span></td>
                      <td><span>Esomeprazole</span></td>
                      <td><span>-</span></td>
                      <td><span>-</span></td>
                    </tr>
                                      <tr>
                      <td><span>Proton pump inhibitor</span></td>
                      <td><span>Lansoprazole</span></td>
                      <td><span>-</span></td>
                      <td><span>-</span></td>
                    </tr>
                                      <tr>
                      <td><span>Proton pump inhibitor</span></td>
                      <td><span>Omeprazole</span></td>
                      <td><span>-</span></td>
                      <td><span>-</span></td>
                    </tr>
                                      <tr>
                      <td><span>Proton pump inhibitor</span></td>
                      <td><span>Pantoprazole</span></td>
                      <td><span>-</span></td>
                      <td><span>-</span></td>
                    </tr>
                                      <tr>
                      <td><span>Immunosuppressant</span></td>
                      <td><span>Tacrolimus</span></td>
                      <td><span>1.5 to 2 times increased standard starting dose but the dose should not exceed 0.3mg/kg/day.</span></td>
                      <td><span>-</span></td>
                    </tr>
                                </tbody>
            </table>
          </div>  
        </div>
      </div>
    </div>
  </div>
</div>    
<div id="pgx_summary" class="tab-pane ">
  <div class="row">
    
  <div class="col-sm-7">
 <div class="form-group row justify-content-between"> 
        
    <label class=" col-sm-3 col-form-label">
      Select Category:     </label>
            <div class="col-md-9">
       
          <select data-live-search="" name="pgx_report[category]" id="category_list" class="selectpicker_js form-control" onchange="" data-width="100%" data-style="btn-default " data-container="body" data-size="6" title="Select Category" tabindex="-98"><option class="bs-title-option" value=""></option>
          <option data-subtext="" value="Anti-inflammatory">Anti-inflammatory      </option> 
        <option data-subtext="" value="Antidepressant">Antidepressant      </option> 
        <option data-subtext="" value="Antimicrobials">Antimicrobials      </option> 
        <option data-subtext="" value="Antiplatelets">Antiplatelets      </option> 
        <option data-subtext="" value="Antiretroviral">Antiretroviral      </option> 
        <option data-subtext="" value="Cannabinoid">Cannabinoid      </option> 
        <option data-subtext="" value="Immunosuppressant">Immunosuppressant      </option> 
        <option data-subtext="" value="Nonsteroidal anti-inflammatory drug">Nonsteroidal anti-inflammatory drug      </option> 
        <option data-subtext="" value="Proton pump inhibitor">Proton pump inhibitor      </option> 
        <option data-subtext="" value="Selective serotonin reuptake inhibitor">Selective serotonin reuptake inhibitor      </option> 
        <option data-subtext="" value="Selective sphingosine-1-phosphate receptor modulator">Selective sphingosine-1-phosphate receptor modulator      </option> 
        <option data-subtext="" value="Serotonin receptor 1a agonist/serotonin receptor 2a antagonist">Serotonin receptor 1a agonist/serotonin receptor 2a antagonist      </option> 
        <option data-subtext="" value="Sulfonylureas">Sulfonylureas      </option> 
        <option data-subtext="" value="Tricyclic antidepressant">Tricyclic antidepressant      </option> 
        <option data-subtext="" value="Urate transporter inhibitor">Urate transporter inhibitor      </option> 
    </select>
        </div>
     
  </div>

  </div>
    <!--<div class="col-sm-4">
      <a name="Clear" class="btn btn-sm btn_blue float-left mb-3" href="">
	<i class=""></i>  Clear</a>
    </div>-->
  </div>
  <div class="row">
  <div class="col-12" id="summary"><div class="row">
  <div class="col-12" id="summary">
    <h6 class="category_name">Urate transporter inhibitor</h6>
    <div class="table-responsive">
      <table class="table report_table">
        <thead >
          <tr class="table-info text-info">
            <th width="15%">Drug</th>
            <th width="18%">Interpretation</th>
            <th width="15%">Clinical Outcome<sup class="text-danger">*</sup></th>
            <th width="20%">Dosage Adjustment</th>
            <th width="20%">Consider Alternatives</th>
            <th width="10%">Scientific<br> Actions<sup class="text-danger">*</sup></th>
            <th width="2%"></th>
          </tr>
        </thead>
        <tbody>
                      <tr>
              <td>Lesinurad</td>

              <td>Normal Metabolizer</td>

                              <td class="green">Normal Metabolizer</td>
              
              <td>-</td>

              <td>-</td>

                              <td><center><img src="images/pgx_report/normal_meta.png" width="40px"><br>Consume</center></td>
                            <td><a href="user_pgx_detail.php"><i class="fa fa-chevron-right "></i></a></td>
            </tr>
                  </tbody>
      </table>
    </div>
    <p class="font12"><sup>*</sup>Primary Outcomes, Secondary outcomes and Scientific Actions are based on published literature, guidelines and tables.</p>
    <p class="font12"><img src="images/specialized.png"> Please read the Detailed Report for specialized recommendations.</p>
  </div>
</div></div>
</div></div> 
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
