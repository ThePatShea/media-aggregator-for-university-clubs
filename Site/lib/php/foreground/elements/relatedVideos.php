<?php

	include_once ('lib/php/foreground/pieces/ribbon.php');
	include_once ('lib/php/foreground/pieces/list.php');
	
	$includedTypes['video']				= 1;
	$includedTypes['videoSort']			= 'random';
	$numberOfPosts						= 10;
	$postList							= getPosts($numberOfPosts, $includedTypes);
	
	echo "<div class='smallBox'>";
		generatePiece_ribbonHeader("related videos");
		echo "<div class='ribbon'>";
			generatePiece_list($postList, "large", "small", "dark", $numberOfPosts, 1);
			generatePiece_ribbonFooter("all videos", "archive.php?video=1&header=view all videos");
		echo "</div>";
	echo "</div>";
	
?>