<?php
include_once $cfg->GetValue('app_lib') . 'email/GtfwMail.class.php';   


function GetSubject($user){
	return "Konsultasi Mahasiswa Perbanas ".$user;
}

function GetContent($user,$links){
	$msg = " Dengan Hormat,<br/><br/>Kami sampaikan ada pesan masuk tentang konsultasi Mahasiswa Perbanas Institute.<br/>Silahkan membuka (<a href='".$links."'>portal.perbanas.id</a>) pada menu Konsultasi PA.<br/>";
	$msg .= "Dari : <b>".$user."</b><br/><br/><br/>";
	$msg .= "Salam, <br/>Perbanas Institute";
	$msg .= "<hr><small>Harap tidak membalas email ini.<br/>&copy;&nbsp;2024 BLPTI Perbanas Institute. </small>";
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
