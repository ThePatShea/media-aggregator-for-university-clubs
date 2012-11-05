<?php

	include_once ('lib/php/foreground/pieces/ribbon.php');
	include_once ('lib/php/foreground/pieces/list.php');
	
	$includedTypes['photo']		= 1;
	$includedTypes['photoSort']	= 'random';
	$numberOfPosts				= 10;
	$postList					= getPosts($numberOfPosts, $includedTypes);
	
	echo "<div class='smallBox'>";
		generatePiece_ribbonHeader("related galleries");
		echo "<div class='ribbon'>";
			generatePiece_list($postList, "large", "small", "dark", $numberOfPosts, 1);
			generatePiece_ribbonFooter("all photo galleries", "archive.php?photo=1&header=view all photo galleries");
		echo "</div>";
	echo "</div>";
	
?>