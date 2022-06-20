<?php
include_once "config.php";

$name = $_POST['name'];
$message = $_POST['message'];

$query = "INSERT INTO post(name,time,message) VALUES ('{$name}',CURRENT_TIME(),'{$message}')";

if($con){
    $result = mysqli_query($con,$query) or die("Server Denied");
}

header("Location: http://localhost/heart/index.php");


?>