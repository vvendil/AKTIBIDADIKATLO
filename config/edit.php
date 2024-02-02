<?php
require_once 'db.php';

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $editProductName = mysqli_real_escape_string($conn, $_POST['editProductName']);
    $editPrice = $_POST['editPrice'];
    $editProductImage = $_POST['editProductImage']; // Assuming it's a URL, not an uploaded file

    // Update data in the database
    $sql = "UPDATE product SET productName='$editProductName', price='$editPrice', productImage='$editProductImage' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../item.php");
        echo "Product updated successfully";
        exit;
    } else {
        echo "Error updating product: " . $conn->error;
    }

    // Close the connection
    $conn->close();
} else {
    // Redirect to item.php if the edit button is not set
    header("Location: ../item.php");
    exit;
}
?>
