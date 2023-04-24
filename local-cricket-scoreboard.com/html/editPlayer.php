<?php
/**
  * Here we are calling updatePlayer fucntion to update the player's data.
  * @return void
  */
session_start();
include 'adminDB.php';
if(isset($_POST['player']) && isset($_POST['runs']) && isset($_POST['balls_faced'])){
    $admin= new Admin();
    if ($admin->updatePlayer($_POST)) {
      header('Location: dashboard.php');
    }
}
?>