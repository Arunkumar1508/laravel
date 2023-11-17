<?php
include('database.php');
if (isset($_POST['submit'])) {
   $number=$_POST['number'];
   $search=$_POST['search'];
   $option=$_POST['option'];


    $sql = "SELECT $option FROM dictionary_word WHERE word_id='$number'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $array_sys = json_decode($row[$option], true);
            // $id = $_SESSION['word_id'];

        }
        array_push($array_sys, $search);
    $sys_array = json_encode($array_sys, true);
    $sql1 = "UPDATE dictionary_word SET $option ='$sys_array' WHERE  word_id='$number' ";
    if ($conn->query($sql1) == true) {
        $mess = 'insert successfully';
    }

    }
    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin_anto_syno</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/bootstrap-5.3.0-dist/css/bootstrap.min.css">
</head>

<body class="dist">

    <div class="container  mt-2   flex-column p-4">
        <h2>Add Synonyms/Antonyms here</h2> <br>
        <form action="" method="post" >
            <input type="number" name="number" placeholder="Enter Word ID">
            <br><br>
            <input type="search" name="search" placeholder="Enter  The Word ">
            <br><br>
            <select name="option" class="Options">
                <option value="Options">Options</option>
                <option value="word_sys">Synonyms</option>
                <option value="word_anto">Antonyms</option>
            </select>
            <br>
            <div>


                <!-- <input type="file" name="files"> -->
                <br>
                <button class="btn btn-secondary mt-4" name="submit">Add</button>
        </form>
    </div>

    </div>
</body>

</html>