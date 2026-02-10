<?php
include"conn.php";
$temp = "upload/";
if (!file_exists($temp))
    mkdir($temp);
  
$nama_file       = $_POST['nama_file'];
$nim       			= $_POST['nim'];
$nomor_pendaftaran  = $_POST['nomor_pendaftaran'];
$tanggal_wisuda     = $_POST['tanggal_wisuda'];
$foto_ori     = $_POST['foto_ori'];

$fileupload      = $_FILES['fileupload']['tmp_name'];
$ImageName       = $_FILES['fileupload']['name'];
$ImageType       = $_FILES['fileupload']['type'];
  
if (!empty($fileupload)){
    $ImageExt       = substr($ImageName, strrpos($ImageName, '.'));
    $ImageExt       = str_replace('.','',$ImageExt); // Extension
    $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
    $NewImageName   = str_replace(' ', '', $nama_file.'.'.$ImageExt);
  
    move_uploaded_file($_FILES["fileupload"]["tmp_name"], $temp.$nomor_pendaftaran."-".$NewImageName); // Menyimpan file
	
	##update
	$sql = "UPDATE m_wisuda SET foto = '".$nomor_pendaftaran."-".$NewImageName."' 
			where nim='".$nim."' 
			AND nomor_pendaftaran='".$nomor_pendaftaran."' 
			AND tanggal_wisuda='".$tanggal_wisuda."';";
	$result=mysqli_query($con,$sql);
	if ($result){
		unlink($temp.$foto_ori);
	}else{
		echo "gagal upload foto";
	}
	mysql_close();
	##end
	
	/*
	#koneksi ftp 
	$remote_dir 	= '/nfs/pmai/kerjasama/';
	$dst_file 		= $remote_dir.$nomor_pendaftaran."-".$NewImageName;
	$src_file		= $temp.$nomor_pendaftaran."-".$NewImageName;
	$ftp_server 	= '192.168.0.24';
	$ftp_username 	= 'cecep';
	$ftp_userpass 	= 'GPxgLJXxR4nFJ7cA';
	$ftpcon 		= ftp_connect($ftp_server,2120) or die("Could not connect to $ftp_server");
	$ftplogin 		= ftp_login($ftpcon, $ftp_username, $ftp_userpass);
	set_time_limit(0);
	if (ftp_put($ftpcon, $dst_file, $src_file, FTP_BINARY)){
		#berhasil
		chmod($src_file, 0777);
		ftp_delete($ftpcon, $remote_dir.$foto_ori);
		ftp_close($ftpcon);
		// unlink($src_file);		
	}else{
		#gagal
		ftp_close($ftpcon);
		chmod($src_file, 0777);
		unlink($src_file);
		$NewImageName = ' gagal diupload';
	}
	#end
	*/
    echo $nomor_pendaftaran."-".$NewImageName;
}else{
	echo "Data Gagal Diupload";
}
?>