<?php
require_once(getabspath("classes/cipherer.php"));




$tdatas_krs_jatah_sks = array();
	$tdatas_krs_jatah_sks[".truncateText"] = true;
	$tdatas_krs_jatah_sks[".NumberOfChars"] = 80;
	$tdatas_krs_jatah_sks[".ShortName"] = "s_krs_jatah_sks";
	$tdatas_krs_jatah_sks[".OwnerID"] = "";
	$tdatas_krs_jatah_sks[".OriginalTable"] = "s_krs_jatah_sks";

//	field labels
$fieldLabelss_krs_jatah_sks = array();
$fieldToolTipss_krs_jatah_sks = array();
$pageTitless_krs_jatah_sks = array();
$placeHolderss_krs_jatah_sks = array();

if(mlang_getcurrentlang()=="English")
{
	$fieldLabelss_krs_jatah_sks["English"] = array();
	$fieldToolTipss_krs_jatah_sks["English"] = array();
	$placeHolderss_krs_jatah_sks["English"] = array();
	$pageTitless_krs_jatah_sks["English"] = array();
	$fieldLabelss_krs_jatah_sks["English"]["krssksMhsNiu"] = "Krssks Mhs Niu";
	$fieldToolTipss_krs_jatah_sks["English"]["krssksMhsNiu"] = "";
	$placeHolderss_krs_jatah_sks["English"]["krssksMhsNiu"] = "";
	$fieldLabelss_krs_jatah_sks["English"]["krssksSempId"] = "Krssks Semp Id";
	$fieldToolTipss_krs_jatah_sks["English"]["krssksSempId"] = "";
	$placeHolderss_krs_jatah_sks["English"]["krssksSempId"] = "";
	$fieldLabelss_krs_jatah_sks["English"]["krssksJatahSksResmi"] = "Krssks Jatah Sks Resmi";
	$fieldToolTipss_krs_jatah_sks["English"]["krssksJatahSksResmi"] = "";
	$placeHolderss_krs_jatah_sks["English"]["krssksJatahSksResmi"] = "";
	$fieldLabelss_krs_jatah_sks["English"]["krssksJatahSksToleransi"] = "Krssks Jatah Sks Toleransi";
	$fieldToolTipss_krs_jatah_sks["English"]["krssksJatahSksToleransi"] = "";
	$placeHolderss_krs_jatah_sks["English"]["krssksJatahSksToleransi"] = "";
	$fieldLabelss_krs_jatah_sks["English"]["krssksJatahDipakai"] = "Krssks Jatah Dipakai";
	$fieldToolTipss_krs_jatah_sks["English"]["krssksJatahDipakai"] = "";
	$placeHolderss_krs_jatah_sks["English"]["krssksJatahDipakai"] = "";
	$fieldLabelss_krs_jatah_sks["English"]["krssksIpSemesterSebelumnya"] = "Krssks Ip Semester Sebelumnya";
	$fieldToolTipss_krs_jatah_sks["English"]["krssksIpSemesterSebelumnya"] = "";
	$placeHolderss_krs_jatah_sks["English"]["krssksIpSemesterSebelumnya"] = "";
	$fieldLabelss_krs_jatah_sks["English"]["krssksIsRegistrasi"] = "Krssks Is Registrasi";
	$fieldToolTipss_krs_jatah_sks["English"]["krssksIsRegistrasi"] = "";
	$placeHolderss_krs_jatah_sks["English"]["krssksIsRegistrasi"] = "";
	$fieldLabelss_krs_jatah_sks["English"]["mhsNama"] = "Mhs Nama";
	$fieldToolTipss_krs_jatah_sks["English"]["mhsNama"] = "";
	$placeHolderss_krs_jatah_sks["English"]["mhsNama"] = "";
	if (count($fieldToolTipss_krs_jatah_sks["English"]))
		$tdatas_krs_jatah_sks[".isUseToolTips"] = true;
}
if(mlang_getcurrentlang()=="")
{
	$fieldLabelss_krs_jatah_sks[""] = array();
	$fieldToolTipss_krs_jatah_sks[""] = array();
	$placeHolderss_krs_jatah_sks[""] = array();
	$pageTitless_krs_jatah_sks[""] = array();
	$fieldLabelss_krs_jatah_sks[""]["krssksMhsNiu"] = "Krssks Mhs Niu";
	$fieldToolTipss_krs_jatah_sks[""]["krssksMhsNiu"] = "";
	$placeHolderss_krs_jatah_sks[""]["krssksMhsNiu"] = "";
	$fieldLabelss_krs_jatah_sks[""]["krssksSempId"] = "Krssks Semp Id";
	$fieldToolTipss_krs_jatah_sks[""]["krssksSempId"] = "";
	$placeHolderss_krs_jatah_sks[""]["krssksSempId"] = "";
	$fieldLabelss_krs_jatah_sks[""]["krssksJatahSksResmi"] = "Krssks Jatah Sks Resmi";
	$fieldToolTipss_krs_jatah_sks[""]["krssksJatahSksResmi"] = "";
	$placeHolderss_krs_jatah_sks[""]["krssksJatahSksResmi"] = "";
	$fieldLabelss_krs_jatah_sks[""]["krssksJatahSksToleransi"] = "Krssks Jatah Sks Toleransi";
	$fieldToolTipss_krs_jatah_sks[""]["krssksJatahSksToleransi"] = "";
	$placeHolderss_krs_jatah_sks[""]["krssksJatahSksToleransi"] = "";
	$fieldLabelss_krs_jatah_sks[""]["krssksJatahDipakai"] = "Krssks Jatah Dipakai";
	$fieldToolTipss_krs_jatah_sks[""]["krssksJatahDipakai"] = "";
	$placeHolderss_krs_jatah_sks[""]["krssksJatahDipakai"] = "";
	$fieldLabelss_krs_jatah_sks[""]["krssksIpSemesterSebelumnya"] = "Krssks Ip Semester Sebelumnya";
	$fieldToolTipss_krs_jatah_sks[""]["krssksIpSemesterSebelumnya"] = "";
	$placeHolderss_krs_jatah_sks[""]["krssksIpSemesterSebelumnya"] = "";
	$fieldLabelss_krs_jatah_sks[""]["krssksIsRegistrasi"] = "Krssks Is Registrasi";
	$fieldToolTipss_krs_jatah_sks[""]["krssksIsRegistrasi"] = "";
	$placeHolderss_krs_jatah_sks[""]["krssksIsRegistrasi"] = "";
	$fieldLabelss_krs_jatah_sks[""]["mhsNama"] = "Mhs Nama";
	$fieldToolTipss_krs_jatah_sks[""]["mhsNama"] = "";
	$placeHolderss_krs_jatah_sks[""]["mhsNama"] = "";
	if (count($fieldToolTipss_krs_jatah_sks[""]))
		$tdatas_krs_jatah_sks[".isUseToolTips"] = true;
}


	$tdatas_krs_jatah_sks[".NCSearch"] = true;



