<?php
require_once('check_login.php');

?>

<?php
require_once('db_connection.php');

// Fetch data from the authors view
$sql_authors = "SELECT * FROM authors";
$result_authors = $conn->query($sql_authors);

// Fetch data from the bookauthors view
$sql_bookauthors = "SELECT * FROM bookauthors";
$result_bookauthors = $conn->query($sql_bookauthors);

// Fetch data from the authorbookcount view
$sql_authorbookcount = "SELECT * FROM authorbookcount";
$result_authorbookcount = $conn->query($sql_authorbookcount);


// Fetch data from the genrebookcount view
$sql_genrebookcount = "SELECT * FROM genrebookcount";
$result_genrebookcount = $conn->query($sql_genrebookcount);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authors Information</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Authors</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Author ID</th>
                        <th>Author Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result_authors->num_rows > 0) {
                        while ($row = $result_authors->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["AuthorID"] . "</td>";
                            echo "<td>" . $row["AuthorName"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='2'>No records found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <h2>Book Authors</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result_bookauthors->num_rows > 0) {
                        while ($row = $result_bookauthors->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["Title"] . "</td>";
                            echo "<td>" . $row["AuthorName"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No records found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <h2>Author Book Count</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Author Name</th>
                        <th>Book Count</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result_authorbookcount->num_rows > 0) {
                        while ($row = $result_authorbookcount->fetch_assoc()) {
                            echo "<tr>";
                            
                            echo "<td>" . $row["AuthorName"] . "</td>";
                            echo "<td>" . $row["BookCount"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No records found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>





    <div class="container mt-5">
        <h2>Genre Book Count</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Genre Name</th>
                        <th>Book Count</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result_genrebookcount->num_rows > 0) {
                        while ($row = $result_genrebookcount->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["GenreName"] . "</td>";
                            echo "<td>" . $row["BookCount"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='2'>No records found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
