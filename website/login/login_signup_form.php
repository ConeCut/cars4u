<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/signup_view.inc.php';
require_once 'includes/login_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style/style.css" type="text/css">
    <title>Welcome!</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<h3>

    <?php

    output_username();

    ?>

</h3>
<?php

if (!isset($_SESSION["user_id"])){ ?>

<div class="login_form_flex">
    <h3 class="title">Login</h3>
    <form action="includes/login.inc.php" method="post">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="pwd" placeholder="Password">
        <button class="login_button">Login</button>
    </form>
</div>
<?php } ?>


<?php
check_login_errors();
?>
<div class="login_form_flex">
<form action="includes/signup.inc.php" method="post">
    <?php
    signup_inputs()
    ?>
    <button class="login_button">Signup</button>
</form>
</div>
<?php
check_signup_errors();
?>
<?php

if (isset($_SESSION["user_id"])){ ?>

    <h3>Logout</h3>
    <form action="includes/logout.inc.php" method="post" class="logoutForm">
        <button>Logout</button>
    </form>

<?php } else{
    echo '<br>';
    echo '<h3 class="title" style="text-align: center">Or just go back to main page without posting permission</h3>';
} ?>
<div class="center">
<button onclick="redirectHome()" class="login_button" style="margin: 2vh">Home Page</button>
</div>
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
        <p class="footer-text">© 2024 Cars4U. All rights reserved.</p>
    </div>
</footer>


<script src="../../website/script/script.js"></script>
</body>
</html>