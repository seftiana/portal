<?php

   class Links
   {
      var $mMenuItems;
      var $mSubMenuItems;
      var $mBottomMenuItems;
	  var $mElearningMenuItems;
      
      var $mrConfigObject;
   
      function Links($configObject, $userRole)
      {
         switch ($userRole)
         {
            case 1: 
                // menu untuk mahasiswa
				$security = new Security($configObject);
				$isEditBiodata = $security->mUserIdentity->GetProperty("IsEditBiodata");
                require $configObject->GetValue('docroot') . "main/links/mahasiswa_portal_menu.php";
                break;
            case 2:
                // menu untuk dosen
                require $configObject->GetValue('docroot') . "main/links/dosen_portal_menu.php"; 
                break;
            case 3:
                // menu untuk admin
                require $configObject->GetValue('docroot') . "main/links/administrasi_portal_menu.php"; 
                break;
            case 6:
                // menu untuk admin unit
                require $configObject->GetValue('docroot') . "main/links/admin_unit_portal_menu.php"; 
                break;
            case 7:
                // menu untuk tenaga kependidikan
                require $configObject->GetValue('docroot') . "main/links/tenaga_kependidikan_portal_menu.php"; 
                break;
            case 8: 
                // menu untuk mahasiswa KBK
                $security = new Security($configObject);
                $isEditBiodata = $security->mUserIdentity->GetProperty("IsEditBiodata");
                require $configObject->GetValue('docroot') . "main/links/kbk_mahasiswa_portal_menu.php";
                break;
            case 9:
                // menu untuk dosen KBK
                require $configObject->GetValue('docroot') . "main/links/kbk_dosen_portal_menu.php"; 
                break;
	    case 10:
                // menu untuk orang tua
                require $configObject->GetValue('docroot') . "main/links/orang_tua_portal_menu.php"; 
                break;
         }
        
         $this->mrConfigObject = $configObject;
         $this->mMenuItems = $menu_items;
         $this->mSubMenuItems = $submenu_items;
         $this->mBottomMenuItems = $bottom_menu_items;
		 $this->mElearningMenuItems = $elearning_menu_items;
      } 

      function GetMenuItems()
      {
         return $this->mMenuItems;
      } 

      function GetSubMenuItems($moduleName)
      {
         return $this->mSubMenuItems[$moduleName];
      } 

      function GetBottomMenuItems($moduleName)
      {
         return $this->mBottomMenuItems[$moduleName];
      } 
      function GetElearningMenuItems($moduleName)
      {
         return $this->mElearningMenuItems[$moduleName];
      }
   } 
?>
