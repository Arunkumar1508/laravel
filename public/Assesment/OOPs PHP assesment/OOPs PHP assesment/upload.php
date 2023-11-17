<?php
include('database.php');





if(isset($_POST['submit'])){
   $name=$_FILES['files'];
   echo'<pre>';
   print_r($name);

   $file_name=$_FILES['files']['name'];
   $temp=$_FILES['files']['tmp_name'];
   
   $sql="insert into employee(product) values('$file_name')";

   if ($conn->query($sql) === TRUE) {
    move_uploaded_file($temp,$file_name);
  } else {
    echo "Error: " . $sql . "<br>" ;
  }
   
 

}





?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">

     <input type="file" name="files">
     <input type="submit" value="submit" name="submit">
    </form>
</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
     $sql1='select * from employee';
     $run=$conn->query($sql1);
     if($run->num_rows>0){
        while($row=$run->fetch_assoc()){
            $img=$row['product'];
           echo "<img src='$img' alt=''>";
        }
     }
    
    ?>
</body>
</html>