$tdatas_krs_jatah_sks[".shortTableName"] = "s_krs_jatah_sks";
$tdatas_krs_jatah_sks[".nSecOptions"] = 0;
$tdatas_krs_jatah_sks[".recsPerRowPrint"] = 1;
$tdatas_krs_jatah_sks[".mainTableOwnerID"] = "";
$tdatas_krs_jatah_sks[".moveNext"] = 1;
$tdatas_krs_jatah_sks[".entityType"] = 0;

$tdatas_krs_jatah_sks[".strOriginalTableName"] = "s_krs_jatah_sks";

	



$tdatas_krs_jatah_sks[".showAddInPopup"] = false;

$tdatas_krs_jatah_sks[".showEditInPopup"] = false;

$tdatas_krs_jatah_sks[".showViewInPopup"] = false;

//page's base css files names
$popupPagesLayoutNames = array();
$tdatas_krs_jatah_sks[".popupPagesLayoutNames"] = $popupPagesLayoutNames;


$tdatas_krs_jatah_sks[".fieldsForRegister"] = array();

$tdatas_krs_jatah_sks[".listAjax"] = false;

	$tdatas_krs_jatah_sks[".audit"] = false;

	$tdatas_krs_jatah_sks[".locking"] = false;

$tdatas_krs_jatah_sks[".edit"] = true;
$tdatas_krs_jatah_sks[".afterEditAction"] = 1;
$tdatas_krs_jatah_sks[".closePopupAfterEdit"] = 1;
$tdatas_krs_jatah_sks[".afterEditActionDetTable"] = "";

$tdatas_krs_jatah_sks[".add"] = true;
$tdatas_krs_jatah_sks[".afterAddAction"] = 1;
$tdatas_krs_jatah_sks[".closePopupAfterAdd"] = 1;
$tdatas_krs_jatah_sks[".afterAddActionDetTable"] = "";

$tdatas_krs_jatah_sks[".list"] = true;



$tdatas_krs_jatah_sks[".reorderRecordsByHeader"] = true;


$tdatas_krs_jatah_sks[".exportFormatting"] = 2;
$tdatas_krs_jatah_sks[".exportDelimiter"] = ",";
		
$tdatas_krs_jatah_sks[".view"] = true;

$tdatas_krs_jatah_sks[".import"] = true;

$tdatas_krs_jatah_sks[".exportTo"] = true;

$tdatas_krs_jatah_sks[".printFriendly"] = true;

$tdatas_krs_jatah_sks[".delete"] = true;

$tdatas_krs_jatah_sks[".showSimpleSearchOptions"] = false;

// Allow Show/Hide Fields in GRID
$tdatas_krs_jatah_sks[".allowShowHideFields"] = false;
//

// Allow Fields Reordering in GRID
$tdatas_krs_jatah_sks[".allowFieldsReordering"] = false;
//

// search Saving settings
$tdatas_krs_jatah_sks[".searchSaving"] = false;
//

$tdatas_krs_jatah_sks[".showSearchPanel"] = true;
		$tdatas_krs_jatah_sks[".flexibleSearch"] = true;

$tdatas_krs_jatah_sks[".isUseAjaxSuggest"] = true;

$tdatas_krs_jatah_sks[".rowHighlite"] = true;





$tdatas_krs_jatah_sks[".ajaxCodeSnippetAdded"] = false;

$tdatas_krs_jatah_sks[".buttonsAdded"] = false;

$tdatas_krs_jatah_sks[".addPageEvents"] = false;

// use timepicker for search panel
$tdatas_krs_jatah_sks[".isUseTimeForSearch"] = false;



$tdatas_krs_jatah_sks[".badgeColor"] = "D2691E";


$tdatas_krs_jatah_sks[".allSearchFields"] = array();
$tdatas_krs_jatah_sks[".filterFields"] = array();
$tdatas_krs_jatah_sks[".requiredSearchFields"] = array();

$tdatas_krs_jatah_sks[".allSearchFields"][] = "krssksMhsNiu";
	$tdatas_krs_jatah_sks[".allSearchFields"][] = "krssksSempId";
	$tdatas_krs_jatah_sks[".allSearchFields"][] = "krssksJatahSksResmi";
	$tdatas_krs_jatah_sks[".allSearchFields"][] = "krssksJatahSksToleransi";
	$tdatas_krs_jatah_sks[".allSearchFields"][] = "krssksJatahDipakai";
	$tdatas_krs_jatah_sks[".allSearchFields"][] = "krssksIpSemesterSebelumnya";
	$tdatas_krs_jatah_sks[".allSearchFields"][] = "krssksIsRegistrasi";
	$tdatas_krs_jatah_sks[".allSearchFields"][] = "mhsNama";
	

$tdatas_krs_jatah_sks[".googleLikeFields"] = array();
$tdatas_krs_jatah_sks[".googleLikeFields"][] = "krssksMhsNiu";
$tdatas_krs_jatah_sks[".googleLikeFields"][] = "krssksSempId";
$tdatas_krs_jatah_sks[".googleLikeFields"][] = "krssksJatahSksResmi";
$tdatas_krs_jatah_sks[".googleLikeFields"][] = "krssksJatahSksToleransi";
$tdatas_krs_jatah_sks[".googleLikeFields"][] = "krssksJatahDipakai";
$tdatas_krs_jatah_sks[".googleLikeFields"][] = "krssksIpSemesterSebelumnya";
$tdatas_krs_jatah_sks[".googleLikeFields"][] = "krssksIsRegistrasi";
$tdatas_krs_jatah_sks[".googleLikeFields"][] = "mhsNama";


