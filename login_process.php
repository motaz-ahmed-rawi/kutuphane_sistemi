<?php
session_start();
require_once('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM Users WHERE Email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['Password'])) {
            $_SESSION['user_id'] = $row['UserID'];
            $_SESSION['is_admin'] = $row['is_admin'];
            $_SESSION['user_name']= $row['UserName'];
            header('Location: index.php'); // Ana sayfaya yönlendir
        } else {
            echo "Hatalı şifre!";
        }
    } else {
        echo "Kullanıcı bulunamadı!";
    }
    $conn->close();
}
?>
