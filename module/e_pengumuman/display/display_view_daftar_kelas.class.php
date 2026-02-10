<?php
/**
 * DisplayViewKelas
 * Display class for view kelas
 * 
 * @package e_pengumuman
 * @author Refit Gustaroska
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-07-08
 * @revision 
 *
 */

class DisplayViewKelas extends DisplayBaseFull
{

   var $mErrorMessage;
   
   /**
    * DisplayViewKelas::DisplayViewKelas
    * Constructor for DisplayViewKelas class
    *
    * @param $configObject object Configuration
    * @param $securityObj  object Security
    * @return void
    */
   function DisplayViewKelas(&$configObject, $securityObj) 
   {
      DisplayBaseFull::DisplayBaseFull($configObject, $securityObj); 
      $this->SetErrorAndEmptyBox();  
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'e_pengumuman/templates/');
      $this->SetTemplateFile('view_daftar_kelas.html');
   }
   
    
   /**
    * DisplayViewUser::Display
    * Parsing data to template
    *
    * @param 
    * @return void
    */
   function Display() 
   {
      
      DisplayBaseFull::Display("[ Logout ]"); 
		$this->mTemplate->AddVar("content", "APPLICATION_MODULE", "Daftar Kelas");
      $objPengumuman = new PengumumanClientService($this->mrUserSession->GetProperty("ServerServiceAddress"),false);             
      $dataKelas = $objPengumuman->GetListKelas($this->mrUserSession->GetProperty('User'), $this->mrUserSession->GetProperty('Role'));
     
      if ($dataKelas) {
         $i=1;
         foreach($dataKelas as $val) {    
            $this->AddVar('list_kelas', 'KELAS_NO', $i++);          
            $this->AddVar('list_kelas', 'URL_PENGUMUMAN', $this->mrConfig->GetURL('e_pengumuman','pengumuman','view')."&kelas_id=".$this->mrConfig->Enc($val['klsId']));
            $this->AddVar('list_kelas', 'KELAS_NAMA', $val['klsNama']);            
            if ($i%2 != 0){
               $this->AddVar('list_kelas', 'EVEN', ' class="table-common-even"');
            }else{
               $this->AddVar('list_kelas', 'EVEN', '');   
            }
            $this->mTemplate->parseTemplate("list_kelas", "a");
            
         }
      }
            
      $this->DisplayTemplate();
   }
   
   function ShowErrorBox($infoavailable = "NO") {
      $this->AddVar("error_box", "ERROR_MESSAGE",  
            $this->ComposeErrorMessage("Pengambilan data kelas tidak berhasil." , $this->mErrorMessage));   
      $this->AddVar("data_profile", "INFO_AVAILABLE", $infoavailable);   
      $this->SetAttribute('error_box', 'visibility', 'visible');
   }
}

?>