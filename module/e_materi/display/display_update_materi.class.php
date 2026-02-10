<?php
/**
 * Display Update Materi
 * 
 * @package 
 * @author Fitria Maulina (lina@gamatechno.com)
 * @copyright Copyright (c) 2006
 * @version $Id$
 * @access public
 **/
class DisplayUpdateMateri extends DisplayBaseFull 
{
    var $mrConfig;    
  	var $mSemester;
  	var $mId;
  	var $mUserId;
  	var $mMateri;
  	var $mKlsId;
  	var $mTujuan;
  	var $mProgramStudi;
	var $mAddress;
	var $mRole;
	
    /**
     * DisplayUpdateMateri::DisplayUpdateMateri()
     * 
     * @param $configObject
     * @return 
     **/
    function DisplayUpdateMateri(&$configObject,&$security,$id)
    {
        DisplayBaseFull::DisplayBaseFull($configObject, $security);   
        $this->mTemplate->setBasedir($this->mrConfig->GetValue('docroot') . 'module/e_materi/templates');	   
    	$this->mId = $this->mrConfig->Dec($id);
    	$this->mSemester = $_SESSION['materiSemester'];
		$this->mRole = $this->mrUserSession->GetProperty("Role");
		
		if($this->mRole == 7)//admin elearning
		{
			$this->mAddress = isset($_SESSION['materiUnit'])? $_SESSION['materiUnit'] : "";
			$this->mProgramStudi =  isset($_SESSION['materiProdi'])? $_SESSION['materiProdi'] : "";
		}
		else
		{
			$this->mAddress = $this->mrUserSession->GetProperty("ServerServiceAddress");
			$this->mProgramStudi =  $security->mUserIdentity->GetProperty("UserProdiId");
		}
		
		
    	$this->mUserId = $this->mrUserSession->GetProperty("UserReferenceId");
    	$this->mMateri = new MateriClientService($this->mAddress,false, $this->mUserId, $this->mProgramStudi);

    } 

    /**
     * DisplayUpdateMateri::Display()
     * 
     * @return 
     **/
    function Display()
    {
       	DisplayBaseFull::Display('[ Logout ]');
    	$this->mTemplate->AddVar("content", "APPLICATION_MODULE", "Ubah Materi");
    	$this->mTemplate->AddVar("content", "FORM_ACTION", $this->mrConfig->GetURL('e_materi','materi','proses'));
    	$dtMateri = $this->mMateri->GetMateriWhereId($this->mId);
       
        
        //TAMPILKAN ERROR
        if (isset($_GET['err']))
        {
        	$this->mTemplate->SetAttribute("display_error", "visibility", "show");
        	switch ($this->mrConfig->Dec($_GET['err'])){
        		case '1':	$strErr = "Ukuran file melebihi setting server ".ini_get('upload_max_filesize').". Silakan hubungi admin";
        					break;
        		case '2' : 	$strErr = "Ukuran file melebihi batas maksimal 2MB";
        					break;
				case '3' :  $strErr = "File hanya terupload sebagian";
         	         break;
        		case '4' :  $strErr = "Tidak ada file";
        		         break;
        		case '6' :  $strErr = "'Temporary Folder' tidak ditemukan. Silakan hubungi admin";
        		         break;
        		case '7' :  $strErr = "Gagal menyimpan file";
        		         break;
        		case '9' :  $strErr = "Bukan file zip";
        		         break;
        	}
        	$this->mTemplate->AddVar("display_error","ERROR", $strErr);
        }
        
       
	    //print_r($dtMateri);
	     //ISI INPUT HIDDEN        
        $this->mTemplate->AddVar("content", "SEMESTER", $this->mSemester);
        $this->mTemplate->AddVar("content", "ID", $this->mId);
        
        foreach ($dtMateri as $row => $value)
     	{
        
	        //data matakuliah
	        $dtKelas = $this->mMateri->GetKuliahWhereSemester($this->mSemester,$this->mRole);
	     	$emptyKelas = array(array("ID"=>"","selected"=>"","NAMA"=>"--kosong--"));
	     	if(empty($dtKelas)) $dtKelas = $empty;
	     	foreach ($dtKelas as $rowKelas => $valKelas)
	     	{
	     		$this->mTemplate->addVars("list_matkul",$valKelas,"MATKUL_");
	     		$this->mTemplate->parseTemplate("list_matkul", "a");
	     		$this->mTemplate->AddVar("list_matkul","SELECT_".$dtMateri[0]['KELAS'],"selected");
	     	}
		
    	
     		//$this->mTemplate->AddVar("content","MATERI_NEW_FILE",$newFile);
     		$materi = substr($dtMateri[0]['NM_FILE'],12,strlen($dtMateri[0]['NM_FILE']));
     		$value['DOWNLOAD'] = "module/e_materi/file_upload/".$value['NM_FILE'];
     		$this->mTemplate->AddVar("content","MATERI_FILE",$materi);
     		$this->mTemplate->AddVar("content","SELECT_".$dtMateri[0]['IS_AKTIF'],"selected");
     		
     		$this->mTemplate->addVars("content",$value,"MATERI_");
     		$this->mTemplate->parseTemplate("content", "a");
     	}
     				
	
        $this->mTemplate->displayParsedTemplate();
    } 
} 

?>