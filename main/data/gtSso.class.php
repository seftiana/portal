<?php
/*
@ClassName		: gtSSO
@Copyright		: PT Gamatechno Indonesia
@Analyzed By	: Wahyu Adi Yuwono <wahyu@gamatechno.com>
@Author By		: Wahyu Adi Yuwono <wahyu@gamatechno.com>
@Version		: 0.1
@StartDate		: 2014-01-28
@LastUpdate		: 2014-01-28
@Description	: Single Sign On over another application domain
@Requirement	: PHP 5 or later
*/

class gtSSO{
	private static $mInstance;
	private $mDomain;
	private $mServer = '54e3d2c4bfdedcb6e0727d3ae8eb3060.php';
	private $mKey = 'gtSharedSession';
	private $lKey;
	private $salt;
	private $debug=false;
	private $buffer = '';
	
	/*
	@Method			: setDomain
	@LastUpdate		: 2014-01-28
	@Description	: Set Registered Domain
	*/
	public function setDomain($domain){
		if(is_array($domain))$this->mDomain = $domain;
		else $this->mDomain = array($domain);
		for($i=0,$m=count($this->mDomain);$i<$m;++$i){
			if($this->mDomain[$i]{(strlen($this->mDomain[$i])-1)} != '/')$this->mDomain[$i] .= '/';
		}
	}
	
	/*
	@Method			: getDomain
	@LastUpdate		: 2014-01-28
	@Description	: Get Registered Domain
	*/
	public function getDomain($domain){
		return $this->mDomain;
	}
	
	/*
	@Method			: doLogin
	@LastUpdate		: 2014-01-28
	@Description	: Login to all Registered Domain
	*/
	public function doLogin($key, $redirect=''){
		for($i=0,$m=count($this->mDomain);$i<$m;++$i){
			$domain = $this->mDomain[$i];
			if(strpos($domain, 'http://') !== 0 && strpos($domain, 'https://') !== 0)$domain = 'http://' . $domain;
			$this->setKey(md5($domain));
			$token = $this->getRemoteToken($domain);
			$this->output($domain . $this->mServer . '?' . $this->enc('session_' . $key . '_' . $token));
		}
		if(!empty($redirect)){
			$this->buffer .= '<meta http-equiv="refresh" content="0; url='.$redirect.'" />';
		}
	}
	
	/*
	@Method			: doLogout
	@LastUpdate		: 2014-01-28
	@Description	: Logout to all Registered Domain
	*/
	public function doLogout($redirect=''){
		for($i=0,$m=count($this->mDomain);$i<$m;++$i){
			$domain = $this->mDomain[$i];
			if(strpos($domain, 'http://') !== 0 && strpos($domain, 'https://') !== 0)$domain = 'http://' . $domain;
			$this->setKey(md5($domain));
			$this->output($domain . $this->mServer . '?' . $this->enc('unsession_'));
		}
		if(!empty($redirect)){
			$this->buffer .= '<meta http-equiv="refresh" content="0; url='.$redirect.'" />';
		}
	}
	
	/*
	@Method			: isLoggedIn
	@LastUpdate		: 2014-01-28
	@Description	: Check login status
	@Return			: false on fail
	*/
	public function isLoggedIn(){
		if(isset($_SESSION[$this->mKey]))return $_SESSION[$this->mKey];
		return false;
	}
	
	/*
	@Method			: dispatch
	@LastUpdate		: 2014-01-28
	@Description	: Dispatch request
	@Return			: token on default
	*/
	public function dispatch(){
		foreach($_GET as $k => $v){
			if(empty($v)){
				$sess = explode('_', $this->dec($k));
				if(isset($sess[0])){
					if($sess[0] == 'session'){
						$tmpDir = $this->getTempDir();
						if(isset($sess[1])){
							$token = $tmpDir . $sess[2];
							if(file_exists($token)){
								$key = $sess[1];
								$_SESSION[$this->mKey] = $key;
								@unlink($token);
								echo $this->enc('session_' . $key);
							}
						}
					}elseif($sess[0] == 'unsession'){
						unset($_SESSION[$this->mKey]);
						session_destroy();
						return;
					}
				}
				break;
			}
		}
		
		$token = $this->getToken();
		$fp = @fopen($this->getTempDir() . $token, 'x');
		@fclose($fp);
		echo $token;
	}
	
