<?php

	include_once ('lib/php/foreground/pieces/ribbon.php');
	
	echo "<div class='smallBox'>";
	
		if ($submitType == "post")
			generatePiece_ribbonHeader("making a post");
		if ($submitType == "event")
			generatePiece_ribbonHeader("creating an event");
		
		echo "<div class='ribbon' style='width: 288px;'>";
		
			echo "<div style='padding: 20px; border-bottom: 1px solid #B7C8D2; height: 275px;' class='ribbonText'>";
				
				if ($submitType == "post")
				{
					echo "Anyone can make a post on The Emory Bubble. You can write an article, upload a video, or upload a photo gallery. Your post will also be uploaded to any external sites that you have connected to your Emory Bubble account. Your videos will be uploaded to your YouTube channel, your photos to your Facebook page, and your articles to all of your connected blog sites.";
				}
				else if ($submitType == "event")
				{
					echo "Anyone can create an event on the Emory Bubble. You can specify the time of the event and include any additional information you'd like your potential guests to see. Any event you post on the Emory Bubble will also be posted to your Facebook page.";
				}
				
			echo "</div>";
			
			echo "<div class='ribbonFooterBlank'></div>";
				
		echo "</div>";
		
	echo "</div>";
	
?>