<?php
require 'database.php';
session_start();
ob_start();

if (!(isset($_SESSION['user_id']))) {
    header("location:index.php");
}
else {

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>UserPosts</title>

    <link rel="stylesheet" href="Bootstrap_Files/css/bootstrap.min.css">


    <style>
       #search1{
           position: absolute;
           top: 2%;
           left: 70%;
       }

    </style>
</head>
<body>
<div class="container">

    <form class="form-inline" action="">

        <div id="search1"><button type="submit" class="btn btn-info" value="Search" formaction="setSuggestion.php">Search</button></div>

        <h1>MyPosts</h1>
        <div class="form-group"  id="back">
            <button type="button" class="btn btn-secondary" onclick="location.href='profile.php';">Back</button></div>

</div>
    </form>

</div>




<?php



$limit = 5;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
$start_from = ($page-1) * $limit;
$sql = "SELECT * FROM `user_blog` WHERE `blog_deleted` IS NULL AND `user_id`='" . $_SESSION["user_id"] . "' ORDER BY `post_id` DESC LIMIT $start_from, $limit";
//$rs_result = mysqli_query ($conn,$sql);
//
//
//
//
//
//$sql = "SELECT * FROM `user_blog` WHERE `blog_deleted` IS NULL ORDER BY `post_id` DESC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {


        $post_id = $row['post_id'];

        $sql2 = "SELECT * FROM `extras` WHERE `post_id` ='" . $post_id . "'";
        $result2 = mysqli_query($conn, $sql2);

        while ($row2 = mysqli_fetch_assoc($result2)) {
            echo'<div style="width: 100%;" class="container" id="posts">';
            echo '<img src="' . $row2['link'] . '" alt="Picture"  height="150" width="200" id="pic"/>';

        }
        echo '<br>';
        ?>



            <div class="well">
                <h3><?php echo $row['title']; ?> </h3>
                <small>Created on <?php echo $row['time_date']; ?> by <?php echo $row['user_name']; ?></small>

                <p><?php echo $row['post']; ?></p>
                <div>
                    <a class="btn btn-default" target="_blank" href="readMore.php?id=<?php echo $row['post_id'];?>">Read More</a>
                    <a class="btn btn-default"  href="postedit.php?id=<?php echo $row['post_id']; ?>">Edit Post</a>
                    <a  class="btn btn-default" href="deletePost.php?id=<?php echo $row['post_id']; ?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a>
                </div>
            </div>


        </div>
        <hr>
        <?php


    }
}

?>

<div class="container" id="page">
<?php
$sql = "SELECT COUNT(user_id) FROM `user_blog` WHERE `user_id`='" . $_SESSION["user_id"] . "'";
$rs_result = mysqli_query($conn,$sql);
$row = mysqli_fetch_row($rs_result);
$total_records = $row[0];
$total_pages = ceil($total_records / $limit);
$pagLink = "<ul class='pagination'>";
for ($i=1; $i<=$total_pages; $i++) {
    $pagLink .= "<li class='page-item'><a class='page-link' href='userPosts.php?page=".$i."'>".$i."</a></li>";
};
echo $pagLink . "</ul>";
//close db connection here
?>
</div>
</body>
</html>

    <?php
}

?>



























