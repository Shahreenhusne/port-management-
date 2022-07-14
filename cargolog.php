<?php
session_start();
?>
<html>
<head>
 <title>Cargo || Portex</title>
 <link href="./style.css" type="text/css" rel="stylesheet">
  <style type="text/css">
 table {
 border: 2px solid white;
 background: rgba(74, 96, 119, 0.9);
 width: 100%;
 }
 th {
	 font-size: 30px;
 border-bottom: 5px solid white;
 border-right: 5px solid white;
 color: white;
 }
 td{
	 font-size: 25px;
	 color: white;
 border-bottom: 2px solid white;
 border-right: 2px solid white;
 text-align: center;
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
<div class="column1"><a href="./main.html"><img src="./Logo.png"></a></div>
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
<li><a href="./vessellog.php"><button type="button">Vessels</button></a></li>
<li><button type="button">Cargo</button></li>
<li><a href="./cbook.php"><button type="button">Book</button></a></li>
<li class="signup"><a href="./cregister.php"><button>Register</button></a></li>
</ul>
</header>
<?php
include('conn.php');
$sqlget = "select cargo_id, items, size, weight, charges.service_name, charges.service_cost from cargo, charges where cargo.service_id = charges.service_id and user_id = '".$_SESSION['userid']."' order by size ASC";
$sqldata = mysqli_query($conn,$sqlget) or die('error getting connection');

echo "<table>";
echo "<tr><th>Cargo ID</th><th>Item</th><th>Size Ft</th><th>Weight kg</th><th>Service Name</th><th>Service Charge</th></tr>";

while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
  echo "<tr><td>";
  echo $row['cargo_id'];
  echo "</td><td>";
  echo $row['items'];
  echo "</td><td>";
  echo $row['size'];
  echo "</td><td>";
  echo $row['weight'];
  echo "</td><td>";
  echo $row['service_name'];
  echo "</td><td>";
  echo $row['service_cost'];
  echo "</td></tr>";
}
echo "</table>";
?>
</body>
</html>