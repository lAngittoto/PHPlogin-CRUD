<?php
$host = "localhost"; // XAMPP default
$user = "root";      // XAMPP default
$pass = "P@ssw0rd";          // XAMPP default
$db   = "simple_system"; // database name

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
