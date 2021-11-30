<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:../index.php');
}
else{ 

if(isset($_POST['submit']))
  {

  $bloodgroup=$_POST['bloodgroup'];
  $quantity=$_POST['quantity'];
  $rdate=$_POST['rdate'];
  $hospital=$_SESSION['alogin'];
  

mysqli_select_db($dbh,'bbdms');
$sql = mysqli_query($dbh, "INSERT INTO  hospitalbloodreuests (bloodgroup,quantity,rdate,hospitalname) VALUES('$bloodgroup','$quantity','$rdate','$hospital') ");

if ($sql) {
  $msg="Your info submitted successfully";

}else{

  $error="Something went wrong. Please try again". mysqli_error($dbh);
  echo("Please try again". mysqli_error($con));
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
<?php include('includes/hospital-topbar.php');?>

  <div class="ts-main-content">
<?php include('includes/hospital-sidebar.php');?>
    <div class="content-wrapper">
      <div class="container-fluid">
        <div class="row">
          
          <div class="col-md-12">          
            <div class="panel-body">
               <h2>Requset Blood</h2>

<?php if($error){?>
                <div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
      else if($msg){?>
                <div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

                  

                  <form method="post" class="form-horizontal" enctype="multipart/form-data">
  
                    <div class="form-row">
                       
                       <div class="col-6 form-group">
                         <label>Blood Group <span style="color:red">*</span></label>
                         	<select name="bloodgroup" class="form-control" id="myInput">
      					            <option value="" disabled selected>Blood Group</option>
      					            <option value="A+">A+</option>
      					            <option value="A-">A-</option>
      					            <option value="B+">B+</option>
      					            <option value="B-">B-</option>
      					            <option value="AB+">AB+</option>
      					            <option value="AB-">AB-</option>
      					            <option value="O+">O+</option>
      					            <option value="O-">O-</option>
      					          </select>
                        
                       </div>
                    </div>


                    <div class="form-row">
                      <div class="col-6 form-group">
                         <label>Quantity<span style="color:red">*</span></label>
                         <input type="text" name="quantity" id="myInput" class="form-control" />
                      </div>
                    </div> 


                    <div class="form-row">
                      <div class="col-6 form-group">
                          <label>Date : </label>
                         <input type="date" name="rdate" min="<?php echo date('Y-m-d'); ?>" class="form-control" id="myInput" />
                        <div class="validate"></div>
                      </div>
                 	</div>
                    
                    
                             
                    <div class="myBtn">
                      <button name="submit" type="submit">Save</button>
                      <button type="submit" onclick="document.getElementById('myInput').value = ''">Clear</button>
                    </div>


                  </form>
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
</body>
</html>
<?php } ?>