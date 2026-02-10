<?php
class ProsesHome extends ProcessBase{

   var $mData;
   var $mUserIdentity;
   var $mSiaServer;

   function ProsesHome(&$configObject, $securityObj, $userId, $userRole){
      ProcessBase::ProcessBase($configObject);
      $this->mUserIdentity =  $securityObj->mUserIdentity;
      $this->mSiaServer = $this->mUserIdentity->GetProperty("ServerServiceAddress");

      $this->mData = $securityObj->mUserIdentity->GetProperty("SiregServiceAddress");
   }

   function uploadFoto(){
		$_FILES['uploadFoto']['name'] = preg_replace(
				 '/[^a-zA-Z0-9\.\$\%\'\`\-\@\{\}\~\!\#\(\)\&\_\^]/'
				 ,'',str_replace(array(' ','%20'),array('_','_'),$_FILES['uploadFoto']['name']));

		$files = explode(".", $_FILES['uploadFoto']['name']);
		$maxSize = 400000; 	// 400.000 bytes
		$validExt = array('jpg','jpeg','png','bmp','gif','bitmap');
		$ext = strtolower($files[count($files) - 1]);
		if (!in_array($ext, $validExt)) {
			return "File yang dimasukkan tidak valid (bukan file image)";
		}elseif($_FILES['uploadFoto']['size'] > $maxSize){
			return "File yang dimasukkan tidak boleh melebihi 400KB";
		}else{
			set_time_limit(0);
			$obj = new UserSiregService($this->mData);
		
			$fileContent = @file_get_contents($_FILES['uploadFoto']['tmp_name']);
			$fileContent = base64_encode($fileContent);
			$userId = $this->mUserIdentity->GetProperty("UserReferenceId");
			$upload = $obj->DoUploadFotoMahasiswa($userId, array('ext' => $ext, 'content' => $fileContent));
			
			if(!isset($upload['status']))$upload['status'] = false;
			
			if($upload['status']){
				$this->mUserIdentity->SetProperty("UserFotoFile", $userId . '.' . $ext);
				return true;
			}else{
				return $upload['msg'];
			}
		}
      
   }

}
?>