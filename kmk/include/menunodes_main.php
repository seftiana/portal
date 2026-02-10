<?php

function getMenuNodes_main($menuNodesObject)
{
	// create menu nodes arr
	$menuNodesObject->menuNodes["main"] = array();

	$menuNode = array();
	$menuNode["id"] = "1";
	$menuNode["name"] = "Ijin KMK";
	$menuNode["href"] = "mypage.htm";
	$menuNode["type"] = "Leaf";
	$menuNode["table"] = "mahasiswa";
	$menuNode["style"] = "";
	$menuNode["params"] = "";
	$menuNode["parent"] = "0";
	$menuNode["nameType"] = "Text";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";//
	$menuNode["openType"] = "None";
	
	$menuNode["icon"] = "glyphicon-check";
	$menuNode["iconType"] = "2";

			$menuNode["color"] = "";
	
	$menuNode["title"] = "Ijin KMK";



	$menuNodesObject->menuNodes["main"][] = $menuNode;
}
?>
