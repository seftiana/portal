<?php
/**
 * ProcessDosen
 * Process class Dosen
 * 
 * @package 
 * @author Maya Alipin
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-04-11
 * @revision 
 *
 * commented statement (/*)  is not defined yet please do not erase 
 */

class ProcessDosen extends ProcessBase {
      var $mDosenServiceObj;
      var $mServiceServerAddress;
      var $mProcessDosenError;
      var $mUserIdentity;

   /**
    * ProcessDosen::ProcessDosen
    * Constructor for ProcessDosen class
    *
    * @param $configObject object Configuration
    * @return void
    */
   function ProcessDosen($configObject, $security, $serviceAddress) 
   {
         ProcessBase::ProcessBase($configObject) ;
         $this->mServiceServerAddress = $serviceAddress;
         $this->mUserIdentity = $security->mUserIdentity;
         $this->mDosenServiceObj = new DosenClientService($this->mServiceServerAddress, false, 
         $this->mUserIdentity->GetProperty("UserReferenceId"), $this->mUserIdentity->GetProperty("UserProdiId"));
   }
   
      /**
       * ProcessDosen::DoUpdateNilai
       * update nilai for kelas
       *
       * @param arrKrsItemId integer kelas id
       * @param arrNilai integer kelas id
       * @param arrIsMhsTambahan array flag 0|1 is mahasiswa tambahan
       * @return boolean hasil update
       */
      function DoUpdateNilai($arrKrsItemId, $arrNilai, $arrIsMhsTambahan, $semId, $arrNiu,$kodeProdi) 
      {      	       	
         $result = $this->mDosenServiceObj->DoUpdateAllNilaiForKelas($arrKrsItemId, $arrNilai, $arrIsMhsTambahan,$semId, $arrNiu,$kodeProdi,
                     array($this->mUserIdentity->GetProperty("ApplicationId"), $this->mUserIdentity->GetProperty("UserReferenceId"), 
                              $this->mUserIdentity->GetProperty("UserFullName")));
         if ($result === false) {
            $this->mProcessDosenError = $this->mDosenServiceObj->GetProperty("ErrorMessages");
            return false;
         } else {
            return $result;
         }
      }
	  
    function DoUpdateDpna($params) {

        if(!empty($params['cek']['krsdtId'])) {
            $array=array(
                    'cp'=>$params['cara_penilaian'],
                    'krsdtId'=>$params['cek']['krsdtId'],
                    'inHarian'=>$params['inHarian'],
                    'inMandiri'=>$params['inMandiri'],
					'inKelompok'=>$params['inKelompok'],
					'inPresentasi'=>$params['inPresentasi'],
                    'inTerstruktur'=>$params['inTerstruktur'],
                    'inTambahan'=>$params['inTambahan'],
                    'inUts'=>$params['inUts'],
                    'inUas'=>$params['inUas'],
                    'nilHarian'=>$params['nilHarian'],
                    'nilMandiri'=>$params['nilMandiri'],
					'nilKelompok'=>$params['nilKelompok'],
					'nilPresentasi'=>$params['nilPresentasi'],
                    'nilTerstruktur'=>$params['nilTerstruktur'],
                    'nilTambahan'=>$params['nilTambahan'],
                    'nilUts'=>$params['nilUts'],
                    'nilUas'=>$params['nilUas'],
                    'nilAbsolut'=>$params['nilAbsolut'],
                    'nilai'=>$params['nilai']
                    ,'inRemedial'=>$params['inRemedial'] #add ccp 30-08-2018
            );
        }
        $result=$this->mDosenServiceObj->UpdateKrsDpna($array);
        if ($result === false) {
            $this->mProcessDosenError = $this->mDosenServiceObj->GetProperty("ErrorMessages");
            return false;
        } else {
            return $result;
        }
    }
	
	function DoUpdateMasterPresensiKelas($tema,$pokok_bahasan,$rencana,$terlaksana,$pertemuanId) {
		$param=array($tema,$pokok_bahasan,$rencana,$terlaksana,$pertemuanId);
		$result=$this->mDosenServiceObj->DoUpdateMasterPresensiKelas($param);
		if ($result === false) {
            $this->mProcessDosenError = $this->mDosenServiceObj->GetProperty("ErrorMessages");
            return false;
        } else {
            return $result;
        }
	}
	
	function DoInsertPresensiKelas($pertemuanId, $nipDosen, $arrNim, $arrStatus) {
		$param=array($pertemuanId, $nipDosen, $arrNim, $arrStatus);
		$result=$this->mDosenServiceObj->DoInsertPresensiKelas($param);
		if ($result === false) {
            $this->mProcessDosenError = $this->mDosenServiceObj->GetProperty("ErrorMessages");
            return false;
        } else {
            return $result;
        }
	}
	
	function DoUpdatePresensiKelas($pertemuanId, $nipDosen, $dosenPresensiId, $arrNim, $arrStatus) {
		$param=array($pertemuanId, $nipDosen, $dosenPresensiId, $arrNim, $arrStatus);
		$result=$this->mDosenServiceObj->DoUpdatePresensiKelas($param);
		if ($result === false) {
            $this->mProcessDosenError = $this->mDosenServiceObj->GetProperty("ErrorMessages");
            return false;
        } else {
            return $result;
        }
	}

  /**
   * Merubah bobot nilai
  */
  function DoUpdateBobot($paramsBobot, $kelasId){    
    $param = array_merge($paramsBobot, array($kelasId));
    $result=$this->mDosenServiceObj->DoUpdateBobot($param);
    if ($result === false) {
            $this->mProcessDosenError = $this->mDosenServiceObj->GetProperty("ErrorMessages");
            return false;
        } else {
            return $result;
        }
  }

    #add cecep 14-agustus-2020
    function DoUpdateMasterPresensiKelasHistory($tema,$pokok_bahasan,$pertemuanId) {
	$param=array($tema,$pokok_bahasan,$pertemuanId);
	$result=$this->mDosenServiceObj->DoUpdateMasterPresensiKelasHistory($param);
	if ($result === false) {
            $this->mProcessDosenError = $this->mDosenServiceObj->GetProperty("ErrorMessages");
            return false;
        } else {
            return $result;
        }
    }
	
	function DoUpdateMasterPresensiKelasValidasi($tema,$pertemuanId) {
		$param=array($tema,$pertemuanId);
		$result=$this->mDosenServiceObj->DoUpdateMasterPresensiKelasValidasi($param);
		if ($result === false) {
			$this->mProcessDosenError = $this->mDosenServiceObj->GetProperty("ErrorMessages");
			return false;
		} else {
			return $result;
		}
    }
	
}