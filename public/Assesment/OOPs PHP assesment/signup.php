<?php
// print_r($_POST);
include('database.php');

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $Password = $_POST['Password'];
  $number = $_POST['number'];
  $register = $_SESSION['reg_url'];
  $entry = $_SESSION['entry_url'];
  $hash = password_hash($Password, PASSWORD_DEFAULT);

  $sql = "INSERT INTO dictionary_student(name,Password,number,entrypath,registerpath)values('$name','$hash','$number','$entry','$register')";
  mysqli_query($conn, $sql);
  if ($sql) {
    header("location:login.php");
  } else {
    header('location:404.php');
    $conn->$error;
  }

}





?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Index</title>
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/bootstrap-5.3.0-dist/css/bootstrap.min.css">
</head>

<body>
  <section class="all2">

    <div class="container py-5">

      <div class="drop mt-5">
        <div class="content ">
          <h2>SIGNUP</h2>
          <form action="" method="post">

            <div class="inputBox">
              <input type="text" class="" id="name" name="name" required placeholder="name">

            </div>

            <div class="inputBox">
              <input type="text" class="" id="Password" name="Password" required placeholder="password">

            </div>
            <div class="inputBox">
              <input type="number" class="" id="number" name="number" required placeholder="number">

            </div>


            <div class="inputBox">
              <input type="submit" value="submit" name="submit">

            </div>

            

          </form>


        </div>
      </div>

      <a href="login.php" class="btns signup">Login</a>

    </div>



  </section>

</body>

</html>