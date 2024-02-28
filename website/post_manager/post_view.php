<?php
require_once 'C:\Users\Cosmin\IdeaProjects\Cars4U\website\login\includes\config_session.inc.php';
require_once 'C:\Users\Cosmin\IdeaProjects\Cars4U\website\login\includes\signup_view.inc.php';
require_once 'C:\Users\Cosmin\IdeaProjects\Cars4U\website\login\includes\login_view.inc.php';
require_once 'C:\Users\Cosmin\IdeaProjects\Cars4U\website\login\includes\dbh.inc.php';
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
            </div>';
        }

        }
    return $result;
}
    error_reporting(E_ALL);
    ini_set('display_errors', '1');