<?php

require_once("MobileRestHandler.php");

header('Access-Control-Allow-Origin: *');   // this header setting allows WS request from any site
header('Access-Control-Allow-Credentials: false'); // this header allows WS request without any credential check.

$view = "";
if(isset($_GET["view"]))
	$view = $_GET["view"];

switch($view) {

	case "all":
		// to handle REST Url /mobile/list/
		$mobileRestHandler = new MobileRestHandler();
		$mobileRestHandler->getAllMobiles();
		break;
		
	case "single":
		// to handle REST Url /mobile/show/<id>/
		$mobileRestHandler = new MobileRestHandler();
		$mobileRestHandler->getMobile($_GET["id"]);
		break;

	case "" :
		//404 - not found;
		break;
}

?>
