<?php
/**
 * Display Add Jenis Tugas
 * 
 * @package 
 * @author Fitria Maulina
 * @copyright Copyright (c) 2006
 * @version $Id$
 * @access public
 **/

class DisplayAddJenisTugas extends DisplayBaseFull 
{
    var $mrConfig;    
  	var $mTugas;
  	var $mTugasLokal;
  	var $mNim;
  	var $mRole;
    /**
     * DisplayAddJenisTugas::DisplayAddJenisTugas()
     * 
     * @param $configObject
     * @return 
     **/
    function DisplayAddJenisTugas(&$configObject,&$security)
    {
        DisplayBaseFull::DisplayBaseFull($configObject, $security);     
    	    	
    	$this->mNim = $this->mrUserSession->GetProperty("UserReferenceId");
        $this->mRole = $this->mrUserSession->GetProperty("Role");
        
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
     * DisplayAddJenisTugas::Display()
     * 
     * @return 
     **/
   function Display()
   {
     	DisplayBaseFull::Display('[ Logout ]');
    	$this->mTemplate->AddVar("content", "APPLICATION_MODULE", "JENIS TUGAS BARU");
    
    	$nmSemester = $this->mMateri->GetNamaSemester($this->mSemester);  
    	$this->mTemplate->AddVar("content","NAMA_SEMESTER",$nmSemester);
    	$this->mTemplate->AddVar("content","FORM_ACTION",$this->mrConfig->GetURL("e_tugas","tugas","proses"));
		$this->mTemplate->AddVar("content","TUGAS_DOSEN",$this->mNim);
	   
       $this->mTemplate->displayParsedTemplate();
  }
} 
 
 
 
?>