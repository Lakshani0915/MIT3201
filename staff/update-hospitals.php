<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:../index.php');
}
else{ 

    if(isset($_REQUEST['update']))
    {
      $id=$_GET['update'];

        mysqli_select_db($dbh,'bbdms');
        $sql  = mysqli_query($dbh, "SELECT * from  hospitals where id='$id'");

      if(isset($sql)) {
        $msg="";

      }else{

        $error="Something went wrong. Please try again". mysqli_error($dbh);
        
      }
}
if(isset($_POST['submit']))
  {

  $id=$_GET['update'] ; 
  $hospitalname=$_POST['hospitalname'];
  $contactNo=$_POST['contactNo'];
  $email=$_POST['email'];
  $address=$_POST['address'];
  $province=$_POST['province'];
  $district=$_POST['district'];
  

mysqli_select_db($dbh,'bbdms');
$sql = mysqli_query($dbh, "UPDATE hospitals SET contactno='$contactNo',email='$email',address='$address' WHERE  id='$id'");

if(isset($sql)) {
  $msg="";

}else{

  $error="Something went wrong. Please try again". mysqli_error($dbh);
  
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
<?php include('includes/staff-topbar.php');?>

  <div class="ts-main-content">
<?php include('includes/staff-sidebar.php');?>
    <div class="content-wrapper">
      <div class="container-fluid">
        <div class="row">
          
          <div class="col-md-12">          
            <div class="panel-body">
               <h2>Add Hospitals</h2>

<?php if($error){?>
                <div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
      else if($msg){?>
                <div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

                   <?php 

                  while ($row = mysqli_fetch_array($sql)) {
                      $hospitalname = $row["hospitalname"];
                      $contactNo = $row["contactno"];
                      $email = $row["email"];
                      $address = $row["address"];
                      $province = $row["province"];
                      $district = $row["district"];
}
                ?>  

                  <form method="post" class="form-horizontal" enctype="multipart/form-data">
  
                    <div class="form-row">
                       <div class="col-6 form-group">                      
                         <label>Hospital <span style="color:red">*</span></label>
                         <input type="text" name="hospitalname" value="<?php echo "$hospitalname";?>" class="form-control" id="myInput" disabled />
                        
                      </div>
                      
                      <div class="col-6 form-group">
                           <label>Contact No<span style="color:red">*</span></label>
                           <input type="text" name="contactNo" value="<?php echo "$contactNo";?>" class="form-control" id="myInput" />
                        <div class="validate"></div>
                      </div>
                    </div> 


                    <div class="form-row">
                      <div class="col-6 form-group">
                          <label class="control-label">Email<span style="color:red">*</span></label>
                          <input type="text" name="email" value="<?php echo "$email";?>" id="myInput" class="form-control" >
                        <div class="validate"></div>
                      </div>
                    
                      <div class="col-6 form-group">
                         <label class="control-label">Address : <span style="color:red">*</span></label>
                        <input type="text" name="address" value="<?php echo "$address";?>" id="myInput" class="form-control" >
                        <div class="validate"></div>
                      </div>
                    </div> 

                    <div class="form-row">
                       <div class="col-6 form-group">                      
                         <label>Pronince <span style="color:red">*</span></label>
                         <input type="text" name="province" value="<?php echo "$province";?>" class="form-control" id="myInput" disabled />
                        
                      </div>
                      
                      <div class="col-6 form-group">
                           <label>District<span style="color:red">*</span></label>
                           <input type="text" name="district" value="<?php echo "$district";?>" class="form-control" disabled id="myInput" />
                        <div class="validate"></div>
                      </div>
                    </div> 
                  
                              
                    <div class="myBtn">
                      <button name="submit" type="submit">Update</button>
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
<?php  }?>