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

class DisplayUpdateTugas extends DisplayBaseFull 
{
    var $mrConfig;    
  	var $mSemester;
  	var $mId;
  	var $mTugas;
  	var $mTugasLokal;
  	var $mNim;
  	var $mRole;
	var $mKelas;
    /**
     * DisplayUpdateTugas::DisplayAddTugas()
     * 
     * @param $configObject
     * @return 
     **/
    function DisplayUpdateTugas(&$configObject,&$security,$id)
    {
        DisplayBaseFull::DisplayBaseFull($configObject, $security);        
    	$this->mSemester = $_SESSION['tugas']['semester'];
    	$this->mKelas = $_SESSION['tugas']['kelas'];
    	    	
    	$this->mNim = $this->mrUserSession->GetProperty("UserReferenceId");
        $this->mRole = $this->mrUserSession->GetProperty("Role");
		$this->mId = $id;
		if($this->mRole == 7)
		{
			$this->mAddress = isset($_SESSION['tugas']['unit'])? $_SESSION['tugas']['unit'] : "";
			$this->mProgramStudi =  "";
		}
		else
		{
			$this->mAddress = $this->mrUserSession->GetProperty("ServerServiceAddress");
			$this->mProgramStudi =  $security->mUserIdentity->GetProperty("UserProdiId");
		}
        
      	$this->mProgramStudi = $security->mUserIdentity->GetProperty("UserProdiId");
      	$this->mMateri = new MateriClientService($this->mAddress,false, $this->mNim, $this->mProgramStudi);
      	$this->mTugas = new TugasClientService($this->mAddress,false, $this->mNim, $this->mProgramStudi);
      	$this->mTugasLokal = new Tugas();
      	
      	
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
    	$this->mTemplate->AddVar("content", "APPLICATION_MODULE", "EDIT TUGAS");
    
    	$nmSemester = $this->mMateri->GetNamaSemester($this->mSemester);  
    	$this->mTemplate->AddVar("content","NAMA_SEMESTER",$nmSemester);
    	$this->mTemplate->AddVar("content","FORM_ACTION",$this->mrConfig->GetURL("e_tugas","tugas","proses"));
/*
         if ($_SESSION['tugas']['err']!='')
           {
           	$this->mTemplate->SetAttribute("display_error", "visibility", "show");
           	$this->mTemplate->AddVar("display_error","ERROR", $_SESSION['tugas']['err']);
         }*/
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
    	$dtTugas = $this->mTugas->GetTugasWhereId($this->mId); 
		if(!empty($dtTugas))		
		{
		  foreach($dtTugas as $row => $value)
		  {			
			//nama semester
			$value['NAMA_SEMESTER'] = $this->mMateri->GetNamaSemester($value['SEMESTER']);    	
			//pilihan kelas
			$dtKelas = $this->mMateri->GetKuliahWhereSemester($value['SEMESTER'],$this->mRole);
			
			$emptyKelas = array(array("ID"=>"","selected"=>"","NAMA"=>"--kosong--"));
			if(empty($dtKelas)) $dtKelas = $emptyKelas;
			foreach ($dtKelas as $rowKelas => $valKelas)
			{
				$this->mTemplate->addVars("list_kelas",$valKelas,"KLS_");
				$this->mTemplate->parseTemplate("list_kelas", "a");
				$this->mTemplate->AddVar("list_kelas","SELECT_".$dtTugas[0]['KELAS_ID'],"selected");
			}    	
			//end of pilihan kelas
			 //print_r( $_SESSION['tugas']);
       	//tampilkan error

         // end of tampilkan error	
           $this->mTglAwal = $value['AWAL'];
           $this->mTglAkhir = $value['AKHIR'];
           if(empty($this->mTglAwal)){
             $this->mTglAwal=date("Y-m-d h:i");//echo($this->mTglAwal);
           }
           if(empty($this->mTglAkhir)){
             $this->mTglAkhir=date("Y-m-d h:i");
           }
         // end of tampilkan error
            for($i=1;$i<=31;$i++){
               $tgl = $i;
               if ($i>=1 && $i<=9) {
                  $tgl = "0".$i;
               }
               if ($tgl == substr($this->mTglAwal,8,2)) {
                  $this->AddVar('tglAwal', 'SELECTED', ' selected');
               }else{
                  $this->AddVar('tglAwal', 'SELECTED', '');
               } 
               
               if ($tgl == substr($this->mTglAkhir,8,2)) {
                  $this->AddVar('tglAkhir', 'SELECTED', ' selected');
               }else{
                  $this->AddVar('tglAkhir', 'SELECTED', '');
               }
               
               $this->mTemplate->AddVar('tglAwal', 'TGL', $tgl);
               $this->mTemplate->parseTemplate("tglAwal", "a");
               
               $this->mTemplate->AddVar('tglAkhir', 'TGL', $tgl);
               $this->mTemplate->parseTemplate("tglAkhir", "a");
            }
            
            for($i=1;$i<=12;$i++){
               $bln = $i;
               if ($i>=1 && $i<=9) {
                  $bln = "0".$i;
               }
               if ($bln == substr($this->mTglAwal,5,2)) {
                  $this->AddVar('blnAwal', 'SELECTED', ' selected');
               }else{
                  $this->AddVar('blnAwal', 'SELECTED', '');
               } 
               
               if ($bln == substr($this->mTglAkhir,5,2)) {
                  $this->AddVar('blnAkhir', 'SELECTED', ' selected');
               }else{
                  $this->AddVar('blnAkhir', 'SELECTED', '');
               }  
               $this->mTemplate->AddVar('blnAkhir', 'BLN', $bln);
               $this->mTemplate->parseTemplate("blnAkhir", "a");
               
               $this->mTemplate->AddVar('blnAwal', 'BLN', $bln);
               $this->mTemplate->parseTemplate("blnAwal", "a");
            }
            
            for($i=(date('Y')-3);$i<=(date('Y')+3);$i++){
               if ($i == substr($this->mTglAwal,0,4)) {
                  $this->AddVar('thnAwal', 'SELECTED', ' selected');
               }else{
                  $this->AddVar('thnAwal', 'SELECTED', '');
               } 
               
               if ($i == substr($this->mTglAkhir,0,4)) {
                  $this->AddVar('thnAkhir', 'SELECTED', ' selected');
               }else{
                  $this->AddVar('thnAkhir', 'SELECTED', '');
               }
            
               $this->mTemplate->AddVar('thnAwal', 'THN', $i);
               $this->mTemplate->parseTemplate("thnAwal", "a");
               
               $this->mTemplate->AddVar('thnAkhir', 'THN', $i);
               $this->mTemplate->parseTemplate("thnAkhir", "a");
            }

         $jam = $this->mTugasLokal->generateJam();
         $menit = $this->mTugasLokal->generateMenit();
         
         foreach ($jam as $rowJam => $valJam)
         {//echo(substr($this->mTglAwal,12,2));
            if ($valJam['JAM'] == substr($this->mTglAwal,11,2)) {
               $this->AddVar('jamAwal', 'SELECTED', ' selected');
            }else{
               $this->AddVar('jamAwal', 'SELECTED', '');
            }
            if ($valJam['JAM'] == substr($this->mTglAkhir,11,2)) {
               $this->AddVar('jamAkhir', 'SELECTED', ' selected');
            }else{
               $this->AddVar('jamAkhir', 'SELECTED', '');
            }

            $this->mTemplate->addVar("jamAwal","JAM",$valJam['JAM']);
            $this->mTemplate->parseTemplate("jamAwal", "a");

            $this->mTemplate->addVar("jamAkhir","JAM",$valJam['JAM']);
            $this->mTemplate->parseTemplate("jamAkhir", "a");
         }
         
         foreach ($menit as $rowMnt => $valMnt)
         {
            if ($valMnt['MENIT'] == substr($this->mTglAwal,14,2)) {
               $this->AddVar('menitAwal', 'SELECTED', ' selected');
            }else{
               $this->AddVar('menitAwal', 'SELECTED', '');
            }
            if ($valMnt['MENIT'] == substr($this->mTglAkhir,14,2)) {
               $this->AddVar('menitAkhir', 'SELECTED', ' selected');
            }else{
               $this->AddVar('menitAkhir', 'SELECTED', '');
            }
            
            $this->mTemplate->addVar("menitAwal",'MENIT',$valMnt['MENIT']);
            $this->mTemplate->parseTemplate("menitAwal", "a");
            
            $this->mTemplate->addVar("menitAkhir",'MENIT',$valMnt['MENIT']);
            $this->mTemplate->parseTemplate("menitAkhir", "a");
         }
         
			if($this->mRole == 7)
			{
				$paramJenis = $this->mTugas->GetDosenWhereKelas($this->mKelas);
			}
			else
			{
				$paramJenis = $this->mNim;
			}
			//echo $paramJenis."asa;s";
			$dtJenisTugas = $this->mTugas->GetJenisTugasWhereDosen($paramJenis);
			if(empty($dtJenisTugas)) $dtJenisTugas = $emptyKelas;
			else
			{
				foreach($dtJenisTugas as $rowJenis => $valJenis)
				{
					$this->mTemplate->addVars("jenis_tugas",$valJenis,"JENIS_");
					$this->mTemplate->parseTemplate("jenis_tugas", "a");
					$this->mTemplate->AddVar("jenis_tugas","SELECT_".$value['JENIS_ID'],"selected");
				}
			}
		  
		   $this->mTemplate->AddVar("content","SELECT_AWAL_".$value['AWAL_BLN'],"selected");
		   $this->mTemplate->AddVar("content","SELECT_AKHIR_".$value['AKHIR_BLN'],"selected");
		   
		   $value['FILE_DISPLAY'] = substr($dtTugas[0]['NAMA_FILE'],12,strlen($dtTugas[0]['NAMA_FILE']));
		 
		   $this->mTemplate->AddVar("content","TUGAS_FILE_DISPLAY",$file);
		   $this->mTemplate->addVars("content",$value,"TUGAS_");
		   $this->mTemplate->parseTemplate("content", "a");
		 }
       }
	   
       $this->mTemplate->displayParsedTemplate();
  }
} 
 
 
 
?>