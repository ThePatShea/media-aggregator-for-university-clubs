<?php

	function generateElement_postTeaser_organization($organizationID)
	{
		$organizationInfo = generateQueryArray("SELECT name FROM users WHERE facebookID = $organizationID");
		$organizationName = $organizationInfo[0]['name'];
				
		$currentTime = time();
		$eventList = generateQueryArray("SELECT * FROM events WHERE start_time > $currentTime AND accountFacebookID = $organizationID");
		
		if ($eventList)
		{
			$includedTypes['event']			= 1;
			$numberOfPosts = 4;
			generatePiece_teaserBlockHeader("upcoming events by $organizationName", "view all", "archive.php?event=1&organization=$organizationID&header=view all upcoming events by $organizationName");
			generatePiece_PostTeaserList($numberOfPosts, $includedTypes, $includedCategories, $organizationID);
		}
		
		$includedTypes['article']		= 1;
		$includedTypes['photo']			= 1;
		$includedTypes['video']			= 1;
		$includedTypes['event']			= 0;
		$numberOfPosts = 6;
		generatePiece_teaserBlockHeader("posts by $organizationName", "view all", "archive.php?article=1&photo=1&video=1&organization=$organizationID&header=view all posts by $organizationName");
		generatePiece_PostTeaserList($numberOfPosts, $includedTypes, $includedCategories, $organizationID);
	}
	
?>