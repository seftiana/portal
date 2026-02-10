<?php
/**
 * ForumClientService
 * ForumClientService class
 * 
 * @package academic_report 
 * @author Refit Gustaroska
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-04-28
 * @revision 
 *
 */
class ForumClientService extends ServiceClient
{  
   
   function ForumClientService($soap_server,$wsdl_status) {
      ServiceClient::ServiceClient ($soap_server,$wsdl_status);
      //$this->matkulId = $matkulId;
      $this->mReqServiceParams = array('pModule' => 'e_forum','pSub' => 'forum');    
   }

	function GetAllListForum($matkulId, $semId, $limit,$offset)
	{
		$this->mReqServiceParams["pAct"] = "GetAllListForum";
		$dataParams = array($matkulId,$semId, $limit,$offset);
		//print_r($dataParams);
		$serviceParams = array($this->mReqServiceParams,$dataParams);
		$result = $this->Call("Dispatch", $serviceParams);
		return $result;
	}
	
	function CountAllListForum($matkul,$semId)
	{
		$this->mReqServiceParams["pAct"] = "CountAllListForum";
		$dataParams = array($matkul,$semId);
		$serviceParams = array($this->mReqServiceParams,$dataParams);
		$result = $this->Call("Dispatch", $serviceParams);
		return $result;
	}
	
	
   function GetListForum($userId, $userRole, $matkulId){
      if ($userRole==1 || $userRole==3) {
         $tmp = array('pAct' => 'GetListForumMhs');
         $param = array($matkulId);    
      }else if ($userRole==2 || $userRole==7) {
         $tmp = array('pAct' => 'GetListForumDosen');
         $param = array($matkulId, $userId);    
      }else{
         return false;   
      }
		//echo $param;
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
              
      $serviceParams = array($this->mReqServiceParams,$param);      
      $result = $this->Call('Dispatch', $serviceParams);      
      //print_r($matkulId);
      return $result;  
   }
   
   function GetListMatkulAdmin($semId, $prodi)
	{
		$this->mReqServiceParams["pAct"] = "GetRefMatkulAdmin";
		$dataParams = array($semId,$prodi);
		
		//print_r($dataParams);
		$serviceParams = array($this->mReqServiceParams,$dataParams);
		$result = $this->Call("Dispatch", $serviceParams);
		return $result;
	}
   function GetListMatKul($userId, $userRole) {
		if ($userRole==1) 
		{
			$tmp = array('pAct' => 'GetRefMatKulMhs');  
		}else if ($userRole==2) {
			$tmp = array('pAct' => 'GetRefMatKulDosen');            
		}else
		{
			return false;
		}
		//echo $param;
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
      $param = array($userId);         
      $serviceParams = array($this->mReqServiceParams,$param); 
     // print_r($serviceParams)     ;
      $result = $this->Call('Dispatch', $serviceParams);      
      //print_r($this);
      return $result;            
   }
   
   function DoInsertForum($frmNama, $frmMkId, $frmDesk, $frmModId) {
      $tmp = array('pAct' => 'InsertForum');
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
      $param = array($frmNama, $frmMkId, $frmDesk, $frmModId);            
      $serviceParams = array($this->mReqServiceParams,$param);      
      //print_r($serviceParams);exit();
      $result = $this->Call('Dispatch', $serviceParams);      
      /**
      $this->Request();
	   $this->Response();
	   $this->Debug();print_r($result);exit();
	   /**/
      return $result;     
   }
   
   function DoUpdateForum($frmId, $frmNama, $frmDesk) {
      $tmp = array('pAct' => 'UpdateForum');
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
      $param = array($frmId, $frmNama, $frmDesk);            
      $serviceParams = array($this->mReqServiceParams,$param);      
      $result = $this->Call('Dispatch', $serviceParams);      
      //print_r($this);
      return $result;     
   }
   
   function DoDeleteForum($frmId) {
      $tmp = array('pAct' => 'DeleteForum');
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
      $param = array($frmId);            
      $serviceParams = array($this->mReqServiceParams,$param);      
      $result = $this->Call('Dispatch', $serviceParams);      
      //print_r($this);
      return $result;     
   }
   
   function GetDetailForum($forumId) {
      $tmp = array('pAct' => 'GetDetailForum');
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
      $param = array($forumId);            
      $serviceParams = array($this->mReqServiceParams,$param);      
      $result = $this->Call('Dispatch', $serviceParams);      
      //print_r($this);
      return $result;
   }
   
   function GetListMataKuliahAdmin($semId) {
      $tmp = array('pAct' => 'GetListMataKuliahAdmin');
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
      $param = array($semId);            
      $serviceParams = array($this->mReqServiceParams,$param);      
      $result = $this->Call('Dispatch', $serviceParams);      
      //print_r($this);
      return $result;
   }
   
   function GetAllListForumAdminWithLimit($start_rec, $num_rec) {
      $tmp = array('pAct' => 'GetAllListForumAdminWithLimit');
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
      $param = array($start_rec, $num_rec);            
      $serviceParams = array($this->mReqServiceParams,$param);      
      $result = $this->Call('Dispatch', $serviceParams);      
      //print_r($this);
      return $result;
   }
   
   function GetCountAllListForumAdmin() {
      $tmp = array('pAct' => 'GetCountAllListForumAdmin');
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
      $param = array();            
      $serviceParams = array($this->mReqServiceParams,$param);      
      $result = $this->Call('Dispatch', $serviceParams);      
      //print_r($this);
      return $result;
   }
   
   function GetListForumWithLimit($userId, $userRole,  $matkulId,$semId, $start_rec, $num_rec) {
      if ($userRole == 1) {  
         $tmp = array('pAct' => 'GetListForumMhsWithLimit');
         $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
         $param = array($matkulId, $start_rec, $num_rec);
         
         //print_r($this); 
      }else if ($userRole==3) {
         
         $tmp = array('pAct' => 'GetListForumAdminWithLimit');
         $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
         $param = array($matkulId, $semId, $start_rec, $num_rec);
         
      }else{
         $tmp = array('pAct' => 'GetListForumDosenWithLimit');
         $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);            
         $param = array($matkulId, $userId, $start_rec, $num_rec);
                 
      } 
      //print_r($param); 
      $serviceParams = array($this->mReqServiceParams,$param);      
      $result = $this->Call('Dispatch', $serviceParams);      
      
      return $result;
   }  
   
   function GetCountListForum($userId, $userRole, $matkulId,$semId) {
      if ($userRole == 1) {        
         $param = array($matkulId);
         $tmp = array('pAct' => 'GetCountListForumMhs');
         $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);            
         //print_r($this); 
      }else if ($userRole==3) {
         
         $tmp = array('pAct' => 'GetCountListForumAdmin');
         $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
         $param = array($matkulId, $semId);
            
      
      }else{
         
         $param = array($matkulId, $userId);
         $tmp = array('pAct' => 'GetCountListForumDosen');
         $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);                     
      }      
      $serviceParams = array($this->mReqServiceParams,$param);      
      $result = $this->Call('Dispatch', $serviceParams);   
      return $result;
   }
	function Request()
	   {
	      echo '<h2>Request</h2><pre>' . htmlspecialchars($this->mSoapClient->request, ENT_QUOTES) . '</pre>';
	   }

	function Response()
	  {
	      echo '<h2>Response</h2><pre>' . htmlspecialchars($this->mSoapClient->response, ENT_QUOTES) . '</pre>';
	  }

	function Debug()
	  {
	      echo '<h2>Debug</h2><pre>' . htmlspecialchars($this->mSoapClient->debug_str, ENT_QUOTES) . '</pre>';
	  }
   
}
?>