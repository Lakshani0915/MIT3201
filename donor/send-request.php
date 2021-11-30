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

  $NIC=$_POST['NIC'];
  $bloodgroup=$_POST['bloodgroup'];
  $name=$_POST['name'];
  $contactNo=$_POST['contactNo'];
  $email=$_POST['email'];
  $province=$_POST['province'];
  $district=$_POST['district'];
  

mysqli_select_db($dbh,'bbdms');
$sql = mysqli_query($dbh, "INSERT INTO  bloodrequests (NIC,bloodGroup,name,contactNo,email,province,district) VALUES('$NIC','$bloodgroup','$name','$contactNo','$email','$province','$district') ");

if ($sql) {
  $msg="Your info submitted successfully";

}else{

  $error="Something went wrong. Please try again". mysqli_error($con);
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
<?php include('includes/donor-topbar.php');?>

  <div class="ts-main-content">
<?php include('includes/donor-sidebar.php');?>
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
                         <label>NIC <span style="color:red">*</span></label>
                         <input type="text" name="NIC" class="form-control" id="myInput" placeholder="" data-rule="minlen:13" data-msg="Please enter a valid NIC"/>
                        
                      </div>

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
                         <label>Name<span style="color:red">*</span></label>
                         <input type="text" name="name" id="myInput" class="form-control" />
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