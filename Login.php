<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Log In</title>
    <link href="index.css" type="text/css" rel="stylesheet" />
  </head>
  <body>
  <div class="main">
    <h1><img src="logo.png" width="260" height="120"></h1>
  
<br>
    <div align="center">
      <form action="validate.php" method="post" name="Login_Form">
        <table width="400" border="0" align="center" cellpadding="5" cellspacing="1" class="Table">
              <tr>
                <td align="right" valign="top">Username</td>
                <td><input name="Username" type="text" class="Input" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>" required></td>
              </tr>
              <tr>
                <br>
                <td align="right">Password</td>
                <td><input name="Password" type="password" class="Input" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" required></td>
              </tr>
              <tr>
                <td colspan="2" align="center"> <input type="checkbox" name ="remember" value="1" checked>Remember me</td>
              </tr>
        </table>
        <br>
        <input class="form__button" type="submit" value="Login">
        <p class="form__text">
          <br>
          <br>
            <a href="signup.php" id="linkLogin">Don't have an account? Sign up</a>
        </p>
    </form>
    </div>
  </div>
  </body>
</html>