$tdatas_krs_jatah_sks[".advSearchFields"] = array();
$tdatas_krs_jatah_sks[".advSearchFields"][] = "krssksMhsNiu";
$tdatas_krs_jatah_sks[".advSearchFields"][] = "krssksSempId";
$tdatas_krs_jatah_sks[".advSearchFields"][] = "krssksJatahSksResmi";
$tdatas_krs_jatah_sks[".advSearchFields"][] = "krssksJatahSksToleransi";
$tdatas_krs_jatah_sks[".advSearchFields"][] = "krssksJatahDipakai";
$tdatas_krs_jatah_sks[".advSearchFields"][] = "krssksIpSemesterSebelumnya";
$tdatas_krs_jatah_sks[".advSearchFields"][] = "krssksIsRegistrasi";
$tdatas_krs_jatah_sks[".advSearchFields"][] = "mhsNama";

$tdatas_krs_jatah_sks[".tableType"] = "list";

$tdatas_krs_jatah_sks[".printerPageOrientation"] = 0;
$tdatas_krs_jatah_sks[".nPrinterPageScale"] = 100;

$tdatas_krs_jatah_sks[".nPrinterSplitRecords"] = 40;

$tdatas_krs_jatah_sks[".nPrinterPDFSplitRecords"] = 40;



$tdatas_krs_jatah_sks[".geocodingEnabled"] = false;





$tdatas_krs_jatah_sks[".listGridLayout"] = 3;





// view page pdf

// print page pdf


$tdatas_krs_jatah_sks[".pageSize"] = 20;

$tdatas_krs_jatah_sks[".warnLeavingPages"] = true;



$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatas_krs_jatah_sks[".strOrderBy"] = $tstrOrderBy;

$tdatas_krs_jatah_sks[".orderindexes"] = array();

$tdatas_krs_jatah_sks[".sqlHead"] = "SELECT s_krs_jatah_sks.krssksMhsNiu,  s_krs_jatah_sks.krssksSempId,  s_krs_jatah_sks.krssksJatahSksResmi,  s_krs_jatah_sks.krssksJatahSksToleransi,  s_krs_jatah_sks.krssksJatahDipakai,  s_krs_jatah_sks.krssksIpSemesterSebelumnya,  s_krs_jatah_sks.krssksIsRegistrasi,  mahasiswa.mhsNama";
$tdatas_krs_jatah_sks[".sqlFrom"] = "FROM s_krs_jatah_sks  INNER JOIN mahasiswa ON mahasiswa.mhsNiu = s_krs_jatah_sks.krssksMhsNiu";
$tdatas_krs_jatah_sks[".sqlWhereExpr"] = "";
$tdatas_krs_jatah_sks[".sqlTail"] = "";












//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatas_krs_jatah_sks[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatas_krs_jatah_sks[".arrGroupsPerPage"] = $arrGPP;

$tdatas_krs_jatah_sks[".highlightSearchResults"] = true;

$tableKeyss_krs_jatah_sks = array();
$tableKeyss_krs_jatah_sks[] = "krssksMhsNiu";
$tableKeyss_krs_jatah_sks[] = "krssksSempId";
$tdatas_krs_jatah_sks[".Keys"] = $tableKeyss_krs_jatah_sks;

$tdatas_krs_jatah_sks[".listFields"] = array();
$tdatas_krs_jatah_sks[".listFields"][] = "krssksMhsNiu";
$tdatas_krs_jatah_sks[".listFields"][] = "krssksSempId";
$tdatas_krs_jatah_sks[".listFields"][] = "krssksJatahSksResmi";
$tdatas_krs_jatah_sks[".listFields"][] = "krssksJatahSksToleransi";
$tdatas_krs_jatah_sks[".listFields"][] = "krssksJatahDipakai";
$tdatas_krs_jatah_sks[".listFields"][] = "krssksIpSemesterSebelumnya";
$tdatas_krs_jatah_sks[".listFields"][] = "krssksIsRegistrasi";
$tdatas_krs_jatah_sks[".listFields"][] = "mhsNama";

$tdatas_krs_jatah_sks[".hideMobileList"] = array();


$tdatas_krs_jatah_sks[".viewFields"] = array();
$tdatas_krs_jatah_sks[".viewFields"][] = "krssksMhsNiu";
$tdatas_krs_jatah_sks[".viewFields"][] = "krssksSempId";
$tdatas_krs_jatah_sks[".viewFields"][] = "krssksJatahSksResmi";
$tdatas_krs_jatah_sks[".viewFields"][] = "krssksJatahSksToleransi";
$tdatas_krs_jatah_sks[".viewFields"][] = "krssksJatahDipakai";
$tdatas_krs_jatah_sks[".viewFields"][] = "krssksIpSemesterSebelumnya";
$tdatas_krs_jatah_sks[".viewFields"][] = "krssksIsRegistrasi";
$tdatas_krs_jatah_sks[".viewFields"][] = "mhsNama";

$tdatas_krs_jatah_sks[".addFields"] = array();
$tdatas_krs_jatah_sks[".addFields"][] = "krssksMhsNiu";
$tdatas_krs_jatah_sks[".addFields"][] = "krssksSempId";
$tdatas_krs_jatah_sks[".addFields"][] = "krssksJatahSksResmi";
$tdatas_krs_jatah_sks[".addFields"][] = "krssksJatahSksToleransi";
$tdatas_krs_jatah_sks[".addFields"][] = "krssksJatahDipakai";
$tdatas_krs_jatah_sks[".addFields"][] = "krssksIpSemesterSebelumnya";
$tdatas_krs_jatah_sks[".addFields"][] = "krssksIsRegistrasi";

