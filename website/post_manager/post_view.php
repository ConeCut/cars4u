<?php
require_once 'C:\Users\Cosmin\IdeaProjects\Cars4U\website\login\includes\config_session.inc.php';
require_once 'C:\Users\Cosmin\IdeaProjects\Cars4U\website\login\includes\dbh.inc.php';
require_once 'reply_manager.php';
require_once 'reply_view.php';
?>

<?php
global $pdo;
function justPost(){
    global $pdo;
    $query = "SELECT * FROM posts";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result) {
        foreach ($result as $post) {
            echo '<div class="post">
            <div class="postedBy">Posted by:' . " " .$post['username'] . ' at ' . $post["datetime"] . '</div>';
            echo '
            <img src="img/' . $post['photo'] . '" alt="Car Photo" class="postImg">
            <p class="carInfo">' . $post['carinfo'] . '</p>
            <p class="postParagraph">' . $post['post'] . '</p>
            <div class="replyShow">' . showReplies() . '</div>';
            if (isset($_SESSION["user_id"])){
                echo '<button class="like" onclick="likesUp()"></button>';
                echo '<p class="like_text">Like</p>';
            } else{
                echo 'You must be logged in to like posts';
            }
            echo '</div>';
            echo '<script src="../../website/script/script.js"></script>';
        }
        }
    return $result;
}
    error_reporting(E_ALL);
    ini_set('display_errors', '1');