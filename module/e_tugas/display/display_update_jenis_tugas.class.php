<?php
/**
 * Display Update Jenis Tugas
 * 
 * @package 
 * @author Fitria Maulina
 * @copyright Copyright (c) 2006
 * @version $Id$
 * @access public
 **/

class DisplayUpdateJenisTugas extends DisplayBaseFull 
{
    var $mrConfig;    
  	var $mSemester;
  	var $mId;
  	var $mTugas;
  	var $mTugasLokal;
  	var $mNim;
  	var $mRole;
    /**
     * DisplayUpdateJenisTugas::DisplayAddTugas()
     * 
     * @param $configObject
     * @return 
     **/
    function DisplayUpdateJenisTugas(&$configObject,&$security,$id)
    {
        DisplayBaseFull::DisplayBaseFull($configObject, $security);        
    	$this->mSemester = $_SESSION['tugas']['semester'];
    	    	
    	$this->mNim = $this->mrUserSession->GetProperty("UserReferenceId");
        $this->mRole = $this->mrUserSession->GetProperty("Role");
		$this->mId = $id;
        
      	$this->mProgramStudi = $security->mUserIdentity->GetProperty("UserProdiId");
      	$this->mMateri = new MateriClientService($this->mrUserSession->GetProperty("ServerServiceAddress"),false, $this->mNim, $this->mProgramStudi);
      	$this->mTugas = new TugasClientService($this->mrUserSession->GetProperty("ServerServiceAddress"),false, $this->mNim, $this->mProgramStudi);
      	$this->mTugasLokal = new Tugas();
      	
      	
      	//set template untuk error dan empty box DisplayBase::SetErrorAndEmptyBox
      	$this->SetErrorAndEmptyBox();
      	//set template untuk navigasi DisplayBase::SetNavigationTemplate
      	$this->SetNavigationTemplate();
  
      	$this->SetTemplateBasedir($this->mrConfig->GetValue('app_module') . 'e_tugas/templates/');      
    } 

    /**
     * DisplayUpdateJenisTugas::Display()
     * 
     * @return 
     **/
   function Display()
   {
     	DisplayBaseFull::Display('[ Logout ]');
    	$this->mTemplate->AddVar("content", "APPLICATION_MODULE", "EDIT JENIS TUGAS");
    
    	$nmSemester = $this->mMateri->GetNamaSemester($this->mSemester);  
    	$this->mTemplate->AddVar("content","NAMA_SEMESTER",$nmSemester);
    	$this->mTemplate->AddVar("content","FORM_ACTION",$this->mrConfig->GetURL("e_tugas","tugas","proses"));

		
		
    	$dtJenisTugas = $this->mTugas->GetJenisTugasWhereId($this->mId);
		//print_r($dtJenisTugas);
		
		if(!empty($dtJenisTugas))
		{
			foreach($dtJenisTugas as $row => $value)
			{
				$this->mTemplate->addVars("content",$value,"TUGAS_");
				$this->mTemplate->parseTemplate("content", "a");
			}
		}
		
	   
       $this->mTemplate->displayParsedTemplate();
  }
} 
 
 
 
?>