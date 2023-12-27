<?php
require_once('check_login.php');

// Kullanıcı giriş yapmışsa, dashboard içeriğini göster
// Veritabanı bağlantısı, veri alışverişi veya diğer işlevler burada olabilir

// Örneğin:
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
$is_admin = $_SESSION['is_admin'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        .btn-container {
            margin-top: 20px;
        }

        .btn-container a {
            display: block;
            margin-bottom: 10px;
        }
    </style>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>


    <?php
    // Veritabanı bağlantısı
    require_once('db_connection.php');


    // Kullanıcı sayısını al
    $userCountResult = $conn->query("SELECT GetUserCount() AS userCount");
    $userCountRow = $userCountResult->fetch_assoc();
    $userCount = $userCountRow['userCount'];

    // Ödünç alınan kitap sayısını al
    $borrowedBookCountResult = $conn->query("SELECT GetUserBorrowedBookCount(1) AS borrowedCount");
    $borrowedBookCountRow = $borrowedBookCountResult->fetch_assoc();
    $borrowedCount = $borrowedBookCountRow['borrowedCount'];

    //toplam kitap sayısı
    $result = $conn->query("SELECT GetBookCount() AS bookCount");
    $row = $result->fetch_assoc();
    $bookCount = $row['bookCount'];


    // Veritabanı bağlantısını kapat
    $conn->close();
    ?>


    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Kütüphane</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" href="#"><b><?php echo $user_name; ?></b></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Kullanıcı Sayısı: <?php echo $userCount; ?></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Ödünç Alınan Kitap Sayısı: <?php echo $borrowedCount; ?></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">ToplamKitap Sayısı: <?php echo  $bookCount; ?></a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-5">

        <h1>Dashboard</h1>
 

        <div class="container mt-5">

            <div class="row">
                <div class="col-md-4">
                    <h3>Kullanıcı Sayısı</h3>
                    <p><?php echo $userCount; ?></p>
                </div>
                <div class="col-md-4">
                    <h3>Ödünç Alınan Kitap Sayısı</h3>
                    <p><?php echo $borrowedCount; ?></p>
                </div>

                <div class="col-md-4">
                    <h3>toplam Kitap Sayısı</h3>
                    <p><?php echo  $bookCount; ?></p>
                </div>
            </div>
        </div>





        <div class="container">

            <div class="row btn-container">
                <div class="col-md-6">
                    <a href="getbookdet.php" class="btn btn-primary">Tüm Kitaplar</a>
                    <a href="authors.php" class="btn btn-primary">Tüm Yazarlar</a>

                    <?php
                    if ($is_admin) {
                        echo '
                        <a href="books_add.php" class="btn btn-success">Kitap Ekle</a>
                        <a href="recentlyborrowedbooks.php" class="btn btn-success">Ödünç Alınmış Kitaplar</a>
                        <a href="borrow.php" class="btn btn-success">Kitap Ödünç Ekle</a>
                        <a href="returned_book.php" class="btn btn-success">kitap iadesi</a>
                        <a href="add_admin.php" class="btn btn-danger">Admin Ekle</a>
                        <a href="overduebooks.php" class="btn btn-danger">Geciken Kitaplar</a>
                        <a href="all_users.php" class="btn btn-danger">Tüm Kullanıcılar</a>';
                    }
                    ?>
                </div>
                <div class="col-md-6">
                    <a href="borrowedbooks_show.php" class="btn btn-info">Ödünç Aldığım Kitaplar</a>
                    <a href="logout.php" class="btn btn-secondary">Çıkış Yap</a>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS and jQuery (if needed) -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>