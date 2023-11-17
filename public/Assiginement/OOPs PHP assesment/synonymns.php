<?php

include('database.php');
$id = $_SESSION['wordid'];
// echo"$id";
// $_SESSION['id']=$id;


$mess = '';

if (isset($_POST['submit'])) {
    echo $id;
    $sys = $_POST['syno'];

    $sql = "SELECT word_sys FROM dictionary_word WHERE word_id='$id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $array_sys = json_decode($row['word_sys'], true);
            // $id = $_SESSION['word_id'];

        }

    }
    array_push($array_sys, $sys);
    $sys_array = json_encode($array_sys, true);
    $sql1 = "UPDATE dictionary_word SET word_sys ='$sys_array' WHERE  word_id='$id' ";
    if ($conn->query($sql1) == true) {
        $mess = 'insert successfully';
    }
}







?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syno</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/bootstrap-5.3.0-dist/css/bootstrap.min.css">


</head>

<body class="but">
    <div class="container show1">
        <div class="row ">
            <div class="col-6">
                <h2>Add Synonymns</h2>
                <form action="" method="post" class="d-flex m-2 p-4 ">
                    <input class="form-control me-2" style="width: 500px;" name="syno" type="add" placeholder="add"
                        aria-label="Add">

                    <input href="" class="btn btn-outline-success" name="submit" type="submit" value="Add">

                    <a href="list.php" class="btn btn-outline-danger btn1 ">Back</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>