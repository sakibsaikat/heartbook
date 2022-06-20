<?php

    include_once "config.php";
    $Post_id = $_GET['id'];
    $comment = $_POST['comment'];

    $query3 = "INSERT INTO comments(post_id,comment) VALUES('{$Post_id}','{$comment}')";

    if($con){
        $result3 = mysqli_query($con,$query3) or die("Server Denied");
    }

    header("Location: http://localhost/heart/index.php");

?>