	static function Instance(){
		if(!isset(self::$mInstance))self::$mInstance = new gtSSO();
		return self::$mInstance;
	}
	
	private function __construct(){
		$sess_id=session_id();
		if(empty($sess_id))session_start();
		if(isset($_SERVER['HTTPS']))$p = 'https://';
		else $p = 'http://';
		$d = explode('/',$_SERVER['REQUEST_URI']);
		$d[count($d)-1]='';
		$id=$p . $_SERVER['HTTP_HOST'] . (implode('/', $d));
		$this->lKey = md5($id);
		$this->setKey($this->lKey);
		$this->mDomain = array();
		$ref = array();
		for($j=0,$i=65;$i<91;++$i){
			$ref['a'][$j] = chr($i);
			$ref['p'][$ref['a'][$j]] = $j++;
		}
		$this->refChar = $ref;
		$this->noise = md5(time());
	}
	
	private function getToken(){
		return trim($this->enc(time()));
	}
	
	private function getRemoteToken($domain){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $domain . $this->mServer);
		curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);
		$ch = null;
		return trim($response);
	}
	
	private function output($url){
		echo '<iframe src="' . $url . '" style="display:none" onload="this.parentNode.remove(this);"></iframe>';
	}
	
	private function explodeSession($session){
		$tmp = explode(';', $session);
		$ret = array(
			'name'		=> '',
			'value'		=> '',
			'expires'	=> '',
			'path'		=> '',
			'domain'	=> '',
			'secure'	=> false,
			'httponly'	=> false
		);
		for($i=0,$m=count($tmp);$i<$m;++$i){
			$x = explode('=', $tmp[$i]);
			$x[0] = trim($x[0]);
			if(!isset($ret[$x[0]])){
				$ret['name'] = $x[0];
				$ret['value'] = $x[1];
			}else $ret[$x[0]] = $x[1];
		}
		return $ret;
	}
	
	private function setKey($seq){
		$this->salt=chr($seq);
	}

	private function enc($string){
		if($this->debug)return $string;
		$ret = $this->__baseCrypt($string);
		return urlencode(base64_encode($this->__addNoise($ret)));
	}
	
	private function dec($string){
		if($this->debug)return $string;
		$string = base64_decode(urldecode($string));
		$ret = $this->__baseCrypt($this->__removeNoise($string));
		return $ret;
	}
	
	private function __baseCrypt($str){
		$str = (string)$str;
		$x = $this->salt;
		$ret = '';
		for($i=0,$m=strlen($str);$i<$m;++$i){
			$ret .= chr(ord($str{$i}) ^ $x);
		}
		return $ret;
	}
	
	private function __addNoise($str){
		$ret = '';
		$noise = $this->noise;
		$y = strlen($noise);
		for($i=0,$m=strlen($str);$i<$m;++$i){
			$ret .= $str{$i} . $noise{($i%$y)};
		}
		return $ret;
	}
	
	private function __removeNoise($str){
		$ret = '';
		for($i=0,$m=strlen($str);$i<$m;$i+=2){
			$ret .= $str{$i};
		}
		return $ret;
	}
	
	private function getTempDir(){
		$tmpDir = ini_get('upload_tmp_dir');
		if(empty($tmpDir)){
			$tmpDir = session_save_path();
			if(empty($tmpDir)){
				$tmpDir = getcwd();
				if(!is_writable($tmpDir))$tmpDir = '/tmp';
			}
		}
		if($tmpDir[strlen($tmpDir)-1]!='/')$tmpDir .= '/';
		return $tmpDir;
	}
	
	public function __destruct(){
		echo $this->buffer;
	}
}

?>