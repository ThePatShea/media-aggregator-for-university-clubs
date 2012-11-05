<?php

	echo "<div class='medBox'>";
		include_once ('lib/php/foreground/elements/singlePageHeader_event.php');
		include_once ('lib/php/foreground/pieces/facebookLikes.php');
		generatePiece_FacebookLikes($post[0]['accountFacebookID']);
	echo "</div>";
	
?>