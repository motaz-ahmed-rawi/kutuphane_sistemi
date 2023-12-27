<?php
require_once('db_connection.php'); // Veritabanı bağlantı dosyasını dahil etmek gerekebilir



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = isset($_POST['username']) ? intval($_POST['username']) : 0;
    $make_admin = isset($_POST['make_admin']) ? 1 : 0;

    // Kullanıcıyı admin yapma veya admin yetkisini kaldırma işlemi
    $sql = "UPDATE users SET is_admin = ? WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $make_admin, $username);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Kullanıcı admin yapıldı veya admin yetkisi kaldırıldı.";
    } else {
        echo "Hata oluştu veya belirtilen kullanıcı bulunamadı.";
    }

    $stmt->close();
}

$conn->close();
?>
