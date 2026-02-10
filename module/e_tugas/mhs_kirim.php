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

require_once $cfg->GetValue('docroot') . 'classes/data/assignment.class.php';
require_once $cfg->GetValue('docroot') . 'classes/data/announcement.class.php';
//require_once $cfg->GetValue('docroot') . 'classes/data/program_studi.class.php';
//require_once $cfg->GetValue('docroot') . 'classes/data/proposed_classes.class.php';

//require_once $cfg->GetValue('docroot') . 'classes/communication/client/program_studi.class.php';
//require_once $cfg->GetValue('docroot') . 'classes/communication/client/proposed_classes.class.php';

require_once $cfg->GetValue('docroot') . 'classes/proc/display_base.class.php';
require_once $cfg->GetValue('docroot') . 'classes/proc/display_db_app.class.php';
require_once $cfg->GetValue('docroot') . 'classes/proc/tugas/display_mhs_kirim.class.php';

require_once $cfg->GetValue('docroot') . 'classes/data/security.class.php';
require_once $cfg->GetValue('docroot') . 'classes/data/user_identity.class.php';
require_once $cfg->GetValue('docroot') . 'classes/data/links.class.php';

require_once $cfg->GetValue('docroot') . 'constants/role.const.php';

$ThisPageAccessRight = MAHASISWA;

$security = new Security($cfg);
if (false !== $security->CheckAccessRight($ThisPageAccessRight))
{
	//$lnk = new Links ($cfg, 1); //baris ini akan dihapus dan diganti oleh dua baris comment di bawahnya apabila security telah diaktifkan
	$ThisPageLinks = $security->mUserIdentity->GetRole();
	$page = htmlspecialchars($_GET['page']);
	$lnk = new Links ($cfg, $ThisPageLinks);
	$id = htmlspecialchars($_GET['id']);
	$mhsNim = $_SESSION['user_identity']->GetIdReferensi();
	$app = new DisplayMhsKirim($cfg, $id, $mhsNim);
	$app->SetLinks($lnk);
	$app->SetTemplateFile('mhs_kirim.html');
	$app->Display();
}
else
{
	$security->DenyPageAccess();
}


?>