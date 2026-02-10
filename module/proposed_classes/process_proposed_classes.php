<?php


   $ThisPageAccessRight = "MAHASISWA | DOSEN";
   $security = new Security($cfg);
   if (false !== $security->CheckAccessRight($ThisPageAccessRight) ){
      if (isset($_POST["btnBack"])) {
         $urlAdditional = "";
         if ($_POST["par"] != "") {
            $arrParam = explode("|", $cfg->Dec($_POST["par"]));
            $arrValue = explode("|", $_POST["val"]);
            foreach ($arrParam as $key=>$param) {
               $urlAdditional .= "&" . $param . "=" . $arrValue[$key];
            }
         }
         if ($_POST["loc"] != "") {
            $urlLocation = explode("|",$cfg->Dec($_POST["loc"]));
         }
        //print_r($urlLocation); echo $cfg->GetURL($urlLocation[0], $urlLocation[1], $urlLocation[2]) . $urlAdditional;exit;
         header("Location: " . $cfg->GetURL($urlLocation[0], $urlLocation[1], $urlLocation[2]) . $urlAdditional);
         exit;
      }
   }else {
      $security->DenyPageAccess();
   }
?>