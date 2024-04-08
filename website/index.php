<?php
require_once 'login/includes/config_session.inc.php';
require_once 'login/includes/signup_view.inc.php';
require_once 'login/includes/login_view.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cars4U</title>
    <link href="style/style.css" type="text/css" rel="stylesheet">
</head>
<body>
<div class="nav_bar">
    <div id="dropDown" onclick="burgerIcon(this); dropContent()">


        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>


        <div id="dropDownContent">
            <div class="dropDownLink" onclick="redirectFAQ()">FAQ</div>
            <div class="dropDownLink" onclick="redirectContact()">Contact us</div>
            <div class="dropDownLink" onclick="redirectProducts()">Our products</div>
            <div class="dropDownLink" onclick="redirectAbout()">About</div>
        </div>
    </div>
    <a href="index.php" class="navContent">Home</a>
    <a href="post_manager/post_opinions.php" class="navContent">Make your own post!</a>
    <?php if (isset($_SESSION['user_id'])){
        echo '<p class="navContent">Logged in</p>';
    }else{
        echo '<a href="login/login_signup_form.php" class="navContent">Log in</a>';
    }?>
</div>

<main>

    <div class="mainForumBody">
        <div class="title">Most Recent Posts</div>
        <?php
        require 'post_manager/post_view.php';
        echo '<div class="postList">';
        justPost();
        echo '</div>';
        ?>

    </div>

</main>


<script src="script/script.js"></script>
</body>
</html>