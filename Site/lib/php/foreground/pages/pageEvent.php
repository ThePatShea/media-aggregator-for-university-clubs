<?php

	$id		= $_GET['id'];
	$post	= getSinglePost("SELECT * FROM events WHERE postFacebookID = '$id' ");

	echo "<div class='medBox'>";
		include_once ('lib/php/foreground/elements/contentBox_event.php');
		echo "<div style='position: relative; top: -25px;'>";
			include_once ('lib/php/foreground/elements/comments.php');
		echo "</div>";
	echo "</div>";
	
	echo "<div class='pageSpacer'></div>";
	
	echo "<div class='smallBox'>";
		include_once ('lib/php/foreground/elements/loggedInWidget.php');
		include_once ('lib/php/foreground/pieces/postedBy.php');
		generateElement_postedBy($post);
		include_once ('lib/php/foreground/elements/relatedEvents.php');
	echo "</div>";
	
?>