<?php
require_once '../login/includes/dbh.inc.php';
require_once '../login/includes/config_session.inc.php';
function showReplies($postId){
    global $pdo;
    $query = "SELECT * FROM post_replies WHERE post_id = :postId";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam('postId', $postId);
    $stmt->execute();
    $result2 = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result2) {
        foreach ($result2 as $reply) {
            echo '<div class="replyBox">';
            echo '<div class="reply">' . '<p class="postParagraph"> - Comment by ' . $reply['replied_by'] . '</p><p class="title">' . $reply['post_reply'] . '</div>';
            echo '</div>';
        }
    } else{
        echo '<p class="title">Post has no replies yet, be the first to comment!';
    }
}