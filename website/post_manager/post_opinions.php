<?php
require_once 'C:\Users\Cosmin\IdeaProjects\Cars4U\website\login\includes\config_session.inc.php';
require_once 'C:\Users\Cosmin\IdeaProjects\Cars4U\website\login\includes\signup_view.inc.php';
require_once 'C:\Users\Cosmin\IdeaProjects\Cars4U\website\login\includes\login_view.inc.php';
require_once 'C:\Users\Cosmin\IdeaProjects\Cars4U\website\login\includes\dbh.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../style/style.css" type="text/css" rel="stylesheet">
    <title>Make A Post!</title>
</head>
<body>
<?php
if (!isset($_SESSION['user_id'])){
    echo 'You must be logged in to see this page and post an article!';
    echo '<button class = "homeButton" onclick="window.location.href = ';
    echo "'../../website/index.php'";
    echo '">Go back to home page</button>';
}else{
    echo '<form action="post_manager.php" method="post">';
    echo 'Posting as ' . $_SESSION['user_username'] . '<br>';
    echo '<input name="Post" type="text" placeholder="Your post here..." required>';
    echo '<input name="carinfo" type="text" placeholder="Car Make/Model/Engine" required>';
    echo '<p>Required Image</p>';
    echo '<input name="photo" type="file" placeholder="Required Image" required>';
    //TODO: See todo in post manager
    echo '<button type="submit">Submit your Post</button>';
    echo '</form>';
}
?>
</body>
</html>