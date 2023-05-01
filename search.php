<?php
//connect to database
$host = "localhost";
$user = "kdudley9";
$password = "kdudley9";
$dbname = "kdudley9";
$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//get user input
if (isset($_GET['query'])) {
  $search_query = $_GET['query'];
} else {
  $search_query = "";
}

//prepare query
$query = "SELECT * FROM services WHERE title LIKE '%$search_query%' OR description LIKE '%$search_query%'";

//execute query
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <link rel="stylesheet" href="services.css">
    <script src="services.js"></script>
</head>
<body>
    <div class="services-container">
        <div class="search">
            <form method="GET" action="search.php">
                <input type="text" name="query" placeholder="Search...">
            </form>
            <a href="services.html">Return to Dashboard</a>
        </div>
        <?php
        //display results
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo "<div class='card'>";
            echo "<a href='#'>";
            echo "<div class='category'>" . $row['category'] . "</div>";
            echo "<img src='" . $row['image_path'] . "' alt='" . $row['title'] . "'>";
            echo "<h2 class='title'>" . $row['title'] . "</h2>";
            echo "<div class='description'>" . $row['description'] . "</div>";
            echo "<div class='info'>";
            echo "<div class='price'>$" . $row['price'] . "</div>";
            echo "</div>";
            echo "</a>";
            echo "</div>";
          }
        } else {
          echo "No results found.";
        }
        ?>

    </div>
    <script src="services.js"></script>
</body>
</html>

<?php
//close connection
$conn->close();
?>