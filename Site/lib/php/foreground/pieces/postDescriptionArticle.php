<?php	
	function generatePiece_postDescription($post, $type)
	{				
		$postText	    = $post[0]['description'];
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
		
		
		echo 
		"<div class='videoDescription' style='position: relative; top: -25px;'>
		
		 	<div class='topLine' style='width: 630px; padding-top: 10px; padding-bottom: 10px; border-top: 1px solid #E2E9ED; border-bottom: 1px solid #E2E9ED; '>
		 	
		 		<div class='presenterStatic'>author:</div>
		 		<a href='$authorLink' id='postAuthorID' class='presenterDynamic author'>$postAuthor</a>
		 		
		 		<div class='spacer'></div>
		 		
		 		<div class='presenterStatic'>date posted:</div>
		 		<div id='postTagsID' class='presenterDynamic'>$postDate</div>
		 	";
		 	
		 	echo "</div>";
			
			if ($type == 'article' && $postImage)
			{
				echo "<img style='float: left; display: inline; border: 5px solid #E2E9ED; max-width: 350px; margin-right: 10px; position: relative; top: 5px;' src='$postImage'>";
			}
			
			echo "<div class='videoText' style='display: inline;'>";
				echo $postText;
			echo "</div>";
			
			
						 			
		 echo	
		 	"
		 </div>
		";
		
	}	
	
?>