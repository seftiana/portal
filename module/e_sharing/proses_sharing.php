<?php



// Load Application Display Class	   
   require_once $cfg->GetValue('app_proc') . 'display_base.class.php';   
   require_once $cfg->GetValue('app_proc') . 'display_base_full.class.php';
   require_once $cfg->GetValue('app_proc') . 'process_base.class.php';
   require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
   require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";
   // Load Data Display Class
   require_once $cfg->GetValue('app_data') . 'database_connected.class.php';

   // Load Module data Class
   require_once $cfg->GetValue('app_module') . 'e_sharing/display/proses.class.php';
   require_once $cfg->GetValue('app_module') . 'e_sharing/communication/sharing.service.class.php';
   require_once $cfg->GetValue('app_module') . 'user/business/user.class.php';
   


$ThisPageAccessRight = "MAHASISWA | DOSEN | ADMINISTRASI | ADMINUNIT";

$security = new Security($cfg);
if (false !== $security->CheckAccessRight($ThisPageAccessRight)) 
{  
	$mId = $security->mUserIdentity->GetProperty("UserReferenceId");
	$prodiId = $security->mUserIdentity->GetProperty("UserProdiId");
	
	$proses = new ProsesSharing($cfg, $security, $mId, $prodiId);
    
   if(isset($_POST['add'])){
      header("Location: " . $cfg->GetURL('e_sharing','sharing','add'));   

      exit;	      
   }

   if(isset($_POST['simpanAktifasi'])){

      if(!empty($_POST['chk'])){
         if ($_POST['isAktifkan'] == 'del'){
            $proses->Delete_file($_POST);
         }else{
            $proses->Update_status($_POST);
         }
      }
      header("Location: " . $cfg->GetURL('e_sharing','sharing','view').'&pos=start');   

      exit;	      
   }
   
    //proses simpan dari form tambah
   if(isset($_POST['AddSimpan'])){
      $fileAdd = date("siHdmy");
      $uploadFile = $fileAdd."".$_FILES['fileUpload']['name'];
      $uploadDir = $cfg->GetValue('file_upload_root')."module/e_sharing/file_upload/";

      if(!empty($_POST['judul'])){
         if($_FILES['fileUpload']['error'] == 0){
            $filenya = fopen($_FILES['fileUpload']['tmp_name'],"r");
            $bytes = fread($filenya,2);
            $ext = strtolower(substr($_FILES['fileUpload']['name'], - 4));
            //echo $bytes.'--'.$ext;exit;

            if($ext == '.zip' and $bytes == 'PK'){
               if($_FILES['fileUpload']['size']<=2097152){
                  if (move_uploaded_file($_FILES['fileUpload']['tmp_name'],$uploadDir . $uploadFile)){
                        $proses->Insert($_POST,$uploadFile);
                        unset($_SESSION['sharing']);
                        $_SESSION['sharing']['error'] = "Data berhasil disimpan. Data Akan tertampil setelah mendapat persetujuan admin.";	
                        $_SESSION['sharing']['errortype'] = "INFO";
                        header("Location: " . $cfg->GetURL('e_sharing','sharing','add'));        
          
                        exit;	
                  }
                  else {
                     $_SESSION['sharing']['judul'] = $_POST['judul'];
                     $_SESSION['sharing']['keterangan'] = $_POST['keterangan'];
                     $_SESSION['sharing']['error'] = "Gagal menyimpan file";
                     $_SESSION['sharing']['errortype'] = "WARNING";
                     header("Location: " . $cfg->GetURL('e_sharing','sharing','add'));        
       
                     exit;	
                  }
               }else{
                  $_SESSION['sharing']['judul'] = $_POST['judul'];
                  $_SESSION['sharing']['keterangan'] = $_POST['keterangan'];
                  $_SESSION['sharing']['error'] = "Ukuran file melebihi batas maksimal 2MB";
                  $_SESSION['sharing']['errortype'] = "WARNING";
                  header("Location: " . $cfg->GetURL('e_sharing','sharing','add'));        
      
                  exit;	            
               }
            }else{

               $_SESSION['sharing']['judul'] = $_POST['judul'];
               $_SESSION['sharing']['keterangan'] = $_POST['keterangan'];
               $_SESSION['sharing']['error'] = "Bukan file zip";
               $_SESSION['sharing']['errortype'] = "WARNING";
               //print('a');
               header("Location: " . $cfg->GetURL('e_sharing','sharing','add'));        
       
               exit;	         
            }
         }else{
            $_SESSION['sharing']['judul'] = $_POST['judul'];
            $_SESSION['sharing']['keterangan'] = $_POST['keterangan'];
            if($_FILES['fileUpload']['error'] == '1'){
               $_SESSION['sharing']['error'] = "Ukuran file melebihi setting server ".ini_get('upload_max_filesize').". Silakan hubungi admin";
            }elseif($_FILES['fileUpload']['error'] == '3'){
               $_SESSION['sharing']['error'] = "File hanya terupload sebagian";
            }elseif($_FILES['fileUpload']['error'] == '4'){
               $_SESSION['sharing']['error'] = "Tidak ada file";
            }elseif($_FILES['fileUpload']['error'] == '6'){
               $_SESSION['sharing']['error'] = "'Temporary Folder' tidak ditemukan. Silakan hubungi admin";
            }
            $_SESSION['sharing']['errortype'] = "WARNING";
            
            header("Location: " . $cfg->GetURL('e_sharing','sharing','add'));   
      
            exit;	      
         }
      }else{
         $_SESSION['sharing']['judul'] = $_POST['judul'];
         $_SESSION['sharing']['keterangan'] = $_POST['keterangan'];
         $_SESSION['sharing']['error'] = "Judul tidak boleh kosong";
         $_SESSION['sharing']['errortype'] = "WARNING";

         header("Location: " . $cfg->GetURL('e_sharing','sharing','add'));   
   
         exit;	       
      }
	
   }
  
	
	header("Location: " . $cfg->GetURL('e_sharing','sharing','view').'&pos=start');        		
	exit;
	
    
}
else
{
    $security->DenyPageAccess();
}


?>
