<?php

	echo "<div class='smallBox'>";
		include_once ('lib/php/foreground/elements/exploreInfo.php');
		echo '
			<iframe src="exploreWidget1.php" width="110%" height="900px">
			  <p>Your browser does not support iframes.</p>
			</iframe>
		';
	echo "</div>";
	
		echo "<div class='pageSpacer' style='width: 30px;'></div>";
	
	echo "<div class='smallBox'>";
		echo '
			<iframe src="exploreWidget2.php" width="110%" height="1100px">
			  <p>Your browser does not support iframes.</p>
			</iframe>
		';
	echo "</div>";
	
		echo "<div class='pageSpacer' style='width: 30px;'></div>";
	
	echo "<div class='smallBox'>";
		include_once ('lib/php/foreground/pieces/postedBy.php');
		generateElement_featuredOrganization();
		echo '
			<iframe src="exploreWidget3.php" width="110%" height="900px">
			  <p>Your browser does not support iframes.</p>
			</iframe>
		';
	echo "</div>";
	
?>