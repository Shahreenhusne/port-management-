<?php
include('conn.php');
session_start();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  else{
	$vid = $_POST['vid'];
	$atime = $_POST['atime'];
	$dtime = $_POST['dtime'];
	$bid = $_POST['berth_id'];
	
	$sql = 'UPDATE vessel SET arrival_date = "'.$atime.'", depart_date = "'.$dtime.'", berth_id= "'.$bid.'" where v_id = "'.$vid.'" and u_id = "'.$_SESSION['userid'].'"';
	$sqlget = mysqli_query($conn,$sql);
	if(isset($sqlget)){
		
		header("location: vessellog.php");
	}
  }
?>