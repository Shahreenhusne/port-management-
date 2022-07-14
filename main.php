<html>
<head>
 <title>Home || Portex</title>
 <link href="./style.css" type="text/css" rel="stylesheet">
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
<body>
<header>
<div class="head1">
<div class="column1"><img src="./Logo.png"></div>
<div class="column2"><h1>Welcome To Portex</h1></div>
<?php
session_start();
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
<li><a href="./cargolog.php"><button type="button">Cargo</button></a></li>
<li><button type="button">Book</button></li>
<li class="Login"><a href="logout.php"><button type="button" align="right">Logout</button></a></li></br>
</ul>
</header>

</body>
</html>