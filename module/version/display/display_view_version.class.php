<?php
/**
 * DisplayViewVersion
 * Display class for view version
 * 
 * @package 
 * @author Gitra Perdana
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-07-03
 * @revision 
 *
 */
class DisplayViewVersion extends DisplayBaseFull {
   var $mDisplayError;

   /**
   * DisplayViewVersion::DisplayViewVersion
   * Constructor for DisplayViewVersion class
   *
   * @param $configObject object Configuration
   * @param $securityObj  object Security
   * @return void
   */
   function DisplayViewVersion (&$configObject, &$security){
      DisplayBaseFull::DisplayBaseFull($configObject, $security);
      $this->SetErrorAndEmptyBox();
      
      $this->SetTemplateBasedir($this->mrConfig->GetValue('app_module') . 'version/templates/');
      $this->SetTemplateFile('view_version.html');
   }

    /**
    * DisplayViewVersion::ReadVersionFile
    * 
    *
    * @param FileName
    * @return String
    */
   function ReadVersionFile ($fileName){     
      if (file_exists($fileName)) {
         $handle = fopen($fileName, "r");
         $contents = fread($handle, filesize($fileName));
         return $contents;
      } else {
         $this->mErrorMessage = "File tidak ditemukan";
         return false;
      }
   }

    /**
    * DisplayViewVersion::Display
    * Parsing data to template
    *
    * @param 
    * @return void
    */
    function Display(){
      DisplayBaseFull::Display('[ Logout ]');
      $version = $this->ReadVersionFile($this->mrConfig->GetValue('docroot') . 'version.txt');
      $version_log =  $this->ReadVersionFile($this->mrConfig->GetValue('docroot') . 'version-log.txt');

      if ($version !== false){
         $this->AddVar("view_version", "INFO_AVAILABLE", "YES");
         $this->AddVar("view_version", "VERSION", nl2br($version));

         $vers = explode("\n", $version);
         $this->AddVar("version_awal","VERSION_HEADER",$vers[0]);
         $temp = '';
         for ($i=1;$i<count($vers);$i++){
            if ($i == 1) {
               $temp = $vers[$i];
            } else {
               $temp = $temp . '<br />' . $vers[$i];
            }
         }
         $this->AddVar("version_awal","VERSION_ISI",$temp);
         $vers_log =  explode("[version]", $version_log);
         array_shift($vers_log);
         foreach($vers_log as  $value) {
            $kres = explode("[#]",$value);
            $versionItem['UL'] = "Version" . $kres[0];
            $arrSize = sizeof($kres);
            $item = array();
            for($i=1;$i<$arrSize; $i++) {
                  $item[$i]['LI'] =$kres[$i];
               }
            $this->AppendVarWithInnerTemplate("version_log",$versionItem,"UL_VERSION_LOG_", "version_log_li", $item,"LI_VERSION_LOG_");
         }
      } else {
         $this->AddVar("view_version", "INFO_AVAILABLE", "NO");
         $this->AddVar("error_box", "ERROR_MESSAGE", $this->mErrorMessage);
         $this->SetAttribute("error_box","visibility",'visible');
        }
      $this->DisplayTemplate();
   }
}
?>