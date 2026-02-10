<?php
include_once $cfg->GetValue('app_lib') . 'email/GtfwMail.class.php';   


function GetSubject(){
	return "Akun Portal Akademik";
}

function GetContent($user,$pass,$status=''){
	$msg = "Dengan Hormat,<br/><br/>Kami sampaikan ".$status." data Anda pada Portal Akademik Perbanas Institute (<a href='http://portal.perbanas.id'>Portal.perbanas.id</a>).<br/>";
	$msg .= "Username : <b>".$user."</b><br/>";
	$msg .= "Password : <b>".$pass."</b><br/><br/>";
	$msg .= "Salam, <br/>Perbanas Institute";
	$msg .= "<hr><small>Harap tidak membalas email ini dengan <i>password</i> Anda. Kami tidak pernah meminta <i>password</i> Anda dan harap tidak berbagi <i>password</i> Anda dengan orang lain.<br/>&copy;&nbsp;2018 Perbanas Institute. </small>";
	return $msg;
}

function SendMail($email,$subject,$content){
	$mail = new GtfwMail();	
	$mail->setRecipient(array($email));
	$mail->setSubject($subject);
	$mailStatus=$mail->Send($content);
	
	//send the message, check for errors
	if ($mailStatus['result']===false) {
		return "Mailer Error: " . $mail->ErrorInfo;
	} else {
		return true;
	}
}
?>
