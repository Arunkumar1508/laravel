<?php
$image = "";
include('database.php');
$id = $_SESSION['wordid'];

// $name = $_SESSION['name'];
$wordname = $_SESSION['wordname'];
// $image = $_SESSION['image'];
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

<?php


if (isset($_GET['submit'])) {
    $finds = $_GET['search'];
    // print_r($finds);

    $sql6 = "SELECT * FROM dictionary_word where  word_name='$finds' and word_status=1";
    $result = $conn->query($sql6);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $image = $row['word_image'];
            $wordname = $row['name'];
            $sys2 = $row['word_sys'];
            $ant2 = $row['word_anto'];
            $sys1 = json_decode($sys2, true);
            $ant1 = json_decode($ant2, true);
        }
    } else {
        header('location:404.php');
    }
}

$get_url = $_SERVER["REQUEST_URI"];
$get_urlarray = explode("/", $get_url);
$get_end = $get_urlarray[count($get_urlarray) - 3];
$get_end1 = $get_urlarray[count($get_urlarray) - 2];
$get_end2 = $get_urlarray[count($get_urlarray) - 1];
$_SESSION['reg_url'] = $get_end . "/" . $get_end1 . "/" . $get_end2;
// $_SESSION['entry_url'] = $get_end . "/" . $get_end1 . "/" . $get_end2;






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

<body class="sit">
<div class="just2">
        
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

    <!-- <h1>Welcome:
        <?php ?>
    </h1> -->
    <hr>

    <h2 class="">Word:
        <?php echo $wordname ?>
    </h2>

    <?php echo "<img src='$image' alt='' width='250px' height='250px'> " ?>

    <hr>



    <h2>Synonyms-
        <?php echo implode(",", $sys1) ?><a href="synonymns.php"></a>

        </a>
    </h2>
    <h2>Antonyms-
        <?php echo implode(",", $ant1) ?><a href="antonymns.php"></a>
    </h2>



    <hr>
    <!-- <div class="">
        <h2>Add comments: </h2>
        <input type="textarea" placeholder="enter your comments" style="width: 700px;height: 150px;">
        <br>
        <button class="btn btn-secondary mt-2 " name="search" value="search">Post</button>

    </div> -->

 
 
<h2>Comments:
        <?php ?>
    </h2
    >

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
        echo $comment
            . '<br>';
    }
}





?>
<?php

if (isset($_POST['post'])) {
    $comment = $_POST['submit2'];


    $sql2 = "INSERT INTO dictionary_comments(com_word_name,com_word_id,comment,name)VALUES('$wordname','$id','$comment','$name')";

    if ($conn->query($sql2) == true) {
    } else {
        echo "error" . mysqli_error($conn);
    }


}
?>
  