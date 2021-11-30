<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
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
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/css/font-awesome.min.css.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

</head>

<body>
<?php include('includes/staff-topbar.php');?>

	<div class="ts-main-content">
<?php include('includes/staff-sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Staff Dashboard</h2>
						

						<div class="serv" data-aos="fade-up">
                     <div class="row">

                          <div class="col-2 d-flex align-items-center" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon-box">
                              <h4><a href="#">A+</a></h4>                             
																	<?php 
																	mysqli_select_db($dbh,'bbdms');
																	$sql  = mysqli_query($dbh, "SELECT id from bloodstock where bloodgroup='A+'");
																	 if ($sql)
																	    {
																	      $bga1 = $sql->num_rows;   
																	     }
																	  else{
																	  	echo("Something wrong!!!");
																	  } 
																	?>
                              <p><?php echo htmlentities($bga1);?></p>
                            </div>
                          </div>

                           <div class="col-2 d-flex align-items-center" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon-box">
                              <h4><a href="#">A-</a></h4>                             
																	<?php 
																	mysqli_select_db($dbh,'bbdms');
																	$sql  = mysqli_query($dbh, "SELECT id from bloodstock where bloodgroup='A-'");
																	 if ($sql)
																	    {
																	      $bga1 = $sql->num_rows;   
																	     }
																	  else{
																	  	echo("Something wrong!!!");
																	  } 
																	?>
                              <p><?php echo htmlentities($bga1);?></p>
                            </div>
                          </div>
                          
                           <div class="col-2 d-flex align-items-center" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon-box">
                              <h4><a href="#">B+</a></h4>                             
																	<?php 
																	mysqli_select_db($dbh,'bbdms');
																	$sql  = mysqli_query($dbh, "SELECT id from bloodstock where bloodgroup='B+'");
																	 if ($sql)
																	    {
																	      $bga1 = $sql->num_rows;   
																	     }
																	  else{
																	  	echo("Something wrong!!!");
																	  } 
																	?>
                              <p><?php echo htmlentities($bga1);?></p>
                            </div>
                          </div>
                          
                           <div class="col-2 d-flex align-items-center" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon-box">
                              <h4><a href="#">B-</a></h4>                             
																	<?php 
																	mysqli_select_db($dbh,'bbdms');
																	$sql  = mysqli_query($dbh, "SELECT id from bloodstock where bloodgroup='B-'");
																	 if ($sql)
																	    {
																	      $bga1 = $sql->num_rows;   
																	     }
																	  else{
																	  	echo("Something wrong!!!");
																	  } 
																	?>
                              <p><?php echo htmlentities($bga1);?></p>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-2 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                            <div class="icon-box">
                              
                              <h4><a href="#">AB+</a></h4>                             
																		<?php 
																		mysqli_select_db($dbh,'bbdms');
																		$sql  = mysqli_query($dbh, "SELECT id from bloodstock where bloodgroup='AB+'");
																		 if ($sql)
																		    {
																		      $bga1 = $sql->num_rows;   
																		     }
																		  else{
																		  	echo("Something wrong!!!");
																		  } 
																		?>
                              <p><?php echo htmlentities($bga1);?></p>
                            </div>
                          </div>

                          <div class="col-2 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon-box">
                              <h4><a href="#">AB-</a></h4>                             
																	<?php 
																	mysqli_select_db($dbh,'bbdms');
																	$sql  = mysqli_query($dbh, "SELECT id from bloodstock where bloodgroup='AB-'");
																	 if ($sql)
																	    {
																	      $bga1 = $sql->num_rows;   
																	     }
																	  else{
																	  	echo("Something wrong!!!");
																	  } 
																	?>
                              <p><?php echo htmlentities($bga1);?></p>
                            </div>
                          </div>

                          <div class="col-2 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon-box">
                              <h4><a href="#">O+</a></h4>                             
																	<?php 
																	mysqli_select_db($dbh,'bbdms');
																	$sql  = mysqli_query($dbh, "SELECT id from bloodstock where bloodgroup='O+'");
																	 if ($sql)
																	    {
																	      $bga1 = $sql->num_rows;   
																	     }
																	  else{
																	  	echo("Something wrong!!!");
																	  } 
																	?>
                              <p><?php echo htmlentities($bga1);?></p>
                            </div>
                          </div>

                          <div class="col-2 d-flex align-items-stretch " data-aos="fade-up" data-aos-delay="400">
                            <div class="icon-box">
                              <h4><a href="#">O-</a></h4>                             
																		<?php 
																		mysqli_select_db($dbh,'bbdms');
																		$sql  = mysqli_query($dbh, "SELECT id from bloodstock where bloodgroup='O-'");
																		 if ($sql)
																		    {
																		      $bga1 = $sql->num_rows;   
																		     }
																		  else{
																		  	echo("Something wrong!!!");
																		  } 
																		?>
                              <p><?php echo htmlentities($bga1);?></p>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="services" data-aos="fade-up">

                         <div class="row">
                          <div class="col-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                            <div class="icon-box">
                              
                              <h4><a href="#">Listed Blood Groups</a></h4>                             
																		<?php 
																				mysqli_select_db($dbh,'bbdms');
																				$sql  = mysqli_query($dbh, "SELECT * from bloodstock group by bloodgroup ");

																				 if ($sql)
																				    {
																				      $bg = $sql->num_rows;   
																				     }
																				  else{
																				  	echo("Something wrong!!!");
																				  } 
																				?>
                              <h1><?php echo htmlentities($bg);?></h1><br>
                              <i class="fa fa-arrow-right"></i><a href="manage-hospitals.php" class="block-anchor panel-footer text-center">Full Details</a>
                            </div>
                          </div>

                          <div class="col-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon-box">
                              <h4><a href="#">Registered Donors</a></h4>                             
																	                   
																	<?php 

																	mysqli_select_db($dbh,'bbdms');
																	$sql1  = mysqli_query($dbh,"SELECT id from donors ");

																	if ($sql1)
																	    {
																	      $regbd = $sql1->num_rows;   
																	     }
																	  else{
																	  	echo("Something wrong!!!");
																	  } 

																	?>
                              <h1><?php echo htmlentities($regbd);?></h1><br>
                              <i class="fa fa-arrow-right"></i><a href="door-list.php" class="block-anchor panel-footer text-center">Full Details</a>
                            </div>
                          </div>

                          <div class="col-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon-box">
                              <h4><a href="#">Total Hospitals</a></h4>                             
																	<?php 
																			mysqli_select_db($dbh,'bbdms');
																			$sql2  = mysqli_query($dbh,"SELECT id from hospitals ");

																			if ($sql2)
																			    {
																			      $query = $sql2->num_rows;   
																			     }
																			  else{
																			  	echo("Something wrong!!!");
																			  } 

																			?>
                              <h1><?php echo htmlentities($query);?></h1><br>
                              <i class="fa fa-arrow-right"></i><a href="manage-hospitals.php" class="block-anchor panel-footer text-center">Full Details</a>
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
				</div>












			</div>
		</div>
	</div>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="../assets/vendor/venobox/venobox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
	
	<script>
	
	</script>
</body>
</html>
<?php } ?>staff