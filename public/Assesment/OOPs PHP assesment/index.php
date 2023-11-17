<?php
include('database.php');
$get_url = $_SERVER["REQUEST_URI"];
$get_urlarray = explode("/", $get_url);
$get_end = $get_urlarray[count($get_urlarray) - 3];
$get_end1 = $get_urlarray[count($get_urlarray) - 2];
$get_end2 = $get_urlarray[count($get_urlarray) - 1];
$_SESSION['reg_url'] = $get_end . "/" . $get_end1 . "/" . $get_end2;
$_SESSION['entry_url'] = $get_end . "/" . $get_end1 . "/" . $get_end2;

if(isset($_POST["submit"])){
    $find=$_POST["search"];
    
    // print_r($finds);

    $sql6 = "SELECT * FROM dictionary_word where  word_name='$find' and word_status=1";
    $result = $conn->query($sql6);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $image = $row['word_image'];
            $wordname = $row['name'];
            $wordname2 = $row['word_name'];
            $sys2 = $row['word_sys'];
            $ant2 = $row['word_anto'];
            $sys1 = json_decode($sys2, true);
            $ant1 = json_decode($ant2, true);
        }
        if($find==$wordname2 ){
            header("location:./$find");
        }
       
    }  else {
        header('location:404.php');
    }

}



?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap-5.3.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div class="buff">
        <div class="container p-3 ">
            <div class="row">
                <div class="col">
                    <h2 class="man">Dictionary</h2>
                </div>

                <div class="col group2 gap-2">
                    <a href="login.php"><button class="btn btn-success mt-4 ">Login</button></a>
                    <a href="signup.php"><button class="btn btn-warning mt-4 ">Register</button></a>
                </div>
            </div>
        </div> <br>
        <div class="centerss p-5">
            <h2 style="text-align: center;">Search Word Here</h2>
            <form action="" method="post" class="d-flex m-2 search1 p-4">
                <input class="form-control dsa me-2" style="width: 500px; margin-left:600px" type="search" name="search"
                    placeholder="Search" aria-label="Search">
                <input class="btn btn-outline-success btn1 " type="submit" name="submit" value="Search">

            </form>


        </div>

    </div>


</body>

</html>