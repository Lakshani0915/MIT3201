<?php 
if(isset($_REQUEST['opt']))
        {
            $NIC = $_GET["opt"];
            $status = "0";

            $sqlq= mysqli_query($dbh,"UPDATE donors SET status='$status' WHERE NIC='$NIC'");

            if ($sqlq) {
              echo "Your info updated successfully";

            }else{

              echo "Something went wrong. Please try again";
                                
            }
         }       


