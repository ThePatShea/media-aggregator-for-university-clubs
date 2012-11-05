<?php

	$id		= $_GET['id'];
	$post	= getSinglePost("SELECT * FROM articles WHERE postCampusBubbleID = $id");
	
	echo "<div class='medBox'>";
		include_once ('lib/php/foreground/elements/contentBox_article.php');
		include_once ('lib/php/foreground/elements/comments.php');
	echo "</div>";
	
	echo "<div class='pageSpacer'></div>";	
	
	echo "<div class='smallBox'>";
		include_once ('lib/php/foreground/elements/loggedInWidget.php');
		include_once ('lib/php/foreground/pieces/postedBy.php');
		echo "<div style='position: relative; z-index: 10;'>";
			generateElement_postedBy($post);
		echo "</div>";
		include_once ('lib/php/foreground/elements/relatedArticles.php');
	echo "</div>";
	
?>