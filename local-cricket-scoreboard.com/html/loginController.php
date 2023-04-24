<?php
/**

    * This PHP script starts a session and includes the userDB.php file which contains the UserInfo class.
    * It checks if email and password are set in the $_POST superglobal array. If true, it creates a new UserInfo object and calls the Login() method to authenticate the user.
    * @return void
    */
session_start();
include 'userDB.php';
if(isset($_POST['email']) && isset($_POST['password'])){
    $user= new UserInfo($_POST);
    if ($user->Login()) {
        header('Location: dashboard.php');
    }
}
?>