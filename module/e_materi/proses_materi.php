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
   require_once $cfg->GetValue('app_module') . 'e_materi/display/proses_materi.class.php';
   require_once $cfg->GetValue('app_module') . 'e_materi/communication/materi.service.class.php';
   require_once $cfg->GetValue('app_module') . 'user/business/user.class.php';
   


$ThisPageAccessRight = "DOSEN | ELEARNINGADM";

$security = new Security($cfg);
if (false !== $security->CheckAccessRight($ThisPageAccessRight)) 
{  
	$mId = $security->mUserIdentity->GetProperty("UserReferenceId");
	$prodiId = $security->mUserIdentity->GetProperty("UserProdiId");
	
	$proses = new ProsesMateri($cfg, $security, $mId, $prodiId);
    
	
	
    //proses simpan dari form tambah
	if (isset($_POST['addSimpan']))
	{
		//print_r($_POST);
		$fileAdd = date("siHdmy");
		$uploadFile = $fileAdd."".$_FILES['fileUpload']['name'];
		$uploadDir = $cfg->GetValue('file_upload_root')."module/e_materi/file_upload/";
		//print_r($_FILES['fileUpload']);exit;


      if($_FILES['fileUpload']['error'] == 0){
         $filenya = fopen($_FILES['fileUpload']['tmp_name'],"r");
         $bytes = fread($filenya,2);
         $ext = strtolower(substr($_FILES['fileUpload']['name'], - 4));
         //echo $bytes.'--'.$ext;exit;

         if($ext == '.zip' and $bytes == 'PK'){
            if($_FILES['fileUpload']['size']<=2097152){
               if (move_uploaded_file($_FILES['fileUpload']['tmp_name'],$uploadDir . $uploadFile)){
                     $proses->Insert($_POST,$uploadFile);
               }
               else {
                  $_SESSION['materiKelas'] = $_POST['klsId'];
                  $_SESSION['materiJudul'] = $_POST['judul'];
                  $_SESSION['materiDeskripsi'] = $_POST['abstraksi'];
                  $_SESSION['materiStatus'] = $_POST['status'];
                  $_SESSION['materiError'] = 7;
                  header("Location: " . $cfg->GetURL('e_materi','materi_tampil','add')."&err=".$cfg->Enc($_SESSION['materiError']));        
                  //header("Location: add_materi_tampil.php?id=".$_POST['id']."&idSem=".$_POST['hdnSmt']."&klsId".$_POST['klsId']."&view=1&judul=".$_POST['judul']."&desc=".$_POST['abstraksi']."&status=".$_POST['status']."&tujuan=".$_POST['tujuan']."&err=1");    
                  exit;	
               }
            }else{
               $_SESSION['materiKelas'] = $_POST['klsId'];
               $_SESSION['materiJudul'] = $_POST['judul'];
               $_SESSION['materiDeskripsi'] = $_POST['abstraksi'];
               $_SESSION['materiStatus'] = $_POST['status'];
               $_SESSION['materiError'] = 2;
               //print('a');
               header("Location: " . $cfg->GetURL('e_materi','materi_tampil','add')."&err=".$cfg->Enc($_SESSION['materiError']));        
               //header("Location: add_materi_tampil.php?id=".$_POST['id']."&idSem=".$_POST['hdnSmt']."&klsId".$_POST['klsId']."&view=1&judul=".$_POST['judul']."&desc=".$_POST['abstraksi']."&status=".$_POST['status']."&tujuan=".$_POST['tujuan']."&err=1");    
               exit;	            
            }
         }else{

            $_SESSION['materiKelas'] = $_POST['klsId'];
            $_SESSION['materiJudul'] = $_POST['judul'];
            $_SESSION['materiDeskripsi'] = $_POST['abstraksi'];
            $_SESSION['materiStatus'] = $_POST['status'];
            $_SESSION['materiError'] = 9;
            //print('a');
            header("Location: " . $cfg->GetURL('e_materi','materi_tampil','add')."&err=".$cfg->Enc($_SESSION['materiError']));        
            //header("Location: add_materi_tampil.php?id=".$_POST['id']."&idSem=".$_POST['hdnSmt']."&klsId".$_POST['klsId']."&view=1&judul=".$_POST['judul']."&desc=".$_POST['abstraksi']."&status=".$_POST['status']."&tujuan=".$_POST['tujuan']."&err=1");    
            exit;	         
         }
      }elseif($_FILES['fileUpload']['error'] == 4){
         $proses->Insert($_POST,"");
      }else{
         //echo $_FILES['fileUpload']['error'];exit;
         $_SESSION['materiKelas'] = $_POST['klsId'];
         $_SESSION['materiJudul'] = $_POST['judul'];
         $_SESSION['materiDeskripsi'] = $_POST['abstraksi'];
         $_SESSION['materiStatus'] = $_POST['status'];
         $_SESSION['materiError'] = $_FILES['fileUpload']['error'];
         header("Location: " . $cfg->GetURL('e_materi','materi_tampil','add')."&err=".$cfg->Enc($_SESSION['materiError']));        
         //header("Location: add_materi_tampil.php?id=".$_POST['id']."&idSem=".$_POST['hdnSmt']."&klsId".$_POST['klsId']."&view=1&judul=".$_POST['judul']."&desc=".$_POST['abstraksi']."&status=".$_POST['status']."&tujuan=".$_POST['tujuan']."&err=1");    
         exit;	      
      }
       
	}
	//reset dari form tambah
	if (isset($_POST['addReset']))
	{
		header("Location: " . $cfg->GetURL('e_materi','materi_tampil','add'));        
        exit;
	}

	if (isset($_POST['batal']))
	{
		$_SESSION['materiKelas'] = $_POST['klsId'];
		$_SESSION['materiJudul'] = $_POST['judul'];
      unset($_SESSION['materiJudul']);
      header("Location: " . $cfg->GetURL('e_materi','materi','view'));        
      exit;
	}
	//reset dari form tambah
	if (isset($_POST['updateReset']))
	{
		header("Location: " . $cfg->GetURL('e_materi','materi_tampil','update'). "&id=".$cfg->Enc($_POST['id']));        
        exit;
	}
	//simpan dari update
	if (isset($_POST['updateSimpan'])) 
	{
		$fileAdd = date("siHdmy");
		$uploadFile = $fileAdd."".$_FILES['fileUpload']['name'];
		$uploadDir = $cfg->GetValue('file_upload_root')."module/e_materi/file_upload/";
		//jika ada file yg diupload
		
      if($_FILES['fileUpload']['error'] == 0){
         $filenya = fopen($_FILES['fileUpload']['tmp_name'],"r");
         $bytes = fread($filenya,2);
         $ext = strtolower(substr($_FILES['fileUpload']['name'], - 4));
         //echo $bytes.'--'.$ext;exit;

         if($ext == '.zip' and $bytes == 'PK'){
            if($_FILES['fileUpload']['size']<=2097152){
               if (move_uploaded_file($_FILES['fileUpload']['tmp_name'],$uploadDir . $uploadFile)){
      					$proses->Update($_POST,$uploadFile);
      					if(file_exists($uploadDir . $_POST['fileLama'])) unlink($uploadDir . $_POST['fileLama']);	
               }
               else {
                  $_SESSION['materiKelas'] = $_POST['klsId'];
                  $_SESSION['materiJudul'] = $_POST['judul'];
                  $_SESSION['materiDeskripsi'] = $_POST['abstraksi'];
                  $_SESSION['materiStatus'] = $_POST['status'];
                  $_SESSION['materiError'] = 7;
                  header("Location: " . $cfg->GetURL('e_materi','materi_tampil','update'). "&id=".$_POST['id']."&err=".$cfg->Enc($_SESSION['materiError']));        
                  //header("Location: add_materi_tampil.php?id=".$_POST['id']."&idSem=".$_POST['hdnSmt']."&klsId".$_POST['klsId']."&view=1&judul=".$_POST['judul']."&desc=".$_POST['abstraksi']."&status=".$_POST['status']."&tujuan=".$_POST['tujuan']."&err=1");    
                  exit;	
               }
            }else{
               $_SESSION['materiKelas'] = $_POST['klsId'];
               $_SESSION['materiJudul'] = $_POST['judul'];
               $_SESSION['materiDeskripsi'] = $_POST['abstraksi'];
               $_SESSION['materiStatus'] = $_POST['status'];
               $_SESSION['materiError'] = 2;
               //print('a');
               header("Location: " . $cfg->GetURL('e_materi','materi_tampil','update'). "&id=".$_POST['id']."&err=".$cfg->Enc($_SESSION['materiError']));        
               //header("Location: add_materi_tampil.php?id=".$_POST['id']."&idSem=".$_POST['hdnSmt']."&klsId".$_POST['klsId']."&view=1&judul=".$_POST['judul']."&desc=".$_POST['abstraksi']."&status=".$_POST['status']."&tujuan=".$_POST['tujuan']."&err=1");    
               exit;	            
            }
         }else{

            $_SESSION['materiKelas'] = $_POST['klsId'];
            $_SESSION['materiJudul'] = $_POST['judul'];
            $_SESSION['materiDeskripsi'] = $_POST['abstraksi'];
            $_SESSION['materiStatus'] = $_POST['status'];
            $_SESSION['materiError'] = 9;
            //print('a');
            header("Location: " . $cfg->GetURL('e_materi','materi_tampil','update'). "&id=".$_POST['id']."&err=".$cfg->Enc($_SESSION['materiError']));        
            //header("Location: add_materi_tampil.php?id=".$_POST['id']."&idSem=".$_POST['hdnSmt']."&klsId".$_POST['klsId']."&view=1&judul=".$_POST['judul']."&desc=".$_POST['abstraksi']."&status=".$_POST['status']."&tujuan=".$_POST['tujuan']."&err=1");    
            exit;	         
         }
      }elseif($_FILES['fileUpload']['error'] == 4){
         $proses->Update($_POST,"");
         //if(file_exists($uploadDir . $_POST['fileLama'])) unlink($uploadDir . $_POST['fileLama']);
      }else{
         //echo $_FILES['fileUpload']['error'];exit;
         $_SESSION['materiKelas'] = $_POST['klsId'];
         $_SESSION['materiJudul'] = $_POST['judul'];
         $_SESSION['materiDeskripsi'] = $_POST['abstraksi'];
         $_SESSION['materiStatus'] = $_POST['status'];
         $_SESSION['materiError'] = $_FILES['fileUpload']['error'];
         header("Location: " . $cfg->GetURL('e_materi','materi_tampil','update'). "&id=".$_POST['id']."&err=".$cfg->Enc($_SESSION['materiError']));        
         //header("Location: add_materi_tampil.php?id=".$_POST['id']."&idSem=".$_POST['hdnSmt']."&klsId".$_POST['klsId']."&view=1&judul=".$_POST['judul']."&desc=".$_POST['abstraksi']."&status=".$_POST['status']."&tujuan=".$_POST['tujuan']."&err=1");    
         exit;	      
      }
      
	}
	//print_r($_POST);exit;
	
	unset($_SESSION['materiJudul']);
	$_SESSION['materiKelas'] = $_POST['klsId'];
	header("Location: " . $cfg->GetURL('e_materi','materi','view'));        	
	//header("Location: tampil.php?idSem=".$_POST['hdnSmt']."&klsId=".$_POST['klsId']); 
	exit;
	
    
}
else
{
    $security->DenyPageAccess();
}


?>
