
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item"><a class="nav-link" href="index.php">Most Recent</a></li>
            <li class="nav-item"><a class="nav-link" href="mostLiked.php">Most liked</a></li>


            <?php
            if ((isset($_SESSION['user_name'] ))) {
                echo '<li class="nav-item"><a class="nav-link" href="blog.php">Add new post</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="logout.php">Log out</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="profile.php">My Profile</a></li>';

                //$un = $_SESSION['user_name'];
            }

            else
            {
             echo'<li class="nav-item"><a class="nav-link" href="signup.php">Sign up</a></li>';
            echo'<li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>';
            }


            ?>



        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input id="in" type="text" class="form-control pull-right" placeholder="Search"
                   onclick="window.location.href='setSuggestion.php'"/>
        </form>



    </div>
</nav>

<br>
<br>
