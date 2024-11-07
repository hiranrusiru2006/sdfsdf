<?php
$servername = "localhost";
$username = "root"; // default username for MySQL in XAMPP
$password = ""; // default password is empty for MySQL in XAMPP
$dbname = "student_management"; // the database we created earlier

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
