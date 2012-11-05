<?php

	$id			= $_GET['id'];
	$post	= getSinglePost("SELECT * FROM galleries WHERE postFacebookID = '$id' ");

	echo "<div class='smallBox' style='position: relative; left: -10px;'>";
		
		echo "<div style='position: relative; top: 20px'>";
			include_once ('lib/php/foreground/elements/ribbonTop_photos.php');
		echo "</div>";
		echo "<div>";
			include_once ('lib/php/foreground/pieces/postedBy.php');
			generateElement_ribbonPostedBy($post);
		echo "</div>";
		echo "<div style='position: relative; top: -20px;'>";
			include_once ('lib/php/foreground/elements/relatedPhotos.php');
		echo "</div>";	
	echo "</div>";
	
	echo "<div class='pageSpacer'></div>";
	
	echo "<div class='medBox'>";
		include_once ('lib/php/foreground/elements/contentBox_photo.php');
		include_once ('lib/php/foreground/elements/comments.php');
	echo "</div>";	
	
	
	
?>