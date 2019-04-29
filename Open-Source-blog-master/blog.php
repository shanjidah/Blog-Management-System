<?php
require 'database.php';
session_start();
ob_start();

if (!(isset($_SESSION['user_id']))) {
    header("location:index.php");
}
else {

    ?>

    <html lang="en">
    <head>
        <title>Post Blog</title>





        <style>

        </style>
    </head>
    <body>



    <div id="blog"><h2>Blog:</h2></div>
    <br/>

    <form class="form-inline" action="blogPost.php" enctype="multipart/form-data" onsubmit="return validateForm()" method="post"
          name="blog_post_form">
        <div id="mypost" class="container">
            <div id="title_id" class="form-group">
                <label for="text">Title:</label>
                <textarea placeholder="Give a Title to your writing" class="form-control"  id="comment"
                         name="title"></textarea>
                <br>
                <br>
                <br>

                <div class="file-field">
                    <div id="pic_id" class="btn btn-primary btn-sm float-left">
                        <span>Choose files</span>
                        <input type="file" name="upload[]" multiple>
                    </div>
                    <div class="file-path-wrapper">
                        <input id="myfile" class="file-path validate" type="text" placeholder="Upload one or more files" disabled>
                    </div>
                </div>

            </div>


            <div>
                <div id="blog_id" class="form-group">
                    <label for="text">Blog:</label>
                    <textarea placeholder="Write your blog here" class="form-control" rows="3" cols="75" id="comment"
                              wrap="hard" name="blog"></textarea>
                </div>
            </div>


            <div id="buttons">
                <button type="button" class="btn btn-primary" onclick="location.href='userPosts.php';">Back</button>
                <button type="submit" class="btn btn-success">Submit</button>

            </div>
        </div>

    </form>


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

            var Picture = document.getElementById("pic_id").getElementsByTagName("input")[0].value;
            if(Picture== "") {
                alert("Upload at least one relevant picture according to your post");
                return false;
            }


            if(true)
                alert("Successfully posted");

        }
    </script>
    </body>
    </html>

    <?php
}

?>