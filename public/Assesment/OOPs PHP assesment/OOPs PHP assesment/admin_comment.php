<?php
include('database.php');

$sql_word = "SELECT * FROM dictionary_comments";
$result = $conn->query($sql_word);
// echo"$result";
if ($result->num_rows > 0) {

}
// include('database.php');
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
    <title>Comment table</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/bootstrap-5.3.0-dist/css/bootstrap.min.css">

</head>

<body class="kan">
    <div class="container mt-4 p-4  ">
        <h2 class="woo">COMMENTS TABLE</h2>
        <form action="" method="post " >
            <input type="submit" class='btn btn-danger mt-4' value="Logout" name="logout">
        </form>

    </div>
    <div class="container mt-4">
        <table class="table ">
            <thead>
                <tr class="table table-dark">
                    <th scope="col">ID</th>
                    <th scope="col">WORD</th>
                    <th scope="col">USER</th>
                    <th scope="col">COMMENTS</th>
                    <th scope="col" class="text-center">STATUS</th>
                    <th scope="col" class="text-center">ACTION</th>

                </tr>
            </thead>
            <tbody>
                <?php

                while ($row = $result->fetch_assoc()) {
                    $comwordid = $row['com_word_id'];
                    $name = $row['name'];
                    // $wordimage = $row['word_image'];
                    $comwordname = $row['com_word_name'];
                    // $wordanto = $row['word_anto'];
                    // $wordsys = $row['word_sys'];
                    $comment = $row['comment'];
                    $status1 = $row['status'];



                    ?>
                    <tr>

                        <th scope="row">
                            <?php echo $comwordid ?>
                        </th>

                        <td>
                            <?php echo $comwordname ?>
                        </td>
                        <td>
                            <?php echo $name ?>
                        </td>
                        <td>
                            <?php echo $comment ?>
                        </td>


                        <td class="text-center">
                            <?php echo $status1 ?>
                        </td>
                        <td class="text-center">

                            <form action="admin_comment.php" method="post">
                                
                            <?php 
                                if($status1==0){
                                    echo'
                                

                                    <input type="hidden" name="approve" value='.$comwordid.'>
                                <input type="submit" name="approvebtn" value="Approve" class="btn btn-primary">
                                    
                                    
                                    ';
                                }else{
                                    echo '
                                    
                                    <input type="hidden" name="DisApprove" value='.$comwordid.'>
                                    <input type="submit" name="DisApprovebtn" value="DisApprove" 
                                        class="btn btn-warning">
                                    
                                    
                                    
                                    ';
                                }
                                ?>
                            
                            

                                <!-- <input type="hidden" name="approve" value="<?php echo $comwordid ?>">
                                <input type="submit" name="approvebtn" value="Approve" class="btn btn-primary">

                                <input type="hidden" name="DisApprove" value="<?php echo $comwordid ?>">
                                <input type="submit" name="DisApprovebtn" value="DisApprove" name="DisApprove"
                                    class="btn btn-warning"> -->

                                <input type="hidden" name="Delete" value="<?php echo $comwordid ?>">
                                <input type="submit" name="Deletebtn" value="Delete" name="Delete" class="btn btn-danger">


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


                    $sqlapp = "UPDATE dictionary_comments SET status=1 where com_word_id='$approval'";

                    if ($conn->query($sqlapp) == true) {

                    } else {
                        echo "error" . mysqli_error($conn);
                    }

                }

                // disapproval
                
                if (isset($_POST['DisApprovebtn'])) {
                    $disapproval = $_POST['DisApprove'];


                    $sqlapp = "UPDATE dictionary_comments SET status=0 where com_word_id='$disapproval'";

                    if ($conn->query($sqlapp) == true) {
                        // header('location:admin_comment.php');
                    } else {
                        echo "error" . mysqli_error($conn);
                    }

                }

                // delete
                if (isset($_POST['Deletebtn'])) {
                    $delete = $_POST['Delete'];


                    $sqlapp = "DELETE FROM dictionary_comments WHERE com_word_id='$delete'";

                    if ($conn->query($sqlapp) == true) {
                        // header('location:word.php');
                        // header('location:admin_comment.php');
                
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