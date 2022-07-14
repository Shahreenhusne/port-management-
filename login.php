<?php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname= "portex";
// Create connection
   $conn = new mysqli($servername, $username, $password, $dbname);
   
$email = $_POST['email'];
$password = $_POST['password'];
   if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 
  else{
	  $sql= mysqli_query($conn, "select email, password from user where email='".$email."'AND password='".$password."'");
	  $result = mysqli_num_rows($sql);
	  $username = mysqli_query($conn, "select user_name from user where email='".$email."'AND password='".$password."'");
	  $userid = mysqli_query($conn, "select user_id from user where email='$email'");
	  $userid = mysqli_fetch_row($userid);
	  $userid = $userid[0];
	  $username = mysqli_fetch_row($username);
	  $username = $username[0];
	  
	  if($result>0){
		  session_start();
		  $_SESSION['username'] = $username;
		  $_SESSION['userid'] = $userid;
		  header("Location: main.php");
		  echo "<p>You have logged in successfully</p>";
	  }
	  else{
		  echo "You have entered Incorrect Password";
	  }
  }
?>