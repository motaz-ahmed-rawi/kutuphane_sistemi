<?php

// Veritabanı bağlantısı gibi işlemler burada olabilir
// require_once('db_connection.php');

// Kullanıcı giriş yapmışsa dashboard'a yönlendir
if (!$_SESSION['is_admin']==1) {
    header("Location: login.php");
    exit;
}

// Kullanıcı giriş yapmamışsa giriş sayfasına yönlendir


?>