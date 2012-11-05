<?php

	echo "<div class='medBox'>";
		include_once ('lib/php/foreground/elements/contentBox_user.php');
		echo "<div style='margin-top: 40px;'>";
			include_once ('lib/php/foreground/elements/comments.php');
		echo "</div>";
	echo "</div>";
	
	echo "<div class='pageSpacer'></div>";	
	
	echo "<div class='smallBox'>";
		include_once ('lib/php/foreground/elements/loggedInWidget.php');
		include_once ('lib/php/foreground/elements/postsFeaturing.php');
		include_once ('lib/php/foreground/elements/userLikedOrganizations.php');
	echo "</div>";
	
?>