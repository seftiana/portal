<?php
class gtfwCrypt{
	function SetKey($token){
		if(!empty($token)){
			$token = $this->_UnhashString($token);
			$arr = explode('.', $token);
			$this->mStartKey = (int)$arr[1];
			$this->mMultKey = (int)substr($arr[0], -4);
			$this->mAddKey = (int)substr($arr[0], -8, -4);
		}
	}
	
	function Encrypt($string) {
		return $string;		// bypass due lack of overflow php handling on freebsd
		$start_key = $this->mStartKey;
		$encrypted = '';
		for ($i = 0, $m = strlen($string); $i < $m; ++$i) {
			$encrypted = $encrypted . chr(ord($string{$i}) ^ ($start_key >> 8));
			$start_key = ((ord($encrypted{$i}) + $start_key) * $this->mMultKey) + $this->mAddKey;
		}
		return urlencode(base64_encode($encrypted));
	}

	function Decrypt($string) {
		return $string;		// bypass due lack of overflow php handling on freebsd
		$start_key = $this->mStartKey;
		$string = base64_decode(urldecode($string));
		$decrypted = '';
		for ($i = 0, $m = strlen($string); $i < $m; ++$i) {
			$decrypted = $decrypted . chr(ord($string{$i}) ^ ($start_key >> 8));
			$start_key = ((ord($string{$i}) + $start_key) * $this->mMultKey) + $this->mAddKey;
		}
		return $decrypted;
	}
	
	function _HashString($str){
		$ret = '';
		if(isset($str)){
			$i = strlen($str);
			do{
				$ret .= ord($str{$i});
			}while(--$i > -1);
		}
		return $ret;
	}
	
	function _UnhashString($str){
		$ret = '';
		if(isset($str)){
			$i = strlen($str);
			do{
				$tmp = substr($str,0,2);
				if($tmp<32){
					$tmp .= $str[2];
					$k = 3;
				}else{
					$k = 2;
				}
				$ret = chr($tmp) . $ret;
				$str = substr($str,$k);
			}while($i-=$k > 0);
		}
		return $ret;
	}
}
?>