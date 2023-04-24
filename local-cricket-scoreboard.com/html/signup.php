<!DOCTYPE html>
<html>
  <head>
    <title>Sign Up Form</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <form>
      <h2>Sign Up</h2>
      <div>
        <label>Full Name:</label>
        <input type="text" placeholder="Enter Full Name" name="fullname" required>
      </div>
      <div>
        <label>Email:</label>
        <input type="email" placeholder="Enter Email" name="email" required>
      </div>
      <div>
        <label>Password:</label>
        <input type="password" placeholder="Enter Password" name="password" required>
      </div>
      <div>
        <label>Confirm Password:</label>
        <input type="password" placeholder="Confirm Password" name="confirm-password" required>
      </div>
      <button type="submit">Sign Up</button>
      <div class="login-link">
        Already have an account? <a href="index.php">Login</a>
      </div>
    </form>
  </body>
</html>
