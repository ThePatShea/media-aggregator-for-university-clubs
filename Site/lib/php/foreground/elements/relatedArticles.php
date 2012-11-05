<?php

	include_once ('lib/php/foreground/pieces/ribbon.php');
	include_once ('lib/php/foreground/pieces/list.php');
	
	$includedTypes['article']		= 1;
	$includedTypes['articleSort']	= 'random';
	$numberOfPosts					= 10;
	$postList						= getPosts($numberOfPosts, $includedTypes);
	
	echo "<div class='smallBox' style='position: relative; z-index: 10;'>";
		generatePiece_header("related articles");
		echo "<div class='ribbon widget' style='top:0; left:-10; width:300px;'>";
			generatePiece_list($postList, "large", "small", "dark", $numberOfPosts, 1);
			generatePiece_ribbonFooter("all articles", "archive.php?article=1&header=view all articles");
		echo "</div>";
	echo "</div>";
	
?>