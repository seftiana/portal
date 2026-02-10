<?php
require_once '../classes/lib/config/configuration.class.php';
$cfg = new Configuration();
$cfg->SetConfigDir('../conf/');
$cfg->Load('base.conf.php');
require_once $cfg->GetValue('docroot') . 'classes/lib/cryptlink/cryptlink.class.php';
require_once $cfg->GetValue('docroot') . 'classes/lib/adodb/adodb.inc.php';
require_once $cfg->GetValue('docroot') . 'classes/lib/pat_template/pat_template.php';
require_once $cfg->GetValue('docroot') . 'classes/lib/nusoap/nusoap.php';

require_once $cfg->GetValue('docroot') . 'classes/data/database_connected.class.php';
require_once $cfg->GetValue('docroot') . 'classes/communication/client/service_client.class.php';

require_once $cfg->GetValue('docroot') . 'classes/data/peserta_mata_kuliah.class.php';

require_once $cfg->GetValue('docroot') . 'classes/proc/display_base.class.php';
//require_once $cfg->GetValue('docroot') . 'classes/proc/display_db_app.class.php';
require_once $cfg->GetValue('docroot') . 'classes/proc/tugas/display_daftar_peserta_mk.class.php';

require_once $cfg->GetValue('docroot') . 'classes/data/security.class.php';
require_once $cfg->GetValue('docroot') . 'classes/data/user_identity.class.php';
require_once $cfg->GetValue('docroot') . 'classes/data/links.class.php';

require_once $cfg->GetValue('docroot') . 'constants/role.const.php';

$ThisPageAccessRight = DOSEN;

$security = new Security($cfg);
if (false !== $security->CheckAccessRight($ThisPageAccessRight))
{
	$ThisPageLinks = $security->mUserIdentity->GetRole();
	$page = htmlspecialchars($_GET['page']);
	$param = htmlspecialchars($_GET['param']);
	$lnk = new Links ($cfg, $ThisPageLinks);
	$app = new DisplayDaftarPesertaMataKuliah($cfg, $param);
	$app->SetLinks($lnk);
	$app->SetTemplateFile('daftar_peserta_mk.html');
	$app->Display();
}
else
{
	$security->DenyPageAccess();
}


?>