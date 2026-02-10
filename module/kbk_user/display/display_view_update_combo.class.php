<?php

class DisplayViewUpdateCombo extends DisplayBaseFull 
{

   var $mUserService;
   var $mUserId;
   var $mUserRole;
   var $mErrorMessage;
   var $mViewBy;
	var $mSiaServer;
   
   /**
    * DisplayViewUser::DisplayViewUser
    * Constructor for DisplayViewUser class
    *
    * @param $configObject object Configuration
    * @param $securityObj  object Security
    * @param $userId       integer user id
    * @param $userRole     integer user role
    * @return void
    */
   function DisplayViewUpdateCombo(&$configObject, $securityObj, $userId, $userRole, $viewBy) 
   {
      DisplayBaseFull::DisplayBaseFull($configObject, $securityObj);      
      
      //set template untuk error dan empty box DisplayBase::SetErrorAndEmptyBox
      $this->SetErrorAndEmptyBox();
      $this->mSiregService = new UserSiregService($this->mrUserSession->GetProperty("SiregServiceAddress"));
	  
      $this->mUserId = $userId;
      $this->mUserRole = $userRole;
      $this->mViewBy = $viewBy;
      
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'user/templates/');
      $this->SetTemplateFile('view_update_combo.html');
    
   }
   
   /**
    * DisplayViewUser::Display
    * Parsing data to template
    *
    * @param 
    * @return void
    */
   function Display() 
   {
		$mode = $_POST['m'];
		$this->AddVar("content", "ELEMENT_NAME", $_POST['e']); 
		$this->AddVar("content", "LABEL_NULL", "PILIH " . strtoupper($mode));
		$arg = array('mode' => $mode, 'arg' => $_POST['p']);
		$ref = $this->mSiregService->GetReference($arg);
		for($i=0,$m=count($ref);$i<$m;++$i){
			$this->AddVar("data", "VALUE", $ref[$i]['id']);
			$this->AddVar("data", "LABEL", $ref[$i]['name']);
			$this->mTemplate->ParseTemplate('data', 'a');
		}

		echo $this->mTemplate->getParsedTemplate('content');
		die;
   }
}

?>
