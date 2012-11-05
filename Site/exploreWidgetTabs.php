<?php

	include_once("lib/php/background/allBackground.php");
	
	
	$includedTypes['articleSort']		= 'random';
	$includedTypes['photoSort']			= 'random';
	$includedTypes['videoSort']			= 'random';
	$includedTypes['eventSort']			= 'random';
	
	$includedTypes['article']			= $_GET['article'];
	$includedTypes['photo']				= $_GET['photo'];
	$includedTypes['video']				= $_GET['video'];
	$includedTypes['event']				= $_GET['event'];
	$includedCategories					= $_GET['category'];
	
	$numberOfPosts = 3;
	
	
	
	echo "<div style='position: relative; left: -7px;'>";
		generatePiece_PostTeaserList($numberOfPosts, $includedTypes, $includedCategories);
	echo "</div>";
	
?>