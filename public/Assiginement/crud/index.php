<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="./css/bootstrap-5.3.0-dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="column">
                <div class="card">
                    <div class="card-header">
                        <h1>Student crud</h1>
                        <br><br>
                        <a href="add.php " class="btn btn-success">Add data</a>
                    </div>
                    <table class="table mt-2">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Number</th>
                                <th scope="col">Button</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $conn = mysqli_connect("localhost", "root", "", "crud");

                            $sql = "select * from student";
                            $run = mysqli_query($conn, $sql);
                            $id = 1;

                            while ($row = mysqli_fetch_array($run)) {
                                $uid = $row['id'];
                                $name = $row['name'];
                                $address = $row['Address'];
                                $number = $row['number'];

                                ?>
                                <tr>
                                    <td>
                                        <?php echo $id ?>
                                    </td>
                                    <td>
                                        <?php echo $name; ?>
                                    </td>
                                    <td>
                                        <?php echo $address; ?>
                                    </td>
                                    <td>
                                        <?php echo $number; ?>
                                    </td>
                                    <td> <a href='edit.php?edit=<?php echo  $uid; ?>' class="btn btn-primary">Edit</a>
                                        <a href='delete.php?delete=<?php echo  $uid; ?>' class="btn btn-info">Delete</a>
                                    </td>
                                </tr>
                                <?php $id++;
                            } ?>





                        </tbody>
                    </table>






                </div>
            </div>
        </div>
    </div>

</body>

</html>