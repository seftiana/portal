<?php

require_once 'config/configuration.class.php';

class patTemplate_Function_Gtfwgetconfig extends patTemplate_Function {
   var $_name = 'Gtfwgetconfig';

   function call($params, $content) {
      if (trim($params['config']) == '' || trim($params['name']) == '')
         return 'Incomplete parameters! Expecting config and name.';

      $msg = 'Non-existent configuration!';
      
      $config_obj = new Configuration();
      $config_obj->SetConfigDir('config/');
      if (file_exists('config/language.config.php')) {
         $config_obj->Load('language.config.php');
      } else {
         return $msg;
      }

      $value = $config_obj->getValue('nim');
      if (empty($value)) {
         return $msg;
      }
         
      return $value;
      /*if (Configuration::Instance()->IsExist($params['config'], $params['name'])) {
         return Configuration::Instance()->GetValue($params['config'],$params['name']);
      } else {
         return 'Non-existent configuration!';
      }*/
   }
}
?>
