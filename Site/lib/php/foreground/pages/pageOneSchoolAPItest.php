<?php

	echo "<div class='largeBox'>";
	
		$className = $HTTP_POST_VARS['class1name'];
		include ('lib/php/foreground/elements/postTeaser_oneSchool1.php');
		
		$className = $HTTP_POST_VARS['class2name'];
		include ('lib/php/foreground/elements/postTeaser_oneSchool2.php');
		
		$className = $HTTP_POST_VARS['class3name'];
		//include ('lib/php/foreground/elements/postTeaser_oneSchool3.php');
		
		$className = $HTTP_POST_VARS['class4name'];
		//include ('lib/php/foreground/elements/postTeaser_oneSchool4.php');
		
	echo "</div>";
	
?>