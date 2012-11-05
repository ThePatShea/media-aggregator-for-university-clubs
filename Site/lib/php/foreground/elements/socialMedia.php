<?php
	function generateElement_socialMedia()
	{								
		
		echo "<div class='smallBox'>";
		
			generatePiece_header("social media");
		
			echo "<div class='socialMedia'>";
				
				echo "<div class='socialMediaHider1'></div>";
				
				echo "<div style='background: white'>";
					echo '<iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FEmory-Bubble%2F165935203470656&amp;width=270&amp;colorscheme=light&amp;show_faces=true&amp;border_color=%23668BA2&amp;stream=false&amp;header=false&amp;height=340" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:270px; height:340px;" allowTransparency="true"></iframe>';
				echo "</div>";
				
				echo "<div class='socialMediaHider2'></div>";
				
			echo "</div>";
			
		echo "</div>";
		
		
		
	}
	
	generateElement_socialMedia();

?>