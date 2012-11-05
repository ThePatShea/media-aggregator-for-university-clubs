<?php

	include_once("lib/php/background/allBackground.php");
	include_once("lib/php/foreground/pieces/ribbon.php");
	echo "<base target='_parent'/>";
		
	$includedTypes['photo']			= 1;
	$includedTypes['photoSort']		= 'random';
	
	$numberOfPosts = 3;
	
	echo "<div class='ribbon' style='position: relative; top: 0;'>";
			
		echo "<div style='position: relative; left: -15px;'>";
			generatePiece_PostTeaserList($numberOfPosts, $includedTypes, $includedCategories);
		echo "</div>";
		
		echo "<div style='position: relative; left: -5px;'>";
			generatePiece_ribbonFooter("all photo galleries", "archive.php?photo=1&header=view all photo galleries");
		echo "</div>";
	
	echo "</div>";
	
?>