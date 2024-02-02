<?php
session_start();
require_once 'config/db.php';

if (!isset($_SESSION["userName"])) {
    header("Location: index.php");
    exit();
}
// Fetch products from the database
$sql = "SELECT * FROM product";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
  
</head>
<body>
    <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
 
    
  
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="imagegallery.php">Shop</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="item.php">Crud</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="config/logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
       
    </header>
    <section>
    <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product">';
                echo '<img src="photos/' . $row["productImage"] . '" alt="' . $row["productName"] . '">';
                echo '<h2>' . $row["productName"] . '</h2>';
                echo '<p>₱ ' . number_format($row["price"], 2) . '</p>';
                echo '<button>Add to Cart</button>';
                echo '</div>';
            }
        } else {
            echo '<p>No products available.</p>';
        }

        // Close the database connection
        $conn->close();
        ?>
       
    </section>
    <footer>
        <p>&copy; 2024 Simple eCommerce</p>
    </footer>
</body>
</html>
<style>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    header {
        background-color: #333;
        color: #fff;
        text-align: center;
        padding: 1em;
    }

    .navbar {
        background-color: #007bff;
        padding: 10px 0; /* Added padding for better appearance */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Added box shadow for depth */
    }

    .navbar-brand {
        color: #fff;
        font-size: 1.5em;
        font-weight: bold;
    }

    .navbar-nav {
        display: flex;
        flex-direction: column; /* Make navbar links vertical */
        align-items: center; /* Center the links horizontally */
        margin: 10px 0; /* Added margin for spacing */
    }

    .nav-item {
        margin: 10px 0; /* Added margin for spacing between links */
    }

    .nav-link {
        text-decoration: none;
        color: #fff;
        font-weight: bold;
        transition: color 0.3s ease-in-out;
    }

    .nav-link:hover {
        color: #f8f9fa; /* Change color on hover */
    }

    section {
        padding: 20px;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .product {
        width: 30%;
        border: 1px solid #ddd;
        padding: 10px;
        margin: 10px;
        text-align: center;
        background-color: #fff;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out;
    }

    .product:hover {
        transform: scale(1.05);
    }

    .product img {
        max-width: 100%;
        height: auto;
        border-bottom: 1px solid #ddd;
    }

    .product h2 {
        font-size: 1.2em;
        margin: 10px 0;
    }

    .product p {
        font-size: 1.1em;
        color: #007bff;
    }

    .product button {
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        cursor: pointer;
        width: 100%;
        transition: background-color 0.3s ease-in-out;
    }

    .product button:hover {
        background-color: #0056b3;
    }

    .w3-content {
        max-width: 100%;
        height: auto;
    }
</style>


