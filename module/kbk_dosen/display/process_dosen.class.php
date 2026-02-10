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
                    'inTerstruktur'=>$params['inTerstruktur'],
                    'inTambahan'=>$params['inTambahan'],
                    'inUts'=>$params['inUts'],
                    'inUas'=>$params['inUas'],
                    'nilHarian'=>$params['nilHarian'],
                    'nilMandiri'=>$params['nilMandiri'],
                    'nilTerstruktur'=>$params['nilTerstruktur'],
                    'nilTambahan'=>$params['nilTambahan'],
                    'nilUts'=>$params['nilUts'],
                    'nilUas'=>$params['nilUas'],
                    'nilAbsolut'=>$params['nilAbsolut'],
                    'nilai'=>$params['nilai']
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

      function prosesKesediaanWaktuMengajar($param) {
		// validasi
		$arrHari = array('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu');
		if(!in_array($param['hari'], $arrHari)){
			$this->SetProperty("ProcessDosenError", 'Pilih Hari Yang Benar');
			return false;
		}
		$param['jamMulai'] = (int)$param['jamMulai'];
		$param['menitMulai'] = (int)$param['menitMulai'];
		$param['jamSelesai'] = (int)$param['jamSelesai'];
		$param['menitSelesai'] = (int)$param['menitSelesai'];
		if($param['jamMulai'] < 0 or $param['jamMulai'] > 23){
			$this->mProcessDosenError = 'Pilih Jam Mulai Yang Benar';
			return false;
		}
		if($param['menitMulai'] < 0 or $param['menitMulai'] > 59){
			$this->mProcessDosenError = 'Pilih Menit Mulai Yang Benar';
			return false;
		}
		if($param['jamSelesai'] < 0 or $param['jamSelesai'] > 23){
			$this->mProcessDosenError = 'Pilih Jam Selesai Yang Benar';
			return false;
		}
		if($param['menitSelesai'] < 0 or $param['menitSelesai'] > 59){
			$this->mProcessDosenError = 'Pilih Menit Selesai Yang Benar';
			return false;
		}
		
		$jam = str_pad($param['jamMulai'], 2, '0', STR_PAD_LEFT) . ':' . str_pad($param['menitMulai'], 2, '0', STR_PAD_LEFT) . '-' . str_pad($param['jamSelesai'], 2, '0', STR_PAD_LEFT) . ':' . str_pad($param['menitSelesai'], 2, '0', STR_PAD_LEFT);
		if(empty($param['kwm'])){
			$dataParam = array($this->mUserIdentity->GetProperty("UserReferenceId"), $param['hari'], $jam);
			$method = 'insertDataKesediaanWaktuMengajar';
		}else{
			$dataParam = array($param['kwm'], $param['hari'], $jam);
			$method = 'updateDataKesediaanWaktuMengajar';
		}
		$result = $this->mDosenServiceObj->executeMethod($method, $dataParam);
         if ($result === false) {
            $this->mProcessDosenError = $this->mDosenServiceObj->GetProperty("ErrorMessages");
            return false;
         } else {
            return true;
         }
      }
	  
      function deleteKesediaanWaktuMengajar($param) {
		$result = $this->mDosenServiceObj->executeMethod('deleteDataKesediaanWaktuMengajar', $param);
		echo $this->mDosenServiceObj->GetProperty("ErrorMessages");
         if ($result === false) {
            $this->mProcessDosenError = $this->mDosenServiceObj->GetProperty("ErrorMessages");
            return false;
         } else {
            return true;
         }
      }
	  
}