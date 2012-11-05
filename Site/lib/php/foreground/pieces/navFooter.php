<?php
	
	function generatePiece_navFooter()
	{		
		$source = getSources();
		
		echo "<div class='navFooterContainer' style='background-image: url(" . $source['footerBG'] . ")'>";
			
			echo "<div class='border' style='background-image: url(" . $source['footerBorder'] . ")'></div>";
		
			echo "<div class='pageContainer navFooter'>";
			
				echo "<div class='largeBox footerElementHolder'>";
					generatePiece_navFooter_siteInfo();
						generatePiece_navFooter_footerSpacer();
					generatePiece_navFooter_popularArticles();
						generatePiece_navFooter_footerSpacer();
					generatePiece_navFooter_upcomingEvents();
						generatePiece_navFooter_footerSpacer();
					generatePiece_navFooter_contactUs();		
				echo "</div>";
				
			echo "</div>";
		
		echo "</div>";
		
		
	}
	
		function generatePiece_navFooter_footerSpacer()
		{
			echo "<div class='footerSpacer'></div>";
		}
		
		function generatePiece_navFooter_siteInfo()
		{
			echo "<div class='footerBox unselectableWithPointer'>";
				
				generatePiece_navHeader_logo();
				
				echo "<div style='width: 145px; margin-top: 5px;'>";
					echo "<a class='siteLinks' href='index.php'>home</a> <a class='siteLinks'>|</a> <a href='calendar.php' class='siteLinks'>events</a> <a class='siteLinks'>|</a class='siteLinks'> <a href='explore.php' class='siteLinks'>explore</a>";
					echo "<div class='thinLine' style='width: 140px;'></div>";
					echo "<a href='buzz.php' class='siteLinks'>buzz</a> <a class='siteLinks'>|</a> <a href='privacy.php' class='siteLinks'>privacy policy</a>";
				echo "</div>";
				
			echo "</div>";
			
		}
		
		function generatePiece_navFooter_upcomingEvents()
		{
			$includedTypes['event']		= 1;
			$postList					= getPosts(6, $includedTypes);
			
			generateFotterPostList($postList, "upcoming events");		
		}
		
		function generatePiece_navFooter_popularArticles()
		{
			$includedTypes['photo']		= 1;
			$includedTypes['article']	= 1;
			$includedTypes['video']		= 1;
			$postList					= getPosts(6, $includedTypes);
			
			generateFotterPostList($postList, "recent posts");		
		}
		
			function generateFotterPostList($postList, $header)
			{
				echo "<div class='footerBox popularArticlesBox'>";
				
					echo "<div class='title'>";
						echo "$header";
					echo "</div>";
					
					echo "<div class='thinLine'></div>";
					
					echo "<div>";
					
						for ($i=0; $i<=5; $i++) {
						
							if($postList[$i]['type'] == 'event')
							{
								$postLink	= "event.php?id=";
								$postLink  .= $postList[$i]['postFacebookID'];
							}
							else if($postList[$i]['type'] == 'article')
							{
								$postLink	= "article.php?id=";
								$postLink  .= $postList[$i]['postCampusBubbleID'];
							}
							else if($postList[$i]['type'] == 'photo')
							{
								$postLink	= "photo.php?id=";
								$postLink  .= $postList[$i]['postFacebookID'];
							}
							else if($postList[$i]['type'] == 'video')
							{
								$postLink	= "video.php?id=";
								$postLink  .= $postList[$i]['postYouTubeID'];
							}
							
							echo "<a class='popularArticles crop2' style='display: block; cursor: pointer;' style='height: 10px; ' href='$postLink'>";
								echo $postList[$i]['name'];
							echo "</a>";
						}
						
					echo "</div>";
				
				echo "</div>";
			}
		
		function generatePiece_navFooter_recentComments()
		{
			global $post;
			
			echo "<div class='footerBox popularArticlesBox'>";
			
				echo "<div class='title'>";
					echo "recent comments";
				echo "</div>";

				echo "<div class='recentComments'>";
				
					echo "<div class='thinLine'></div>";
					
					for ($i=0; $i<=3; $i++)
					{
							 if ($i == 0) echo "<div class='footerComment0'>";
						else if ($i == 1) echo "<div class='footerComment1'>";
						else if ($i == 2) echo "<div class='footerComment2'>";
						else if ($i == 3) echo "<div class='footerComment3'>";
						
							echo "<div class='commentBubble'>";
								echo ' "Recent comment recent comment..." ';
							echo "</div>";
							
						echo "</div>";
					}
					
				echo "</div>";
			
			echo "</div>";
		}
		
		function generatePiece_navFooter_contactUs()
		{
			echo "<div class='footerBox contactUsBox'>";
			
				echo "<div class='title'>";
					echo "contact us";
				echo "</div>";
				
				echo "<div class='thinLine'></div>";
				
				echo "<div class='contactUs'>";
				
					echo "<form name='htmlform' method='post' action='feedback.php'>";
					
						echo "<input type='text' name='first_name' maxlength='50' value='NAME' class='contactField topField1'>";
						
						echo "<input type='text' name='email' maxlength='80' value='EMAIL' class='contactField topField2'>";
						
						echo "<textarea name='comments' maxlength='1000' class='contactField bottomField' style='resize: none; overflow: hidden; overflow-y: hidden; overflow-x: hidden;'>SEND US FEEDBACK, QUESTIONS, COMMENTS, ETC.</textarea>";
						
						echo "<input type='submit' value='submit' class='submitButton'>";
					
					echo "</form>";
					
				echo "</div>";
			
			echo "</div>";
		}
		
	generatePiece_navFooter();
	
?>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-26105700-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>