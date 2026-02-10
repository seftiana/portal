<?php
/**
 * DisplayViewProfile
 * Display class for view and search user
 * 
 * @package 
 * @author Fitria Maulina
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-02-22
 * @revision 
 *
 */

class DisplayAgenda extends DisplayBaseFull
{
	var $mMateri;
	var $mAgenda;
   	var $mErrorMessage;
   	
   	var $mId;
   	var $mAddress;
   	var $mRole;
   	var $mProgramStudi;
   	var $mPage;
   	var $mNumRecordPerPage;
   
   /**
    * DisplayAgenda::DisplayAgenda
    * Constructor for DisplayViewForum class
    *
    * @param $configObject object Configuration
    * @param $securityObj  object Security
    * @return void
    */
   	function DisplayAgenda(&$configObject, $securityObj) 
   	{
      	DisplayBaseFull::DisplayBaseFull($configObject, $securityObj); 
      
      	//set template untuk error dan empty box DisplayBase::SetErrorAndEmptyBox
      	$this->SetErrorAndEmptyBox();
      
      	//set template untuk navigasi DisplayBase::SetNavigationTemplate
      	$this->SetNavigationTemplate();
      	$this->mId = $this->mrUserSession->GetProperty("UserReferenceId");
      	$this->mAddress = $this->mrUserSession->GetProperty("ServerServiceAddress");
	  	$this->mProgramStudi =  $this->mrUserSession->GetProperty("UserProdiId");
	  	$this->mRole = $this->mrUserSession->GetProperty("Role");
	  	
      	$this->mMateri = new MateriClientService($this->mAddress,false, $this->mId, $this->mProgramStudi);
      	$this->mAgenda = new Agenda($this->mAddress,false, $this->mId, $this->mProgramStudi);
      	$this->SetTemplateBasedir($configObject->GetValue('app_module') . 'e_agenda/templates/');
      
   	}
   
