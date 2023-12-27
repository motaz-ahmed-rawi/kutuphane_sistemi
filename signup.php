<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Ol</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Kayıt Ol</h1>
        <form action="signup_process.php" method="post">
            <div class="form-group">
                <label for="username">Kullanıcı Adı:</label>
                <input type="text" id="username" name="username" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Şifre:</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>
            <input type="submit" value="Kayıt Ol" class="btn btn-primary">
        </form>

     <label> Hesabın var mı?<a href="login.php"> Giriş Yap</a></label>

    </div>

    <!-- Bootstrap JS and jQuery (if needed) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
