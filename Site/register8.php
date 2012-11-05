<?php 
	
	include_once ('lib/php/background/allBackground.php');
		
	$facebookID	 = $_SESSION['organizationFacebookID'];
	
	if ($HTTP_POST_VARS)
	{
		$category	= addslashes($HTTP_POST_VARS['category']);
		$blurb		= addslashes($HTTP_POST_VARS['blurb']);
		$name		= addslashes($HTTP_POST_VARS['name']);		
		
		$query		= mysql_query("UPDATE users SET category = '$category', blurb = '$blurb' WHERE facebookID = '$facebookID'");
		
		if ($name != "")
		{
			$query	= mysql_query("UPDATE users SET name = '$name' WHERE facebookID = '$facebookID'");
		}
	}
	
	$redirectURL = "organization.php?id=$facebookID";
	echo "<META HTTP-EQUIV='Refresh' Content='0; URL=$redirectURL'>";
	
?>