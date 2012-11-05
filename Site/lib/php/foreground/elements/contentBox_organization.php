<?php
	
	$id		= $_GET['id'];
	$post	= getSinglePost("SELECT * FROM users WHERE facebookID = $id");
	$organizationName = $post[0]['name'];
	
	echo "<div class='medBox'>";
		include_once ('lib/php/foreground/elements/singlePageHeader_organization.php');
		include_once ('lib/php/foreground/elements/postTeaser_organization.php');
		generateElement_postTeaser_organization($id);
		include_once ('lib/php/foreground/pieces/facebookLikes.php');
		generatePiece_FacebookLikes($id);
	echo "</div>";
	
?>