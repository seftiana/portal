<?php

   class Configuration
   {
      var $mConfigDirectory;
      var $mValue;
      var $mIsEncript;
      
      // encrypt and decrypt
      var $mObfuscatorKey;
      var $mCharx;
      var $mChar;
      
      function Configuration()
      {
         $this->mValue = array();
      }
      
      function SetConfigDir($configDirectory)
      {
         $this->mConfigDirectory = $configDirectory;
      }
      
      function Load($configFilename)
      {
         require_once $this->mConfigDirectory . $configFilename;
         $this->mValue = array_merge($this->mValue, $cfg);
         // apakah memerlukan ankripsi URL ??
         $this->mIsEncript = $this->mValue['enable_url_obfuscator'];
         $this->mObfuscatorKey = '';
         if($this->mIsEncript)
            $this->mObfuscatorKey = 'rahasia';
      }
      
      function GetValue($name = '')
      {
         if (empty($name)) {
            return $this->mValue;
         } else {
            return $this->mValue[$name];
         }
      }
      
      function SetValue($name, $value)
      {
         return $this->value[$name] = $value;
      }
      
      function GetURL($moduleName, $pageName, $pageAct = "")
      {
         $moduleName = $this->enc($moduleName);
         $pageName = $this->enc($pageName);
         $pageAct = $this->enc($pageAct);
         $urlToLoad = $this->mValue['baseaddress'] ."index.php?pModule=". $moduleName ."&pSub=". $pageName ."&pAct=". $pageAct;
         return $urlToLoad;
       }
       
      function GetPage($moduleName, $pageName, $pageAct = "")
      {  
         $moduleName.'-'.$pageName.'-'.$pageAct;
         $moduleName = $this->dec($moduleName);
         $pageName = $this->dec($pageName);
         if (!empty($pageAct)) {
            $pageAct = $this->dec($pageAct);
            $fileName = $pageAct ."_". $pageName .".php";
         }
         else
            $fileName = $pageName.".php";
         
         $pathToLoad = $this->mValue['docroot'] ."module/". $moduleName ."/". $fileName;
   
         if (file_exists($pathToLoad))
            return $pathToLoad;
         else
            return false;
      }
      
      function ForcePageTo($moduleName, $pageName, $pageAct = "")
      {  
         $moduleName = $this->enc($moduleName);
         $pageName = $this->enc($pageName);
         $pageAct = $this->enc($pageAct);
         
         return $this->GetPage($moduleName, $pageName, $pageAct);
      }      
      
      function enc($data) {
         if(false === $this->mIsEncript) 
            return $data; 
         $charEnc = $charEncX = "";
         $key = md5($this->mObfuscatorKey);         
         $x = 0;
         for ($i = 0; $i < strlen($data); $i++) {
            if ($x == strlen($key)) $x = 0;
            $charEnc .= substr($key, $x, 1);
            $x++;	
         }
         for ($i = 0; $i < strlen($data); $i++) {
            $charEncX .= chr(ord(substr($data, $i, 1))+(ord(substr($charEnc, $i, 1)))%256);	
         }
         return base64_encode($charEncX);
      }
      
      function dec($data) {
         if(false === $this->mIsEncript) 
            return $data;
         $charDec = $charDecX = "";

         // bug fixing enkripsi yg mengandung '+'
         $data = str_replace(' ', '+', $data);

         $data = base64_decode($data);
         $key = md5($this->mObfuscatorKey);
         $x = 0;
         for ($i = 0; $i< strlen($data); $i++) {
            if ($x == strlen($key)) $x=0;
            $charDec .= substr($key, $x, 1);
            $x++;	
         }
         for ($i = 0; $i< strlen($data); $i++) {
            if (ord(substr($data, $i, 1)) < ord(substr($charDec, $i, 1))) {
               $charDecX .= chr((ord(substr($data, $i, 1))+256) - ord(substr($charDec, $i, 1)));	
            } else {
               $charDecX .= chr(ord(substr($data, $i, 1))-ord(substr($charDec, $i, 1)));
            }
         }
         return $charDecX;
      }
      
      function GetServiceBusinessHandler($moduleName, $pageName)
      {         
         $moduleName = $moduleName;
         $pageName = $pageName;         
         $fileName = strtolower($pageName) . "_server.service.class.php";
      
         $pathToLoad = $this->mValue['docroot'] ."module/". $moduleName ."/communication/". $fileName;
         
         if (file_exists($pathToLoad))
            return $pathToLoad;
         else 
            return false;
      }
   }
   
?>
