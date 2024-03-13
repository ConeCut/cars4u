<?php
require_once 'C:\Users\Cosmin\IdeaProjects\Cars4U\website\login\includes\config_session.inc.php';
require_once 'C:\Users\Cosmin\IdeaProjects\Cars4U\website\login\includes\signup_view.inc.php';
require_once 'C:\Users\Cosmin\IdeaProjects\Cars4U\website\login\includes\login_view.inc.php';
require_once 'C:\Users\Cosmin\IdeaProjects\Cars4U\website\login\includes\dbh.inc.php';
?>
<?php
global $pdo;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_SESSION['user_username'];
    $post = $_POST['Post'];
    $carinfo = $_POST['carinfo'];
    $photo = $_POST['photo'];
    //TODO: Find a way to insert the picture from client side in website img folder to be accessible

    $likes = 0;
    function set_post(object $pdo, string $username, string $post, int $likes, string $carinfo, string $photo)
    {
        $likes = 0;
        $query = "INSERT INTO posts (username, post, likes, carinfo, photo) VALUES (:username, :post, :likes, :carinfo, :photo);";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":post", $post);
        $stmt->bindParam(":likes", $likes);
        $stmt->bindParam(":carinfo", $carinfo);
        $stmt->bindParam(":photo", $photo);
        $stmt->execute();
    }

    set_post($pdo, $username, $post, $likes, $carinfo, $photo);
}
header('Location: ../../website/index.php');