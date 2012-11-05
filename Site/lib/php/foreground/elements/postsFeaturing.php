<?php
	
	$organizationInfo = generateQueryArray("SELECT name FROM users WHERE facebookID = $id");
	$organizationName = $organizationInfo[0]['name'];

	include_once ('lib/php/foreground/pieces/ribbon.php');
	include_once ('lib/php/foreground/pieces/list.php');
	
	$includedTypes['article']		= 1;
	$includedTypes['photo']			= 1;
	$includedTypes['video']			= 1;
	$includedTypes['event']			= 1;
	
	
	$postsFeaturing					= 1;
	
	$numberOfPosts					= 10;
	
	$postList						= getPosts($numberOfPosts, $includedTypes, 'all', 'all', 0, $organizationName, $postsFeaturing);
	
	$numberOfPosts = count($postList);
	
	if ($numberOfPosts > 10)
	{
		$numberOfPosts = 10;
	}
	
	if ($numberOfPosts != 0)
	{
		echo "<div class='smallBox' style='position: relative; z-index: 10;'>";
			generatePiece_header_bigTitle("posts featuring $organizationName");
			echo "<div class='ribbon widget' style='top:0; left:-10; width:300px;'>";
				generatePiece_list($postList, "large", "small", "dark", $numberOfPosts, 1);
				generatePiece_ribbonFooter("all posts featuring $organizationName", "archive.php?article=1&photo=1&video=1&event=1&postsFeaturing=1&search=$organizationName&header=view all posts featuring $organizationName");
			echo "</div>";
		echo "</div>";
	}
	
?>