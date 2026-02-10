<?php
/**
 * Display Update Tugas
 * 
 * @package 
 * @author Fitria Maulina
 * @copyright Copyright (c) 2006
 * @version $Id$
 * @access public
 **/

class DisplayNilaiTampil extends DisplayBaseFull 
{
    var $mrConfig;    
  	var $mSemester;
  	var $mId;
  	var $mTugas;
  	var $mTugasLokal;
  	var $mNim;
  	var $mRole;
    /**
     * DisplayNilaiTampil::DisplayAddTugas()
     * 
     * @param $configObject
     * @return 
     **/
    function DisplayNilaiTampil(&$configObject,&$security,$id)
    {
        DisplayBaseFull::DisplayBaseFull($configObject, $security);        
    	$this->mSemester = $_SESSION['tugas']['semester'];
    	    	
    	$this->mNim = $this->mrUserSession->GetProperty("UserReferenceId");
        $this->mRole = $this->mrUserSession->GetProperty("Role");
		$this->mId = $id;
        
      	$this->mProgramStudi = $security->mUserIdentity->GetProperty("UserProdiId");
      	$this->mMateri = new MateriClientService($this->mrUserSession->GetProperty("ServerServiceAddress"),false, $this->mNim, $this->mProgramStudi);
      	$this->mTugas = new TugasClientService($this->mrUserSession->GetProperty("ServerServiceAddress"),false, $this->mNim, $this->mProgramStudi);
      //	$this->mTugasLokal = new Tugas();
      	
      	
      	//set template untuk error dan empty box DisplayBase::SetErrorAndEmptyBox
      	$this->SetErrorAndEmptyBox();
      	//set template untuk navigasi DisplayBase::SetNavigationTemplate
      	$this->SetNavigationTemplate();
  
      	$this->SetTemplateBasedir($this->mrConfig->GetValue('app_module') . 'e_tugas/templates/');      
    } 

    /**
     * DisplayUpdateTugas::Display()
     * 
     * @return 
     **/
   function Display()
   {
     	DisplayBaseFull::Display('[ Logout ]');
    	$this->mTemplate->AddVar("content", "APPLICATION_MODULE", "NILAI TUGAS");
    
    	$nmSemester = $this->mMateri->GetNamaSemester($this->mSemester);  
    	$this->mTemplate->AddVar("content","NAMA_SEMESTER",$nmSemester);
    	$this->mTemplate->AddVar("content","FORM_ACTION",$this->mrConfig->GetURL("e_tugas","tugas","proses"));

		
		
    	$dtTugas = $this->mTugas->GetTugasWhereId($this->mId);
		if(!empty($dtTugas))		
		{
		  foreach($dtTugas as $row => $value)
		  {			
			//nama semester
			$value['NAMA_SEMESTER'] = $this->mMateri->GetNamaSemester($value['SEMESTER']);    	
			$value['MULAI'] = $this->IndonesianDate($value['AWAL']);
			$value['SELESAI'] = $this->IndonesianDate($value['AKHIR']);
			
		  
		   $this->mTemplate->AddVar("content","SELECT_AWAL_".$value['AWAL_BLN'],"selected");
		   $this->mTemplate->AddVar("content","SELECT_AKHIR_".$value['AKHIR_BLN'],"selected");
		   
		   $value['FILE_DISPLAY'] = substr($dtTugas[0]['NAMA_FILE'],12,strlen($dtTugas[0]['NAMA_FILE']));
		   //$value['FILE'] = 'module/e_tugas/file_upload/'.$value['NAMA_FILE'];
			$filename = $this->mrConfig->Enc($value['NAMA_FILE']);
			$value['FILE'] = $this->mrConfig->GetUrl("e_tugas","download","proses")."&file=".$filename;
		 
		   $dtPeserta = $this->mTugas->GetPesertaKelas($this->mId,$value['KELAS_ID']);
		   if(empty($dtPeserta))
		   {
		   		$this->mTemplate->AddVar("data_peserta","DATA_EXIST","false");
		   }
		   else
		   {
				$this->mTemplate->AddVar("data_peserta","DATA_EXIST","true");	
				$counter = 0;	
				//print_r($dtPeserta);
				foreach($dtPeserta as $rowPeserta => $valPeserta)
				{
					$valPeserta['NO'] = ++$counter;					
					$file = substr($dtPeserta[$rowPeserta]['NAMA_FILE'],12,strlen($dtPeserta[$rowPeserta]['NAMA_FILE']));
    				//jika $materi terlalu panjang maka dipotong dl
    				
    				$arrFile = explode(".",$file);
    				$strFile = "";
    				for ($i=0;$i<count($arrFile)-1;$i++)
    				{
    					$strFile .= $arrFile[$i];
    				}
    				if(strlen($strFile) > 10)
    				$valPeserta['FILE'] = substr($strFile,0,10)."...".$arrFile[count($arrFile)-1];
    				else $valPeserta['FILE'] = $file;

    				
					
					if($valPeserta['NILAI'] != "")	$this->mTemplate->AddVar("list_peserta","PESERTA_SELECT_".$valPeserta['NILAI'],"selected");
					else {
						$this->mTemplate->AddVar("list_peserta","PESERTA_SELECT_A","");						
						$this->mTemplate->AddVar("list_peserta","PESERTA_SELECT_B","");						
						$this->mTemplate->AddVar("list_peserta","PESERTA_SELECT_C","");						
						$this->mTemplate->AddVar("list_peserta","PESERTA_SELECT_D","");						
						$this->mTemplate->AddVar("list_peserta","PESERTA_SELECT_E","");						
					}
					$valPeserta['SELECT_'.$valPeserta['NILAI']] = "selected";
               $filenamePeserta = $this->mrConfig->Enc($valPeserta['NAMA_FILE']);
               $valPeserta['DOWNLOAD'] = $this->mrConfig->GetUrl("e_tugas","download","proses")."&file=".$filenamePeserta;
					//$valPeserta['DOWNLOAD'] = 'module/e_tugas/file_upload/'.$valPeserta['NAMA_FILE'];
				   	$this->mTemplate->addVars("list_peserta",$valPeserta,"PESERTA_");   
					$this->mTemplate->parseTemplate("list_peserta", "a");
				}
		   }
		 
		   //$this->mTemplate->AddVar("content","TUGAS_FILE",$file);
		   $this->mTemplate->addVars("content",$value,"TUGAS_");
		   $this->mTemplate->parseTemplate("content", "a");
		 }
       }
	   
       $this->mTemplate->displayParsedTemplate();
  }
} 
 
 
 
?>
