<?php

	echo "<div class='smallBox' style='position: relative; left: -10px;'>";
		
		echo "<div style='position: relative; top: 20px'>";
			include_once ('lib/php/foreground/elements/ribbonTop_administration.php');
		echo "</div>";
		
		echo "<div>";
			include_once ('lib/php/foreground/elements/ribbonRegister.php');
		echo "</div>";
		
	echo "</div>";
	
	echo "<div class='pageSpacer'></div>";
	
	echo "<div class='medBox'>";
		include_once ('lib/php/foreground/elements/contentBox_register.php');
	echo "</div>";		
	
?>