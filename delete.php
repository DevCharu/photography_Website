<?php
// Database connection details
$server = "localhost";
$username = "root";
$password = "";
$database = "malcolm_db";

// Create connection
$con = mysqli_connect($server, $username, $password, $database);

// Check connection
if (!$con) {
    die("Connection error: " . mysqli_connect_error());
}

// Check if 'id' is present in the query string
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Sanitize user input to prevent SQL injection
    $id = mysqli_real_escape_string($con, $id);

    // Delete record from the database
    $sql = "DELETE FROM form WHERE id='$id'";

    if (mysqli_query($con, $sql)) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
} else {
    echo "No ID provided.";
}

// Close connection
mysqli_close($con);
?>
