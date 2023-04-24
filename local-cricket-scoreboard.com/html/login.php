<!DOCTYPE html>
<html>
  <head>
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <form action="loginController.php" method="post">
      <h2>Login Form</h2>
      <div>
        <label>Email:</label>
        <input type="email" placeholder="Enter Email" name="email" required>
      </div>
      <div>
        <label>Password:</label>
        <input type="password" placeholder="Enter Password" name="password" required>
      </div>
      <button type="submit">Login</button>
      <div class="signup-link">
        Don't have an account? <a href="signup.php">Sign up</a>
      </div>
    </form>
  </body>
</html>
