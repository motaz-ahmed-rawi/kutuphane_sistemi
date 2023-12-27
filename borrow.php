<?php
require_once('check_login.php');
require_once('check_admin.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kitap Ödünç Al</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Kitap Ödünç</h1>
        <form action="borrow_process.php" method="post">
            <div class="form-group">
                <label for="user_id">Kullanıcı Seç:</label>
                <select id="user_id" name="user_id" class="form-control">
                    <?php
                    require_once('db_connection.php');

                    // Kullanıcıları almak için sorgu
                    $sql = "SELECT userid, username FROM users";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["userid"] . "'>" . $row["username"] . "</option>";
                        }
                    } else {
                        echo "<option value=''>Kullanıcı bulunamadı</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="book_id">Kitap Seç:</label>
                <select id="book_id" name="book_id" class="form-control">
                    <?php


                    // Kitapları almak için sorgu
                    $sql = "SELECT bookid, title FROM books";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["bookid"] . "'>" . $row["title"] . "</option>";
                        }
                    } else {
                        echo "<option value=''>Kitap bulunamadı</option>";
                    }
            
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="borrow_date">Ödünç Alma Tarihi:</label>
                <input type="date" id="borrow_date" name="borrow_date" class="form-control">
            </div>
            <div class="form-group">
                <label for="return_date">İade Tarihi:</label>
                <input type="date" id="return_date" name="return_date" class="form-control">
            </div>
            <input type="submit" value="Ödünç Al" class="btn btn-primary">
        </form>
    </div>




        <!-- Bootstrap JS and jQuery (if needed) -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>