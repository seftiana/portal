<?php
require_once(getabspath("classes/cipherer.php"));




$tdatatb_user = array();
	$tdatatb_user[".truncateText"] = true;
	$tdatatb_user[".NumberOfChars"] = 80;
	$tdatatb_user[".ShortName"] = "tb_user";
	$tdatatb_user[".OwnerID"] = "";
	$tdatatb_user[".OriginalTable"] = "tb_user";

//	field labels
$fieldLabelstb_user = array();
$fieldToolTipstb_user = array();
$pageTitlestb_user = array();
$placeHolderstb_user = array();

if(mlang_getcurrentlang()=="English")
{
	$fieldLabelstb_user["English"] = array();
	$fieldToolTipstb_user["English"] = array();
	$placeHolderstb_user["English"] = array();
	$pageTitlestb_user["English"] = array();
	$fieldLabelstb_user["English"]["ID"] = "ID";
	$fieldToolTipstb_user["English"]["ID"] = "";
	$placeHolderstb_user["English"]["ID"] = "";
	$fieldLabelstb_user["English"]["IDUser"] = "IDUser";
	$fieldToolTipstb_user["English"]["IDUser"] = "";
	$placeHolderstb_user["English"]["IDUser"] = "";
	$fieldLabelstb_user["English"]["passwd"] = "Passwd";
	$fieldToolTipstb_user["English"]["passwd"] = "";
	$placeHolderstb_user["English"]["passwd"] = "";
	$fieldLabelstb_user["English"]["nama"] = "Nama";
	$fieldToolTipstb_user["English"]["nama"] = "";
	$placeHolderstb_user["English"]["nama"] = "";
	$fieldLabelstb_user["English"]["jabatan"] = "Jabatan";
	$fieldToolTipstb_user["English"]["jabatan"] = "";
	$placeHolderstb_user["English"]["jabatan"] = "";
	$fieldLabelstb_user["English"]["unit_kerja"] = "Unit Kerja";
	$fieldToolTipstb_user["English"]["unit_kerja"] = "";
	$placeHolderstb_user["English"]["unit_kerja"] = "";
	$fieldLabelstb_user["English"]["atasan"] = "Atasan";
	$fieldToolTipstb_user["English"]["atasan"] = "";
	$placeHolderstb_user["English"]["atasan"] = "";
	$fieldLabelstb_user["English"]["prodi"] = "Prodi";
	$fieldToolTipstb_user["English"]["prodi"] = "";
	$placeHolderstb_user["English"]["prodi"] = "";
	$fieldLabelstb_user["English"]["peran"] = "Peran";
	$fieldToolTipstb_user["English"]["peran"] = "";
	$placeHolderstb_user["English"]["peran"] = "";
	$fieldLabelstb_user["English"]["roleapps"] = "Roleapps";
	$fieldToolTipstb_user["English"]["roleapps"] = "";
	$placeHolderstb_user["English"]["roleapps"] = "";
	if (count($fieldToolTipstb_user["English"]))
		$tdatatb_user[".isUseToolTips"] = true;
}
if(mlang_getcurrentlang()=="")
{
	$fieldLabelstb_user[""] = array();
	$fieldToolTipstb_user[""] = array();
	$placeHolderstb_user[""] = array();
	$pageTitlestb_user[""] = array();
	$fieldLabelstb_user[""]["ID"] = "ID";
	$fieldToolTipstb_user[""]["ID"] = "";
	$placeHolderstb_user[""]["ID"] = "";
	$fieldLabelstb_user[""]["IDUser"] = "IDUser";
	$fieldToolTipstb_user[""]["IDUser"] = "";
	$placeHolderstb_user[""]["IDUser"] = "";
	$fieldLabelstb_user[""]["passwd"] = "Passwd";
	$fieldToolTipstb_user[""]["passwd"] = "";
	$placeHolderstb_user[""]["passwd"] = "";
	$fieldLabelstb_user[""]["nama"] = "Nama";
	$fieldToolTipstb_user[""]["nama"] = "";
	$placeHolderstb_user[""]["nama"] = "";
	$fieldLabelstb_user[""]["jabatan"] = "Jabatan";
	$fieldToolTipstb_user[""]["jabatan"] = "";
	$placeHolderstb_user[""]["jabatan"] = "";
	$fieldLabelstb_user[""]["unit_kerja"] = "Unit Kerja";
	$fieldToolTipstb_user[""]["unit_kerja"] = "";
	$placeHolderstb_user[""]["unit_kerja"] = "";
	$fieldLabelstb_user[""]["atasan"] = "Atasan";
	$fieldToolTipstb_user[""]["atasan"] = "";
	$placeHolderstb_user[""]["atasan"] = "";
	$fieldLabelstb_user[""]["prodi"] = "Prodi";
	$fieldToolTipstb_user[""]["prodi"] = "";
	$placeHolderstb_user[""]["prodi"] = "";
	$fieldLabelstb_user[""]["peran"] = "Peran";
	$fieldToolTipstb_user[""]["peran"] = "";
	$placeHolderstb_user[""]["peran"] = "";
	$fieldLabelstb_user[""]["roleapps"] = "Roleapps";
	$fieldToolTipstb_user[""]["roleapps"] = "";
	$placeHolderstb_user[""]["roleapps"] = "";
	if (count($fieldToolTipstb_user[""]))
		$tdatatb_user[".isUseToolTips"] = true;
}


	$tdatatb_user[".NCSearch"] = true;



