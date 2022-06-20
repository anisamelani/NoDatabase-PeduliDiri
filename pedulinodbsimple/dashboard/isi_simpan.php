<?php
session_start();
if(!isset($_SESSION['user_nama'])){
	header("location:../login/index.php");
} 

if( isset( $_POST['catatan_tanggal']) ){
	$path = '../data/catatan.csv';
	
	$data['catatan_usernik'] = $_SESSION['user_nik'];
	$data['catatan_tanggal'] = $_POST['catatan_tanggal'];
	$data['catatan_jam'] = $_POST['catatan_jam'];
	$data['catatan_lokasi'] = $_POST['catatan_lokasi'];
	$data['catatan_suhu'] = $_POST['catatan_suhu'];
	
	
	setlocale (LC_TIME, "id_ID.utf-8");
	$data['catatan_tanggal'] = date("d M Y", strtotime($data['catatan_tanggal'])); 
	if( $data['catatan_tanggal'] == '01 Jan 1970' ) $data['catatan_tanggal'] = '!Error';
	
	$data['catatan_suhu'] = number_format(str_replace( ',', '.', $data['catatan_suhu'] )*1.0,2,',','.');
	
	$data['catatan_jam'] = str_replace( '.', ':', $data['catatan_jam'] );
	
	if( file_exists($path) ){
		$rows = file($path);
		$last_row = array_pop($rows);
		$datarow = str_getcsv($last_row);
		
		if(isset($datarow[0][0])){
			$last_id = $datarow[0][0];
		} else {
			$last_id = 0;
		}
	} else {
		$last_id = 0;
	}

	$file_catatan = fopen($path, 'a');
	array_unshift($data, ($last_id+1));
	fputcsv($file_catatan, $data, ';');
	fclose($file_catatan);
	header("location:catatan.php");
}