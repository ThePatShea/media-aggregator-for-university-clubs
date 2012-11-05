<?php

	include_once ('lib/php/background/databaseConnect.php');
	require("lib/php/background/registerFacebook.php");
	
	session_start();
	
	$facebook = new Facebook2(array(
		'appId'  => '219781404699497',
		'secret' => '11efd0dea9edbb5461a0b74c6227ff42',
		'cookie' => true
	));
	
	if($_SESSION['facebookID'] == 1) 
	{
		$session	= $facebook->getSession();
		$user		= $facebook->getUser();
				
		error_reporting(0);
			$query = mysql_query("SELECT * FROM users WHERE facebookID = $user");
			$result = mysql_fetch_array($query);
		error_reporting(E_ERROR | E_WARNING | E_PARSE);
		
		if ($result)
		{
			$_SESSION['facebookID'] = $user;
			$redirectURL = $_SESSION['currentURL'];	
		}
		else
		{
			$redirectURL = "register.php";
		}
		
	}
	else
	{
		$_SESSION['facebookID'] = 1;
		
		$redirectURL = $facebook->getLoginUrl(array(
			"req_perms" => "$req_perms"
		));
	}
	
	echo "<META HTTP-EQUIV='Refresh' Content='0; URL=$redirectURL'>";

?>