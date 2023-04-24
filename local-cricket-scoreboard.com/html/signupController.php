<?php 
    /**
   * Registers a new user with the given first name, last name, email, and password.
   * @param string $fullname The name of the user.
   * @param string $email The email of the user.
   * @param string $password The password of the user.
   * @return void
    */
    include 'userDB.php';
    if(isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['password'])){
    $user= new UserInfo($_POST);
    $user->Register();
    }
?>