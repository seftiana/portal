<?php
/**
 * PerpustakaanClientService
 * PerpustakaanClientService class
 * 
 * @package academic_report 
 * @author Maya Alipin 
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-04-28
 * @revision 
 *
 */
class PerpustakaanClientService extends ServiceClient
{
   var $mUserId;
   
   
   function PerpustakaanClientService($soap_server, $wsdl_status, $userId) {
      ServiceClient::ServiceClient($soap_server, $wsdl_status);
      $this->mUserId = $userId;
   }
   /*
   $soap_svr->register('PesanBuku');
   $soap_svr->register('Katalog');
   $soap_svr->register('KatalogDetail');
   $soap_svr->register('StatusBuku');
   */
   function GetStatusAnggota() {
      $param = array($this->mUserId);
      $result = $this->Call('StatusAnggota', $param);
      return $result;
   }
   
   function GetStatusBebasPinjam() {
      $param = array($this->mUserId);
      $result = $this->Call('StatusBebasPinjam', $param);
      return $result;
   }
   
   function GetHistoryPinjam() {
      $param = array($this->mUserId);
      $result = $this->Call('HistoriPinjam', $param);
      return $result;
   }
   
   function GetBukuTerpinjam() {
      $param = array($this->mUserId);
      $result = $this->Call('BukuTerpinjam', $param);
      return $result;
   }
   
   function GetKatalogBuku($keyword, $start, $recordCount) {
      $param = array($keyword, $start, $recordCount);
      $result = $this->Call('Katalog', $param);
      return $result;
   }
   
   function GetKatalogDetail($bukuKode) {
      $param = array($bukuKode);
      $result = $this->Call('KatalogDetail', $param);
      return $result;
   }
   
   function DoPesanBuku ($bukuKode) {
      $param = array($this->mUserId,$bukuKode);
      $result = $this->Call('PesanBuku', $param);
      return $result;
   }
}
?>