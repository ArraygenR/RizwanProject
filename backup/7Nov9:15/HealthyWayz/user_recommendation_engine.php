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

.shadow_card {
    filter: drop-shadow(0.877px 1.798px 4px rgba(162, 196, 234, 0.4));
    border-radius: 20px;
    border: none;
}
.bg_green {
    background-color: #81c36b;
}
.bg_amber {
    background-color: #ffb16b;
}
.white {
    color: #fff;
}

.bg_peach {
    background-color: #fc6d6f;
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
          <li class="breadcrumb-item active">Recommendation Engine</li>
        </ol>


               <!-- Page Content -->
        <?php if($_SESSION['role']=='Users'){ ?>
             <div class="row">
                <div class="col-md-12">
                  <div class="card mb-3">
            		<div class="card-header">
            			<img src="images/user_panel/recommendation.png"> Recommendation Engine
            		</div>
            		<div class="card-body">
            		
            		
            		
 <ul class="nav nav-pills panel_tabs" role="tablist">
     
     
           <?php 
           $cnt=0;
         $qry = "select `panel_info`.* from `panel_info` join `panel_details` on `panel_info`.Name = `panel_details`.panel where `panel_details`.user_id='".$_SESSION['login_id']."' LIMIT 1";
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
            						$qry = "select `panel_info`.* from `panel_info` join `panel_details` on `panel_info`.Name = `panel_details`.panel where `panel_details`.user_id='".$_SESSION['login_id']."' LIMIT 1";
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
     
      
     <div id="nutrition" class="tab-pane active">
  <ul class="nav nav-pills mb-5">
    <li class="nav-item">
      <a class="nav-link active border border-primary mr-3 rounded-pill" data-toggle="pill" href="#macronutrient_distribution">Macronutrient Distribution</a>
    </li>
    <li class="nav-item">
      <a class="nav-link border border-primary mr-3 rounded-pill" data-toggle="pill" href="#micronutrient_distribution">Micronutrient Distribution</a>
    </li>
    <li class="nav-item">
      <a class="nav-link border border-primary mr-3 rounded-pill" data-toggle="pill" href="#eat_limit_avoid">Eat-Limit-Avoid</a>
    </li>
  </ul>
  <div class="tab-content">
    <div id="macronutrient_distribution" class="tab-pane active">
  <div class="mt30">
    <h5>Macronutrient Distribution</h5>
    <p class="nutrition_para">Macronutrients such as carbohydrates, proteins, and fats are the prime source of energy and growth in your body. Your genetics, coupled with your age, gender, and health goals determine the dietary quantity of these macronutrients. Based on your unique genetic makeup, these are your personalized macronutrient requirements.</p>
    <p>As per your age, gender, health goals and genetics, your diet should be made up of % carbohydrates, % protein, % MUFA, % PUFA and % SF.</p>
    <div class="macronutrient_chart">
      <div id="chartContainer"><div class="canvasjs-chart-container" style="position: relative; text-align: left; cursor: auto;"><canvas class="canvasjs-chart-canvas" width="1087" height="400" style="position: absolute; user-select: none;"></canvas><canvas class="canvasjs-chart-canvas" width="1087" height="400" style="position: absolute; user-select: none; cursor: default;"></canvas><div class="canvasjs-chart-toolbar" style="position: absolute; right: 1px; top: 1px; border: 1px solid transparent;"></div><div class="canvasjs-chart-tooltip" style="position: absolute; height: auto; box-shadow: rgba(0, 0, 0, 0.1) 1px 1px 2px 2px; z-index: 1000; pointer-events: none; display: none; border-radius: 5px;"><div style=" width: auto;height: auto;min-width: 50px;line-height: auto;margin: 0px 0px 0px 0px;padding: 5px;font-family: Calibri, Arial, Georgia, serif;font-weight: normal;font-style: italic;font-size: 14px;color: #000000;text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.1);text-align: left;border: 2px solid gray;background: rgba(255,255,255,.9);text-indent: 0px;white-space: nowrap;border-radius: 5px;-moz-user-select:none;-khtml-user-select: none;-webkit-user-select: none;-ms-user-select: none;user-select: none;} "> Sample Tooltip</div></div><a class="canvasjs-chart-credit" title="JavaScript Charts" style="outline:none;margin:0px;position:absolute;right:2px;top:386px;color:dimgrey;text-decoration:none;font-size:11px;font-family: Calibri, Lucida Grande, Lucida Sans Unicode, Arial, sans-serif" tabindex="-1" target="_blank" href="https://canvasjs.com/">CanvasJS.com</a></div></div>
      <div class="text-center" id="centerText" style="padding-top:38px">0 Kcal</div>
      
      
      <!--
  <div class="row">
      <div class="col-sm-3">
        <svg  viewbox="0 0 100 100">
          <circle cx="50" cy="50" r="45" fill="#FDB900"/>
          <path fill="none" stroke-linecap="round" stroke-width="5" stroke="#fff"
                stroke-dasharray="125.6" stroke-dashoffset="125.6"
                d="M50 10
                   a 40 40 0 0 1 0 80
                   a 40 40 0 0 1 0 -80"/>
          <text x="50" y="50" text-anchor="middle" dy="7" font-size="20" >50%</text>
        </svg>
      </div>
  </div>    
    

      -->
      
    </div>
  </div>
  <div class="mt30">
    <h6>Recommended Dietary Fiber Intake</h6>
    <p class="nutrition_para">Dietary fiber is a non-digestible carbohydrate found in food. Adequate consumption of fiber is important for optimal health. It promotes digestive health, improves energy levels, improves the gut microbiome, aids in weight loss, lowers bad cholesterol levels, controls blood sugar levels and helps reduce the risk of certain chronic disease conditions. It is found in whole grains, legumes, fruits, dried fruits, vegetables, and nuts and seeds.</p>
    <div class="table-responsive">

      <table class="table table-md report_table">
        <thead>
            <tr class="table-info text-info">
              <th>Age (Years)</th>
                           <th>Men</th>
                          </tr>
          </thead>
          <tbody>
                      <tr>
              <td>31 - 50</td>
                          <td style="text-transform: unset;">30.8 grams</td>
                         </tr>
                    </tbody>
      </table>
    </div>
  </div>
</div>

<script>
  var datatable = []</script>    <div id="micronutrient_distribution" class="tab-pane">
	<div class="mt30">
    <h5>Micronutrient Distribution</h5>
    <p class="nutrition_para">Micronutrients, although required in small amounts, play a monumental role in immunity building, and general health and wellbeing. How efficiently your body utilizes micronutrients such as vitamins, minerals, and antioxidants can be influenced by genetics. Based on your unique genetic makeup, these are your personalized micronutrient requirements. 
Your Genetically Modified Daily Allowance is the amount of the micronutrient you must consume in a day. The percentage of daily requirement tells you how much of the specified micronutrient requirement does one unit of the food item fulfil. 
For example: 1 guava takes care of 998% of your Vitamin C daily requirement, where thyme takes care of only 4%. So, you could eat a small amount of guava to fulfill your daily requirement but if you just ate some thyme, that wouldn’t be enough. You would have to consume some other Vitamin C food source along with it.</p>
    <div class="table-responsive">
      <table class="table table-md report_table">
        <thead>
          <tr class="table-info text-info">
            <th width="15%">Micronutrient</th>
            <th width="15%">Genetically Modified Daily Allowance</th>
            <th width="20%">Approx. Serving Size</th>
            <th width="15%">Percentage of Daily Requirement</th>
            <th width="35%">Description</th>
          </tr>
        </thead>
        <tbody>
                <!--   <tr>
            <td>Vitamin A</td>
            <td class="red">10mg</td>
            <td>Apple (250 gms)<br>Cod Liver Oil (10 ml)<br>Lorem ipsum (35 gms)</td>
            <td>50%<br>10%<br>20%</td>
            <td>lacinia at quis risus sed vulputate odio ut enim blandit volutpat maecenas volutpat blandit aliquam etiam erat velit scelerisque in dictum non</td>
          </tr>
          <tr>
            <td>Vitamin A</td>
            <td class="red">10mg</td>
            <td>Apple (250 gms)<br>Cod Liver Oil (10 ml)<br>Lorem ipsum (35 gms)</td>
            <td>50%<br>10%<br>20%</td>
            <td>lacinia at quis risus sed vulputate odio ut enim blandit volutpat maecenas volutpat blandit aliquam etiam erat velit scelerisque in dictum non</td>
          </tr>
          <tr>
            <td>Vitamin A</td>
            <td class="red">10mg</td>
            <td>Apple (250 gms)<br>Cod Liver Oil (10 ml)<br>Lorem ipsum (35 gms)</td>
            <td>50%<br>10%<br>20%</td>
            <td>lacinia at quis risus sed vulputate odio ut enim blandit volutpat maecenas volutpat blandit aliquam etiam erat velit scelerisque in dictum non</td>
          </tr> -->
        </tbody>
      </table>
    </div>
  </div>
</div>    <div id="eat_limit_avoid" class="tab-pane">
	<div class="mt-30">
    <h5>Eat - Limit - Avoid</h5>
    <p class="nutrition_para">Genetics dictate how you respond to the intake of various food items. A food item that is healthy for someone else might not be healthy for you. Therefore, your unique genotype dictates which food items you should regularly eat, which to limit and which to completely avoid.</p>
    <div class="row mb30">
    	<div class="col-sm-4">
     <select data-live-search="" name="category" id="" class="selectpicker_js form-control custom_border category_dropdown">
         <option class="bs-title-option" value=""></option>
          <option data-subtext="" value="1">Beverages      </option> 
        <option data-subtext="" value="2">Cereals &amp; Millets      </option> 
        <option data-subtext="" value="3">Condiments &amp; Spices      </option> 
        <option data-subtext="" value="4">Dairy Substitutes      </option> 
        <option data-subtext="" value="5">Edible Oil &amp; Fat      </option> 
        <option data-subtext="" value="6">Egg &amp; Egg products      </option> 
        <option data-subtext="" value="7">Fruits      </option> 
        <option data-subtext="" value="8">Green Leafy Vegetables      </option> 
        <option data-subtext="" value="9">Vegetables      </option> 
        <option data-subtext="" value="10">Legumes      </option> 
        <option data-subtext="" value="11">Milk &amp; Milk products      </option> 
        <option data-subtext="" value="12">Miscellaneous      </option> 
        <option data-subtext="" value="13">Mushrooms      </option> 
        <option data-subtext="" value="14">Nuts &amp; Oilseeds      </option> 
        <option data-subtext="" value="15">Animal Meat      </option> 
        <option data-subtext="" value="16">Poultry      </option> 
        <option data-subtext="" value="17">Roots &amp; Tubers      </option> 
        <option data-subtext="" value="18">Sea Food      </option> 
        <option data-subtext="" value="19">Sugars      </option> 
    </select>
    </div>
    <div class="eat_limit_avoid_blocks">
    	<h5 class="mb-3 category_name"></h5>
    	<div class="row">
      <div class="col-md-4">
        <div class="card card-default shadow_card bg_green white mb15 genetic_card">
          <div class="card-body">            
            <div>
            	<div>
            		<h4 class="mb-1 bold">Eat</h4>
            		<p>As per your genetics, these food items can be regularly included in your diet.</p>
            	</div>
            	<ul class="list-unstyled pl-0 m-0 eat_block_ul">
            		<li><h6 class="pb-3">Honey</h6></li>
            	</ul>                	
            </div>                        
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-default shadow_card bg_amber white mb15 genetic_card">
          <div class="card-body">
            <div>
            	<div>
            		<h4 class="mb-1 bold">Limit</h4>
            		<p>As per your genetics, these food items need to be limited to occasional consumption.</p>
            	</div>
            	<ul class="list-unstyled pl-0 m-0 limit_block_ul">
            		<li><h6 class="pb-3">Sugar</h6></li>
            		<li><h6 class="pb-3">Sugarcane</h6></li>
            		<li><h6 class="pb-3">Sugarcane Juice</h6></li>
            	</ul>               	
            </div> 
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-default shadow_card bg_peach white genetic_card">
          <div class="card-body">
            <div>
            	<div>
            		<h4 class="mb-1 bold">Avoid</h4>
            		<p>As per your genetics, these food items should be excluded from your diet as much as possible.</p>
            	</div>
            	<ul class="list-unstyled pl-0 m-0 avoid_block_ul">
            		<li><h6 class="pb-3">-</h6></li>
            		<li><h6 class="pb-3">-</h6></li>
            		<li><h6 class="pb-3">-</h6></li>
            	</ul>               	
            </div> 
          </div>
        </div>
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

var count = $(('#count'));
$({ Counter: 0 }).animate({ Counter: count.text() }, {
  duration: 5000,
  easing: 'linear',
  step: function () {
    count.text(Math.ceil(this.Counter)+ "%");
  }
});
</script>
</body>

</html>
