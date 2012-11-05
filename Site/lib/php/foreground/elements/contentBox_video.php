<?php
	
	echo "<div class='medBox'>";
		include_once ('lib/php/foreground/elements/singlePageHeader_video.php');
		include_once ('lib/php/foreground/pieces/videoPlayer.php');
		include_once ('lib/php/foreground/pieces/postDescription.php');
		generatePiece_postDescription($post, 'video');
		include_once ('lib/php/foreground/pieces/facebookLikes.php');
		echo "<div style='position: relative; top: -90px'>";
			generatePiece_FacebookLikes($post[0]['accountFacebookID']);
		echo "</div>";
	echo "</div>";
	
?>