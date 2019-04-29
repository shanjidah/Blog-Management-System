<?php
require 'database.php';
session_start();
ob_start();


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">


</head>
<body>
<header>

<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item"><a class="nav-link" href="index.php">Most Recent</a></li>
            <li class="nav-item"><a class="nav-link" href="mostLiked.php">Most liked</a></li>
            <?php
            if ((isset($_SESSION['user_name'] ))) {
                echo '<li class="nav-item"><a class="nav-link" href="logout.php">Log out</a></li>';
           //     echo '<li class="nav-item"><a class="nav-link" href="#"><img src=/".$_SESSION["profile_pic"]."></a></li>';
                //$un = $_SESSION['user_name'];
            }

            else
                echo'<li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>';

            ?>


        </ul>
        <form class="form-inline my-2 my-lg-0">
        <input id="in" type="text" class="form-control pull-right" placeholder="Search"
                            onkeyup="showSuggestion(this.value)"/>
        </form>


    </div>
</nav>
    <br>
    <br>
      <!--  <div id="back">
            <button type="submit" class="btn btn-secondary" formaction="
            <?php
         /*   if ((isset($_SESSION['user_id']))) {

                echo "userPosts.php";
            }

            elseif ((isset($_SESSION['admin_user_id']))){
                echo "post_report.php";
            }
            else{
                echo "index.php";
            }
          */  ?>">Back</button>-->
   <pre>
        <p><span id="output" style="font-weight: bold"></span></p>
   </pre>


   <div class="container" id="posts">
   <div class="row" id="res">

   </div>
   </div>
</header>
<main>
<script>
    function showSuggestion(str) {
        document.getElementById('res').innerHTML = "";
        if (str.length > 0) {
            let xhr = new XMLHttpRequest();
            xhr.open("GET", "getSuggestion.php?q=" + str, true);
            xhr.send();
            xhr.onload = function () {
                if (this.status === 200) {
                    let ob = JSON.parse(this.responseText);
                    if (ob === "nai") {
                        document.getElementById('output').innerHTML = "No suggestions";
                    }
                    else {
                        document.getElementById('output').innerHTML = "";

                        for (let i = 0; i < ob.length; i++) {
                            document.getElementById('res').innerHTML +=
                               '<div class="col-sm-4">'+
                               '<div class="card">'+
                                '<div class="card-body">'+

                            //    '<img class="card-img-top" src="'+ob[i].link+'">' +
                                '<h3 id="title">' + ob[i].title + '</h3>' +
                                '<small>Created on ' +
                                '<div id="created">' + ob[i].time_date + '</div> ' + 'by ' +
                                '<div id="author">' + ob[i].user_name + '</div>' +
                                '</small>' +
                                '<div id="body">' + ob[i].post + '</div>' +
                                '<div id="SeeMore"><a class="btn btn-default" href="readMore.php?id=' + ob[i].post_id + '">' + "Read More" + '</a></div>' + '</div>' +'</div>'+'</div>';



                        }
                    }
                }
            }
        }
        else {
            document.getElementById('res').innerHTML = "";
        }
    }
</script>
</main>

<footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="Bootstrap/jquery/jquery.min.js"/>
    <script src="Bootstrap/js/bootstrap.min.js"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>


</footer>
</body>
</html>
