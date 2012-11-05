<?php
	
	function generateElement_comments_custom($currentURL, $numberOfPosts, $width)
	{
		echo '<div style="height:contents;">';
			echo "<div id='fb-root'></div><script src='http://connect.facebook.net/en_US/all.js#xfbml=1'></script><fb:comments href='$currentURL' num_posts='$numberOfPosts' width='$width'></fb:comments>";
		echo '</div>';
		
	}

?>