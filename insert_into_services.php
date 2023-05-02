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
$sql = "INSERT INTO services (link, category, title, description, price, image_path)
VALUES 
('one.html', 'Traditional', '842 Cascade Xing SW, Atlanta, GA', '5 bds | 3 ba | 5,984 sqft - House for sale', 423000, 'service_images/traditional_1.jfif'),
('two.html', 'Traditional', '2561 Laurel Cir NW, Atlanta, GA', '3 bds | 3 ba | 1,728 sqft - Townhouse for sale', 200000, 'service_images/traditional_2.jfif'),
('three.html', 'Tiny', 'Screven, GA', '1 bd | 1 ba | 360 sqft - Tiny home for sale', 150000, 'service_images/tiny_1.jfif'),
('four.html', 'Luxury', '389 Blackland Rd. NW Atlanta, GA', '6 bd | 10 ba | 2.08 acres Luxury home for sale', 10900000, 'service_images/luxury_1.jfif'),
('five.html', 'Traditional', '8 Ivy Gates NE, Atlanta, GA', '2 bds | 3 ba | 1,340 sqft - Townhouse for sale', 346000, 'service_images/traditional_3.jfif'),
('six.html', 'Luxury', '50 Valley Road NW Atlanta, GA', '6 bds | 10 ba | 11,380 sqft - Luxury home for sale', 8800000, 'service_images/luxury_2.jfif'),
('seven.html', 'Luxury', '1230 W Garmon Road, Atlanta, GA', '7 bds | 11 ba | 15,015 sqft - Luxury home for sale', 6995000, 'service_images/luxury_3.jfif'),
('eight.html', 'Tiny', 'Toccoa, GA', '1 bd | 1 ba | 392 sqft - Tiny home for sale', 120000, 'service_images/tiny_2.jfif'),
('nine.html', 'Tiny', 'Moultrie, GA', '1 bd | 1 ba | 517 sqft', 80000, 'service_images/tiny_3.jfif')";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully into the table";
} else {
    echo "Error inserting into table: " . $conn->error;
}

$conn->close();
?>