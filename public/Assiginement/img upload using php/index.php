<?php

if(isset($_POST['submit'] )){
  echo"<pre>";

  print_r($_FILES['files']);
  
  echo"<pre>";

  $upload_error=array(
    UPLOAD_ERR_OK => "There is no error",
    UPLOAD_ERR_INI_SIZE=>"The uploaded file exceeds the upload_max_filesize directive in php.ini",
    UPLOAD_ERR_FORM_SIZE =>"The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.",
    UPLOAD_ERR_PARTIAL =>" The uploaded file was only partially uploaded.",
    UPLOAD_ERR_NO_FILE =>"No file was uploaded",
    UPLOAD_ERR_NO_TMP_DIR =>" Missing a temporary folder",
    UPLOAD_ERR_CANT_WRITE=>"Failed to write file to disk",
    UPLOAD_ERR_EXTENSION =>"A PHP extension stopped the file upload. "
  );

  $temp_name=$_FILES['files']['tmp_name'];
  $the_file=$_FILES['files']['name'];
  $directory="img";

if(move_uploaded_file($temp_name,$directory . "/" . $the_file)){
$the_message="File upload successfully";
}
else{

  $the_error=$_FILES['files']['error'];
  $the_message=$upload_error[$the_error];
}


}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>img upload</title>
    <link rel="stylesheet" href="./css/bootstrap-5.3.0-dist/css/bootstrap.min.css">
</head>
<body>
<h1>Image Upload</h1>

<?php 
if(!empty( $upload_error)){
  echo $the_message;
}
?>

<form action="index.php" method="post" enctype="multipart/form-data">
  
  <br><br>  
  <input type="file" name="files">
  <br><br>
  <input type="submit"  name="submit" class="btn btn-success">
</form>
    
</body>
</html>

