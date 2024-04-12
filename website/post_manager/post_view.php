<?php
require_once 'website/login/includes/dbh.inc.php';
require_once "website/login/includes/config_session.inc.php";
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
            <img src="website/img/' . $post['photo'] . '" alt="Car Photo" class="postImg">
            <p class="carInfo">' . $post['carinfo'] . '</p>
            <p class="postParagraph">' . $post['post'] . '</p>
            <div class="replyShow">' . showReplies() . '</div>';
            if (isset($_SESSION["user_id"])) {
                echo '<div class="like_dislike_icons">';
                echo '<i class="fa fa-thumbs-up" aria-hidden="true" onclick="likesUp(this)" post-id="' . $post["id"] . '">Like</i>';
                echo '<i class="fa fa-thumbs-down" aria-hidden="true" onclick="dislikesUp(this)" post-id="' . $post["id"] . '">Dislike</i>';
                echo '</div><div class="like_dislike_counter">';
                echo '</div><div class="like_dislike_counter">';
                echo '<p class="like_counter">' . $post['likes'] . '<p>';
                echo '<p class="dislike_counter">' . $post['dislikes'] . '</p>';
                echo '</div>';
                echo '<script src="../../website/script/script.js"></script>';
            } else {
                echo 'You must be logged in to like posts';
            }
            echo '</div>';
        }
    }
    return $result;
}

error_reporting(E_ALL);
ini_set('display_errors', '1');