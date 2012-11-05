<?php

	echo "<div class='medBox'>";
		include_once ('lib/php/foreground/elements/contentBox_organization.php');
		include_once ('lib/php/foreground/elements/comments.php');
	echo "</div>";
	
	echo "<div class='pageSpacer'></div>";	
	
	echo "<div class='smallBox'>";
		include_once ('lib/php/foreground/elements/loggedInWidget.php');
		include_once ('lib/php/foreground/elements/postsFeaturing.php');
		include_once ('lib/php/foreground/elements/organizationWall.php');
	echo "</div>";
	
?>