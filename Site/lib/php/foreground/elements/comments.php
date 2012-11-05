<?php
	
	function generateElement_comments()
	{
		$pageURL 	= currentPageURL();
		
		$explodeURL = explode("&", $pageURL, 2);
		$commentURL = $explodeURL[0];
				
		$id = $_GET['id'];
		
		echo '<div class="medBox" style="height:contents;">';
			
			echo "<div class='header' style='margin-bottom: 5px;'>";
			    
			    echo "<div class='title unselectableWithDefault'>";
			    	echo "leave a comment / tag a friend";
			    echo "</div>";
			    
			    echo "<div class='thinLine' style='background: #D8DFEA;'></div>";
			    
			echo "</div>";
			
			echo "<div id='fb-root'></div><script src='http://connect.facebook.net/en_US/all.js#xfbml=1'></script><fb:comments href='$commentURL' num_posts='5' width='630'></fb:comments>";
		echo '</div>';
		
	}
		
	generateElement_comments();

?>