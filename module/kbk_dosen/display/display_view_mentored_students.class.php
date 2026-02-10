<?php
/**
 * DisplayViewMentoredStudents
 * DisplayViewMentoredStudents class
 *
 * @package dosen
 * @author Maya Alipin
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0
 * @date 2006-03-23
 * @revision Gitra Perdana
 * @date 2006-08-29
 */
   
class DisplayViewMentoredStudents extends DisplayBaseFull {
   var $mUserId;
   var $mProdiId;
   var $mErrorMessage;
   var $mDosenServiceObj;
   var $mServiceServer;
   var $mDisplay;
   var $mModBlok;

    /**
    * DisplayViewMentoredStudents::DisplayViewMentoredStudents
    * Constructor
    *
    * @param configObject object Configuration
    * @param security object Security
    * @param errMsg string error message
    */
   function DisplayViewMentoredStudents(&$configObject, &$security, $errMsg, $serverAddress) {
      DisplayBaseFull::DisplayBaseFull($configObject, $security);
      $this->mProdiId = $security->mUserIdentity->GetProperty("UserProdiId");
      $this->mUserId = $security->mUserIdentity->GetProperty("UserReferenceId");
      $this->mErrorMessage = $errMsg;
      $this->mDisplay = true;
      
      //::star mod blok
      $modSetting = $configObject->GetValue('enabled_module');
      $modSettingKbkMahasiswa = $modSetting['kbk']['mahasiswa'];
      $this->mModBlok = $modSettingKbkMahasiswa;
      //::end
      if ($serverAddress != ""){
         $this->mServiceServer = $serverAddress;
      } else {
         $this->mServiceServer = $this->mrUserSession->GetProperty("ServerServiceAddress");
         $this->mDisplay = true;
      }
      $this->SetErrorAndEmptyBox();
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'kbk_dosen/templates/');
      $this->SetTemplateFile('view_mentored_students.html');
   }
   
 function ShowUnitOption(){
   $referenceObj = new Reference($this->mrConfig);
   $unit = $referenceObj->GetAllUnitData('101');
      if ($unit !== false) {
         if (!empty($unit)) {
            $this->SetAttribute('unit', 'visibility','visible');
            $this->AddVar('unit', 'URL_VIEW', $this->mrConfig->GetURL('kbk_dosen','mentored_students','view'));
            foreach($unit as $key=>$value) {
               $unit[$key]["addr"] = $this->mrConfig->Enc($value["service_address"]);
               if ($value["service_address"] == $this->mServiceServer){
                  $unit[$key]["selected"] = "selected";
               }else {
                  $unit[$key]["selected"] = "";
               }
            }
            $this->ParseData("unit_list", $unit, "SIA_");
         }
      } else {
         $this->mErrorMessage .= "Pengambilan data unit tidak berhasil\n".$this->mDosenServiceObj->GetProperty("ErrorMessages");
         $this->ShowErrorBox();
      }
   }
   
   /**
    * DisplayViewMentoredStudents::GetAllMentoredStudents
    * Method ini digunakan untuk mengambil data mahasiswa yang merupakan bimbingan dari dosen yang bersangkutan
    *
    * @param
    * @return array Data matakuliah
    */
   function GetAllMentoredStudents($limit="", $offset="")
   {
      $students = $this->mDosenServiceObj->GetAllMentoredStudents();
      if (false === $students) {
         return false;
      }
      else {
         return $students;
      }
   }

   function DoInitializeService() {
      $this->mDosenServiceObj =  New DosenClientService($this->mServiceServer,false, $this->mUserId, $this->mProdiId);
      if ($this->mDosenServiceObj->IsError()) {
         $this->mErrorMessage .= $this->mUserService->GetProperty("ErrorMessages");
         return false;
      }else{
         //$this->mDosenServiceObj->SetProperty("UserRole", 2);
         $this->mDosenServiceObj->SetProperty("UserRole", 9);
         $arrService = $this->mrUserSession->GetProperty("ServerServiceAvailable");
			$result = $this->mDosenServiceObj->DoSiaSetting();
			$this->DoUpdateServiceStatus($this->mDosenServiceObj, $result, 'SIA');
         if (false === $result) {
            $this->mErrorMessage .= $this->mDosenServiceObj->GetProperty("ErrorMessages");
            $this->mrUserSession->SetProperty("ServerServiceAvailable", $arrService);
            $this->mrSecurity->RefreshSessionInfo();
            return false;
         } else {
            return true;
         }
			return $result;
      }
   }
   
   function CheckModBlok($mod = ''){
   	$modSetMahasiswa = $this->mModBlok;
   	$statusMod = false;
   	if(!empty($modSetMahasiswa)){
   		if(in_array($mod,$modSetMahasiswa)){
   			$statusMod = true;
   		}
   	}
   	return $statusMod;
   }

   function Display() {
      // cek apakah service sia is available
     $init = $this->DoInitializeService();
      DisplayBaseFull::Display("[ Logout ]");

     //$this->ShowUnitOption();
     //::start cek isHasilStudiKbk
     $statusMod = $this->CheckModBlok('hasil_studi_kbk');
     //::end cek
      if (false === $init){
         $this->ShowErrorBox();
      }
      else {
         if (false !== $this->mDisplay){
            $this->SetAttribute("keterangan", "visibility", "visible");
            $this->AddVar("keterangan", "DOSEN_PEMBIMBING", $this->mrUserSession->GetProperty("UserFullName"));
            $mentoredStudents = $this->GetAllMentoredStudents();
            //print_r($mentoredStudents);
            if (false !== $mentoredStudents) {
               //tampilkan data matakuliah ditawarkan
               if (!empty($mentoredStudents)){
                  $siaAddress = "&sia=".$this->mrConfig->Enc($this->mServiceServer);
                  foreach ($mentoredStudents as $key=>$value){
                     $urladditional = "&niu=" . $this->mrConfig->Enc($value["id"]) . "&prodi=" . $this->mrConfig->Enc($value["prodi_id"]) . "&view=" . $this->mrConfig->Enc("dosen").$siaAddress;
                     if($statusMod){	
		               	$mentoredStudents[$key]["url_khs_blok"] = "<a href=\"".$this->mrConfig->GetURL('kbk_hasil_studi','hasil_studi','view'). $urladditional."\" >KHS Blok</a>";
		               }else{
		               	$mentoredStudents[$key]["url_khs_blok"] = "";
		               }
		               //::end show link khs blok
                     $mentoredStudents[$key]["url_profil"] = $this->mrConfig->GetURL('kbk_user','profile','view') . "&niu=" . $this->mrConfig->Enc($value["id"]) . "&view=" . $this->mrConfig->Enc("dosen").$siaAddress;
                     $mentoredStudents[$key]["url_krs"] = $this->mrConfig->GetURL('kbk_academic_plan','academic_plan','view') . $urladditional;
                     $mentoredStudents[$key]["url_khs"] = $this->mrConfig->GetURL('kbk_academic_report','academic_report','view'). $urladditional;
                     $mentoredStudents[$key]["url_transkrip"] = $this->mrConfig->GetURL('kbk_academic_report','academic_transcript','view'). $urladditional;
                     $mentoredStudents[$key]["url_kkm"] = $this->mrConfig->GetURL('kbk_academic_report','academic_progress','view'). $urladditional;
                     $mentoredStudents[$key]["url_riwayat_nilai"] = $this->mrConfig->GetURL('kbk_academic_report','grade_history','view'). "&niu=" . $this->mrConfig->Enc($value["id"]).$siaAddress ;
                     if ($mentoredStudents[$key]['approval_ke'] == '0') {
                        $mentoredStudents[$key]["status_krs"] = 'Belum disetujui';
                        //$mentoredStudents[$key]["status_krs_style"] = 'style="color:red"';
                        $mentoredStudents[$key]["status_krs_style"] = 'style="background-color: #BC904B !important; color:white"';
                     } else if (($mentoredStudents[$key]['approval_ke'] == '1') || ($mentoredStudents[$key]['approval_ke'] == '2')) {
                        //$mentoredStudents[$key]["status_krs"] = 'Sudah disetujui';
                        $mentoredStudents[$key]["status_krs"] = 'Sudah KRS'; # untuk KBK agar mudah dipahami
                        $mentoredStudents[$key]["status_krs_style"] = 'style="background-color: #0561C4 !important; color:white"';
                     } else {
                        $mentoredStudents[$key]["status_krs"] = 'Belum KRS';
                        $mentoredStudents[$key]["status_krs_style"] = 'style="background-color: #AA2222 !important; color:white"';
                     }
                  }//print_r($mentoredStudents);
                  $this->ParseData('bimbingan_item', $mentoredStudents, "BIMBINGAN_", 1);
               }
               $this->AddVar("bimbingan", "STUDENT_AVAILABLE", "YES");
            }else {
               $this->mErrorMessage .= $this->mDosenServiceObj->GetProperty("ErrorMessages");
               $this->AddVar("empty_box", "WARNING_MESSAGE",
               $this->ComposeErrorMessage("Data mahasiswa bimbingan tidak ditemukan. " , $this->mErrorMessage));
               $this->AddVar("empty_type", "TYPE", "INFO");
               $this->AddVar("bimbingan", "STUDENT_AVAILABLE", "NO");
            }
         }
      }
      $this->DisplayTemplate();
   }
   function ShowErrorBox() {
      $this->AddVar("error_box", "ERROR_MESSAGE",
            $this->ComposeErrorMessage("Pengambilan data mahasiswa bimbingan tidak berhasil. " , $this->mErrorMessage));
      $this->SetAttribute('error_box', 'visibility', 'visible');
   }
}
?>