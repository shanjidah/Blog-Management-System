<?php
session_start();
ob_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Open source blogging</title>
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">

</head>
<body>


<header>
    <?php include('nav.php');?>

<main>
<?php
require 'database.php';
ob_start();
$limit = 5;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
$start_from = ($page-1) * $limit;
$sql = "SELECT * FROM `user_blog` WHERE `blog_deleted` IS NULL ORDER BY `post_id` DESC LIMIT $start_from, $limit";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo '<div class="container" id="posts" style="">';
    echo '<div class="row">';
    while ($row = mysqli_fetch_assoc($result)) {
        $post_id = $row['post_id'];
        $sql2 = "SELECT * FROM `extras` WHERE `post_id` ='" . $post_id . "'";
        $result2 = mysqli_query($conn, $sql2);


        while ($row2 = mysqli_fetch_assoc($result2)) {
            echo '<div class="col-sm-4">';
            echo '<div class="card">';
            echo '<img class="card-img-top" src="' . $row2['link'] . '" alt="Card image cap">'; ?>
            <div class="card-body">
                <h4 class="card-title"> <?php echo $row['title']; ?></h4>
                <h4 class="card-title">Created by <?php echo $row['user_name']; ?></h4>
                <p class="card-text"><?php echo $row['post']; ?></p>
                <a  href="readMore.php?id=<?php echo $row['post_id']; ?>">Read more</a>
                <p class="card-text">
                    <small class="text-muted">Created on <?php echo $row['time_date']; ?></small>
                </p>
            </div>

            <?php
            echo '</div>';
            echo '</div>';

        }


    }

    echo '</div>';
    echo '</div>';
}
?>





</main>

<footer>

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

        ?>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php include('footer.php');?>