<?php
/**
 * E_Forum
 * E_Forum class
 * 
 * @package 
 * @author Refit Gustaroska
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-02-22
 * @revision 
 *
 */
class E_Forum extends DatabaseConnected {
   
   var $mUserErrorMessage;
   
   /**
    * E_Forum::E_Forum
    * Constructor for E_Forum class
    *
    * @param $configObject object Configuration
    * @return void
    */
   function E_Forum(&$configObject) {
      DatabaseConnected::DatabaseConnected($configObject, "module/e_forum/business/forum.sql.php");
   }
   
   /**
        * E_Forum::GetUserName
        * Get User Name
        *
        * @param 
        * @return array(userId)
        */
        
   function GetUserName($userId) {
      if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("UserErrorMessage", $dbErrorMsg);
            return false;
         }
         $dataUser = $this->GetAllDataAsArray($this->mSqlQueries['get_user_name'], array($userId));
         if (false === $dataUser) {
            $this->SetProperty("UserErrorMessage", "Data tidak ditemukan .... <br> ".$this->GetProperty("DbErrorMessage"));
            $this->Disconnect();
            return false;            
         }
         else {
            $this->SetProperty("UserErrorMessage", '');
            $this->Disconnect();
            return $dataUser;
         }   
      
   }
}
?>