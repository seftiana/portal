<?php
class ProsesTugasAkhir extends ProcessBase{

   var $mData;
   var $mUserIdentity;
   var $mSiaServer;
   var $mError;

   function ProsesTugasAkhir(&$configObject, $securityObj, $userId, $userRole){
      ProcessBase::ProcessBase($configObject);
      $this->mUserIdentity =  $securityObj->mUserIdentity;
      $this->mSiaServer = $this->mUserIdentity->GetProperty("ServerServiceAddress");

      $this->mData = new TugasAkhirService($this->mSiaServer, false, $userId);
   }

   function validasiForm($varPost){
      $isValid = TRUE;
      $pesan = '';

	  $cek = array('topik', 'judul');
	  $n = count($cek);
	  $romawi = array('', 'I', 'II');
	  for($i = 0, $m=count($varPost['judul']); $i < $m; ++$i){
		for($j = 0; $j < $n; ++$j){
			if($varPost[$cek[$j]][$i] == ''){
				$pesan .= ucfirst($cek[$j]) . ' ' . $romawi[($i + 1)] . ' Tugas Akhir tidak boleh kosong<br />';
				$isValid = FALSE;
			}
		}
	  }

      if($isValid === FALSE){
         $_SESSION['isFormValid'] = 'tidak';
         $_SESSION['pesanFormValid'] = $pesan;
      }
      return $isValid;
   }

   function insert($varPost){
      set_time_limit(0);
	  $param = array();
	  for($i = 0, $m = count($varPost['judul']); $i < $m; ++$i){
		$upload = $this->uploadFile($i);
		if(is_array($upload)){
			$param[] = array(
				'topik'		=> $varPost['topik'][$i],
				'judul'		=> $varPost['judul'][$i],
				'filename'	=> $upload['filename'],
				'content'	=> $upload['content']
			);
		}else{
			$_SESSION['isFormValid'] = 'tidak';
			$_SESSION['pesanFormValid'] = $this->mError;
			return false;
		}
	  }
	  $result = $this->mData->insertTugasAkhir($param);
	  
	  if($result == 'locked'){
		$_SESSION['isFormValid'] = 'tidak';
		$_SESSION['pesanFormValid'] = 'Tidak Dapat Mengubah Data, Tugas Akhir Sudah Terkunci<br />';
	  }
      return $result;
   }

   function update($varPost){
      set_time_limit(0);
	  $param = array();
	  for($i = 0, $m = count($varPost['judul']); $i < $m; ++$i){
		$upload = $this->uploadFile($i);
		if(is_array($upload)){
			$param[] = array(
				'topik'		=> $varPost['topik'][$i],
				'judul'		=> $varPost['judul'][$i],
				'filename'	=> $upload['filename'],
				'content'	=> $upload['content']
			);
		}else{
			$param[] = array(
				'topik'		=> $varPost['topik'][$i],
				'judul'		=> $varPost['judul'][$i],
				'filename'	=> '',
				'content'	=> ''
			);
		}
	  }
	  $result = $this->mData->updateTugasAkhir($param);
	  
	  if($result == 'locked'){
		$_SESSION['isFormValid'] = 'tidak';
		$_SESSION['pesanFormValid'] = 'Tidak Dapat Mengubah Data, Tugas Akhir Sudah Terkunci<br />';
	  }
      return $result;
   }

   function hapus($idHapus){
      return $this->mData->hapusTugasAkhir($idHapus);
   }
   
   function uploadFile($i){
		$_FILES['files']['name'][$i] = preg_replace(
				 '/[^a-zA-Z0-9\.\$\%\'\`\-\@\{\}\~\!\#\(\)\&\_\^]/'
				 ,'',str_replace(array(' ','%20'),array('_','_'),$_FILES['files']['name'][$i]));

		$files = explode(".", $_FILES['files']['name'][$i]);
		$maxSize = 1000000; 	// 1.000.000 bytes
		$validExt = array('pdf','doc','docx','ppt','pptx','txt','rtf');
		$ext = strtolower($files[count($files) - 1]);
		if (!in_array($ext, $validExt)) {
			$this->mError = "File tidak valid<br>";
			return false;
		}elseif($_FILES['files']['size'][$i] > $maxSize){
			$this->mError = "File yang dimasukkan tidak boleh melebihi 1MB<br>";
			return false;
		}else{
			$fileContent = @file_get_contents($_FILES['files']['tmp_name'][$i]);
			$fileContent = base64_encode($fileContent);
			return array(
				'ext'		=> $ext,
				'filename'	=> $_FILES['files']['name'][$i],
				'content'	=> $fileContent
			);
		}
   }

}
?>