<?php
session_start();
if( isset( $_POST['user_nik'] )){
	
	$path = '../data/user.csv';

	$data['user_nik'] = $_POST['user_nik'];
	$data['user_nama'] = $_POST['user_nama'];
	$data['user_alamat'] = $_POST['user_alamat'];
					
	$found = 0;
	if( !file_exists($path) ){
		$found = 0;
	} else {
		
		$file_user = fopen($path, 'r');

		$found = 0;
		if($file_user !== FALSE){					
			while(($datacsv = fgetcsv($file_user, 100, ';')) !== FALSE){						
				if( $datacsv[0] == $data['user_nik'] ){
					$found = 1;
					break;
				}							
			}		

			fclose($file_user);
		}			
	}

	if( $found == 1){
		header("location:register.php?err=NIK+sudah+digunakan");
	} else if($found == 0){	
		$file_user = fopen($path, 'a');
		fputcsv($file_user, $data, ';');
		fclose($file_user);
		header("location:index.php?err=Registrasi berhasil! Silahkan login.");
	}
}