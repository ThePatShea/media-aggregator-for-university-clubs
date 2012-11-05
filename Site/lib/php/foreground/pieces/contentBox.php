<!-- CONTENT BOX - PHOTO -->
	

<!-- CONTENT BOX - USER PROFILE -->
	<?php
		function generatePiece_userInfoBox()
		{
			global $facebook;
			
			$fqlQuery	= "SELECT name,pic_big FROM user WHERE uid=681701524 ";
			$response	= $facebook->api(array('method' => 'fql.query','query' =>$fqlQuery));
			print_r($response);
		}
		
	?>

<!-- CONTENT BOX - ORGANIZATION PROFILE -->
	<?php
		function generatePiece_organizationInfoBox()
		{
			global $facebook;
			
			$fqlQuery	= "SELECT name,description,categories,pic_square,pic_large,fan_count,type,website FROM page WHERE page_id=132765608557 ";
			$response	= $facebook->api(array('method' => 'fql.query','query' =>$fqlQuery));
			print_r($response);
		}
		
	?>

<!-- CONTENT BOX - VIDEO --> 
	<?php
		function generatePiece_videoPlayer()
		{
			global $post;
			$i = 1;
			
			$videoURL = 'http://www.youtube.com/watch?v=';
			$videoURL .= $_GET['youtubeID'];
			$videoURL .= "&autostart=true";
												
			global $nextVideo;
																		
			include("includes/videoPlayer.php");
		}
	?>	

<!-- CONTENT BOX - POST DESCRIPTION -->
	<?php	
		function generatePiece_postDescription()
		{
			$typeName = $_GET['typeName'];
			global $facebook;
			
			if ($typeName == 'article')
			{
				$facebookID = $_GET['facebookID'];
				global $articleInfo;
				$articleInfo = $facebook->api($facebookID);
			}
												
			if ($typeName == 'video')
			{
				global $post;
				$i = 1;
				
				$postText = $post[$i]['postText'];
				$postTags = $post[$i]['postTags'];
				$userName = getUserName($i);
				$postAuthor = $userName;
				
				echo 
				"<div class='videoDescription'>
				
				 	<div class='topLine'>
				 	
				 		<div class='presenterStatic'>author:</div>
				 		<div id='postAuthorID' class='presenterDynamic author'>$postAuthor</div>
				 		
				 		<div class='spacer'></div>
				 		
				 		<div class='presenterStatic'>tags:</div>
				 		<div id='postTagsID' class='presenterDynamic'>$postTags</div>
				 		 
				 	</div>
				 	
				 	<pre id='postDescriptionID' class='videoText'>
				 		 $postText
				 	</pre>
				 	
				 </div>
				";
			}
			else if ($typeName == 'article')
			{
				global $articleInfo;
				$postText = $articleInfo[message];
				$postAuthor = $articleInfo[message];
				
				echo 
				"<div class='videoDescription'>
				
				 	<pre id='postDescriptionID' class='videoText' style='position: relative; top: -42px; margin-bottom: -60px;'>
				 		 $postText
				 	</pre>
				 	
				 </div>
				";
			}
			
		}
		
	?>
	