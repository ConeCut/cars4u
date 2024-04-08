<?php
require_once '../../website/login/includes/config_session.inc.php';
require_once '../../website/login/includes/signup_view.inc.php';
require_once '../../website/login/includes/login_view.inc.php';
require_once '../../website/login/includes/dbh.inc.php';

global $pdo;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $targetDir = "../../website/img/";
    $targetFile = $targetDir . basename($_FILES["photo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["photo"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

// Check file size
    if ($_FILES["photo"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

// Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {
            echo "The file " . basename($_FILES["photo"]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $username = $_SESSION['user_username'];
    $post = $_POST['Post'];
    $carinfo = $_POST['carinfo'];
    $photo = $_FILES['photo']['name'];
    $likes = 0;
    function set_post(object $pdo, string $username, string $post, int $likes, string $carinfo, string $photo)
    {
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