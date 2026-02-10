<?php

class SmartRead
{
	
   function SmartRead(){
   
   }

   function Read($file, $mimeType='application/octet-stream')
   {

      if (!is_file($file))
      {
         header('HTTP/1.0 404 Not Found');
         exit;
      }

      if (!is_readable($file))
      {
         header('HTTP/1.0 403 Forbidden');
         exit;
      }

      if (file_exists($file))
      {
         header('Content-Description: File Transfer');
         header('Content-Type: '.$mimeType);
         header('Content-Disposition: attachment; filename=' . basename($file));
         header('Content-Transfer-Encoding: binary');
         header('Expires: 0');
         header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
         header('Pragma: public');
         header('Content-Length: ' . filesize($file));
         ob_clean();
         flush();
         readfile($file);
         exit;
      }
   }

}
?>