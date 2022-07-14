<?php
session_start();
?>
<html>
<head>
 <title>Vessels || Portex</title>
 <link href="./style.css" type="text/css" rel="stylesheet">
  <style type="text/css">
 table {
 border: 2px solid white;
 background: rgba(74, 96, 119, .9);
 width: 100%;
 }
 th {
	 font-size: 30px;
 border-bottom: 5px solid white;
 border-right: 5px solid white;
 color: white;
 }
 td{
	 color: white;
 border-bottom: 2px solid white;
 border-right: 2px solid white;
 text-align: center;
 font-size: 20px;
 }
 .signup{
	text-align: right;
	padding-left: 850px;
}
p{
	 float: center;
	 color: white;
	 font-size: 20px;
	 padding-right: 100px;
	 text-align: right;
	 font-weight: bold;
	 background-color: rgba(40, 89, 138, 0.9);
 }
 </style>
</head>
<body>
<header>
<div class="head1">
<div class="column1"><a href="./main.php"><img src="./Logo.png"></a></div>
<div class="column2"><h1>Welcome To Portex</h1></div>
<?php
if(isset($_SESSION['username'])){
	
	echo "<p>";
	echo "Logged in as";
	echo "<br>";
	echo $_SESSION['username'];
	echo "</p>";
}
?>
</div><br>
<ul align="center">
<li><button type="button">Vessels</button></li>
<li><a href="./cargolog.php"><button type="button">Cargo</button></a></li>
<li><a href="./vbook.php"><button type="button">Book</button></a></li>
<li class="signup"><a href="./vregister.php"><button>Register</button></a></li>
</ul>
</header>
<?php
include('conn.php');
$sqlget = "select vessel_name, v_id, arrival_port, depart_port, arrival_date, depart_date, berth.berth_name, berth.berth_id, charges.service_cost from vessel, berth, charges where vessel.berth_id = berth.berth_id and vessel.service_id = charges.service_id and u_id = '".$_SESSION['userid']."' order by vessel_name ASC";
$sqldata = mysqli_query($conn,$sqlget) or die('error getting connection');

echo "<table>";
echo "<tr><th>Vessels</th><th>Vessel-ID</th><th>Go To</th><th>From</th><th>Arrival Date</th><th>Departure Date</th><th>Berth Name</th><th>Berth ID</th><th>Charges</th></tr>";

while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
  echo "<tr><td>";
  echo $row['vessel_name'];
  echo "</td><td>";
  echo $row['v_id'];
  echo "</td><td>";
  echo $row['arrival_port'];
  echo "</td><td>";
  echo $row['depart_port'];
  echo "</td><td>";
  echo $row['arrival_date'];
  echo "</td><td>";
  echo $row['depart_date'];
  echo "</td><td>";
  echo $row['berth_name'];
  echo "</td><td>";
  echo $row['berth_id'];
  echo "</td><td>";
  echo $row['service_cost'];
  echo "</td></tr>";
}
echo "</table>";
?>
</body>
</html>