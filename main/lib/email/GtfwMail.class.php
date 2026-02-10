<?php
/**
* FILENAME     : GtfwMail.class.php
* @package     : GtfwMail
*/

require_once 'PHPMailer/PHPMailerAutoload.php';

class GtfwMail
{
   private static $mrInstance;
   private $mailer;
   private $debug    = 0;
   private $host;
   private $port;
   private $smtpSecure  = 'tls';
   private $smtpUsername;
   private $smtpPassword;
   private $subject;
   private $sender      = array();
   private $recipient;

   function __construct()
   { 
      $config           = $this->GetSmtpConfig();
	  
      $this->mailer     = new PHPMailer();
      // //Tell PHPMailer to use SMTP
      $this->mailer->IsSMTP();
	  $this->mailer->SMTPDebug = 2;
      // set debug output to html
      $this->mailer->Debugoutput = 'html';
      // set host
      $this->mailer->Host        = $config['host'];

      //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
      $this->mailer->Port        = $config['port'];

      // Set the encryption system to use - ssl (deprecated) or tls
      $this->mailer->SMTPSecure  = $config['secure'];

      // Whether to use SMTP authentication
      $this->mailer->SMTPAuth    = $config['auth'];

      // Username to use for SMTP authentication - use full email address for gmail
      $this->mailer->Username    = $config['username'];

      // Password to use for SMTP authentication
      $this->mailer->Password    = $config['password'];
   }

   private function GetSmtpConfig()
   {
	 global $cfg;
	 $smtpConfig = $cfg->mValue['smtp'];
	 return $smtpConfig;
   }

   public function setDebug($debug = 0)
   {
      $this->debug      = $debug;
   }

   public function setSubject($subject='')
   {
      if(!$subject OR $subject == ''){
         $subject       = 'No Subject';
      }

      $this->mailer->Subject  = $subject;
   }

   public function setSender($address = NULL, $name = '')
   {
      $config           = $this->GetSmtpConfig();
      if($address === NULL){
         $address       = $config['sender'];
         $address       = self::CheckMail($address);
      }else{
         $address       = self::CheckMail($address);
         if($name != ''){
            $address['name']     = $name;
         }
      }

      $this->sender     = $address;
   }

   public function GetSender()
   {
      $sender     = $this->sender;
      if(empty($sender)){
         $this->setSender();
      }

      return $this->sender;
   }

   public function setRecipient($recipients = array())
   {
      foreach ($recipients as $recipient) {
         $address    = self::CheckMail($recipient);
         if($address !== null){
            $this->mailer->addAddress($address['email'], $address['name']);
         }
      }
   }

   public function Send($content = '', $attachment = '')
   {
      $mailSender                = $this->GetSender();
      $this->mailer->SMTPDebug   = $this->debug;
      $this->mailer->WordWrap    = 50;
      $this->mailer->isHTML(true);
      $this->mailer->setFrom($mailSender['email'], $mailSender['name']);
      $this->mailer->addReplyTo($mailSender['email'], $mailSender['name']);
      $this->mailer->Body        = $content;
      $this->mailer->AltBody     = 'This is the body in plain text for non-HTML mail clients';
      if($attachment != ''){
         $this->mailer->addAttachment($attachment);
      }
      if($this->mailer->send() === true){
         $return['result']       = true;
         $return['error']        = null;
      }else{
         $return['result']       = false;
         $return['error']        = $this->mailer->ErrorInfo;
      }

      return (array)$return;
   }

   public function SendHtml($contents, $basedir = '')
   {
      $mailSender                = $this->GetSender();
      $this->mailer->SMTPDebug   = $this->debug;
      $this->mailer->WordWrap    = 50;
      $this->mailer->isHTML(true);
      $this->mailer->setFrom($mailSender['email'], $mailSender['name']);
      $this->mailer->addReplyTo($mailSender['email'], $mailSender['name']);
      $this->mailer->msgHTML(file_get_contents($contents), $basedir);
      $this->mailer->AltBody     = 'This is the body in plain text for non-HTML mail clients';

      if($this->mailer->send() === true){
         $return['result']       = true;
         $return['error']        = null;
      }else{
         $return['result']       = false;
         $return['error']        = $this->mailer->ErrorInfo;
      }

      return (array)$return;
   }

   public function SendHtmlAttach($fileAttch,$isiMsg)
   {
      $mailSender                = $this->GetSender();
      $this->mailer->SMTPDebug   = $this->debug;
      $this->mailer->WordWrap    = 50;
      $this->mailer->isHTML(true);
      $this->mailer->setFrom($mailSender['email'], $mailSender['name']);
      $this->mailer->addReplyTo($mailSender['email'], $mailSender['name']);
      $this->mailer->Body        = $isiMsg;
      $this->mailer->addAttachment($fileAttch);
      $this->mailer->AltBody     = 'This is the body in plain text for non-HTML mail clients';

      if($this->mailer->send() === true){
         $return['result']       = true;
         $return['error']        = null;
      }else{
         $return['result']       = false;
         $return['error']        = $this->mailer->ErrorInfo;
      }

      return (array)$return;
   }

   public function CheckMail($email)
   {
      $mailPatern          = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
      if(preg_match($mailPatern, $email)){
         list($name, $host)   = explode('@', $email);
         if(checkdnsrr($host, 'MX')){
            $return['name']   = $name;
            $return['host']   = $host;
            $return['email']  = $email;

            return (array)$return;
         }else{
            return null;
         }
      }else{
         return null;
      }
   }
}
?>