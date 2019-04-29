<?php

require 'database.php';
session_start();
ob_start();

if (!(isset($_SESSION['admin_user_id']))) {
    header("location:index.php");
} else {


    $limit = 25;
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    } else {
        $page = 1;
    };
    $start_from = ($page - 1) * $limit;
    $sql = "SELECT * FROM `user_suggestion` Order by `date` DESC LIMIT $start_from, $limit";
    $rs_result = mysqli_query($conn, $sql);
}
?>

<html>
<head>
    <title>Suggestions</title>
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    <script src="Bootstrap/jquery/jquery.min.js"></script>
    <script src="Bootstrap/ajax/popper.min.js"></script>
    <script src="Bootstrap/js/bootstrap.min.js"></script>


</head>

<body class="container-fluid">
<br>
<div class="container">
    <div id="back" style="width:100%">
        <button type="button" class="btn btn-secondary" onclick="location.href='admin.php'";><--Back</button></div>
<center><h1>User Suggestions</h1></center>
<hr>
<table class="table table-striped table-bordered table-condensed">
    <tr>
        <th>User Name</th>
        <th>User Full Name</th>
        <th>Suggestion</th>
        <th>Date</th>
    </tr>
    <?php
    while ($res = mysqli_fetch_array($rs_result)) {

        $sql1 = "SELECT `user_name`, `full_name` FROM `user_table` WHERE `user_id`='" . $res["user_id"] . "'";
        $rs_result1 = mysqli_query($conn, $sql1);
        $res1 = mysqli_fetch_array($rs_result1);

        echo "<tr>";
        echo "<td>" . $res1['user_name'] . "</td>";
        echo "<td>" . $res1['full_name'] . "</td>";
        echo "<td>" . $res['suggestion'] . "</td>";
        echo "<td>" . $res['date'] . "</td>";
        echo "</tr>";
    }

    ?>

</table>
<?php
$sql = "SELECT COUNT(user_id) FROM `user_suggestion`";
$rs_result = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($rs_result);
$total_records = $row[0];
$total_pages = ceil($total_records / $limit);
$pagLink = "<ul class='pagination pagination-lg'>";
for ($i = 1; $i <= $total_pages; $i++) {
    $pagLink .= "<li class='page-item'><a href='user_suggestion.php?page=" . $i . "'>" . $i . "</a></li>";
};
echo $pagLink . "</ul>";
//close db connection here
?>
</body>
</html>

