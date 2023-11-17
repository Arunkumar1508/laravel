<?php
$conn = mysqli_connect("localhost", "root", "", "crud");

$id=$_GET['delete'];

$sql="delete from student where id='$id'";
if (mysqli_query($conn, $sql)) {
    echo '<script>location.replace("index.php")</script>';
} else {
    echo '<script>alert("Error occured")</script>';
}
?>