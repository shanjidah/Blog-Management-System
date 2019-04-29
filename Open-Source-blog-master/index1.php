<!DOCTYPE html>
<html lang="en">
<head>
    <title>BLOG</title>

    <link rel="stylesheet" href="Bootstrap_Files/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/index1.css">

    <script src="Bootstrap_Files/jquery/jquery.min.js"></script>
    <script src="Bootstrap_Files/ajax/popper.min.js"></script>
    <script src="Bootstrap_Files/js/bootstrap.min.js"></script>






</head>
<body>
<div class="container" style="width: 100%;">

    <form class="form-inline" action="">


        <div style="width: 100%;"><img src="Backgrounds/logo.jpg" alt"Copyright" id="logo"></div>

        <div class="btn-group" width="100%" id="recent">

            <div style="width: 100%;"><button type="submit" class="btn btn-primary" value="Most_Recent" formaction="index.php">Most Recent</button></div>



<!--            <div style="width: 100%;"><button type="submit" class="btn btn-primary" value="About_us" formaction="">About Us</button></div>-->
        </div>


        <div class="btn-group" width="100%" id="liked">



            <div style="width: 100%;"><button type="submit" class="btn btn-primary" value="Most_Liked" formaction="mostLiked.php">Most Liked</button></div>

            <!--            <div style="width: 100%;"><button type="submit" class="btn btn-primary" value="About_us" formaction="">About Us</button></div>-->
        </div>

        <div class="btn-group" width="100%" id="buttongroup2">
        <div style="width: 100%;"><button type="submit" class="btn btn-secondary" value="register" formaction="signup.php">Register</button></div>
        <div style="width: 100%;"><button type="submit" class="btn btn-success" value="Login" formaction="login.php">Login</button></div>
        </div>

        <div class="btn-group" width="100%" id="search">
        <div style="width: 100%; " ><button type="submit" class="btn btn-info" value="Search" formaction="setSuggestion.php">Search</button></div>
        </div>

        <div style="width: 100%;" class="container" id="rec">
            <h1>Recent Posts:</h1>
        </div>

    </form>

</div>




<?php
require 'database.php';
ob_start();




$limit = 5;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
$start_from = ($page-1) * $limit;
$sql = "SELECT * FROM `user_blog` WHERE `blog_deleted` IS NULL ORDER BY `post_id` DESC LIMIT $start_from, $limit";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {


        $post_id = $row['post_id'];

        $sql2 = "SELECT * FROM `extras` WHERE `post_id` ='" . $post_id . "'";
        $result2 = mysqli_query($conn, $sql2);

        while ($row2 = mysqli_fetch_assoc($result2)) {
            echo '<img src="' . $row2['link'] . '" alt="Picture"  height="150" width="200" id="pic" />';

        }
        echo '<br>';
        ?>


        <div style="width: 100%;" class="container" id="posts">

            <div class="well">
                <h3><?php echo $row['title']; ?> </h3>
                <small>Created on <?php echo $row['time_date']; ?> by <?php echo $row['user_name']; ?></small>

                <p><?php echo $row['post']; ?></p>
                <a class="btn btn-default" href="readMore.php?id=<?php echo $row['post_id']; ?>">Read More</a>
            </div>
        </div>
        <?php


    }
}

?>

<div class="container" id="page">
<?php
$sql = "SELECT COUNT(user_id) FROM `user_blog`";
$rs_result = mysqli_query($conn,$sql);
$row = mysqli_fetch_row($rs_result);
$total_records = $row[0];
$total_pages = ceil($total_records / $limit);
$pagLink = "<ul class='pagination'>";
for ($i=1; $i<=$total_pages; $i++) {
    $pagLink .= "<li class='page-item'><a class='page-link' href='index.php?page=".$i."'>".$i."</a></li>";
};
echo $pagLink . "</ul>";
//close db connection here
?>
</div>

<footer>

    <div style="width: 100%;"><img src="Backgrounds/copyright.jpg" alt"Copyright" id="copy"></div>
</footer>>
</body>
</html>



























