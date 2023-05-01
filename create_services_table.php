<?php
$host = "localhost";
$user = "kdudley9";
$pass = "kdudley9";
$dbname = "kdudley9";

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS services (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(50) NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    image_path VARCHAR(255) NOT NULL)";

if ($conn->query($sql) === TRUE) {
    echo "Table successfully created";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>