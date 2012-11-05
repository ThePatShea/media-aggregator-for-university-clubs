<?php
	echo '<link rel="canonical" href="http://emorybubble.com/guidebook.php"/>
<meta property="og:title" content="Emory Bubble Walkthrough"/>
<meta property="og:type" content="website"/>
<meta property="og:url" content="http://emorybubble.com/guidebook.php"/>
<meta property="og:image" content="www.emorybubble.com/lib/images/logos/logo1_beta.png"/>
<meta property="og:site_name" content="Begin Exploring the Emory Bubble"/>
<meta property="og:description" content="Emory Bubble step by step feature walkthrough. Explore the amazing features. The more time you spend on Emory Bubble, the more features you will discover."/>';	

	echo "<div class='medBox'>";
		include_once ('lib/php/foreground/elements/guidebook/guidebook.php');
	echo "</div>";
	
	echo "<div class='pageSpacer'></div>";	
	
	echo "<div class='smallBox'>";
		include_once ('lib/php/foreground/pieces/postedBy.php');
		generateElement_featuredOrganization_standard();
		include_once ('lib/php/foreground/elements/socialMedia.php');
	echo "</div>";
	
?>
