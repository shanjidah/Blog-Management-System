<html>
<head>
    <title>Full Post</title>
    <link rel="stylesheet" href="Bootstrap_Files/css/bootstrap.min.css">
    <script src="Bootstrap_Files/jquery/jquery.min.js"></script>
    <script src="Bootstrap_Files/ajax/popper.min.js"></script>
    <script src="Bootstrap_Files/js/bootstrap.min.js"></script>
    <style>

        img{
           position:relative;
            left:5%;
            top:0%;
        }
    </style>
</head>

<body>
<?php
require 'database.php';
session_start();
ob_start();
$_SESSION['return_to_readMore']=$_SERVER['REQUEST_URI'];
if(isset($_GET['id'])){
    $id=mysqli_real_escape_string($conn, $_GET['id']);
}
else{
    $id='1';
}
if (!(isset($_SESSION['user_id']))) {
//header("location:index.php");

//    $id = mysqli_real_escape_string($conn, $_GET['id']);
//    if(((int)$id)==0 ){
//            $id='1';
//    }

    //create query
    $query = "SELECT * FROM `user_blog` WHERE `post_id` ='" . $id . "'";

    //Get result
    $result = mysqli_query($conn, $query);


    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {


        $post_id = $row['post_id'];
        $_SESSION['post_id'] = $post_id;

        $sql2 = "SELECT * FROM `extras` WHERE `post_id` ='" . $post_id . "'";
        $result2 = mysqli_query($conn, $sql2);

        while ($row2 = mysqli_fetch_assoc($result2)) {
            echo '<img src="' . $row2['link'] . '" alt="Picture"  height="150" width="200" id="pic" />';

        }
        echo '<br>';
        ?>


        <div class="container">

            <form class="well" method="post">
                <h3><?php echo $row['title']; ?> </h3>
                <small>Created on <?php echo $row['time_date']; ?> by <b><?php echo $row['user_name']; ?></b></small>
                <p><?php echo $row['post']; ?></p>
                <div>
                    <button type="submit" class="btn btn-success" value="Likes" formaction="like.php" disabled>
                        Likes(<?php echo $row['likes_count']; ?>)
                    </button>

                </div>
                <div>
                    <button type="submit" class="btn btn-danger" value="Reports" formaction="report.php" disabled>
                        Reports(<?php echo $row['report_count']; ?>)
                    </button>

                </div>

                <div>
                    <h3>Comments</h3>
                    <?php
                    $sql3 = "SELECT * FROM comment WHERE `post_id`= '" . $id . "' AND `comment_deleted` IS NULL";
                    $result3 = mysqli_query($conn, $sql3);
                    while ($row3 = mysqli_fetch_assoc($result3)) {
                        echo '<p>' . $row3['username'] . '</p>';
                        echo '<textarea class="form-control" rows="1" id=' . $row3['comment'] . ' name="comment" disabled >' . $row3['comment'] . ' </textarea>';

                    }
                    echo '<br>';



                    }
                }
            }
else {

//$id = mysqli_real_escape_string($conn, $_GET['id']);

//create query
$query = "SELECT * FROM `user_blog` WHERE `post_id` ='" . $id . "'";
//Get result
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        $post_id = $row['post_id'];
        $_SESSION['post_id']=$post_id;

        $sql2 = "SELECT * FROM `extras` WHERE `post_id` ='" . $post_id . "'";
        $result2 = mysqli_query($conn, $sql2);

        while ($row2 = mysqli_fetch_assoc($result2)) {

            echo '<img src="' . $row2['link'] . '" alt="Picture"  height="150" width="200" id="photo"  />';

        }
        echo '<br>';
        ?>

        <?php
        ///like comment checking

        $sqlLC="SELECT * FROM `likecommentstatus` WHERE `user_id`='" . $_SESSION['user_id'] . "' AND `post_id`='" . $_SESSION['post_id'] . "'";
        $resultLC = mysqli_query($conn, $sqlLC);

        $LCstatus = FALSE;

        if (mysqli_num_rows($resultLC) == 1) {
            $LCstatus = TRUE;
        }


        ?>
        <div class="container">

            <form class="well" method="post">

                <h3><?php echo $row['title']; ?> </h3>
                <small>Created on <?php echo $row['time_date']; ?> by <b><?php echo $row['user_name']; ?></b></small>
                <p><?php echo $row['post']; ?></p>

                <?php

                if($LCstatus) {
                    ?>

                    <div id="like">
                        <button type="submit" class="btn btn-success" value="Likes" formaction="like.php" disabled>
                            Liked(<?php echo $row['likes_count']; ?>)
                        </button>

                    </div>
                    <div id="report">
                        <button type="submit" class="btn btn-danger" value="Reports" formaction="report.php" disabled>
                            Reported(<?php echo $row['report_count']; ?>)
                        </button>
                    </div>

                    <?php
                }

                else {
                    ?>

                    <div id="like">
                        <button type="submit" class="btn btn-success" value="Likes" formaction="like.php">
                            Likes(<?php echo $row['likes_count']; ?>)
                        </button>

                    </div>
                    <div id="report">
                        <button type="submit" class="btn btn-danger" value="Reports" formaction="report.php">
                            Reports(<?php echo $row['report_count']; ?>)
                        </button>
                    </div>

                    <?php
                }
                ?>



                <div>
                    <h3>Comments</h3>
                    <?php
                    $sql3 = "SELECT * FROM comment WHERE `post_id`= '" . $id . "' AND `comment_deleted` IS NULL";
                    $result3 = mysqli_query($conn, $sql3);
                    while ($row3 = mysqli_fetch_assoc($result3)) {
                        echo '<p>' . $row3['username'] . '</p>';
                        echo '<textarea class="form-control" rows="1" id=' . $row3['comment'] . ' name="comment" disabled >' . $row3['comment'] . ' </textarea>';

                    }
                    echo '<br>';

                    ?>
                </div>


                    <div class="form-group" id="comment2">
                        <label for="comment">Comment:</label>
                        <textarea class="form-control" rows="1" id="comment" name="comment3"></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" formaction="comment.php" onclick="return validForm() ">Comment</button>

                    </div>
                <div id="edit">
                    <button type="submit" class="btn btn-danger" value="edit" formaction="postedit.php?id=<?php echo $_SESSION['post_id']?>" >
                        Edit Post
                    </button>
                </div>






            </form>
        </div>

        <?php


    }
}

?>

<script>
    function validForm() {

        let comment = document.getElementById("comment2").getElementsByTagName("textarea")[0].value;
        if (comment == "")  {
            alert("Please write something");
            return false;
        }

    }

</script>

</body>



<?php
}

?>

</html>