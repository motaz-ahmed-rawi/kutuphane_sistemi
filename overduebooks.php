<?php
require_once('check_login.php');

require_once('check_admin.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geçmiş Tarihe Kadar Teslim Edilmemiş Kitaplar</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">


        <h1 class="mt-5">Geçmiş Tarihe Kadar Teslim Edilmemiş Kitaplar</h1>
        <table class="table table-bordered mt-3">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Başlık</th>
                    <th scope="col">Kullanıcı Adı</th>
                    <th scope="col">Ödünç Alma Tarihi</th>
                    <th scope="col">Geri Getirme Tarihi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once('db_connection.php');

                $sql = "SELECT * FROM overduebooks";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["Title"] . "</td>";
                        echo "<td>" . $row["UserName"] . "</td>";
                        echo "<td>" . $row["BorrowDate"] . "</td>";
                        echo "<td>" . $row["ReturnDate"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Veri bulunamadı.</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    <!-- Bootstrap JS and jQuery (if needed) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
