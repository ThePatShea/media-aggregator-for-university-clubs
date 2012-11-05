<?php

	include_once("lib/php/background/allBackground.php");
	include_once("lib/php/foreground/pieces/ribbon.php");
	echo "<base target='_parent'/>";
	
	$includedTypes['video']			= 1;
	$includedTypes['videoSort']		= 'random';
	
	$numberOfPosts = 3;
	
	echo "<div class='ribbon' style='position: relative; top: 0;'>";
			
		echo "<div style='position: relative; left: -15px;'>";
			generatePiece_PostTeaserList($numberOfPosts, $includedTypes, $includedCategories);
		echo "</div>";
		
		echo "<div style='position: relative; left: -5px;'>";
			generatePiece_ribbonFooter("all videos", "archive.php?video=1&header=view all videos");
		echo "</div>";
	
	echo "</div>";
	
?>