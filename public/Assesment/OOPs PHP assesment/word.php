<?php
include('database.php');

$sql_word = "SELECT * FROM dictionary_word";
$result = $conn->query($sql_word);
// echo"$result";
if ($result->num_rows > 0) {

}

if (isset($_POST["logout"])) {
    header('location:index.php');
    session_destroy();

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Word table</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/bootstrap-5.3.0-dist/css/bootstrap.min.css">

</head>

<body class="kan">
    <div class="container mt-4">
        <h2 class="woo">WORDS TABLE</h2>
        <form action="" method="post">
                    <input type="submit" class='btn btn-danger mt-4' value="Logout" name="logout">
                </form>

    </div>
    <div class="container mt-4">
        <table class="table ">
            <thead>
                <tr class="table table-dark">
                    <th scope="col">ID</th>
                    <th scope="col">IMAGE</th>
                    <th scope="col">WORD</th>
                    <th scope="col">USER</th>
                    <th scope="col" class="text-center">STATUS</th>
                    <th scope="col" class="text-center">ACTION</th>

                </tr>
            </thead>
            <tbody>
                <?php

                while ($row = $result->fetch_assoc()) {
                    $wordid = $row['word_id'];
                    $name = $row['name'];
                    $wordimage = $row['word_image'];
                    $wordname = $row['word_name'];
                    $wordanto = $row['word_anto'];
                    $wordsys = $row['word_sys'];
                    $wordcomment = $row['word_comment'];
                    $wordstatus = $row['word_status'];



                    ?>
                    <tr>

                        <th scope="row">
                            <?php echo $wordid ?>
                        </th>
                        <td>
                            <?php echo "<img src='./img/$wordimage' alt='' srcset='' width='150px' height='180px'>" ?>
                        </td>
                        <td>
                            <?php echo $wordname ?>
                        </td>
                        <td>
                            <?php echo $name ?>
                        </td>
                        <td class="text-center">
                            <?php echo $wordstatus ?>
                        </td>
                        <td class="text-center">

                            <form action="word.php" method="post">
                                <?php 
                                if($wordstatus==0){
                                    echo'
                                    
                                    <input type="hidden" name="approve" value='.$wordid.' >
                                    <input type="submit" name="approvebtn" value="Approve" class="btn btn-primary">
                                    
                                    
                                    
                                    ';
                                }else{
                                    echo '
                                    
                                    <input type="hidden" name="DisApprove" value='.$wordid.'>
                                    <input type="submit" name="DisApprovebtn" value="DisApprove" 
                                        class="btn btn-warning">
                                    
                                    
                                    
                                    ';
                                }
                                ?>

                               

                              

                                <input type="hidden" name="Delete" value="<?php echo $wordid ?>">
                                <input type="submit" name="Deletebtn" value="Delete" class="btn btn-danger">


                            </form>
                        
                        </td>



                    </tr>


                    <?php

                }
                ?>


                <?php
                // approval
                if (isset($_POST['approvebtn'])) {
                    $approval = $_POST['approve'];


                    $sqlapp = "UPDATE dictionary_word SET word_status=1 where word_id='$approval'";

                    if ($conn->query($sqlapp) == true) {
                        // header('location:word.php');

                    } else {
                        echo "error" . mysqli_error($conn);
                    }

                }

                // disapproval
                
                if (isset($_POST['DisApprovebtn'])) {
                    $disapproval = $_POST['DisApprove'];


                    $sqlapp = "UPDATE dictionary_word SET word_status='0' where word_id='$disapproval'";

                    if ($conn->query($sqlapp) == true) {
                        // header('location:word.php');
                    } else {
                        echo "error" . mysqli_error($conn);
                    }

                }

                // delete
                if (isset($_POST['Deletebtn'])) {
                    $delete = $_POST['Delete'];

                    $sqlo="select word_image from dictionary_word where word_id='$delete'";
                    $result7=$conn->query($sqlo);
                    if($result7->num_rows>0){
                        $row=$result7->fetch_assoc();
                        $wordimage2=$row["word_image"];
                        $file="./img/$wordimage2";
                        unlink($file);
                    }
                       
          
                   

                    



                        
                    


                    $sqlapp = "DELETE FROM dictionary_word WHERE word_id='$delete'";

                    if ($conn->query($sqlapp) == true) {
                        // header('location:word.php');
                    } else {
                        echo "error" . mysqli_error($conn);
                    }

                }





                ?>
            </tbody>
        </table>
    </div>

</body>

</html>