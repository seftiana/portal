<?php
 /**
  revision: Maya Alipin 2006.08.08 perbaikan untuk handle qoute
  */
   class DatabaseConnected
   {

      var $mrConfig;

      var $mDbConnection;
      var $mSqlQueries;
      var $mDebugMode;
      var $mDbErrorMessage;

      function DatabaseConnected(&$configObject, $sqlFile, $fetchmode = ADODB_FETCH_ASSOC)
      {		
         // set this to true would put on debug mode, which is write all sql executed on application
         $this->mDebugMode = false;
         
         $this->mrConfig = &$configObject;
         $ADODB_FETCH_MODE = $fetchmode;
         $this->mDbConnection = &ADONewConnection($this->mrConfig->GetValue('db_type')); 
         
         $sql_file = $this->mrConfig->GetValue('docroot') . $sqlFile;
         if (file_exists($sql_file))
         {
            require $sql_file;
            $this->mSqlQueries = $sql;
         } 
         else
         {
            die("Required file '" . $sql_file . "' not found!");
         } 
      } 
   
      function SetProperty($propName, $value) {
         $method_name = "Set" . $propName;
         $property_name = "m" . $propName;
         if (method_exists($this, $method_name)) {
            $this->$method_name($value);
         } else {
            $object_vars = get_object_vars($this);
            if (array_key_exists($property_name, $object_vars)) {
               $this->$property_name = $value;
            } else {
               exit($propName . " has not been declared yet!");
            }
         }
      }

      function GetProperty($propName) {
         $method_name = "Get" . $propName;
         $property_name = "m" . $propName;
         if (method_exists($this, $method_name)) {
            $value = $this->$method_name();
         } else {
            $object_vars = get_object_vars($this);
            if (array_key_exists($property_name, $object_vars)) {
               $value = $this->$property_name;
            } else {
               exit($propName . " has not been declared yet!");
            }
         }   
         return $value;
      }
      
      function Connect()
      {
         ob_start();
         if($this->mDbConnection->Connect($this->mrConfig->GetValue('db_host'), 
                                        $this->mrConfig->GetValue('db_user'), 
                                        $this->mrConfig->GetValue('db_pass'), 
                                        $this->mrConfig->GetValue('db_name'))) {            
            $this->SetProperty("DbErrorMessage", "");
            ob_end_clean();
            return true;
         }
         else {
            //$adoDbErrMsg = ob_get_contents();
            $this->SetProperty("DbErrorMessage", "Can not connect to Database Server .<br>Check Config files".$adoDbErrMsg);
            ob_end_clean();
            return false;
         }       
      }
      
      function Disconnect()
      {
         return $this->mDbConnection->Disconnect();
      }
      
      function QuoteHandler($params) {
		   foreach($params as $key=>$value) {
				$params[$key] = addslashes($value);
         }
			return $params;
      }
      
      function ExecuteDeleteQuery($sql, $params) {
         $sql_parsed = "";
         $params = $this->QuoteHandler($params);
         $param_serialized = join("','",$params);
         eval('$sql_parsed = sprintf("'.$sql.'",\''.$param_serialized.'\');');
         if($this->mDebugMode) echo $sql_parsed;
         if (false !== $this->mDbConnection->Execute($sql_parsed)) {
            $this->SetProperty("DbErrorMessage", "");
            return true;
         }	
         else {
            $this->SetProperty("DbErrorMessage", "Query Failed");
            return false;
         }
      }

      function ExecuteUpdateQuery($sql, $params){
         $sql_parsed = "";
         $params = $this->QuoteHandler($params);
         $param_serialized = join("','",$params);
         eval('$sql_parsed = sprintf("'.$sql.'",\''.$param_serialized.'\');');
			if($this->mDebugMode) echo $sql_parsed;
         if ($rs = $this->mDbConnection->Execute($sql_parsed)) {
            $this->SetProperty("DbErrorMessage", "");
            return true;
         }	
         else {
            $this->SetProperty("DbErrorMessage", "Query Failed");
            return false;
         }	
      }	

      function ExecuteInsertQuery($sql,$params){
         $sql_parsed = "";
         $params = $this->QuoteHandler($params);
         $param_serialized =  join("','",$params);
         eval('$sql_parsed = sprintf("'.$sql.'",\''.$param_serialized.'\');');
         if($this->mDebugMode) echo $sql_parsed;
         if ($rs = $this->mDbConnection->Execute($sql_parsed)) {
            $this->SetProperty("DbErrorMessage", "");
            return true;
         }
         else {
            $this->SetProperty("DbErrorMessage", "Query Failed");
            return false;
         }	
      }

      /*function GetAllDataAsArray($sql,$params){
         $sql_parsed = "";
         $param_serialized = join("','",$params);
         eval('$sql_parsed = sprintf("'.$sql.'",\''.$param_serialized.'\');');
         if($this->mDebugMode) echo $sql_parsed;
         if ($rs = $this->mDbConnection->Execute($sql_parsed)) {            
            $array = $rs->GetArray();                                    
            if(count($array) === 0) { 
               $this->SetProperty("DbErrorMessage", "Data tidak ditemukan");
               return false;
            }
            else {
               $this->SetProperty("DbErrorMessage", "");
               return $array;               
            }            
         }
         else {
            $this->SetProperty("DbErrorMessage", "Query Failed");
            return false;            
         }	
		}*/
		
      function GetAllDataAsArray($sql,$params){
         $sql_parsed = "";
         $params = $this->QuoteHandler($params);

		 $param_serialized = join("','",$params);
         eval('$sql_parsed = sprintf("'.$sql.'",\''.$param_serialized.'\');');
         if($this->mDebugMode) echo $sql_parsed.'<br />';
			if ($rs = $this->mDbConnection->Execute($sql_parsed)) {                        
            $array = $this->GetArrayData($rs);                                    
            if(count($array) === 0) { 
               $this->SetProperty("DbErrorMessage", "Data tidak ditemukan");
               return false;
            }
            else {
               $this->SetProperty("DbErrorMessage", "");
               return $array;               
            }            
         }
         else {
            $this->SetProperty("DbErrorMessage", "Query Failed");
            return false;            
         }	
		}
      
      function GetArrayData($rs, $mode = ADODB_FETCH_ASSOC) {
         $this->mDbConnection->SetFetchMode($mode);
         $arr_temp = null;
         $arr_result = null;       
         if  (!$rs->EOF){
            if (isset ($rs->fields[0])){
               $len = sizeof($rs->fields)/2;
            } else {
               $len = sizeof($rs->fields);
            }
            while (!$rs->EOF) {
               for ($i=0; $i<$len; $i++){               
                  $field = $rs->FetchField($i);
                  $nama_field = $field->name;
                  $arr_temp[$nama_field] = $rs->fields($nama_field);
               }
               $arr_result[] = $arr_temp;
               $rs->MoveNext();
            }
         }
         return $arr_result;  
      }
      
		function GetDataAsOne($sql,$params){
         $sql_parsed = "";
         $params = $this->QuoteHandler($params);
         $param_serialized = join("','",$params);
         eval('$sql_parsed = sprintf("'.$sql.'",\''.$param_serialized.'\');');
         if($this->mDebugMode) echo $sql_parsed;
         if ($rs = $this->mDbConnection->GetOne($sql_parsed)) {
            if(!empty($rs)) {
               $this->SetProperty("DbErrorMessage", "");
               return $rs;
            }
            else {
               $this->SetProperty("DbErrorMessage", "Zero count");
               return false;
            }            
         }
         else {
            $this->SetProperty("DbErrorMessage", "Zero count");
            return false;
         }	
		}
      
      function StartTransaction() {
         $this->mDbConnection->BeginTrans();
      }
      
      function CompleteTransaction($result) {
         if (false === $result) {
            $this->SetProperty("DbErrorMessage", "Transaction failed");
            $this->mDbConnection->RollbackTrans();
         } else {
            $this->SetProperty("DbErrorMessage", "");
            $this->mDbConnection->CommitTrans();
         }
      }    
   } 
?>