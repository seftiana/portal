<?php

function getMenuNodes_welcome_page($menuNodesObject)
{
	// create menu nodes arr
	$menuNodesObject->menuNodes["welcome_page"] = array();

	$menuNode = array();
	$menuNode["id"] = "1";
	$menuNode["name"] = "akseskmk";
	$menuNode["href"] = "";
	$menuNode["type"] = "Group";
	$menuNode["table"] = "";
	$menuNode["style"] = "";
	$menuNode["params"] = "";
	$menuNode["parent"] = "0";
	$menuNode["nameType"] = "Text";
	$menuNode["linkType"] = "None";
	$menuNode["pageType"] = "List";//
	$menuNode["openType"] = "None";
	
	$menuNode["icon"] = "";
	$menuNode["iconType"] = "0";

			$menuNode["color"] = "";
	
	$menuNode["title"] = "akseskmk";



	$menuNodesObject->menuNodes["welcome_page"][] = $menuNode;
	$menuNode = array();
	$menuNode["id"] = "2";
	$menuNode["name"] = "Ijin KMK";
	$menuNode["href"] = "mypage.htm";
	$menuNode["type"] = "Leaf";
	$menuNode["table"] = "mahasiswa";
	$menuNode["style"] = "";
	$menuNode["params"] = "";
	$menuNode["parent"] = "1";
	$menuNode["nameType"] = "Text";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";//
	$menuNode["openType"] = "None";
	
	$menuNode["icon"] = "glyphicon-check";
	$menuNode["iconType"] = "2";

			$menuNode["color"] = "#"."7B68EE";
	
	$menuNode["title"] = "Ijin KMK";

	$menuNode["comments"] = "Untuk membuka akses KRS Mahasiswa karena terblokir pembayaran, padahal sudah membayar";


	$menuNodesObject->menuNodes["welcome_page"][] = $menuNode;
}
?>
