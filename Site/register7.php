<?php 
	
	include_once ('lib/php/background/allBackground.php');
	
	$facebookID	 = $_SESSION['facebookID'];
	
	if ($HTTP_POST_VARS)
	{
		$category	= addslashes($HTTP_POST_VARS['category']);
		$blurb		= addslashes($HTTP_POST_VARS['blurb']);		
		
		$query		= mysql_query("UPDATE users SET category = '$category', blurb = '$blurb' WHERE facebookID = '$facebookID'");
	}
	
	$redirectURL = "user.php?id=$facebookID";
	echo "<META HTTP-EQUIV='Refresh' Content='0; URL=$redirectURL'>";
	
?>