   function DisplayViewAgenda($page, $jenis)
   {
   		DisplayBaseFull::Display("[ Logout ]");
   		
   		$this->mPage = $page;
      	$this->mNumRecordPerPage = 15;
   		$frekuensi=$this->mAgenda->GetFrekuensi('');
      	
     // 	echo $this->mrUserSession->GetProperty("Role");
      	//atur dari jenis agenda
      	if ($jenis == 1)  //kelas
      	{
      		if($this->mrUserSession->GetProperty("Role")==1)
			{
				$this->SetTemplateFile('view_kelas.html');
				//echo "asas";
				
			}
			else
			{
				$this->SetTemplateFile('view_kelas_dosen.html');
				
			}
      		$nmJenis = 'kelas';
      		$owner = $_SESSION['kelas']['kelas'];
      		$semester = $this->mMateri->GetSemesterAktif($this->mRole);      
      		$dtKelas = $this->mMateri->GetKuliahWhereSemester($semester[0]['ID'],$this->mRole);
			//$frekuensi=$this->mAgenda->GetFrekuensi('');//print_r($frekuensi);
			if(is_array($frekuensi)){
	      		foreach ($frekuensi as $rowFrek => $valFrek)
		    	{
		
		    		$this->mTemplate->addVars("list_frek",$valFrek,"");
		    		if($_SESSION['kelas']['frekuensi']==$valFrek[ID]){
		    		   $this->mTemplate->AddVar("list_frek","SELECT_".$valFrek[ID],"selected");
					}else{
					   $this->mTemplate->AddVar("list_frek","SELECT_".$valFrek[ID],"");
					}
					$this->mTemplate->parseTemplate("list_frek", "a");
		    	}
            }
            if(is_array($dtKelas)){
      		foreach ($dtKelas as $rowKelas => $valKelas)
	    	{
	
	    		$this->mTemplate->addVars("list_kelas",$valKelas,"KLS_");
	    		$this->mTemplate->parseTemplate("list_kelas", "a");
	    		$this->mTemplate->AddVar("list_kelas","SELECT_".$owner,"selected");
	    	}
         }
      	}
      	else //pribadi 
      	{
      		$this->SetTemplateFile('view_pribadi.html');
      		$nmJenis = 'pribadi';
      		$owner = $this->mId;
			if(is_array($frekuensi)){
	      		foreach ($frekuensi as $rowFrek => $valFrek)
		    	{
		    		$this->mTemplate->addVars("list_frek",$valFrek,"");
		    		if($_SESSION['pribadi']['frekuensi']==$valFrek[ID]){
		    		   $this->mTemplate->AddVar("list_frek","SELECT_".$valFrek[ID],"selected");
					}else{
					   $this->mTemplate->AddVar("list_frek","SELECT_".$valFrek[ID],"");
					}
					$this->mTemplate->parseTemplate("list_frek", "a");
		    	}
            }
      	}
      	
      	
      	switch ($_SESSION[$nmJenis]['frekuensi'])
      	{
      		case 1:
      			$nmFrk = 'Insidental';
      			break;
      		case 2:
      			$nmFrk = 'Mingguan';
      			break;
      		case 3:
      			$nmFrk = 'Bulanan';
      			break;
      	}
		
		
		if (isset($_SESSION[$nmJenis]))
		{
			$this->mTemplate->SetAttribute("show_table", "visibility", "show");
			$start_record = ($this->mPage*$this->mNumRecordPerPage)-($this->mNumRecordPerPage);
			$dtAgenda = $this->mAgenda->GetAgenda($owner, $jenis, $_SESSION[$nmJenis]['frekuensi'],$_SESSION[$nmJenis]['done'], $start_record, $this->mNumRecordPerPage);
			$recordcount = $this->mAgenda->CountAgenda($owner, $jenis, $_SESSION[$nmJenis]['frekuensi'],$_SESSION[$nmJenis]['done']);
			//echo $recordcount;
			if (empty($dtAgenda))
			{
				$this->AddVar('data', 'DATA_EXIST','no');
			}
			else {
				$this->AddVar('data', 'DATA_EXIST','yes');
				foreach ($dtAgenda as $row => $value)
				{
					if ($value['ISDONE'] == 1) 
					{
						$dtAgenda[$row]['NAMA'] = '<strike>'.$value['JUDUL'].'</strike>';
						$dtAgenda[$row]['DISABLED'] = 'disabled checked';
						
					}
					else 
					{
						$dtAgenda[$row]['NAMA'] = $value['JUDUL'];
						$dtAgenda[$row]['DISABLED'] = '';
					}
				}
				
				
				$this->ParseData("list", $dtAgenda, "DATA_", $start_record+1);
				$url = $this->mrConfig->GetURL('e_agenda', $nmJenis, 'view');    			
    			$this->ShowPageNavigation($url,$this->mPage,$recordcount, $this->mNumRecordPerPage);
				
			}
		}
		//echo $nmFrk;	
		$this->mTemplate->AddVar("show_table","TIPE", $nmFrk);	
		$this->mTemplate->AddVar("content","SELECT_".$_SESSION[$nmJenis]['frekuensi'], "selected");	
				$this->mTemplate->AddVar("content","CHECKED_".$_SESSION[$nmJenis]['done'], "checked");	
		$this->mTemplate->AddVar("content","NMSMT", $semester[0]['SEMESTER'].' '.$semester[0]['TAHUN']);		
					
		$this->AddVar('show_table', 'URL_ACTION',$this->mrConfig->GetURL('e_agenda','agenda','proses'));
		
		
		$this->DisplayTemplate();
   }   
   
  
   