$tdatatb_user[".shortTableName"] = "tb_user";
$tdatatb_user[".nSecOptions"] = 0;
$tdatatb_user[".recsPerRowPrint"] = 1;
$tdatatb_user[".mainTableOwnerID"] = "";
$tdatatb_user[".moveNext"] = 1;
$tdatatb_user[".entityType"] = 0;

$tdatatb_user[".strOriginalTableName"] = "tb_user";

	



$tdatatb_user[".showAddInPopup"] = false;

$tdatatb_user[".showEditInPopup"] = false;

$tdatatb_user[".showViewInPopup"] = false;

//page's base css files names
$popupPagesLayoutNames = array();
$tdatatb_user[".popupPagesLayoutNames"] = $popupPagesLayoutNames;


$tdatatb_user[".fieldsForRegister"] = array();

$tdatatb_user[".listAjax"] = false;

	$tdatatb_user[".audit"] = false;

	$tdatatb_user[".locking"] = false;



$tdatatb_user[".list"] = true;



$tdatatb_user[".reorderRecordsByHeader"] = true;


$tdatatb_user[".exportFormatting"] = 2;
$tdatatb_user[".exportDelimiter"] = ",";
		


$tdatatb_user[".exportTo"] = true;

$tdatatb_user[".printFriendly"] = true;


$tdatatb_user[".showSimpleSearchOptions"] = false;

// Allow Show/Hide Fields in GRID
$tdatatb_user[".allowShowHideFields"] = false;
//

// Allow Fields Reordering in GRID
$tdatatb_user[".allowFieldsReordering"] = false;
//

// search Saving settings
$tdatatb_user[".searchSaving"] = false;
//

$tdatatb_user[".showSearchPanel"] = true;
		$tdatatb_user[".flexibleSearch"] = true;

$tdatatb_user[".isUseAjaxSuggest"] = true;

$tdatatb_user[".rowHighlite"] = true;





$tdatatb_user[".ajaxCodeSnippetAdded"] = false;

$tdatatb_user[".buttonsAdded"] = false;

$tdatatb_user[".addPageEvents"] = false;

// use timepicker for search panel
$tdatatb_user[".isUseTimeForSearch"] = false;



$tdatatb_user[".badgeColor"] = "778899";


$tdatatb_user[".allSearchFields"] = array();
$tdatatb_user[".filterFields"] = array();
$tdatatb_user[".requiredSearchFields"] = array();

$tdatatb_user[".allSearchFields"][] = "IDUser";
	$tdatatb_user[".allSearchFields"][] = "passwd";
	$tdatatb_user[".allSearchFields"][] = "nama";
	$tdatatb_user[".allSearchFields"][] = "jabatan";
	$tdatatb_user[".allSearchFields"][] = "unit_kerja";
	$tdatatb_user[".allSearchFields"][] = "atasan";
	$tdatatb_user[".allSearchFields"][] = "prodi";
	$tdatatb_user[".allSearchFields"][] = "peran";
	$tdatatb_user[".allSearchFields"][] = "roleapps";
	

