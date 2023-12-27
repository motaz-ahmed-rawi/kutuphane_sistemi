<?php
require_once('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $published_year = $_POST['published_year'];
    $author_name = $_POST['author_name'];
    $genre_name = $_POST['genre_name'];

    // Check if the author exists
    $author_query = "SELECT AuthorID FROM authors WHERE AuthorName = '$author_name'";
    $author_result = $conn->query($author_query);

    if ($author_result->num_rows > 0) {
        // Author exists, retrieve AuthorID
        $author_row = $author_result->fetch_assoc();
        $author_id = $author_row['AuthorID'];
    } else {
        // Insert new author
        $conn->query("INSERT INTO authors (AuthorName) VALUES ('$author_name')");
        $author_id = $conn->insert_id;
    }

    // Check if the genre exists
    $genre_query = "SELECT GenreID FROM genres WHERE GenreName = '$genre_name'";
    $genre_result = $conn->query($genre_query);

    if ($genre_result->num_rows > 0) {
        // Genre exists, retrieve GenreID
        $genre_row = $genre_result->fetch_assoc();
        $genre_id = $genre_row['GenreID'];
    } else {
        // Insert new genre
        $conn->query("INSERT INTO genres (GenreName) VALUES ('$genre_name')");
        $genre_id = $conn->insert_id;
    }

    // Insert book with obtained author ID
    $conn->query("INSERT INTO books (Title, PublishedYear, AuthorID) VALUES ('$title', $published_year, $author_id)");
    $book_id = $conn->insert_id;

    // Link book and genre in bookgenres table
    $conn->query("INSERT INTO bookgenres (BookID, GenreID) VALUES ($book_id, $genre_id)");

    // Close the database connection
    $conn->close();

    // Redirect to success page or perform further actions
    header("Location: dashboard.php");
    exit;
}
?>
