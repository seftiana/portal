<?php
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

require_once("include/dbcommon.php");
header("Expires: Thu, 01 Jan 1970 00:00:01 GMT"); 

require_once("include/s_krs_detil_variables.php");

$mode = postvalue("mode");

if(!isLogged())
{ 
	return;
}
if(!CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Search"))
{
	return;
}

require_once("classes/searchclause.php");

$cipherer = new RunnerCipherer($strTableName);

require_once('include/xtempl.php');
$xt = new Xtempl();





$layout = new TLayout("detailspreview_bootstrap", "BoldBlueWave", "MobileBlueWave");
$layout->version = 3;
	$layout->bootstrapTheme = "cerulean";
		$layout->customCssPageName = "s_krs_detil_detailspreview";
$layout->blocks["bare"] = array();
$layout->containers["dcount"] = array();
$layout->container_properties["dcount"] = array(  );
$layout->containers["dcount"][] = array("name"=>"bsdetailspreviewcount",
	"block"=>"", "substyle"=>1  );

$layout->skins["dcount"] = "";

$layout->blocks["bare"][] = "dcount";
$layout->containers["detailspreviewgrid"] = array();
$layout->container_properties["detailspreviewgrid"] = array(  );
$layout->containers["detailspreviewgrid"][] = array("name"=>"detailspreviewfields",
	"block"=>"details_data", "substyle"=>1  );

$layout->skins["detailspreviewgrid"] = "";

$layout->blocks["bare"][] = "detailspreviewgrid";
$page_layouts["s_krs_detil_detailspreview"] = $layout;




$recordsCounter = 0;

//	process masterkey value
$mastertable = postvalue("mastertable");
$masterKeys = my_json_decode(postvalue("masterKeys"));
$sessionPrefix = "_detailsPreview";
if($mastertable != "")
{
	$_SESSION[$sessionPrefix."_mastertable"]=$mastertable;
//	copy keys to session
	$i = 1;
	if(is_array($masterKeys) && count($masterKeys) > 0)
	{
		while(array_key_exists ("masterkey".$i, $masterKeys))
		{
			$_SESSION[$sessionPrefix."_masterkey".$i] = $masterKeys["masterkey".$i];
			$i++;
		}
	}
	if(isset($_SESSION[$sessionPrefix."_masterkey".$i]))
		unset($_SESSION[$sessionPrefix."_masterkey".$i]);
}
else
	$mastertable = $_SESSION[$sessionPrefix."_mastertable"];

$params = array();
$params['id'] = 1;
$params['xt'] = &$xt;
$params['tName'] = $strTableName;
$params['pageType'] = "detailspreview";
$pageObject = new DetailsPreview($params);

$pSet = new ProjectSettings($strTableName, PAGE_LIST);


$whereClauses = array();
if($mastertable == "s_kelas")
{
	$formattedValue = make_db_value("krsdtKlsId",$_SESSION[$sessionPrefix."_masterkey1"]);
	if( $formattedValue == "null" )
		$whereClauses[] = $pageObject->getFieldSQLDecrypt("krsdtKlsId") . " is null";
	else
		$whereClauses[] = $pageObject->getFieldSQLDecrypt("krsdtKlsId") . "=" . $formattedValue;
}
if($mastertable == "Kelas ID")
{
	$formattedValue = make_db_value("krsdtKlsId",$_SESSION[$sessionPrefix."_masterkey1"]);
	if( $formattedValue == "null" )
		$whereClauses[] = $pageObject->getFieldSQLDecrypt("krsdtKlsId") . " is null";
	else
		$whereClauses[] = $pageObject->getFieldSQLDecrypt("krsdtKlsId") . "=" . $formattedValue;
}

$whereClauses[] = SecuritySQL("Search", $strTableName);
$query = $pSet->getSQLQuery();

$strSQL = $query->buildSQL_default( $whereClauses );
$rowcount = $pageObject->connection->getFetchedRowsNumber( $strSQL );

$strSQL .= $pageObject->getOrderByClause();

$xt->assign("row_count",$rowcount);
if($rowcount) 
{
	$xt->assign("details_data",true);

	$display_count = 10;
	if($mode == "inline")
		$display_count*=2;
		
	if($rowcount>$display_count+2)
	{
		$xt->assign("display_first",true);
		$xt->assign("display_count",$display_count);
	}
	else
		$display_count = $rowcount;

	$rowinfo = array();
	
	require_once getabspath('classes/controls/ViewControlsContainer.php');
	$viewContainer = new ViewControlsContainer($pSet, PAGE_LIST);
	$viewContainer->isDetailsPreview = true;

	$b = true;
	$qResult = $pageObject->connection->query( $strSQL );
	$data = $cipherer->DecryptFetchedArray( $qResult->fetchAssoc() );
	while($data && $recordsCounter<$display_count) {
		$recordsCounter++;
		$row = array();
		$keylink = "";
		$keylink.="&key1=".runner_htmlspecialchars(rawurlencode(@$data["krsdtId"]));
	
	
	//	krsdtId - Custom
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("krsdtId", $data, $keylink);
			$row["krsdtId_value"] = $value;
			$format = $pSet->getViewFormat("krsdtId");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("krsdtId")))
				$class = ' rnr-field-number';
			$row["krsdtId_class"] = $class;
	//	krsMhsNiu - Custom
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("krsMhsNiu", $data, $keylink);
			$row["krsMhsNiu_value"] = $value;
			$format = $pSet->getViewFormat("krsMhsNiu");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("krsMhsNiu")))
				$class = ' rnr-field-number';
			$row["krsMhsNiu_class"] = $class;
	//	mhsNama - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("mhsNama", $data, $keylink);
			$row["mhsNama_value"] = $value;
			$format = $pSet->getViewFormat("mhsNama");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("mhsNama")))
				$class = ' rnr-field-number';
			$row["mhsNama_class"] = $class;
	//	mhsProdiKode - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("mhsProdiKode", $data, $keylink);
			$row["mhsProdiKode_value"] = $value;
			$format = $pSet->getViewFormat("mhsProdiKode");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("mhsProdiKode")))
				$class = ' rnr-field-number';
			$row["mhsProdiKode_class"] = $class;
	//	klsNama - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("klsNama", $data, $keylink);
			$row["klsNama_value"] = $value;
			$format = $pSet->getViewFormat("klsNama");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("klsNama")))
				$class = ' rnr-field-number';
			$row["klsNama_class"] = $class;
	//	mhsEmail - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("mhsEmail", $data, $keylink);
			$row["mhsEmail_value"] = $value;
			$format = $pSet->getViewFormat("mhsEmail");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("mhsEmail")))
				$class = ' rnr-field-number';
			$row["mhsEmail_class"] = $class;
	//	sempSemId - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("sempSemId", $data, $keylink);
			$row["sempSemId_value"] = $value;
			$format = $pSet->getViewFormat("sempSemId");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("sempSemId")))
				$class = ' rnr-field-number';
			$row["sempSemId_class"] = $class;
	//	prodiJjarKode - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("prodiJjarKode", $data, $keylink);
			$row["prodiJjarKode_value"] = $value;
			$format = $pSet->getViewFormat("prodiJjarKode");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("prodiJjarKode")))
				$class = ' rnr-field-number';
			$row["prodiJjarKode_class"] = $class;
	//	prodiNamaResmi - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("prodiNamaResmi", $data, $keylink);
			$row["prodiNamaResmi_value"] = $value;
			$format = $pSet->getViewFormat("prodiNamaResmi");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("prodiNamaResmi")))
				$class = ' rnr-field-number';
			$row["prodiNamaResmi_class"] = $class;
	//	krsId - Custom
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("krsId", $data, $keylink);
			$row["krsId_value"] = $value;
			$format = $pSet->getViewFormat("krsId");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("krsId")))
				$class = ' rnr-field-number';
			$row["krsId_class"] = $class;
		$rowinfo[] = $row;
		if ($b) {
			$rowinfo2[] = $row;
			$b = false;
		}
		$data = $cipherer->DecryptFetchedArray( $qResult->fetchAssoc() );
	}
	$xt->assign_loopsection("details_row",$rowinfo);
	$xt->assign_loopsection("details_row_header",$rowinfo2); // assign class for header
}
$returnJSON = array("success" => true);
$xt->load_template(GetTemplateName("s_krs_detil", "detailspreview"));
$returnJSON["body"] = $xt->fetch_loaded();

if($mode!="inline")
{
	$returnJSON["counter"] = postvalue("counter");
	$layout = GetPageLayout(GoodFieldName($strTableName), 'detailspreview');
	if($layout)
	{
		foreach($layout->getCSSFiles(isRTL(), mobileDeviceDetected() && $layout->version != BOOTSTRAP_LAYOUT) as $css)
		{
			$returnJSON['CSSFiles'][] = $css;
		}
	}	
}	

echo printJSON($returnJSON);
exit();
?>