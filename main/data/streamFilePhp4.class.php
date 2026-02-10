<?php
class StreamFile{

   function StreamFile(){
   
   }

   function Stream($url,$filename)
   {
      $ch = curl_init();

      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_FAILONERROR, true);
      curl_setopt($ch, CURLOPT_HEADER, false);
      curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
      curl_setopt($ch, CURLOPT_HTTPHEADER, Array("User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.15) Gecko/20080623 Firefox/2.0.0.15") );
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
      curl_setopt($ch, CURLOPT_COOKIEFILE, "cookiefile");
      curl_setopt($ch, CURLOPT_COOKIEJAR, "cookiefile");
      curl_setopt($ch, CURLOPT_URL, $url.$filename);
      curl_setopt($ch,CURLOPT_ENCODING,true);
      $value = curl_exec($ch);

      header('Expires: 0');
      header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
      header('Pragma: public');
      header('Content-Description: File Transfer');
      header("Content-Transfer-Encoding: binary");
      header("Content-Type: ".curl_getinfo($ch, CURLINFO_CONTENT_TYPE)."");
      header("Content-Length: ".curl_getinfo($ch, CURLINFO_CONTENT_LENGTH_DOWNLOAD)."");
      header("Connection: keep-alive");
      header("Content-Disposition: inline; filename=$filename");

      curl_close($ch);

      if(empty($value))
         return false;

      return $value;
   }

}

?>