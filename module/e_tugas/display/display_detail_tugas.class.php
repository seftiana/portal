<?php
/**
 * Display Detail Tugas
 * 
 * @package 
 * @author Fitria Maulina
 * @copyright Copyright (c) 2006
 * @version $Id$
 * @access public
 **/

class DisplayDetailTugas extends DisplayBaseFull 
{
    var $mrConfig;    
  	var $mSemester;
  	var $mId;
  	var $mTugas;
  	var $mTugasLokal;
  	var $mNim;
  	var $mRole;
    /**
     * DisplayDetailTugas::DisplayDetailTugas()
     * 
     * @param $configObject
     * @return 
     **/
    function DisplayDetailTugas(&$configObject,&$security,$id)
    {
        DisplayBaseFull::DisplayBaseFull($configObject, $security);            	
    	    	
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
     * DisplayDetailTugas::Display()
     * 
     * @return 
     **/
   function Display()
   {
   //print(asda)
     	DisplayBaseFull::Display('[ Logout ]');
    	$this->mTemplate->AddVar("content", "APPLICATION_MODULE", "DATA TUGAS");
    
    	$this->mTemplate->AddVar("content","FORM_ACTION",$this->mrConfig->GetURL("e_tugas","tugas","proses"));
		$this->mTemplate->AddVar("content","TUGAS_NIU",$this->mNim);

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
		
		
    	$dtTugas = $this->mTugas->GetTugasMahasiswaWhereId($this->mId,$this->mNim);
		
		//print_r($dtTugas);
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
		   $fileJawaban = substr($dtTugas[0]['HASIL_FILE'],12,strlen($dtTugas[0]['HASIL_FILE']));
		   //jika belum mengumpulkan tugas bisa upload file tugas
		   if($value['HASIL_NILAI'] == "")
		   {
		   		$this->mTemplate->AddVar("jawaban","IS_DINILAI","false");				
		   }
		   else
		   {
		   		$this->mTemplate->AddVar("jawaban","IS_DINILAI","true");	
				$this->mTemplate->AddVar("jawaban","JAWABAN_NILAI",$value['HASIL_NILAI']);	   	
		   }
		   
		   $this->mTemplate->AddVar("jawaban","JAWABAN_FILE",$fileJawaban);
		   $this->mTemplate->AddVar("jawaban","JAWABAN_DESK",$value['HASIL_DESK']);
		   $filename_jawaban = $this->mrConfig->Enc($value['HASIL_FILE']);
		   $this->mTemplate->AddVar("jawaban","JAWABAN_LINK",$this->mrConfig->GetUrl("e_tugas","download","proses")."&file=".$filename_jawaban);
		   
		   $this->mTemplate->AddVar("content","TUGAS_FILE_DISPLAY",$file);
		  //s print_r($dtTugas);
		   //get nilai total		 
		   $dtJenisTugas = $this->mTugas->GetNilaiMahasiswa($this->mNim,$dtTugas[0]['DOSEN_ID']);
			//print_r($dtJenisTugas);
			
		   $sumNilaiSemua = 0;
		   $totalBobot = 0;
		   //print_r($dtJenisTugas);
   		if(!empty($dtJenisTugas)){
   		   foreach($dtJenisTugas as $rowTugas => $valueTugas)
   		   {
   		   	$nilai = explode(',',$valueTugas['NILAI']);
   				$sumNilai = 0;
   				$counter = 0;
   				$rata2Nilai = 0;
   				//echo  count($nilai);
   				for($i = 0; $i < count($nilai); $i++)		
   				{
   					$nilaiAngka = $this->mTugasLokal->KonvertNilai($nilai[$i]);					
   					$sumNilai +=  $nilaiAngka;
   					$counter ++;
   					//echo $sumNilai."-";
   				}
   				$rata2Nilai = $sumNilai / $counter;
   				//echo $sumNilai;
   				$nilaiJenis = $rata2Nilai * $valueTugas['BOBOT'];
   				$sumNilaiSemua += $nilaiJenis;
   				$totalBobot += $valueTugas['BOBOT'];
   		   }
		   
		   
		   $nilaiTotal = $sumNilaiSemua / $totalBobot;
	 	   $this->mTemplate->AddVar("content","HASIL_TOTAL",$this->mTugasLokal->KonvertNilaiToChar($nilaiTotal));
		   }
		   $this->mTemplate->addVars("content",$value,"TUGAS_");
		   $this->mTemplate->parseTemplate("content", "a");
		 }
       }
	   
       $this->mTemplate->displayParsedTemplate();
  }
} 
 
 
 
?>