$tdatas_krs_jatah_sks[".masterListFields"] = array();
$tdatas_krs_jatah_sks[".masterListFields"][] = "krssksMhsNiu";
$tdatas_krs_jatah_sks[".masterListFields"][] = "krssksSempId";
$tdatas_krs_jatah_sks[".masterListFields"][] = "krssksJatahSksResmi";
$tdatas_krs_jatah_sks[".masterListFields"][] = "krssksJatahSksToleransi";
$tdatas_krs_jatah_sks[".masterListFields"][] = "krssksJatahDipakai";
$tdatas_krs_jatah_sks[".masterListFields"][] = "krssksIpSemesterSebelumnya";
$tdatas_krs_jatah_sks[".masterListFields"][] = "krssksIsRegistrasi";
$tdatas_krs_jatah_sks[".masterListFields"][] = "mhsNama";

$tdatas_krs_jatah_sks[".inlineAddFields"] = array();
$tdatas_krs_jatah_sks[".inlineAddFields"][] = "krssksMhsNiu";
$tdatas_krs_jatah_sks[".inlineAddFields"][] = "krssksSempId";
$tdatas_krs_jatah_sks[".inlineAddFields"][] = "krssksJatahSksResmi";
$tdatas_krs_jatah_sks[".inlineAddFields"][] = "krssksJatahSksToleransi";
$tdatas_krs_jatah_sks[".inlineAddFields"][] = "krssksJatahDipakai";
$tdatas_krs_jatah_sks[".inlineAddFields"][] = "krssksIpSemesterSebelumnya";
$tdatas_krs_jatah_sks[".inlineAddFields"][] = "krssksIsRegistrasi";

$tdatas_krs_jatah_sks[".editFields"] = array();
$tdatas_krs_jatah_sks[".editFields"][] = "krssksMhsNiu";
$tdatas_krs_jatah_sks[".editFields"][] = "krssksSempId";
$tdatas_krs_jatah_sks[".editFields"][] = "krssksJatahSksResmi";
$tdatas_krs_jatah_sks[".editFields"][] = "krssksJatahSksToleransi";
$tdatas_krs_jatah_sks[".editFields"][] = "krssksJatahDipakai";
$tdatas_krs_jatah_sks[".editFields"][] = "krssksIpSemesterSebelumnya";
$tdatas_krs_jatah_sks[".editFields"][] = "krssksIsRegistrasi";

$tdatas_krs_jatah_sks[".inlineEditFields"] = array();
$tdatas_krs_jatah_sks[".inlineEditFields"][] = "krssksMhsNiu";
$tdatas_krs_jatah_sks[".inlineEditFields"][] = "krssksSempId";
$tdatas_krs_jatah_sks[".inlineEditFields"][] = "krssksJatahSksResmi";
$tdatas_krs_jatah_sks[".inlineEditFields"][] = "krssksJatahSksToleransi";
$tdatas_krs_jatah_sks[".inlineEditFields"][] = "krssksJatahDipakai";
$tdatas_krs_jatah_sks[".inlineEditFields"][] = "krssksIpSemesterSebelumnya";
$tdatas_krs_jatah_sks[".inlineEditFields"][] = "krssksIsRegistrasi";

$tdatas_krs_jatah_sks[".updateSelectedFields"] = array();
$tdatas_krs_jatah_sks[".updateSelectedFields"][] = "krssksMhsNiu";
$tdatas_krs_jatah_sks[".updateSelectedFields"][] = "krssksSempId";
$tdatas_krs_jatah_sks[".updateSelectedFields"][] = "krssksJatahSksResmi";
$tdatas_krs_jatah_sks[".updateSelectedFields"][] = "krssksJatahSksToleransi";
$tdatas_krs_jatah_sks[".updateSelectedFields"][] = "krssksJatahDipakai";
$tdatas_krs_jatah_sks[".updateSelectedFields"][] = "krssksIpSemesterSebelumnya";
$tdatas_krs_jatah_sks[".updateSelectedFields"][] = "krssksIsRegistrasi";


$tdatas_krs_jatah_sks[".exportFields"] = array();
$tdatas_krs_jatah_sks[".exportFields"][] = "krssksMhsNiu";
$tdatas_krs_jatah_sks[".exportFields"][] = "krssksSempId";
$tdatas_krs_jatah_sks[".exportFields"][] = "krssksJatahSksResmi";
$tdatas_krs_jatah_sks[".exportFields"][] = "krssksJatahSksToleransi";
$tdatas_krs_jatah_sks[".exportFields"][] = "krssksJatahDipakai";
$tdatas_krs_jatah_sks[".exportFields"][] = "krssksIpSemesterSebelumnya";
$tdatas_krs_jatah_sks[".exportFields"][] = "krssksIsRegistrasi";
$tdatas_krs_jatah_sks[".exportFields"][] = "mhsNama";

$tdatas_krs_jatah_sks[".importFields"] = array();
$tdatas_krs_jatah_sks[".importFields"][] = "krssksMhsNiu";
$tdatas_krs_jatah_sks[".importFields"][] = "krssksSempId";
$tdatas_krs_jatah_sks[".importFields"][] = "krssksJatahSksResmi";
$tdatas_krs_jatah_sks[".importFields"][] = "krssksJatahSksToleransi";
$tdatas_krs_jatah_sks[".importFields"][] = "krssksJatahDipakai";
$tdatas_krs_jatah_sks[".importFields"][] = "krssksIpSemesterSebelumnya";
$tdatas_krs_jatah_sks[".importFields"][] = "krssksIsRegistrasi";
$tdatas_krs_jatah_sks[".importFields"][] = "mhsNama";

$tdatas_krs_jatah_sks[".printFields"] = array();
$tdatas_krs_jatah_sks[".printFields"][] = "krssksMhsNiu";
$tdatas_krs_jatah_sks[".printFields"][] = "krssksSempId";
$tdatas_krs_jatah_sks[".printFields"][] = "krssksJatahSksResmi";
$tdatas_krs_jatah_sks[".printFields"][] = "krssksJatahSksToleransi";
$tdatas_krs_jatah_sks[".printFields"][] = "krssksJatahDipakai";
$tdatas_krs_jatah_sks[".printFields"][] = "krssksIpSemesterSebelumnya";
$tdatas_krs_jatah_sks[".printFields"][] = "krssksIsRegistrasi";
$tdatas_krs_jatah_sks[".printFields"][] = "mhsNama";


