<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link href="style.css" type="text/css" rel="stylesheet" />
    <title></title>
  </head>
  <body>
    <?php
    error_reporting(E_ALL | E_WARNING | E_NOTICE);
    ini_set('display_errors', TRUE);

    $has_error = FALSE;


if (preg_match("/[0-9]/", $_POST["name"]) === 1) {
  echo"Name should not contain any numeric value</br>";
  $has_error = TRUE;
}

// if (empty($_POST["name"])) {
//   echo"The name must not be blank</br>";
//   $has_error = TRUE;
// }

$special_char = "!@#$%&^*";  // set of special characters
$password = $_POST["Password"];

$shared = implode( '' , array_intersect( str_split($password) , str_split($special_char) ) ); // checking common character between password and special char string.


if(strlen($shared) == 0){
 echo "Invalid Password. Please ensure your password have special characters(!, @, #, $, %, &, ^, *).</br>";
 $has_error = TRUE;
}

if (!preg_match('/[A-Z]/', $_POST["Password"]) || !preg_match('~[0-9]+~', $_POST["Password"])) {
  echo " Invalid Password. Please ensure your password have One capital letter and one numeric value.</br>";
  $has_error = TRUE;
}
if ($_POST["Password"]!= $_POST["confirmPassword"]) {
  echo "Password does not match.</br>";
  $has_error = TRUE;
}
//check for comma
if (strlen(implode( '' , array_intersect( str_split($password) , str_split(",") ) )) > 0) {
  echo "Password must not contain 'comma(,)'.</br>";
  $has_error = TRUE;
}
if (strlen(implode( '' , array_intersect( str_split($_POST["email"]) , str_split(",") ) )) > 0) {
  echo "Email must not contain 'comma(,)'.</br>";
  $has_error = TRUE;
}
if (strlen(implode( '' , array_intersect( str_split($_POST["userName"]) , str_split(",") ) )) > 0) {
  echo "Username must not contain 'comma(,)'.</br>";
  $has_error = TRUE;
}
if (strlen(implode( '' , array_intersect( str_split($_POST["name"]) , str_split(",") ) )) > 0) {
  echo "Name must not contain 'comma(,)'.</br>";
  $has_error = TRUE;
}
//

if (strlen(implode( '' , array_intersect( str_split($_POST["email"]) , str_split("@") ) )) == 0) {
  echo "Please enter a valid email address.</br>";
  $has_error = TRUE;
}

// setting up connection to mysql.
$conn = mysqli_connect(
  "localhost",
  "canjana2",
  "canjana2",
  "canjana2");
if(!$conn){
    echo 'Connection error: ' . mysqli_connect_error();
}
// else{
//   echo "Connected successfully<br>";
// }

//check for existing username
$sql = "SELECT distinct user_name from users;";

$usr_ids = [];
$result = $conn->query($sql);
$flag = FALSE;
if ($result->num_rows > 0) {
  
   // output data of each row
   while($row = $result->fetch_assoc()) {
      //echo $row["user_name"];
     array_push($usr_ids,$row["user_name"]);
   }
 }
 
 if (in_array($_POST["userName"], $usr_ids)){
   $flag = TRUE;
 }


if($flag){
  echo "User Name is not available. Use another user Name.</br>";
  $has_error = TRUE;
}

if(!$has_error){
  //echo "no error in form";

  $sql = "CREATE TABLE IF NOT EXISTS users (
         user_id INT PRIMARY KEY,
         name VARCHAR(50) NOT NULL,
         user_name VARCHAR(50) NOT NULL unique,
         email VARCHAR(50) NOT NULL,
         user_type VARCHAR(10) NOT NULL,
         password VARCHAR(50) NOT NULL
     );";
  
  $result = $conn->query($sql);

  // updating max user_id
  $sql1 = "select max(user_id) as max_usr_id from users;";
  $result = $conn->query($sql1);

  $row = $result->fetch_assoc();
  $usr_id = $row["max_usr_id"]+1;
  //echo $usr_id;

  //Inserting data into table.
  $usr_name = $_POST["userName"];
  $name = $_POST["name"];
  $email = $_POST["email"];
  $user_type = $_POST["user_type"];
  $password = $_POST["Password"];

  //echo $password;
  // encode password
  $password_hash = password_hash($password, PASSWORD_DEFAULT);

  $sql = "INSERT INTO users".
                "(user_id, user_name, name, email, user_type, password) "."VALUES ".
                "('$usr_id','$usr_name','$name','$email','$user_type','$password_hash')";
  //echo $sql;

  if ($conn->query($sql)) {
    echo "<script type='text/javascript'>window.top.location='Login.php';</script>";
    header('Login.php');
    die;
  }
  
}

?>



  </body>
</html>


<!-- // Verify the hash against the password entered
  $verify = password_verify($plaintext_password, $hash); -->