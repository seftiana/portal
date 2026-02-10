<?php

   // Load Application Display Class	   
   require_once $cfg->GetValue('app_proc') . 'process_base.class.php';   

   // Load Data Display Class
   require_once $cfg->GetValue('app_data') . 'database_connected.class.php';

   // Load Module display Class
   require_once $cfg->GetValue('app_module') . 'announcement/display/process_announcement.class.php';
   require_once $cfg->GetValue('app_module') . 'announcement/business/announcement.class.php';
   

   $ThisPageAccessRight = "ADMINISTRASI | ADMINUNIT";

   $security = new Security($cfg);

   if (false !== $security->CheckAccessRight($ThisPageAccessRight)) {
      $app = new ProcessAnnouncement($cfg);   
      if (isset ($_POST['act'])) {
         $action = $_POST['act'];
      } elseif (isset ($_GET['act'])) {
         $action = $cfg->Dec($_GET['act']);
      }
      if($action == 'ViewAddPengumuman') {
         // show add announcement form
         header("Location: " . $cfg->GetURL('announcement', 'announcement', 'add'));
         exit();
      } elseif($action == 'DoAddAnnouncement') {
         if(isset($_POST['btnCancel'])) {
            header("Location: " . $cfg->GetURL('announcement', 'announcement', 'view'));
            exit();
         }
         // do add announcement data item
         if(empty($_POST['mArrAnnouncementFakultasId']) OR empty($_POST['mArrAnnouncementDestination'])) {
            // data fakultas dan untuk siapa pengumuman diberikan harus diisi
            $errMsg = 'Data fakultas dan Tujuan harus diisi';
            header("Location: " . $cfg->GetURL('announcement', 'announcement', 'add') . '&errMsg=' . $cfg->Enc($errMsg));
            exit();
         } else {
            // checking image uploaded
            if ($_FILES['image_file']['name'] != '') {
               $_POST['data']['AnnouncementImageFile'] = $_FILES['image_file']['name'];
               $files = explode(".", $_FILES['image_file']['name']);
               $ext = $files[count($files)-1];
//if (strtolower($ext) == 'jpg' OR strtolower($ext) == 'jpeg' OR strtolower($ext) == 'gif') {
               //added by eci 29319
               if (strtolower($ext) == 'jpg' OR strtolower($ext) == 'jpeg' OR 
                  strtolower($ext) == 'gif' OR 
                  strtolower($ext) == 'png' OR 
                  strtolower($ext) == 'doc' OR 
                  strtolower($ext) == 'docx' OR 
                  strtolower($ext) == 'xls' OR 
                  strtolower($ext) == 'xlsx' OR 
                  strtolower($ext) == 'pdf') {
                  $userfile = $_FILES['image_file']['tmp_name'];
                  $uploadfile = $cfg->GetValue('docroot') . 'images/announcement/' . $_FILES['image_file']['name'];
               }
               else {
                  $errMsg = 'File tidak boleh di-upload';                  
                  header("Location: " . $cfg->GetURL('announcement', 'announcement', 'add') . '&errMsg=' . $cfg->Enc($errMsg));
                  exit();
               }
            } else {
               $uploadfile = '';
               $userfile = $_FILES['image_file']['tmp_name'];
            }
            
            
            $result = $app->AddAnnouncementDataItem($_POST['data'], $_POST['mArrAnnouncementFakultasId'], 
                                       $_POST['mArrAnnouncementDestination'], $uploadfile, $userfile);
            if(false === $result) {
               $userErrMsg = 'Proses tambah pengumuman tidak berhasil';
               $sysErrMsg = $app->GetProperty("ProcessAnnouncementError");
               $errMsg = $app->ComposeErrorMessage($userErrMsg, $sysErrMsg);
               header("Location: " . $cfg->GetURL('announcement', 'announcement', 'add') . '&errMsg=' . $cfg->Enc($errMsg));
               exit();
            } else {
               $errMsg = 'Proses tambah pengumuman berhasil';
               $tErrMsg = 'info';
               header("Location: " . $cfg->GetURL('announcement', 'announcement', 'view') . '&errMsg=' . $cfg->Enc($errMsg) . '&tErrMsg=' . $cfg->Enc($tErrMsg));
               exit();
            }
         }
      } elseif($action == 'DoDeleteAnnouncement') {
            $announcementId = $cfg->Dec($_GET['id']);
            $uploadfile = $cfg->GetValue('docroot') . 'images/announcement/';
            $result = $app->DeleteAnnouncementDataItem($announcementId, $uploadfile);
            if(false === $result) {
               $userErrMsg = 'Proses hapus pengumuman tidak berhasil';
               $sysErrMsg = $app->GetProperty("ProcessAnnouncementError");
               $errMsg = $app->ComposeErrorMessage($userErrMsg, $sysErrMsg);
               $tErrMsg = 'warning';
               header("Location: " . $cfg->GetURL('announcement', 'announcement', 'view') . '&errMsg=' . $cfg->Enc($errMsg)  . '&tErrMsg=' . $cfg->Enc($tErrMsg));
               exit();
            } else {
               $errMsg = 'Proses hapus pengumuman berhasil';
               $tErrMsg = 'info';
               header("Location: " . $cfg->GetURL('announcement', 'announcement', 'view') . '&errMsg=' . $cfg->Enc($errMsg) . '&tErrMsg=' . $cfg->Enc($tErrMsg));
               exit();
            }
      } elseif($action == 'DoUpdateAnnouncement') {
         if(isset($_POST['btnCancel'])) {
            header("Location: " . $cfg->GetURL('announcement', 'announcement', 'view'));
            exit();
         }
         // do update announcement data item
         if(empty($_POST['mArrAnnouncementFakultasId']) OR empty($_POST['mArrAnnouncementDestination'])) {
            // data fakultas dan untuk siapa pengumuman diberikan harus diisi
            $errMsg = 'Data fakultas dan Tujuan harus diisi';
            header("Location: " . $cfg->GetURL('announcement', 'announcement', 'update') . '&errMsg=' . $cfg->Enc($errMsg));
            exit();
         } else {
            // checking image uploaded
            if ($_FILES['image_file']['name'] != '') {               
               $_POST['data']['AnnouncementImageFile'] = $_FILES['image_file']['name'];
               $files = explode(".", $_FILES['image_file']['name']);
               $ext = $files[count($files)-1];
//if (strtolower($ext) == 'jpg' OR strtolower($ext) == 'jpeg' OR strtolower($ext) == 'gif' OR strtolower($ext) == 'png') {
               if (strtolower($ext) == 'jpg' OR strtolower($ext) == 'jpeg' OR 
                  strtolower($ext) == 'gif' OR 
                  strtolower($ext) == 'png' OR 
                  strtolower($ext) == 'doc' OR 
                  strtolower($ext) == 'docx' OR 
                  strtolower($ext) == 'xls' OR 
                  strtolower($ext) == 'xlsx' OR 
                  strtolower($ext) == 'pdf') {
$userfile = $_FILES['image_file']['tmp_name'];
                  $uploadfile = $cfg->GetValue('docroot') . 'images/announcement/' . $_FILES['image_file']['name'];
                  //delete old files
                  unlink($cfg->GetValue('docroot') . 'images/announcement/' . $_POST['oldImageFileName']);
               }
               else {
                  $errMsg = 'File tidak boleh di-upload';                  
                  header("Location: " . $cfg->GetURL('announcement', 'announcement', 'update') . '&errMsg=' . $cfg->Enc($errMsg));
                  exit();
               }
            } else {
               $_POST['data']['AnnouncementImageFile'] = $_POST['oldImageFileName'];
               $uploadfile = '';
               $userfile = $_FILES['image_file']['tmp_name'];
            }
            // decrypt old ig
            $_POST['data']['AnnouncementId'] = $cfg->Dec($_POST['data']['AnnouncementId']);
            $result = $app->UpdateAnnouncementDataItem($_POST['data'], $_POST['mArrAnnouncementFakultasId'], 
                                       $_POST['mArrAnnouncementDestination'], $uploadfile, $userfile);
            if(false === $result) {
               $userErrMsg = 'Proses ubah pengumuman tidak berhasil';
               $sysErrMsg = $app->GetProperty("ProcessAnnouncementError");
               $errMsg = $app->ComposeErrorMessage($userErrMsg, $sysErrMsg);
               header("Location: " . $cfg->GetURL('announcement', 'announcement', 'update') . '&errMsg=' . $cfg->Enc($errMsg));
               exit();
            } else {
               $errMsg = 'Proses ubah pengumuman berhasil';
               $tErrMsg = 'info';
               header("Location: " . $cfg->GetURL('announcement', 'announcement', 'view') . '&errMsg=' . $cfg->Enc($errMsg) . '&tErrMsg=' . $cfg->Enc($tErrMsg));
               exit();
            }
         }
      } else {
         header("Location: " . $cfg->GetURL('announcement', 'announcement', 'view'));
         exit();
      }      
   } else {
      $security->DenyPageAccess();
   }
?>