$tdatatb_user[".googleLikeFields"] = array();
$tdatatb_user[".googleLikeFields"][] = "ID";
$tdatatb_user[".googleLikeFields"][] = "IDUser";
$tdatatb_user[".googleLikeFields"][] = "passwd";
$tdatatb_user[".googleLikeFields"][] = "nama";
$tdatatb_user[".googleLikeFields"][] = "jabatan";
$tdatatb_user[".googleLikeFields"][] = "unit_kerja";
$tdatatb_user[".googleLikeFields"][] = "atasan";
$tdatatb_user[".googleLikeFields"][] = "prodi";
$tdatatb_user[".googleLikeFields"][] = "peran";
$tdatatb_user[".googleLikeFields"][] = "roleapps";


$tdatatb_user[".advSearchFields"] = array();
$tdatatb_user[".advSearchFields"][] = "IDUser";
$tdatatb_user[".advSearchFields"][] = "passwd";
$tdatatb_user[".advSearchFields"][] = "nama";
$tdatatb_user[".advSearchFields"][] = "jabatan";
$tdatatb_user[".advSearchFields"][] = "unit_kerja";
$tdatatb_user[".advSearchFields"][] = "atasan";
$tdatatb_user[".advSearchFields"][] = "prodi";
$tdatatb_user[".advSearchFields"][] = "peran";
$tdatatb_user[".advSearchFields"][] = "roleapps";

$tdatatb_user[".tableType"] = "list";

$tdatatb_user[".printerPageOrientation"] = 0;
$tdatatb_user[".nPrinterPageScale"] = 100;

$tdatatb_user[".nPrinterSplitRecords"] = 40;

$tdatatb_user[".nPrinterPDFSplitRecords"] = 40;



$tdatatb_user[".geocodingEnabled"] = false;





$tdatatb_user[".listGridLayout"] = 3;





// view page pdf

// print page pdf


$tdatatb_user[".pageSize"] = 20;

$tdatatb_user[".warnLeavingPages"] = true;



$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatatb_user[".strOrderBy"] = $tstrOrderBy;

$tdatatb_user[".orderindexes"] = array();

$tdatatb_user[".sqlHead"] = "SELECT ID,  	IDUser,  	passwd,  	nama,  	jabatan,  	unit_kerja,  	atasan,  	prodi,  	peran,  	roleapps";
$tdatatb_user[".sqlFrom"] = "FROM tb_user";
$tdatatb_user[".sqlWhereExpr"] = "";
$tdatatb_user[".sqlTail"] = "";

//fill array of tabs for list page
$arrGridTabs = array();
$arrGridTabs[] = array(
	'tabId' => "",
	'name' => "All data",
	'nameType' => 'Text',
	'where' => "",	
	'showRowCount' => 0,
	'hideEmpty' => 0,	
);				  
$tdatatb_user[".arrGridTabs"] = $arrGridTabs;











//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatatb_user[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatatb_user[".arrGroupsPerPage"] = $arrGPP;

$tdatatb_user[".highlightSearchResults"] = true;

$tableKeystb_user = array();
$tableKeystb_user[] = "ID";
$tdatatb_user[".Keys"] = $tableKeystb_user;

$tdatatb_user[".listFields"] = array();
$tdatatb_user[".listFields"][] = "IDUser";
$tdatatb_user[".listFields"][] = "passwd";
$tdatatb_user[".listFields"][] = "nama";
$tdatatb_user[".listFields"][] = "jabatan";
$tdatatb_user[".listFields"][] = "unit_kerja";
$tdatatb_user[".listFields"][] = "atasan";
$tdatatb_user[".listFields"][] = "prodi";
$tdatatb_user[".listFields"][] = "peran";
$tdatatb_user[".listFields"][] = "roleapps";

$tdatatb_user[".hideMobileList"] = array();


$tdatatb_user[".viewFields"] = array();

$tdatatb_user[".addFields"] = array();

$tdatatb_user[".masterListFields"] = array();
$tdatatb_user[".masterListFields"][] = "ID";
$tdatatb_user[".masterListFields"][] = "IDUser";
$tdatatb_user[".masterListFields"][] = "passwd";
$tdatatb_user[".masterListFields"][] = "nama";
$tdatatb_user[".masterListFields"][] = "jabatan";
$tdatatb_user[".masterListFields"][] = "unit_kerja";
$tdatatb_user[".masterListFields"][] = "atasan";
$tdatatb_user[".masterListFields"][] = "prodi";
$tdatatb_user[".masterListFields"][] = "peran";
$tdatatb_user[".masterListFields"][] = "roleapps";

