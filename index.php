<?php
// Kullanıcı giriş yapmışsa dashboard'a yönlendir
if (!isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit;
}
?>