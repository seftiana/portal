<?php
include_once $cfg->GetValue('app_lib') . 'email/GtfwMail.class.php';   


function GetSubject($nama){
	return "Pendaftaran Wisuda ".$nama;
}

function GetContent($nomor,$nim,$nama,$tgl){
	$msg = "Dengan Hormat,<br/><br/>Kami menyampaikan terima kasih atas pendaftaran Anda sebagai peserta wisuda Perbanas Institute Tahun 2024, dengan data.<br>";
	$msg .= "Nomor urut : <b>".$nomor."</b><br/>";
	$msg .= "Nim : <b>".$nim."</b><br/>";
	$msg .= "Nama : <b>".$nama."</b><br/><br/>";
	$msg .= "Selanjutnya kami akan melakukan validasi terlebih dahulu untuk data-data pendaftaran saudara, apabila ada hal-hal yang harus direvisi akan kami informasikan melalui email ini<br/><br/>
	Terimakasih<br/><br/>Salam<br/>Penanggung Jawab Registrasi.";
	$msg .= "<hr><small>Harap tidak membalas email ini.<br/>&copy;&nbsp;2024 Perbanas Institute. </small>";
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

function GetSubjectTiket($nama){
	return "Nomor tiket pengambilan toga ".$nama;
}

function GetContentTiket($nomor,$tiket,$nim,$nama,$tgl){
	$msg = "Dengan Hormat,<br/><br/>Bersama ini kami menyampaikan bahwa nomor tiket pengambilan toga wisuda Perbanas Institute Tahun 2024 saudara adalah sebagai berikut : <br/>";
	$msg .= "Nomor Tiket Pengambilan : <b>".$tiket."</b><br/>";
	$msg .= "Nomor Wisuda : ".$nomor."<br/>";
	$msg .= "Nim : ".$nim."<br/>";
	$msg .= "Nama : ".$nama."<br/><br/>";
	$msg .= "Untuk jadwal pengambilan toga akan kami informasikan secara terpisah melalui pengumuman di portal.perbanas.id
	<br/><br/>Salam, <br/>Penanggung Jawab Registrasi";
	$msg .= "<hr><small>Harap tidak membalas email ini.<br/>&copy;&nbsp;2024 Perbanas Institute. </small>";
	return $msg;
}
?>
