<?php
session_start();
include"includes/config.php"; 
if(isset($_SESSION['role'])){
    //echo $_SESSION['role']; echo $_SESSION['login_id'];
	if($_SESSION['role']=='Admin'|| $_SESSION['role']=='Employee'){
		header("location: dashboard.php");
	}else if($_SESSION['role']=='Client'){
		header("location: client_dashboard.php");			
	}
}
if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		
		$username = $password = "";
		$username = $_POST["username"];
		$username = filter_login_input($username);
		$password = $_POST["password"];
		$password = filter_login_input($password);
		$qry = "select login.id as id,login.role as role, login.status as status from login left join user_details on login.id= user_details.user_id where (login.uname='$username' and login.password='$password') || (user_details.contact_no='$username' and login.password='$password')";
	
		$res = $conn->query($qry);
		if($res->num_rows > 0)
		{	$row = $res->fetch_assoc();
			if($row['status']=='Active'){

				$_SESSION['login_id'] = $row["id"];
				$_SESSION['role'] = $row["role"];
			//	$_SESSION['uname'] = $row["uname"];
				
				if($_SESSION['role']=='Admin' ){
					header("location: dashboard.php");
				}else{
					header("location: client_dashboard.php");			
				}
			}else{			
				$loginCheck = "Your Account is Inactivated by Admin";
			}
		}
		else 
		{
			 $loginCheck = "Username or Password is Wrong !";
		}
	}
function filter_login_input($loginData)
	{
		$loginData = trim($loginData);
		$loginData = stripslashes($loginData);
		return $loginData;
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
  <?php
    if(isset($loginCheck)){
  ?>
    <div class="alert alert-danger">
      <strong><i class="far fa-frown" aria-hidden="true"></i></strong> <?php echo "$loginCheck"; ?>
    </div>
  <?php
    }
  ?>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
          <div class="form-group">
            <div class="form-group">
              <input type="text" id="inputEmail" name="username" class="form-control" placeholder="Email Id/ Mobile No" required="required" autofocus="autofocus">
              <!--<label for="inputEmail">Email address</label>-->
            </div>
          </div>
          <div class="form-group">
            <div class="form-group">
              <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="required">
            <!--  <label for="inputPassword">Password</label>-->
            </div>
          </div>
          <div class="row">
          <div class="col-4">
           <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-unlock-alt" aria-hidden="true"></i> SIGN IN</button>
          </div>
          
          <!-- /.col -->
          <div class="col-8">
             <a class="btn btn-info text-light btn-sm float-right" href="register.php"><i class="fa fa-lock" aria-hidden="true"></i> REGISTER YOUR KIT</a>
          </div>
          <!-- /.col -->
        </div>
       <div class="row">
           
            <div class="col-12">
                <br/>
                <a class="float-right" href= "forgot_password.php">Forgot Password</a>
            </div>
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

</script>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>