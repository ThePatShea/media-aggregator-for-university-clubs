<?php
	
	echo "<div class='medBox'>";
		include_once ('lib/php/foreground/elements/singlePageHeader_photo.php');
		include_once ('lib/php/foreground/pieces/photoAlbumBox.php');
		include_once ('lib/php/foreground/pieces/facebookLikes.php');
		generatePiece_FacebookLikes($post[0]['accountFacebookID']);
	echo "</div>";
	
?>