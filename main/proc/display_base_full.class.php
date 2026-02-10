<?php

   class DisplayBaseFull extends DisplayBase
   {
      var $mrUserSession;
      var $mrSecurity;
      
      function DisplayBaseFull(&$configObject, &$security) 
      {         
         DisplayBase::DisplayBase($configObject); 
         $this->SetDocumentCommon();
         $this->mrSecurity = &$security;
         $this->mrUserSession = &$security->mUserIdentity;
         $this->SetTemplateFile('layout-common-full.html');
      }
      
      function Display($moduleName = "")
      {
         DisplayBase::Display();         
         $this->AddVar("body", "APPLICATION_NAME", $this->mrConfig->GetValue('app_name'));
         $this->AddVar("body", "APPLICATION_CUSTOMER_NAME",  $_SESSION['identitas']['pt_nama']);
         $this->AddVar("body", "APPLICATION_CUSTOMER_LOGO",  $_SESSION['identitas']['pt_logo']);
         $this->AddVar("version", "APPLICATION_VERSION", $this->mrConfig->GetValue('app_version'));
         $this->AddVar("body", "USER_FULLNAME", $this->mrUserSession->GetProperty("UserFullName"));
         $serverStatus = $this->mrUserSession->GetProperty("ServerServiceAvailable");
         $idNumber = ($serverStatus['SIA']) ? $this->mrUserSession->GetProperty("UserIdNumber"): $this->mrUserSession->GetProperty("User");
         $this->AddVar("body", "USER_IDNUMBER", $idNumber);
         $this->AddVar("body", "USER_PRODINAME", $this->mrUserSession->GetProperty("UserProdiName"));
         
         // cek penggunak mahasiswa atau dosen ?
         /*
         $fileFoto = $this->mrUserSession->GetProperty("UserFotoFile");
			if(!empty($fileFoto)) {
				$rootServer = dirname($this->mrUserSession->GetProperty('ServerServiceAddress'));
				$fileFoto = $rootServer.'/'.$fileFoto;
				$this->AddVar("user_foto", "IS_AVAIL", "YES");
				$this->AddVar("user_foto", "FILE_FOTO", $fileFoto);
				$this->AddVar("user_foto", "USER_FULLNAME", $this->mrUserSession->GetProperty("UserFullName"));            
         }
         else {
            $this->AddVar("user_foto", "IS_AVAIL", "NO");
         }
         */
         
         //what's the role
         if ($this->mrUserSession->GetProperty("Role")==1) {
            // mahasiswa tampilkan foto
//            $rootServer = dirname($this->mrUserSession->GetProperty('ServerServiceAddress'));
//            $rootServer = str_replace("/index.service.php","",$rootServer);
//            $rootServer = str_replace("portal_services","",$rootServer);       
            
//            $fileFoto = $rootServer.$this->mrConfig->GetValue('base_image');
//            $fileFoto = preg_replace('/^(http:\/\/)?([^\/]+)/i', 'http://'.$_SERVER['HTTP_HOST'], $fileFoto.$nimMhs);

            // ambil nama nim anggap 
            $foto = $this->mrUserSession->GetProperty("UserFotoFile");
				            
            //if(file_exists($fileFoto.$nimMhs) && is_file($fileFoto.$nimMhs)){ # bagian ini ditutup karena tidak mungkin mengecek file berdasarkan alamat host
		    $this->AddVar("body", "FILE_FOTO", $this->mrConfig->GetURL('home', 'foto', 'view'));
            if(!empty($foto)){
               $this->AddVar("user_foto", "IS_AVAIL", "YES");
               $this->AddVar("user_foto", "FILE_FOTO", $this->mrConfig->GetURL('home', 'foto', 'view'));
//               $this->AddVar("user_foto", "FILE_FOTO", $fileFoto.$nimMhs);
            }else{               
               $this->AddVar("user_foto", "IS_AVAIL", "NO");
               $this->AddVar("user_foto", "CONFIG_BASEADDRESS", $this->mrConfig->GetValue('baseaddress'));
            }  
				//$this->AddVar("user_foto", "USER_FULLNAME", $this->mrUserSession->GetProperty("UserFullName"));            
         }
         

         //Generate Menu
         $menu_items = $this->mrLinks->GetMenuItems();
         $menu_items[0]['USERID'] = $this->mrConfig->Enc($this->mrUserSession->GetProperty("User"));
         $this->ParseData("menu_item",$menu_items,"MENU_");

         //Generate Sub Menu
         if (!empty($moduleName)) {
            $submenu_items = $this->mrLinks->GetSubMenuItems($moduleName);
            if(is_array($submenu_items))
               $this->ParseData("submenu_item",$submenu_items,"SUBMENU_");
         }         
 

         //Generate Shorcuts Menu
         if (!empty($moduleName)) {
            $bottom_menu_items = $this->mrLinks->GetBottomMenuItems($moduleName);
            if(is_array($bottom_menu_items))
               $this->ParseData("bottom_menu_item",$bottom_menu_items,"BOTTOMMENU_");
         }
		 
         // Generate Elearning Menu
         if (!empty($moduleName)) {
            $elearning_menu_items = $this->mrLinks->GetElearningMenuItems($moduleName);
            if(is_array($elearning_menu_items))
               $this->ParseData("elearning_menu_item",$elearning_menu_items,"ELEARNING_");
         }
		 
         // view  service availability & view feedback
         if ($this->mrUserSession->GetProperty("Role") != 3 && $this->mrUserSession->GetProperty("UserFullName") != 6) {
            if (!empty($serverStatus)) {
               foreach($serverStatus as $key => $value) {
                  if($value === true) {
                     $this->AddVar('list_sistem', 'IS_AVAILABLE', 'YES');
                  }elseif($value == 'unset'){
                     $this->AddVar('list_sistem', 'IS_AVAILABLE', 'UNSET');
                  }else {
                     $this->AddVar('list_sistem', 'IS_AVAILABLE', 'NO');
                  }
                  $this->AddVar('list_sistem', 'SISTEM_NAME', $key);
                  $this->mTemplate->parseTemplate("list_sistem", "a");
               }
            }
           $this->AddVar('feedback', 'FEEDBACK_HREF', $this->mrConfig->GetURL('feedback', 'feedback', 'add'));
           $this->AddVar('disclaimer', 'DISCLAIMER_HREF', $this->mrConfig->GetURL('user', 'disclaimer', 'view'));
           $this->AddVar('faq', 'FAQ_HREF', $this->mrConfig->GetURL('faq', 'faq', 'view'));
           
            // view virtual class
            if ($this->mrUserSession->GetProperty("Role") == 8 || $this->mrUserSession->GetProperty("Role") == 9) {
               $this->SetAttribute('elearning_menu', 'visibility', 'hidden');
            }
         } else {
            $this->SetAttribute('services', 'visibility', 'hidden');
            $this->SetAttribute('feedback', 'visibility', 'hidden');
            $this->SetAttribute('disclaimer', 'visibility', 'hidden');
            $this->SetAttribute('faq', 'visibility', 'hidden');
         }
      

      //set link version
      if($this->mrUserSession->GetProperty("User") == 'admin'){
         $this->AddVar("version","IS_ADMIN",'1');
         $this->AddVar("version", 'VERSION_HREF', $this->mrConfig->GetURL('version', 'version', 'view'));
      }
      else
         $this->AddVar("version","IS_ADMIN","0");
   }
}
?>
