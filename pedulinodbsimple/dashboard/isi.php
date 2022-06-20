<?php 
session_start();
if(!isset($_SESSION['user_nama'])){
	header("location:../login/index.php");
} 
?><!DOCTYPE html>
<html lang="en">
	<head>
		<title>Dashboard - Catatan</title>
	</head>
	<body>
		<h1>Input Catatan Perjalanan</h1>
		<hr/>
		<a href="index.php">Home</a> | 
		<a href="catatan.php">Catatan</a> | 
		<a href="isi.php">Input Data</a> | 
		<a href="../login/logout.php">Logout</a>
		<hr/>		

		<form action="isi_simpan.php" method="post">
		
			<div class="form-group">
				<label for="catatan_tanggal">Tanggal Perjalanan</label>
				<input type="text" name="catatan_tanggal" class="form-control" id="catatan_tanggal" placeholder="Masukkan Tanggal">
			</div>
			
			<div class="form-group">
				<label for="catatan_jam">Jam Perjalanan</label>
				<input type="text" name="catatan_jam" class="form-control" id="catatan_jam" placeholder="Masukkan Jam">
			</div>
			
			<div class="form-group">
				<label for="catatan_lokasi">Lokasi Perjalanan</label>
				<input type="text" name="catatan_lokasi" class="form-control" id="catatan_lokasi" placeholder="Masukkan Lokasi">
			</div>
			
			<div class="form-group">
				<label for="catatan_suhu">Suhu Tubuh</label>
				<input type="text" name="catatan_suhu" class="form-control" id="catatan_suhu" placeholder="Masukkan Suhu Tubuh">
			</div>
			
			<button type="submit" class="btn btn-primary">Simpan Perjalanan</button>
		
		</form>
	
	</body>
</html>