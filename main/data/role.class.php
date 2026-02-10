<?php

   class Role
   {
      var $mrConfig;
      
      var $mDbConnection;

      function Role(&$databaseConnection, &$configObject)
      {
         $this->mDbConnection = &$databaseConnection;
         $this->mrConfig = &$configObject;
         $sql_file = $this->mrConfig->GetValue('docroot') . "main/sql/" . $this->mrConfig->GetValue('db_type') . "/data/role.sql.php";
      
         //$this->mDbConnection->debug=true;
        
         if (file_exists($sql_file))
         {
            require_once $sql_file;
            $this->mSqlQueries = $sql;
         } 
         else
            die("Required file '" . $sql_file . "' not found!");
      } 
   
      function FetchRole()
      {
         if ($rs = $this->mDbConnection->Execute($this->mSqlQueries['get_all_role']))
         { 
            if ($rs->RecordCount() >= 1)
               return $rs->GetArray();
            else
               die("No Role Defined! Please Check Framework's Manual for Further Info!");
         } 
         else
            return false;
      } 
   } 
?>