//	krssksMhsNiu
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "krssksMhsNiu";
	$fdata["GoodName"] = "krssksMhsNiu";
	$fdata["ownerTable"] = "s_krs_jatah_sks";
	$fdata["Label"] = GetFieldLabel("s_krs_jatah_sks","krssksMhsNiu");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

		$fdata["bInlineAdd"] = true;

		$fdata["bEditPage"] = true;

		$fdata["bInlineEdit"] = true;

		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "krssksMhsNiu";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "s_krs_jatah_sks.krssksMhsNiu";

	
	
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

	$edata = array("EditFormat" => "Lookup wizard");

	
	
		
	
// Begin Lookup settings
				$edata["LookupType"] = 1;
	$edata["LookupTable"] = "mahasiswa";
	$edata["LookupConnId"] = "gtakademik_dev_at_localhost";
		$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
		$edata["LCType"] = 0;

	
		
	$edata["LinkField"] = "mhsNiu";
	$edata["LinkFieldType"] = 200;
	$edata["DisplayField"] = "mhsNiu";
	
	

	
	$edata["LookupOrderBy"] = "";

	
	
	
		$edata["SimpleAdd"] = true;


	
	
		$edata["SelectSize"] = 1;

// End Lookup Settings


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
	
	
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
		$fdata["defaultSearchOption"] = "Equals";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatas_krs_jatah_sks["krssksMhsNiu"] = $fdata;
//	krssksSempId
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "krssksSempId";
	$fdata["GoodName"] = "krssksSempId";
	$fdata["ownerTable"] = "s_krs_jatah_sks";
	$fdata["Label"] = GetFieldLabel("s_krs_jatah_sks","krssksSempId");
	$fdata["FieldType"] = 20;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

		$fdata["bInlineAdd"] = true;

		$fdata["bEditPage"] = true;

		$fdata["bInlineEdit"] = true;

		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "krssksSempId";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "s_krs_jatah_sks.krssksSempId";

	
	
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

	$edata = array("EditFormat" => "Lookup wizard");

	
	
		
	
// Begin Lookup settings
				$edata["LookupType"] = 1;
	$edata["LookupTable"] = "s_semester_prodi";
	$edata["LookupConnId"] = "gtakademik_dev_at_localhost";
		$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
		$edata["LCType"] = 0;

	
		
	$edata["LinkField"] = "sempId";
	$edata["LinkFieldType"] = 20;
	$edata["DisplayField"] = "sempId";
	
	

	
	$edata["LookupOrderBy"] = "";

	
	
	
		$edata["SimpleAdd"] = true;


	
	
		$edata["SelectSize"] = 1;

// End Lookup Settings


		$edata["IsRequired"] = true;

	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
		
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Equals";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatas_krs_jatah_sks["krssksSempId"] = $fdata;
//	krssksJatahSksResmi
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "krssksJatahSksResmi";
	$fdata["GoodName"] = "krssksJatahSksResmi";
	$fdata["ownerTable"] = "s_krs_jatah_sks";
	$fdata["Label"] = GetFieldLabel("s_krs_jatah_sks","krssksJatahSksResmi");
	$fdata["FieldType"] = 16;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

		$fdata["bInlineAdd"] = true;

		$fdata["bEditPage"] = true;

		$fdata["bInlineEdit"] = true;

		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "krssksJatahSksResmi";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "s_krs_jatah_sks.krssksJatahSksResmi";

	
	
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
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatas_krs_jatah_sks["krssksJatahSksResmi"] = $fdata;
//	krssksJatahSksToleransi
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "krssksJatahSksToleransi";
	$fdata["GoodName"] = "krssksJatahSksToleransi";
	$fdata["ownerTable"] = "s_krs_jatah_sks";
	$fdata["Label"] = GetFieldLabel("s_krs_jatah_sks","krssksJatahSksToleransi");
	$fdata["FieldType"] = 16;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

		$fdata["bInlineAdd"] = true;

		$fdata["bEditPage"] = true;

		$fdata["bInlineEdit"] = true;

		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "krssksJatahSksToleransi";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "s_krs_jatah_sks.krssksJatahSksToleransi";

	
	
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
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatas_krs_jatah_sks["krssksJatahSksToleransi"] = $fdata;
//	krssksJatahDipakai
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "krssksJatahDipakai";
	$fdata["GoodName"] = "krssksJatahDipakai";
	$fdata["ownerTable"] = "s_krs_jatah_sks";
	$fdata["Label"] = GetFieldLabel("s_krs_jatah_sks","krssksJatahDipakai");
	$fdata["FieldType"] = 129;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

		$fdata["bInlineAdd"] = true;

		$fdata["bEditPage"] = true;

		$fdata["bInlineEdit"] = true;

		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "krssksJatahDipakai";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "s_krs_jatah_sks.krssksJatahDipakai";

	
	
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

	$edata = array("EditFormat" => "Lookup wizard");

	
	
		
	
// Begin Lookup settings
		$edata["LookupType"] = 0;
		$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
		$edata["LCType"] = 0;

	
	
		$edata["LookupValues"] = array();
	$edata["LookupValues"][] = "resmi";
	$edata["LookupValues"][] = "toleransi";

	
		$edata["SelectSize"] = 1;

// End Lookup Settings


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
	
	
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
		$fdata["defaultSearchOption"] = "Equals";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatas_krs_jatah_sks["krssksJatahDipakai"] = $fdata;
