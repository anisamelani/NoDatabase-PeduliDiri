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
		<h1>Catatan Perjalanan</h1>
		<hr/>
		<a href="index.php">Home</a> | 
		<a href="catatan.php">Catatan</a> | 
		<a href="isi.php">Input Data</a> | 
		<a href="../login/logout.php">Logout</a>
		<hr/>
		
		<?php
		$path = '../data/catatan.csv';
		$catatan = array();		
		if( !file_exists($path) ){
			$catatan = array();
		} else {
			$file_catatan = fopen($path, 'r');
			if($file_catatan !== FALSE){					
				while(($datacsv = fgetcsv($file_catatan, 100, ';')) !== FALSE){						
					if( $datacsv[1] == $_SESSION['user_nik'] ){
						$catatan[] = array(
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
		?>
		
		<table border="1" cellspacing="0" cellpadding="5">			
			<tr>
				<th>No</th>
				<th>Tanggal</th>
				<th>Waktu</th>
				<th>Lokasi</th>
				<th>Suhu</th>
				<th colspan="2" class="text-center">Action</th>
			</tr>
			<?php 
			$no = 0;
			foreach($catatan as $ctt){ 
				$no++;
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $ctt['catatan_tanggal']; ?></td>
				<td><?php echo $ctt['catatan_jam']; ?></td>
				<td><?php echo $ctt['catatan_lokasi']; ?></td>
				<td><?php echo $ctt['catatan_suhu']; ?></td>
				<td class="text-center"><a href="isi_ubah.php?catatan_id=<?php echo $ctt['catatan_id']; ?>">ubah</a></td>
				<td class="text-center"><a href="isi_hapus.php?catatan_id=<?php echo $ctt['catatan_id']; ?>" onclick="return confirm('Apakah Anda yakin menghapus item ini?');">hapus</a></td>
			</tr>
			<?php } ?>
		</table>
		
	</body>
</html>