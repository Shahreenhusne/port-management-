<?php
session_start();
?>
<html>
<head>
 <title>Cargo Book || Portex</title>
 <link href="./style.css" type="text/css" rel="stylesheet">
 <link href="./fstyle.css" type="text/css" rel="stylesheet">
 <style>
 select{
  width: 40%;
  padding: 12px 20px;
  margin: 20px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
  overflow: hidden;
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
<body style="background-color:powderblue;">
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
<div class="nav">
<ul>
<li><a href="./vessellog.php"><button type="button">Vessels</button></a></li>
<li><a href="./cargolog.php"><button type="button">Cargo</button></a></li>
<li><button type="button">Book</button></li>
<li class="Login"><a href="logout.php"><button type="button" align="right">Logout</button></a></li></br>
</ul>
</div>
</header>
<form align="center" action="cupdate.php" method="POST">
Cargo ID: <?php
include('conn.php');
$sql = "SELECT cargo_id, items from cargo where user_id = '".$_SESSION['userid']."'";
$result = mysqli_query($conn,$sql);
echo "<select name='c_id'>";
while ($row = mysqli_fetch_array($result)) {
    echo "<option value='" . $row['cargo_id'] ."'>" . $row['cargo_id'] ."  - ". $row['items'] ."</option>";
}
echo "</select>";
?>
<br>

Vesssel ID, Name and Destination: <?php
include('conn.php');
$sql = "SELECT v_id, vessel_name, arrival_port from vessel";
$result = mysqli_query($conn,$sql);
echo "<select name='v_id'>";
while ($row = mysqli_fetch_array($result)) {
    echo "<option value='" . $row['v_id'] ."'>".$row['v_id']." - ".$row['vessel_name']." - ".$row['arrival_port']." </option>";
}
echo "</select>";
?><br>
<button type="submit" />Update</button>
</form>
</body>
</html>