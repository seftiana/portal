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
require_once $cfg->GetValue('app_module') . 'e_tugas/display/proses_tugas.class.php';
require_once $cfg->GetValue('app_module') . 'e_tugas/communication/tugas.service.class.php';
require_once $cfg->GetValue('app_module') . 'user/business/user.class.php';


$ThisPageAccessRight = "MAHASISWA | DOSEN | ELEARNINGADM";

$security = new Security($cfg);

if (false !== $security->CheckAccessRight($ThisPageAccessRight)) 
{   
	if($security->mUserIdentity->GetProperty("Role") == 7)
	{
		$mhsNiu = $_SESSION['tugas']['unit'];
		$prodiId = "";
	}
	else
	{
		$mhsNiu = $security->mUserIdentity->GetProperty("User");
		$prodiId = $security->mUserIdentity->GetProperty("UserProdiId");
	}

	$proses = new ProsesTugas($cfg, $security, $mhsNiu, $prodiId);
    
	
	
    //proses simpan dari form tambah
	if ($_POST['addSimpan'] == "Simpan")
	{

		$_SESSION['tugas']['kelas'] = $_POST['klsId'];
		$fileAdd = date("siHdmy");
		$uploadFile = $fileAdd."".$_FILES['fileUpload']['name'];
		$uploadDir = $cfg->GetValue('file_upload_root')."module/e_tugas/file_upload/";
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
                  $_SESSION['tugas']['judul'] = $_POST['judul'];
                  $_SESSION['tugas']['abstraksi'] = $_POST['abstraksi'];
                  $_SESSION['tugas']['tujuan'] =$_POST['tujuan'];
                  $_SESSION['tugas']['wktAwal'] = $_POST['thnAwal']."-".$_POST['blnAwal']."-".$_POST['tglAwal']." ".$_POST['jamAwal'].":".$_POST['menitAwal'].":00";
                   $_SESSION['tugas']['wktAkhir'] = $_POST['thnAkhir']."-".$_POST['blnAkhir']."-".$_POST['tglAkhir']." ".$_POST['jamAkhir'].":".$_POST['menitAkhir'].":59";
//                  $_SESSION['tugas']['file'] = $_SESSION['tugas']['File'];
                  $_SESSION['tugas']['err'] = 7;
                  header("Location: " . $cfg->GetURL('e_tugas','tugas_tampil','add')."&err=".$cfg->Enc($_SESSION['tugas']['err']));        	
                  exit;	
               }
            }else{
                  $_SESSION['tugas']['judul'] = $_POST['judul'];
                  $_SESSION['tugas']['abstraksi'] = $_POST['abstraksi'];
                  $_SESSION['tugas']['tujuan'] =$_POST['tujuan'];
                  $_SESSION['tugas']['wktAwal'] = $_POST['thnAwal']."-".$_POST['blnAwal']."-".$_POST['tglAwal']." ".$_POST['jamAwal'].":".$_POST['menitAwal'].":00";
                   $_SESSION['tugas']['wktAkhir'] = $_POST['thnAkhir']."-".$_POST['blnAkhir']."-".$_POST['tglAkhir']." ".$_POST['jamAkhir'].":".$_POST['menitAkhir'].":59";
//                  $_SESSION['tugas']['file'] = $_SESSION['tugas']['File'];
                  $_SESSION['tugas']['err'] = 2;
                  header("Location: " . $cfg->GetURL('e_tugas','tugas_tampil','add')."&err=".$cfg->Enc($_SESSION['tugas']['err']));        	
                  exit;	            
            }
         }else{

                  $_SESSION['tugas']['judul'] = $_POST['judul'];
                  $_SESSION['tugas']['abstraksi'] = $_POST['abstraksi'];
                  $_SESSION['tugas']['tujuan'] =$_POST['tujuan'];
                  $_SESSION['tugas']['wktAwal'] = $_POST['thnAwal']."-".$_POST['blnAwal']."-".$_POST['tglAwal']." ".$_POST['jamAwal'].":".$_POST['menitAwal'].":00";
                   $_SESSION['tugas']['wktAkhir'] = $_POST['thnAkhir']."-".$_POST['blnAkhir']."-".$_POST['tglAkhir']." ".$_POST['jamAkhir'].":".$_POST['menitAkhir'].":59";
//                  $_SESSION['tugas']['file'] = $_SESSION['tugas']['File'];
                  $_SESSION['tugas']['err'] = 9;
                  header("Location: " . $cfg->GetURL('e_tugas','tugas_tampil','add')."&err=".$cfg->Enc($_SESSION['tugas']['err']));        	
                  exit;	         
         }
      }elseif($_FILES['fileUpload']['error'] == 4){
         $proses->Insert($_POST,"");
      }else{
         $_SESSION['tugas']['judul'] = $_POST['judul'];
         $_SESSION['tugas']['abstraksi'] = $_POST['abstraksi'];
         $_SESSION['tugas']['tujuan'] =$_POST['tujuan'];
         $_SESSION['tugas']['wktAwal'] = $_POST['thnAwal']."-".$_POST['blnAwal']."-".$_POST['tglAwal']." ".$_POST['jamAwal'].":".$_POST['menitAwal'].":00";
          $_SESSION['tugas']['wktAkhir'] = $_POST['thnAkhir']."-".$_POST['blnAkhir']."-".$_POST['tglAkhir']." ".$_POST['jamAkhir'].":".$_POST['menitAkhir'].":59";
//                  $_SESSION['tugas']['file'] = $_SESSION['tugas']['File'];
         $_SESSION['tugas']['err'] = $_FILES['fileUpload']['error'];
         header("Location: " . $cfg->GetURL('e_tugas','tugas_tampil','add')."&err=".$cfg->Enc($_SESSION['tugas']['err']));        	
         exit;
    
      }
	}
	//reset dari form tambah
	if ($_POST['addReset'] == "Reset")
	{
		header("Location: " . $cfg->GetURL('e_tugas','tugas_tampil','add'));        	
      exit;
	}

	
	//reset dari form update
	if ($_POST['updateReset'] == "Reset")
	{
		//echo $cfg->GetURL('e_tugas','tugas_tampil','update')."?id=".$cfg->Enc($_POST['id']);exit;
		header("Location: " . $cfg->GetURL('e_tugas','tugas_tampil','update')."&id=".$cfg->Enc($_POST['id']));  
      exit;
	}
	//simpan dari update
	if ($_POST['updateSimpan'] == "Simpan") 
	{
		
		$_SESSION['tugas']['Kelas'] = $_POST['klsId'];
		$fileAdd = date("siHdmy");
		$uploadFile = $fileAdd."".$_FILES['fileUpload']['name'];
		$uploadDir = $cfg->GetValue('docroot')."module/e_tugas/file_upload/";
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
      					if((file_exists($uploadDir . $_POST['fileLama'])) && ($_POST['fileLama'] != ""))
      						unlink($uploadDir . $_POST['fileLama']);
               }
               else {
                  $_SESSION['tugas']['judul'] = $_POST['judul'];
                  $_SESSION['tugas']['abstraksi'] = $_POST['abstraksi'];
                  $_SESSION['tugas']['tujuan'] =$_POST['tujuan'];
                  $_SESSION['tugas']['wktAwal'] = $_POST['thnAwal']."-".$_POST['blnAwal']."-".$_POST['tglAwal']." ".$_POST['jamAwal'].":".$_POST['menitAwal'].":00";
                   $_SESSION['tugas']['wktAkhir'] = $_POST['thnAkhir']."-".$_POST['blnAkhir']."-".$_POST['tglAkhir']." ".$_POST['jamAkhir'].":".$_POST['menitAkhir'].":59";
//                  $_SESSION['tugas']['file'] = $_SESSION['tugas']['File'];
                  $_SESSION['tugas']['err'] = 7;
                  header("Location: " . $cfg->GetURL('e_tugas','tugas_tampil','update')."&err=".$cfg->Enc($_SESSION['tugas']['err'])."&id=".$cfg->Enc($_POST['id']));        	
                  exit;	
               }
            }else{
                  $_SESSION['tugas']['judul'] = $_POST['judul'];
                  $_SESSION['tugas']['abstraksi'] = $_POST['abstraksi'];
                  $_SESSION['tugas']['tujuan'] =$_POST['tujuan'];
                  $_SESSION['tugas']['wktAwal'] = $_POST['thnAwal']."-".$_POST['blnAwal']."-".$_POST['tglAwal']." ".$_POST['jamAwal'].":".$_POST['menitAwal'].":00";
                   $_SESSION['tugas']['wktAkhir'] = $_POST['thnAkhir']."-".$_POST['blnAkhir']."-".$_POST['tglAkhir']." ".$_POST['jamAkhir'].":".$_POST['menitAkhir'].":59";
//                  $_SESSION['tugas']['file'] = $_SESSION['tugas']['File'];
                  $_SESSION['tugas']['err'] = 2;
                  header("Location: " . $cfg->GetURL('e_tugas','tugas_tampil','update')."&err=".$cfg->Enc($_SESSION['tugas']['err'])."&id=".$cfg->Enc($_POST['id']));        	
                  exit;	            
            }
         }else{

                  $_SESSION['tugas']['judul'] = $_POST['judul'];
                  $_SESSION['tugas']['abstraksi'] = $_POST['abstraksi'];
                  $_SESSION['tugas']['tujuan'] =$_POST['tujuan'];
                  $_SESSION['tugas']['wktAwal'] = $_POST['thnAwal']."-".$_POST['blnAwal']."-".$_POST['tglAwal']." ".$_POST['jamAwal'].":".$_POST['menitAwal'].":00";
                   $_SESSION['tugas']['wktAkhir'] = $_POST['thnAkhir']."-".$_POST['blnAkhir']."-".$_POST['tglAkhir']." ".$_POST['jamAkhir'].":".$_POST['menitAkhir'].":59";
//                  $_SESSION['tugas']['file'] = $_SESSION['tugas']['File'];
                  $_SESSION['tugas']['err'] = 9;
                  header("Location: " . $cfg->GetURL('e_tugas','tugas_tampil','update')."&err=".$cfg->Enc($_SESSION['tugas']['err'])."&id=".$cfg->Enc($_POST['id']));        	
                  exit;	         
         }
      }elseif($_FILES['fileUpload']['error'] == 4){
			$proses->Update($_POST,"");
      }else{
         $_SESSION['tugas']['judul'] = $_POST['judul'];
         $_SESSION['tugas']['abstraksi'] = $_POST['abstraksi'];
         $_SESSION['tugas']['tujuan'] =$_POST['tujuan'];
         $_SESSION['tugas']['wktAwal'] = $_POST['thnAwal']."-".$_POST['blnAwal']."-".$_POST['tglAwal']." ".$_POST['jamAwal'].":".$_POST['menitAwal'].":00";
          $_SESSION['tugas']['wktAkhir'] = $_POST['thnAkhir']."-".$_POST['blnAkhir']."-".$_POST['tglAkhir']." ".$_POST['jamAkhir'].":".$_POST['menitAkhir'].":59";
//                  $_SESSION['tugas']['file'] = $_SESSION['tugas']['File'];
         $_SESSION['tugas']['err'] = $_FILES['fileUpload']['error'];
         header("Location: " . $cfg->GetURL('e_tugas','tugas_tampil','update')."&err=".$cfg->Enc($_SESSION['tugas']['err'])."&id=".$cfg->Enc($_POST['id']));        	
         exit;
    
      }

	}
	
	
	//dari form nilai
	//reset
	if ($_POST['nilaiReset'] == "Reset")
	{		
		header("Location: " . $cfg->GetURL('e_tugas','nilai_tugas','view')."&id=".$cfg->Enc($_POST['id']));  
        exit;
	}
	if ($_POST['nilaiSimpan'] == "Simpan")
	{
//		print_r($_POST['nilai']);
		//print_r(array_keys($_POST['nilai']));
		foreach(array_keys($_POST['nilai']) as $row=> $value)
		{
			if($_POST['nilai'][$value] != "")
			{
				//echo $_POST['nilai'][$value]. "-";
				$proses->UpdateNilai($_POST['id'],$value,$_POST['nilai'][$value]);
			}
			
		}
	}
	
	if(isset($_POST['addTugas'])){
      
   }
	
	//****************DARI FORM JENIS TUGAS************
	if(isset($_POST['updateJenis']))
	{
		$proses->UpdateJenisTugas($_POST);
		header("Location: " . $cfg->GetURL('e_tugas','jenis_tugas','view'));        	
		exit;
	}
	
	if(isset($_POST['insertJenis']))
	{
		$proses->InsertJenisTugas($_POST);
		header("Location: " . $cfg->GetURL('e_tugas','jenis_tugas','view'));        	
		exit;
	}
	
	if(isset($_POST['batalJenis']))
	{
		header("Location: " . $cfg->GetURL('e_tugas','jenis_tugas','view'));        	
		exit;
	}
	
	//print_r($_POST);
	
	/********************DARI PROSES JAWABAN MAHASISWA**************************/
	if(isset($_POST['jawabanSimpan']))
	{
		if(isset($_FILES['jawabanUpload']))
		{
			
			$fileAdd = date("siHdmy");
			$uploadFile = $fileAdd."".$_FILES['jawabanUpload']['name'];
			$uploadDir = $cfg->GetValue('file_upload_root')."module/e_tugas/file_upload/";
         if($_FILES['jawabanUpload']['error'] == 0){
            $filenya = fopen($_FILES['jawabanUpload']['tmp_name'],"r");
            $bytes = fread($filenya,2);
            $ext = strtolower(substr($_FILES['jawabanUpload']['name'], - 4));
            //echo $bytes.'--'.$ext;exit;

            if($ext == '.zip' and $bytes == 'PK'){
               if($_FILES['jawabanUpload']['size']<=2097152){
                  if (move_uploaded_file($_FILES['jawabanUpload']['tmp_name'],$uploadDir . $uploadFile)){
                        $proses->UploadJawabanTugas($_POST,$uploadFile);
      					   if((file_exists($uploadDir . $_POST['fileLama'])) && ($_POST['fileLama'] != ""))
      						unlink($uploadDir . $_POST['fileLama']);
                  }
                  else {

                     $_SESSION['tugas']['err'] = 7;
                     header("Location: " . $cfg->GetURL('e_tugas','tugas_tampil','detail')."&err=".$cfg->Enc($_SESSION['tugas']['err'])."&id=".$cfg->Enc($_POST['id']));        	
                     exit;	
                  }
               }else{

                     $_SESSION['tugas']['err'] = 2;
                     header("Location: " . $cfg->GetURL('e_tugas','tugas_tampil','detail')."&err=".$cfg->Enc($_SESSION['tugas']['err'])."&id=".$cfg->Enc($_POST['id']));        	
                     exit;	            
               }
            }else{

                     $_SESSION['tugas']['err'] = 9;
                     header("Location: " . $cfg->GetURL('e_tugas','tugas_tampil','detail')."&err=".$cfg->Enc($_SESSION['tugas']['err'])."&id=".$cfg->Enc($_POST['id']));        	
                     exit;	         
            }
         }else{
            $_SESSION['tugas']['err'] = $_FILES['jawabanUpload']['error'];
            header("Location: " . $cfg->GetURL('e_tugas','tugas_tampil','detail')."&err=".$cfg->Enc($_SESSION['tugas']['err'])."&id=".$cfg->Enc($_POST['id']));        	
            exit;
       
         }


		}
		
		header("Location: " . $cfg->GetURL('e_tugas','tugas_mahasiswa','view'));  
		exit;  
	}
	
	if(isset($_POST['jawabanBatal']))
	{
		header("Location: " . $cfg->GetURL('e_tugas','tugas_mahasiswa','view'));  
		exit;  
	}
	
	/*
	if (isset($_GET['act']))
	{
		
		$proses->Delete($_GET);
	}
	*/
	unset($_SESSION['tugas']['judul']);
	header("Location: " . $cfg->GetURL('e_tugas','tugas_dosen','view'));        	
	exit;
	
    
}
else
{
    $security->DenyPageAccess();
}


?>
