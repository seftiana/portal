<?php
   ini_set('display_errors', 0);
   //Load Configuration
	require_once 'config/configuration.class.php';
	$cfg = new Configuration();
	$cfg->Load('base.conf.php');

	//Load Library Class
	require_once $cfg->GetValue('app_lib') . 'adodb/adodb.inc.php';
		
   //Load Application Class
	require_once $cfg->GetValue('app_service') . 'server/base_server.service.class.php';	
   require_once $cfg->GetValue('app_data') . 'database_connected.class.php';	   
	   
	$server->register("Dispatch");
   //$HTTP_RAW_POST_DATA = "";
   
   function Dispatch($serviceParams, $dataParams) {
      global $cfg;      
      /*
         $serviceParams contains array for request handler
         pModule : Nama Module -> akan bertindak sebagai petunjuk direktori class handler berada
         pSub : Sub Module. -> akan bertindak sebagai petunjuk nama class handler
         pAct: Prefix Sub Module. -> akan bertindak sebagai petunjuk nama method yang harus dieksekusi
      */
      foreach($serviceParams as $key => $value) {
         $$key = $value;         
      }      
      $valid = false;
      if (!empty($pModule) && !empty($pAct) && !empty($pSub)) {
         $fileStatus = $cfg->GetServiceBusinessHandler($pModule, $pSub);
         $valid = true;
      } else {         
         $fileStatus = false;
         $valid = false;
      }      
      if (false !== $valid){
         if (false == $fileStatus) { 
            // return no handler message
            $server_fault = new soap_fault('Server', '', 'No file handler found for this request');
            return $server_fault;
         } else {
            //dirty hack :: use ob_start() for avoiding nusoap resulting response is not type of xml
            ob_start();
            require_once $fileStatus;
            
            $className = str_replace(' ', '', ucwords(str_replace('_', ' ', $pSub))) . 'ServerService';
            $functionName = ucfirst($pAct);
            
            $classHandler = new $className($cfg, $dataParams);
               // check if connection has failed to inisiate ??
            if($classHandler->GetProperty("IsError")) {
               ob_end_clean();
               $server_fault = new soap_fault('Server', '', $classHandler->GetProperty("ErrorMessage"));            
               $classHandler->DestroyObject();
               return $server_fault;              
            }
            else {
               // check is there any method with $functionName belong to classhandler declared ???
               if(method_exists($classHandler, $functionName)) {
                  $result = $classHandler->$functionName();
                  ob_end_clean();
                  
                  // return data as soapval if not false
                  if(false !== $result) {
                     $return_value = new soapval("$pAct", '', $result, '');
                     //$classHandler->DestroyObject();
                     return $return_value;
                  }
                  else {
                     $server_fault = new soap_fault('Server', '', $classHandler->GetProperty("ErrorMessage"));        
                     //$classHandler->DestroyObject();             
                     return $server_fault;
                  }
               }
               else {
                  ob_end_clean();
                  $server_fault = new soap_fault('Server', '', 'No method declared named '.$functionName.' on class '.$className);                
                  //$classHandler->DestroyObject();  
                  return $server_fault;
               }
            }
         }
      } else {
         // return no handler message
         $server_fault = new soap_fault('Client', '', 'Incorrect service request params, operation not succeed');
         return $server_fault;
      }      
   }
   
   //comment this line for debugging purpose   
   $server->service(trim($HTTP_RAW_POST_DATA));
   
   
   //uncomment this part for debugging purpose
   /*echo '<pre>';
   $reqServiceParams = array('pModule' => 'proposed_classes', 'pSub' => 'proposed_classes', 'pAct' => 'GetAllProposedClassesSemesterForSemester');
   $reqServiceData = array(array('20101','8'));   
   $result = Dispatch($reqServiceParams, $reqServiceData);
   print_r($result);
   echo '</pre>';/**/
?>