$tdatatb_user[".inlineAddFields"] = array();

$tdatatb_user[".editFields"] = array();

$tdatatb_user[".inlineEditFields"] = array();

$tdatatb_user[".updateSelectedFields"] = array();


$tdatatb_user[".exportFields"] = array();
$tdatatb_user[".exportFields"][] = "IDUser";
$tdatatb_user[".exportFields"][] = "passwd";
$tdatatb_user[".exportFields"][] = "nama";
$tdatatb_user[".exportFields"][] = "jabatan";
$tdatatb_user[".exportFields"][] = "unit_kerja";
$tdatatb_user[".exportFields"][] = "atasan";
$tdatatb_user[".exportFields"][] = "prodi";
$tdatatb_user[".exportFields"][] = "peran";
$tdatatb_user[".exportFields"][] = "roleapps";

$tdatatb_user[".importFields"] = array();

$tdatatb_user[".printFields"] = array();
$tdatatb_user[".printFields"][] = "IDUser";
$tdatatb_user[".printFields"][] = "passwd";
$tdatatb_user[".printFields"][] = "nama";
$tdatatb_user[".printFields"][] = "jabatan";
$tdatatb_user[".printFields"][] = "unit_kerja";
$tdatatb_user[".printFields"][] = "atasan";
$tdatatb_user[".printFields"][] = "prodi";
$tdatatb_user[".printFields"][] = "peran";
$tdatatb_user[".printFields"][] = "roleapps";


//	ID
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "ID";
	$fdata["GoodName"] = "ID";
	$fdata["ownerTable"] = "tb_user";
	$fdata["Label"] = GetFieldLabel("tb_user","ID");
	$fdata["FieldType"] = 3;

	
		$fdata["AutoInc"] = true;

	
			
	
	
	
	
	
	

	
	
	
	
		$fdata["strField"] = "ID";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "ID";

	
	
			
				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


		$edata["IsRequired"] = true;

	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
		
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;








	$tdatatb_user["ID"] = $fdata;
//	IDUser
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "IDUser";
	$fdata["GoodName"] = "IDUser";
	$fdata["ownerTable"] = "tb_user";
	$fdata["Label"] = GetFieldLabel("tb_user","IDUser");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

	
	
	
	
	

	
		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "IDUser";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "IDUser";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=50";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatatb_user["IDUser"] = $fdata;
//	passwd
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "passwd";
	$fdata["GoodName"] = "passwd";
	$fdata["ownerTable"] = "tb_user";
	$fdata["Label"] = GetFieldLabel("tb_user","passwd");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

	
	
	
	
	

	
		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "passwd";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "passwd";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=250";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatatb_user["passwd"] = $fdata;
//	nama
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "nama";
	$fdata["GoodName"] = "nama";
	$fdata["ownerTable"] = "tb_user";
	$fdata["Label"] = GetFieldLabel("tb_user","nama");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

	
	
	
	
	

	
		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "nama";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "nama";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=250";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatatb_user["nama"] = $fdata;
//	jabatan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "jabatan";
	$fdata["GoodName"] = "jabatan";
	$fdata["ownerTable"] = "tb_user";
	$fdata["Label"] = GetFieldLabel("tb_user","jabatan");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

	
	
	
	
	

	
		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "jabatan";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "jabatan";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=200";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatatb_user["jabatan"] = $fdata;
//	unit_kerja
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "unit_kerja";
	$fdata["GoodName"] = "unit_kerja";
	$fdata["ownerTable"] = "tb_user";
	$fdata["Label"] = GetFieldLabel("tb_user","unit_kerja");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

	
	
	
	
	

	
		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "unit_kerja";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "unit_kerja";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=100";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatatb_user["unit_kerja"] = $fdata;
//	atasan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "atasan";
	$fdata["GoodName"] = "atasan";
	$fdata["ownerTable"] = "tb_user";
	$fdata["Label"] = GetFieldLabel("tb_user","atasan");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

	
	
	
	
	

	
		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "atasan";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "atasan";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=50";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatatb_user["atasan"] = $fdata;
