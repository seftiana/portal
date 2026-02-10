<?php
/**
 * SIASettingClientService
 * SIASettingClientService class
 * 
 * @package communication 
 * @author Maya Alipin 
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-02-27
 * @revision 
 *
 */


class SIASettingClientService extends ServiceClient{
   
   var $mReqServiceParams;
   
   /**
    * var mUserId String userId
    */
   var $mUserId;
   
   /**
    * var mUserRole integer userRole
    */
   var $mUserRole;
   
   /**
    * var mUserProdiId integer program studi id
    */
   var $mUserProdiId;
   
   /**
    * var mSemesterProdiId integer semester + program studi id (sempId)
    */
   var $mSemesterProdiId;
   /**
   
    * var mSemesterProdiSemesterId integer semester id (sempSemId)
    */
   var $mSemesterProdiSemesterId;
   
   /**
    * var mSemesterProdiIsAktif booelan semester is aktif
    */
   var $mSemesterProdiIsAktif;
   
   /**
    * var mSemesterProdiTanggalKrsMulai datetime tanggal mulai KRS
    */
   var $mSemesterProdiTanggalKrsMulai;
   
   /**
    * var mSemesterProdiTanggalKrsSelesai datetime tanggal selesai KRS
    */
   var $mSemesterProdiTanggalKrsSelesai;
   
   /**
    * var mSemesterProdiTanggalRevisiMulai datetime tanggal mulai revisi KRS
    */
   var $mSemesterProdiTanggalRevisiMulai;
   
   /**
    * var mSemesterProdiTanggalRevisiSelesai datetime tanggal selesai revisi KRS
    */
   var $mSemesterProdiTanggalRevisiSelesai;
   
   /**
    * var mSemesterProdiTanggalInputNilaiOnlineMulai datetime tanggal input nilai online mulai
    */
   var $mSemesterProdiTanggalInputNilaiOnlineMulai;
   
   /**
    * var mSemesterProdiTanggalInputNilaiOnlineSelesai datetime tanggal input nilai online selesai
    */
   var $mSemesterProdiTanggalInputNilaiOnlineSelesai;
   
   /**
    * var mNamaSemester string nama semester
    */
   var $mNamaSemester;
   
   /**
    * var mTahunSemester int tahun semester
    */
   var $mTahunSemester;
   
   /**
    * var mCurrentPeriode constant periode
    */
   var $mCurrentPeriode;
   
   /**
    * var mIsCekAdministrasi boolean administrasi need to be checked
    */
   var $mIsCekAdministrasi;
   
   /**
    * var mCurrentPeriodeInputNilai constant periode input nilai (BUKANPERIODEINPUTNILAI|PERIODEINPUTNILAI)
    */
   var $mCurrentPeriodeInputNilai;
   
   /**
    * SIASettingClientService::SIASettingClientService
    * constructor for SIASettingClient class
    * 
    * @param soap_server string url server
    * @param wsdl_status boolean wsdl status
    * @param userId integer userid
    * @param prodiId integer program studi id
    */
   function SIASettingClientService($soap_server,$wsdl_status, $userId, $prodiId) {
      ServiceClient::ServiceClient($soap_server, $wsdl_status)   ;
      $this->mUserId = $userId;
      $this->mUserProdiId = $prodiId;
      $this->SetReqServiceParams();
   }
   
   function SetReqServiceParams($module="", $sub="") {
      if ($module == "" || $sub == ""){
         $this->mReqServiceParams = array('pModule' => 'sia_setting', 
                                          'pSub' => 'sia_setting');
      } else {
         $this->mReqServiceParams = array('pModule' => $module, 
                                          'pSub' => $sub);
      }
   }
   
   
   
   /**
    * SIASettingClientService::DoSiaSetting
    * set all attributes 
    *
    * @param 
    * @return boolean isSettingSuccess
    */   
   function DoSiaSetting() {
      $this->mReqServiceParams["pAct"] = "GetSiaSetting";
      $dataParams = array($this->mUserRole, $this->mUserProdiId);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $arrSetting = $this->Call ("Dispatch", $serviceParams);
      
      if ($arrSetting === false){
         return false;
      }else{
         $arrSetting = $arrSetting[0];
         $this->mSemesterProdiId = $arrSetting["semp_id"];
         $this->mSemesterProdiSemesterId = $arrSetting["semp_sem_id"];
         $this->mSemesterProdiIsAktif = $arrSetting["is_aktif"];
         $this->mSemesterProdiTanggalKrsMulai = $arrSetting["krs_mulai"];
         $this->mSemesterProdiTanggalKrsSelesai = $arrSetting["krs_selesai"];
         $this->mSemesterProdiTanggalRevisiMulai = $arrSetting["revisi_mulai"];
         $this->mSemesterProdiTanggalRevisiSelesai = $arrSetting["revisi_selesai"];
         $this->mSemesterProdiTanggalInputNilaiOnlineMulai = $arrSetting["input_nilai_mulai"];
         $this->mSemesterProdiTanggalInputNilaiOnlineSelesai = $arrSetting["input_nilai_selesai"];
         $this->mNamaSemester = $arrSetting["nama_semester"];
         $this->mTahunSemester = $arrSetting["tahun"];
         $this->mCurrentPeriode = $arrSetting["current_periode"];
         $this->mIsCekAdministrasi = $arrSetting["is_cek_administrasi"];
         $this->mCurrentPeriodeInputNilai = $arrSetting["current_periode_input_nilai"];
         return true;
      }
   }
   
