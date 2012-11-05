<?php 

	session_start();
	$_SESSION['creatingOrganization']	= 'true';
	
	$registerStep = 3;
	
	$pageName = 'pageRegister';
	include("lib/php/foreground/pages/generatePage.php");
	
?>