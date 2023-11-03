<?php
require_once 'conn.php';
// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the order_id from the form
    $order_id = $_POST["order_id"];

    // Prepare and execute a DELETE query
    $sql = "DELETE FROM sketch_order WHERE order_id = '$order_id'";

    if ($conn->query($sql) === TRUE) {
        // Order deleted successfully
        header("Location: order_details.php"); // Redirect to orders page or any other page
        exit;
    } else {
        echo "Error deleting order: " . $conn->error;
    }
}

$conn->close();
?>
