<?php
$image = "";
include('database.php');
$id = $_SESSION['wordid'];

$name = $_SESSION['name'];
$wordname = $_SESSION['wordname'];
$image = $_SESSION['image'];
$sql = "select * from dictionary_word where word_id='$id'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sys2 = $row['word_sys'];
        $ant2 = $row['word_anto'];
        $sys1 = json_decode($sys2, true);
        $ant1 = json_decode($ant2, true);
    }
}



?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/bootstrap-5.3.0-dist/css/bootstrap.min.css">
</head>

<body>
  
    <div class="sit">
 

        <nav class="navbar navbar-light bg-dark">
            <div class="container">
                <form action="" method="post" class="d-flex m-2">
                    <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success btn1 " type="submit">Search</button> -->

                    <a href="login.php" class="btn btn-info me-2" name="search" value="search">Login</a>
                    <a href="signup.php" class="btn btn-warning me-2 " name="search" value="search">Register</a>
                    <a href="page1.php" class="btn btn-danger me-2 ">Back </a>

                </form>
            </div>
        </nav>

        <h1>Welcome:
            <?php echo $name ?>
        </h1>
        <hr>

        <h2 class="">Word:
            <?php echo $wordname ?>
        </h2>

        <?php echo "<img src='$image' alt='' width='250px' height='250px'> " ?>

        <hr>



        <h2>Synonyms-
            <?php echo implode(",", $sys1) ?><a href="synonymns.php" class="btn btn-outline-success">+

            </a>
        </h2>
        <h2>Antonyms-
            <?php echo implode(",", $ant1) ?><a href="antonymns.php" class="btn btn-outline-success">+</a>
        </h2>



        <hr>
      
      

        <form action="" method="post" class="d-flex m-2 search1">
            <h2>Add comments: </h2>
            <input type="textarea" placeholder="enter your comments" name="submit2" style="width: 400px;height: 50px;">
            <br><br>
            <button class="btn btn-secondary mt-2 " name="post" value="post">Post</button>

        </form>

        <hr>

        <h2>Comments:
            <?php ?>
        </h2>

</body>

</html>
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

    $sql2 = "INSERT INTO dictionary_comments(com_word_name,com_word_id,comment,name)VALUES('$wordname','$id','$comment','$name')";

    if ($conn->query($sql2) == true) {
        // echo 'insert data';
    } else {
        echo "error" . mysqli_error($conn);
    }


}
?>
</div>