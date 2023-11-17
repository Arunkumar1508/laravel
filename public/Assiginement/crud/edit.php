<?php
$conn = mysqli_connect("localhost", "root", "", "crud");

if (!$conn) {
    echo "connected error";

}

$edit = $_GET['edit'];

$run = "select * from student where id='$edit'";

$sql = mysqli_query($conn, $run);
while ($row = mysqli_fetch_array($sql)) {
    $uid = $row['id'];
    $name = $row['name'];
    $address = $row['Address'];
    $number = $row['number'];
}




?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    echo "connected error";
} else {

    if (isset($_POST['submit'])) {
        $edit = $_GET['edit'];

        $name = $_POST['name'];
        $address = $_POST['address'];
        $number = $_POST['number'];

        $sql = " update student set name='$name',address='$address',number='$number' where id='$edit'";

        if (mysqli_query($conn, $sql)) {
            echo '<script>location.replace("index.php")</script>';
        } else {
            echo '<script>alert("Error occured")</script>';
        }
    }

}
?>






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
                        <h1>Edit Student Data</h1>
                        <br><br>
                        <a href="index.php " class="btn btn-danger">Back</a>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value=" <?php echo $name; ?>"required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label"> address</label>
                                <input type="text" class="form-control" id="address" name="address" value="<?php echo $address; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="number" class="form-label">Number</label>
                                <input type="number" class="form-control" id="number" name="number" value="<?php echo $number; ?>" required>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary" value="edit" name="submit">Edit</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>

</html>