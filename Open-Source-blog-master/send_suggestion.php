<?php
require 'database.php';
session_start();
ob_start();

if (!(isset($_SESSION['user_id']))) {
    header("location:index.php");
}
else {
    $comment = dataFilter($_POST["comment"]);
    $sql="INSERT INTO `user_suggestion` (`user_id`, `suggestion`, `date`) VALUES ('" . $_SESSION["user_id"] . "', '" . $comment . "', now())";
    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    header('Location:profile.php' );
}
function dataFilter($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}
?>