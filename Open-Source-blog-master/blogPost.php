<?php
require 'database.php';
session_start();
ob_start();
date_default_timezone_set('UTC');

if (!(isset($_SESSION['user_id']))) {
    header("location:index.php");
} else {

    $title = dataFilter($_POST["title"]);

    $blog = dataFilter($_POST["blog"]);
    $report_count = $likes_count = 0;


    $NumberOFPictureFiles = count($_FILES['upload']['name']);
    $pictureNames = array();

    for ($i = 0; $i < $NumberOFPictureFiles; $i++) {

        $info = pathinfo($_FILES['upload']['name'][$i]);
        $ext = $info['extension'];
        $pic_id = rand();
        $newname = ((string)$pic_id) . "." . $ext;

        $target = 'post_contents/' . $newname;
        array_push($pictureNames, $target);

        move_uploaded_file($_FILES['upload']["tmp_name"][$i], $target);

    }

    $sql = "INSERT INTO `user_blog` (`user_id`, `user_name`, `post_id`, `title`, `post`,`likes_count`, `report_count`,   `report_comment`, `time_date`,`blog_deleted`)
VALUES ('" . $_SESSION["user_id"] . "', '" . $_SESSION["user_name"] . "', NULL , '" . $title . "', '" . $blog . "', '" . $likes_count . "', '" . $report_count . "', NULL , '" . date("Y-m-d H:i:s") . "', NULL)";


    if (mysqli_query($conn, $sql)) {

        $last_id = mysqli_insert_id($conn);
        echo $last_id;

        foreach ($pictureNames as $pictureName) {

            $sql2 = "INSERT INTO `extras` (`post_id`, `content_id`, `link`) VALUES ('" . $last_id . "', NULL, '" . $pictureName . "')";
            mysqli_query($conn, $sql2);

        }

    }
    else
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);

    header("location:blog.php");


}


function dataFilter($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

?>