<?php 

	session_start();
	$_SESSION['creatingOrganization']	= 'false';
	
	$registerStep = 1;
	
	$pageName = 'pageRegister';
	include("lib/php/foreground/pages/generatePage.php");

?>