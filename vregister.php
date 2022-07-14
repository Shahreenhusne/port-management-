<?php
session_start();
?>
<html>
<head>
 <title>Vessel Register || Portex</title>
 <link href="./style.css" type="text/css" rel="stylesheet">
 <link href="./fstyle.css" type="text/css" rel="stylesheet">
 <style>
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
<li><a href="./vbook.php"><button type="button">Book</button></a></li>
<li class="Login"><a href="logout.php"><button type="button" align="right">Logout</button></a></li></br>
</ul>
</div>
</header>
<form align="center" action="vinsert.php" method="POST">
Vessel Name: <input type="text" name="vname" /required><br>
Vessel ID: <input type="text" name="vid" /required><br>
Arrival Port: <select class="dropdown" name="aport">
  <option value="Chottogram">Chottogram</option>
  <option value="London">London</option>
  <option value="Zeddah">Zeddah</option>
  <option value="Ras-Shukhair">Ras-Shukhair</option>
  <option value="Kolkata">Kolkata</option>
  <option value="colombo">Colombo</option>
  <option value="cape-town">Cape Town</option>
</select><br>
Departure Port: <select class="dropdown" name="dport">
  <option value="Chottogram">Chottogram</option>
  <option value="London">London</option>
  <option value="Zeddah">Zeddah</option>
  <option value="Ras-Shukhair">Ras-Shukhair</option>
  <option value="Kolkata">Kolkata</option>
  <option value="colombo">Colombo</option>
  <option value="cape-town">Cape Town</option>
</select><br>
Arrival Time: <input type="date" name="atime">
Departure Time: <input type="date" name="dtime"><br><br>
Capacity in (TEU): <input type="number" name="capacity" min='0' /required><br><br>
Load weight in (TONS): <input type="number" name="weight" min='0' /required><br>
<button type="submit" />Register</button>
</form>
</body>
</html>