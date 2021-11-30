<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:../index.php');
}
else{ 


 
  if(isset($_REQUEST['del']))
        {
      $del=$_GET['del'];
      mysqli_select_db($dbh,'bbdms');
      $sql = mysqli_query($dbh,"delete from donors WHERE  NIC='$del'");
      
      $msg="Record deleted Successfully ";
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
               <h2>Donor List</h2>

                  <div class="search-text">
                    <input type="text" id="bg" onkeyup="myFunction()" placeholder="Search for Blood Group">
                    <input type="text" id="district" onkeyup="myFunction1()" placeholder="Search for District">
                  </div>
<?php if($error){?>
                <div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
      else if($msg){?>
                <div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

                  <table  id="myTable" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      
                      <th>Full Name</th>
                      <th>NIC</th>
                      <th>Contact No</th>
                      <th>Email</th>
                      <th>Gender</th>
                      <th>Age</th>
                      <th>Blood Group </th>
                      <th>Address</th>
                      <th>District</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  
                  <tbody>


<?php 

mysqli_select_db($dbh,'bbdms');
$sql  = mysqli_query($dbh, "SELECT * from  donors ");

  while ($row = mysqli_fetch_array($sql)) {
      $FullName = $row["name"];
      $NIC = $row["NIC"];
      $ContactNo = $row["contactNo"];
      $Email = $row["email"];
      $Gender = $row["gender"];
      $Age = $row["age"];
      $BloodGroup = $row["bloodgroup"];
      $Address = $row["address"];
      $District = $row["district"];
      $status = $row["status"];
  
?>  
                    <tr>
                      <td><?php echo "$FullName";?></td>
                      <td><?php echo "$NIC";?></td>
                      <td><?php echo "$ContactNo"; ?></td>
                      <td><?php echo "$Email";?></td>
                      <td><?php echo "$Gender";?></td>
                      <td><?php echo "$Age";?></td>
                      <td><?php echo "$BloodGroup"; ?></td>
                      <td><?php echo "$Address";?></td>
                      <td><?php echo "$District";?></td>
                        
                      <td>

<a href="donor-list.php?del=<?php echo "$NIC";?>" onclick="return confirm('Do you really want to delete this record')"> Delete</a>
                      </td>

                    </tr>
                    <?php $cnt=$cnt+1; }} ?>
                    
                  </tbody>
                </table>               
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("bg");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[6];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
  
}
function myFunction1() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("district");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[8];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
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
