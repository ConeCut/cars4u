<?php
require_once '../../website/login/includes/config_session.inc.php';
require_once '../../website/login/includes/signup_view.inc.php';
require_once '../../website/login/includes/login_view.inc.php';
require_once '../../website/login/includes/dbh.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../style/style.css" type="text/css" rel="stylesheet">
    <title>Make A Post!</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body style="overflow: hidden">
<div class="center">
    <br>
<?php
if (!isset($_SESSION['user_id'])){
    echo '<p class="title">You must be logged in to see this page and post an article!</p>';
    echo '<button class = "homeButton" onclick="window.location.href = ';
    echo "'../../website/index.php'";
    echo '">Go back to home page</button>';
}else{
    echo '<br>';
    echo '<form action="post_manager.php" method="post" enctype="multipart/form-data">';
    echo '<h1 class="title">Posting as ' . $_SESSION['user_username'] . '</h1><br>';
    echo '<input name="Post" type="text" placeholder="Your post here..." required>';
    echo '<input name="carinfo" type="text" placeholder="Car Make/Model/Engine" required>';
    echo '<p class="title" style="margin-bottom: 2vh">Required Image</p>';
    echo '<input class="file_input" name="photo" id="photo" type="file" placeholder="Required Image" required data-multiple-caption="{count} files selected" multiple>';
    echo '<label for="photo" class="photoLabel"><span>Choose your picture</span></label>';
    //TODO: See todo in post manager
    echo '<input type="submit" name="submit" class="title" placeholder="Submit your Post">';
    echo '</form>';
}


?>
</div>
<footer class="footer" style="position: absolute; bottom: 0">
    <div class="container">
        <p class="footer-text">Follow us on social media:</p>
        <ul class="social-icons">
            <li><a href="#" class="icon"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="#" class="icon"><i class="fab fa-twitter"></i></a></li>
            <li><a href="#" class="icon"><i class="fab fa-instagram"></i></a></li>
            <li><a href="#" class="icon"><i class="fab fa-linkedin-in"></i></a></li>
        </ul>
        <p class="footer-text">© 2024 Cars4U. All rights reserved.</p>
    </div>
</footer>
<script src="../script/script.js"></script>
</body>
</html>