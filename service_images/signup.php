<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sign Up</title>
    <link href="index.css" type="text/css" rel="stylesheet" />
  </head>
  <body>
    
      <form action="signup-submit.php" method="post" align="center">
        <div class="main">
            <h1><img src="logo.png" width="260" height="120"><h1>
                <br>
          <table>
                <tr>
                    <td>Name:</td>
                    <td>
                        <input class="form__input" type="text" name="name" size="27" maxlength="26" required>
                    </td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>
                        <input class="form__input" type="text" name="email" size="30" maxlength="28" required>
                    </td>
                </tr>
                <tr>
                    <td>User Name:</td>
                    <td>
                        <input class="form__input"  type="text" name="userName" size="30" maxlength="20" required>
                    </td>
                </tr>
                <tr class="user_type">
                    <td><label for="user_type">User Type:</label></td>
                    <td>
                        <select name="user_type" id="user_type" style="width: 208px; height: 27px; margin-bottom: 20px;">
                            <option value="buyer">Buyer</option>
                            <option value="seller">Seller</option>
                            <option value="admin">Admin</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td>
                        <input class="form__input" type="password" name="Password" size="12" maxlength="20" required>
                    </td>
                </tr>
                <tr>
                    <td> Confirm Password:</td>
                    <td>
                        <input class="form__input" type="text" name="confirmPassword" size="12" maxlength="20" required>
                    </td>
                </tr>
          </table>   
          <input class="form__button" type="submit" value="Sign Up">
          <p class="form__text">
            <br>
              <a href="Login.php" id="linkLogin">Already have an account? login in</a>
        </div>
       
          </p>
      </form>
  </body>
</html>
