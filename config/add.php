<?php
require_once 'db.php';


if (isset($_POST['add'])) {
    $id = $_POST['id'];
    $productName = mysqli_real_escape_string($conn, $_POST['productName']);
    $price = $_POST['price'];

    // Check if the file upload field is set and not empty
    if (isset($_FILES["productImage"]) && !empty($_FILES["productImage"]["name"])) {
        $targetDir = "../photos/";
        $targetFile = $targetDir . basename($_FILES["productImage"]["name"]);

        // File upload checks
        if (
            move_uploaded_file($_FILES["productImage"]["tmp_name"], $targetFile) &&
            getimagesize($targetFile) &&
            in_array(strtolower(pathinfo($targetFile, PATHINFO_EXTENSION)), ["jpg", "jpeg", "png", "gif"]) &&
            $_FILES["productImage"]["size"] <= 500000
        ) {
          
          

            // Insert data into the database
            $sql = "INSERT INTO product (productName, price, productImage) VALUES ('$productName', '$price', '$targetFile')";
            if ($conn->query($sql) === TRUE) {
                header("Location: ../item.php");
                echo "Product added successfully";
                exit;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            // Debugging statements
            echo "Sorry, there was an error uploading your file. ";
            echo "File info: " . print_r($_FILES["productImage"], true) . ". ";
            echo "Error: " . $_FILES["productImage"]["error"] . ". ";
        }
    } else {
        echo "Please select a file to upload.";
    }

    // Close the connection
    $conn->close();
}
?>
