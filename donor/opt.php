<?php 
include('../includes/config.php');

mysqli_select_db($dbh,'bbdms');
$sql1 = mysqli_query($dbh, "SELECT * from donors");

if(isset($_REQUEST['opt']))
                           {
                              $NIC = $_GET["opt"];
                              $status = "0";
                              $sqlq= mysqli_query($dbh,"UPDATE donors SET status='$status'");

                              if ($sqlq) {
                               echo "Your info updated successfully";

                              }else{

                               echo "Something went wrong. Please try again". mysqli_error($dbh);
                                
                      }        }
                              
?>