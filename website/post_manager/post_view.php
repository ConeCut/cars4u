<?php
        require_once '../login/includes/dbh.inc.php';
require_once "../login/includes/config_session.inc.php";
require_once 'reply_manager.php';
require_once 'reply_view.php';
global $pdo;
function justPost()
{
    global $pdo;
    $query = "SELECT * FROM posts";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result) {
        foreach ($result as $post) {
            echo '<div class="post">
            <div class="postedBy">Posted by:' . " " . $post['username'] . ' at ' . $post["datetime"] . '</div>';
            echo '
            <img src="../img/' . $post['photo'] . '" alt="Car Photo" class="postImg">
            <p class="carInfo">' . $post['carinfo'] . '</p>
            <p class="postParagraph">' . $post['post'] . '</p>';
            if (isset($_SESSION["user_id"])) {
                echo '<div class="like_dislike_icons">';
                echo '<i class="fa fa-thumbs-up" aria-hidden="true" onclick="likesUp(this)" post-id="' . $post["id"] . '">Like</i>';
                echo '<i class="fa fa-thumbs-down" aria-hidden="true" onclick="dislikesUp(this)" post-id="' . $post["id"] . '">Dislike</i>';
                echo '</div><div class="like_dislike_counter">';
                echo '</div><div class="like_dislike_counter">';
                echo '<p class="like_counter">' . $post['likes'] . '<p>';
                echo '<p class="dislike_counter">' . $post['dislikes'] . '</p></div>';
                echo '<div class="reply_form">';
                echo '<form action="../post_manager/reply_manager.php" method="post">';
                echo '<input type="text" maxlength="250" name="replyText"' .  'id=' . '"' .  $post['id'] .'"' . 'placeholder="Comment Here, max 250 chars" required>';
                echo '<input type="hidden" name="postId" value="' . $post['id'] . '">';
                echo '<button type="submit" class="title">Submit</button>';
                echo '</form>';
                echo '</div>';
                echo '<script src="../../website/script/script.js"></script>';
            }
            else {
                echo 'You must be logged in to like and comment shitposts';
            }
            echo '<div class="replyShow">' . showReplies($post['id']) . '</div>';
            echo '</div>';
        }
    }
    return $result;
}

error_reporting(E_ALL);
ini_set('display_errors', '1');