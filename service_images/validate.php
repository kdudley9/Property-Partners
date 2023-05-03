<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link href="style.css" type="text/css" rel="stylesheet" />
    <title></title>
  </head>
  <body>
    <?php

session_start();

$flag = FALSE;


$userName = $_POST['Username'];
$Password = $_POST['Password'];
$remember = $_POST['remember'];
//fecthing the values from the txt get_included_file

    // setting up connection to mysql.
    $conn = mysqli_connect(
        "localhost",
        "canjana2",
        "canjana2",
        "canjana2");
    if(!$conn){
        echo 'Connection error: ' . mysqli_connect_error();
    }
    //checking if username exists

    $userNameCookie=$_COOKIE["username"];

    $sql = "SELECT * from users where user_name = '$userName' or user_name = '$userNameCookie';";
    //echo $sql;

    $usr_ids = [];
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        //echo "username exists";
        $flag = TRUE;
        $row = $result->fetch_assoc();

        $userNameDB = $row["user_name"];
        $passwordDB = $row["password"];
        $userType = $row["user_type"];

        //echo $passwordDB;
        //echo $userNameDB;
        //echo $userType;




    }

    //echo password_verify($Password, $passwordDB);

//
  if(!$flag){
    echo "user Name does not exist please sign up using below link </br> <a href = 'signup.php'>Go to sign up page</a>";
  }
  else{
    if(($userName == $userNameDB && password_verify($Password, $passwordDB)) || ($_COOKIE["username"]==$userNameDB && password_verify($_COOKIE["password"], $passwordDB)))
    {

      if($remember){

        $_SESSION['username'] = $userName;
        $_SESSION['password'] = $Password;

        setcookie("username",$userName,time()+ 3600);
          setcookie("password",$Password,time()+ 3600);

      }
      //destroying the cookie
      else{
        setcookie("username", "", time()-3600);
        setcookie("password", "", time()-3600);
      }

      // log in the user based on the user_type;

      if(strtolower($userType) == 'buyer'){
        //echo "redirects to Buyer Dashboard";
        // echo "<script type='text/javascript'>window.top.location='services.html';</script>";
        echo "<script type='text/javascript'>window.top.location='welcome.html';</script>";
      }
      elseif(strtolower($userType) == 'seller'){
        //echo "redirects to Seller Dashboard";
        echo "<script type='text/javascript'>window.top.location='https://codd.cs.gsu.edu/~canjana2/PROJECT4/Seller.php';</script>";
      }
      else{
        //echo "redirects to Admin Dashboard";
        echo "<script type='text/javascript'>window.top.location='https://codd.cs.gsu.edu/~canjana2/PROJECT4/Admin.php';</script>";
      }


    }
    else{
      ?>
      <p>username or password is invalid.</p></br>
      <a href='Login.php'> Please try again!</a>

    <?php

    }
  }




?>



  </body>
</html>


<!-- // Verify the hash against the password entered
  $verify = password_verify($plaintext_password, $hash); -->
