<?php
session_start();
if(!isset($_SESSION['user_nama'])){
	header("location:../login/index.php");
} 

if( isset( $_POST['catatan_tanggal']) ){
	$path = '../data/catatan.csv';
	
	$data['catatan_id'] = $_POST['catatan_id'];
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
		$file_catatan = fopen($path, 'r');			
		$cnt = 0;
		$datanew = array();
		if($file_catatan !== FALSE){					
			while(($datacsv = fgetcsv($file_catatan, 100, ';')) !== FALSE){	
				if( $datacsv[0] == $data['catatan_id'] ){
					$datanew[] = $data;
				} else {
					$datanew[] = $datacsv;
				}
			}								 
		}			
		fclose($file_catatan);
					
		$file_catatan = fopen($path, 'w');
		foreach ($datanew as $fields) {
			fputcsv($file_catatan, $fields, ';');
		}
		fclose($file_catatan);			
	}
	header("location:catatan.php");
}