//	krssksIpSemesterSebelumnya
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "krssksIpSemesterSebelumnya";
	$fdata["GoodName"] = "krssksIpSemesterSebelumnya";
	$fdata["ownerTable"] = "s_krs_jatah_sks";
	$fdata["Label"] = GetFieldLabel("s_krs_jatah_sks","krssksIpSemesterSebelumnya");
	$fdata["FieldType"] = 14;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

		$fdata["bInlineAdd"] = true;

		$fdata["bEditPage"] = true;

		$fdata["bInlineEdit"] = true;

		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "krssksIpSemesterSebelumnya";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "s_krs_jatah_sks.krssksIpSemesterSebelumnya";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "Number");

	
	
	
	
	
	
		$vdata["DecimalDigits"] = 2;

	
	
	
	
	
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
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatas_krs_jatah_sks["krssksIpSemesterSebelumnya"] = $fdata;
//	krssksIsRegistrasi
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "krssksIsRegistrasi";
	$fdata["GoodName"] = "krssksIsRegistrasi";
	$fdata["ownerTable"] = "s_krs_jatah_sks";
	$fdata["Label"] = GetFieldLabel("s_krs_jatah_sks","krssksIsRegistrasi");
	$fdata["FieldType"] = 16;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

		$fdata["bInlineAdd"] = true;

		$fdata["bEditPage"] = true;

		$fdata["bInlineEdit"] = true;

		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "krssksIsRegistrasi";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "s_krs_jatah_sks.krssksIsRegistrasi";

	
	
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
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatas_krs_jatah_sks["krssksIsRegistrasi"] = $fdata;
//	mhsNama
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "mhsNama";
	$fdata["GoodName"] = "mhsNama";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("s_krs_jatah_sks","mhsNama");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

	
	
	
	
	

		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsNama";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mahasiswa.mhsNama";

	
	
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




	$tdatas_krs_jatah_sks["mhsNama"] = $fdata;


$tables_data["s_krs_jatah_sks"]=&$tdatas_krs_jatah_sks;
$field_labels["s_krs_jatah_sks"] = &$fieldLabelss_krs_jatah_sks;
$fieldToolTips["s_krs_jatah_sks"] = &$fieldToolTipss_krs_jatah_sks;
$placeHolders["s_krs_jatah_sks"] = &$placeHolderss_krs_jatah_sks;
$page_titles["s_krs_jatah_sks"] = &$pageTitless_krs_jatah_sks;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["s_krs_jatah_sks"] = array();

// tables which are master tables for current table (detail)
$masterTablesData["s_krs_jatah_sks"] = array();


// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_s_krs_jatah_sks()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "s_krs_jatah_sks.krssksMhsNiu,  s_krs_jatah_sks.krssksSempId,  s_krs_jatah_sks.krssksJatahSksResmi,  s_krs_jatah_sks.krssksJatahSksToleransi,  s_krs_jatah_sks.krssksJatahDipakai,  s_krs_jatah_sks.krssksIpSemesterSebelumnya,  s_krs_jatah_sks.krssksIsRegistrasi,  mahasiswa.mhsNama";
$proto0["m_strFrom"] = "FROM s_krs_jatah_sks  INNER JOIN mahasiswa ON mahasiswa.mhsNiu = s_krs_jatah_sks.krssksMhsNiu";
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
	"m_strName" => "krssksMhsNiu",
	"m_strTable" => "s_krs_jatah_sks",
	"m_srcTableName" => "s_krs_jatah_sks"
));

$proto6["m_sql"] = "s_krs_jatah_sks.krssksMhsNiu";
$proto6["m_srcTableName"] = "s_krs_jatah_sks";
$proto6["m_expr"]=$obj;
$proto6["m_alias"] = "";
$obj = new SQLFieldListItem($proto6);

$proto0["m_fieldlist"][]=$obj;
						$proto8=array();
			$obj = new SQLField(array(
	"m_strName" => "krssksSempId",
	"m_strTable" => "s_krs_jatah_sks",
	"m_srcTableName" => "s_krs_jatah_sks"
));

$proto8["m_sql"] = "s_krs_jatah_sks.krssksSempId";
$proto8["m_srcTableName"] = "s_krs_jatah_sks";
$proto8["m_expr"]=$obj;
$proto8["m_alias"] = "";
$obj = new SQLFieldListItem($proto8);

$proto0["m_fieldlist"][]=$obj;
						$proto10=array();
			$obj = new SQLField(array(
	"m_strName" => "krssksJatahSksResmi",
	"m_strTable" => "s_krs_jatah_sks",
	"m_srcTableName" => "s_krs_jatah_sks"
));

$proto10["m_sql"] = "s_krs_jatah_sks.krssksJatahSksResmi";
$proto10["m_srcTableName"] = "s_krs_jatah_sks";
$proto10["m_expr"]=$obj;
$proto10["m_alias"] = "";
$obj = new SQLFieldListItem($proto10);

$proto0["m_fieldlist"][]=$obj;
						$proto12=array();
			$obj = new SQLField(array(
	"m_strName" => "krssksJatahSksToleransi",
	"m_strTable" => "s_krs_jatah_sks",
	"m_srcTableName" => "s_krs_jatah_sks"
));

$proto12["m_sql"] = "s_krs_jatah_sks.krssksJatahSksToleransi";
$proto12["m_srcTableName"] = "s_krs_jatah_sks";
$proto12["m_expr"]=$obj;
$proto12["m_alias"] = "";
$obj = new SQLFieldListItem($proto12);

$proto0["m_fieldlist"][]=$obj;
						$proto14=array();
			$obj = new SQLField(array(
	"m_strName" => "krssksJatahDipakai",
	"m_strTable" => "s_krs_jatah_sks",
	"m_srcTableName" => "s_krs_jatah_sks"
));

$proto14["m_sql"] = "s_krs_jatah_sks.krssksJatahDipakai";
$proto14["m_srcTableName"] = "s_krs_jatah_sks";
$proto14["m_expr"]=$obj;
$proto14["m_alias"] = "";
$obj = new SQLFieldListItem($proto14);

$proto0["m_fieldlist"][]=$obj;
						$proto16=array();
			$obj = new SQLField(array(
	"m_strName" => "krssksIpSemesterSebelumnya",
	"m_strTable" => "s_krs_jatah_sks",
	"m_srcTableName" => "s_krs_jatah_sks"
));

$proto16["m_sql"] = "s_krs_jatah_sks.krssksIpSemesterSebelumnya";
$proto16["m_srcTableName"] = "s_krs_jatah_sks";
$proto16["m_expr"]=$obj;
$proto16["m_alias"] = "";
$obj = new SQLFieldListItem($proto16);

$proto0["m_fieldlist"][]=$obj;
						$proto18=array();
			$obj = new SQLField(array(
	"m_strName" => "krssksIsRegistrasi",
	"m_strTable" => "s_krs_jatah_sks",
	"m_srcTableName" => "s_krs_jatah_sks"
));

