<?php

	include_once("lib/php/background/allBackground.php");
	include_once("lib/php/foreground/pieces/ribbon.php");
	echo "<base target='_parent'/>";
	
	$includedTypes['article']			= 1;
	$includedTypes['articleSort']		= 'random';
	
	$numberOfPosts = 3;
	
	
	
	echo "<div class='ribbon' style='position: relative; top: 0;'>";
		
		echo "<div style='position: relative; left: -15px;'>";
			generatePiece_PostTeaserList($numberOfPosts, $includedTypes, $includedCategories);
		echo "</div>";
		
		echo "<div style='position: relative; left: -5px;'>";
			generatePiece_ribbonFooter("all articles", "archive.php?article=1&header=view all articles");
		echo "</div>";

	echo "</div>";
	
?>