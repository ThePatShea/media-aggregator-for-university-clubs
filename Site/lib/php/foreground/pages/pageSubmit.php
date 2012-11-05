<?php

	$submitType = $_GET['type'];

	echo "<div class='smallBox' style='position: relative; left: -10px;'>";
		
		echo "<div style='position: relative; top: 20px'>";
			include_once ('lib/php/foreground/elements/ribbonTop_administration.php');
		echo "</div>";
		
		echo "<div>";
			include_once ('lib/php/foreground/elements/ribbonSubmit.php');
		echo "</div>";
		
	echo "</div>";
	
	echo "<div class='pageSpacer'></div>";
	
	echo "<div class='medBox' style='margin-left: -8px;'>";
		echo "
			<iframe src='lib/php/foreground/elements/submit/submitMain.php?submitType=$submitType' width='645px' height='630px'>
			  <p>Your browser does not support iframes.</p>
			</iframe>
		";
	echo "</div>";		
	
?>