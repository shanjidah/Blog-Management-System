<!DOCTYPE html>
<html lang="en">
<head>
    <title>Post reports</title>

    <link rel="stylesheet" href="Bootstrap_Files/css/bootstrap.min.css">
    <script src="Bootstrap_Files/jquery/jquery.min.js"></script>
    <script src="Bootstrap_Files/ajax/popper.min.js"></script>
    <script src="Bootstrap_Files/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="CSS/index1.css">

    <style>
        #back{

            position: absolute ;
            top: 0%;
            left: 40%;
        }

    </style>
</head>
<body>
<div class="container">

    <form class="form-inline" action="" method="post">
        <div><button type="submit" class="btn btn-info" value="Search" formaction="setSuggestion.php">Search</button></div>
    </form>
    <h1>Posts</h1>
    <div class="container" width="100%">
        <div id="back" style="width:100%">
            <button type="button" class="btn btn-secondary" id="back" onclick="location.href='admin.php';"><--Back</button></div>
    </div>

</div>




<?php
require 'database.php';
session_start();
ob_start();




$limit = 5;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
$start_from = ($page-1) * $limit;
$sql = "SELECT * FROM `user_blog` WHERE `blog_deleted` IS NULL AND `report_count`>9 ORDER BY `report_count` DESC LIMIT $start_from, $limit";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {


        $post_id = $row['post_id'];

        $sql2 = "SELECT * FROM `extras` WHERE `post_id` ='" . $post_id . "'";
        $result2 = mysqli_query($conn, $sql2);
		
		echo'<div style="width: 100%;" class="container" id="posts">';

        while ($row2 = mysqli_fetch_assoc($result2)) {
			
            echo '<img src="' . $row2['link'] . '" alt="Picture"  height="150" width="200" id="pic"/>';

        }
        echo '<br>';
        ?>


       

            <div class="well">
                <h3><a class="btn btn-default" href="readMore.php?id=<?php echo $row['post_id']; ?>" target="_blank"> Title: <?php echo $row['title']; ?> </a></h3>
                <small>Created on <?php echo $row['time_date']; ?> by <?php echo $row['user_name']; ?></small>

                <p><?php echo $row['post']; ?></p>
                <a href="deletePost.php?id=<?php echo $row['post_id']; ?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a>
                <br><br>
            </div>
        </div>
        <?php


    }
}

?>

<div class="container" id="page">
    <?php
    $sql = "SELECT COUNT(user_id) FROM `user_blog` WHERE  `report_count`>9";
    $rs_result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_row($rs_result);
    $total_records = $row[0];
    $total_pages = ceil($total_records / $limit);
    $pagLink = "<ul class='pagination'>";
    for ($i=1; $i<=$total_pages; $i++) {
        $pagLink .= "<li class='page-item'><a class='page-link' href='post_report.php?page=" .$i."'>".$i."</a></li>";
    };
    echo $pagLink . "</ul>";
    //close db connection here
    ?>
</div>
</body>
</html>



























