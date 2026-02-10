<?php
/**
 * RefTable
 * RefTable class
 * 
 * @package RefTable 
 * @author M. Urip Raharjo
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2007-09-18
 *
 *
 * commented statement (/*)  is not defined yet please do not erase 
 */

   class RefTable extends DatabaseConnected
   {
      //---- start property ----//   
      var $mFakKode ;
      var $mFakKodeUniv  ;
      var $mFakNamaResmi  ;
      var $mFakNamaSingkat  ;
      var $mFakNamaAsing  ;
      var $mFakAlamat  ;
      var $mFakTelp  ;
      var $mFakFax  ;
      var $mFakEmail  ;
      var $mFakKontakPerson ;
      var $mJurKode ;
      var $mJurKodeuniv ;                                                           
      var $mJurNamaResmi ;                                                     
      var $mJurNamaSingkat ;                                                         
      var $mJurNamaAsing ;                                                          
      var $mJurAlamat ;                                                                       
      var $mJurTelp ;                                                                         
      var $mJurFax ;                                                                     
      var $mJurEmail ;                                                               
      var $mJurKontakPerson ;                                                 
   	var $mProdiJjarKode ; 
   	var $mProdiNamaResmi ; 
   	var $mProdiNamaAsing ; 
   	var $mProdiNamaSingkat ; 
   	var $mProdiKodeUm ;
   	var $mProdiKodeUniv ;
   	var $mProdiLabelNim ; 
   	var $mProdiModelrId ; 
   	var $mProdiKode ;
   	var $mRefTableErrorMessage;
   	
      function RefTable($configObject) 
      {
         DatabaseConnected::DatabaseConnected($configObject, "module/ref_table/business/ref_table.sql.php") ;
      }
      
      function InsertFakultas() 
      {
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("RefTableErrorMessage", $dbErrorMsg);
            return false;
         }
         $param = array($this->mFakKode, $this->mFakKodeUniv, $this->mFakNamaResmi, 
                        $this->mFakNamaSingkat, $this->mFakNamaAsing, $this->mFakAlamat, 
                        $this->mFakTelp, $this->mFakFax, $this->mFakEmail, $this->mFakKontakPerson);
         $result = false;
         if ($this->ExecuteInsertQuery($this->mSqlQueries['insert_fakultas'], $param)){
            $result = true;
         }
         $this->Disconnect();
         if (false === $result){         
            $this->SetProperty("RefTableErrorMessage", "Tidak dapat melakukan penambahan <br />".$this->GetProperty("DbErrorMessage"));
         }else{
            $this->SetProperty("RefTableErrorMessage", "");
         }
         
         return $result;
      }
      
      function UpdateFakultas() 
      {
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("RefTableErrorMessage", $dbErrorMsg);
            return false;
         }
         $param = array($this->mFakKodeUniv, $this->mFakNamaResmi, 
                        $this->mFakNamaSingkat, $this->mFakNamaAsing, $this->mFakAlamat, 
                        $this->mFakTelp, $this->mFakFax, $this->mFakEmail, $this->mFakKontakPerson,
                        $this->mFakKode);
         $result = false;
         if ($this->ExecuteUpdateQuery($this->mSqlQueries['update_fakultas'], $param)){
            $result = true;
         }
         $this->Disconnect();
          if (false === $result){         
            $this->SetProperty("RefTableErrorMessage", "Tidak dapat melakukan perubahan <br />".$this->GetProperty("DbErrorMessage"));
         }else{
            $this->SetProperty("RefTableErrorMessage", "");
         }
        
         return $result;
      }
      
      function DeleteFakultas() 
      {
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("RefTableErrorMessage", $dbErrorMsg);
            return false;
         }
         $param = array($this->mFakKode);
         $result = false;
         if ($this->ExecuteDeleteQuery($this->mSqlQueries['delete_fakultas'], $param)){
            $result = true;
         }
         $this->Disconnect();
         if (false === $result){         
            $this->SetProperty("RefTableErrorMessage", "Tidak dapat melakukan penghapusan <br />".$this->GetProperty("DbErrorMessage"));
         }else{
            $this->SetProperty("RefTableErrorMessage", "");
         }
         
         return $result;
      }
      
      function InsertJurusan() 
      {
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("RefTableErrorMessage", $dbErrorMsg);
            return false;
         }
         $param = array($this->mJurKode, $this->mJurKodeuniv, $this->mFakKode, $this->mJurNamaResmi, 
                        $this->mJurNamaSingkat, $this->mJurNamaAsing, $this->mJurAlamat, 
                        $this->mJurTelp, $this->mJurFax, $this->mJurEmail, $this->mJurKontakPerson);
         $result = false;
         if ($this->ExecuteInsertQuery($this->mSqlQueries['insert_jurusan'], $param)){
            $result = true;
         }
         $this->Disconnect();
         if (false === $result){         
            $this->SetProperty("RefTableErrorMessage", "Tidak dapat melakukan penambahan <br />".$this->GetProperty("DbErrorMessage"));
         }else{
            $this->SetProperty("RefTableErrorMessage", "");
         }
         
         return $result;
      }
      
      function UpdateJurusan() 
      {
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("RefTableErrorMessage", $dbErrorMsg);
            return false;
         }
         $param = array($this->mJurKodeuniv, $this->mFakKode, $this->mJurNamaResmi, 
                        $this->mJurNamaSingkat, $this->mJurNamaAsing, $this->mJurAlamat, 
                        $this->mJurTelp, $this->mJurFax, $this->mJurEmail, $this->mJurKontakPerson,
                        $this->mJurKode);
         $result = false;
         if ($this->ExecuteUpdateQuery($this->mSqlQueries['update_jurusan'], $param)){
            $result = true;
         }
         $this->Disconnect();
          if (false === $result){         
            $this->SetProperty("RefTableErrorMessage", "Tidak dapat melakukan perubahan <br />".$this->GetProperty("DbErrorMessage"));
         }else{
            $this->SetProperty("RefTableErrorMessage", "");
         }
         
         return $result;
      }
      
      function DeleteJurusan() 
      {
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("RefTableErrorMessage", $dbErrorMsg);
            return false;
         }
         $param = array($this->mJurKode);
         $result = false;
         if ($this->ExecuteDeleteQuery($this->mSqlQueries['delete_jurusan'], $param)){
            $result = true;
         }
         $this->Disconnect();
         if (false === $result){         
            $this->SetProperty("RefTableErrorMessage", "Tidak dapat melakukan penghapusan <br />".$this->GetProperty("DbErrorMessage"));
         }else{
            $this->SetProperty("RefTableErrorMessage", "");
         }
         
         return $result;
      }
      
      function InsertProdi() 
      {
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("RefTableErrorMessage", $dbErrorMsg);
            return false;
         }
         $param = array($this->mProdiJjarKode, $this->mProdiNamaResmi, $this->mProdiNamaAsing,
                        $this->mProdiNamaSingkat, $this->mProdiKodeUm, $this->mProdiKodeUniv,
                        $this->mProdiLabelNim, $this->mFakKode, $this->mJurKode, 
                        $this->mProdiModelrId, $this->mProdiKode);
         $result = false;
         if ($this->ExecuteInsertQuery($this->mSqlQueries['insert_prodi'], $param)){
            $result = true;
         }
         $this->Disconnect();
         if (false === $result){         
            $this->SetProperty("RefTableErrorMessage", "Tidak dapat melakukan penambahan <br />".$this->GetProperty("DbErrorMessage"));
         }else{
            $this->SetProperty("RefTableErrorMessage", "");
         }
         
         return $result;
      }
      
      function UpdateProdi() 
      {
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("RefTableErrorMessage", $dbErrorMsg);
            return false;
         }
         $param = array($this->mProdiJjarKode, $this->mProdiNamaResmi, $this->mProdiNamaAsing,
                        $this->mProdiNamaSingkat, $this->mProdiKodeUm, $this->mProdiKodeUniv,
                        $this->mProdiLabelNim, $this->mFakKode, $this->mJurKode, 
                        $this->mProdiModelrId, $this->mProdiKode);
         $result = false;
         if ($this->ExecuteUpdateQuery($this->mSqlQueries['update_prodi'], $param)){
            $result = true;
         }
         $this->Disconnect();
          if (false === $result){         
            $this->SetProperty("RefTableErrorMessage", "Tidak dapat melakukan perubahan <br />".$this->GetProperty("DbErrorMessage"));
         }else{
            $this->SetProperty("RefTableErrorMessage", "");
         }
         
         return $result;
      }
      
      function DeleteProdi() 
      {
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("RefTableErrorMessage", $dbErrorMsg);
            return false;
         }
         $param = array($this->mProdiKode);
         $result = false;
         if ($this->ExecuteDeleteQuery($this->mSqlQueries['delete_prodi'], $param)){
            $result = true;
         }
         $this->Disconnect();
         if (false === $result){         
            $this->SetProperty("RefTableErrorMessage", "Tidak dapat melakukan penghapusan <br />".$this->GetProperty("DbErrorMessage"));
         }else{
            $this->SetProperty("RefTableErrorMessage", "");
         }
         
         return $result;
      }
   	
   	
   }

?>