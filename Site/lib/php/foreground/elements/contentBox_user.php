<?php
	
	$id		= $_GET['id'];
	$post	= generateQueryArray("SELECT * FROM users WHERE facebookID = $id");
	$postFacebookInfo = $facebook->api($id);
	
	echo "<div class='medBox'>";
		include_once ('lib/php/foreground/elements/singlePageHeader_user.php');
		include_once ('lib/php/foreground/elements/postTeaser_organization.php');
		generateElement_postTeaser_organization($id);
	echo "</div>";
	
?>