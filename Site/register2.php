<?php 
	
	session_start();
	
	if ($_SESSION['manageFacebookID'])
	{
		$inputFacebookID = $_SESSION['manageFacebookID'];
		
		header("Location: accounts.php?manageFacebookID=$inputFacebookID");
	}
	
	if ($_SESSION['creatingOrganization']	== 'true')
	{
		$registerStep = 4;
	}
	else
	{
		$registerStep = 2;
	}
	
	$pageName = 'pageRegister';
	include("lib/php/foreground/pages/generatePage.php");

?>