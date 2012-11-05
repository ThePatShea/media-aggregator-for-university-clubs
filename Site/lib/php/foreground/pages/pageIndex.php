<?php

	echo "<div style='position: relative; top: -15px;'>";
	
		echo "<div class='medBox'>";
			include_once ('lib/php/foreground/elements/contentSelector.php');
			include_once ('lib/php/foreground/elements/postTeaser_index.php');
		echo "</div>";
		
		echo "<div class='pageSpacer'></div>";
		
		echo "<div class='smallBox'>";
			echo "<div style='margin-bottom: 5px;'>";
				include_once ('lib/php/foreground/elements/loggedInWidget.php');
			echo "</div>";
			echo "<div style='margin-top: 5px; margin-bottom: 5px;'>";
				include_once ('lib/php/foreground/elements/eventAccordion.php');
			echo "</div>";
			echo "<div style='margin-top: 15px;'>";
				include_once ('lib/php/foreground/elements/socialMedia.php');
			echo "</div>";
		echo "</div>";
		
	echo "</div>";
	
?>