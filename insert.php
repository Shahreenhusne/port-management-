<?php
include('conn.php');
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
$username = $_POST['uname'];
$email = $_POST['email'];
$password = $_POST['password'];
	$SELECT = "SELECT email From user Where email = ? Limit 1";
	$INSERT = "INSERT INTO user (user_name, email, password) values (?,?,?)";
	
	//prepare statement
	$stmt = $conn->prepare($SELECT);
	$stmt->bind_param('s', $email);
	$stmt->execute();
	$stmt->bind_result($email);
	$stmt->store_result();
	$rnum = $stmt->num_rows;
	
	if($rnum==0){
		$stmt->close();
		
		$stmt = $conn->prepare($INSERT);
		$stmt->bind_param('sss',$username, $email, $password);
		$stmt->execute();
		header("Location: form.html");
	}
	else{
		echo "This email have been taken, please try again with different email ID";
	}
	$stmt->close();
	$conn->close();


?>
