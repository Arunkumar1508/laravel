<?php

include('database.php');


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/bootstrap-5.3.0-dist/css/bootstrap.min.css">
</head>

<body>
   <div class="just2">
        <div class="container just p-3">
            <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
                <div class="container-fluid navbar-brand">
                    <a class="navbar-brand " href="" style=" padding: 10px;">Admin Panel</a>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="navbar-brand" href="admin_add_word.php" style=" padding: 10px;">Add Words</a>
                            </li>
                            <li class="nav-item">
                                <a class="navbar-brand " href="admin_anto_syno.php" style=" padding: 10px;">Add
                                    Synonyms/Antonyms</a>
                            </li>
                            <li class="nav-item">
                                <a class="navbar-brand" href="word.php" style=" padding: 10px;">Word table</a>
                            </li>
                            <li class="nav-item">
                                <a class="navbar-brand" href="admin_comment.php" style=" padding: 10px;">Comments
                                    table</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <a href="index.php"> <button class="btn btn-danger mt-4" name="submit" value="submit"
                        style="margin-left: 221px;">Logout</button></a>
            </nav>


        </div>
    </div>
</body>

</html>