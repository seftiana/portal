<?php

   class DisplayViewErrorExpiredSession extends DisplayBaseNoLinks
   {      
      var $mUserName;
   
      function DisplayViewErrorExpiredSession(&$configObject, $userName)
      {
         DisplayBaseNoLinks::DisplayBaseNoLinks($configObject, $secObject);
         $this->mUserName = $userName;
         $this->SetTemplateFile('layout-common.html');
         $this->SetTemplateBasedir($this->mrConfig->GetValue('app_module') . 'error/templates/');
         $this->SetTemplateFile('view_expired_session.html');
      }    

      function Display()
      {
         DisplayBaseNoLinks::Display();
         
         $this->AddVar('head_addition', 'REDIRECTURL', $this->mrConfig->GetURL('login', 'logout', 'proses') . '&uname=' . $this->mUserName);
         $this->AddVar('content', 'TEXTMSG', '<div class="text-center><i class="fa fa-frown-o fa-5x" aria-hidden="true"></i><br><h1 class="text-center">
Maaf!</h1><h2>Kami mengira Anda telah pergi.<br>Maka untuk menjaga keamanan dan privasi kami menutup sesi Portal Akademik Anda</h2></div>');
                  
         $this->DisplayTemplate();    
      }
   }
?>