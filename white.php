<?php
//connect to database
$host = "localhost";
$user = "cramos14";
$password = "cramos14";
$dbname = "cramos14";
$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>