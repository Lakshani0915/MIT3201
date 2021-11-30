<?php
include('../includes/config.php');

if(isset($_POST['but_upload'])){
 
  $name = $_FILES['file']['name'];
  $target_dir = "a/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);

  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");

  // Check extension
  if( in_array($imageFileType,$extensions_arr) ){
     // Upload file
     if(move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name)){
        // Insert record
        mysqli_select_db($dbh,'bbdms');
$sql = mysqli_query($dbh, "INSERT INTO photos(name) values('".$target_file."')");
            }

  }
 
}
?>

<form method="post" action="" enctype='multipart/form-data'>
  <input type='file' name='file' />
  <input type='submit' value='Save name' name='but_upload'>
</form>
<?php
    $sql1 = mysqli_query($dbh, "SELECT * from photos");

  while ($row = mysqli_fetch_array($sql1)) {
          $image = $row["name"];
  ?>
  <img src="<?php echo $image; ?>" width="auto">
<?php } ?>
