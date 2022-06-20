<?php
include_once "config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heart Book</title>

    <!-- favicon link  -->
    <link rel="icon" type="image/x-icon" href="Images/heart-attack.png">

    <!-- Bootstrap css cdn link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">



    <!-- Custom Css Link  -->
    <link rel="stylesheet" href="style.css">
</head>

<body>


    <div class="vid mx-auto">
        <video height="" width="100%" muted autoplay loop>
            <source src="Images/heartVid.mp4" type="video/mp4">
        </video>
    </div>

    <div class="mainbody">
        <div class="header-section text-light p-4">
            <img src="Images/heart-attack.png" alt="logo" height="50" width="50">
            <h1 class="logo ms-3">Heart Book</h1>
        </div>
        <div class="section2">

            <div class="post text-light">
                <h4 class="mb-2 text-center text-light">What's going on your mind?</h3>

                    <form class="form1" action="post.php" method="POST">
                        <input type="text" name="name" placeholder="Type Your Name Here..." required>
                        <br>
                        <textarea name="message" id="message" cols="30" rows="4" placeholder="Type Your Message Here..."
                            required></textarea>


                        <br>
                        <input type="submit" name="post-button" class="btn btn-warning ms-3" value="Post">
                    </form>


            </div>

            <?php

            if($con){
                $query2 = "SELECT * FROM post";
                $result2 = mysqli_query($con,$query2);
                if(mysqli_num_rows($result2)){
                    while($row = mysqli_fetch_assoc($result2)){

                        ?>


                <div class="post text-light">

                <h5><?php echo $row['name'] ?></h5>
                <code><?php echo $row['time'] ?></code>
                <hr>
                <p><?php echo $row['message'] ?></p>
                <hr>
                <div class="reaction">
                    <h6 class="love">Love</h6>
                </div>

                <div class="comment-section">
                    <div class="comments">
                        <?php 
                        if($con){
                            $query4 = "SELECT * FROM comments WHERE post_id='{$row['post_id']}'";
                            $result4 = mysqli_query($con,$query4);
                            if(mysqli_num_rows($result4)>0){
                                while($row4 = mysqli_fetch_assoc($result4)){
                                    ?>

                        <div class="com">
                            <code><?php echo $row4['comment'] ?></code>
                            <code style="color: white;">Time</code>
                        </div>

                                    <?php
                                }
                            }
                        }
                        ?>

                        
                    </div>

                    <form class="form2" action="comments.php?id=<?php echo $row['post_id'] ?>" method="POST">
                        <input type="text" name="comment" placeholder="Leave your commnet here...">

                        <input type="submit" value="Post" name="comments" class="btn btn-outline-warning btn-sm">
                    </form>
                </div>
            </div>

            
            
            
            <?php
                    }
                }
            }

            ?>
           




        </div>
    </div>






    <script src="main.js"></script>


    <!-- Bootstrap JS Cdn link  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!-- fontawesome cdn link  -->


</body>

</html>