<?php
/**
  * Here we are calling deletePlayer fucntion to delete the player's data.
  * @return void
  */
session_start();
include 'adminDB.php';
$admin= new Admin();
if ($admin->deletePlayer($_GET['player_id'])) {
  header('Location: dashboard.php');
}
?>