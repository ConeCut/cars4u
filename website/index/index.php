<?php
require_once '../login/includes/config_session.inc.php';
require_once '../login/includes/signup_view.inc.php';
require_once '../login/includes/login_view.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IMI ShitpostStatus</title>
    <link href="../style/style.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<div class="nav_bar">
    <div id="dropDown" onclick="burgerIcon(this); dropContent()">


         <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>


        <div id="dropDownContent">
            <div class="dropDownLink" onclick="redirectFAQ()">FAQ</div>
            <div class="dropDownLink" onclick="redirectContact()">Rules</div>
            <div class="dropDownLink" onclick="redirectProducts()">Our products</div>
            <div class="dropDownLink" onclick="redirectAbout()">About</div>
        </div>
    </div>
    <a href="index.php" class="navContent">Home</a>
    <a href="../post_manager/post_opinions.php" class="navContent">Make your own shitpost!</a>
    <?php if (isset($_SESSION['user_id'])){
        echo '<p class="LogINnavContent">Logged in as ' . $_SESSION['user_username'];
        echo '<form action="../login/includes/logout.inc.php"><button type="submit" class="logout_button">Log Out</button></form>';
    }else{
        echo '<a href="../login/login_signup_form.php" class="navContent">Log in</a>';
    }?>
</div>

<main>

    <div class="mainForumBody">
        <div class="title">Most Recent ShitPosts</div>
        <?php
        require '../post_manager/post_view.php';
        echo '<div class="postList">';
        justPost();
        echo '</div>';
        ?>

    </div>

</main>

<footer class="footer">
    <div class="container">
        <p class="footer-text">Follow us on social media:</p>
        <ul class="social-icons">
            <li><a href="#" class="icon"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="#" class="icon"><i class="fab fa-twitter"></i></a></li>
            <li><a href="#" class="icon"><i class="fab fa-instagram"></i></a></li>
            <li><a href="#" class="icon"><i class="fab fa-linkedin-in"></i></a></li>
            <!-- Add more social media icons as needed -->
        </ul>
        <p class="footer-text">© 2024 IMI SHITPOSTSTATUS. All rights reserved.</p>
    </div>
</footer>


<script src="../script/script.js"></script>
</body>
</html>