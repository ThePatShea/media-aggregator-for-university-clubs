<?php

	include_once ('lib/php/foreground/pieces/ribbon.php');
	include_once ('lib/php/foreground/pieces/list.php');
	
	$includedTypes['event']		= 1;
	$includedTypes['eventSort']	= 'random';
	$numberOfPosts				= 10;
	$postList					= getPosts($numberOfPosts, $includedTypes);
	
	echo "<div class='smallBox'>";
		generatePiece_header("related events");
		echo "<div class='ribbon widget' style='top:0; left:-10; width:300px;'>";
			generatePiece_list($postList, "large", "small", "dark", $numberOfPosts, 1);
			generatePiece_ribbonFooter("all events", "archive.php?event=1&header=view all upcoming events");
		echo "</div>";
	echo "</div>";
	
?>