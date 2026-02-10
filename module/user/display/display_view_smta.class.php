<?php
/**
 * DisplayViewProfile
 * Display class for view and search user
 * 
 * @package 
 * @author Maya Alipin
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-02-22
 * @revision Maya Alipin 2006-09-08
 *
 */

class DisplayViewSmta extends DisplayBaseNoLinks 
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
   function DisplayViewSmta(&$configObject, $securityObj, $userId, $userRole, $viewBy, $siaServer) 
   {
      DisplayBaseNoLinks::DisplayBaseNoLinks($configObject, $securityObj);      
      
      //set template untuk error dan empty box DisplayBase::SetErrorAndEmptyBox
      $this->SetErrorAndEmptyBox();
		if ($siaServer == "") {
			$this->mSiaServer = $this->mrUserSession->GetProperty("ServerServiceAddress");
		} else {
			$this->mSiaServer = $siaServer;
		}
      
      $this->mUserService = new UserClientService($this->mSiaServer, false, $userId);
      if($this->mUserService->IsError()) {
         $this->mErrorMessage .= $this->mUserService->GetProperty("ErrorMessages");
      }else{
         $this->mUserService->SetProperty("UserRole", $userRole );
      }
      
      $this->mUserId = $userId;
      $this->mUserRole = $userRole;
      $this->mViewBy = $viewBy;
      
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'user/templates/');
      $this->SetTemplateFile('view_smta.html');
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
		 $dataPropinsi = $this->mUserService->GetDataPropinsi();
			
         if (false === $dataPropinsi){            
            $this->mErrorMessage .= $this->mUserService->GetProperty("ErrorMessages");
            if ($this->mUserService->GetProperty("FaultMessages")==""){
               $this->mErrorMessage .= "<br />".$this->mUserService->GetProperty("FaultMessages");
            }
            $this->ShowErrorBox();
         } else {
			$this->fillCombo('data_propinsi', $dataPropinsi, $_POST['propinsi']);
			if(!isset($_POST['propinsi']))$prop = $dataPropinsi[0]['value'];
			else $prop = $_POST['propinsi'];
			
			$dataKota = $this->mUserService->GetDataKota($prop);
			if(!isset($_POST['Lihat'])){
				$kota = $dataKota[0]['value'];
			}else{
				$kota = $_POST['kota'];
				$dataSmta = $this->mUserService->GetDataSmta($kota);
			}
			if(!empty($dataKota))$this->fillCombo('data_kota', $dataKota, $kota);
         }
         $this->AddVar("content", "URL_FILTER", $this->mrConfig->GetURL('user','smta','view').
				"&sia=".$this->mrConfig->Enc($this->mSiaServer));
				
		 if(empty($dataSmta))$this->AddVar('data_smta', 'EMPTY', 'YES');
		 else{
			$this->AddVar('data_smta', 'EMPTY', 'NO');
			$template = 'data_smta';
			for($i = 0, $m = count($dataSmta); $i < $m; ++$i){
				$this->AddVar($template, 'NO', $i + 1);
				$this->AddVar($template, 'VALUE', $dataSmta[$i]['value']);
				$this->AddVar($template, 'NAMA', $dataSmta[$i]['label']);
				$this->mTemplate->parseTemplate($template, 'a');
			}
		}
		 $this->setAttribute( 'content', 'unusedvars', 'ignore' );	// ignore strip curly bracket
		 $this->setAttribute( 'document', 'unusedvars', 'ignore' );
		 $this->setAttribute( 'body', 'unusedvars', 'ignore' );
		 $this->mTemplate->addGlobalVar("LOAD_FUNCTION", "");
		DisplayBaseNoLinks::Display();            
      $this->DisplayTemplate();
   }
   
   function ShowErrorBox($infoavailable = "NO") {
      $this->AddVar("error_box", "ERROR_MESSAGE",  
            $this->ComposeErrorMessage("Pengambilan data smta tidak berhasil." , $this->mErrorMessage));   
      $this->AddVar("data_profile", "INFO_AVAILABLE", $infoavailable);   
      $this->SetAttribute('error_box', 'visibility', 'visible');
   }
   
   function fillCombo($template, $data, $selected=''){
		for($i = 0, $m = count($data); $i < $m; ++$i){
			if($data[$i]['value'] == $selected)$this->AddVar($template, 'IS_SELECTED', 'selected');
			else $this->AddVar($template, 'IS_SELECTED', '');
			$this->AddVar($template, 'VALUE', $data[$i]['value']);
			$this->AddVar($template, 'LABEL', $data[$i]['label']);
			$this->mTemplate->parseTemplate($template, 'a');
		}
   }
}

?>