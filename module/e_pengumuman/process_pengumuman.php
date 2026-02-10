<?php

   // Load application class
   require_once $cfg->GetValue("app_proc") . "display_base.class.php" ;
   require_once $cfg->GetValue("app_proc") . "display_base_full.class.php" ;
   require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
	require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";
   require_once $cfg->GetValue('app_proc') . 'process_base.class.php';
	
	//require_once $cfg->GetValue('app_lib') . 'send_mail/attach_mailer_class.php';
   
   // Load module class
   require_once $cfg->GetValue("app_module") . "e_pengumuman/communication/pengumuman_client.service.class.php" ;
   require_once $cfg->GetValue("app_module") . "e_pengumuman/display/process_pengumuman.class.php" ;    
   
   $ThisPageAccessRight = "ELEARNINGADM | MAHASISWA | DOSEN";
   $security = new Security($cfg);
   
   #$action = $_GET['act'];
   $action = $cfg->Dec($_GET['act']);		
   
   if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
		//inisiasi object pengumuman
		if($security->mUserIdentity->GetProperty("Role") == 7)
		{
			$address = isset($_SESSION['pengumumanUnit'])? $_SESSION['pengumumanUnit'] : "";
			$prodiId =  "";
		}
		else
		{
			$address = $security->mUserIdentity->GetProperty("ServerServiceAddress");
			$prodiId=  $security->mUserIdentity->GetProperty("UserProdiId");
		}
		
      $proses = new ProcessPengumuman($cfg, $security, $address, $prodiId);   
      
