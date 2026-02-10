<?php
/**
 * Display Materi
 * 
 * @package 
 * @author admin
 * @copyright Copyright (c) 2006
 * @version $Id$
 * @access public
 **/
class DisplayAddMateri extends DisplayBaseFull 
{
    var $mrConfig;    
  	var $mSemester;
  	var $mProgramStudi;
  	var $mMateri;
  	var $mId;
  	var $mRole;
	var $mAddress;
    /**
     * DisplayAddMateri::DisplayAddMateri()
     * 
     * @param $configObject
     * @return 
     **/
    function DisplayAddMateri(&$configObject,&$security)
    {
        DisplayBaseFull::DisplayBaseFull($configObject, $security);   
        $this->mTemplate->setBasedir($this->mrConfig->GetValue('docroot') . 'templates/materi');	   
       	$this->mSemester = $_SESSION['materiSemester'];
       	$this->mId = $this->mrUserSession->GetProperty("UserReferenceId");
       	$this->mRole = $this->mrUserSession->GetProperty("Role");
    	//$this->mProgramStudi = $security->mUserIdentity->GetProperty("UserProdiId");
		
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
		
    	$this->mMateri = new MateriClientService($this->mAddress,false, $this->mId, $this->mProgramStudi);

    	$this->SetTemplateBasedir($this->mrConfig->GetValue('app_module') . 'e_materi/templates/');
      	$this->SetTemplateFile('add_materi_tampil.html');
    } 

    /**
     * DisplayAddMateri::Display()
     * 
     * @return 
     **/
   function Display()
    {
       	DisplayBaseFull::Display('[ Logout ]');
    	$this->mTemplate->AddVar("content", "APPLICATION_MODULE", "Materi Baru");
    	$this->mTemplate->AddVar("content", "FORM_ACTION", $this->mrConfig->GetURL('e_materi','materi','proses'));
    	
       
    	
    	$nmSemester = $this->mMateri->GetNamaSemester($this->mSemester);    	
    	$this->mTemplate->AddVar("content", "NAMA_SEMESTER", $nmSemester);
    	
        //ISI INPUT HIDDEN        
        $this->mTemplate->AddVar("content", "SEMESTER", $this->mSemester);
        $this->mTemplate->AddVar("content", "ID", $this->mId);
        
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

    	 
    	  $this->mTemplate->AddVar("content", "MATERI_JUDUL", $_SESSION['materiJudul']);
    	  $this->mTemplate->AddVar("content", "MATERI_ABSTRAKSI", $_SESSION['materiDeskripsi']);
        
	     //data matakuliah
	     $dtKelas = $this->mMateri->GetKuliahWhereSemester($this->mSemester,$this->mRole);;		
	     $emptyKelas = array(array("ID"=>"","selected"=>"","NAMA"=>"--kosong--"));
	     if(empty($dtKelas)) $dtKelas = $empty;
	     foreach ($dtKelas as $rowKelas => $valKelas)
	     {
	     	$this->mTemplate->addVars("list_matkul",$valKelas,"MATKUL_");
	     	$this->mTemplate->parseTemplate("list_matkul", "a");
	     	$this->mTemplate->AddVar("list_matkul","SELECT_".$_SESSION['materiKelas'],"selected");
	     }
	
	     	
	     		     	
	     	
	     	
	     	
    	
     		
     		
     	
     				
	
        $this->mTemplate->displayParsedTemplate();
    }
} 

?>
