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

  $hospitalname=$_POST['hospitalname'];
  $contactNo=$_POST['contactNo'];
  $email=$_POST['email'];
  $address=$_POST['address'];
  $province=$_POST['province'];
  $district=$_POST['district'];
  $username=$_POST['username'];
  $password=md5($_POST['password']);
  $usertype="hospital";
  

mysqli_select_db($dbh,'bbdms');
$sql = mysqli_query($dbh, "INSERT INTO  hospitals (hospitalname,contactno,email,address,province,district) VALUES('$hospitalname','$contactNo','$email','$address','$province','$district') ");
$sql1 = mysqli_query($dbh, "INSERT INTO  login (name,username,password,usertype) VALUES ('$hospitalname','$username','$password','$usertype')");

if ($sql) {
  $msg="Your info submitted successfully";

}else{

  $error="Something went wrong. Please try again". mysqli_error($con);
  
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
<?php include('includes/admin-topbar.php');?>

  <div class="ts-main-content">
<?php include('includes/admin-sidebar.php');?>
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

                  

                  <form method="post" class="form-horizontal" enctype="multipart/form-data">
  
                    <div class="form-row">
                       <div class="col-6 form-group">                      
                         <label>Hospital <span style="color:red">*</span></label>
                         <input type="text" name="hospitalname" class="form-control" id="myInput" placeholder="" data-rule="minlen:13" data-msg="Please enter a valid NIC"/>
                        
                      </div>
                      
                      <div class="col-6 form-group">
                           <label>Contact No<span style="color:red">*</span></label>
                           <input type="text" name="contactNo" class="form-control" id="myInput" data-rule="minlen:10" data-msg="Please enter a valid NIC" />
                        <div class="validate"></div>
                      </div>
                    </div> 


                    <div class="form-row">
                      <div class="col-6 form-group">
                          <label class="control-label">Email<span style="color:red">*</span></label>
                          <input type="text" name="email" id="myInput" class="form-control" >
                        <div class="validate"></div>
                      </div>
                    
                      <div class="col-6 form-group">
                         <label class="control-label">Postal Address<span style="color:red">*</span></label>
                        <textarea name="address" id="myInput" class="form-control" ></textarea>
                        <div class="validate"></div>
                      </div>
                    </div> 

                    <div class="form-row">
                      <div class="col-6 form-group">
                         <label>Province<span style="color:red">*</span></label>
                          <select name="province" id="category" size="1" class="form-control" onchange="makeSubmenu(this.value)">
                            <option value="" disabled selected>Choose Category</option>
                            <option value="Western" >Western</option>
                            <option value="Eastern">Eastern</option>
                            <option value="North Central">North Central</option>
                            <option value="Uva">Uva</option>
                            <option value="Southern">Southern</option>
                            <option value="Central">Central</option>
                            <option value="Sabaragamuwa">Sabaragamuwa</option>
                            <option value="North Western">North Western</option>
                            <option value="Northern">Northern</option>
                          </select>
                      </div>
                      
                      <div class="col-6 form-group">
                           <label>District<span style="color:red">*</span></label>
                           <select name="district" id="categorySelect" class="form-control" size="1">
                            <option value="" disabled selected>Choose Subcategory</option>
                            <option></option>
                          </select>
                        <div class="validate"></div>
                      </div>
                    </div>     
                       
                    <div class="form-row">
                      <div class="col-6 form-group">
                         <label class="control-label">User Name<span style="color:red">*</span></label>
                          <input type="text" name="username" id="myInput" class="form-control" >
                        <div class="validate"></div>
                      </div>
                    </div>   
                        
                    <div class="form-row">
                      <div class="col-6 form-group">
                         <label class="control-label">Password<span style="color:red">*</span></label>
                         <input type="password" name="password" id="myInput" class="form-control" >
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
      <script type="text/javascript">
    var subcategory = {
            "Western": ["Colombo", "Gampaha", "Kalutara"],
            "Eastern": ["Batticaloa", "Trincomalee", "Ampara"],
            "North Central": ["Anuradhapura", "Polonnaruwa"],
            "Uva": ["Badulla", "Monaragala"],
            "Southern": ["Galle", "Matara", "Hambantota"],
            "Central": ["Kandy", "Nuwara Eliya", "Matale"],
            "Sabaragamuwa": ["Kegalle", "Ratnapura"],
            "North Western": ["Kurunegala", "Puttalam"],
            "Northern": ["Jaffna", "Kilinochchi", "Mannar", "Mullaitivu", "Vavuniya"]
        }

        function makeSubmenu(value) {
            if (value.length == 0) document.getElementById("categorySelect").innerHTML = "<option></option>";
            else {
                var citiesOptions = "";
                for (categoryId in subcategory[value]) {
                    citiesOptions += "<option>" + subcategory[value][categoryId] + "</option>";
                }
                document.getElementById("categorySelect").innerHTML = citiesOptions;
            }
        }
   </script>             
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