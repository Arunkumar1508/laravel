<?php
 include("database.php");
 

 $searchedWord = explode(".", basename($_SERVER['REQUEST_URI']))[0];
	//    echo $searchedWord;
 
  $find1=$searchedWord;

  $_SESSION['left']=$_SERVER['REQUEST_URI'];
  



$sql = "select * from dictionary_word where word_name='$find1'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $wordname=$row["word_name"];
        $wordid=$row["word_id"];
        $_SESSION["wordid"]=$wordid;
        $sys2 = $row['word_sys'];
        $image=$row["word_image"];
        // echo"$image";
        $ant2 = $row['word_anto'];
        $sys1 = json_decode($sys2, true);
        $ant1 = json_decode($ant2, true);
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
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/bootstrap-5.3.0-dist/css/bootstrap.min.css">
</head>
<body>
<div class="sit p-3">
    <?php if(isset($_SESSION['name1'])){?>
        <nav class="navbar navbar-light bg-dark">
            <div class="container">
                <form action="" method="post" class="d-flex m-2">
                    <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success btn1 " type="submit">Search</button> -->

                    <a href="login.php" class="btn btn-info py-1 px-2  me-2" name="search" value="search">Login</a>
                    <form action="" method="post">
        <input type="submit" class='btn btn-danger mt-4' value="Logout" name="logout">
    </form>
          
                    <a href="page1.php" class="btn btn-danger me-2 ">Back </a>

                </form>
            </div>
        </nav>
    <?php } else{?>

        <nav class="navbar navbar-light bg-dark">
        <div class="container">
            <form action="" method="post" class="d-flex m-2">
                <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success btn1 " type="submit">Search</button> -->

                <a href="login.php" class="btn btn-info me-2" name="search" value="search">Login</a>
                <a href="signup.php" class="btn btn-warning me-2 " name="search" value="search">Register</a>
                <a href="index.php" class="btn btn-danger me-2 ">Back </a>

            </form>
        </div>
    </nav>
    <?php } ?>
     
    <h1>Welcome:
    <?php if(isset($_SESSION['name1'])) {?>
     
            <?php echo $_SESSION['name1']?>
            <?php } else{?>
                <?php echo 'GUEST'?>
            <?php } ?>
        </h1>
        <hr>

        <h2 class="">Word:
            <?php echo $wordname ?>
        </h2>

        <?php echo "<img src='./img/$image' alt='' width='250px' height='250px'> " ?>

        <hr>

        <?php if(isset($_SESSION['name1'])) {?>
            <h2>Synonyms-
            <?php echo implode(",", $sys1) ?><a href="synonymns.php" class="btn btn-outline-success">+

            </a>
        </h2>
        <h2>Antonyms-
            <?php echo implode(",", $ant1) ?><a href="antonymns.php" class="btn btn-outline-success">+</a>
        </h2>
    
     <?php } else{?>
        <h2>Synonyms-
            <?php echo implode(",", $sys1) ?>
        </h2>
        <h2>Antonyms-
            <?php echo implode(",", $ant1) ?>
        </h2>
         
     <?php } ?>

        <!-- <h2>Synonyms-
            <?php echo implode(",", $sys1) ?><a href="synonymns.php" class="btn btn-outline-success">+

            </a>
        </h2>
        <h2>Antonyms-
            <?php echo implode(",", $ant1) ?><a href="antonymns.php" class="btn btn-outline-success">+</a>
        </h2> -->



        <hr>
        <?php if(isset($_SESSION['name1'])) {?>
            <form action="" method="post" class="d-flex m-2 search1">
            <h2>Add comments: </h2>
            <input type="textarea" placeholder="enter your comments" name="submit2" style="width: 400px;height: 50px;">
            <br><br>
            <button class="btn btn-secondary mt-2 " name="post" value="post">Post</button>

        </form>
     
    
     <?php } else{?>
        
     <?php } ?>
      

    

        <h2>Comments:
            <?php ?>
        </h2>

        <?php 
        
        // $sql2="SELECT comment FROM comments INNER JOIN word WHERE comments.com_id=word.word_id";
$sql2 = "SELECT com_word_name,comment FROM dictionary_comments";
$result3 = $conn->query($sql2);
// echo"$result3";
if ($result3->num_rows > 0) {
    while ($row = $result3->fetch_assoc()) {
        $comment = $row['comment'];
        echo $comment . '<h1></h1>';

    }
}
// }else{
//       header('location:list.php')  ;
// }




?>
<?php
// include('database.php');
if (isset($_POST['post'])) {
    $comment = $_POST['submit2'];
    // echo"$comment";

    $sql2 = "INSERT INTO dictionary_comments(com_word_name,com_word_id,comment,name)VALUES('$wordname','$wordid','$comment','$name')";

    if ($conn->query($sql2) == true) {
        // echo 'insert data';
    } else {
        echo "error" . mysqli_error($conn);
    }


}?>



    
</body>
</html>