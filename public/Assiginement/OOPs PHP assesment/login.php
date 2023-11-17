<?php
  // session_start();
 
  include('database.php');
  $error='';
if (isset($_POST['login'])) {
    $name = $_POST['name'];
    $Password = $_POST['Password'];
   
    $sql = "SELECT * FROM dictionary_student  WHERE name='$name'";
  
    $result = mysqli_query($conn, $sql);
    if(empty($name)||empty($Password)){
      echo"enter the details";
    }

    else{
   while($row=$result->fetch_assoc()){
       $fullname=$row['name'];
  // print_r($fullname);
      $hash_Password=$row['Password'];

      $isadmin=$row['is_admin'];

}
   
if(password_verify($Password,$hash_Password)){
  $_SESSION['name']=$name;

  $_SESSION['id']=$row['id'];

  if( $fullname==$name && password_verify($Password,$hash_Password) && $isadmin==1){
    header('location:admin.php');
    
   
  }else{

    header('location:page1.php');
  }
  
  exit();

}
else{
  echo "<div class=' alert alert-danger' >Invalid Username or Password</div>";
}

}



   
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/bootstrap-5.3.0-dist/css/bootstrap.min.css">

    
</head>

<body>   

<section class="all1">
    <div class="container py-5 ">

<div class="drop mt-5">
  <div class="content">
    <h2>LOGIN</h2>
    <form action="" method="post">

      <div class="inputBox">
      <input type="text"  id="name" name="name" required placeholder="name">

      </div>

      <div class="inputBox">
      <input type="text"  id="Password" name="Password" required placeholder="password">

      </div>
      <div class="inputBox">
        <input type="submit" value="Login" name="login" >

      </div>
  <h2><?php 
   echo $error?></h2>

    </form>

  </div>
</div>


<a href="signup.php" class="btns signup1">signup</a>
<br><br><br>
<a href="index.php" class="btns ">Back</a>

</div>

</section>
</body>

</html>