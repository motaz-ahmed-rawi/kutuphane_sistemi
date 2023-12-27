<?php
require_once('db_connection.php');
require('check_login.php');

function getBorrowedBooks() {
    global $conn;

    if (!isset($_SESSION['user_id'])) {
        return [];
    }

    $userid = $_SESSION['user_id'];

    $stmt = $conn->prepare("SELECT BorrowedBooks.*, Books.* 
                            FROM borrowedbooks 
                            JOIN Books ON BorrowedBooks.BookID = Books.BookID 
                            WHERE UserID = ?");
    $stmt->bind_param("i", $userid);
    $stmt->execute();

    $result = $stmt->get_result();
    $borrowedBooks = $result->fetch_all(MYSQLI_ASSOC);

    $stmt->close();

    return $borrowedBooks;
}

$borrowedBooks = getBorrowedBooks();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ödünç Alınmış Kitaplar</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Ek CSS kuralları */
        ul {
            padding-left: 0;
            list-style: none;
        }
        li {
            margin-bottom: 10px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <?php
        if (empty($borrowedBooks)) {
            echo "<p>Ödünç alınmış kitap bulunamadı.</p>";
        } else {
            echo "<h2>Ödünç Alınmış Kitaplar</h2>";
            echo "<ul>";
            foreach ($borrowedBooks as $book) {
                echo "<li>" . $book['Title'] . " - beklenen iade tarihi: " . $book['ReturnDate'] . "</li>";
                // Diğer kitap özelliklerini de ekrana yazabilirsiniz
            }
            echo "</ul>";
        }
        ?>
    </div>
    <!-- Bootstrap JS and jQuery (if needed) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
