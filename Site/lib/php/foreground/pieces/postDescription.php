<?php	
	function generatePiece_postDescription($post, $type)
	{				
		$postText		= "<br>";
		$postText	   .= $post[0]['description'];
		$postImage		= $post[0]['image'];
		$postAuthor		= $post[0]['accountName'];
		$accountID		= $post[0]['accountFacebookID'];
		
		$accountInfo	= generateQueryArray("SELECT accountType FROM users WHERE facebookID = $accountID");
		
		if ($accountInfo[0]['accountType'] == 'organization')
		{
			$authorLink = "organization.php?id=";
		}
		else
		{
			$authorLink = "user.php?id=";
		}
		
		$authorLink .= "$accountID";
		
		
		if ($type == 'article')
		{
			$postDate	= date( "F j, Y", strtotime($post[0]['created_time']) );
		}
		else if ($type == 'video')
		{
			$postDate	= date( "F j, Y", $post[0]['created_time'] );
		}
		
		if ($type == 'article' && $postImage)
		{
			echo 
			"
				<div class='crop' style='border: 5px solid #E2E9ED; height: 250px; width: 100%; border-radius: 0; -moz-border-radius: 0;'>
					<img src='$postImage' style='width: 100%; top: -100px;'>
				</div>
			";
		}
		
		echo 
		"<div class='videoDescription'>
		
		 	<div class='topLine'>
		 	
		 		<div class='presenterStatic'>author:</div>
		 		<a href='$authorLink' id='postAuthorID' class='presenterDynamic author'>$postAuthor</a>
		 		
		 		<div class='spacer'></div>
		 		
		 		<div class='presenterStatic'>date posted:</div>
		 		<div id='postTagsID' class='presenterDynamic'>$postDate</div>
		 	";
		 	
			
			if ($type == 'video')
			{
				echo "<pre class='videoText' style='position: relative; top: -70px;'>";
					include_once('lib/php/background/fetchYouTubeData.php');
					printYouTubeDescription($post[0]['postYouTubeID']);
				echo "</pre>";
			}
			else
			{
				echo "<pre class='videoText'>";
					echo $postText;
				echo "</pre>";
			}
		 		 
		 
		echo "</div>";
		 	
		 	
		 	
		 		
		 		
		 			
		 echo	
		 	"
		 </div>
		";
		
	}	
	
?>