<?php 


 session_start();
   	include"message_api_exec.php";
   include"includes/config.php"; 
   if(isset($_SESSION['role'])){
   /*	if($_SESSION['role']=='Admin'|| $_SESSION['role']=='Employee'){
   		header("location: dashboard.php");
   	}else if($_SESSION['role']=='Users'){
   		header("location: view_info.php");			
   	}*/
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
      <title>Gene-Thing - Register</title>
      <!-- Custom fonts for this template-->
      <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <!-- Custom styles for this template-->
      <link href="css/sb-admin.css" rel="stylesheet">
      
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- Core plugin JavaScript-->
      <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
      <style>
         /* Extra small devices (phones, 600px and down) */
         @media only screen and (max-width: 600px) {
         body { 
         background: url(images/bg-mob.jpg) no-repeat center center fixed;
         -webkit-background-size: cover;
         -moz-background-size: cover;
         -o-background-size: cover;
         background-size: cover;
         }
         }
         /* Small devices (portrait tablets and large phones, 600px and up) */
         @media only screen and (min-width: 600px) {
         body { 
         background: url(images/bg1.jpg) no-repeat center center fixed;
         -webkit-background-size: cover;
         -moz-background-size: cover;
         -o-background-size: cover;
         background-size: cover;
         }
         }
         .navbar-nav .nav-item .nav-link{
         padding: 1.1em 1em!important;
         font-size: 120%;
         }
         .mt-20{
         margin-top:18%;
         }
      </style>
      <script type="text/javascript">
         function Validate() {
             var password = document.getElementById("inputPassword").value;
             var confirmPassword = document.getElementById("inputConfirmPassword").value;
             if (password != confirmPassword) {
                 alert("Passwords do not match.");
                 return false;
             }
             return true;
         }
         
      </script>
      
<script type='text/javascript'>
function refreshCaptcha(){
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>
   </head>
   
   <?php
  
  

   if($_SERVER["REQUEST_METHOD"] == "POST")
   	{
   	    //echo "<script>alert('post method');</script>";
   	    if(empty($_SESSION['captcha_code']) || strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) != 0)
   	    {
   	        echo "<script>alert('captcha not fount');</script>";
   	        //header("location: register.php?error=Captcha code is not matched...");
       	   
   	    }else{
   	        $qry = "select * from login where uname='".$_POST['email']."'";
            $res = $conn->query($qry);
            if($res->num_rows == 0)
            {
                $qry = "select * from user_details where contact_no='".$_POST['contact_no']."'";
                $res = $conn->query($qry);
                if($res->num_rows == 0)
                {
                            
                    $qry = "select * from login where (uname='".$_POST['email']."' and barcode = '".$_POST['barcode']."') or (uname !='' and barcode = '".$_POST['barcode']."')";
                    $res = $conn->query($qry);
                    
                    if($res->num_rows == 0)
                    {	
                        
                        
                        $sql ="UPDATE `login` SET `uname`='".$_POST['email']."' , `password`='".$_POST['password']."', `role`='Users', `date` = CURRENT_TIMESTAMP where `barcode` ='".$_POST['barcode']."'";
                        
                       // "INSERT INTO `login` (`id`, `uname`, `password`, `barcode`, `role`, `date`) VALUES (NULL, '".$_POST['email']."', '".$_POST['password']."', '".$_POST['barcode']."', 'Users', CURRENT_TIMESTAMP)";
                        if ($conn->query($sql) === TRUE) {
                            $qry = "select * from login where barcode = '".$_POST['barcode']."'";
                            $res = $conn->query($qry);
                            $row = $res->fetch_assoc();
                            $last_id = $row['id'];
                            $sql= "INSERT INTO `user_details` (`id`, `user_id`, `name`, `email`, `contact_no`, `dob`, `gender`, `organisation`, `designation`, `address`, `city`, `country`, `pincode`, `photo`) 
                                VALUES (NULL, '".$last_id."', '".$_POST['fname']." ".$_POST['lname']."', '".$_POST['email']."', '".$_POST['contact_no']."', '".$_POST['dob']."', '".$_POST['gender']."', '".$_POST['organisation']."', '".$_POST['designation']."', '".$_POST['address']."', '".$_POST['city']."', '".$_POST['country']."','".$_POST['pincode']."' ,'') ";
                            //echo $sql;
                            $conn->query($sql);
                            
                            
                            //$arr = array('Nutrition','Food Intolerance','Fitness','Health', 'Skin','Hair');
                                $arr=array();
                               $qry_panel = "select Name from `panel_info` where 1";
                               $res_panel = $conn->query($qry_panel);
                                while($row_panel = $res_panel->fetch_assoc()) {
                                	array_push($arr,$row_panel['Name']);
                              }
                            foreach ($arr as &$value) {
    			                $sql = "INSERT INTO `panel_details` (`id`, `user_id`, `panel`) VALUES (NULL, '".$row['id']."', '".$value."')";
    			                $conn->query($sql);
                            }
                            
                            $url="http://m1.sarv.com/api/v2.0/sms_campaign.php?token=286180875f842dabd37c50.24771892&user_id=47729449&route=TR&template_id=3119&sender_id=PHWAYZ&language=EN&template=Dear+".$_POST['fname']."%2C+thank+you+for+registering+your+kit.+Our+courier+executive+will+contact+you+and+pick+up+the+sample+in+the+next+48+hours.+Regards+Gene-Thing+by+Healthywayz.&contact_numbers=".$_POST['contact_no']."";
                            sendSMS($url);
                            //header("location: register.php?message=Registration done successfully...");
                            echo "<script type='text/javascript'>
                                    $(window).on('load',function(){
                                        $('#successModal').modal('show');
                                    });
                                </script>";
               		
                        }
                    }else{
                        //header("location: register.php?error=Enter barcode correctly...");
                         echo "<script type='text/javascript'>
                                $(window).on('load',function(){
                                    $('#error1Modal').modal('show');
                                });
                            </script>";
                    }
                }else{
                    //header("location: register.php?error=Your Contact Number Already Exists...");
                    echo "<script type='text/javascript'>
                            $(window).on('load',function(){
                                $('#error2Modal').modal('show');
                            });
                        </script>";
                }    
            }else{
                //header("location: register.php?error=Your Email Already Exists...");
                 echo "<script type='text/javascript'>
                    $(window).on('load',function(){
                        $('#error3Modal').modal('show');
                    });
                </script>";
            } 
			
	    }
    }
   function filter_login_input($loginData)
   	{
   		$loginData = trim($loginData);
   		$loginData = stripslashes($loginData);
   		return $loginData;
   	}
   ?>
   
   <body class="bg-dark">
      <nav class="navbar navbar-expand-sm  navbar-light" style="background-color: #f8f9fa00 !important;">
         <a class="navbar-brand" target="_blank" href="https://genething.com">
         <img class="img-fluid" style="max-height:200px;" src="images/genetics.png">
         </a>
      </nav>
      <div class="container-fluid">
       
	
	
	<div class="card card-register mx-auto">
      <div class="card-header"><b class="text-success">Register a kit</b></div>
      <div class="card-body">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="col-sm-12">
                Please enter the following information to register your kit(s).
                <hr>
                  <?php
		if(isset($_GET['error'])){
	?>
	<!--<div class="col-sm-12">-->
		<div class="alert alert-danger">
		    <a class="close" href= "register.php">&times;</a>
		  <strong><i class="far fa-frown" aria-hidden="true"></i></strong> <?php echo $_GET['error']; ?>
		</div>
	<!--</div>-->
	<?php
		}else if(isset($_GET['message'])){
	?>
	<!--	<div class="col-sm-12">-->
		<div class="alert alert-success">
		    <a class="close" href= "register.php">&times;</a>
		  <strong><i class="fa fa-smile-o" aria-hidden="true"></i></strong> <?php echo $_GET['message']; ?>
		</div>
	<!--</div>-->
	<?php } ?>
            </div>
            <div class="col-sm-12">
               <label class="radio-inline"><input type="radio" name="optradio" checked required> Register for self</label>
            </div>
             <div class="col-sm-12">
               <div class="form-group">
                    <label for="inputBarcode">BARCODE  /Kit number *</label>
                    <input type="text" id="inputBarcode" class="form-control" placeholder="" name="barcode" required="required">
                    <span id="message"></span>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="inputFName">FIRST NAME *</label>
                    <input type="text" id="inputFName" class="form-control" placeholder="" required="required" name="fname" >
                </div>
           </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="inputLName">LAST NAME *</label>
                    <input type="text" id="inputLName" class="form-control" placeholder="" required="required" name="lname" >
                </div>
            </div>
              
                              <div class="col-sm-12">
                                 <div class="form-group">
                                    <label for="inputContactNo">MOBILE NUMBER * </label>
                                    <input type="number" id="inputContactNo" pattern=".{10,}" class="form-control" placeholder="" name="contact_no" required="required"> 
                                 </div>
                              </div>
                              <div class="col-sm-12">
                               <div class="form-group">
                                  <label for="inputEmail">EMAIL ID  *</label>
                                  <input type="email" id="inputEmail" class="form-control" placeholder="" name="email" required="required">
                               </div>
                        </div>
                           
                        <div class="col-sm-12">
                           <div class="form-group">
                              <label for="inputPassword">PASSWORD *</label>
                              <input type="password" id="inputPassword" class="form-control" placeholder="" name="password" required="required">
                           </div>
                        </div>
                        <div class="col-sm-12">
                           <div class="form-group">
                              <label for="inputConfirmPassword">CONFIRM PASSWORD *</label>
                              <input type="password" value="" class="form-control" id="inputConfirmPassword"  placeholder=""  required="required"> 
                           </div>
                        </div>
                        <div class="col-sm-12">
                                 <div class="form-group">
                                    <label for="sel1">GENDER *</label>
                                    <select class="form-control" id="sel1" name="gender" required="required">
                                       <option value=""></option>
                                       <option value="Male">Male</option>
                                       <option value="Female">Female</option>
                                       <option value="Not disclosed">Not disclosed</option>
                                       <option value="Not specified">Not specified</option>
                                       <option value="Other">Other</option>
                                    </select>
                                 </div>
                              </div>
                               <div class="col-sm-12">
                                 <div class="form-group">
                                    <label for="inputDate">DATE OF BIRTH *</label>
                                    <input type="date" id="dob" class="form-control" placeholder="" min="1900-01-01" max="<?php echo date('Y-m-d'); ?>" required="required" name="dob" >
                                 </div>
                              </div>
                              <div class="col-sm-12">
                                 <div class="form-group">
                                    <label for="inputAge"> AGE *</label>
                                    <input type="number" id="age" class="form-control" placeholder="" value="" name="age" required="required" readonly=""> 
                                 </div>
                              </div>
                              
                       
                        <div class="col-sm-12" hidden>
                           <div class="form-group">
                              <label for="inputOrganisation">ORGANISATION</label>
                              <input type="text" id="inputOrganisation" class="form-control" placeholder=""  name="organisation">
                           </div>
                        </div>
                        <div class="col-sm-12" hidden>
                           <div class="form-group">
                              <label for="inputDesignation">DESIGNATION</label>
                              <input type="text" id="inputDesignation" class="form-control" placeholder=""  name="designation">
                           </div>
                        </div>
                        <div class="col-sm-12">
                           <div class="form-group">
                              <label for="inputDesignation">I HAVE READ AND UNDERSTOOD THE TERMS AND CONDITIONS </label>
                                <div class="checkbox">
                                  <label class="checkbox-inline"><input type="checkbox" value="" required title="You must have to agree for registeration."> AGREE</label> &nbsp;
                                  <label class="checkbox-inline"><input type="checkbox" value="" > DENY</label>
                                </div>
                           </div>
                        </div>
                        <div class="col-sm-12">
                           <div class="form-group">
                              <label for="inputDesignation">I GIVE MY CONSENT FOR GENETIC TESTING ON THE SAMPLE </label>
                                <div class="checkbox">
                                  <label class="checkbox-inline"><input type="checkbox" value="" required title="You must have to agree for registeration."> AGREE</label> &nbsp;
                                </div>
                           </div>
                        </div>
                        <div class="col-sm-12">
                           <div class="form-group">
                              <label for="inputDesignation">I GIVE MY CONSENT FOR RESEARCH TO BE DONE ON MY TEST RESULTS </a> </label>
                                <div class="checkbox">
                                  <label class="checkbox-inline"><input type="checkbox" value="" required title="You must have to agree for registeration."> AGREE</label> &nbsp;
                                  <label class="checkbox-inline"><input type="checkbox" value="" > DENY</label>
                                </div>
                           </div>
                        </div>
                         <div class="col-sm-12">
                           <div class="form-group">
                              <label for="inputAddress"> ADDRESS FOR SAMPLE TO BE PICKED UP  *</label>
                              <textarea type="text" id="inputAddress" class="form-control" placeholder=""  rows="4" name="address" required></textarea>
                           </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                      <label for="inputCity">CURRENT CITY  *</label>
                                      <input type="text" id="inputCity" class="form-control" placeholder=""  name="city" required>
                                   </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                      <label for="inputCountry">CURRENT COUNTRY  *</label>
                                      <input type="text" id="inputCountry" class="form-control" placeholder=""  name="country" required>
                                   </div>
                                </div>
                                 <div class="col-sm-12">
                                    <div class="form-group">
                                      <label for="inputPincode">PINCODE *</label>
                                      <input type="text" id="inputPincode" class="form-control" placeholder=""  name="pincode" required>
                                   </div>
                                </div>
                            </div>
                        </div>
                         <div class="col-sm-12">
                                  <div class="form-group">
                                      
                                        <img src="captcha.php?rand=<?php echo rand();?>" id='captchaimg' class="img-fluid">
                                        <?php //echo $_SESSION['captcha_code']; ?>
                                        <br/>
                                        <input id="captcha_code" class="form-control"  name="captcha_code" type="text" placeholder="Enter the code above here *" required>
                                        Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh.
                                   </div>
                              </div>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-8">
                                    <button type="submit"  onclick="return Validate()" class="btn btn-primary btn-sm"><i class="fa fa-lock" aria-hidden="true"></i> REGISTER YOUR KIT </button>
                                </div>
                                  <div class="col-4">
                                     <a class="btn btn-info text-light btn-sm float-right" href="index.php"><i class="fa fa-unlock-alt" aria-hidden="true"></i> SIGN IN </a>
                                  </div>
                            </div>
                        </div>
        </form>
        

      </div>
    </div>
	
         
      </div>
      <!-- Footer -->
      <footer class="page-footer font-small blue">
         <!-- Copyright -->
         <div class="footer-copyright text-center py-3">
            <!--© 2020 Copyright
               <a href="https://healthywayz.biz/"> healthywayz.biz</a>-->
         </div>
         <!-- Copyright -->
      </footer>
      <!-- Footer -->
      
      
              
<!-- The Modal -->
<div class="modal" id="successModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-info">
        <h6 class="modal-title">Thank You</h6>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       Registration done successfully...
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- The Modal -->
<div class="modal" id="error1Modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal body -->
      <div class="modal-body">
       Enter barcode correctly...
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- The Modal -->
<div class="modal" id="error2Modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal body -->
      <div class="modal-body">
       Your Contact Number Already Exists...
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- The Modal -->
<div class="modal" id="error3Modal">
  <div class="modal-dialog">
    <div class="modal-content">
     
      <!-- Modal body -->
      <div class="modal-body">
       Your Email Already Exists...
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
      
      <!-- Bootstrap core JavaScript-->
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
             }
             return age;
         }
         
         
      </script>
      <script type="text/javascript">
         $(document).ready(function(){
            $("#inputBarcode").change(function(){
                 $("#message").html("<span class='text-warning fade-in'> cheking...</span>");
         
         
            var inputBarcode = $("#inputBarcode").val();
            //alert(inputBarcode);
              $.ajax({
                    type:"post",
                    url:"barcodecheck.php",
                    data: { 'barcode': inputBarcode },
                        success:function(data){
                        //alert(data);
                        if(data==1){
                            $("#message").html("<span class='text-success'> Barcode is matched ...</span>");
                        }
                        else{
                            $("#message").html("<span class='text-danger'> "+inputBarcode+" Barcode not found ...</span>");
                            $('#inputBarcode').val("");  
                        }
                    }
                 });
         
            });
         
         });
         
      </script>
      

   </body>
</html>
