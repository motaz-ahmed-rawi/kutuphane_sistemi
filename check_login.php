<?php
session_start();

// Veritabanı bağlantısı gibi işlemler burada olabilir
// require_once('db_connection.php');

// Kullanıcı giriş yapmışsa dashboard'a yönlendir
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Kullanıcı giriş yapmamışsa giriş sayfasına yönlendir


?>