<!DOCTYPE html>
<html lang="en">
<head>
    <title>LAZHOPEE</title>
    
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">LAZHOPEE</h2>
                
<!-- Bootstrap JS and Popper.js (required for Bootstrap modals) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
            </div>

        </div> 
        <div class="content">
        <div class="slideshow-container">
  <div class="mySlides fade">
    <img src="photos/aa.png" style="width:120%">
  </div>

  <div class="mySlides fade">
    <img src="photos/yy.png" style="width:120%">
  </div>

  <div class="mySlides fade">
    <img src="photos/zz.png" style="width:120%">
  </div>
</div>

<script>
  let slideIndex = 0;
  showSlides();

  function showSlides() {
    let i;
    const slides = document.getElementsByClassName("mySlides");
    
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }

    slideIndex++;

    if (slideIndex > slides.length) {
      slideIndex = 1;
    }

    slides[slideIndex - 1].style.display = "block";
    setTimeout(showSlides, 2000); // Change slide every 2 seconds
  }
</script>

            <form class="login-form" action="config/login.php" method="post">
        <div class="form">
        <?php
    // Check if the alert session variable is set
    if(isset($_SESSION["alert"])) {
        echo '<div class="alert alert-danger" role="alert">' . $_SESSION["alert"] . '</div>';
        // Unset the alert session variable
        unset($_SESSION["alert"]);
    }
    ?>
                    <h2>LAZHOPEE</h2>
                    <input type="text" id="username" name="userName"  placeholder ="Email"required>
                    <input type="password" id="password" name="Password"placeholder="Password" required>
                    <button class="btnn" type ="submit" name="login">Login</button>
                </div>
                    </div>
                </div>
        </div>
    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>

<?php
session_start();
if(isset($_SESSION["userName"])) {
    header("Location: homepage.php");
    exit();
}
?>