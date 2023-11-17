<?php

include('database.php');
$id = $_SESSION['wordid'];
// echo"$id";
// $_SESSION['id']=$id;


$mess = '';

    if (isset($_POST['submit'])) {
        echo $id;
        $ant = $_POST['ant'];
    
        $sql = "SELECT word_anto FROM dictionary_word WHERE word_id='$id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $array_ant = json_decode($row['word_anto'], true);
                // $id = $_SESSION['word_id'];

            }

        }
        array_push($array_ant,$ant);
        $ant_array = json_encode($array_ant, true);
        $sql1 = "UPDATE dictionary_word SET word_anto ='$ant_array' WHERE  word_id='$id' ";
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
    <title>Anto</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/bootstrap-5.3.0-dist/css/bootstrap.min.css">


</head>

<body class="but">
    <div class="container show1">
        <div class="row ">
            <div class="col-6">
                <h2>Add Antonyms</h2>
                <form action="" method="post" class="d-flex m-2 p-4 ">
                    <input class="form-control me-2" style="width: 500px;" name="ant" type="add" placeholder="add"
                        aria-label="Add">

                    <input href="" class="btn btn-outline-success" name="submit" type="submit" value="Add">

                    <a href="list.php" class="btn btn-outline-danger btn1 ">Back</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>