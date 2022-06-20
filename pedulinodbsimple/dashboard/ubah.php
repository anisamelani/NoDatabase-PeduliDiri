<!DOCTYPE html>
<html lang="en">
	<head>
		<link
		rel="stylesheet"
		href="<?php echo base_url('assets/libraries/bootstrap/css/bootstrap.css'); ?>"
    />
				
		<link href="<?php echo base_url(); ?>assets/styles/dashboard.css" rel="stylesheet">
		
		<link href="<?php echo base_url(); ?>assets/styles/simple-sidebar.css" rel="stylesheet">
	
	</head>
	<body>
		
		<?php $this->load->view('navbar'); ?>
		
		<?php $this->load->view('sidebar'); ?>
		
		<div class="container-fluid">			

			<h1>Ubah Catatan Perjalanan</h1>		
			<hr/>

			<form action="<?php echo base_url('dashboard/isi_ubah'); ?>" 
			method="post">
			
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
			
		</div>
		
		<?php $this->load->view('footer'); ?>
	
	</body>
</html>