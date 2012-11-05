<?php

	include_once("lib/php/background/allBackground.php");
	include_once("lib/php/foreground/pieces/ribbon.php");
	echo "<base target='_parent'/>";
	
	$includedTypes['article']		= 1;
	$includedTypes['photo']			= 1;	
	$includedTypes['video']			= 1;
	
	$includedTypes['articleSort']	= 'random';
	$includedTypes['photoSort']		= 'random';
	$includedTypes['videoSort']		= 'random';
	
	$includedCategories				= 'academics';	
	$numberOfPosts = 4;
	
	echo "<div style='position: relative; left: -7px;'>";
		generatePiece_PostTeaserList($numberOfPosts, $includedTypes, $includedCategories);
	echo "</div>";
	
?>