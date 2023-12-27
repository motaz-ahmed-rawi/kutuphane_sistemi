<?php
require_once('db_connection.php');




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $book_id = $_POST['book_id'];
    $borrow_date = $_POST['borrow_date'];
    $return_date = $_POST['return_date'];

    $sql = "INSERT INTO borrowedbooks (UserID, BookID, BorrowDate, ReturnDate) VALUES ('$user_id', '$book_id', '$borrow_date', '$return_date')";

    if ($conn->query($sql) === TRUE) {
        header("Location: dashboard.php");
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