   /**
    * SIASettingClientService::GetAllPassedSemesterMahasiswa
    * get semester passed by mahasiswa
    *
    * @return array data semester
    */   
   function GetAllPassedSemesterMahasiswa() {
      
      $this->mReqServiceParams["pAct"] = "GetAllPassedSemesterMahasiswa";
      $dataParams = array($this->mUserId);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;
      
   }
   
/**   
Note: belum tau dipake apa engga
   /**
    * SIASettingClientService::GetSemesterInformation
    * get semester information (all property of this class)
    *
    * @return array data semester information (this class property)
    /   
   function GetSemesterInformation() {
      
      $this->mReqServiceParams["pAct"] = "GetSemesterInformation";
      $dataParams = array($this->mSemesterProdiId);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", serviceParams);
      return $result;
   }
**/


   /**
    * SIASettingClientService::GetAllPassedSemesterMahasiswa
    * get semester id
    *
    * @return array data semester
    */   
   function GetTranslatedSempIdIntoSemId() {
      $this->mReqServiceParams["pAct"] = "GetTranslatedSemesterProdiIdIntoSemesterId";
      $dataParams = array($this->mSemesterProdiId, $this->mUserProdiId);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", serviceParams);
      return $result;
   }   
   
   function GetBobotKeteranganNilai() {
      $this->mReqServiceParams["pAct"] = "GetBobotKeteranganNilai";
      $dataParams = array($this->mUserProdiId);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      /*$this->Request();
	  $this->Response();
	  $this->Debug();
	  print_r($result);
	  exit();*/
      return $result;
   }
   
   function DoCekIsMahasiswaHasRegistrationForSemester() {
      $this->mReqServiceParams['pAct'] = "DoCekIsMahasiswaHasRegistrationForSemester";
      $dataParams = array($this->mUserId, $this->mSemesterProdiSemesterId);
      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call("Dispatch", $serviceParams);
      return $result;
   }
   
   /**
    * SIASettingClientService::GetAllSupportedSemesterDosen
    * get semester supported by dosen
    *
    * @return array data semester
    */   
   function GetAllSupportedSemesterDosen() {      
      $this->mReqServiceParams["pAct"] = "GetAllSupportedSemesterDosen";
      $dataParams = array($this->mUserId);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;      
   }
      
      
   /**
    * SIASettingClientService::GetAllPilihanNilai
    * get pilihan nilai given by dosen
    *
    * @param integer 0|1 with empty value, nilai value with empty string
    * @return array data pilihan nilai
    */   
   function GetAllPilihanNilai($withEmptyValue=0,$kodeProdi='') {
      $this->mReqServiceParams["pAct"] = "GetAllPilihanNilai";
      $dataParams = array($withEmptyValue,$kodeProdi);
      $serviceParams = array($this->mReqServiceParams,$dataParams);      
      $result = $this->Call ("Dispatch", $serviceParams);
      /*$this->Request();
	  $this->Response();
	  $this->Debug();
	  print_r($result);
	  exit();*/
      return $result;      
   }
   
   
   function GetNamaSemesterForSemesterId($semId) {
      $this->mReqServiceParams["pAct"] = "GetNamaSemesterForSemesterId";
      $dataParams = array($semId);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;      
   }
   
   function GetNamaSemesterForSemesterProdiId() {
      $this->mReqServiceParams["pAct"] = "GetNamaSemesterForSemesterProdiId";
      $dataParams = array($this->mSemesterProdiId, $this->mUserProdiId);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;      
   }

   function GetSemesterProdiIdForSemesterId($sempId,$prodiKode) {
      $this->mReqServiceParams["pAct"] = "GetSemesterProdiIdForSemesterId";
      $dataParams = array($sempId,$prodiKode);
      $serviceParams = array($this->mReqServiceParams,$dataParams);//print_r($serviceParams);exit;
      $result = $this->Call ("Dispatch", $serviceParams);
      /*$this->Request();
	  $this->Response();
	  $this->Debug();
	  print_r($result);
	  exit();*/
      return $result;      
   }

   function GetSemesterInformation($sempId) {
      $this->mReqServiceParams["pAct"] = "GetSemesterInformation";
      $dataParams = array($sempId);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;      
   }

   #add ccp 30-08-2018
   function GetSemesterInformationRemedial($sempId) {
      $this->mReqServiceParams["pAct"] = "GetSemesterInformationRemedial";
      $dataParams = array($sempId);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;      
   }
   
}
?>