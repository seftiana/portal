<?php
/**
 * Display detail Materi
 * 
 * @package 
 * @author Fitria Maulina (lina@gamatechno.com)
 * @copyright Copyright (c) 2006
 * @version $Id$
 * @access public
 **/
class DisplayDetailMateri extends DisplayBaseFull 
{
    var $mrConfig;    
  	var $mSemester;
  	var $mId;
  	var $mUserId;
  	var $mMateri;
  	var $mKlsId;
  	var $mTujuan;
    /**
     * DisplayDetailMateri::DisplayDetailMateri()
     * 
     * @param $configObject
     * @return 
     **/
    function DisplayDetailMateri(&$configObject,&$security,$id)
    {
        DisplayBaseFull::DisplayBaseFull($configObject, $security);   
        $this->mTemplate->setBasedir($this->mrConfig->GetValue('docroot') . 'module/e_materi/templates');	   
    	$this->mId = $id;
    	$this->mSemester = $_SESSION['materiSemester'];
    	$this->mUserId = $this->mrUserSession->GetProperty("UserReferenceId");
    	$prodi = $security->mUserIdentity->GetProperty("UserProdiId");
    	$this->mMateri = new MateriClientService($this->mrUserSession->GetProperty("ServerServiceAddress"),false, $this->mUserId, $prodi);

    } 

    /**
     * DisplayDetailMateri::Display()
     * 
     * @return 
     **/
    function Display()
    {
       	DisplayBaseFull::Display('[ Logout ]');
    	$this->mTemplate->AddVar("content", "APPLICATION_MODULE", "Detail Materi");
    	$this->mTemplate->AddVar("content", "FORM_ACTION", $this->mrConfig->GetURL('e_materi','materi','view'));
    	$dtMateri = $this->mMateri->GetMateriWhereId($this->mId);
       
        
       
        foreach ($dtMateri as $row => $value)
     	{
    	
     		//$this->mTemplate->AddVar("content","MATERI_NEW_FILE",$newFile);
     		$materi = substr($dtMateri[0]['NM_FILE'],12,strlen($dtMateri[0]['NM_FILE']));
     		$this->mTemplate->AddVar("content","MATERI_FILE",$materi);
     		//$value['DOWNLOAD'] = "module/e_materi/file_upload/".$value['NM_FILE'];
			$filename = $this->mrConfig->Enc($value['NM_FILE']);
			$value['DOWNLOAD'] = $this->mrConfig->GetUrl("e_materi","download","proses")."&file=".$filename;
     		
     		$this->mTemplate->addVars("content",$value,"MATERI_");
     		$this->mTemplate->parseTemplate("content", "a");
     	}
     				
	
        $this->mTemplate->displayParsedTemplate();
    } 
} 

?>
