<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .slider-container {
            max-width: 800px;
            margin: auto;
            position: relative;
        }

        .mySlides {
            display: none;
            width: 100%;
        }

        .slider-btn {
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            margin-top: -22px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
        }

        .prev {
            left: 0;
            border-radius: 3px 0 0 3px;
        }

        .next {
            right: 0;
        }

        .w3-content {
            max-width: 100%;
            height: auto;
        }
    </style>
    <title>E-commerce</title>
</head>
<body>

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
          <a class="nav-link" href="item.php">CRUD</a>
        </nav>
        <li class="nav-item">
          <a class="nav-link" href="config/logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-5">
    <div class="slider-container">
        <img class="mySlides" src="products/nike1.jpg" alt="Slide 1">
        <img class="mySlides" src="products/nike2.jpeg" alt="Slide 2">
        <img class="mySlides" src="products/nike3.jpg" alt="Slide 3">
        <img class="mySlides" src="products/nike4.jpg" alt="Slide 4">
        <button class="slider-btn prev" onclick="plusDivs(-1)">&#10094;</button>
        <button class="slider-btn next" onclick="plusDivs(1)">&#10095;</button>
    </div>
</div>

<script>
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
        showDivs(slideIndex += n);
    }

    function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        if (n > x.length) {slideIndex = 1}
        if (n < 1) {slideIndex = x.length}
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
        }
        x[slideIndex-1].style.display = "block";  
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-rZpZEAgY5BV8LpPyrBteJ+5HRgNwYfX1S+1aTtOJEd3E3nIg/6Qjcz2RMIbYMWx3" crossorigin="anonymous"></script>
</body>
</html>
<?php
session_start();

if(!isset($_SESSION["userName"])) {
    header("Location: index.php");
    exit();
}
?>