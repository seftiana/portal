<?php
   // Load Process base Class   
   require_once $cfg->GetValue('app_proc') . 'process_base.class.php';
   require_once $cfg->GetValue('app_data') . 'database_connected.class.php';
   
   // Load Module display Class  
   require_once $cfg->GetValue('app_module') . 'wisuda/display/process_wisuda.class.php';
   require_once $cfg->GetValue('app_module') . 'wisuda/business/user.class.php';
   
   require_once $cfg->GetValue('app_service') . 'client/base_client.service.class.php';
   require_once $cfg->GetValue('app_module') . 'wisuda/communication/user_client.service.class.php';
   require_once 'function.php';
   
   $ThisPageAccessRight = "ADMINISTRASI | ADMINUNIT | MAHASISWA | DOSEN | ORTU";
   $security = new Security($cfg);
   $sia = $security->mUserIdentity->GetProperty("ServerServiceAddress");

	if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
		$doact = "";
		if(isset($_POST["doact"]))
			$doact = $_POST["doact"];
		else if (isset($_GET["doact"]))
			$doact = $cfg->Dec($_GET["doact"]);
      
 
        $app = new ProcessWisuda($cfg,$sia);
        switch($doact){
            case "edit_wisuda":
				if (isset($_POST["simpan"])){
					unset($_POST["simpan"]);
					unset($_POST["doact"]);
					
					// echo"<pre>";print_r($_POST);echo"</pre>";die;
					
					if(in_array(null,$_POST['mhs']) || in_array('', array_map('trim',$_POST['mhs']))) {
						$err = $app->ValidateFormValue($_POST);
						header('location: '. $cfg->GetURL('wisuda', 'wisuda', 'edit') . "&err=". $cfg->Enc('Gagal melakukan pendaftaran wisuda, isian tanda bintang tidak boleh ada data yang kosong.'));
						die;
					}
					
					$_POST['mhs']['mhs_pekerjaan_mahasiswa']= $_POST['mhs_pekerjaan_mahasiswa'];
					$_POST['mhs']['mhs_nama_instansi_mahasiswa']= $_POST['mhs_nama_instansi_mahasiswa'];
					$_POST['mhs']['mhs_alamat_instansi']= $_POST['mhs_alamat_instansi'];
					$_POST['mhs']['mhs_nama_ayah']= $_POST['mhs_nama_ayah'];
					$_POST['mhs']['setuju']= $_POST['setuju'];
					$_POST['mhs']['nama_file']= $_POST['nama_file'];
					
					$_POST['mhs']['mhs_ipk']= $_POST['mhs_ipk'];
					$_POST['mhs']['mhs_total_sks']= $_POST['mhs_total_sks'];
				  
					$serviceAkd = new UserClientService($security->mUserIdentity->GetProperty("ServerServiceAddress"), false, $security->mUserIdentity->GetProperty("User"));
				  
					$arrMhs = $_POST['mhs'];
				  
					$update = $serviceAkd->DoUpdateWisudaMhs($security->mUserIdentity->GetProperty("User"),$arrMhs);
					
					if($update=='oke'){
						#send email
						$tgl_w = explode('-',$_POST['mhs']['tgl_wisuda']);
						$email = $_POST['mhs']['mhs_email'];
						$subject = GetSubject($_POST['mhs']['mhs_nama']);
						$content = GetContent($_POST['mhs']['nomor_pendaftaran'],$_POST['mhs']['mhs_nim'],$_POST['mhs']['mhs_nama'],$tgl_w[2].'-'.$tgl_w[1].'-'.$tgl_w[0]);
						$send = SendMail($email,$subject,$content);
						##email
						header('location: '. $cfg->GetURL('wisuda', 'daftar', 'view'));
					}else{
						header('location: '. $cfg->GetURL('wisuda', 'wisuda', 'edit') . "&err=". $cfg->Enc('Gagal mengubah data'));
					}
				}else {
					header('location: '. $cfg->GetURL('wisuda', 'daftar', 'view'));
				}
				die;
			  
			case "simpan_wisuda":
				
				if (isset($_POST["simpan"])){
					unset($_POST["simpan"]);
					unset($_POST["doact"]);
					
					// echo"<pre>";print_r($_POST);echo"</pre>";die;
					
					if(in_array(null,$_POST['mhs']) || in_array('', array_map('trim',$_POST['mhs']))) {
						$err = $app->ValidateFormValue($_POST);
						header('location: '. $cfg->GetURL('wisuda', 'wisuda', 'add') . "&err=". $cfg->Enc('Gagal melakukan pendaftaran wisuda, isian tanda bintang tidak boleh ada data yang kosong.'));
						die;
					}
					
					$_POST['mhs']['mhs_pekerjaan_mahasiswa']= $_POST['mhs_pekerjaan_mahasiswa'];
					$_POST['mhs']['mhs_nama_instansi_mahasiswa']= $_POST['mhs_nama_instansi_mahasiswa'];
					$_POST['mhs']['mhs_alamat_instansi']= $_POST['mhs_alamat_instansi'];
					$_POST['mhs']['mhs_nama_ibu']= $_POST['mhs_nama_ibu'];
					$_POST['mhs']['mhs_nama_ayah']= $_POST['mhs_nama_ayah'];
					$_POST['mhs']['setuju']= $_POST['setuju'];
					$_POST['mhs']['nama_file']= $_POST['nama_file'];
					
					$_POST['mhs']['mhs_ipk']= $_POST['mhs_ipk'];
					$_POST['mhs']['mhs_total_sks']= $_POST['mhs_total_sks'];
					
					$serviceAkd = new UserClientService($security->mUserIdentity->GetProperty("ServerServiceAddress"), false, $security->mUserIdentity->GetProperty("User"));
				  
					$arrMhs = $_POST['mhs'];
				  
					$insertMhs = $serviceAkd->DoInsertWisudaMhs($security->mUserIdentity->GetProperty("User"),$arrMhs);
		
					if($insertMhs['true']=='oke'){
						
						#send email
						$tgl_w = explode('-',$_POST['mhs']['tgl_wisuda']);
						$email = $_POST['mhs']['mhs_email'];
						$subject = GetSubject($_POST['mhs']['mhs_nama']);
						$content = GetContent($insertMhs['nomorWisuda'],$_POST['mhs']['mhs_nim'],$_POST['mhs']['mhs_nama'],$tgl_w[2].'-'.$tgl_w[1].'-'.$tgl_w[0]);
						$send = SendMail($email,$subject,$content);
						##email
						
						$temp =  dirname(__DIR__)."/wisuda/upload/";
						rename($temp.$_POST['nama_file'],$temp.$insertMhs['nomorWisuda']."-".$_POST['nama_file']);
						
						/*
						#koneksi ftp 
						$remote_dir 	= '/nfs/pmai/kerjasama/';
						$file_old 		= $remote_dir.$_POST['nama_file'];
						$file_new		= $remote_dir.$insertMhs['nomorWisuda']."-".$_POST['nama_file'];
						$ftp_server 	= '192.168.0.24';
						$ftp_username 	= 'cecep';
						$ftp_userpass 	= 'GPxgLJXxR4nFJ7cA';
						$ftpcon 		= ftp_connect($ftp_server,2120) or die("Could not connect to $ftp_server");
						$ftplogin 		= ftp_login($ftpcon, $ftp_username, $ftp_userpass);
						set_time_limit(0);
						ftp_rename($ftpcon, $file_old, $file_new);
						ftp_close($ftpcon);
						##end
						*/
						
						header('location: '. $cfg->GetURL('wisuda', 'daftar', 'view'));
					}else {
						header('location: '. $cfg->GetURL('wisuda', 'wisuda', 'add') . "&err=". $cfg->Enc('Gagal menambah data ada double data nim, silahkan menghubungi bagian akademik'));
					}
				} else {
					header('location: '. $cfg->GetURL('wisuda', 'daftar', 'view'));
				}
				die;
			
			case "tiket_ambil":
				if (isset($_POST["btnTiket"])){
					unset($_POST["btnTiket"]);
					unset($_POST["doact"]);

					$_POST['mhs']['nim']= $_POST['nim_mhs'];
					$_POST['mhs']['tgl_wisuda']= $_POST['tanggal_w'];
					$_POST['mhs']['no_wisuda']= $_POST['no_wisuda'];
				  
					$serviceAkd = new UserClientService($security->mUserIdentity->GetProperty("ServerServiceAddress"), false, $security->mUserIdentity->GetProperty("User"));
				  
					$arrMhs = $_POST['mhs'];
				  
					$update = $serviceAkd->DoUpdateWisudaTiketAmbil($security->mUserIdentity->GetProperty("User"),$arrMhs);
					// echo"<pre>";print_r($update);echo"</pre>";die;
					if($update['true']=='oke'){
						#send email
						$tgl_w = explode('-',$_POST['mhs']['tgl_wisuda']);
						$email = $_POST['email_mhs'];
						$subject = GetSubjectTiket($_POST['nama_mhs']);
						$content = GetContentTiket($_POST['mhs']['no_wisuda'],$update['nomorTiket'],$_POST['mhs']['nim'],$_POST['nama_mhs'],$tgl_w[2].'-'.$tgl_w[1].'-'.$tgl_w[0]);
						$send = SendMail($email,$subject,$content);
						##email
						header('location: '. $cfg->GetURL('wisuda', 'daftar', 'view'));
					}else{
						header('location: '. $cfg->GetURL('wisuda', 'wisuda', 'edit') . "&err=". $cfg->Enc('Gagal mengubah data'));
					}
				}else {
					header('location: '. $cfg->GetURL('wisuda', 'daftar', 'view'));
				}
				die;
				
			case "tiket_ambil_tutup":
				if (isset($_POST["btnTiket"])){
					unset($_POST["btnTiket"]);
					unset($_POST["doact"]);

					$_POST['mhs']['nim']= $_POST['nim_mhs'];
					$_POST['mhs']['tgl_wisuda']= $_POST['tanggal_w'];
					$_POST['mhs']['no_wisuda']= $_POST['no_wisuda'];
				  
					$serviceAkd = new UserClientService($security->mUserIdentity->GetProperty("ServerServiceAddress"), false, $security->mUserIdentity->GetProperty("User"));
				  
					$arrMhs = $_POST['mhs'];
				  
					$update = $serviceAkd->DoUpdateWisudaTiketAmbil($security->mUserIdentity->GetProperty("User"),$arrMhs);
					// echo"<pre>";print_r($update);echo"</pre>";die;
					if($update['true']=='oke'){
						#send email
						$tgl_w = explode('-',$_POST['mhs']['tgl_wisuda']);
						$email = $_POST['email_mhs'];
						$subject = GetSubjectTiket($_POST['nama_mhs']);
						$content = GetContentTiket($_POST['mhs']['no_wisuda'],$update['nomorTiket'],$_POST['mhs']['nim'],$_POST['nama_mhs'],$tgl_w[2].'-'.$tgl_w[1].'-'.$tgl_w[0]);
						$send = SendMail($email,$subject,$content);
						##email
						header('location: '. $cfg->GetURL('wisuda', 'tutup', 'view'));
					}else{
						##error
						echo "<script>alert('Error create tiket');</script>";
						header('location: '. $cfg->GetURL('wisuda', 'tutup', 'view'));
					}
				}else {
					header('location: '. $cfg->GetURL('wisuda', 'tutup', 'view'));
				}
				die;
               
            default :
				if(isset($_POST["btnTambah"])) {
					header("Location: ". $cfg->GetURL('user', 'user', 'add')) ;
				} else {
					header("Location: ". $cfg->GetURL('user', 'user', 'view') . "&cari=" . $cfg->Enc($_POST["cari"]));
				}
				break;
        }
	}else{
      $security->DenyPageAccess();
	}
   
	// ------ start function ------ //
   
	function AgreementProcess() {}
	   
	function AddProcess() {}
	   
	function UpdateProcess() {}
	   
	function DeleteProcess() {}
   // ------ end function ------ //   
?>