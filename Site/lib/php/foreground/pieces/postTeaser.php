<?php

	function generatePiece_PostTeaserList($numberOfPosts, $includedTypes, $includedCategories, $selectedOrganization = 'all', $startingRow = 0, $search = 0, $postsFeaturing = 0)
	{	
		global $existingPosts;
				
		if ($includedCategories == "")
		{
			$includedCategories = 'all';
		}
		
		if ($selectedOrganization == 'all')
		{
			$postList = getPosts($numberOfPosts, $includedTypes, $includedCategories, 'all', $startingRow, $search, $postsFeaturing);
		}
		else
		{
			$postList = getPosts($numberOfPosts, $includedTypes, $includedCategories, $selectedOrganization, $startingRow, $search, $postsFeaturing);
		}
				
		for ($i = 0; $i <= $numberOfPosts - 1; $i++)
		{
			if ($existingPosts[0] == 'false')
			{
				echo "<div style='font-family: Lucida Grande; font-size: 11px; color: #33464C; padding-left: 25px; padding-bottom: 25px; padding-top: 10px; margin-top: 5px; width: 605px; border-top: 1px solid #D7DFE3;'>";
					echo "No posts yet.";
				echo "</div>";
			}
			
			if ($existingPosts[$i] == 'false')
			{
				$existingPosts[$i] = 'true';
				break;
			}
			
			generatePiece_PostTeaser($i, $postList);
		}
	}
	
		function generatePiece_PostTeaser($i, $postList)
		{
			$postType			= $postList[$i]['type'];
			$postCategory		= $postList[$i]['category'];
			$postLink			= $postList[$i]['link'];
			$accountID			= $postList[$i]['accountFacebookID'];
			
			$accountInfo		= generateQueryArray("SELECT accountType FROM users WHERE facebookID = $accountID");
			
			if ($accountInfo[0]['accountType'] == 'organization')
			{
				$authorLink = "organization.php?id=";
			}
			else
			{
				$authorLink = "user.php?id=";
			}
			
			$authorLink .= "$accountID";
			
			
			if ($postList[$i]['type'] == 'event')
			{				
				$postName		= $postList[$i]['name'];
				$postTimestamp	= $postList[$i]['start_time'];
				$postAuthor		= $postList[$i]['accountName'];
				$postText		= $postList[$i]['description'];
				$postImage		= $postList[$i]['image'];
			}
			else if ($postList[$i]['type'] == 'photo')
			{				
				$postName		= $postList[$i]['name'];
				$postAuthor 	= $postList[$i]['accountName'];
				$postTimestamp	= strtotime($postList[$i]['created_time']);
				
				$postLink		= 'photo.php?id=';
				$postLink	   .= $postList[$i]['postFacebookID'];
				
				$photoInfo		= generateQueryArray("SELECT source FROM photos WHERE albumID = ". $postList[$i]['postFacebookID'] ." LIMIT 1");				
				$postImage		= $photoInfo[0]['source'];
				
			}
			else if ($postList[$i]['type'] == 'article')
			{				
				$postName 		= $postList[$i]['name'];
				$postAuthor 	= $postList[$i]['accountName'];
				$postText		= $postList[$i]['description'];
				$postTimestamp	= strtotime($postList[$i]['created_time']);
			}
			else if ($postList[$i]['type'] == 'video')
			{
				$postName		= $postList[$i]['name'];
				$postTimestamp	= $postList[$i]['created_time'];
				$postAuthor		= $postList[$i]['accountName'];
				$postText		= $postList[$i]['description'];
				$postImage		= $postList[$i]['image'];
			}
			
			echo "<div class='smallBox postTeaser' style='margin:7px; border-top: 1px solid #D7DFE3; padding-top: 15px;'>";
			
				echo "<div style='display: inline-block; vertical-align: top;'>";
					
					echo "<div>";
						generatePiece_categoryBox($postCategory, $postType);
					echo "</div>";
					
					echo "<div style='margin-left: 6px; margin-bottom: 3px;'>";
						//generatePiece_icon(_commentBubble_1);
					echo "</div>";
					
					echo "<div class='postDate' style='margin-left: 4px; font-weight: bold; font-family: Lucida Grande;'>";
						echo date( "m/d", $postTimestamp );
					echo "</div>";
							
				echo "</div>";
				
				echo "<div style='width: 1px; height: 20px; background: #BECFD7; margin-left: 10px; margin-right: 10px; margin-top: 5px; display: inline-block; vertical-align: top;'></div>";
				
				echo "<div style='display: inline-block; vertical-align: top;'>";
				
					echo "<a class='postName' href='$postLink' style='text-transform: capitalize; font-family: Lucida Grande; font-size: 14px; color: #33464C; display: block; margin-bottom: 3px; width: 240px;'>";
						echo $postName;						
					echo "</a>";
					
					echo "<a class='authorLink' href='$authorLink' style='font-family: museosans500; text-transform: uppercase; font-size: 11px; color: #7892A3; display: block; width: 240px; height: 25px;'>";
						echo $postAuthor;
					echo "</a>";
				
					if ($postList[$i]['type']	== 'photo')
					{
						echo "<a href='" . $postLink ."'>";
							
							echo "<div class='crop' style='height:156px'>";
								echo "<img style='width:240px; border-radius: 4px; -moz-border-radius: 4px;' src='$postImage'>";
							echo "</div>";
							
							echo "<div class='postTeaserTypeIcon'>";
							
								echo "<div style='margin-left: 16px; margin-top: 7px;'>";
									generatePiece_icon(_postPhoto);
								echo "</div>";
								
								echo "<div style='position: absolute; top: 25px; width: 50px; text-align: center;'>";
									echo "photo";
								echo "</div>";
									
							echo "</div>";
							
						echo "</a>";
					} 
					else if ($postList[$i]['type'] == 'event')
					{
						echo "<div style='display:inline-block; width: 200px;'>";
						
							echo "<a href='" . $postLink ."'>";
								echo "<div class='crop'>";
									echo "<img style='width:240px;' src='$postImage'>";
								echo "</div>";
								
								echo "<div class='postTeaserTypeIcon' style='top: 14px;'>";
								
									echo "<div style='margin-left: 18px; margin-top: 6px;'>";
										generatePiece_icon(_postEvent);
									echo "</div>";
									
									echo "<div style='position: absolute; top: 26px; width: 50px; text-align: center;'>";
										echo "event";
									echo "</div>";
										
								echo "</div>";
								
								echo "<div class='crop' style='font-family: Lucida Grande; font-size: 11px; color: #33464C; width:240px; line-height: 22px;'>";
									echo "<div>";
										echo $postText;
									echo "</div>";
								echo "</div>";
								
							echo "</a>";
														
						echo "</div>";
					} 
					else if ($postList[$i]['type'] == 'video')
					{
						echo "<a href='" . $postLink ."'>";
							echo "<div class='crop' style='height:156px;'>";
								echo "<img style='width:300px; border-radius: 4px; -moz-border-radius: 4px; top: -30px; left: -30px;' src='$postImage'>";
							echo "</div>";
							
							echo "<div class='postTeaserTypeIcon'>";
							
								echo "<div style='margin-left: 18px; margin-top: 5px;'>";
									generatePiece_icon(_postVideo);
								echo "</div>";
								
								echo "<div style='position: absolute; top: 27px; width: 50px; text-align: center;'>";
									echo "video";
								echo "</div>";
									
							echo "</div>";
							
						echo "</a>";
					} 
					else if ($postList[$i]['type'] == 'article')
					{
						echo "<div class='crop' style='width:240px; height: 135px;'>";
							echo "<a style='font-family: Lucida Grande; font-size: 11px; color: #33464C;  line-height: 22px;' href='" . $postLink ."'>";
								echo $postText;
							echo "</a>";
						echo "</div>";
					}
				
				echo "</div>";
			
			echo "</div>";
		}
		
?>

  
  