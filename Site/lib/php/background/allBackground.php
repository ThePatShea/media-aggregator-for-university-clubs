<?php
	
	session_start();
	
	require("lib/php/background/registerFacebook.php");
	include_once("lib/php/background/facebookSDK/fbmain.php");
	include_once("lib/php/background/cookies.php");
	include_once("lib/php/background/sources.php");
	include_once("lib/php/background/databaseConnect.php");
	include_once("lib/php/background/getPosts.php");
	include_once("lib/php/background/jqueryFiles.php");
	include_once("lib/php/foreground/pieces/postTeaser.php");
	include_once("lib/php/foreground/pieces/universalPieces.php");
	include_once("lib/css/style.php");
	include_once("lib/php/background/universalBackground.php");

	$source = getSources();
	
	echo "<title>Emory Bubble</title>";

?>