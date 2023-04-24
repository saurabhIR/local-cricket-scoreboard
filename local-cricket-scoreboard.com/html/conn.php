<?php

$server="localhost";
$username="saurabh";
$password="Saurabh@8442";
$database = "cricket_scoreboard";

/* Create database  connection with correct username and password*/

$connect = new mysqli($server,$username,$password,$database);

/* Check the connection is created  properly or not */
if($connect->connect_error){
    echo "Connection error:" ;$connect->connect_error;
}
?>