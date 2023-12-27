<?php
// Include your database connection file here
require_once('check_login.php');

require_once('check_admin.php');

// Assuming you have a function to connect to the database
include('db_connection.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you have a form field named 'return_status'
    // which contains the returned status (0 or 1)
    $returnedStatus = $_POST['return_status'];

    // Assuming you have a form field named 'borrow_id'
    // which contains the BorrowID of the borrowed book
    $borrowID = $_POST['borrow_id'];

    // Update the is_returned status in the database
    $updateQuery = "UPDATE borrowedbooks SET is_returned = $returnedStatus WHERE BorrowID = $borrowID";
    $conn->query($updateQuery);
    header("Location: returned_book.php");
        $conn->close();
}

// Fetch and display borrowed books
$selectQuery = "SELECT * FROM borrowedbooks";
$result = $conn->query($selectQuery);
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrowed Books</title>
    <!-- Add your Bootstrap CSS link here -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="mt-4 mb-4">Borrowed Books</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>BorrowID</th>
                    <th>BookID</th>
                    <th>UserID</th>
                    <th>Borrow Date</th>
                    <th>Return Date</th>
                    <th>Is Returned</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['BorrowID']}</td>";
                    echo "<td>{$row['BookID']}</td>";
                    echo "<td>{$row['UserID']}</td>";
                    echo "<td>{$row['BorrowDate']}</td>";
                    echo "<td>{$row['ReturnDate']}</td>";
                    echo "<td>{$row['is_returned']}</td>";
                    echo "<td>
                            <form method='post'>
                                <input type='hidden' name='borrow_id' value='{$row['BorrowID']}'>
                                <select name='return_status' class='form-control'>
                                    <option value='0'>No</option>
                                    <option value='1'>Yes</option>
                                </select>
                                <button type='submit' class='btn btn-primary mt-2'>Update</button>
                            </form>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Add your Bootstrap JS and jQuery links here -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
