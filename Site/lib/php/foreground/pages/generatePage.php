<?php
	
	include_once("lib/php/background/allBackground.php");
	
	echo '<meta property="og:image" content="www.emorybubble.com/lib/images/logos/logo1_beta.png"/>';
	
	include_once("lib/php/foreground/pieces/navHeader.php");
	
		echo "<div class='pageContainer contentContainer'>";
		
			include_once("lib/php/foreground/pages/". $pageName .".php");
		
		echo "</div>";
	
	include_once("lib/php/foreground/pieces/navFooter.php");
	
?>