//print_r($_POST);exit;
      if (isset($_POST['insert']))
      {
         //print_r($_POST);
         $fileAdd = date("siHdmy");
         $uploadFile = $fileAdd."".$_FILES['fileUpload']['name'];
         $uploadDir = $cfg->GetValue('file_upload_root')."module/e_pengumuman/file_upload/";
         //print_r($_FILES['fileUpload']);exit;


         if($_FILES['fileUpload']['error'] == 0 && !empty($_POST['judul']) && !empty($_POST['isi'])){
            $filenya = fopen($_FILES['fileUpload']['tmp_name'],"r");
            $bytes = fread($filenya,2);
            $ext = strtolower(substr($_FILES['fileUpload']['name'], - 4));
            //echo $bytes.'--'.$ext;exit;

            if($ext == '.zip' and $bytes == 'PK'){
               if($_FILES['fileUpload']['size']<=2097152){
                  if (move_uploaded_file($_FILES['fileUpload']['tmp_name'],$uploadDir . $uploadFile)){
                        $proses->DoInsertPengumuman($_POST['judul'], $_POST['isi'], $uploadFile, $_POST['kelas'], $_POST['thn'].'-'.$_POST['bln'].'-'.$_POST['tgl']);
                  }
                  else {
                     $_SESSION['pengumumanKelas'] = $_POST['kelas'];
                     $_SESSION['pengumumanJudul'] = $_POST['judul'];
                     $_SESSION['pengumumanIsi'] = $_POST['isi'];
                     $_SESSION['pengumumanStatus'] = $_POST['status'];
                     $_SESSION['pengumumanBatas'] = $_POST['thn'].'-'.$_POST['bln'].'-'.$_POST['tgl'];
                     $_SESSION['pengumumanError'] = 7;
                     header("Location: " . $cfg->GetURL('e_pengumuman','add_pengumuman', 'view')."&err=".$cfg->Enc($_SESSION['pengumumanError']));        
    
                     exit;	
                  }
               }else{
                  $_SESSION['pengumumanKelas'] = $_POST['kelas'];
                  $_SESSION['pengumumanJudul'] = $_POST['judul'];
                  $_SESSION['pengumumanIsi'] = $_POST['isi'];
                  $_SESSION['pengumumanStatus'] = $_POST['status'];
                  $_SESSION['pengumumanBatas'] = $_POST['thn'].'-'.$_POST['bln'].'-'.$_POST['tgl'];
                  $_SESSION['pengumumanError'] = 2;
                  //print('a');
                  header("Location: " . $cfg->GetURL('e_pengumuman','add_pengumuman', 'view')."&err=".$cfg->Enc($_SESSION['pengumumanError']));        
       
                  exit;	            
               }
            }else{

               $_SESSION['pengumumanKelas'] = $_POST['kelas'];
               $_SESSION['pengumumanJudul'] = $_POST['judul'];
               $_SESSION['pengumumanIsi'] = $_POST['isi'];
               $_SESSION['pengumumanStatus'] = $_POST['status'];
               $_SESSION['pengumumanBatas'] = $_POST['thn'].'-'.$_POST['bln'].'-'.$_POST['tgl'];
               $_SESSION['pengumumanError'] = 9;
               //print('a');
               header("Location: " . $cfg->GetURL('e_pengumuman','add_pengumuman', 'view')."&err=".$cfg->Enc($_SESSION['pengumumanError']));        
       
               exit;	         
            }
         }elseif($_FILES['fileUpload']['error'] == 4 && !empty($_POST['judul']) && !empty($_POST['isi'])){
            $proses->DoInsertPengumuman($_POST['judul'], $_POST['isi'], '', $_POST['kelas'], $_POST['thn'].'-'.$_POST['bln'].'-'.$_POST['tgl']);
         }elseif(empty($_POST['judul']) || empty($_POST['isi'])){
            //echo $_FILES['fileUpload']['error'];exit;
            $_SESSION['pengumumanKelas'] = $_POST['kelas'];
            $_SESSION['pengumumanJudul'] = $_POST['judul'];
            $_SESSION['pengumumanIsi'] = $_POST['isi'];
            $_SESSION['pengumumanStatus'] = $_POST['status'];
            $_SESSION['pengumumanBatas'] = $_POST['thn'].'-'.$_POST['bln'].'-'.$_POST['tgl'];
            $_SESSION['pengumumanError'] = 10;
            header("Location: " . $cfg->GetURL('e_pengumuman','add_pengumuman', 'view')."&err=".$cfg->Enc($_SESSION['pengumumanError']));        
      
            exit;	      
         }else{
            //echo $_FILES['fileUpload']['error'];exit;
            $_SESSION['pengumumanKelas'] = $_POST['kelas'];
            $_SESSION['pengumumanJudul'] = $_POST['judul'];
            $_SESSION['pengumumanIsi'] = $_POST['isi'];
            $_SESSION['pengumumanStatus'] = $_POST['status'];
            $_SESSION['pengumumanBatas'] = $_POST['thn'].'-'.$_POST['bln'].'-'.$_POST['tgl'];
            $_SESSION['pengumumanError'] = $_FILES['fileUpload']['error'];
            header("Location: " . $cfg->GetURL('e_pengumuman','add_pengumuman', 'view')."&err=".$cfg->Enc($_SESSION['pengumumanError']));        
      
            exit;	      
         }
          
      }

      if (isset($_POST['update']))
      {
         //print_r($_POST);exit;
         $fileAdd = date("siHdmy");
         $uploadFile = $fileAdd."".$_FILES['fileUpload']['name'];
         $uploadDir = $cfg->GetValue('file_upload_root')."module/e_pengumuman/file_upload/";
         //print_r($_FILES['fileUpload']);exit;


         if($_FILES['fileUpload']['error'] == 0 && !empty($_POST['judul']) && !empty($_POST['isi'])){
            $filenya = fopen($_FILES['fileUpload']['tmp_name'],"r");
            $bytes = fread($filenya,2);
            $ext = strtolower(substr($_FILES['fileUpload']['name'], - 4));
            //echo $bytes.'--'.$ext;exit;

            if($ext == '.zip' and $bytes == 'PK'){
               if($_FILES['fileUpload']['size']<=2097152){
                  if (move_uploaded_file($_FILES['fileUpload']['tmp_name'],$uploadDir . $uploadFile)){
                        $proses->DoUpdatePengumuman($_POST['pgmn_id'],$_POST['judul'], $_POST['isi'], $uploadFile, $_POST['kelas'], $_POST['thn'].'-'.$_POST['bln'].'-'.$_POST['tgl'],"");
      					   if(file_exists($uploadDir . $_POST['fileLama'])) unlink($uploadDir . $_POST['fileLama']);	
                  }
                  else {
                     $_SESSION['pengumumanKelas'] = $_POST['kelas'];
                     $_SESSION['pengumumanJudul'] = $_POST['judul'];
                     $_SESSION['pengumumanIsi'] = $_POST['isi'];
                     $_SESSION['pengumumanStatus'] = $_POST['status'];
                     $_SESSION['pengumumanBatas'] = $_POST['thn'].'-'.$_POST['bln'].'-'.$_POST['tgl'];
                     $_SESSION['pengumumanError'] = 7;
                     header("Location: " . $cfg->GetURL('e_pengumuman','edit_pengumuman', 'view')."&pgmn_id=".$_POST['pgmn_id']."&err=".$cfg->Enc($_SESSION['pengumumanError']));        
    
                     exit;	
                  }
               }else{
                  $_SESSION['pengumumanKelas'] = $_POST['kelas'];
                  $_SESSION['pengumumanJudul'] = $_POST['judul'];
                  $_SESSION['pengumumanIsi'] = $_POST['isi'];
                  $_SESSION['pengumumanStatus'] = $_POST['status'];
                  $_SESSION['pengumumanBatas'] = $_POST['thn'].'-'.$_POST['bln'].'-'.$_POST['tgl'];
                  $_SESSION['pengumumanError'] = 2;
                  //print('a');
                  header("Location: " . $cfg->GetURL('e_pengumuman','edit_pengumuman', 'view')."&pgmn_id=".$_POST['pgmn_id']."&err=".$cfg->Enc($_SESSION['pengumumanError']));        
       
                  exit;	            
               }
            }else{

               $_SESSION['pengumumanKelas'] = $_POST['kelas'];
               $_SESSION['pengumumanJudul'] = $_POST['judul'];
               $_SESSION['pengumumanIsi'] = $_POST['isi'];
               $_SESSION['pengumumanStatus'] = $_POST['status'];
               $_SESSION['pengumumanBatas'] = $_POST['thn'].'-'.$_POST['bln'].'-'.$_POST['tgl'];
               $_SESSION['pengumumanError'] = 9;
               //print('a');
               header("Location: " . $cfg->GetURL('e_pengumuman','edit_pengumuman', 'view')."&pgmn_id=".$_POST['pgmn_id']."&err=".$cfg->Enc($_SESSION['pengumumanError']));        
       
               exit;	         
            }
         }elseif($_FILES['fileUpload']['error'] == 4 && !empty($_POST['judul']) && !empty($_POST['isi'])){
            $proses->DoUpdatePengumuman($_POST['pgmn_id'],$_POST['judul'], $_POST['isi'], "", $_POST['kelas'], $_POST['thn'].'-'.$_POST['bln'].'-'.$_POST['tgl'],"");
         }elseif(empty($_POST['judul']) || empty($_POST['isi'])){
            //echo $_FILES['fileUpload']['error'];exit;
            $_SESSION['pengumumanKelas'] = $_POST['kelas'];
            $_SESSION['pengumumanJudul'] = $_POST['judul'];
            $_SESSION['pengumumanIsi'] = $_POST['isi'];
            $_SESSION['pengumumanStatus'] = $_POST['status'];
            $_SESSION['pengumumanBatas'] = $_POST['thn'].'-'.$_POST['bln'].'-'.$_POST['tgl'];
            $_SESSION['pengumumanError'] = 10;
            header("Location: " . $cfg->GetURL('e_pengumuman','edit_pengumuman', 'view')."&pgmn_id=".$_POST['pgmn_id']."&err=".$cfg->Enc($_SESSION['pengumumanError']));        
      
            exit;	      
         }else{
            //echo $_FILES['fileUpload']['error'];exit;
            $_SESSION['pengumumanKelas'] = $_POST['kelas'];
            $_SESSION['pengumumanJudul'] = $_POST['judul'];
            $_SESSION['pengumumanIsi'] = $_POST['isi'];
            $_SESSION['pengumumanStatus'] = $_POST['status'];
            $_SESSION['pengumumanBatas'] = $_POST['thn'].'-'.$_POST['bln'].'-'.$_POST['tgl'];
            $_SESSION['pengumumanError'] = $_FILES['fileUpload']['error'];
            header("Location: " . $cfg->GetURL('e_pengumuman','edit_pengumuman', 'view')."&pgmn_id=".$_POST['pgmn_id']."&err=".$cfg->Enc($_SESSION['pengumumanError']));        
      
            exit;	      
         }
          
      }
          

		if ($action == 'delete') {		
         $pgmnId = $cfg->Dec($_GET['pgmn_id']);			
         $proses->DoDeletePengumuman($pgmnId);
		}else if ($action == 'aktif') {  
			$pgmnId = $cfg->Dec($_GET['pgmn_id']);
			$proses->DoAktifPengumuman($pgmnId);
		}else if ($action == 'nonaktif') { 
			$pgmnId = $cfg->Dec($_GET['pgmn_id']);
			$proses->DoNonAktifPengumuman($pgmnId);
		}

      //print $cfg->GetURL('e_pengumuman','pengumuman','view');
		header("Location: " . $cfg->GetURL('e_pengumuman','pengumuman', 'view')."&act=filter");
		
      exit;
	  
   }else{
      $security->DenyPageAccess();
   }
   
?>