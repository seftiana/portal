<?php
   // Load Application Display Class      
   require_once $cfg->GetValue("app_proc") . "process_base.class.php";

   require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
   require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";

   // Load Module display Class
   require_once $cfg->GetValue("app_module") . "yudicium/communication/yudicium_client.service.class.php";
   require_once $cfg->GetValue("app_module") . "yudicium/display/process_yudicium.class.php";

   $ThisPageAccessRight = "MAHASISWA";
   $security = new Security($cfg);
   if (false !== $security->CheckAccessRight($ThisPageAccessRight)) {
         $ObjProcessYudicium = new ProcessYudicium($cfg,$security);
         //print_r($ObjProcessYudicium);
         $result = $ObjProcessYudicium->DoYudiciumRegistration();
         if (isset($_POST["btnDaftar"])) {
            if($result === false){
               $errMsg = $cfg->Enc("Pendaftaran Yudisium tidak berhasil.");
            }
            else {
               $errMsg = $cfg->Enc("Pendaftaran Yudisium berhasil.");
            }
            header("Location: " . $cfg->GetURL('yudicium','yudicium_registration_result','view').'&err='. $errMsg);
            exit;
         }
   }
   else {

      $security->DenyPageAccess();
   }
?>