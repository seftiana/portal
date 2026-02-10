<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

require_once("include/dbcommon.php");
require_once("classes/searchclause.php");
require_once("include/mahasiswa_registrasi_variables.php");
require_once('include/xtempl.php');
require_once('classes/addpage.php');
require_once('include/lookuplinks.php');

add_nocache_headers();

InitLookupLinks();

if( !AddPage::processAddPageSecurity( $strTableName ) )
	return;

AddPage::handleBrokenRequest();







$layout = new TLayout("list_bootstrap", "BoldBlueWave", "MobileBlueWave");
$layout->version = 3;
	$layout->bootstrapTheme = "cerulean";
		$layout->customCssPageName = "mahasiswa_registrasi_list";
$layout->blocks["center"] = array();
$layout->containers["tabs"] = array();
$layout->container_properties["tabs"] = array(  );
$layout->containers["tabs"][] = array("name"=>"bsgrid_tabs",
	"block"=>"grid_tabs", "substyle"=>1  );

$layout->skins["tabs"] = "";

$layout->blocks["center"][] = "tabs";
$layout->containers["message"] = array();
$layout->container_properties["message"] = array(  );
$layout->containers["message"][] = array("name"=>"message",
	"block"=>"message_block", "substyle"=>1  );

$layout->skins["message"] = "";

$layout->blocks["center"][] = "message";
$layout->containers["grid"] = array();
$layout->container_properties["grid"] = array(  );
$layout->containers["grid"][] = array("name"=>"grid",
	"block"=>"grid_block", "substyle"=>1  );

$layout->skins["grid"] = "";

$layout->blocks["center"][] = "grid";
$layout->containers["pagination"] = array();
$layout->container_properties["pagination"] = array(  );
$layout->containers["pagination"][] = array("name"=>"pagination",
	"block"=>"pagination_block", "substyle"=>1  );

$layout->skins["pagination"] = "";

$layout->blocks["center"][] = "pagination";
$layout->blocks["left"] = array();
$layout->containers["filt"] = array();
$layout->container_properties["filt"] = array(  );
$layout->containers["filt"][] = array("name"=>"searchpanel",
	"block"=>"searchPanel", "substyle"=>1  );

$layout->skins["filt"] = "";

$layout->blocks["left"][] = "filt";
$layout->blocks["top"] = array();
$layout->containers["top"] = array();
$layout->container_properties["top"] = array(  );
$layout->containers["top"][] = array("name"=>"wrapper",
	"block"=>"", "substyle"=>1 , "container"=>"menu" );
$layout->containers["menu"] = array();
$layout->container_properties["menu"] = array(  );
$layout->containers["menu"][] = array("name"=>"wrapper",
	"block"=>"", "substyle"=>1 , "container"=>"hdr" );
$layout->containers["hdr"] = array();
$layout->container_properties["hdr"] = array(  );
$layout->containers["hdr"][] = array("name"=>"logo",
	"block"=>"logo_block", "substyle"=>1  );

$layout->containers["hdr"][] = array("name"=>"bsnavbarcollapse",
	"block"=>"collapse_block", "substyle"=>1  );

$layout->skins["hdr"] = "";


$layout->containers["menu"][] = array("name"=>"wrapper",
	"block"=>"", "substyle"=>1 , "container"=>"menu_1" );
$layout->containers["menu_1"] = array();
$layout->container_properties["menu_1"] = array(  );
$layout->containers["menu_1"][] = array("name"=>"hmenu",
	"block"=>"menu_block", "substyle"=>1  );

$layout->containers["menu_1"][] = array("name"=>"wrapper",
	"block"=>"", "substyle"=>1 , "container"=>"more" );
$layout->containers["more"] = array();
$layout->container_properties["more"] = array(  );
$layout->containers["more"][] = array("name"=>"morebutton",
	"block"=>"more_list", "substyle"=>1  );

$layout->containers["more"][] = array("name"=>"loggedas",
	"block"=>"security_block", "substyle"=>1  );

$layout->skins["more"] = "";


$layout->containers["menu_1"][] = array("name"=>"wrapper",
	"block"=>"", "substyle"=>1 , "container"=>"more_1" );
$layout->containers["more_1"] = array();
$layout->container_properties["more_1"] = array(  );
$layout->containers["more_1"][] = array("name"=>"search",
	"block"=>"searchform_block", "substyle"=>1  );

$layout->skins["more_1"] = "";


$layout->skins["menu_1"] = "";


$layout->skins["menu"] = "";


$layout->containers["top"][] = array("name"=>"wrapper",
	"block"=>"", "substyle"=>1 , "container"=>"breadcrumbs" );
$layout->containers["breadcrumbs"] = array();
$layout->container_properties["breadcrumbs"] = array(  );
$layout->containers["breadcrumbs"][] = array("name"=>"wrapper",
	"block"=>"", "substyle"=>1 , "container"=>"bc" );
$layout->containers["bc"] = array();
$layout->container_properties["bc"] = array(  );
$layout->containers["bc"][] = array("name"=>"breadcrumbs",
	"block"=>"breadcrumbs", "substyle"=>1  );

$layout->skins["bc"] = "";


$layout->skins["breadcrumbs"] = "";


