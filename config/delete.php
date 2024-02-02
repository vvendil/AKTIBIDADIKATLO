<?php
require_once 'db.php';

if (isset($_POST['delete']) && isset($_POST['id'])) {
    // Get the 'id' value from the form
    $id = $_POST['id'];

    // Add these lines for debugging
    echo "id: $id<br>";

    // Delete data from the database
    $sql = "DELETE FROM product WHERE id='$id'";

    echo "SQL Query: $sql<br>";

    if ($conn->query($sql) === TRUE) {
      header('location:../item.php');
    } else {
        echo "Error deleting product: " . $conn->error;
    }

    // Close the connection
    $conn->close();
} else {
    // If the delete button is not set or 'id' is not set, handle accordingly (e.g., redirect)
    echo 'Delete button not set or id not provided';
}
?>
