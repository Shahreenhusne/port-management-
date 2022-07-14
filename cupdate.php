<?php
include('conn.php');
session_start();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  else{
	$cid = $_POST['c_id'];
	$vid = $_POST['v_id'];
	
	$sql = 'UPDATE cargo SET v_id = "'.$vid.'" where cargo_id = "'.$cid.'" and user_id = "'.$_SESSION['userid'].'"';
	$sqlget = mysqli_query($conn,$sql);
	if(isset($sqlget)){
			
		$getdate = date('Y/m/d'); 
		
		$query = "select depart_port from vessel where v_id = '".$vid."'";
        $result = $conn->query($query);
        $row = $result->fetch_assoc();
		
		$querya = "select arrival_port from vessel where v_id = '".$vid."'";
        $result = $conn->query($querya);
        $rowa = $result->fetch_assoc();
		
		if($row['depart_port'] == "Chottogram"){
			$setfee = 'UPDATE cargo SET service_id = "4" WHERE cargo_id = "'.$cid.'" and user_id = "'.$_SESSION['userid'].'"';
			mysqli_query($conn,$setfee) or die('connection error');
		}
		elseif($rowa['arrival_port'] == "Chottogram"){
			$setfee = 'UPDATE cargo SET service_id = "5" where cargo_id = "'.$cid.'" and user_id = "'.$_SESSION['userid'].'"';
			mysqli_query($conn,$setfee) or die('connection error');
		}
		else{
			$setfee = 'UPDATE cargo SET service_id = "6" where user_id = "'.$_SESSION['userid'].'" and cargo_id = "'.$cid.'"';
			mysqli_query($conn,$setfee) or die('connection error');
		}
		header("location: cargolog.php");
	}
  }
?>