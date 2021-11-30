<?php
 error_reporting(0);
include('includes/config.php');
if(isset($_POST['reg']))
  {
    $nameErr = $NICErr = $genderErr = $ageErr = $emailErr = $contactErr = $bgErr = $addressErr = $provinceErr= $unErr= $pwdErr   ="";
    $name = $email = $gender = $age = $email =$contactno = $bloodgroup = $address = $province = $username = $password = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["name"])) {
        $nameErr = "Name is required";
      } else {
        $name = $_POST["name"];
      }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["NIC"])) {
        $NICErr = "NIC is required";
      } else {
        $NIC=$_POST['NIC'];
      }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["gender"])) {
        $genderErr = "Please select";
      } else {
        $gender=$_POST['gender'];
      }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["age"])) {
        $ageErr = "Age is required";
      } else {
        $age=$_POST['age'];
      }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["email"])) {
        $emailErr = "Email is required";
      } else {
        $email=$_POST['email'];
      }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["contactNo"])) {
        $contactErr = "Contact number is required";
      } else {
        $contactNo=$_POST['contactNo'];
      }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["bloodgroup"])) {
        $bgErr = "Please select";
      } else {
        $bloodgroup=$_POST['bloodgroup'];
      }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["address"])) {
        $addressErr = "Address is required";
      } else {
        $address=$_POST['address'];
      }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["province"])) {
        $provinceErr = "Please select";
      } else {
        $province=$_POST['province'];
      }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["username"])) {
        $unErr = "Username is required";
      } else {
        $username=$_POST['username'];
      }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["password"])) {
        $pwdErr = "Password is required";
      } elseif (($_POST["password"])!=($_POST["password1"])) {
        $pwdErr = "Password is not matched";
      }

      else {
        $password=md5($_POST['password']);
      }
    }

  $district=$_POST['district'];
   $status=0;


  
  
  $usertype="user";
 

mysqli_select_db($dbh,'bbdms');
$sql = mysqli_query($dbh, "INSERT INTO  donors (name,NIC,gender,age,email,contactNo,bloodgroup,address,province,district,status) VALUES('$name','$NIC','$gender','$age','$email','$contactNo','$bloodgroup','$address','$province','$district','$status') ");
$sql1 = mysqli_query($dbh, "INSERT INTO  login (name,username,password,usertype) VALUES ('$name','$username','$password','$usertype')"); 
if ($sql & $sql1) {
  $msg="Your info submitted successfully";
  echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
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
 	
  <div class="register" id="register">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
     <h4>Sign-Up</h4>
     <?php if($error){?>
                <div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
      else if($msg){?>
                <div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
    </div>

    <!-- Register Form -->
    <form method="post" id="geographia-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    	
      <div class="form-row">
        <div class="col-md-3">
    		  <label>Name<span style="color:red"> *</span></label>
        </div>
        <div class="col-md-8">
    		  <input type="text"  class="fadeIn second" name="name" id = "fname" placeholder=" Name"><br>
          <span class="error"><?php echo $nameErr;?></span>
 
        </div>
    	</div>
    		
      <div class="form-row">
        <div class="col-md-3">
          <label>NIC<span style="color:red"> *</span></label>
        </div>
        <div class="col-md-8">
          <input type="text"  class="fadeIn second" name="NIC" placeholder=" NIC"><br>
          <span class="error"><?php echo $NICErr;?></span>
        </div>
      </div>

      <div class="form-row">
        <div class="col-md-3">
          <label>Gender<span style="color:red"> *</span></label>

        </div>
        <div class="col-md-8">
          <select name="gender" class="form-control"  >
            <option value="" disabled selected>Please Select</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
          <br>
          <span class="error"><?php echo $genderErr;?></span>
        </div>
      </div>

      <div class="form-row">
        <div class="col-md-3">
          <label>Age<span style="color:red"> *</span></label>
        </div>
        <div class="col-md-8">
          <input type="text"  class="fadeIn second" name="age" placeholder="Your Age"><br>
          <span class="error"><?php echo $ageErr;?></span>
        </div>
      </div>
      
      <div class="form-row">
        <div class="col-md-3">
          <label>Email<span style="color:red"> *</span></label>
        </div>
        <div class="col-md-8">
          <input type="text"  class="fadeIn second" name="email" placeholder="abc@gmail.com"><br>
          <span class="error"><?php echo $emailErr;?></span>
        </div>
      </div>

      <div class="form-row">
        <div class="col-md-3">
          <label>Contact No<span style="color:red"> *</span></label>
        </div>
        <div class="col-md-8">
          <input type="text"  class="fadeIn second" name="contactNo" placeholder=""><br>
          <span class="error"><?php echo $contactErr;?></span>
        </div>
      </div>
        
      <div class="form-row">
        <div class="col-md-3">
          <label>Blood Group<span style="color:red"> *</span></label>
        </div>
        <div class="col-md-8">
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
          </select><br>
          <span class="error"><?php echo $bgErr;?></span>
        </div>
      </div>
      
      <div class="form-row">
        <div class="col-md-3">
          <label>Address<span style="color:red"> *</span></label>
        </div>
        <div class="col-md-8">
          <input type="text"  class="fadeIn second" name="address" placeholder=""><br>
          <span class="error"><?php echo $addressErr;?></span>
        </div>
      </div>

      <div class="form-row">
        <div class="col-md-3">
          <label>Province<span style="color:red"> *</span></label>
        </div>
        <div class="col-md-8">
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
          </select><br>
          <span class="error"><?php echo $provinceErr;?></span>
        </div>
      </div>

       <div class="form-row">
        <div class="col-md-3">
          <label>District<span style="color:red"> *</span></label>
        </div>
        <div class="col-md-8">
          <select name="district" id="categorySelect" class="form-control" size="1">
            <option value="" disabled selected>Choose Subcategory</option>
            <option></option>
          </select>
        </div>
      </div>

       <div class="form-row">
        <div class="col-md-3">
          <label>Username<span style="color:red"> *</span></label>
        </div>
        <div class="col-md-8">
          <input type="text"  class="fadeIn second" name="username" placeholder=""><br>
          <span class="error"><?php echo $unErr;?></span>
        </div>
      </div>

       <div class="form-row">
        <div class="col-md-3">
          <label>Password<span style="color:red"> *</span></label>
        </div>
        <div class="col-md-8">
          <input type="password"  class="fadeIn second" name="password" placeholder=""><br>
          <span class="error"><?php echo $pwdErr;?></span>
        </div>
      </div>

       <div class="form-row">
        <div class="col-md-3">
          <label>Confirm Password<span style="color:red"> *</span></label>
        </div>
        <div class="col-md-8">
          <input type="password"  class="fadeIn second" name="password1" placeholder="">
        </div>
      </div>

      <input type="submit" class="fadeIn fourth" value="Register" name="reg"  onclick="matchPassword()">
      <a href="login.php">Already have an account</a>

    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
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
