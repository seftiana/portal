<?php
/**
 * DisplayViewProfile
 * Display class for view and search user
 * 
 * @package 
 * @author Refit Gustaroska
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-02-22
 * @revision 
 *
 */

class DisplayViewMatkul extends DisplayBaseFull
{

   var $mErrorMessage;
   var $mRole;
   var $mAddress;
   var $mMateriLokal;
   var $mProdi;
   
   /**
    * DisplayViewForum::DisplayViewForum
    * Constructor for DisplayViewForum class
    *
    * @param $configObject object Configuration
    * @param $securityObj  object Security
    * @param $userId       integer user id
    * @param $userRole     integer user role
    * @return void
    */
   function DisplayViewMatkul(&$configObject, $securityObj) 
   {
		DisplayBaseFull::DisplayBaseFull($configObject, $securityObj); 
		$this->mRole = $this->mrUserSession->GetProperty("Role");
      	$this->mMateriLokal = new Materi( $this->mrConfig);
		if($this->mRole == 7)
		{
			$this->mAddress = isset($_SESSION['forum']['unit'])? $_SESSION['forum']['unit'] : "";
			$this->mProdi = isset($_SESSION['forum']['prodi'])? $_SESSION['forum']['prodi'] : "";
		}
		else
		{
			$this->mAddress = $this->mrUserSession->GetProperty("ServerServiceAddress");
		}
		$this->SetErrorAndEmptyBox();  
		$this->SetTemplateBasedir($configObject->GetValue('app_module') . 'e_forum/templates/');
		$this->SetTemplateFile('view_matkul.html');
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
      
		DisplayBaseFull::Display("[ Logout ]"); 
		$this->mTemplate->AddVar("content", "APPLICATION_MODULE", "Daftar Mata Kuliah");
		$objForum = new ForumClientService($this->mAddress,false);             
		//print_r($objForum);
		//echo $this->mrUserSession->GetProperty('User')." ".$this->mrUserSession->GetProperty('Role');
		
		if($this->mRole == 7)
		{
			$paramKul = $this->mProdi;
			$this->mTemplate->SetAttribute("view_unit", "visibility", "show");
			$dtUnit = $this->mMateriLokal->GetUnit();
			$dtProdi = $this->mMateriLokal->GetProdi();
			
			if(!empty($dtUnit))
			{
				foreach($dtUnit as $row => $value)
				{
	    			$this->mTemplate->addVars("list_unit",$value,"UNIT_");
	    			$this->mTemplate->parseTemplate("list_unit", "a");
					$this->mTemplate->AddVar("list_unit", "SELECT_".$this->mAddress, "selected");
	    		}
			}	

			if(!empty($dtProdi))
			{
				foreach($dtProdi as $row => $value)
				{
	    			$this->mTemplate->addVars("list_prodi",$value,"PRODI_");
	    			$this->mTemplate->parseTemplate("list_prodi", "a");
					$this->mTemplate->AddVar("list_prodi", "SELECT_".$this->mProdi, "selected");
	    		}
			}
		}
		else 
		{
			$paramKul = $this->mrUserSession->GetProperty('User');
		}
		//echo $paramKul;
		$dataMatkul = $objForum->GetListMatKul($paramKul, $this->mrUserSession->GetProperty('Role'));
     
		if ($dataMatkul) {
         $i=1;
         foreach($dataMatkul as $val) {    
            $this->AddVar('list_matkul', 'MATKUL_NO', $i++);          
            $this->AddVar('list_matkul', 'URL_FORUM', $this->mrConfig->GetURL('e_forum','forum','view')."&matkul_id=".$this->mrConfig->Enc($val['ID']));
            $this->AddVar('list_matkul', 'MATKUL_NAMA', $val['NAMA']);            
            if ($i%2 != 0){
               $this->AddVar('list_matkul', 'EVEN', ' class="table-common-even"');
            }else{
               $this->AddVar('list_matkul', 'EVEN', '');   
            }
            $this->mTemplate->parseTemplate("list_matkul", "a");
            
         }
		}
            
		$this->DisplayTemplate();
   }
   
   function ShowErrorBox($infoavailable = "NO") {
      $this->AddVar("error_box", "ERROR_MESSAGE",  
            $this->ComposeErrorMessage("Pengambilan data forum tidak berhasil." , $this->mErrorMessage));   
      $this->AddVar("data_profile", "INFO_AVAILABLE", $infoavailable);   
      $this->SetAttribute('error_box', 'visibility', 'visible');
   }
}

?>