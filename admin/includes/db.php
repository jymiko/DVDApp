<?php
$local = "localhost";
$user = "root";
$pass = "";
$database = "dvd_store";
$connection = mysqli_connect($local,$user,$pass,$database);
if (!$connection)
  {
  die('Connect Error :'.mysqli_connect_error());
  } 
?>