<?php
require_once('check_login.php');
require_once('check_admin.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kitap Ekle</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Kitap Ekle</h1>
        <form action="books_add_process.php" method="post">
            <div class="form-group">
                <label for="title">Başlık:</label>
                <input type="text" id="title" name="title" class="form-control">
            </div>
   
            <div class="form-group">
                <label for="published_year">Yayın Yılı:</label>
                <input type="date" id="published_year" name="published_year" class="form-control">
            </div>
            <div class="form-group">
                <label for="author_name">Yazar Adı:</label>
                <input type="text" id="author_name" name="author_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="genre_name">Tür Adı:</label>
                <input type="text" id="genre_name" name="genre_name" class="form-control">
            </div>
            <input type="submit" value="Ekle" class="btn btn-primary">
        </form>
    </div>
    <!-- Bootstrap JS and jQuery (if needed) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
