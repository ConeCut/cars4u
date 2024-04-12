<?php
require_once '../login/includes/dbh.inc.php';
require_once '../login/includes/config_session.inc.php';
global $pdo;


$userId = $_SESSION['user_id'];

$_POST = json_decode(file_get_contents("php://input"), true);

$postId = $_POST['postId'];
$type = $_POST["type"];

if ($type === "like")
    likesUp($postId);
else if ($type === "dislike")
    dislikesUP($postId);

function userLikedPost($userId, $postId) {
    global $pdo;
    $userId = $_SESSION['user_id'];
    $query = "SELECT COUNT(*) FROM user_likes WHERE user_id = :userId AND post_id = :postId";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->bindParam(':postId', $postId, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchColumn() > 0;
}
function userdisLikedPost($userId, $postId) {
    global $pdo;
    $userId = $_SESSION['user_id'];
    $query = "SELECT COUNT(*) FROM user_dislikes WHERE user_id = :userId AND post_id = :postId";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->bindParam(':postId', $postId, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchColumn() > 0;
}

function likesUp($postId)
{
    global $pdo;
    $userId = $_SESSION['user_id'];
    if (!userLikedPost($userId, $postId)) {
        $query = "INSERT INTO user_likes (user_id, post_id) VALUES (:userId, :postId)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':postId', $postId, PDO::PARAM_INT);
        $stmt->execute();
        // Update post likes count
        $query = "UPDATE posts SET likes = likes + 1 WHERE id = :postId";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':postId', $postId, PDO::PARAM_INT);
        $stmt->execute();
    } else {
        echo "You've already liked this post.";
    }
}

function dislikesUP($postId)
{
    global $pdo;
    $userId = $_SESSION['user_id'];
    if (!userdisLikedPost($userId, $postId)) {
        $query = "INSERT INTO user_dislikes (user_id, post_id) VALUES (:userId, :postId)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':postId', $postId, PDO::PARAM_INT);
        $stmt->execute();
        // Update post likes count
        $query = "UPDATE posts SET dislikes = dislikes + 1 WHERE id = :postId";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':postId', $postId, PDO::PARAM_INT);
        $stmt->execute();
    } else {
        echo "You've already liked this post.";
    }
}