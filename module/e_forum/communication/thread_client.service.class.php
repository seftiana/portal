<?php
/**
 * ThreadClientService
 * ThreadClientService class
 * 
 * @package e_forum
 * @author Refit Gustaroska
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-04-28
 * @revision 
 *
 */
class ThreadClientService extends ServiceClient
{  
   
   function ThreadClientService($soap_server,$wsdl_status) {
      ServiceClient::ServiceClient ($soap_server,$wsdl_status);
      $this->mReqServiceParams = array('pModule' => 'e_forum', 
                                          'pSub' => 'thread');    
   }

   function GetListThread($forumId){
      $tmp = array('pAct' => 'GetListThread');      
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
      $param = array($forumId);
      $serviceParams = array($this->mReqServiceParams,$param);      
      $result = $this->Call('Dispatch', $serviceParams);      
      //print_r($this);
      return $result;  
   }
   
   function DoInsertThread($thrdJudul, $forumId, $frmModId) {
      $tmp = array('pAct' => 'InsertThread');
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
      $param = array($thrdJudul, $forumId, $frmModId);            
      $serviceParams = array($this->mReqServiceParams,$param);      
      $result = $this->Call('Dispatch', $serviceParams);      
      //print_r($this);
      return $result;     
   }
   
   function DoInsertPost($thrdId, $postIsi, $frmUserId) {
      $tmp = array('pAct' => 'InsertPost');
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
      $param = array($thrdId, $postIsi, $frmUserId);            
      $serviceParams = array($this->mReqServiceParams,$param);      
      $result = $this->Call('Dispatch', $serviceParams);      
      //print_r($this);
      return $result;     
   }
   
   function DoUpdateThread($thrdId, $thrdJudul) {
      $tmp = array('pAct' => 'UpdateThread');
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
      $param = array($thrdId, $thrdJudul);            
      $serviceParams = array($this->mReqServiceParams,$param);      
      $result = $this->Call('Dispatch', $serviceParams);      
      //print_r($this);
      return $result;     
   }
   
   function DoDeleteThread($thrdId) {
      $tmp = array('pAct' => 'DeleteThread');
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
      $param = array($thrdId);            
      $serviceParams = array($this->mReqServiceParams,$param);      
      $result = $this->Call('Dispatch', $serviceParams);      
      //print_r($this);
      return $result;     
   }
   
   function DoDeletePost($postId, $threadId) {
      $tmp = array('pAct' => 'DeletePost');
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
      $param = array($postId, $threadId);            
      $serviceParams = array($this->mReqServiceParams,$param);      
      $result = $this->Call('Dispatch', $serviceParams);      
      //print_r($this);
      return $result;     
   }
   
   function GetDetailThread($threadId) {
      $tmp = array('pAct' => 'GetDetailThread');
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
      $param = array($threadId);            
      $serviceParams = array($this->mReqServiceParams,$param);      
      $result = $this->Call('Dispatch', $serviceParams);      
      //print_r($this);
      return $result;
   }
   
   function GetListPost($threadId){
      $tmp = array('pAct' => 'GetListPost');      
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
      $param = array($threadId);
      $serviceParams = array($this->mReqServiceParams,$param);      
      $result = $this->Call('Dispatch', $serviceParams);      
      //print_r($this);
      return $result;  
   }
   
   /*********************************/
   
   function GetCountListThread($threadId) {
      $param = array($threadId);
      $tmp = array('pAct' => 'GetCountListThread'); 
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);  
      $serviceParams = array($this->mReqServiceParams,$param); 
       
      
      $result = $this->Call('Dispatch', $serviceParams);      
      //print_r($this);
      return $result;                
   }
   
   function GetCountListPost($threadId) {
      $param = array($threadId);
      $tmp = array('pAct' => 'GetCountListPost');  
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);  
      $serviceParams = array($this->mReqServiceParams,$param); 
      
     $result = $this->Call('Dispatch', $serviceParams);      
      //print_r($this);
      return $result;     	
   } 
   
   function GetListThreadWithLimit($threadId, $start_rec, $num_rec) {
      $param = array($threadId, $start_rec, $num_rec);
      $tmp = array('pAct' => 'GetListThreadWithLimit');  
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);  
      $serviceParams = array($this->mReqServiceParams,$param); 
      
      $result = $this->Call('Dispatch', $serviceParams);      
      //print_r($this);
      return $result;           
   }
   
   function GetListPostWithLimit($threadId, $start_rec, $num_rec) {
      $param = array($threadId, $start_rec, $num_rec);
      $tmp = array('pAct' => 'GetListPostWithLimit');  
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp); 
      $serviceParams = array($this->mReqServiceParams,$param);  
      
      $result = $this->Call('Dispatch', $serviceParams);      
      //print_r($this);
      return $result;  
   } 
}
?>