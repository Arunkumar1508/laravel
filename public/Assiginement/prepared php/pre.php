<?php

$servername="localhost";
$username="root";
$password="";
$dbname="pratice";

$conn=new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
    die("connection failed:".$conn->connect_error);
}

// creating database

$sql2="CREATE DATABASE pratice";
if($conn->query($sql2)===TRUE){
 echo "Database created successfully";
}else{
     echo "Error creating database: " . $conn->error;
}


$conn->close();
?>