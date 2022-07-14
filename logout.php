<?php
include(conn.php);
session_start();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 
  else{
  session_destroy();
  header("location: main.html");
  }
?>