<?php
session_start();
include "db.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT password FROM users WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($hashedPasswordFromDB);
    $stmt->fetch();

    if($stmt->num_rows > 0 && password_verify($password, $hashedPasswordFromDB)){
        $_SESSION['username'] = $username; // logged in
        header("Location: ../views/dashboard.php"); // redirect to dashboard
        exit;
    } else {
        $_SESSION['login_error'] = "Invalid username or password";
        header("Location: ../index.php?page=login"); // redirect back to login
        exit;
    }

    $stmt->close();
    $conn->close();
}
?>
