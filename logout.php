<?php
session_start();

require_once('check_login.php');

// Oturumu sonlandır
session_unset();
session_destroy();

// Kullanıcıyı giriş sayfasına yönlendir
header("Location: login.php");
exit;
?>
