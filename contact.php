<?php

include('includes/config.php');


  
  $name=$_POST['name'];
  $email=$_POST['email'];
  $subject=$_POST['subject'];
  $Message=$_POST['Message'];
 
  $status=0;

mysqli_select_db($dbh,'bbdms');
$sql = mysqli_query($dbh, "INSERT INTO  contactusquery (name,email,subject,Message,status) VALUES('$name','$email','$subject','$Message','$status') ");

if ($sql) {
  $msg="Your info submitted successfully";

}else{

  $error="Something went wrong. Please try again". mysqli_error($con);
  echo("Please try again". mysqli_error($con));
}





  ?>