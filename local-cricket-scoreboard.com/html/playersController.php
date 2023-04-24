<?php
/**
  * This PHP script starts a session and includes the userDB.php file which contains the UserInfo class.
  * It checks if email and password are set in the $_POST superglobal array. If true, it creates a new UserInfo object and calls the Login() method to authenticate the user.
  * @return void
  */
session_start();
include 'adminDB.php';
if(isset($_POST['player']) && isset($_POST['runs']) && isset($_POST['balls_faced'])){
    $admin= new Admin($_POST);
    if ($admin->addPlayer()) {
      header('Location: dashboard.php');
    }
}
?>