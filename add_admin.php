<?php
require_once('check_login.php');

require_once('check_admin.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Kullanıcılar</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Admin Kullanıcılar</h1>

        <!-- Admin Kullanıcılar Tablosu -->
        <table class="table table-bordered mt-3">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Kullanıcı ID</th>
                    <th scope="col">Kullanıcı Adı</th>
                    <th scope="col">Admin Durumu</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once('db_connection.php');

                // Admin kullanıcıları almak için sorgu
                $sql = "SELECT userid, username, is_admin FROM users WHERE is_admin = 1";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["userid"] . "</td>";
                        echo "<td>" . $row["username"] . "</td>";
                        echo "<td>" . ($row["is_admin"] == 1 ? "Admin" : "Normal") . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>Admin kullanıcısı bulunamadı.</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>

        <!-- Kullanıcıyı Admin Yapma Formu -->
        <h2>Kullanıcıyı Admin Yap</h2>
        <form action="make_admin_process.php" method="post">
            <div class="form-group">
                <label for="username">Kullanıcı Username:</label>
                <input type="text" id="username" name="username" class="form-control">
            </div>
            <input type="submit" value="Admin Yap" class="btn btn-primary mt-3">
        </form>
    </div>

    <!-- Bootstrap JS and jQuery (if needed) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
