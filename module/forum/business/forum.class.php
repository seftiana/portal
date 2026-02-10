<?php
 
   class Forum extends DatabaseConnected
   {
      var $mForumUserId;
      var $mForumUserRole;
      
      var $mForumKategoriId;
      var $mForumKategoriTitle;
      var $mForumKategoriDescription;
      
      var $mForumTopikId;
      var $mForumTopikTitle;
      var $mForumTopikDescription;
      var $mForumTopikModeratorId;
      var $mForumTopikHakAkses;
      
      var $mForumThreadId;
      var $mForumThreadTitle;
      
      var $mForumPostId;
      var $mForumPostTitle;
      var $mForumPostContent;
      var $mForumPostUserId;
      
      var $mForumErrorMessage;
      
      function Forum(&$configObject)
      {         
         DatabaseConnected::DatabaseConnected($configObject, "module/forum/business/forum.sql.php");
        //$this->mDebugMode = true;                  
      }
      
      function GetAllKategoriItem()
      {
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("ForumErrorMessage", $dbErrorMsg);
            return false;
         }
         
         $kategoriItem = $this->GetAllDataAsArray($this->mSqlQueries['get_all_kategori_item'], array());         
         if (false === $kategoriItem) {
            $this->SetProperty("ForumErrorMessage", "Data kategori belum tersedia .... <br> ".$this->GetProperty("DbErrorMessage"));
            $this->Disconnect();
            return false;            
         }
         else {
            $this->SetProperty("ForumErrorMessage", '');
            $this->Disconnect();
            return $kategoriItem;
         }
      }
      
      function GetKategoriItemDetail()
      {
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("ForumErrorMessage", $dbErrorMsg);
            return false;
         }
         
         $kategoriDetail = $this->GetAllDataAsArray($this->mSqlQueries['get_kategori_item_detail'], array($this->mForumKategoriId));         
         if (false === $kategoriDetail) {
            $this->SetProperty("ForumErrorMessage", "Detail kategori tidak ditemukan .... <br> ".$this->GetProperty("DbErrorMessage"));
            $this->Disconnect();
            return false;            
         }
         else {
            $this->SetProperty("ForumErrorMessage", '');
            $this->Disconnect();
            return $kategoriDetail;
         }
      }
      
      function GetSumTopikForKategori()
      {
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("ForumErrorMessage", $dbErrorMsg);
            return false;
         }
         
         // jika role adalah administrasi maka tidak ada yang dibann
         if($this->mForumUserRole == 3) {
            $topikSum = $this->GetDataAsOne($this->mSqlQueries['get_sum_topik_for_kategori'], array($this->mForumKategoriId));         
         }
         else {
            $params = array($this->mForumKategoriId, $this->mForumUserRole);
            $topikSum = $this->GetDataAsOne($this->mSqlQueries['get_sum_topik_for_kategori_except_banned'], $params);         
         }

         if (false === $topikSum) {
            $this->SetProperty("ForumErrorMessage", "Data topik belum tersedia .... <br> ".$this->GetProperty("DbErrorMessage"));
            $this->Disconnect();
            return false;            
         }
         else {
            $this->SetProperty("ForumErrorMessage", '');
            $this->Disconnect();
            return $topikSum;
         }
      }
      
      function DoAddKategoriItem()
      {
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("ForumErrorMessage", $dbErrorMsg);
            return false;
         }
         $params = array($this->mForumKategoriTitle, $this->mForumKategoriDescription);
         $addProc = $this->ExecuteInsertQuery($this->mSqlQueries['do_add_kategori_item'], $params);         
         if (false === $addProc) {
            $this->SetProperty("ForumErrorMessage", "Proses penambahan kategori tidak berhasil .... <br> ".$this->GetProperty("DbErrorMessage"));
            $this->Disconnect();
            return false;            
         }
         else {
            $this->SetProperty("ForumErrorMessage", 'Proses penambahan kategori berhasil');
            $this->Disconnect();
            return true;
         }
      }
      
      function DoUpdateKategoriItem()
      {
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("ForumErrorMessage", $dbErrorMsg);
            return false;
         }
         $params = array($this->mForumKategoriTitle, $this->mForumKategoriDescription, $this->mForumKategoriId);
         $updProc = $this->ExecuteUpdateQuery($this->mSqlQueries['do_update_kategori_item'], $params);         
         if (false === $updProc) {
            $this->SetProperty("ForumErrorMessage", "Proses pengubahan kategori tidak berhasil .... <br> ".$this->GetProperty("DbErrorMessage"));
            $this->Disconnect();
            return false;            
         }
         else {
            $this->SetProperty("ForumErrorMessage", 'Proses pengubahan kategori berhasil');
            $this->Disconnect();
            return true;
         }
      }
      
      function DoDeleteKategoriItem()
      {
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("ForumErrorMessage", $dbErrorMsg);
            return false;
         }
         $params = array($this->mForumKategoriId);
         $delProc = $this->ExecuteDeleteQuery($this->mSqlQueries['do_delete_kategori_item'], $params);         
         if (false === $delProc) {
            $this->SetProperty("ForumErrorMessage", "Proses penghapusan kategori tidak berhasil .... <br> ".$this->GetProperty("DbErrorMessage"));
            $this->Disconnect();
            return false;            
         }
         else {
            $this->SetProperty("ForumErrorMessage", 'Proses penghapusan kategori berhasil');
            $this->Disconnect();
            return true;
         }
      }
      
      function GetAllTopikItemExceptBanned()
      {
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("ForumErrorMessage", $dbErrorMsg);
            return false;
         }
         
         // jika role adalah administrasi maka tidak ada yang dibann
         if($this->mForumUserRole != 3) {
            $params = array($this->mForumKategoriId, $this->mForumUserRole);
            $topikItem = $this->GetAllDataAsArray($this->mSqlQueries['get_all_topik_item_except_banned'], $params);         
         }
         else {
            $params = array($this->mForumKategoriId);
            $topikItem = $this->GetAllDataAsArray($this->mSqlQueries['get_all_topik_item'], $params);         
         }
         if (false === $topikItem) {
            $this->SetProperty("ForumErrorMessage", "Data topik belum tersedia .... <br> ".$this->GetProperty("DbErrorMessage"));
            $this->Disconnect();
            return false;            
         }
         else {
            $this->SetProperty("ForumErrorMessage", '');
            $this->Disconnect();
            return $topikItem;
         }
      }
      
      function GetTopikItemDetail()
      {
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("ForumErrorMessage", $dbErrorMsg);
            return false;
         }
         $params = array($this->mForumTopikId);
         $topikItem = $this->GetAllDataAsArray($this->mSqlQueries['get_topik_item_detail'], $params);         
         if (false === $topikItem) {
            $this->SetProperty("ForumErrorMessage", "Detail topik tidak ditemukan .... <br> ".$this->GetProperty("DbErrorMessage"));
            $this->Disconnect();
            return false;            
         }
         else {
            $this->SetProperty("ForumErrorMessage", '');
            $this->Disconnect();
            return $topikItem;
         }
      }
      
      function GetHakAksesTopik()
      {
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("ForumErrorMessage", $dbErrorMsg);
            return false;
         }
         $dataHakAkses = $this->GetAllDataAsArray($this->mSqlQueries['get_hakakses_topik'], array($this->mForumTopikId));
         if (false === $dataHakAkses) {
            $this->SetProperty("ForumErrorMessage", "Data Hak Akses Tidak Ditemukan .... <br> ".$this->GetProperty("DbErrorMessage"));
            $this->Disconnect();
            return false;
            
         }
         else {
            $this->SetProperty("ForumErrorMessage", '');
            $this->Disconnect();
            return $dataHakAkses;
         }
      }
      
      function GetMaximumTopikId()
      {
         $maxTopikId = $this->GetDataAsOne($this->mSqlQueries['get_maximum_topik_id'], array());            
         if (false === $maxTopikId) {
            $this->SetProperty("ForumErrorMessage", "Maksimum id Topik tidak ditemukan... <br> ".$this->GetProperty("DbErrorMessage"));            
            return false;
         }
         else {
            $this->SetProperty("ForumErrorMessage",'');            
            return $maxTopikId;
         }
      }
      
      function DoUpdateLastPostTopikItem()
      {
         $params = array($this->mForumTopikId);
         $updProc = $this->ExecuteUpdateQuery($this->mSqlQueries['do_update_last_post_topik_item'], $params);         
         if (false === $updProc) {
            $this->SetProperty("ForumErrorMessage", "Proses pengubahan last post topik tidak berhasil .... <br> ".$this->GetProperty("DbErrorMessage"));
            return false;            
         }
         else {
            $this->SetProperty("ForumErrorMessage", '');
            return true;
         }
      }
      
      function DoAddTopikItem()
      {
         $params = array($this->mForumTopikTitle, $this->mForumTopikDescription, $this->mForumTopikModeratorId, $this->mForumKategoriId);
         $addProc = $this->ExecuteInsertQuery($this->mSqlQueries['do_add_topik_item'], $params);         
         if (false === $addProc) {
            $this->SetProperty("ForumErrorMessage", "Proses penambahan topik tidak berhasil .... <br> ".$this->GetProperty("DbErrorMessage"));            
            return false;            
         }
         else {
            $this->SetProperty("ForumErrorMessage", "Proses penambahan topik berhasil");
            return true;
         }
      }
      
      function DoUpdateTopikItem()
      {
         $params = array($this->mForumTopikTitle, $this->mForumTopikDescription, $this->mForumTopikModeratorId, $this->mForumTopikId);
         $updProc = $this->ExecuteUpdateQuery($this->mSqlQueries['do_update_topik_item'], $params);         
         if (false === $updProc) {
            $this->SetProperty("ForumErrorMessage", "Proses pengubahan topik tidak berhasil .... <br> ".$this->GetProperty("DbErrorMessage"));            
            return false;            
         }
         else {
            $this->SetProperty("ForumErrorMessage", '');
            return true;
         }
      }
      
      function DoDeleteTopikItem()
      {
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("ForumErrorMessage", $dbErrorMsg);
            return false;
         }
         $params = array($this->mForumTopikId);
         $delProc = $this->ExecuteDeleteQuery($this->mSqlQueries['do_delete_topik_item'], $params);         
         if (false === $delProc) {
            $this->SetProperty("ForumErrorMessage", "Proses penghapusan topik tidak berhasil .... <br> ".$this->GetProperty("DbErrorMessage"));
            $this->Disconnect();
            return false;            
         }
         else {
            $this->SetProperty("ForumErrorMessage", "Proses penghapusan topik berhasil");
            $this->Disconnect();
            return true;
         }
      }
      
      function DoAddHakAksesTopik()
      {
         $params = array($this->mForumTopikId, $this->mForumUserRole, $this->mForumTopikHakAkses);                  
         $addHakAksesTopik = $this->ExecuteInsertQuery($this->mSqlQueries['do_add_hakakses_topik'], $params);            
         if (false === $addHakAksesTopik) {
            $this->SetProperty("ForumErrorMessage", "Penambahan hak akses topik tidak berhasil... <br> ".$this->GetProperty("DbErrorMessage"));            
            return false;
         }
         else {
            $this->SetProperty("ForumErrorMessage", "Penambahan hak akses topik berhasil");
            return true;
         }         
      }
      
      function DoDeleteHakAksesTopik()
      {
         $params = array($this->mForumTopikId);                  
         $delHakAksesTopik = $this->ExecuteDeleteQuery($this->mSqlQueries['do_delete_hakakses_topik'], $params);            
         if (false === $delHakAksesTopik) {
            $this->SetProperty("ForumErrorMessage", "Penghapusan hak akses topik tidak berhasil... <br> ".$this->GetProperty("DbErrorMessage"));            
            return false;
         }
         else {
            $this->SetProperty("ForumErrorMessage",'');
            return true;
         }
      }
		
		function GetCountThreadInTopik() {
			if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("ForumErrorMessage", $dbErrorMsg);
            return false;
         }
			$params = array($this->mForumTopikId);
			$count = $this->GetDataAsOne($this->mSqlQueries['get_count_thread_in_topik'], $params);         
			if (false === $count) {
				$this->SetProperty("ForumErrorMessage", "Data count belum tersedia .... <br> ".$this->GetProperty("DbErrorMessage"));
			}
			return $count;
			$this->Disconnect();
		}
      
      function GetAllThreadItem($offset=NULL, $limit=NULL)
      {
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("ForumErrorMessage", $dbErrorMsg);
            return false;
         }
         $params = array($this->mForumTopikId);
			$sql = "get_all_thread_item";
			if (!is_null($offset) && !is_null($limit)) {
				$params = array($this->mForumTopikId, $offset, $limit);
				$sql = "get_all_thread_item_offset_limit";
			}
         $threadItem = $this->GetAllDataAsArray($this->mSqlQueries[$sql], $params);         
			$this->Disconnect();
         if (false === $threadItem) {
            $this->SetProperty("ForumErrorMessage", "Data thread belum tersedia .... <br> ".$this->GetProperty("DbErrorMessage"));
            return false;            
         }
         else {
            $this->SetProperty("ForumErrorMessage", '');
            return $threadItem;
         }
      }
      
      function GetThreadItemDetail()
      {
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("ForumErrorMessage", $dbErrorMsg);
            return false;
         }
         $params = array($this->mForumThreadId);
         $threadItem = $this->GetAllDataAsArray($this->mSqlQueries['get_thread_item_detail'], $params);         
         if (false === $threadItem) {
            $this->SetProperty("ForumErrorMessage", "Detail thread tidak ditemukan .... <br> ".$this->GetProperty("DbErrorMessage"));
            $this->Disconnect();
            return false;            
         }
         else {
            $this->SetProperty("ForumErrorMessage", '');
            $this->Disconnect();
            return $threadItem;
         }
      }
      
      function GetMaximumThreadId()
      {
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("ForumErrorMessage", $dbErrorMsg);
            return false;
         }
         $maxThreadId = $this->GetDataAsOne($this->mSqlQueries['get_maximum_thread_id'], array());            
         if (false === $maxThreadId) {
            $this->SetProperty("ForumErrorMessage", "Maksimum id Thread tidak ditemukan... <br> ".$this->GetProperty("DbErrorMessage"));            
            return false;
         }
         else {
            $this->SetProperty("ForumErrorMessage",'');            
            return $maxThreadId;
         }
      }
      
      function DoAddThreadItem()
      {
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("ForumErrorMessage", $dbErrorMsg);
            return false;
         }
         $params = array($this->mForumThreadTitle, $this->mForumTopikId);
         $addProc = $this->ExecuteInsertQuery($this->mSqlQueries['do_add_thread_item'], $params);         
         if (false === $addProc) {
            $this->SetProperty("ForumErrorMessage", "Proses penambahan thread tidak berhasil .... <br> ".$this->GetProperty("DbErrorMessage"));
            $this->Disconnect();
            return false;            
         }
         else {
            $this->SetProperty("ForumErrorMessage", '');
            $this->Disconnect();
            return true;
         }
      }
      
      function DoUpdateThreadItem()
      {
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("ForumErrorMessage", $dbErrorMsg);
            return false;
         }
         $params = array($this->mForumThreadTitle, $this->mForumThreadId);
         $updProc = $this->ExecuteUpdateQuery($this->mSqlQueries['do_update_thread_item'], $params);         
         if (false === $updProc) {
            $this->SetProperty("ForumErrorMessage", "Proses pengubahan thread tidak berhasil .... <br> ".$this->GetProperty("DbErrorMessage"));
            $this->Disconnect();
            return false;            
         }
         else {
            $this->SetProperty("ForumErrorMessage", 'Proses pengubahan thread berhasil');
            $this->Disconnect();
            return true;
         }
      }
      
      function DoUpdateUserPostThreadItem()
      {
         $params = array($this->mForumPostUserId, $this->mForumThreadId);
         $updProc = $this->ExecuteUpdateQuery($this->mSqlQueries['do_update_user_post_thread_item'], $params);         
         if (false === $updProc) {
            $this->SetProperty("ForumErrorMessage", "Proses pengubahan user post thread tidak berhasil .... <br> ".$this->GetProperty("DbErrorMessage"));
            return false;            
         }
         else {
            $this->SetProperty("ForumErrorMessage", '');
            return true;
         }
      }
      
      function DoUpdateLastPostThreadItem()
      {
         $params = array($this->mForumThreadId);
         $updProc = $this->ExecuteUpdateQuery($this->mSqlQueries['do_update_last_post_thread_item'], $params);         
         if (false === $updProc) {
            $this->SetProperty("ForumErrorMessage", "Proses pengubahan last post thread tidak berhasil .... <br> ".$this->GetProperty("DbErrorMessage"));
            return false;            
         }
         else {
            $this->SetProperty("ForumErrorMessage", '');
            return true;
         }
      }
      
      function DoUpdateSumOfPostThreadItem($typeOfChange)
      {
         switch($typeOfChange) {
            case 'plus' : $insertedValue = 'threadJmlPost+1';
                            break;
            case 'minus' : $insertedValue = 'threadJmlPost-1';
                             break;
         }
         $params = array($insertedValue, $this->mForumThreadId);
         $updProc = $this->ExecuteUpdateQuery($this->mSqlQueries['do_update_sum_of_post_thread_item'], $params);         
         if (false === $updProc) {
            $this->SetProperty("ForumErrorMessage", "Proses pengubahan jumlah post thread tidak berhasil .... <br> ".$this->GetProperty("DbErrorMessage"));
            return false;            
         }
         else {
            $this->SetProperty("ForumErrorMessage", '');
            return true;
         }
      }
      
      function DoDeleteThreadItem()
      {
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("ForumErrorMessage", $dbErrorMsg);
            return false;
         }
         $params = array($this->mForumThreadId);
         $delProc = $this->ExecuteDeleteQuery($this->mSqlQueries['do_delete_thread_item'], $params);         
         if (false === $delProc) {
            $this->SetProperty("ForumErrorMessage", "Proses penghapusan thread tidak berhasil .... <br> ".$this->GetProperty("DbErrorMessage"));
            $this->Disconnect();
            return false;            
         }
         else {
            $this->SetProperty("ForumErrorMessage", 'Proses penghapusan thread berhasil');
            $this->Disconnect();
            return true;
         }
      }
      
		function GetCountPostItem() {
		//get_count_post_item
		   if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("ForumErrorMessage", $dbErrorMsg);
            return false;
         }
         $total = $this->GetDataAsOne($this->mSqlQueries['get_count_post_item'], array($this->mForumThreadId));         
			$this->Disconnect();
			if (false === $total) {
            $this->SetProperty("ForumErrorMessage", "Data jumlah post belum tersedia .... <br> ".$this->GetProperty("DbErrorMessage"));
            return false;            
         } else {
            $this->SetProperty("ForumErrorMessage", '');
            return $total;
         }
      }
		
      function GetAllPostItem($offset=NULL, $limit=NULL)
      {
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("ForumErrorMessage", $dbErrorMsg);
            return false;
         }
			if (!is_null($offset) && !is_null($limit)) {
				$params = array($this->mForumThreadId, $offset, $limit);
				$postItem = $this->GetAllDataAsArray($this->mSqlQueries['get_all_post_item_offset_limit'], $params);         
			} else {
				$params = array($this->mForumThreadId);
				$postItem = $this->GetAllDataAsArray($this->mSqlQueries['get_all_post_item'], $params);         
			}
			$this->Disconnect();
         if (false === $postItem) {
            $this->SetProperty("ForumErrorMessage", "Data post belum tersedia .... <br> ".$this->GetProperty("DbErrorMessage"));
            return false;            
         }
         else {
            $this->SetProperty("ForumErrorMessage", '');
            return $postItem;
         }
      }
      
      function GetPostItemDetail()
      {
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("ForumErrorMessage", $dbErrorMsg);
            return false;
         }
         $params = array($this->mForumPostId);
         $postItem = $this->GetAllDataAsArray($this->mSqlQueries['get_post_item_detail'], $params);         
         if (false === $postItem) {
            $this->SetProperty("ForumErrorMessage", "Detail post tidak ditemukan .... <br> ".$this->GetProperty("DbErrorMessage"));
            $this->Disconnect();
            return false;            
         }
         else {
            $this->SetProperty("ForumErrorMessage", '');
            $this->Disconnect();
            return $postItem;
         }
      }
      
      function DoAddPostItem()
      {         
         $params = array($this->mForumPostTitle, $this->mForumPostContent, $this->mForumThreadId, $this->mForumPostUserId);
         $addProc = $this->ExecuteInsertQuery($this->mSqlQueries['do_add_post_item'], $params);         
         if (false === $addProc) {
            $this->SetProperty("ForumErrorMessage", "Proses penambahan post tidak berhasil .... <br> ".$this->GetProperty("DbErrorMessage"));            
            return false;            
         }
         else {
            $this->SetProperty("ForumErrorMessage", '');
            return true;
         }
      }
      
      function DoDeletePostItem()
      {         
         $params = array($this->mForumPostId);
         $delProc = $this->ExecuteDeleteQuery($this->mSqlQueries['do_delete_post_item'], $params);         
         if (false === $delProc) {
            $this->SetProperty("ForumErrorMessage", "Proses penghapusan post tidak berhasil .... <br> ".$this->GetProperty("DbErrorMessage"));       
            return false;            
         }
         else {
            $this->SetProperty("ForumErrorMessage", '');
            return true;
         }
      }
      
      function GetLatestPost($limit)
      {
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("ForumErrorMessage", $dbErrorMsg);
            return false;
         }
         $params = array($limit);
         $postItem = $this->GetAllDataAsArray($this->mSqlQueries['get_latest_post'], $params);         
         if (false === $postItem) {
            $this->SetProperty("ForumErrorMessage", "Data post terbaru tidak ditemukan ... <br> ".$this->GetProperty("DbErrorMessage"));
            $this->Disconnect();
            return false;            
         }
         else {
            $this->SetProperty("ForumErrorMessage", '');
            $this->Disconnect();
            return $postItem;
         }
      }
   }
?>