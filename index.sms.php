<?
   //Load Configuration
   require_once 'config/configuration.class.php';
   $cfg = new Configuration();
   $cfg->Load('base.conf.php');
   
   //Load Library Class
   require_once $cfg->GetValue('app_lib') . 'adodb/adodb.inc.php';
   require_once $cfg->GetValue('app_lib') . 'nusoap/nusoap.php';
      
   //Load Application Class
   require_once $cfg->GetValue('app_data') . 'database_connected.class.php';     
   require_once $cfg->GetValue('app_data') . 'user_identity.class.php';
   require_once $cfg->GetValue('app_data') . 'role.class.php';
   require_once $cfg->GetValue('app_data') . 'security.class.php';
   require_once $cfg->GetValue('app_service') . 'client/base_client.service.class.php';   
   require_once $cfg->GetValue('app_proc') . 'process_base.class.php';     
   
   require_once $cfg->GetValue('app_module') . 'reference/business/reference.class.php';   
   require_once $cfg->GetValue('app_module') . 'login/business/gatekeeper.class.php';   
   require_once $cfg->GetValue('app_module') . 'sms/communication/sms_client.service.class.php'; 
   require_once $cfg->GetValue('app_module') . 'login/display/proses_login.class.php'; 
   require_once $cfg->GetValue('app_module') . 'user/communication/user_client.service.class.php';   
   require_once $cfg->GetValue('app_module') . 'sms/display/process_sms.class.php'; 
   
   if (! isset($_GET['params'])) {
      print "Maaf, Anda salah memasukkan parameter SMS. Silakan dicek kembali.";
      exit;
   }
   $arr = ParseParams($_GET['params']);
   
   if ($arr['service'] == ''  || $arr['param1'] =='' || $arr['param2']=='') {
      print "Maaf, Anda salah memasukkan parameter SMS. Silakan dicek kembali.";
      exit;
   }
   
   $processObj = new ProcessSms($cfg, $arr) ;
   $method = 'Get'.ucfirst($arr['service']) ;
   //eval('$result = $processObj->'.$method.'()');
   $result = $processObj->$method();
   print($result);
   
   function ParseParams($param) {
      $arr = array();
      list($arr['service'], $arr['param1'], $arr['param2']) = explode(' ', $param);

      $arr['service'] = strtolower($arr['service']);
      $arr['param1'] = strtolower($arr['param1']);
      $arr['param2'] = strtolower($arr['param2']);

      return $arr;
   }
   
?>