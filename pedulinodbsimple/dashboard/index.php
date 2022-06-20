<?php 
session_start();
if(!isset($_SESSION['user_nama'])){
	header("location:../login/index.php");
} 
?><!DOCTYPE html>
<html lang="en">
	<head>
		<title>Dashboard - Index</title>
	</head>
	<body>
		<h1>Dashboard</h1>
		<hr/>
		<a href="index.php">Home</a> | 
		<a href="catatan.php">Catatan</a> | 
		<a href="isi.php">Input Data</a> | 
		<a href="../login/logout.php">Logout</a>
		<hr/>
		<h3>Selamat datang <?php echo ucwords(strtolower($_SESSION['user_nama'])); ?></h3>	
	</body>
</html>