<?php
require_once '../login/includes/dbh.inc.php';
require_once '../login/includes/config_session.inc.php';
require_once '../login/includes/signup_view.inc.php';
require_once '../login/includes/login_view.inc.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reply = $_POST['replyText'];
    $postId = $_POST['postId'];
    $username = $_SESSION['user_username'];

    function postReply($postId, $reply, $username)
    {
        global $pdo;
        $query = "INSERT INTO post_replies (post_id, post_reply, replied_by) VALUES (:postId, :reply, :username)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':postId', $postId);
        $stmt->bindParam(':reply', $reply);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
    }
    postReply($postId, $reply, $username);

    header('Location: ../index/index.php');
}


