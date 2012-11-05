<?php

	$id		= $_GET['id'];
	$post	= getSinglePost("SELECT * FROM videos WHERE postYouTubeID = '$id' ");

	echo "<div class='smallBox'  style='position: relative; left: -10px;'>";
		
		echo "<div style='position: relative; top: 20px'>";
			include_once ('lib/php/foreground/elements/ribbonTop_videos.php');
		echo "</div>";
		echo "<div>";
			include_once ('lib/php/foreground/pieces/postedBy.php');
			generateElement_ribbonPostedBy($post);
		echo "</div>";
		echo "<div class='continuousPlay' style='position: relative; top: -20px'>";
			include_once ('lib/php/foreground/elements/continuousPlay.php');
		echo "</div>";
		echo "<div style='position: relative; top: -40px'>";
			include_once ('lib/php/foreground/elements/relatedVideos.php');
		echo "</div>";
		
	echo "</div>";
	
	echo "<div class='pageSpacer'></div>";
	
	echo "<div class='medBox'>";
		include_once ('lib/php/foreground/elements/contentBox_video.php');
		echo "<div style='position: relative; top: -90px'>";
			include_once ('lib/php/foreground/elements/comments.php');
		echo "</div>";
	echo "</div>";	
	
	
	
?>