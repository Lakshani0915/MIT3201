<?php
session_start();
include('includes/config.php');
if(isset($_POST['login']))
{
	$un=$_POST['username'];
	$password=md5($_POST['password']);
	mysqli_select_db($dbh,'bbdms');

	$sql = mysqli_query($dbh, "SELECT * FROM login WHERE username='$un' and password='$password'");

	$checkuser=0;

	while ($row = mysqli_fetch_array($sql)) {
		$checkuser++;
		$_SESSION['usertype']=$row['usertype'];
		$_SESSION['alogin']=$row['name'];
		

			if (isset($_SESSION['usertype'])) {
				if ($_SESSION["usertype"]=="admin") {
						$_SESSION['alogin']=$row['name'];
					echo "<script type='text/javascript'> document.location = 'admin/admin-dashboard.php'; </script>";

				}
				elseif ($_SESSION["usertype"]=="camp") {
					$_SESSION['alogin']=$un;
					echo "<script type='text/javascript'> document.location = 'camps/camp-dashboard.php'; </script>";
				}

				elseif ($_SESSION["usertype"]=="staff") {
					$_SESSION['alogin']=$row['name'];
					echo "<script type='text/javascript'> document.location = 'staff/staff-dashboard.php'; </script>";
				}
				elseif ($_SESSION["usertype"]=="hospital") {
					$_SESSION['alogin']=$row['name'];
					echo "<script type='text/javascript'> document.location = 'hospitals/hospitals-dashboard.php'; </script>";
				}
				elseif ($_SESSION["usertype"]=="user") {
				$_SESSION['alogin']=$row['name'];
					echo "<script type='text/javascript'> document.location = 'donor/donor-dashboard.php'; </script>";
				}
				elseif ($_SESSION["usertype"]=="recipient") {
					$_SESSION['alogin']=$un;
					echo "<script type='text/javascript'> document.location = 'hospitals/recipient-dashboard.php'; </script>";
				}

				 else{
  
  					echo "<script>alert('Invalid Details');</script>";

					}
			}	
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>BBDMS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>
 <div class="wrapper fadeInDown">
 	
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first register">
     <h4>Sign-In</h4>
    </div>

    <!-- Login Form -->
    <form method="post">
    	
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="Username">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password">
      <input type="submit" class="fadeIn fourth" value="Log In" name="login"><br>
      <a href="register.php">New user? Register Here..</a><br><br>
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>
	

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>