$layout->containers["top"][] = array("name"=>"wrapper",
	"block"=>"", "substyle"=>1 , "container"=>"masterinfo" );
$layout->containers["masterinfo"] = array();
$layout->container_properties["masterinfo"] = array(  );
$layout->containers["masterinfo"][] = array("name"=>"masterinfo",
	"block"=>"mastertable_block", "substyle"=>1  );

$layout->skins["masterinfo"] = "";


$layout->containers["top"][] = array("name"=>"wrapper",
	"block"=>"", "substyle"=>1 , "container"=>"gridcontrols" );
$layout->containers["gridcontrols"] = array();
$layout->container_properties["gridcontrols"] = array(  );
$layout->containers["gridcontrols"][] = array("name"=>"wrapper",
	"block"=>"", "substyle"=>1 , "container"=>"add_delete" );
$layout->containers["add_delete"] = array();
$layout->container_properties["add_delete"] = array(  );
$layout->containers["add_delete"][] = array("name"=>"add",
	"block"=>"newrecord_controls_block", "substyle"=>1  );

$layout->containers["add_delete"][] = array("name"=>"recordcontrol",
	"block"=>"record_controls_block", "substyle"=>1  );

$layout->skins["add_delete"] = "";


$layout->containers["gridcontrols"][] = array("name"=>"wrapper",
	"block"=>"", "substyle"=>1 , "container"=>"gridinfo" );
$layout->containers["gridinfo"] = array();
$layout->container_properties["gridinfo"] = array(  );
$layout->containers["gridinfo"][] = array("name"=>"details_found",
	"block"=>"details_found", "substyle"=>1  );

$layout->containers["gridinfo"][] = array("name"=>"printpanel",
	"block"=>"print_friendly", "substyle"=>1  );

$layout->skins["gridinfo"] = "";


$layout->skins["gridcontrols"] = "";


$layout->skins["top"] = "";

$layout->blocks["top"][] = "top";
$page_layouts["mahasiswa_registrasi_list"] = $layout;




// add master layouts 




$layout = new TLayout("masterlist_bootstrap", "BoldBlueWave", "MobileBlueWave");
$layout->version = 3;
	$layout->bootstrapTheme = "cerulean";
		$layout->customCssPageName = "mahasiswa_masterlist";
$layout->blocks["bare"] = array();
$layout->containers["column"] = array();
$layout->container_properties["column"] = array(  );
$layout->containers["column"][] = array("name"=>"masterlistheader",
	"block"=>"masterlist_title", "substyle"=>1  );

$layout->skins["column"] = "";

$layout->blocks["bare"][] = "column";
$layout->containers["mastergrid"] = array();
$layout->container_properties["mastergrid"] = array(  );
$layout->containers["mastergrid"][] = array("name"=>"masterlistgrid",
	"block"=>"", "substyle"=>1  );

$layout->skins["mastergrid"] = "";

$layout->blocks["bare"][] = "mastergrid";
$page_layouts["mahasiswa_masterlist"] = $layout;



// end add master layouts 



$pageMode = AddPage::readAddModeFromRequest();

$xt = new Xtempl();

$id = postvalue("id");
$id = intval($id) == 0 ? 1 : $id;
	 	
//an array of AddPage constructor's params 
$params = array();
$params["id"] = $id;
$params["xt"] = &$xt;
$params["mode"] = $pageMode;
$params["pageType"] = PAGE_ADD;
$params["tName"] = $strTableName;
$params["action"] = postvalue("a");
$params["needSearchClauseObj"] = false;
$params["afterAdd_id"] = postvalue("afteradd");
$params["masterTable"] = postvalue("mastertable");
if( $params["masterTable"] )
{
	$i = 1;
	$params["masterKeysReq"] = array();
		
	while( isset( $_REQUEST["masterkey".$i] ) ) 
	{
		$params["masterKeysReq"][ $i ] = $_REQUEST["masterkey".$i];
		$i++;
	}	
}

		
	;
$params["captchaValue"] = postvalue("value_captcha_" . $id);
$params["dashElementName"] = postvalue("dashelement");
$params["fromDashboard"] = postvalue("fromDashboard");
$params["dashTName"] = $params["fromDashboard"] ? $params["fromDashboard"] : postvalue("dashTName");

if( $pageMode == ADD_INLINE )
{
	// Inline add in a 'List page with search' lookup
	$params["forListPageLookup"] = postvalue('forLookup');
	
	$params["screenWidth"] = postvalue("screenWidth");
	$params["screenHeight"] = postvalue("screenHeight");
	$params["orientation"] = postvalue("orientation");
	
	$params["masterPageType"] = postvalue("masterpagetype");
}	

if( $pageMode == ADD_ONTHEFLY || $pageMode == ADD_INLINE && postvalue('forLookup') )	
{
	//table where lookup is set
	$params["lookupTable"] = postvalue("table");
	//field with lookup is set	
	$params["lookupField"] = postvalue("field");
	 //the ptype od the page where lookup is set
	$params["lookupPageType"] = postvalue("pageType");
	
	if( postvalue('parentsExist') )
	{
		//the parent controls values data
		$params["parentCtrlsData"] = my_json_decode( postvalue("parentCtrlsData") );		
	}		
}

$pageObject = new AddPage($params);
$pageObject->init();

$pageObject->process();	
?>