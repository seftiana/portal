<?
/**
 * ProcessSms
 * ProcessSms class
 * 
 * @package sms 
 * @author Maya Alipin 
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-06-24
 * @revision 
 *
 */

class ProcessSms extends ProcessBase {
   var $mParamSms;
   
   function ProcessSms($configObject, $param) {
      ProcessBase::ProcessBase($configObject);
      $this->mParamSms = $param;
   }
   
   function GetIpk() {
      $loginObj = new ProsesLogin($this->mrConfig);
      
      if ($loginObj->LoginCheck($this->mParamSms['param1'], $this->mParamSms['param2'])) {
      
         $soap_server = $this->GetServiceAddress($this->mParamSms['param1']);
         
         if (false !== $soap_server) {
            $smsObj = new SmsClientService($soap_server,false) ;
            $dataIpk = $smsObj->GetIpk($this->mParamSms['param1']);
            if (false !== $dataIpk) {
                  return 'IPK Anda adalah '.$dataIpk[0]['ipk'].' dengan sks kumulatif adalah '.$dataIpk[0]['sks_total'].
                     ', terdiri atas '.$dataIpk[0]['sks_wajib'].' sks wajib dan '.$dataIpk[0]['sks_pilihan'].' sks pilihan.';  
            } else {
                  return 'Maaf, data IPK Anda saat ini belum tersedia.';
            }
         }else {
            return 'Maaf, layanan sedang tidak dapat digunakan.';
         }
      } else {
         return 'Maaf, Anda memasukkan kombinasi username dan password yang salah.';
      }
   }
   
   function GetNilai() {
      $soap_server = $this->GetServiceAddress($this->mParamSms['param1']);
      if (false !== $soap_server) {
         $smsObj = new SmsClientService($soap_server,false) ;
         $dataNilai = $smsObj->GetNilai($this->mParamSms['param1'], $this->mParamSms['param2']);
         if (false !== $dataNilai) {
            return 'Anda mendapat nilai ' . $dataNilai[0]['kode_nilai'] . ' untuk matakuliah '. strtoupper($this->mParamSms['param2']).'.';
         }else {
            return 'Maaf, tidak ada data nilai untuk matakuliah '. strtoupper($this->mParamSms['param2']);
         }
      } else {
            return 'Maaf, layanan sedang tidak dapat digunakan.';
      }
   }
   
   function GetServiceAddress($niu) {
      $refObj = new Reference($this->mrConfig);
      return $refObj->GetServiceAddressByUserId($niu);
   }
}
?>