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

// Inserting into the table
$sql = "INSERT INTO services (category, title, description, price, image_path)
VALUES 
('Course', 'C++ Course', 'Learn the fundamentals of C++', 10, 'service_images/c-plus-logo.jpg'),
('Tutoring', 'Discrete Math Guidance', 'Get one-on-one tutoring for Discrete Math', 20, 'service_images/discrete-math-logo.png'),
('Tutoring', 'Operating Systems Guidance', 'Get one-on-one tutoring for Operating Systems', 20, 'service_images/operating-systems-logo.jfif'),
('Course', 'Data Structures', 'Learn all of the basic data structures', 12, 'service_images/ds-logo.png'),
('Course', 'HTML & CSS Course', 'Learn everything you need to know about HTML & CSS', 8, 'service_images/html-and-css.jpg'),
('Tutoring', 'Programming Language Concepts Guidance', 'Get one-on-one tutoring for Programming Language Concepts', 20, 'service_images/plc-logo.webp'),
('Tutoring', 'Web Programming Guidance', 'Get one-on-one tutoring for Web Programming', 15, 'service_images/web-programming-logo.jpg')";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully into the table";
} else {
    echo "Error inserting into table: " . $conn->error;
}

$conn->close();
?>