<?php

include('database.php');
$name = $_SESSION['name1'];

if (isset($_POST['submit'])) {
    $find = $_POST['search'];
// echo"$find";

    $sql = "SELECT * FROM dictionary_word WHERE word_name='$find' ";
    $result = $conn->query($sql);
    // echo"$result";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $wordname = $row['word_name'];
            
            $image=$row['word_image'];
            $sys1=$row['word_sys'];
            $ant1=$row['word_anto'];
            $_SESSION['wordsys'] = $sys1;
            $_SESSION['wordant'] = $ant1;
            $_SESSION['wordname'] = $wordname;
            $_SESSION['image']=$image;
       
            $_SESSION['wordid']=$row['word_id'];

        
        }
        if ($wordname == $find) {
            header("location:./$find");
        }
       
    }
    else {
               
        header('location:404.php');

    }
}

if(isset($_POST["logout"])){
    header('location:index.php');
    session_destroy();
    
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/bootstrap-5.3.0-dist/css/bootstrap.min.css">


</head>


<body>
    <div class="datq">

    
    <div class="container" mt-2>
        <h2 class="man1">Dictionary</h2>

        <h2 class="aa">Welcome:<span>
                <?php echo $name ?>
            </span> </h2>
<div class=" tass p-3">
        <a href="page2.php "><button class="btn btn-primary mt-4  ">+</button></a>
        <form action="" method="post">
        <input type="submit" class='btn btn-danger ms-5 ' value="Logout" name="logout">
    </form>
        </div>
    </div>

    <form action="" method="post" class="d-flex m-2 p-5 search1">
        <input class="form-control dsa1 me-2 " style="width: 500px; margin-left:600px"  type="search" name="search" placeholder="Search"
            aria-label="Search">
        <input  class="btn btn-outline-success btn1 " type="submit" name="submit" value="Search">

    </form>
    </div>
</body>

</html>