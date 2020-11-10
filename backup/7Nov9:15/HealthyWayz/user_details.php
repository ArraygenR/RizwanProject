<?php
   session_start();
   include"includes/config.php"; 
   
   if(!(isset($_SESSION['login_id']))){
   	header("location: index.php");
   }
   if($_SESSION['role']!='Admin'){
       $id = $_SESSION['login_id'];
    
   }else{
       $id = $_GET['id'];
   }
   
   
  print_r($arr);
   if($_SERVER["REQUEST_METHOD"] == "POST")
   {	
   
   if(isset($_POST['user_details']))
   {	
       
      		$qry = "select * from `user_details` where user_id='".$id."'";
      		$res = $conn->query($qry);
      		if($res->num_rows == 0)
      		{	
      			if($_FILES['photo']['tmp_name']!=''){
      				$imgData = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
              		}else{
      				$imgData='';
      			}
      			$qry = "select * from user_details where contact_no='".$_POST['contact_no']."'";
                  $res = $conn->query($qry);
                  if($res->num_rows == 0)
                  {
          		
          			
          			$sql="INSERT INTO `user_details` (`id`, `user_id`, `name`, `email`, `contact_no`, `dob`, `gender`, `organisation`, `designation`, `address`, `city`, `country`, `pincode`, `photo`, `weight`, `fat_percentage`, `rhr`, `bmi`, `blood_group`, `physical_activity`, `type_of_exercises`, `exercise_details`, `diet_preference`, `eat_out`, `consume_packaged_foods`, `food_sensitivities`, `supplements`, `water_intake`, `consume_tobacco`, `consume_alcohol`, `sleep`, `improve_health`, `improve_health_details`) VALUES  (NULL, '".$id."', '".$_POST['name']."', '".$_POST['email']."', '".$_POST['contact_no']."', '".$_POST['dob']."', '".$_POST['gender']."', '".$_POST['organisation']."', '".$_POST['designation']."', '".$_POST['address']."', '".$_POST['city']."', '".$_POST['country']."','".$_POST['pincode']."', '$imgData', '".$_POST['weight']."', '".$_POST['fat_percentage']."', '".$_POST['rhr']."', '".$_POST['bmi']."', '".$_POST['blood_group']."', '".$_POST['physical_activity']."', '".$_POST['type_of_exercises']."', '".$_POST['exercise_details']."', '".$_POST['diet_preference']."', '".$_POST['eat_out']."', '".$_POST['consume_packaged_foods']."', '".$_POST['food_sensitivities']."', '".$_POST['supplements']."', '".$_POST['water_intake']."', '".$_POST['consume_tobacco']."', '".$_POST['consume_alcohol']."', '".$_POST['sleep']."', '".$_POST['improve_health']."', '".$_POST['improve_health_details']."')";
          			
          			
          			if ($conn->query($sql) === TRUE) {
          			   $msg= "Updated successfully";
          			}
          			    $arr=array();
                       $qry_panel = "select Name from `panel_info` where 1";
                       $res_panel = $conn->query($qry_panel);
                        while($row_panel = $res_panel->fetch_assoc()) {
                        	array_push($arr,$row_panel['Name']);
                      }
                                      foreach ($arr as &$value) {
              			                $sql = "INSERT INTO `panel_details` (`id`, `user_id`, `panel`) VALUES (NULL, '".$id."', '".$value."')";
              			                //echo $sql;
              			                $conn->query($sql);
                                      }
                      $sql = "UPDATE `login` SET  `uname`='".$_POST['email']."' , mobile_no = '".$_POST['mobile_no']."' where `id`='".$id."' ";
          			$conn->query($sql);	
                  }else{
                      $err="Your Contact Number Already Exists...";
                  }  
      		}else{
      			
      			if($_FILES['photo']['tmp_name']!=''){
      				$imgData = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
      				
                    /*  $sql = "UPDATE `user_details` SET  `name`='".$_POST['name']."', `contact_no`='".$_POST['contact_no']."',`dob` = '".$_POST['dob']."', `gender` = '".$_POST['gender']."',
                      `organisation` = '".$_POST['organisation']."', `designation` = '".$_POST['designation']."',`address`='".$_POST['address']."', `city`='".$_POST['city']."', `country`='".$_POST['country']."', `photo`='$imgData',email='".$_POST['email']."', pincode='".$_POST['pincode']."' where `user_id`='".$id."'";
                    */
                    $sql= "UPDATE `user_details` SET `name` = '".$_POST['name']."',email='".$_POST['email']."' , `contact_no` = '".$_POST['contact_no']."', 
      				`dob` = '".$_POST['dob']."', `gender` = '".$_POST['gender']."', `organisation` = '".$_POST['organisation']."', 
      				`designation` = '".$_POST['designation']."', `address` = '".$_POST['address']."', `city` = '".$_POST['city']."', 
      				`country` = '".$_POST['country']."', `pincode` = '".$_POST['pincode']."', `weight` = '".$_POST['weight']."', 
      				`fat_percentage` = '".$_POST['fat_percentage']."', `rhr` = '".$_POST['rhr']."', `bmi` = '".$_POST['bmi']."', 
      				`blood_group` = '".$_POST['blood_group']."', `physical_activity` = '".$_POST['physical_activity']."',
      				`type_of_exercises` = '".$_POST['type_of_exercises']."',	`exercise_details` = '".$_POST['exercise_details']."', 
      				`diet_preference` = '".$_POST['diet_preference']."',`eat_out` = '".$_POST['eat_out']."', `photo`='$imgData',
      				`consume_packaged_foods` = '".$_POST['consume_packaged_foods']."', `food_sensitivities` = '".$_POST['food_sensitivities']."',
      				`supplements` = '".$_POST['supplements']."', `water_intake` = '".$_POST['water_intake']."', `consume_tobacco` = '".$_POST['consume_tobacco']."', 
      				`consume_alcohol` = '".$_POST['consume_alcohol']."', `sleep` = '".$_POST['sleep']."', `improve_health` = '".$_POST['improve_health']."', 
      				`improve_health_details` = '".$_POST['improve_health_details']."' WHERE `user_details`.`user_id` = '".$id."' ";
              	}else{
      				/*	$sql = "UPDATE `user_details` SET  `name`='".$_POST['name']."', `contact_no`='".$_POST['contact_no']."' ,`dob` = '".$_POST['dob']."', `gender` = '".$_POST['gender']."', 
      					`organisation` = '".$_POST['organisation']."', `designation` = '".$_POST['designation']."',`address`='".$_POST['address']."', `city`='".$_POST['city']."', `country`='".$_POST['country']."', email='".$_POST['email']."', pincode='".$_POST['pincode']."' where `user_id`='".$id."' ";
      				*/
      				$sql= "UPDATE `user_details` SET `name` = '".$_POST['name']."',email='".$_POST['email']."' , `contact_no` = '".$_POST['contact_no']."', 
      				`dob` = '".$_POST['dob']."', `gender` = '".$_POST['gender']."', `organisation` = '".$_POST['organisation']."', 
      				`designation` = '".$_POST['designation']."', `address` = '".$_POST['address']."', `city` = '".$_POST['city']."', 
      				`country` = '".$_POST['country']."', `pincode` = '".$_POST['pincode']."', `weight` = '".$_POST['weight']."', 
      				`fat_percentage` = '".$_POST['fat_percentage']."', `rhr` = '".$_POST['rhr']."', `bmi` = '".$_POST['bmi']."', 
      				`blood_group` = '".$_POST['blood_group']."', `physical_activity` = '".$_POST['physical_activity']."',
      				`type_of_exercises` = '".$_POST['type_of_exercises']."',	`exercise_details` = '".$_POST['exercise_details']."', 
      				`diet_preference` = '".$_POST['diet_preference']."',`eat_out` = '".$_POST['eat_out']."', 
      				`consume_packaged_foods` = '".$_POST['consume_packaged_foods']."', `food_sensitivities` = '".$_POST['food_sensitivities']."',
      				`supplements` = '".$_POST['supplements']."', `water_intake` = '".$_POST['water_intake']."', `consume_tobacco` = '".$_POST['consume_tobacco']."', 
      				`consume_alcohol` = '".$_POST['consume_alcohol']."', `sleep` = '".$_POST['sleep']."', `improve_health` = '".$_POST['improve_health']."', 
      				`improve_health_details` = '".$_POST['improve_health_details']."' WHERE `user_details`.`user_id` = '".$id."' ";
      			}
      			 //echo $sql;
      			if ($conn->query($sql) === TRUE) {
      			    $msg= "Profile Updated successfully";
      			}
      			$sql = "UPDATE `login` SET  `uname`='".$_POST['email']."' , mobile_no = '".$_POST['mobile_no']."' where `id`='".$id."' ";
          		$conn->query($sql);	
      		}
         
   }
   
   if(isset($_POST['panel_details'])){
   
   	if(isset($_GET['panel_id'])){
   		$sql = "UPDATE`panel_details` SET `panel`='".$_POST['panel']."'  where `id`='".$_GET['panel_id']."'";
   		//echo $sql;
   		if ($conn->query($sql) === TRUE) {
   			$msg_t= "Panel Info Updated successfully";
   			header("location: user_details.php?id=".$id."&uname=".$_GET['uname']);
   		}
   
   	}else{
   		$sql = "INSERT INTO `panel_details` (`id`, `user_id`, `panel`) VALUES (NULL, '".$id."', '".$_POST['panel']."')";
   		if ($conn->query($sql) === TRUE) {
   			$msg_t= "Panel Details Added successfully";
   		}
   	}
   }
   
   }
   if(isset($_GET['panel_id_delete']))	{
       $qry = "delete from panel_details where id='".$_GET['panel_id_delete']."'";
       if ($conn->query($qry) === TRUE) {
       	header("location: user_details.php?id=".$id."&uname=".$_GET['uname']);	
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
      <title>Gene-Thing</title>
      <!-- Custom fonts for this template-->
      <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <!-- Page level plugin CSS-->
      <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
      <!-- Custom styles for this template-->
      <link href="css/sb-admin.css" rel="stylesheet">
      <style>
         .picture-container{
         position: relative;
         cursor: pointer;
         text-align: center;
         }
         .picture{
         border: 4px solid #CCCCCC;
         color: #FFFFFF;
         margin: 0px auto;
         overflow: hidden;
         transition: all 0.2s;
         -webkit-transition: all 0.2s;
         border-radius: 100%;
         }
         .picture:hover{
         border-color: #2ca8ff;
         }
         .content.ct-wizard-green .picture:hover{
         border-color: #05ae0e;
         }
         .content.ct-wizard-blue .picture:hover{
         border-color: #3472f7;
         }
         .content.ct-wizard-orange .picture:hover{
         border-color: #ff9500;
         }
         .content.ct-wizard-red .picture:hover{
         border-color: #ff3b30;
         }
         .picture input[type="file"] {
         cursor: pointer;
         display: block;
         height: 100%;
         left: 0;
         opacity: 0 !important;
         position: absolute;
         top: 0;
         width: 100%;
         border-radius: 100%;
         }
         .picture-src{
         width: 100%;
         }
         .bottomright {
             position: absolute;
                bottom: 40px;
                font-size: 18px;
                background-color: #ccc;
                padding: 5px;
                border-radius: 50%;
                width: 40px;
                height: 40px;
                right: -1px;

         }
         /*Profile Pic End*/
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
               <?php if($_SESSION['role']=='Admin') { ?>
               <li class="breadcrumb-item">
                  <a href="dashboard.php">Dashboard</a>
               </li>
               <li class="breadcrumb-item">
                  <a href="user.php">Users</a>
               </li>
               <li class="breadcrumb-item active">User Details</li>
               <?php }else if($_SESSION['role']=='Users'){ ?>
               <li class="breadcrumb-item active">My Profile</li>
               <?php } ?>
            </ol>
            <?php if(($_SESSION['role']=='Admin') || ($id==$_SESSION['login_id'] && $_GET['uname']==$_SESSION['uname']) ){ ?>
            <?php if(!(isset($_GET['update']))){ ?>
            <!-- Page Content -->
            <div class="card mb-3">
               <div class="card-header">
                  <i class="fas fa-user"></i>
                  Update Details
               </div>
               <div class="card-body">
                  <?php 
                     $mobile_no = '';
                     $qry = "select * from `login` where id='".$id."'";
                     $res = $conn->query($qry);
                     if($res->num_rows != 0)
                     {
                       		while($row = $res->fetch_assoc()) {
                       		    $mobile_no=$row['mobile_no'];
                       		}
                     }
                     
                     $photo='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';
                     $photo=base64_decode($photo);
                     
                     
                     $name=""; $email=""; $contact_no=""; $dob=""; $gender=""; $organisation=""; $designation=""; 
                     $address=""; $city=""; $country=""; $pincode=""; $weight=""; $fat_percentage=""; $rhr=""; $bmi=""; 
                     $blood_group=""; $physical_activity=""; $type_of_exercises=""; $exercise_details=""; 
                     $diet_preference=""; $eat_out=""; $consume_packaged_foods=""; $food_sensitivities=""; 
                     $supplements=""; $water_intake=""; $consume_tobacco=""; $consume_alcohol=""; $sleep=""; 
                     $improve_health=""; $improve_health_details="";
                     
                     
                     $qry = "select * from `user_details` where user_id='".$id."'";
                     $res = $conn->query($qry);
                     if($res->num_rows != 0)
                     {	
                     	while($row = $res->fetch_assoc()) {
                     		$name=$row['name'];$email=$row['email'];$contact_no=$row['contact_no'];
                     		$dob=$row['dob'];$gender=$row['gender'];$organisation=$row['organisation'];$destination=$row['designation'];
                     		$address=$row['address'];$country=$row['country'];$city=$row['city'];$pincode=$row['pincode'];
                     		$weight=$row['weight']; $fat_percentage=$row['fat_percentage']; $rhr=$row['rhr']; $bmi=$row['bmi']; $blood_group=$row['blood_group']; 
                     		$physical_activity=$row['physical_activity']; $type_of_exercises=$row['type_of_exercises']; $exercise_details=$row['exercise_details'];
                     		$diet_preference=$row['diet_preference']; 	$eat_out=$row['eat_out']; $consume_packaged_foods=$row['consume_packaged_foods']; 
                     		$food_sensitivities=$row['food_sensitivities']; $supplements=$row['supplements'];
                     		$water_intake=$row['water_intake']; $consume_tobacco=$row['consume_tobacco']; 
                     		$consume_alcohol=$row['consume_alcohol']; $sleep=$row['sleep']; $improve_health=$row['improve_health']; 
                     		$improve_health_details=$row['improve_health_details'];
                     		if($row['photo']!=NULL)$photo=$row['photo'];
                     		
                     	}
                     } 
                     ?>
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
                     }?>
                  <form method="POST" enctype="multipart/form-data" autocomplete="off">
                      
                      <!-- New Form Starts Here --->
                      <div class="row">
                          <!-- First half -->
                          <div class="col-sm-6 ">
                              <div class="col-sm-12">
                                     <hr>
                                     <b style="position: absolute;margin-top: -30px;background-color: white;"><i class="fa fa-dot-circle"></i> Personal Details&nbsp;&nbsp;&nbsp;</b>
                                     <br>
                                  </div>
                              <div class="row">
                                  <div class="col-sm-4">
                                     <div class="picture-container">
                                        <div class="picture">
                                           <div class="bottomright"><a href="#" class="icon" title="Edit Profile Image">
                                              <i class="fa fa-pen"></i>
                                              </a>
                                           </div>
                                           <img src="data:image/png;base64,<?php echo base64_encode($photo); ?>" class="picture-src" id="wizardPicturePreview"  title="">
                                           <input type="file" id="wizard-picture"  name="photo" class="">
                                        </div>
                                        <label class="">Upload Picture</label>
                                     </div>
                                  </div>
                                  <div class="col-sm-8">
                                       <div class="form-group">
                                          <label for="inputName">Name *</label>
                                          <input type="text" id="inputName" class="form-control" placeholder="" required="required" name="name" value='<?php echo $name; ?>'>
                                       </div>
                                       <div class="form-group">
                                          <label for="inputEmail">Email *</label>
                                          <input type="email" id="inputEmail" class="form-control"
                                             placeholder="" value="<?php if($_GET['uname']!='')echo $_GET['uname'];else echo $email; ?>" name="email" required="required">
                                       </div>
                                  </div>
                                  <div class="col-sm-4">
                                      
                                     <div class="form-group">
                                          <label for="sel1">Gender *</label>
                                          <select class="form-control" id="sel1" name="gender" required = "required">
                                             <option>--- Select Gender ---</option>
                                             <option value ="Male" <?php if($gender == "Male") echo "selected"; ?>>Male</option>
                                             <option value="Female" <?php if($gender == "Female") echo "selected"; ?> >Female</option>
                                             <option value="Not disclosed" <?php if($gender == "Not disclosed") echo "selected"; ?> >Not disclosed</option>
                                             <option value="Not specified" <?php if($gender == "Not specified") echo "selected"; ?> >Not specified</option>
                                             <option value="Other" <?php if($gender == "Other") echo "selected"; ?> >Other</option>
                                          </select>
                                       </div>
                                      
                                  </div>
                                  <div class="col-sm-8">
                                      <div class="row">
                                          <div class="col-sm-6">
                                              <div class="form-group">
                                                  <label for="inputContactNo">Contact No.1 *</label>
                                                  <input type="number" id="inputContactNo" class="form-control"
                                                     placeholder="" value='<?php echo $mobile_no; ?>' name="mobile_no" required="required" > 
                                               </div>
                                          </div>
                                          <div class="col-sm-6">
                                              <div class="form-group">
                                                  <label for="inputContactNo">Contact No.2 </label>
                                                  <input type="number" id="inputContactNo" class="form-control"
                                                     placeholder="" value='<?php echo $contact_no; ?>' name="contact_no"> 
                                               </div>
                                          </div>
                                          <div class="col-sm-6">
                                              <div class="form-group">
                                                  <label for="inputDate">Date of Birth *</label>
                                                  <input type="date" id="dob" class="form-control"
                                                     placeholder="" required="required" name="dob" value='<?php echo $dob; ?>'>
                                               </div>
                                          </div>
                                          
                                          <div class="col-sm-6">
                                               <div class="form-group">
                                                  <label for="inputAge">Age *</label>
                                                  <input type="text" id="age" class="form-control"
                                                     placeholder="" value='' name="age"required="required" readonly> 
                                               </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-sm-12">
                                       <div class="col-sm-12">
                                          <hr>
                                          <b style="position: absolute;margin-top: -30px;background-color: white;"><i class="fa fa-dot-circle"></i> Address Details&nbsp;&nbsp;&nbsp;</b>
                                          <br>
                                       </div>
                                       <div class="form-group">
                                           <label for="inputAddress">Address for sample to be picked up *</label>
                                           <textarea type="text" id="inputAddress" class="form-control" rows="2" placeholder="" name="address" required=""><?php echo $address; ?></textarea>
                                        </div>
                                        <div class="row">
                                           <div class="col-sm-4">
                                              <div class="form-group">
                                                 <label for="inputCity">Current city *</label>
                                                 <input type="text" id="inputCity" class="form-control" value="<?php echo $city; ?>" placeholder="" name="city" required="">
                                              </div>
                                           </div>
                                           <div class="col-sm-4">
                                              <div class="form-group">
                                                 <label for="inputCountry">Current country *</label>
                                                 <input type="text" id="inputCountry" class="form-control" value="<?php echo $country; ?>" placeholder="" name="country" required="">
                                              </div>
                                           </div>
                                           <div class="col-sm-4">
                                              <div class="form-group">
                                                 <label for="inputPincode">Pincode *</label>
                                                 <input type="text" id="inputPincode" class="form-control" placeholder="" value="<?php echo $pincode; ?>" name="pincode" required>
                                              </div>
                                           </div>
                                        </div>
                                        <div class="col-sm-12">
                                          <hr>
                                          <b style="position: absolute;margin-top: -30px;background-color: white;"><i class="fa fa-dot-circle"></i> Health Information&nbsp;&nbsp;&nbsp;</b>
                                          <br>
                                       </div>
                                       
                                       
                                        <div class ="row">
                                           <div class="col-sm-4">
                                              <div class="form-group">
                                                 <label for="inputWeight">Weight(kg) </label>
                                                 <input type="text" id="inputWeight" class="form-control"
                                                    placeholder="" value='<?php echo $weight; ?>' name="weight" > 
                                              </div>
                                           </div>
                                           <div class="col-sm-4">
                                              <div class="form-group">
                                                 <label for="inputFat"> Fat Percentage </label>
                                                 <input type="text" id="inputFat" class="form-control"
                                                    placeholder="" value="<?php echo $fat_percentage; ?>" name="fat_percentage" >
                                              </div>
                                           </div>
                                           <div class="col-sm-4">
                                              <div class="form-group">
                                                 <label for="inputRestingHeartRate "> Resting Heart Rate </label>
                                                 <input type="text" id="inputRestingHeartRate" class="form-control"
                                                    placeholder="" value="<?php echo $rhr; ?>" name="rhr">
                                              </div>
                                           </div>
                                           <div class="col-sm-6">
                                              <div class="form-group">
                                                 <label for="inputBMI"> Body Mass Index (BMI) </label>
                                                 <input type="text" id="inputBMI" class="form-control"
                                                    placeholder="" value='<?php echo $bmi; ?>' name="bmi"> 
                                              </div>
                                           </div>
                                           
                                           <div class="col-sm-6">
                                              <div class="form-group">
                                                 <label for="blood_group">Blood Group </label>
                                                 <select class="form-control" id="blood_group" name="blood_group">
                                                    <option>--- Select Blood Group  ---</option>
                                                    <option value ="A+" <?php if($blood_group == "A+") echo "selected"; ?>>A+</option>
                                                    <option value="A-" <?php if($blood_group == "A-") echo "selected"; ?> >A-</option>
                                                    <option value="AB+" <?php if($blood_group == "AB+") echo "selected"; ?> >AB+</option>
                                                    <option value="AB-" <?php if($blood_group == "AB-") echo "selected"; ?> >AB-</option>
                                                    <option value="B+" <?php if($blood_group == "B+") echo "selected"; ?> >B+</option>
                                                    <option value="B-" <?php if($blood_group == "B-") echo "selected"; ?> >B-</option>
                                                    <option value="O+" <?php if($blood_group == "O+") echo "selected"; ?> >O+</option>
                                                    <option value="O-" <?php if($blood_group == "O-") echo "selected"; ?> >O-</option>
                                                 </select>
                                              </div>
                                           </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                          <hr>
                                          <b style="position: absolute;margin-top: -30px;background-color: white;"><i class="fa fa-dot-circle"></i> Work Place Details&nbsp;&nbsp;&nbsp;</b>
                                          <br>
                                        </div>
                                        <div class="row">
                                           <div class="col-sm-6">
                                              <div class="form-group">
                                                 <label for="inputOrganisation">Organisation</label>
                                                 <input type="text" id="inputOrganisation" class="form-control"
                                                    placeholder="" value="<?php echo $organisation; ?>" name="organisation">
                                              </div>
                                           </div>
                                           <div class="col-sm-6">
                                              <div class="form-group">
                                                 <label for="inputDesignation">Designation</label>
                                                 <input type="text" id="inputDesignation" class="form-control"
                                                    placeholder="" value="<?php echo $destination; ?>" name="designation">
                                              </div>
                                           </div>
                                        </div>
                                  </div>
                                  
                              </div>
                              
                          </div>
                           <!-- First half ends here-->
                           
                            <!-- Second half -->
                          <div class="col-sm-6 ">
                              <div class="col-sm-12">
                                  <hr>
                                  <b style="position: absolute;margin-top: -30px;background-color: white;"><i class="fa fa-dot-circle"></i> My Lifestyle & Dietary Habits&nbsp;&nbsp;&nbsp;</b>
                                  <br>
                               </div>
                               <div class="form-group">
                                 <label for="physical_activity">The option which best describes your physical activity levels </label>
                                 <select class="form-control" id="physical_activity" name="physical_activity" >
                                    <option>-- Select your physical activity levels  --</option>
                                    <option value ="Sedentary - Little or no exercise" <?php if($physical_activity == "Sedentary - Little or no exercise") echo "selected"; ?>>Sedentary - Little or no exercise</option>
                                    <option value="Lightly active (light exercise or sports 1-3 days/week)" <?php if($physical_activity == "Lightly active (light exercise or sports 1-3 days/week)") echo "selected"; ?> >Lightly active (light exercise or sports 1-3 days/week)</option>
                                    <option value="Moderately active (moderate exercise 3-5 days/week)" <?php if($physical_activity == "Moderately active (moderate exercise 3-5 days/week)") echo "selected"; ?> >Moderately active (moderate exercise 3-5 days/week)</option>
                                    <option value="Very active (hard exercise 6-7 days/week)" <?php if($physical_activity == "Very active (hard exercise 6-7 days/week)") echo "selected"; ?> >Very active (hard exercise 6-7 days/week)</option>
                                    <option value="Highly active (very hard exercise 6-7 days/week and a physical job)" <?php if($physical_activity == "Highly active (very hard exercise 6-7 days/week and a physical job)") echo "selected"; ?> >Highly active (very hard exercise 6-7 days/week and a physical job)</option>
                                 </select>
                              </div>
                              <div class="form-group">
                                   <label> What type of exercises do you undertake to stay active? </label>
                                   <div>
                                       <div class="form-check-inline">
                                          <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="type_of_exercises" value="Indoor Activity" <?php if($type_of_exercises == "Indoor Activity") echo "checked"; ?>>Indoor Activity
                                          </label>
                                        </div>
                                        <div class="form-check-inline">
                                          <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="type_of_exercises" value="Outdoor Activity" <?php if($type_of_exercises == "Outdoor Activity") echo "checked"; ?>>Outdoor Activity
                                          </label>
                                        </div>
                                        <div class="form-check-inline disabled">
                                          <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="type_of_exercises" value="Other" <?php if($type_of_exercises == "Other") echo "checked"; ?>>Other
                                          </label>
                                        </div> 
                                   </div>
                                   <div>
                                       <div class="form-group">
                                            <input type="text" id="inputExerciseDetails" class="form-control" placeholder="Exercise Details (Ex : Yoga, Gym, Running , Cycling etc)" value="<?php echo $exercise_details; ?>" name="exercise_details">
                                        </div>
                                   </div>
                              </div>
                               <div class="form-group">
                                 <label for="diet_preference">What is your diet preference?</label>
                                 <select class="form-control" id="diet_preference" name="diet_preference" >
                                    <option>-- Select your diet preference  --</option>
                                    <option value ="Vegetarian" <?php if($diet_preference == "Vegetarian") echo "selected"; ?>>Vegetarian</option>
                                    <option value="Non-Vegetarian" <?php if($diet_preference== "Non-Vegetarian") echo "selected"; ?> >Non-Vegetarian</option>
                                    <option value="Ovo-Vegetarian (a diet that includes eggs and egg-derived ingredients)" <?php if($diet_preference == "Ovo-Vegetarian (a diet that includes eggs and egg-derived ingredients)") echo "selected"; ?> >Ovo-Vegetarian (a diet that includes eggs and egg-derived ingredients)</option>
                                    <option value="Vegan (A diet that only includes foods derived from plants; all animal products are excluded, e.g. dairy products and eggs)" <?php if($diet_preference == "Vegan (A diet that only includes foods derived from plants; all animal products are excluded, e.g. dairy products and eggs)") echo "selected"; ?> >Vegan (A diet that only includes foods derived from plants; all animal products are excluded, e.g. dairy products and eggs)</option>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label for="eat_out">How often do you eat out?</label>
                                 <select class="form-control" id="eat_out" name="eat_out" >
                                    <option>-- Select How often do you eat out  --</option>
                                    <option value ="Daily" <?php if($eat_out == "Daily") echo "selected"; ?>>Daily</option>
                                    <option value="2-3 times during a week" <?php if($eat_out == "2-3 times during a week") echo "selected"; ?> >2-3 times during a week</option>
                                    <option value="4- 6 times during a week" <?php if($eat_out == "4- 6 times during a week") echo "selected"; ?> >4- 6 times during a week</option>
                                    <option value="Once in a week" <?php if($eat_out == "Once in a week") echo "selected"; ?> >Once in a week</option>
                                    <option value="Never" <?php if($eat_out == "Never") echo "selected"; ?> >Never</option>
                                 </select>
                              </div>
                              
                              <div class="form-group">
                                 <label for="consume_packaged_foods"> How often do you consume packaged foods? </label>
                                 <select class="form-control" id="consume_packaged_foods" name="consume_packaged_foods" >
                                    <option>-- Select How often do you consume packaged foods  --</option>
                                    <option value ="Daily" <?php if($consume_packaged_foods == "Daily") echo "selected"; ?>>Daily</option>
                                    <option value="2-3 times during a week" <?php if($consume_packaged_foods == "2-3 times during a week") echo "selected"; ?> >2-3 times during a week</option>
                                    <option value="4- 6 times during a week" <?php if($consume_packaged_foods == "4- 6 times during a week") echo "selected"; ?> >4- 6 times during a week</option>
                                    <option value="Once in a week" <?php if($consume_packaged_foods == "Once in a week") echo "selected"; ?> >Once in a week</option>
                                    <option value="Never" <?php if($consume_packaged_foods == "Never") echo "selected"; ?> >Never</option>
                                 </select>
                              </div>
                              
                              <div class="form-group">
                                 <label for="food_sensitivities">  Do you have any food sensitivities and/or allergies?  </label>
                                 <input class="form-control" id="food_sensitivities" list="food_sensitivities_d" value="<?php echo $food_sensitivities; ?>" name="food_sensitivities" multiple="multiple" placeholder="Ex: Dust,Egg">
                                 <datalist id="food_sensitivities_d">
                                    <option value ="Pollen">
                                    <option value ="Dust" >
                                    <option value ="Egg">
                                    <option value ="Nuts">
                                    <option value ="No known food sensitivities/allergien">
                                </datalist>    
                              </div>
                              
                              <div class="form-group">
                                 <label for="supplements"> Do you take any supplements? </label>
                                 <input class="form-control" id="supplements" list="supplements_d"  value="<?php echo $supplements; ?>" name="supplements" multiple="multiple" placeholder="Ex: Proteins,Iron">
                                 <datalist id="supplements_d">
                                    <option value ="Proteins">
                                    <option value ="Multivitamins" >
                                    <option value ="Calcium">
                                    <option value ="Vitamin B-complex">
                                    <option value ="Fish Oil">
                                    <option value ="Probiotics">
                                    <option value ="Iron">
                                    <option value ="Folic Acid">
                                    <option value ="None">
                                </datalist>    
                              </div>
                              <div class="form-group">
                                   <label> What is your average daily water intake? </label>
                                   <div>
                                       <div class="form-check-inline">
                                          <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="water_intake" value="Less than 3 ltr" <?php if($water_intake == "Less than 3 ltr") echo "checked"; ?>>Less than 3 ltr
                                          </label>
                                        </div>
                                        <div class="form-check-inline">
                                          <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="water_intake" value="More than 3 ltr" <?php if($water_intake == "More than 3 ltr") echo "checked"; ?>> More than 3 ltr 
                                          </label>
                                        </div>
                                   </div>
                              </div>
                              
                              <div class="form-group">
                                   <label>Do you consume tobacco (cigarette/bidi smoking, tobacco chewing, etc.)? </label>
                                   <div>
                                       <div class="form-check-inline">
                                          <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="consume_tobacco" value="Yes" <?php if($consume_tobacco == "Yes") echo "checked"; ?>>Yes
                                          </label>
                                        </div>
                                        <div class="form-check-inline">
                                          <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="consume_tobacco" value="No" <?php if($consume_tobacco == "No") echo "checked"; ?>>No 
                                          </label>
                                        </div>
                                   </div>
                              </div>
                              
                              <div class="form-group">
                                   <label>Do you consume alcohol?</label>
                                   <div>
                                       <div class="form-check-inline">
                                          <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="consume_alcohol" value="Yes" <?php if($consume_alcohol == "Yes") echo "checked"; ?>>Yes
                                          </label>
                                        </div>
                                        <div class="form-check-inline">
                                          <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="consume_alcohol" value="No" <?php if($consume_alcohol == "No") echo "checked"; ?>>No 
                                          </label>
                                        </div>
                                   </div>
                              </div>
                               <div class="form-group">
                                 <label for="inputSleep"> On an average how many hours a day do you sleep? </label>
                                 <input type="text" id="inputSleep" class="form-control" value="<?php echo $sleep; ?>" name="sleep">
                                </div>
                                <br/>
                                <div class="col-sm-12">
                                  <hr>
                                  <b style="position: absolute;margin-top: -30px;background-color: white;"><i class="fa fa-dot-circle"></i> My Health & Fitness Goals&nbsp;&nbsp;&nbsp;</b>
                                  <br>
                               </div>
                               <div class="form-group">
                                 <label for="improve_health"> I wish to improve the following health parameters/conditions </label>
                                 <input class="form-control" id="improve_health" list="improve_health_d" value="<?php echo $improve_health; ?>" name="improve_health" multiple="multiple"placeholder="Ex: Weight,Blood Pressure">
                                 <datalist id="improve_health_d">
                                    <option value ="Blood Sugar Levels">
                                    <option value ="Weight">
                                    <option value ="Lipid Profile" >
                                    <option value ="Blood Pressure">
                                    <option value ="Asthma">
                                    <option value ="Chronic Obstructive Pulmonary Disease (COPD)">
                                    <option value ="Other">
                                </datalist>    
                              </div>
                              <div class="form-group">
                                    <input type="text" id="inputImprove_health_details" class="form-control" placeholder="Details (Ex : Want to gain weight till 65 kg etc)" value="<?php echo $improve_health_details; ?>"  name="improve_health_details">
                               </div>
                          </div>
                           <!-- Second half -->
                      </div>
                      <!-- New Form ends Here --->
                      
                     <div class ="col-sm-12">
                        
                        <button class="btn btn-primary" name="user_details" type="submit">Update Details</button>
                    </div>
                  </form>
                  
               </div>
               <?php } ?>
               <!---------------- Panel Deatils ------------>
               <?php if($_SESSION['role']=='Admin') { ?>
               <div class="card mb-3">
                  <div class="card-header">
                     <i class="fas fa-dna"></i>
                     Panel Details
                  </div>
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
                              $panel='';$sampleID='';
                              if(isset($_GET['panel_id']))
                              {
                              	$qry = "select * from `panel_details` where id='".$_GET['panel_id']."'";
                              	$res = $conn->query($qry);
                              	if($res->num_rows != 0)
                              	{	
                              		while($row = $res->fetch_assoc()) {
                              			$panel=$row['panel'];$sampleID=$row['sampleID'];
                              		}
                              	} 
                              }
                              			?>	
                           <form method="POST"  autocomplete="off">
                              <div class="form-group">
                                 <label for="panel">Panel Name *</label>
                                 <select class="form-control" id="panel" name="panel" required = "required">
                                    <option value ="">--- Select Panel ---</option>
                                    <?php 
                                    $qry_panel = "select Name from `panel_info` where 1";
                                   $res_panel = $conn->query($qry_panel);
                                    while($row_panel = $res_panel->fetch_assoc()) {
                                    	
                                  
                                    ?>
                                    <option value ="<?php echo $row_panel['Name']; ?>" <?php if($panel == $row_panel['Name']) echo "selected"; ?>><?php echo $row_panel['Name']; ?></option>
                                    <?php } ?>
                                    <!--
                                    <option value ="Nutrition" <?php if($panel == "Nutrition") echo "selected"; ?>>Nutrition</option>
                                    <option value ="Food Intolerance" <?php if($panel == "Food Intolerance") echo "selected"; ?>>Food Intolerance</option>
                                    <option value="Fitness" <?php if($panel == "Fitness") echo "selected"; ?> >Fitness</option>
                                    <option value="Health" <?php if($panel == "Health") echo "selected"; ?> >Health</option>
                                    <option value="Skin" <?php if($panel == "Skin") echo "selected"; ?> >Skin</option>
                                    <option value="Hair" <?php if($panel == "Hair") echo "selected"; ?> >Hair</option>-->
                                 </select>
                              </div>
                              <button class="btn btn-primary" name="panel_details" type="submit"> <?php if(isset($_GET['panel_id'])){echo 'Edit';}else{echo 'Add';} ?> Info</button>
                           </form>
                        </div>
                        <div  class="col-md-8" >
                           <div class="table-responsive">
                              <table class="table table-bordered" id="dataTable">
                                 <thead>
                                    <tr>
                                       <th>Sr. No.</th>
                                       <th>Panel</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php 
                                       $cnt=1;
                                       $qry = "select * from `panel_details` where `user_id`='".$id."'";
                                       $res = $conn->query($qry);
                                       while($row = $res->fetch_assoc()) {
                                       ?>	
                                    <tr>
                                       <td><?php echo $cnt++; ?></td>
                                       <td><?php echo $row["panel"]; ?></td>
                                       <td>
                                          <a href="user_details.php?id=<?php echo $id; ?>&uname=<?php echo $_GET["uname"]; ?>&panel_id=<?php echo $row["id"]; ?>" data-toggle="tooltip" title="Edit Course Details">		
                                          <i class="fa fa-edit" aria-hidden="true"></i>
                                          </a>&nbsp;&nbsp;
                                          <a href="?id=<?php echo $id; ?>&uname=<?php echo $_GET['uname']; ?>&panel_id_delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')" data-toggle="tooltip" title="Delete Panel Details">		
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
               <?php } ?>
               <?php }else{ ?>
               <img src="images/404.jpg" class="img-fluid"> 
               <?php } ?>
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
      <script src="js/demo/datatables-demo.js"></script>
      <!-- Core plugin JavaScript-->
      <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="js/sb-admin.min.js"></script>
      <script>
         $(document).ready(function(){
         // Prepare the preview for profile picture
             $("#wizard-picture").change(function(){
                 readURL(this);
             });
         });
         function readURL(input) {
             if (input.files && input.files[0]) {
                 var reader = new FileReader();
         
                 reader.onload = function (e) {
                     $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
                 }
                 reader.readAsDataURL(input.files[0]);
             }
         }
      </script>
      <script>
         $(document).ready(function () {
           handleDOBChanged();
           var age = calculateAge(parseDate($('#dob').val()), new Date());
           $("#age").val(age); 
         });
         
         //listener on date of birth field
         function handleDOBChanged() {
             $('#dob').on('change', function () {
                 var age = calculateAge(parseDate($('#dob').val()), new Date());
               	$("#age").val(age);   
                   
             });
         }
         
         //convert the date string in the format of dd/mm/yyyy into a JS date object
         function parseDate(dateStr) {
           var dateParts = dateStr.split("-");
           return new Date(dateParts[0], (dateParts[1] - 1), dateParts[2]);
         }
         
         //is valid date format
         function calculateAge (dateOfBirth, dateToCalculate) {
             var calculateYear = dateToCalculate.getFullYear();
             var calculateMonth = dateToCalculate.getMonth();
             var calculateDay = dateToCalculate.getDate();
         
             var birthYear = dateOfBirth.getFullYear();
             var birthMonth = dateOfBirth.getMonth();
             var birthDay = dateOfBirth.getDate();
         
             var age = calculateYear - birthYear;
             var ageMonth = calculateMonth - birthMonth;
             var ageDay = calculateDay - birthDay;
         
             if (ageMonth < 0 || (ageMonth == 0 && ageDay < 0)) {
                 age = parseInt(age) - 1;
             }else{
                 age = 0
             }
             return age;
         }
         
         document.addEventListener("DOMContentLoaded", function () {
    const separator = ',';
    for (const input of document.getElementsByTagName("input")) {
        if (!input.multiple) {
            continue;
        }
        if (input.list instanceof HTMLDataListElement) {
            const optionsValues = Array.from(input.list.options).map(opt => opt.value);
            let valueCount = input.value.split(separator).length;
            input.addEventListener("input", () => {
                const currentValueCount = input.value.split(separator).length;
                if (valueCount !== currentValueCount) {
                    const lsIndex = input.value.lastIndexOf(separator);
                    const str = lsIndex !== -1 ? input.value.substr(0, lsIndex) + separator : "";
                    filldatalist(input, optionsValues, str);
                    valueCount = currentValueCount;
                }
            });
        }
    }
    function filldatalist(input, optionValues, optionPrefix) {
        const list = input.list;
        if (list && optionValues.length > 0) {
            list.innerHTML = "";
            const usedOptions = optionPrefix.split(separator).map(value => value.trim());
            for (const optionsValue of optionValues) {
                if (usedOptions.indexOf(optionsValue) < 0) {
                    const option = document.createElement("option");
                    option.value = optionPrefix + optionsValue;
                    list.append(option);
                }
            }
        }
    }
});

      </script>
   </body>
</html>
