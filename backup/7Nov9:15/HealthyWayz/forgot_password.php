<?php
session_start();
include"includes/config.php"; 
if(isset($_SESSION['role'])){
	if($_SESSION['role']=='Admin'|| $_SESSION['role']=='Employee'){
		header("location: dashboard.php");
	}else if($_SESSION['role']=='Client'){
		header("location: client_dashboard.php");			
	}
}
/*
$message = "
            <html>
            <head>
            <title>Password from Gene-Thing</title>
            </head>
            <body style='padding:20px;'>
            <center>
            <a target='_blank' href='https://genething.com'><img  style='max-height:300px;width:auto;' src='". "http://" . $_SERVER['HTTP_HOST'] .dirname($_SERVER['PHP_SELF'])."/images/genetics.png'></a>
            </center>
            <p>Dear Customer, </p>
            <p> As per your request of forgot password your account details is given below</p>
            <h5> <b>Username : </b> ".$username."</h5>
            <h5> <b>Password : </b> ".$row['password']."</h5>
            </body>
            </html>
            ";
            
echo $message;
*/
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
  
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  
  <title>Gene-Thing - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
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
}</style>
</head>

<?php


if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		
		$username = "";
		$username = $_POST["username"];
		$username = filter_login_input($username);
		$qry = "select * from login where login.uname='$username'";
	
		$res = $conn->query($qry);
		if($res->num_rows > 0)
		{	
		    $row = $res->fetch_assoc();
		    $to = $username;
            $subject = "Password from Gene-Thing";
            
            $message = "
            <html>
            <head>
            <title>Password from Gene-Thing</title>
            </head>
            <body style='padding:20px;background-color:#000417 !important; color: white;'>
            <center>
            <a target='_blank' href='https://genething.com'><img  style='max-height:300px;width:auto;' src='". "http://" . $_SERVER['HTTP_HOST'] .dirname($_SERVER['PHP_SELF'])."/images/genetics.png'></a>
            </center>
            <p>Dear Customer, </p>
            <p> As per your request of forgot password your account details is given below</p>
            <h5> <b>Username : </b> ".$username."</h5>
            <h5> <b>Password : </b> ".$row['password']."</h5>
            </body>
            </html>
            ";
            
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
            // More headers
            $headers .= 'From: <akshata@arraygene.com>' . "\r\n";
            //$headers .= 'Cc: akshata@arraygene.com' . "\r\n";
            
            if(mail($to,$subject,$message,$headers)){
                echo "<script type='text/javascript'>
                                    $(window).on('load',function(){
                                        $('#successModal').modal('show');
                                    });
                                </script>";
            }
		}
		else 
		{
			 $loginCheck = "Username is Wrong !";
			  echo "<script type='text/javascript'>
                                $(window).on('load',function(){
                                    $('#error1Modal').modal('show');
                                });
                            </script>";
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
<!--<nav class="navbar navbar-expand-sm  navbar-light" style="background-color: #f8f9fa00 !important;">
 
  <!-- Links --
  <ul class="navbar-nav ml-auto">
    <li class="nav-item d-none d-sm-inline-block">
      <a class="nav-link" href="/">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a class="nav-link" href="#">Panel</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a class="nav-link" href="#">Analyze</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a class="nav-link" href="login.html">Admin</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a class="nav-link" href="#">User</a>
    </li>
  </ul>
</nav>-->
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <a target="_blank" href="https://genething.com"><img class="img-fluid" style="max-height:400px;" src="images/genetics.png"></a>

      </div>
      <div class="col-sm-12">
        
    <div class="mx-sm-5 m-sm-2">
    <div class="card card-login mx-auto" style="border: 1px solid rgb(147, 206, 255, 0.86);margin-top: 5%;">
      <div class="card-header text-center text-secondary"><h5> Login to your Account</h5></div>
      <div class="card-body">
 <!-- <?php
    if(isset($loginCheck)){
  ?>
    <div class="alert alert-danger">
      <strong><i class="far fa-frown" aria-hidden="true"></i></strong> <?php echo "$loginCheck"; ?>
    </div>
  <?php
    }
  ?>-->
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
          <div class="form-group">
            <div class="form-group">
              <input type="text" id="inputEmail" name="username" class="form-control" placeholder="Email Id*" required="required" autofocus="autofocus">
              <!--<label for="inputEmail">Email address</label>-->
            </div>
          </div>
          
          <div class="row">
          <div class="col-4">
           <button type="submit" class="btn btn-primary btn-sm">Submit</button>
          </div>
          
          <!-- /.col -->
          <div class="col-8">
             <a class="btn btn-info text-light btn-sm float-right" href="index.php"><i class="fa fa-unlock-alt" aria-hidden="true"></i>SIGN IN</a>
          </div>
          <!-- /.col -->
        </div>
      
        
      </div>
      
    </div>
  </div>
  <br>
      </div>
    </div>

	<div class="card-login" style="position: absolute; bottom: 8px; right: 16px;"> 
		<a style="color:#171515;" target="_blank" href=""><b></b><br>
	</div>
	
  </div>

<!-- The Modal -->
<div class="modal" id="successModal">
  <div class="modal-dialog">
    <div class="modal-content">

    
      <!-- Modal body -->
      <div class="modal-body">
       Check you registsered email for password..
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
       Entered email id in not registered..
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>



</body>

</html>