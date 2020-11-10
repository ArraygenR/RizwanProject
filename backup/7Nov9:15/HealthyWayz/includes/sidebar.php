<?php 
session_start();
	include"includes/config.php"; 
	
?>

<style>
.toggled .nav-link1 img{
   /* text-align: center;
    padding: 0.75rem 1rem;
    width: 150px;*/
display: none;
}
.navbar-nav .nav-item.active  {
    background-color: #1094b5;
}

</style>
<script>
    $(function(){
    var current = location.pathname.replace('/HealthyWayz/','');
    $('.sidebar li a').each(function(){
        var this1 = $(this);
        // if the current path is like this link, make it active
       // alert(current);
        if(this1.attr('href').indexOf(current) !== -1){
            this1.parent().addClass('active');
            
        }
    })
})

</script>
<ul class="sidebar navbar-nav toggled">
      <!-- <li class="nav-item"><a class="nav-link1" href="#" target="_blank"><div class="col-md-2"></div>
        <div class="col-md-8"><img src="images/favicon.png" class="img-fluid"></div></a></li> -->
     <?php if($_SESSION['role']=='Admin') { ?>
      <li class="nav-item">
        <a class="nav-link" href="dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
         
          <span>Order Details</span>
        </a>
        <div class="dropdown-menu " aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="barcode.php">  <i class="fas fa-fw fa-barcode" ></i> Add/Edit Brcode</a>
            <div class="dropdown-divider"></div>
	        <a class="dropdown-item" href="view_order.php"> <i class="fa fa fa-eye text-muted" ></i> All Orders</a>    
	        <div class="dropdown-divider"></div>
	        <a class="dropdown-item" href="view_new_order.php"> <i class="fas fa-shopping-cart text-muted"></i> In Transit Report</a>    
	        <div class="dropdown-divider"></div>
	        <a class="dropdown-item" href="pending_kit_registration.php"> <i class="fas fa-user text-muted"></i> Pending Kit Regist..</a>
	        <div class="dropdown-divider"></div>
	        <a class="dropdown-item" href="return_pickup_address.php"> <i class="fas fa-truck text-muted"></i> Return Pickup Addr..</a>
	        <div class="dropdown-divider"></div>
	        <a class="dropdown-item" href="update_return_awb.php"> <i class="fas fa-list text-muted"></i> Return AWB No</a>
	        <div class="dropdown-divider"></div>
	        <a class="dropdown-item" href="recieved_to_company.php"> <i class="fas fa-reply text-muted"></i> Recieved to Comp..</a>
	        <div class="dropdown-divider"></div>
	        <a class="dropdown-item" href="forward_to_labs.php"> <i class="fas fa-paper-plane text-muted"></i> Forward to labs</a>
	        <div class="dropdown-divider"></div>
	        <a class="dropdown-item" href="raw_data_upload.php"> <i class="fas fa-industry text-muted"></i> Raw Data Upload</a>
	        <div class="dropdown-divider"></div>
	        <a class="dropdown-item" href="#"> <i class="fas fa-user-md text-muted"></i> Counselling Pending</a>
        </div>
      </li>
     <!-- <li class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-users" ></i>
          <span>Users</span>
        </a>
        <div class="dropdown-menu " aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="user.php"> <i class="fa fa fa-plus-circle text-muted" ></i> Add & Edit</a>
          <div class="dropdown-divider"></div>
	  <a class="dropdown-item" href="user_list.php"> <i class="fa fa fa-eye text-muted" ></i> View Details</a>    
        </div>
      </li>-->
       <li class="nav-item">
        <a class="nav-link" href="user.php">
           <i class="fas fa-fw fa-users" ></i>
          <span>Users</span>
        </a>
      </li>
     <li class="nav-item">
        <a class="nav-link" href="panel_dashboard.php">
          <i class='fas fa-fw fa-dna'></i>
          <span>Panel</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <img src = "images/analysis.png" style="max-width: 22px;height: auto;">
          <span>Analyze</span>
        </a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link" href="change_password.php">
          <i class="fas fa-fw fa-key" ></i>
          <span>Change Password</span></a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
	  <i class="fas fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>
    <?php }else if($_SESSION['role']=='Users'){ 
    
    $qry = "select * from `login` where `login`.`id`=".$_SESSION['login_id'] ;
                        $res = $conn->query($qry);
                        $row = $res->fetch_assoc();
    
    ?>  
    <style>
    @media (min-width: 768px){
        .sidebar.toggled .nav-item .nav-link span {
       /*     font-size: 0.85rem;*/
            display: block;
        }
        .sidebar.toggled {
    overflow: visible;
    width: 9% !important;
    
}
body.sidebar-toggled footer.sticky-footer {
    width: calc(100% - 8.5%);
}
}
    </style>
    
     <li class="nav-item">
        <a class="nav-link" href="client_dashboard.php">
          <img src="images/user_panel/dash.png">
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="user_details.php">
          <img src="images/user_panel/bio_icon.png">
          <span>Bio</span>
        </a>
      </li>
      <?php  if($row['order_status'] =='Dispatched'){ ?>
      <li class="nav-item">
        <a class="nav-link" href="user_genetic_snapshot.php">
          <img src="images/user_panel/genetic_snapshot.png">
          <span>Genetic Snapshot</span>
        </a>
      </li>
       <li class="nav-item"><!---->
       
        <a class="nav-link" <?php if(!isset($_SESSION['dna_report'])) { ?>href="" data-toggle="modal" data-target="#myModal" <?php }else{ ?>  href="user_dna_report.php" <?php } ?> >
          <img src="images/user_panel/dna_report.png">
          <span>DNA Report</span>
        </a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="user_pgx_report.php">
          <img src="images/user_panel/pgx_report.png">
          <span>PGX Report</span>
        </a>
      </li>-->
      <li class="nav-item">
        <a class="nav-link" href="user_recommendation_engine.php">
          <img src="images/user_panel/recommendation.png">
          <span>Recommendation Engine</span>
        </a>
      </li>
      <?php } ?>
       <li class="nav-item">
        <a class="nav-link" href="" data-toggle="modal" data-target="#HealthData">
          <img src="images/user_panel/health_history.png">
          <span>Health History</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
	        <img src="images/user_panel/logout.png">
            <span>Logout</span></a>
      </li>
   <?php } ?>
    
    </ul>
