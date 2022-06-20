<?php 
session_start();
if(isset($_SESSION['user_nama'])){
	header("location:../dashboard/index.php");
} 
?><!DOCTYPE html>
<html lang="en">
	<head>
		<title>Login - Index</title>
	</head>
	<body>
			<h1>Masuk Aplikasi Peduli Diri</h1>
			<?php
			if(isset($_GET['err'])){
				echo $_GET['err'];
			}
			?>
				<form action="<?php echo base_url('login/cek') ?>" method="post">		
				<div class="form-group">
					<label for="user_nik">NIK</label>
					<input type="text" name="user_nik" class="form-control" id="user_nik" placeholder="Masukkan NIK">
				</div>
				
				<div class="form-group">
					<label for="user_nama">Nama Lengkap</label>
					<input type="text" class="form-control" id="user_nama" name="user_nama" placeholder="Masukkan Nama Lengkap">
				</div>

				<button type="submit" class="btn btn-primary">Submit</button>
			</form>

			<a href="register.php">Saya pengguna baru</a>
			

	</body>
</html>