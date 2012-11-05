<?php

	include_once ('lib/php/foreground/pieces/ribbon.php');
	include_once ('lib/php/foreground/pieces/list.php');
	
	$includedTypes['video']			= 1;
	$includedTypes['videoSort']		= 'random';
	$numberOfPosts					= 10;
	$postList						= getPosts($numberOfPosts, $includedTypes);
	
	echo "<div class='smallBox'>";
		generatePiece_ribbonHeader_withOnOffBox("continuous play");
		echo "<div class='ribbon'>";
			include_once ('lib/php/foreground/pieces/continuousPlayInfo.php');
		echo "</div>";
	echo "</div>";
	
?>