$proto18["m_sql"] = "s_krs_jatah_sks.krssksIsRegistrasi";
$proto18["m_srcTableName"] = "s_krs_jatah_sks";
$proto18["m_expr"]=$obj;
$proto18["m_alias"] = "";
$obj = new SQLFieldListItem($proto18);

$proto0["m_fieldlist"][]=$obj;
						$proto20=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsNama",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "s_krs_jatah_sks"
));

$proto20["m_sql"] = "mahasiswa.mhsNama";
$proto20["m_srcTableName"] = "s_krs_jatah_sks";
$proto20["m_expr"]=$obj;
$proto20["m_alias"] = "";
$obj = new SQLFieldListItem($proto20);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto22=array();
$proto22["m_link"] = "SQLL_MAIN";
			$proto23=array();
$proto23["m_strName"] = "s_krs_jatah_sks";
$proto23["m_srcTableName"] = "s_krs_jatah_sks";
$proto23["m_columns"] = array();
$proto23["m_columns"][] = "krssksMhsNiu";
$proto23["m_columns"][] = "krssksSempId";
$proto23["m_columns"][] = "krssksJatahSksResmi";
$proto23["m_columns"][] = "krssksJatahSksToleransi";
$proto23["m_columns"][] = "krssksJatahDipakai";
$proto23["m_columns"][] = "krssksIpSemesterSebelumnya";
$proto23["m_columns"][] = "krssksIsRegistrasi";
$obj = new SQLTable($proto23);

