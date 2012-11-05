<?php

	include_once("lib/php/background/allBackground.php");
	include_once("lib/php/foreground/pieces/ribbon.php");
	echo "<base target='_parent'/>";
	
	$includedTypes['article']		= 1;
	$includedTypes['photo']			= 1;	
	$includedTypes['video']			= 1;
	
	$includedTypes['articleSort']	= 'oldest';
	$includedTypes['photoSort']		= 'oldest';
	$includedTypes['videoSort']		= 'oldest';
	
	$numberOfPosts = 3;
	
	echo "<div class='ribbon' style='position: relative; top: 0;'>";
			
		echo "<div style='position: relative; left: -15px;'>";
			generatePiece_PostTeaserList($numberOfPosts, $includedTypes, $includedCategories);
		echo "</div>";
		
		echo "<div style='position: relative; left: -5px;'>";
			generatePiece_ribbonFooter("all posts", "archive.php?article=1&photo=1&video=1&header=view all posts");
		echo "</div>";
	
	echo "</div>";
	
?>