<?php

   /**
     * DisplayViewMobile
     * Display Class for View Academic Announcement for User
     * 
     * @package DisplayViewMobile
     * @author Ageng Prianto
     * @copyright Copyright (c) 2006 GamaTechno
     * @version 1.0 
     * @date 2006-05-06
     * @revision 
     *
     */
class DisplayViewMobile extends DisplayBaseFull{
      /**
        * var $mDataAnnouncement object Bisnis Pengumuman
        */
      var $mDataAnnouncement;
      
      /**
        * var $mDataUser object Bisnis User
        */
      var $mDataUser;
      
      /**
        * var $mPage integer current page
        */
      var $mPage;
      
      /**
        * var $mNumRecordPerPage integer number of record per page
        */
      var $mNumRecordPerPage;
            
      /**
        * DisplayViewMobile::DisplayViewMobile
        * Constructor for Class DisplayViewMobile
        *
        * @param $configObject object Configuration
        * @param $security object Security
        * @return void
        */
    function DisplayViewMobile(&$configObject, &$security, $page){
        DisplayBaseFull::DisplayBaseFull($configObject, $security);         
         
        $this->mDataAnnouncement = new Announcement($this->mrConfig);
        $this->mDataUser = new User($this->mrConfig, $this->mrUserSession->GetProperty("User"),$this->mrUserSession->GetProperty("Role"));
        
		$this->mPage = $page;
        $this->mNumRecordPerPage = 15;
         
        //set template untuk error dan empty box DisplayBase::SetErrorAndEmptyBox
        $this->SetErrorAndEmptyBox();
        //set template untuk navigasi DisplayBase::SetNavigationTemplate
        $this->SetNavigationTemplate();
        
        $this->SetTemplateBasedir($this->mrConfig->GetValue('app_module') . 'announcement/templates/');
        $this->SetTemplateFile('view_mobile.html');
    }
   
    function Display(){
        DisplayBaseFull::Display('[ Logout ]');
        $this->AddVar("content", "APPLICATION_MODULE", 'Download Perbanas Mobile App');             
    
   
        $this->DisplayTemplate();
    }
}
?>