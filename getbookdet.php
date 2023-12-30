<?php
require_once('db_connection.php');

require_once('check_login.php');




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bookID = $_POST['bookID'];

    $stmt = $conn->prepare("CALL GetBookDetails(?)");
    $stmt->bind_param("i", $bookID); // Assuming bookID is an integer, adjust if it's a different data type

    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<div class='container mt-5'>";
            echo "<h2>Book Details</h2>";
            echo "<div class='table-responsive'>";
            echo "<table class='table table-striped'>";
            echo "<thead>";
            echo "<tr><th>Title</th><th>Published Year</th><th>Author id</th> </tr>";
            echo "</thead>";
            echo "<tbody>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["Title"] . "</td><td>" . $row["PublishedYear"] . "</td><td>" . $row["AuthorID"] . "</td></tr>";
                // Add other book details as needed within <td> tags
            }
            echo "</tbody>";
            echo "</table>";
            echo "</div>";
            echo "</div>";
        } else {
            echo "No book found with the given ID.";
        }
    } else {
        echo "Error executing stored procedure: " . $stmt->error;
    }

    $stmt->close();
}

// Display all books using the view (BookDetailsView)
$sql = "SELECT * FROM BookDetailsView";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Books</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <!-- HTML form to input bookID -->
    <form method="post" action="">
        <div class="form-group">
            <label for="bookID">Enter Book ID:</label>
            <input type="text" class="form-control" id="bookID" name="bookID" placeholder="Enter Book ID">
        </div>
        <button type="submit" class="btn btn-primary">Get Book Details</button>
    </form>
    <?php
    if ($result->num_rows > 0) {
        // Display all books from the view in a responsive table
        echo "<h2>All Books</h2>";
        echo "<div class='table-responsive'>";
        echo "<table class='table table-striped'>";
        echo "<thead>";
        echo "<tr><th>book id</th><th>Title</th><th>Published Year</th><th>Author</th></tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["BookID"] . "</td><td>" . $row["Title"] . "</td><td>" . $row["PublishedYear"] . "</td><td>" . $row["AuthorName"] . "</td><td>" . $row["GenreName"] . "</td></tr>";
            // Add other book details as needed within <td> tags
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    } else {
        echo "<p>No books found.</p>";
    }

    $conn->close();
    ?>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
