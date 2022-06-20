<?php
session_start();
if( isset( $_POST['user_nik'] )){
	
	$path = '../data/user.csv';
	
	$user_nik = $_POST['user_nik'];
	$user_nama = $_POST['user_nama'];
	
	if( !file_exists($path) ){
		header("location:index.php?err=Database belum siap");
	} else {
		
		$file_user = fopen($path, 'r');

		$found = 0;
		if($file_user !== FALSE){					
			while(($datacsv = fgetcsv($file_user, 100, ';')) !== FALSE){						
				if( $datacsv[0] == $user_nik && $datacsv[1] == $user_nama ){
					$found = 1;
					break;
				}							
			}								 
		}			
		fclose($file_user);
		if( $found == 1 ){
			$_SESSION['user_nama'] = $user_nama;
			$_SESSION['user_nik'] = $user_nik;
			echo $user_nama;
			header("location:../dashboard/index.php");
		} else {
			header("location:index.php?err=Username/Password salah!");
		}
	}
	
}
?>