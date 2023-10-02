<?php
// Database connection (Update credentials accordingly)
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'shop_db';

$link = mysqli_connect($host, $username, $password, $database);

if (!$link) {
    die('Database connection error: ' . mysqli_connect_error());
}

// Check if an ID is provided in the URL
if (isset($_GET['item_id'])) {
    $id = $_GET['item_id'];

    // Delete the user with the provided ID
    $query = "DELETE FROM products WHERE item_id = '$id'";
    $result = mysqli_query($link, $query);

    if ($result) {
        echo "User deleted successfully!";
    } else {
        echo "Error deleting user: " . mysqli_error($link);
    }
} else {
    echo "User ID not provided.";
}

// Close the database connection
mysqli_close($link);
?>
