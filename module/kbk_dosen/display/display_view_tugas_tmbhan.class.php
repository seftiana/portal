<?php
/**
 * @author Nikolius
 * @email n1colius.lau@gmail.com
 * @date 10 - 9 - 2012 15:44
 */

class DisplayViewTugasTmbhan extends DisplayBaseFull{
   
   var $mServiceServerAddress;
   var $mDosenServiceObj;
   var $proposedClassObj;
   var $userClassObj;
   var $mKelasId;
   var $mSemester;
   var $mMhsNiu;
   var $mKrsdtId;
   var $psnErr;
   var $psnMsg;
   
   function DisplayViewTugasTmbhan(&$configObject,&$security,$serverAddress,$kelas,$semester,$mhsNiu,$krsdtId,$psnErr,$psnMsg){
      
      DisplayBaseFull::DisplayBaseFull($configObject, $security);
      $this->mServiceServerAddress = $serverAddress;
      $this->mKelasId = $kelas;
      $this->mSemester = $semester;
      $this->mMhsNiu = $mhsNiu;
      $this->mKrsdtId = $krsdtId;
      $this->psnErr = $psnErr;
      $this->psnMsg = $psnMsg;
      
      $this->mDosenServiceObj = new DosenClientService($this->mServiceServerAddress, false,$this->mrUserSession->GetProperty("UserReferenceId"), $this->mrUserSession->GetProperty("UserProdiId"));
      
      $this->proposedClassObj = new ProposedClassesClientService($this->mServiceServerAddress, false, $this->mrUserSession->GetProperty("UserReferenceId"),$this->mrUserSession->GetProperty("UserProdiId"));
      $this->proposedClassObj->SetProperty("ClassId", $this->mKelasId);
      
      $this->userClassObj = new UserClientService($this->mServiceServerAddress, false, $this->mrUserSession->GetProperty("UserReferenceId"));
      
      $this->SetErrorAndEmptyBox();
      $this->SetTemplateBasedir($configObject->GetValue('app_module').'dosen/templates');
      $this->SetTemplateFile('view_tugas_tmbhan.html');   
   }
   
   function GetInfoKelas(){        
     $dataKelas = $this->proposedClassObj->GetAllInfoDetailForClass();
     return $dataKelas;
   }
   
   function getUserMhs($mhsNiu){
      $role = 1; //mhs rolenya 1
      $result = $this->userClassObj->GetUserProfileMhs($mhsNiu,$role);
      return $result[0];   
   }
   
   function getDataTugasTmbhan($klsId,$krsdtId,$mhsNiu){
      $result = $this->mDosenServiceObj->getDataTugasTmbhan($klsId,$krsdtId,$mhsNiu);
      return $result;
   }
   
   function Display(){            
      DisplayBaseFull::Display("[ Logout ]");
      
      //cek apakah ada pesan error
      if($this->psnErr != ''){
         $this->ShowErrorBox($this->psnErr);     
      }
      
      //cek apakah ada pesan info
      if($this->psnMsg != ''){
         $this->showInfoBox($this->psnMsg);            
      }
      
      //url
      $paramUrl = '&kelas='.$this->mrConfig->enc($this->mKelasId).'&sia='.$this->mrConfig->enc($this->mServiceServerAddress).'&mhs='.$this->mrConfig->enc($this->mMhsNiu).'&krsdt='.$this->mrConfig->enc($this->mKrsdtId).'&smt='.$this->mrConfig->enc($this->mSemester);
      $urlForm = $this->mrConfig->GetURL("dosen", "form_tgs_tmbhan","view").$paramUrl;
      $urlFormHapus = $this->mrConfig->GetURL("dosen", "tgs_tmbhan","proses").$paramUrl;
      $this->AddVar("content", "URL_TAMBAH", $urlForm.'&opsi='.$this->mrConfig->enc('tambah'));
      
      $dataKelas = $this->GetInfoKelas();
      if ($dataKelas != false){
          if (isset($dataKelas["detil"][0]["nama"]))
              $this->AddVar("content", "MATAKULIAH", $dataKelas["detil"][0]["nama"]);
          if (isset($dataKelas["detil"][0]["nama_mata_kuliah"]))
              $this->AddVar("content", "KELAS", $dataKelas["detil"][0]["nama_mata_kuliah"]);
      }
      
      $semesterInfo = $this->mDosenServiceObj->GetNamaSemesterForSemesterId($this->mSemester);
      $semesterInfo = $semesterInfo[0]["nama"] . " " . $semesterInfo[0]["tahun"] . "/" . ($semesterInfo[0]["tahun"]+1);
      $this->AddVar("content", "SEMESTER", $semesterInfo);
      
      $detailMhs = $this->getUserMhs($this->mMhsNiu);
      $this->AddVar("content","NIM",$detailMhs['nim']);
      $this->AddVar("content","MHS_NAMA",$detailMhs['nama']);      
      
      //ambil data tugas
      $dataTugas = $this->getDataTugasTmbhan($this->mKelasId,$this->mKrsdtId,$this->mMhsNiu);                        
      if($dataTugas[0]['krsdpnatgsId'] != ''){         
         $this->AddVar("data_tugas", "EMPTY", "NO");                           
         for($i=0;$i<count($dataTugas);$i++) {
            $urlEdit = $urlForm.'&opsi='.$this->mrConfig->enc('edit').'&id='.$this->mrConfig->enc($dataTugas[$i]['krsdpnatgsId']);
            $urlHapus = $urlFormHapus.'&opsi='.$this->mrConfig->enc('hapus').'&id='.$this->mrConfig->enc($dataTugas[$i]['krsdpnatgsId']);
            
            $this->AddVar("list_data_tugas", "NO", $i+1);
            $this->AddVar("list_data_tugas", "KRSDPNATGSJUDULTGS", $dataTugas[$i]['krsdpnatgsJudulTgs']);
            $this->AddVar("list_data_tugas","URL_EDIT",$urlEdit);
            $this->AddVar("list_data_tugas","URL_HAPUS",$urlHapus);
            $this->mTemplate->parseTemplate("list_data_tugas", "a");     
         }
      }else{         
         $this->AddVar("data_tugas", "EMPTY", "YES");         
      }      
      
      $this->DisplayTemplate();      
   }
   
   function ShowErrorBox($strError){        
      $this->SetAttribute('error_box', 'visibility', 'visible');        
      $this->AddVar("error_box", "ERROR_MESSAGE", $this->ComposeErrorMessage($strError));
   }
   
    function showInfoBox($strInfo){
      $this->SetAttribute('error_box', 'visibility', 'visible');
      $this->AddVar('error_type','TYPE','INFO');
      $this->AddVar("error_box", "ERROR_MESSAGE", $strInfo);        
    }   
}

?>