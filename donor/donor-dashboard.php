<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:../index.html');
}
else{


mysqli_select_db($dbh,'bbdms');
$sql1 = mysqli_query($dbh, "SELECT * from donors");



 if(isset($_REQUEST['public']))
    {
      $NIC=$_GET['public'];
      $status="1";
      mysqli_select_db($dbh,'bbdms');
      $sql =  mysqli_query($dbh,"UPDATE donors SET status='$status' WHERE  NIC='$NIC'");
    }

     if(isset($_REQUEST['opt']))
    {
      $NIC=$_GET['opt'];
      $status="0";
      mysqli_select_db($dbh,'bbdms');
      $sql1 =  mysqli_query($dbh,"UPDATE donors SET status='$status' WHERE  NIC='$NIC'");
    }

 // else if(isset($_REQUEST['opt']))
 //                           {
 //                              $NIC = $_GET["opt"];
 //                              $status = "0";

 //                              $sqlq= mysqli_query($dbh,"UPDATE donors SET status='$status' WHERE NIC='$NIC'");

 //                              if ($sqlq) {
 //                                $msg="Your info updated successfully";

 //                              }else{

 //                                $error="Something went wrong. Please try again". mysqli_error($dbh);
                                
 //                              }
 //                                                         }

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
<?php include('includes/donor-topbar.php');?>

	<div class="ts-main-content">
<?php include('includes/donor-sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

					 			
						
						<div class="row">

             <div>

              <?php 

              while ($row = mysqli_fetch_array($sql1)) {
                  $NIC = $row["NIC"];
                  $status = $row["status"];
                }

           
?>        
              <form method="post">
              <h3 style="color:darkred; "> &nbsp; &nbsp; &nbsp;Would you like to become a donor? <button type="submit"><a href="donor-dashboard.php?public=<?php echo "$NIC";?>" style="color:darkred; " onclick="return confirm('Do you really want to Become a Donor?')"> Click Here...</a></button>

              <!-- <form method="post">
              <h3 style="color:darkred; "> &nbsp; &nbsp; &nbsp;Would you like to become a donor? <button type="opt"><a href="donor-dashboard.php?opt=<?php echo "$NIC";?>" style="color:darkred; " onclick="return confirm('Do you really want to Become a Donor?')"> OPT...</a></button></h3>
              </form> -->
             </div>
<?php }?>

							<div class="col-md-12">

                <!-- <form action="" method="post">
                  <button type="opt">Opt</button>
                </form> -->

               <div class="services" data-aos="fade-up">
                        <div class="row">
                          <div class="col-md-3 d-flex align-items-center" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon-box">
                              <img src="../assets/img/home1.png" class="img-fluid img" alt="Cinque Terre">
                              <h4><a href="#">100</a></h4>
                              <p> 100% of Sri Lankan blood donors are voluntory non rermunerated donors.</p>
                            </div>
                          </div>
                          <div class="col-md-3 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
                            <div class="icon-box">
                              <img src="../assets/img/home2.png" class="img-fluid img" alt="Cinque Terre">
                              <h4><a href="#">3</a></h4>
                              <p>Your precious donation of blood can save as many as 3 lives.</p>
                            </div>
                          </div>
                          <div class="col-md-3 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon-box">
                              <img src="../assets/img/home3.png" class="img-fluid img" alt="Cinque Terre">
                              <h4><a href="#">4</a></h4>
                              <p>You can donate blood in every 4 months time.</p>
                            </div>
                          </div>
                          <div class="col-md-3 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="400">
                            <div class="icon-box">
                              <img src="../assets/img/home4.png" class="img-fluid img" alt="Cinque Terre">
                              <h4><a href="#">14th JUNE</a></h4>
                              <p>World Blood Donor Day.</p>
                            </div>
                          </div>
                        </div>
                    </div>


<h2 class="page-title">Up Comming Donation Camps</h2>



								
				
<?php 

mysqli_select_db($dbh,'bbdms');
$sql  = mysqli_query($dbh, "SELECT * from  postcamp ORDER BY campdate asc limit 4");

  while ($row = mysqli_fetch_array($sql)) {
      $name = $row["name"];
      $venue = $row["venue"];
      $date = $row["campdate"];
      $email = $row["email"];
      $fromtime = $row["fromtime"];
      $totime = $row["totime"];
      $contactNo = $row["contactNo"];
      $province = $row["province"];
      $district = $row["district"];
      $image = $row["banner"];

?>  

<div class="card" >
  <img src="<?php echo $image; ?>">
  <div class="card-body">
    <h5 class="card-title"><?php echo "$name";?></h5>
    <h6>Venue : <?php echo "$venue";?></h6>
    <h6>Date : <?php echo "$date";?></h6>
    <h6>From : <?php echo "$fromtime";?>  To : <?php echo "$totime";?></h6>
    <p class="card-text">For more details, Please Contact Samitha : <?php echo "$contactNo";?></p>
    <p class="card-text">Email:  <?php echo "$email";?></p>
    
  </div>
</div><br>
										

                   
                    <?php $cnt=$cnt+1; } ?>
                    
                  </tbody>
                </table>
                  
									
								
											

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
<?php ?>