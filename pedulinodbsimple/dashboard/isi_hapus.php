<?php
session_start();
if(!isset($_SESSION['user_nama'])){
	header("location:../login/index.php");
} 

if( isset( $_GET['catatan_id']) ){
	$path = '../data/catatan.csv';
	
	$catatan_id = $_GET['catatan_id'];
	if( file_exists($path) ){
		$file_catatan = fopen($path, 'r');			
		$cnt = 0;
		$datanew = array();
		if($file_catatan !== FALSE){					
			while(($datacsv = fgetcsv($file_catatan, 100, ';')) !== FALSE){	
				if( $datacsv[0] != $catatan_id ){
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