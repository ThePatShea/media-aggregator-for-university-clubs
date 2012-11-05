<?php

	include_once("lib/php/background/allBackground.php");
	include_once("lib/php/foreground/pieces/ribbon.php");
	echo "<base target='_parent'/>";
	
	$includedTypes['event']			= 1;
	$includedTypes['eventSort']		= 'random';
	
	$numberOfPosts = 3;
	
	echo "<div class='ribbon' style='position: relative; top: 0;'>";
			
		echo "<div style='position: relative; left: -15px;'>";
			generatePiece_PostTeaserList($numberOfPosts, $includedTypes, $includedCategories);
		echo "</div>";
		
		echo "<div style='position: relative; left: -5px;'>";
			generatePiece_ribbonFooter("all events", "archive.php?event=1&header=view all upcoming events");
		echo "</div>";
	
	echo "</div>";
	
?>