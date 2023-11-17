<?php 
session_start();
$servername = "192.168.7.254";
$username = "arun_juntrdev_usr";
$password = "Rf4w41UagZb82Ibw";
$dbname = "arun_juntrdev_db";

$conn = mysqli_connect('192.168.7.254', 'arun_juntrdev_usr', 'Rf4w41UagZb82Ibw', 'arun_juntrdev_db','42209');

if (!$conn) {
    echo "connected error". $conn->connect_error;
}
?>