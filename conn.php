<?php
$servername="localhost";
$username="root";
$password="";
$db="sawsan";
// start connection with database
$conn = new mysqli($servername, $username, $password);
// Check connection

if ($conn->connect_error){
      die("Connection failed: " . $conn->connect_error);
    } 
?>