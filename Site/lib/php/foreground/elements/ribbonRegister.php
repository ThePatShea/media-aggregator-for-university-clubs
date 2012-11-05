<?php

	include_once ('lib/php/foreground/pieces/ribbon.php');
	
	echo "<div class='smallBox'>";
	
		if ($registerStep == 1 || $registerStep == 2 || $registerStep == 5)
			generatePiece_ribbonHeader("registration");
		if ($registerStep == 3 || $registerStep == 4 || $registerStep == 6)
			generatePiece_ribbonHeader("creating an organization");
		if ($registerStep == 'accounts')
			generatePiece_ribbonHeader("connected accounts");
		
		echo "<div class='ribbon' style='width: 288px;'>";
		
			echo "<div style='padding: 20px; border-bottom: 1px solid #B7C8D2; height: 275px;' class='ribbonText'>";
				
				if ($registerStep == 1 || $registerStep == 2  || $registerStep == 5)
				{
					echo "Signing up for The Emory Bubble is quick and easy. All you need to do is connect your Facebook account, and you'll be ready to start posting. From there, you can also connect your Emory Bubble profile to your accounts on other sites. This allows you to sync your YouTube videos, blog posts, and more.";
				}
				else if ($registerStep == 3 || $registerStep == 4 || $registerStep == 6)
				{
					echo "Creating an organization on The Emory Bubble is simple. All you need to do is connect with an existing Facebook page, and you'll be ready to start posting. From there, you can also connect your Emory Bubble organization to your group's accounts on other sites. This allows you to sync your organization's YouTube videos, blog posts, and more.";
				}
				else if ($registerStep == 'accounts')
				{
					echo "As a user of the Emory Bubble, you an come to this page at any time to connect your profile with your accounts on other sites.";
				}
				
			echo "</div>";
			
			echo "<div class='ribbonFooterBlank'></div>";
				
		echo "</div>";
		
	echo "</div>";
?>