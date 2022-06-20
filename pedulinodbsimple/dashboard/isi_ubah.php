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
		
		<?php
		if( isset($_GET['catatan_id']) ){
			$catatan_id = $_GET['catatan_id'];
			$path = '../data/catatan.csv';
			$catatan = array();		
			if( !file_exists($path) ){
				$catatan = array();
			} else {
				$file_catatan = fopen($path, 'r');
				if($file_catatan !== FALSE){					
					while(($datacsv = fgetcsv($file_catatan, 100, ';')) !== FALSE){						
						if( $datacsv[0] == $catatan_id ){
							$catatan = array(
																'catatan_id' => $datacsv[0],
																'catatan_usernik' => $datacsv[1],
																'catatan_tanggal' => $datacsv[2],
																'catatan_jam' => $datacsv[3],
																'catatan_lokasi' => $datacsv[4],
																'catatan_suhu' => $datacsv[5],
															);
						}
					}								 
				}			
				fclose($file_catatan);		
			}		
			if( sizeof($catatan)==0 ){
				header("location:catatan.php");
			}
		} else {
			header("location:catatan.php");
		}
		?>

		<form action="isi_ubahsimpan.php" method="post">
			
			<div class="form-group">
				<label for="catatan_tanggal">Tanggal Perjalanan</label>
				<input type="text" name="catatan_tanggal" class="form-control" id="catatan_tanggal" placeholder="Masukkan Tanggal" value="<?php echo $catatan['catatan_tanggal']; ?>">
			</div>
			
			<div class="form-group">
				<label for="catatan_jam">Jam Perjalanan</label>
				<input type="text" name="catatan_jam" class="form-control" id="catatan_jam" placeholder="Masukkan Jam" value="<?php echo $catatan['catatan_jam']; ?>">
			</div>
			
			<div class="form-group">
				<label for="catatan_lokasi">Lokasi Perjalanan</label>
				<input type="text" name="catatan_lokasi" class="form-control" id="catatan_lokasi" placeholder="Masukkan Lokasi" value="<?php echo $catatan['catatan_lokasi']; ?>">
			</div>
			
			<div class="form-group">
				<label for="catatan_suhu">Suhu Tubuh</label>
				<input type="text" name="catatan_suhu" class="form-control" id="catatan_suhu" placeholder="Masukkan Suhu Tubuh" value="<?php echo $catatan['catatan_suhu']; ?>">
			</div>
			
			<button type="submit" class="btn btn-primary">Ubah Data Perjalanan</button>
			
			<input type="hidden" name="catatan_id" value="<?php echo $catatan['catatan_id']; ?>">
			<input type="hidden" name="catatan_usernik" value="<?php echo $catatan['catatan_usernik']; ?>">
		
		</form>
	
	</body>
</html>