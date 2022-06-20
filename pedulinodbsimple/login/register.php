<?php 
session_start();
if(isset($_SESSION['user_nama'])){
	header("location:../dashboard/index.php");
} 
?><!DOCTYPE html>
<html lang="en">
	<head>
		<title>Login - Register</title>
	</head>
	<body>

		<div class="container">
			<h1>Halaman Register</h1>
			<?php
			if(isset($_GET['err'])){
				echo $_GET['err'];
			}
			?>
			<form action="register_simpan.php" method="post">
			
				<div class="form-group">
					<label for="user_nik">NIK</label>
					<input type="text" name="user_nik" class="form-control" id="user_nik" placeholder="Masukkan NIK">
				</div>
				
				<div class="form-group">
					<label for="user_nama">Nama Lengkap</label>
					<input type="text" name="user_nama" class="form-control" id="user_nama" placeholder="Masukkan Nama Lengkap">
				</div>
				
				<div class="form-group">
					<label for="user_alamat">Alamat Lengkap</label>
					<input type="text" name="user_alamat" class="form-control" id="user_alamat" placeholder="Masukkan Alamat Lengkap">
				</div>
				
				<button type="submit" class="btn btn-primary">Simpan</button>
				
			</form>
			
		</div>
	</body>
</html>