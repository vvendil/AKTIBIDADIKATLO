<?php
session_start();

include 'db.php';

if (isset($_POST["login"])) {
    $userName = $_POST["userName"];
    $password = $_POST["Password"];

    $stmt = $conn->prepare("SELECT * FROM user WHERE userName = ? AND Password = ?");
    $stmt->bind_param("ss", $userName, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Login successful
        $_SESSION["userName"] = $userName;
        header("Location: ../homepage.php");
        exit();
    } else {
        // Login failed
        $_SESSION["alert"] = "Invalid username or password";
        header("Location: ../index.php");
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>
