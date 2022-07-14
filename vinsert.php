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
	$vessel_name = $_POST['vname'];
	$vessel_id = $_POST['vid'];
	$user_id = $_SESSION['userid'];
	$aport = $_POST['aport'];
	$dport = $_POST['dport'];
	$atime = $_POST['atime'];
	$dtime = $_POST['dtime'];
	$cap = $_POST['capacity'];
	$weight = $_POST['weight'];
	
	$sqlset = "INSERT INTO vessel(vessel_name, v_id, u_id, arrival_port, depart_port, arrival_date, depart_date, capacity, weight, service_id) VALUES ('".$vessel_name."','".$vessel_id."','".$user_id."','".$aport."','".$dport."','".$atime."','".$dtime."','".$cap."','".$weight."','0')";
	$select = "SELECT v_id from vessel where v_id = '$vessel_id'";
	$result = mysqli_query($conn,$select);
	
	$rownum = mysqli_num_rows($result);
	if($rownum > 0){
		echo "This Vessel-id have been taken try with different id";
	}
	else{
		if (mysqli_query($conn,$sqlset)){
			header("location: vessellog.php");
		echo "Insert is succssful";
		}
		//header("location: main.php");
	}
} 
?>