$proto22["m_table"] = $obj;
$proto22["m_sql"] = "s_krs_jatah_sks";
$proto22["m_alias"] = "";
$proto22["m_srcTableName"] = "s_krs_jatah_sks";
$proto24=array();
$proto24["m_sql"] = "";
$proto24["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto24["m_column"]=$obj;
$proto24["m_contained"] = array();
$proto24["m_strCase"] = "";
$proto24["m_havingmode"] = false;
$proto24["m_inBrackets"] = false;
$proto24["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto24);

$proto22["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto22);

$proto0["m_fromlist"][]=$obj;
												$proto26=array();
$proto26["m_link"] = "SQLL_INNERJOIN";
			$proto27=array();
$proto27["m_strName"] = "mahasiswa";
$proto27["m_srcTableName"] = "s_krs_jatah_sks";
$proto27["m_columns"] = array();
$proto27["m_columns"][] = "mhsNiu";
$proto27["m_columns"][] = "mhsNif";
$proto27["m_columns"][] = "mhsNama";
$proto27["m_columns"][] = "mhsAngkatan";
$proto27["m_columns"][] = "mhsSemesterMasuk";
$proto27["m_columns"][] = "mhsPasswordRegistrasi";
$proto27["m_columns"][] = "mhsKurId";
$proto27["m_columns"][] = "mhsProdiKode";
$proto27["m_columns"][] = "mhsProdiKodeUniv";
$proto27["m_columns"][] = "mhsProdikonsentrasiId";
$proto27["m_columns"][] = "mhsWktkulId";
$proto27["m_columns"][] = "mhsNomorTes";
$proto27["m_columns"][] = "mhsTanggalTerdaftar";
$proto27["m_columns"][] = "mhsStatusMasukPt";
$proto27["m_columns"][] = "mhsIsAsing";
$proto27["m_columns"][] = "mhsJumlahSksPindahan";
$proto27["m_columns"][] = "mhsKodePtPindahan";
$proto27["m_columns"][] = "mhsKodeProdiDiktiPindahan";
$proto27["m_columns"][] = "mhsNamaPtPindahan";
$proto27["m_columns"][] = "mhsJjarKodeDiktiPindahan";
$proto27["m_columns"][] = "mhsTahunMasukPtPindahan";
$proto27["m_columns"][] = "mhsNimLama";
$proto27["m_columns"][] = "mhsJenisKelamin";
$proto27["m_columns"][] = "mhsKotaKodeLahir";
$proto27["m_columns"][] = "mhsTanggalLahir";
$proto27["m_columns"][] = "mhsAgmrId";
$proto27["m_columns"][] = "mhsSmtaKode";
$proto27["m_columns"][] = "mhsTdftSmta";
$proto27["m_columns"][] = "mhsTahunTamatSmta";
$proto27["m_columns"][] = "mhsTahunLulusSmta";
$proto27["m_columns"][] = "mhsJursmtarKode";
$proto27["m_columns"][] = "mhsAlamatSmta";
$proto27["m_columns"][] = "mhsNoIjasahSmta";
$proto27["m_columns"][] = "mhsIjasahSmta";
$proto27["m_columns"][] = "mhsTanggalIjasahSmta";
$proto27["m_columns"][] = "mhsNilaiUjianAkhirSmta";
$proto27["m_columns"][] = "mhsJumlahMpUjianAkhirSmta";
$proto27["m_columns"][] = "mhsStnkrId";
$proto27["m_columns"][] = "mhsJumlahSaudara";
$proto27["m_columns"][] = "mhsAlamatMhs";
$proto27["m_columns"][] = "mhsAlamatTerakhir";
$proto27["m_columns"][] = "mhsAlamatDiKotaIni";
$proto27["m_columns"][] = "mhsKotaKode";
$proto27["m_columns"][] = "mhsNgrKode";
$proto27["m_columns"][] = "mhsKodePos";
$proto27["m_columns"][] = "mhsStatrumahId";
$proto27["m_columns"][] = "mhsSbdnrId";
$proto27["m_columns"][] = "mhsHubbiayaId";
$proto27["m_columns"][] = "mhsTempatKerja";
$proto27["m_columns"][] = "mhsAlamatTempatKerja";
$proto27["m_columns"][] = "mhsNoTelpTempatKerja";
$proto27["m_columns"][] = "mhsBeasiswa";
$proto27["m_columns"][] = "mhsWnrId";
$proto27["m_columns"][] = "mhsJlrrKode";
$proto27["m_columns"][] = "mhsNoAskes";
$proto27["m_columns"][] = "mhsNoTelp";
$proto27["m_columns"][] = "mhsNoHp";
$proto27["m_columns"][] = "mhsEmail";
$proto27["m_columns"][] = "mhsHomepage";
$proto27["m_columns"][] = "mhsFoto";
$proto27["m_columns"][] = "mhsStakmhsrKode";
$proto27["m_columns"][] = "mhsDsnPegNipPembimbingAkademik";
$proto27["m_columns"][] = "mhsSksWajib";
$proto27["m_columns"][] = "mhsSksPilihan";
$proto27["m_columns"][] = "mhsSksA";
$proto27["m_columns"][] = "mhsSksB";
$proto27["m_columns"][] = "mhsSksC";
$proto27["m_columns"][] = "mhsSksD";
$proto27["m_columns"][] = "mhsSksE";
$proto27["m_columns"][] = "mhsSksTranskrip";
$proto27["m_columns"][] = "mhsBobotTotalTranskrip";
$proto27["m_columns"][] = "mhsIpkTranskrip";
$proto27["m_columns"][] = "mhsLamaStudiSemester";
$proto27["m_columns"][] = "mhsLamaStudiBulan";
$proto27["m_columns"][] = "mhsIsTranskripAkhirDiarsipkan";
$proto27["m_columns"][] = "mhsTanggalTranskrip";
$proto27["m_columns"][] = "mhsNomorTranskrip";
$proto27["m_columns"][] = "mhsTempatLahirTranskrip";
$proto27["m_columns"][] = "mhsTanggalLahirTranskrip";
$proto27["m_columns"][] = "mhsMetodeBuildTranskrip";
$proto27["m_columns"][] = "mhsMetodePenyetaraanTranskrip";
$proto27["m_columns"][] = "mhsTahunKurikulumPenyetaraanTranskrip";
$proto27["m_columns"][] = "mhsTanggalLulus";
$proto27["m_columns"][] = "mhsNoSuratYudisium";
$proto27["m_columns"][] = "mhsTanggalSuratYudisium";
$proto27["m_columns"][] = "mhsSemIdLulus";
$proto27["m_columns"][] = "mhsTanggalIjasah";
$proto27["m_columns"][] = "mhsNoIjasah";
$proto27["m_columns"][] = "mhsKodeIjasah";
$proto27["m_columns"][] = "mhsPinIjasah";
$proto27["m_columns"][] = "mhsPrlsrId";
$proto27["m_columns"][] = "mhsPrlsrNama";
$proto27["m_columns"][] = "mhsPrlsrNamaAsing";
$proto27["m_columns"][] = "mhsWsdId";
$proto27["m_columns"][] = "mhsTanggalPengubahan";
$proto27["m_columns"][] = "mhsUnitPengubah";
$proto27["m_columns"][] = "mhsUserPengubah";
$proto27["m_columns"][] = "mhsProdiGelarKelulusan";
$proto27["m_columns"][] = "mhsSemIdMulai";
$proto27["m_columns"][] = "mhsBiayaStudi";
$proto27["m_columns"][] = "mhsPekerjaan";
$proto27["m_columns"][] = "mhsPTKerja";
$proto27["m_columns"][] = "mhsPSKerja";
$proto27["m_columns"][] = "mhsNIDNPromotor";
$proto27["m_columns"][] = "mhsKoPromotor1";
$proto27["m_columns"][] = "mhsKoPromotor2";
$proto27["m_columns"][] = "mhsKoPromotor3";
$proto27["m_columns"][] = "mhsKoPromotor4";
$proto27["m_columns"][] = "mhsProdiAsal";
$proto27["m_columns"][] = "mhsDiktiShift";
$proto27["m_columns"][] = "mhsPembayaranIpp";
$proto27["m_columns"][] = "mshNoIpp";
$proto27["m_columns"][] = "mhsPersyaratan";
$proto27["m_columns"][] = "mhsPengOrg";
$proto27["m_columns"][] = "mhsOrg";
$proto27["m_columns"][] = "mhsDomisili";
$proto27["m_columns"][] = "mhsJenisSttb";
$proto27["m_columns"][] = "mhsIsKerja";
$proto27["m_columns"][] = "mhsStatusSmta";
$proto27["m_columns"][] = "mhsAkreditasi";
$proto27["m_columns"][] = "mhsKerja";
$proto27["m_columns"][] = "mhsSaudaraLk";
$proto27["m_columns"][] = "mhsSaudaraPr";
$proto27["m_columns"][] = "mhsHobi";
$proto27["m_columns"][] = "mhsSmtaLain";
$proto27["m_columns"][] = "mhsAkreditasiSmta";
$proto27["m_columns"][] = "mhsBiayaKuliah";
$proto27["m_columns"][] = "MhsIdJenisSmta";
$proto27["m_columns"][] = "mhsSmtaPropinsiKode";
$proto27["m_columns"][] = "mhsEmailOld";
$proto27["m_columns"][] = "mhsNoKtp";
$proto27["m_columns"][] = "mhsNoKk";
$obj = new SQLTable($proto27);

$proto26["m_table"] = $obj;
$proto26["m_sql"] = "INNER JOIN mahasiswa ON mahasiswa.mhsNiu = s_krs_jatah_sks.krssksMhsNiu";
$proto26["m_alias"] = "";
$proto26["m_srcTableName"] = "s_krs_jatah_sks";
$proto28=array();
$proto28["m_sql"] = "mahasiswa.mhsNiu = s_krs_jatah_sks.krssksMhsNiu";
$proto28["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "mhsNiu",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "s_krs_jatah_sks"
));

$proto28["m_column"]=$obj;
$proto28["m_contained"] = array();
$proto28["m_strCase"] = "= s_krs_jatah_sks.krssksMhsNiu";
$proto28["m_havingmode"] = false;
$proto28["m_inBrackets"] = false;
$proto28["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto28);

$proto26["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto26);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$proto0["m_srcTableName"]="s_krs_jatah_sks";		
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_s_krs_jatah_sks = createSqlQuery_s_krs_jatah_sks();


	
		;

								

$tdatas_krs_jatah_sks[".sqlquery"] = $queryData_s_krs_jatah_sks;

$tableEvents["s_krs_jatah_sks"] = new eventsBase;
$tdatas_krs_jatah_sks[".hasEvents"] = false;

?>