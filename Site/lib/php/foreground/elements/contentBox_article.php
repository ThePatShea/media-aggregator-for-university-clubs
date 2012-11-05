<?php
	
	echo "<div class='medBox'>";
		include_once ('lib/php/foreground/elements/singlePageHeader_article.php');
		include_once ('lib/php/foreground/pieces/postDescriptionArticle.php');
		generatePiece_postDescription($post, 'article');
		include_once ('lib/php/foreground/pieces/facebookLikes.php');
		generatePiece_FacebookLikes($post[0]['accountFacebookID']);
	echo "</div>";
	
?>