//	prodi
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "prodi";
	$fdata["GoodName"] = "prodi";
	$fdata["ownerTable"] = "tb_user";
	$fdata["Label"] = GetFieldLabel("tb_user","prodi");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

	
	
	
	
	

	
		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "prodi";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "prodi";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=50";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatatb_user["prodi"] = $fdata;
//	peran
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "peran";
	$fdata["GoodName"] = "peran";
	$fdata["ownerTable"] = "tb_user";
	$fdata["Label"] = GetFieldLabel("tb_user","peran");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

	
	
	
	
	

	
		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "peran";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "peran";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=50";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatatb_user["peran"] = $fdata;
//	roleapps
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "roleapps";
	$fdata["GoodName"] = "roleapps";
	$fdata["ownerTable"] = "tb_user";
	$fdata["Label"] = GetFieldLabel("tb_user","roleapps");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

	
	
	
	
	

	
		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "roleapps";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "roleapps";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=20";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatatb_user["roleapps"] = $fdata;


$tables_data["tb_user"]=&$tdatatb_user;
$field_labels["tb_user"] = &$fieldLabelstb_user;
$fieldToolTips["tb_user"] = &$fieldToolTipstb_user;
$placeHolders["tb_user"] = &$placeHolderstb_user;
$page_titles["tb_user"] = &$pageTitlestb_user;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["tb_user"] = array();

// tables which are master tables for current table (detail)
$masterTablesData["tb_user"] = array();


// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_tb_user()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "ID,  	IDUser,  	passwd,  	nama,  	jabatan,  	unit_kerja,  	atasan,  	prodi,  	peran,  	roleapps";
$proto0["m_strFrom"] = "FROM tb_user";
$proto0["m_strWhere"] = "";
$proto0["m_strOrderBy"] = "";
	
				;
			$proto0["cipherer"] = null;
