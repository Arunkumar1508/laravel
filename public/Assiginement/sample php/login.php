<?php
  session_start();
 require_once 'database.php';
if (isset($_POST['login'])) {
    $name = $_POST['name'];
    $Password = $_POST['Password'];
   
    $sql = "SELECT * FROM student  WHERE name='$name' AND Password='$Password'";
    $result = mysqli_query($conn, $sql);
    if($result){
        $num=mysqli_num_rows($result);
        if($num > 0){
          
            $_SESSION['name']=$name;
            header("location:home.php");
          
        }else{
            echo"<div class='danger1'>Invalid Username or Password</div>";
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
    
</head>

<body>


    <div class="container">

<div class="drop">
  <div class="content">
    <h2>LOGIN</h2>
    <form action="login.php" method="post">

      <div class="inputBox">
      <input type="text" class="" id="name" name="name" required placeholder="name">

      </div>

      <div class="inputBox">
      <input type="text" class="" id="Password" name="Password" required placeholder="password">

      </div>
      <div class="inputBox">
        <input type="submit" value="Login" name="login" >

      </div>


    </form>

  </div>
</div>


<a href="index.php" class="btns signup1">signup</a>
<br><br><br>
<a href="index.php" class="btns ">Back</a>

</div>


</body>

</html>