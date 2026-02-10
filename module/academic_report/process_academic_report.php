<?php

   $ThisPageAccessRight = "MAHASISWA | DOSEN";

   $security = new Security($cfg);

   if (false !== $security->CheckAccessRight($ThisPageAccessRight)) {
      if ($_POST['viewby'] == 'dosen') {
         header("Location: " . $cfg->GetURL('dosen','mentored_students','view'));
         exit;
      }
   } else {
      $security->DenyPageAccess();
   }
?>