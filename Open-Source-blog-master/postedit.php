<?php
require 'database.php';
session_start();
ob_start();

if (!(isset($_SESSION['user_id']))) {
    header("location:index.php");
}
else {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $_SESSION['edit_post_id']=$id;

    $query = "SELECT * FROM `user_blog` WHERE `post_id` ='" . $id . "'";

    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    ?>

    <html lang="en">
    <head>
        <title>postedit</title>

        <link rel="stylesheet" href="Bootstrap_Files/css/bootstrap.min.css">

        <style>


        </style>
    </head>
    <body>
    <div class="container">
        <div id="blog"><h2>Post edit:</h2>
        <br/>
        <!--    <form class="form-inline" action="">-->
        <form class="form-inline" action="savepostedit.php" enctype="multipart/form-data" onsubmit="return validateForm()" formaction="userPosts.php" method="post"
              name="blog_post_form">

            <div id="title_id" class="form-group">
                <label for="text">Title:</label>
                <textarea placeholder="Give a Title to your writing" class="form-control" rows="3" id="comment" wrap="hard" name="title" ><?php echo $row['title']?></textarea>
            </div>


            <div id="blog_id" class="form-group">
                <label for="text">Blog:</label>
                <textarea placeholder="Write your blog here" class="form-control" rows="4" cols="60" id="comment" wrap="hard" name="blog"><?php echo $row['post']?></textarea>
            </div>

        </div>







    <div class="form-group" id="submit">
            <button type="submit" class="btn btn-success">Submit</button>

    </div>



        </form>



    </div>
    <script>
        function validateForm() {

            var postTitle = document.getElementById("title_id").getElementsByTagName("textarea")[0].value;
            if (postTitle == "") {
                alert("Enter Title");
                return false;
            }

            var blog_writings = document.getElementById("blog_id").getElementsByTagName("textarea")[0].value;

            if (blog_writings == "") {
                alert("Enter writings");
                return false;
            }
         //   var back = document.getElementById("back").getElementsByTagName("button")[0].value;

            if(true )
                alert("Successfully posted");



        }



    </script>
    </body>
    </html>

    <?php
}

?>