$proto2=array();
$proto2["m_sql"] = "";
$proto2["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2["m_column"]=$obj;
$proto2["m_contained"] = array();
$proto2["m_strCase"] = "";
$proto2["m_havingmode"] = false;
$proto2["m_inBrackets"] = false;
$proto2["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto2);

$proto0["m_where"] = $obj;
$proto4=array();
$proto4["m_sql"] = "";
$proto4["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto4["m_column"]=$obj;
$proto4["m_contained"] = array();
$proto4["m_strCase"] = "";
$proto4["m_havingmode"] = false;
$proto4["m_inBrackets"] = false;
$proto4["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto4);

$proto0["m_having"] = $obj;
$proto0["m_fieldlist"] = array();
						$proto6=array();
			$obj = new SQLField(array(
	"m_strName" => "ID",
	"m_strTable" => "tb_user",
	"m_srcTableName" => "tb_user"
));

$proto6["m_sql"] = "ID";
$proto6["m_srcTableName"] = "tb_user";
$proto6["m_expr"]=$obj;
$proto6["m_alias"] = "";
$obj = new SQLFieldListItem($proto6);

$proto0["m_fieldlist"][]=$obj;
						$proto8=array();
			$obj = new SQLField(array(
	"m_strName" => "IDUser",
	"m_strTable" => "tb_user",
	"m_srcTableName" => "tb_user"
));

$proto8["m_sql"] = "IDUser";
$proto8["m_srcTableName"] = "tb_user";
$proto8["m_expr"]=$obj;
$proto8["m_alias"] = "";
$obj = new SQLFieldListItem($proto8);

$proto0["m_fieldlist"][]=$obj;
						$proto10=array();
			$obj = new SQLField(array(
	"m_strName" => "passwd",
	"m_strTable" => "tb_user",
	"m_srcTableName" => "tb_user"
));

$proto10["m_sql"] = "passwd";
$proto10["m_srcTableName"] = "tb_user";
$proto10["m_expr"]=$obj;
$proto10["m_alias"] = "";
$obj = new SQLFieldListItem($proto10);

$proto0["m_fieldlist"][]=$obj;
						$proto12=array();
			$obj = new SQLField(array(
	"m_strName" => "nama",
	"m_strTable" => "tb_user",
	"m_srcTableName" => "tb_user"
));

$proto12["m_sql"] = "nama";
$proto12["m_srcTableName"] = "tb_user";
$proto12["m_expr"]=$obj;
$proto12["m_alias"] = "";
$obj = new SQLFieldListItem($proto12);

$proto0["m_fieldlist"][]=$obj;
						$proto14=array();
			$obj = new SQLField(array(
	"m_strName" => "jabatan",
	"m_strTable" => "tb_user",
	"m_srcTableName" => "tb_user"
));

$proto14["m_sql"] = "jabatan";
$proto14["m_srcTableName"] = "tb_user";
$proto14["m_expr"]=$obj;
$proto14["m_alias"] = "";
$obj = new SQLFieldListItem($proto14);

$proto0["m_fieldlist"][]=$obj;
						$proto16=array();
			$obj = new SQLField(array(
	"m_strName" => "unit_kerja",
	"m_strTable" => "tb_user",
	"m_srcTableName" => "tb_user"
));

$proto16["m_sql"] = "unit_kerja";
$proto16["m_srcTableName"] = "tb_user";
$proto16["m_expr"]=$obj;
$proto16["m_alias"] = "";
$obj = new SQLFieldListItem($proto16);

$proto0["m_fieldlist"][]=$obj;
						$proto18=array();
			$obj = new SQLField(array(
	"m_strName" => "atasan",
	"m_strTable" => "tb_user",
	"m_srcTableName" => "tb_user"
));

$proto18["m_sql"] = "atasan";
$proto18["m_srcTableName"] = "tb_user";
$proto18["m_expr"]=$obj;
$proto18["m_alias"] = "";
$obj = new SQLFieldListItem($proto18);

$proto0["m_fieldlist"][]=$obj;
						$proto20=array();
			$obj = new SQLField(array(
	"m_strName" => "prodi",
	"m_strTable" => "tb_user",
	"m_srcTableName" => "tb_user"
));

$proto20["m_sql"] = "prodi";
$proto20["m_srcTableName"] = "tb_user";
$proto20["m_expr"]=$obj;
$proto20["m_alias"] = "";
$obj = new SQLFieldListItem($proto20);

$proto0["m_fieldlist"][]=$obj;
						$proto22=array();
			$obj = new SQLField(array(
	"m_strName" => "peran",
	"m_strTable" => "tb_user",
	"m_srcTableName" => "tb_user"
));

$proto22["m_sql"] = "peran";
$proto22["m_srcTableName"] = "tb_user";
$proto22["m_expr"]=$obj;
$proto22["m_alias"] = "";
$obj = new SQLFieldListItem($proto22);

$proto0["m_fieldlist"][]=$obj;
						$proto24=array();
			$obj = new SQLField(array(
	"m_strName" => "roleapps",
	"m_strTable" => "tb_user",
	"m_srcTableName" => "tb_user"
));

$proto24["m_sql"] = "roleapps";
$proto24["m_srcTableName"] = "tb_user";
$proto24["m_expr"]=$obj;
$proto24["m_alias"] = "";
$obj = new SQLFieldListItem($proto24);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto26=array();
$proto26["m_link"] = "SQLL_MAIN";
			$proto27=array();
$proto27["m_strName"] = "tb_user";
$proto27["m_srcTableName"] = "tb_user";
$proto27["m_columns"] = array();
$proto27["m_columns"][] = "ID";
$proto27["m_columns"][] = "IDUser";
$proto27["m_columns"][] = "passwd";
$proto27["m_columns"][] = "nama";
$proto27["m_columns"][] = "jabatan";
$proto27["m_columns"][] = "unit_kerja";
$proto27["m_columns"][] = "atasan";
$proto27["m_columns"][] = "prodi";
$proto27["m_columns"][] = "peran";
$proto27["m_columns"][] = "roleapps";
$obj = new SQLTable($proto27);

$proto26["m_table"] = $obj;
$proto26["m_sql"] = "tb_user";
$proto26["m_alias"] = "";
$proto26["m_srcTableName"] = "tb_user";
$proto28=array();
$proto28["m_sql"] = "";
$proto28["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto28["m_column"]=$obj;
$proto28["m_contained"] = array();
$proto28["m_strCase"] = "";
$proto28["m_havingmode"] = false;
$proto28["m_inBrackets"] = false;
$proto28["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto28);

$proto26["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto26);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$proto0["m_srcTableName"]="tb_user";		
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_tb_user = createSqlQuery_tb_user();


	
				;

										

$tdatatb_user[".sqlquery"] = $queryData_tb_user;

$tableEvents["tb_user"] = new eventsBase;
$tdatatb_user[".hasEvents"] = false;

?>