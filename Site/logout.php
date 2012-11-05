<?php
	session_start();
	
	if ($_SESSION['facebookID'] != 0)
	{
		$_SESSION['facebookID'] = 0;
				
		include_once('lib/php/background/registerFacebook.php');
		
		$facebook = new Facebook2(array(
			'appId'  => '219781404699497',
			'secret' => '11efd0dea9edbb5461a0b74c6227ff42',
			'cookie' => true
		));
						
		$redirectURL = $facebook->getLogoutUrl();	
	}
	else
	{
		$_SESSION['loggedOut'] = 'true';
		$redirectURL = $_SESSION['currentURL'];
	}

	echo "<META HTTP-EQUIV='Refresh' Content='0; URL=$redirectURL'>";
?>