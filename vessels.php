<html>
<head>
 <title>Vessels || Portex</title>
 <link href="./style.css" type="text/css" rel="stylesheet">
  <style type="text/css">
 table {
 border: 2px solid white;
 background: rgba(74, 96, 119, 0.8);
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
 </style>
</head>
<body>
<header>
<div class="head1">
<div class="column1"><a href="./main.html"><img src="./Logo.png"></a></div>
<div class="column2"><h1>Welcome To Portex</h1></div>
</div><br><br><br><br><br>
<ul align="center">
<li><button type="button">Vessels</button></li>
<li><a href="./cargo.php"><button type="button">Cargo</button></a></li>
<li><a href="./form.html"><button type="button">Book</button></a></li>
<li class="Login"><a href="./form.html"><button type="button" align="right">Login</button></a></li></br>
</ul>
</header>
<?php
include('conn.php');

$sqlget = "select vessel_name, arrival_port from vessel order by vessel_name ASC";
$sqldata = mysqli_query($conn,$sqlget) or die('error getting connection');

echo "<table>";
echo "<tr><th>Vessels Name</th><th>Going to</th></tr>";

while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
  echo "<tr><td>";
  echo $row['vessel_name'];
  echo "</td><td>";
  echo $row['arrival_port'];
  echo "</td></tr>";
}
echo "</table>";
?>
</body>
</html>