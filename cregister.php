<?php
session_start();
?>
<html>
<head>
 <title>Cargo Register || Portex</title>
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
<li><a href="./cbook.php"><button type="button">Book</button></a></li>
<li class="Login"><a href="logout.php"><button type="button" align="right">Logout</button></a></li></br>
</ul>
</div>
</header>
<form align="center" action="cinsert.php" method="POST">
Items: <select class="dropdown" type="text" name="items">
  <option value="Dry Fruit">Dry Fruit</option>
  <option value="Fruit">Fruit</option>
  <option value="Canned Food(Fish/Meat)">Canned Food(Fish/Meat)</option>
  <option value="Chemical">Chemical</option>
  <option value="Machineries">Machineries</option>
  <option value="Households">Households</option>
  <option value="Sports">Sports</option>
</select><br>
Size (Ft): <select class="dropdown" type="number" name="size">
  <option value="20">20</option>
  <option value="40">40</option>
  </select><br>
Weight (Kg): <input type="number" name="weight"><br>
<button type="submit" />Register</button>
</form>
</body>
</html>