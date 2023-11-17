<?php
include('database.php');
$username1 = $_SESSION['name'];
if (isset($_POST['submit'])) {
    $name = $_FILES['files'];

    $addword = $_POST['addword'];
    $array = array();
    $array1 = json_encode($array, true);


    $file_name = $_FILES['files']['name'];
    $temp = $_FILES['files']['tmp_name'];

    // echo"$username";

    $sql = "insert into dictionary_word(name,word_image,word_name,word_anto,word_sys) values('$username1','$file_name','$addword','$array1','$array1')";

    if ($conn->query($sql) === TRUE) {
        $folder='img';
        move_uploaded_file($temp,$folder."/". $file_name);
        // move_uploaded_file($temp, $file_name);
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }



}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Add words</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/bootstrap-5.3.0-dist/css/bootstrap.min.css">

</head>

<body>
    <div class="yout">
        <h1>Welcome User:
            <?php echo $username1; ?>
        </h1>
        <div class="container  d-flex flex-column p-4">
            <h2>Add Words Here</h2> <br>
        </div>
        <div class="bat">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="search" name="addword" class="vertical1">
                <br><br>
                <input type="file" name="files">
                <br>
                <button class="btn btn-secondary mt-4" name="submit" value="submit">Add</button>

                <a href="admin.php" class="btn btn-danger mt-4" value="submit" name="submit1">Back </a>

            </form>

        </div>

    </div>
</body>

</html>