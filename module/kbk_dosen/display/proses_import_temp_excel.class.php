<?php
/*
Author : Nikolius
Email : n1colius.lau@gmail.com
Date : 10/16/2012 9:54:10 AM
*/
class ProsesImportTempExcel extends ProcessBase {
   var $mDosenServiceObj;
   var $mServiceServerAddress;      
   var $mUserIdentity;
   var $mSemId;
   var $mKlsId;      
   var $files;
   
   function ProsesImportTempExcel($configObject, $security, $serviceAddress,$klsId,$files){
      ProcessBase::ProcessBase($configObject);
      $this->mServiceServerAddress = $serviceAddress;
      $this->mUserIdentity = $security->mUserIdentity;      
      $this->mKlsId = $klsId;
      $this->files = $files;

      $this->mDosenServiceObj = new DosenClientService($this->mServiceServerAddress, false, 
      $this->mUserIdentity->GetProperty("UserReferenceId"), $this->mUserIdentity->GetProperty("UserProdiId"));      
   }

   function getKomponenNilai($klsId){
      $result = $this->mDosenServiceObj->getKomponenNilai($klsId);
      return $result;          
   }   

   function doImportInputNilai($dataReadXls,$klsId,$komponenNilai){
      $unitId = $this->mUserIdentity->GetProperty("ApplicationId");
      $nip = $this->mUserIdentity->GetProperty("UserReferenceId");
      $namaUser = $this->mUserIdentity->GetProperty("UserFullName");

      $result = $this->mDosenServiceObj->doImportInputNilai($dataReadXls,$klsId,$komponenNilai,$unitId,$nip,$namaUser);
      return $result;    
   }

   function importTempExcel(){      
      $tmpFolder = $this->mrConfig->GetValue('tmp_folder');      

      //require library
      $this->mLibDir = $this->mrConfig->GetValue('app_lib').'readExcel/';
      require_once($this->mLibDir.'ExcelReader.class.php');      

      //cek apakah file yg diupload file excel
      if (!preg_match('/[.](xls|XLS)$/', $this->files['name'])) {         
         return false;
      }
      
      //upload file excel ke folder temporary
      $fileName = date('YmdHis').'.xls'; 
      $prosesUpload = move_uploaded_file($this->files['tmp_name'], $tmpFolder.$fileName);      
      if($prosesUpload === false){         
         return false;     
      }
            
      //baca file
      if(file_exists($tmpFolder.$fileName)){
         $xls = new Spreadsheet_Excel_Reader();
         $xls->setOutputEncoding('CP1251');
         $xls->read($tmpFolder.$fileName);
         $dataReadXls = $xls;
         
         if($dataReadXls === FALSE){
            return false;
         }
      }      

      //convert data excel ke array
      $i=11;
      $incre=0;
      $arrDataReadXls = array();
      while($dataReadXls->sheets[0]['cells'][$i][1] != ''):
         $arrDataReadXls[$incre]['nim'] = $dataReadXls->sheets[0]['cells'][$i][1];
         $arrDataReadXls[$incre]['komponenSatu'] = ($dataReadXls->sheets[0]['cells'][$i][4] == "" ? 0 : $dataReadXls->sheets[0]['cells'][$i][4]);         
         $arrDataReadXls[$incre]['komponenDua'] = ($dataReadXls->sheets[0]['cells'][$i][5] == "" ? 0 : $dataReadXls->sheets[0]['cells'][$i][5]);
         $arrDataReadXls[$incre]['komponenTiga'] = ($dataReadXls->sheets[0]['cells'][$i][6] == "" ? 0 : $dataReadXls->sheets[0]['cells'][$i][6]);
         $arrDataReadXls[$incre]['komponenEmpat'] = ($dataReadXls->sheets[0]['cells'][$i][7] == "" ? 0 : $dataReadXls->sheets[0]['cells'][$i][7]);
         $arrDataReadXls[$incre]['komponenUts'] = ($dataReadXls->sheets[0]['cells'][$i][8] == "" ? 0 : $dataReadXls->sheets[0]['cells'][$i][8]);          
         $arrDataReadXls[$incre]['komponenUas'] = ($dataReadXls->sheets[0]['cells'][$i][9] == "" ? 0 : $dataReadXls->sheets[0]['cells'][$i][9]);
         $arrDataReadXls[$incre]['nilKodeBaru'] = $dataReadXls->sheets[0]['cells'][$i][10];

         $i++;
         $incre++;
      endwhile;      

      //parameter persentase komponen nilai      
      $resKomponenNilai = $this->getKomponenNilai($this->mKlsId);      
      $komponenNilai['bobotKomponen1'] = $resKomponenNilai[0]['BOBOT_HARIAN'];
      $komponenNilai['bobotKomponen2'] = $resKomponenNilai[0]['BOBOT_MANDIRI'];
      $komponenNilai['bobotKomponen3'] = $resKomponenNilai[0]['BOBOT_TERSTRUKTUR'];
      $komponenNilai['bobotKomponen4'] = $resKomponenNilai[0]['BOBOT_TAMBAHAN'];
      $komponenNilai['bobotKomponenUts'] = $resKomponenNilai[0]['BOBOT_UTS'];
      $komponenNilai['bobotKomponenUas'] = $resKomponenNilai[0]['BOBOT_UAS'];

      $prosesImport = $this->doImportInputNilai($arrDataReadXls,$this->mKlsId,$komponenNilai);

      //hapus file excel yg telah terimport tadi
      @unlink($tmpFolder.$fileName);

      return $prosesImport;
   }
}
?>