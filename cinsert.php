<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname= "portex";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
else{  
    session_start();
	$item = $_POST['items'];
	$size = $_POST['size'];
	$userid = $_SESSION['userid'];
	$weight = $_POST['weight'];
	
	$sql = "INSERT INTO cargo (items, size, weight, user_id) VALUES ('".$item."','".$size."','".$weight."','".$userid."')";
		if (mysqli_query($conn,$sql)){
			header("location: cargolog.php");
		echo "Insert is succssful";
		}
		else{
			echo $_SESSION['userid'];
		}

    } 
?>