   function DisplayAddAgenda($jenis)
   {
   		DisplayBaseFull::Display("[ Logout ]");
		$this->SetTemplateFile('add_agenda_kelas.html');
		$frekuensi=$this->mAgenda->GetFrekuensi('');//print_r($frekuensi);
			if(is_array($frekuensi)){
	      		foreach ($frekuensi as $rowFrek => $valFrek)
		    	{
		
		    		$this->mTemplate->addVars("list_frek",$valFrek,"");
		    		if($_SESSION['kelas']['frekuensi']==$valFrek[ID]){
		    		   $this->mTemplate->AddVar("list_frek","SELECT_".$valFrek[ID],"selected");
					}else{
					   $this->mTemplate->AddVar("list_frek","SELECT_".$valFrek[ID],"");
					}
					$this->mTemplate->parseTemplate("list_frek", "a");
		    	}
            }
		if($jenis == 1) //kelas
		{	
			$this->mTemplate->SetAttribute("show_kelas", "visibility", "show");		
			$nmJenis = 'kelas';
			$semester = $this->mMateri->GetSemesterAktif($this->mRole);      
      		$dtKelas = $this->mMateri->GetKuliahWhereSemester($semester[0]['ID'],$this->mRole);
			
      		foreach ($dtKelas as $rowKelas => $valKelas)
	    	{
	
	    		$this->mTemplate->addVars("list_kelas",$valKelas,"KLS_");
	    		$this->mTemplate->parseTemplate("list_kelas", "a");
	    		$this->mTemplate->AddVar("list_kelas","SELECT_".$owner,"selected");
	    	}
		}
		else
		{			
			$nmJenis = 'pribadi';
			
		}
		
		$this->AddVar('content', 'URL_ACTION',$this->mrConfig->GetURL('e_agenda','agenda','proses'));
		$this->AddVar('content', 'JENIS',$jenis);
		$this->AddVar('content', 'NAMA',$nmJenis);
		//bikin array buat tanggal ama tahun
	   $tgl = $this->generateTanggal();
	   $thn = $this->generateTahun();
	   $jam = $this->generateJam();
	   $menit = $this->generateMenit();
	   
	   foreach ($tgl as $rowTgl => $valTgl)
	   {
	   		$this->mTemplate->addVars("tglAwal",$valTgl,"");
	    	$this->mTemplate->parseTemplate("tglAwal", "a");
	   }
	   
	   foreach ($thn as $rowThn => $valThn)
	   {
	   		$this->mTemplate->addVars("thnAwal",$valThn,"");
	    	$this->mTemplate->parseTemplate("thnAwal", "a");
	   }
	   
	   foreach ($jam as $rowJam => $valJam)
	   {
	   		$this->mTemplate->addVars("jamAwal",$valJam,"");
	    	$this->mTemplate->parseTemplate("jamAwal", "a");
	   }
		
	   foreach ($menit as $rowMnt => $valMnt)
	   {
	   		$this->mTemplate->addVars("menitAwal",$valMnt,"");
	    	$this->mTemplate->parseTemplate("menitAwal", "a");
	   }
		
		
		$this->DisplayTemplate();
   }
   
   
   
   function generateTanggal()
     {
     	$arrTanggal = array();
     	$arrTmp = array("TGL"=> "");
     	for ($tgl=1;$tgl<=31;$tgl++)
     	{
     		if ($tgl<10) $tgl = '0'.$tgl;
     		$arrTmp = array("TGL"=> $tgl);
     		array_push($arrTanggal,$arrTmp);
     	}
     	return $arrTanggal;
     }

     function generateTahun()
     {

     	$arrTahun = array();
     	$arrTmp = array("THN"=> "");
     	$thnSkrg = date("Y");
     	for ($thn=$thnSkrg; $thn <= $thnSkrg+6; $thn++)
     	{
     		$arrTmp = array("THN"=> $thn);
     		array_push($arrTahun,$arrTmp)	;
     	}
     	return $arrTahun;
     }

     function generateJam()
     {
     	$arrJam = array();
     	$arrTmp = array("JAM"=> "");
     	for ($jam = 0;$jam <= 23;$jam++)
     	{
     		$strJam = strlen($jam)<2? "0".$jam : $jam;
     		$arrTmp = array("JAM"=> $strJam);
     		array_push($arrJam,$arrTmp);
     	}
     	return $arrJam;
     }

     function generateMenit()
     {
     	$arrMenit = array();
     	$arrTmp = array("MENIT"=> "");
     	for ($mnt=0;$mnt<=59;$mnt++)
     	{
     		$strMenit = strlen($mnt)<2 ? "0".$mnt : $mnt;
     		$arrTmp = array("MENIT"=> $strMenit);
     		array_push($arrMenit,$arrTmp);
     	}
     	return $arrMenit;
     }
	 
    
  
}

?>