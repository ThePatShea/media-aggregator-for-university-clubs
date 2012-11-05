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
					echo "<error>No posts yet.</error>";
			}
			
			if ($existingPosts[$i] == 'false')
			{
				$existingPosts[$i] = 'true';
				break;
			}
			
			generatePiece_PostTeaser($i, $postList);
		}
	}
		echo "<meta>";
		function generatePiece_PostTeaser($i, $postList)
		{
			echo "</meta>";
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
			
					
	
			
			echo "<post>";
					
					echo "<postType>";
					echo $postList[$i]['type'];	
					echo "</postType>";

					echo "<postDate>";
					echo date( "m/d", $postTimestamp );
					echo "</postDate>";
							
					echo "<postName>";
					echo $postName;						
					echo "</postName>";

					echo "<postLink>";
					echo $postLink;
					echo "</postLink>";

					echo "<postAuthor>";
					echo $postAuthor;
					echo "</postAuthor>";

					echo "<postAuthorLink>";
					echo $authorLink;
					echo "</postAuthorLink>";

					if ($postList[$i]['type']	== 'photo')
					{
						echo "<postImageSRC>";
						echo $postimage;
						echo "</postImageSRC>";

					} 
					else if ($postList[$i]['type'] == 'event')
					{	
						echo "<postImageSRC>";
						echo $postimage;
						echo "</postImageSRC>";
						echo $postText;
						echo "</postText>";
					}

					else if ($postList[$i]['type'] == 'video')
					{
						echo "<postImageSRC>";
						echo $postimage;
						echo "</postImageSRC>";
					} 

					else if ($postList[$i]['type'] == 'article')
					{
						echo "<postText>";
						echo $postText;
						echo "</postText>";
					}

					echo "</post> \n";
				
		}
		
?>

  
  
