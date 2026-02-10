<?php
$temp = "upload/";
if (!file_exists($temp))
    mkdir($temp);
  
$nama_file       = $_POST['nama_file'];
$fileupload      = $_FILES['fileupload']['tmp_name'];
$ImageName       = $_FILES['fileupload']['name'];
$ImageType       = $_FILES['fileupload']['type'];
  
if (!empty($fileupload)){
    $ImageExt       = substr($ImageName, strrpos($ImageName, '.'));
    $ImageExt       = str_replace('.','',$ImageExt); // Extension
    $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
    $NewImageName   = str_replace(' ', '', $nama_file.'.'.$ImageExt);
  
    move_uploaded_file($_FILES["fileupload"]["tmp_name"], $temp.$NewImageName); // Menyimpan file
	
	/*
	#koneksi ftp 
	$remote_dir 	= '/nfs/pmai/kerjasama/';
	$dst_file 		= $remote_dir.$NewImageName;
	$src_file		= $temp.$NewImageName;
	$ftp_server 	= '192.168.0.24';
	$ftp_username 	= 'cecep';
	$ftp_userpass 	= 'GPxgLJXxR4nFJ7cA';
	$ftpcon 		= ftp_connect($ftp_server,2120) or die("Could not connect to $ftp_server");
	$ftplogin 		= ftp_login($ftpcon, $ftp_username, $ftp_userpass);
	set_time_limit(0);
	if (ftp_put($ftpcon, $dst_file, $src_file, FTP_BINARY)){
		#berhasil
		chmod($src_file, 0777);
		ftp_close($ftpcon);		
	}else{
		#gagal
		ftp_close($ftpcon);
		chmod($src_file, 0777);
		unlink($src_file);
		$NewImageName = ' gagal diupload';
	}
	#end
	*/
	
    echo $NewImageName;
}else{
	echo "Data Gagal Diupload";
}
?>