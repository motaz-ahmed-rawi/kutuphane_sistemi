<?php
require_once('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the statement to call the stored procedure
    $stmt = $conn->prepare("CALL AddNewUser(?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashed_password);

    // Execute the stored procedure
    if ($stmt->execute()) {
        echo "Başarıyla kayıt oldunuz!";
    } else {
        echo "Hata: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
