<?php
		
	function generatePiece_singlePageHeader($pageType, $postInfo = 0)
	{
		echo "<div class='medBox'>";
		
			if ($pageType == "photo")
			{
				$postName = $postInfo[0]['name'];
				$postLongDate = date( "l, F j, Y", strtotime($postInfo[0]['created_time']) );
				
				echo 
				"<div class='singlePageHeaderPost'>
				
					 <div class='leftSection'>
				";
						generatePiece_categoryBox($postInfo['category'], 'photo');
					
				echo "</div>";
				
					echo   
					"<div class='mainSection'>
						
							<div id='postNameID' class='postName textFit' style='width: 525px'>
								<span>
									$postName
								</span>
							</div>
							
							
							
							<div class='thinLine'></div>
							
							<div id='postLongDateID' class='postLongDate'>
								$postLongDate
							</div>
																			
					 </div>
				<!--
					 <div class='rightSection'>
					 
						 <div class='facebookContainer'>
						 
						 	<div class='likeButtonContainer'>
						 										
						 		<div class='likeButton'>
						 			<div id='fb-root'></div><script src='http://connect.facebook.net/en_US/all.js#appId=202394603150082&amp;xfbml=1'></script><fb:like href='http://www.example.com' send='false' layout='button_count' width='100' show_faces='false' action='like' font='lucida grande'></fb:like>
						 		</div>
						 		
						 		<div class='hider'></div>
						 		
						 	</div>
						 	
						 	<div class='sendButtonContainer'>
						 	
						 		<div id='fb-root'></div><script src='http://connect.facebook.net/en_US/all.js#xfbml=1'></script><fb:send href='example.com' font='lucida grande'></fb:send>
						 	
						 	</div>
						 
						 </div>
					 
					 </div>
				-->
				</div>
				 
				";
			}
			else if ($pageType == "video")
			{
				$postName = $postInfo[0]['name'];
				$postLongDate = date( "l, F j, Y", $postInfo[0]['created_time'] );
				
				echo 
				"<div class='singlePageHeaderPost'>
				
					 <div class='leftSection'>
				";
						generatePiece_categoryBox($postInfo['category'], 'video');
					
				echo "</div>";
				
					echo   
					"<div class='mainSection'>
						
							<div id='postNameID' class='postName textFit' style='width: 525px'>
								<span>
									$postName
								</span>
							</div>
							
							<div class='thinLine'></div>
							
							<div id='postLongDateID' class='postLongDate'>
								$postLongDate
							</div>
																			
					 </div>
				<!--
					 <div class='rightSection'>
					 
						 <div class='facebookContainer'>
						 
						 	<div class='likeButtonContainer'>
						 									
						 		<div class='likeButton'>
						 			<div id='fb-root'></div><script src='http://connect.facebook.net/en_US/all.js#appId=202394603150082&amp;xfbml=1'></script><fb:like href='http://www.example.com' send='false' layout='button_count' width='100' show_faces='false' action='like' font='lucida grande'></fb:like>
						 		</div>
						 
						 		<div class='hider'></div>
						 		
						 	</div>
						 	
						 	<div class='sendButtonContainer'>
						 	
						 		<div id='fb-root'></div><script src='http://connect.facebook.net/en_US/all.js#xfbml=1'></script><fb:send href='example.com' font='lucida grande'></fb:send>
						 	
						 	</div>
						 
						 </div>
					 
					 </div>
				-->
				</div>
				 
				";
			}
			else if ($pageType == "article")
			{
				$postName = $postInfo[0]['name'];
				$postLongDate = date( "l, F j, Y", strtotime($postInfo[0]['created_time']) );
				
				echo 
				"<div class='singlePageHeaderPost'>
				
					 <div class='leftSection'>
				";
						
						generatePiece_categoryBox($postInfo['category'], 'article');
					
				echo "</div>";
				
					echo   
					"<div class='mainSection'>
						
							<div class='postName textFit' style='width: 525px'>
								<span>
									$postName
								</span>
							</div>
							
							
							
							<div class='thinLine'></div>
							
							<div id='postLongDateID' class='postLongDate'>
								$postLongDate
							</div>
																			
					 </div>
				<!--
					 <div class='rightSection'>
					 
						 <div class='facebookContainer'>
						 
						 	<div class='likeButtonContainer'>
						 				
						 		<div class='likeButton'>
						 			<div id='fb-root'></div><script src='http://connect.facebook.net/en_US/all.js#appId=202394603150082&amp;xfbml=1'></script><fb:like href='http://www.example.com' send='false' layout='button_count' width='100' show_faces='false' action='like' font='lucida grande'></fb:like>
						 		</div>
						 	-
						 		<div class='hider'></div>
						 		
						 	</div>
						 	
						 	<div class='sendButtonContainer'>
						 	
						 		<div id='fb-root'></div><script src='http://connect.facebook.net/en_US/all.js#xfbml=1'></script><fb:send href='example.com' font='lucida grande'></fb:send>
						 	
						 	</div>
						 
						 </div>
					 
					 </div>
				-->
				</div>
				 
				";
			}
			else if ($pageType == "event")
			{
				$id = $_GET['id'];
				
				$postGrab  = generateQueryArray("SELECT * FROM events WHERE postFacebookID = '$id' ");
				$post = $postGrab[0];
				
				
				$hostGrab  = generateQueryArray("SELECT name FROM users WHERE facebookID = ".$post['accountFacebookID']." ");
				$host = $hostGrab[0];
								
				$postStartTime	= $post['start_time'];
				$postEndTime	= $post['end_time'];
								
				//$facebook->api("/$id/attending", "post", array("access_token" => "$accessToken"));
				
				echo 
				"<div class='singlePageHeaderPost'>
				
					<a href='#' class='eventInfoLeftBox comingSoonButton' style='position: relative;'>
						
						<span class='comingSoonTooltip' style='position: absolute; top: 75px; left: 75px; z-index: 100;'>
							coming soon
						</span>
							
						<div class='dayAndDateBox'>
							
							<div id='postDayID' class='dayBox'>
								". date( "l", $postStartTime ) ."
							</div>
							
							<div id='postDateID' class='dateBox'>
								". date( "M j, Y", $postStartTime ) ."
							</div>
							
						</div>";
						
						echo "<div class='likeAndMapBox'>";
							
							echo "<div class='likeBox comingSoonButton'>";
								generatePiece_icon(_like);
								echo "like";
							echo "</div>";
							
							echo "<div class='mapBox'>";
								
								generatePiece_icon(_map);
								echo "map";
								
							echo "</div>";
							
						echo "</div>";
							
					  echo "<div class='attendBox'>";
								
								generatePiece_icon(_facebook);
								echo "attend?";
								
					  echo "</div>";
							
							echo "<div class='answerBox'>";
								
								echo "<div class='idkBox'>";
									
									generatePiece_icon(_idk);
									echo "idk";
									
								echo "</div>";
								
								echo "<div class='skipBox'>";
									
									generatePiece_icon(_skip);
									echo "skip";
									
								echo "</div>";
								
								echo "<div class='yesBox'>";
									
									generatePiece_icon(_yes);
									echo "yes";
									
								echo "</div>";
								
							echo "</div>";
						
				echo "</a>";
					
					
			   echo "<div class='thinLineSpacer'></div>
					 
					 <div class='leftSection'>
				";
						generatePiece_categoryBox($postInfo['category'], 'event');
					
					echo   
						"<div class='mainSectionEvent'>
							
								<div id='postNameID' class='postName textFit' style='width: 455px'>
									<span class=''>
										". $post['name'] ."
									</span>
								</div>
								
								<div class='thinLine'></div>
								
								<div id='postLongDateID' class='postLongDate'>
									". date( "l, F j, Y", $postStartTime ) ."
								</div>
								
								<div class='eventInfoBottomBox'>
									
									<div class='presenterStatic'>
										when:
									</div>
									
									<div id='postTimeID' class='presenterDynamicWhen'>
										". date( "l, F j", $postStartTime ) ."
										at
										". date( "g:ia", $postStartTime ) ."
										 - 
										". date( "F j", $postEndTime ) ."
										at
										". date( "g:ia", $postEndTime ) ."
									</div>
									
									<div class='thinLineWhite'></div>
									
									<div class='presenterStatic'>
										where:
									</div>
									
									<div class='presenterDynamic'>
									
										<div id='postLocationID'>". $post['location'] ."</div>
										<div id='postStreetID'>". $post['venue']['street'] ."</div>
										<div id='postCityID'>". $post['venue']['city'] ."</div>
										<div id='postStateID'>". $post['venue']['state'] ."</div>
										
									</div>
									
									<div class='thinLineWhite'></div>
									
									<div class='presenterStatic'>
										host:
									</div>
									
									<div id='postHostID' class='presenterDynamic'>
										". $host['name'] ."
									</div>
										
								 </div>
								
						 </div>
						 												 
					</div>
					
					<div class='thinLine' style='margin-top:10px;'></div>
					
					<pre class='eventDescription'  style=''>
						". "<br>" . $post['description'] ."
					</pre> 
					
					";
					
				echo "</div>";
				
					
			}
			else if ($pageType == "organization")
			{
				global $facebook;
				$organizationName 			= stripslashes($postInfo[0]['name']);
				$organizationBlurb 			= stripslashes($postInfo[0]['blurb']);
				$organizationFacebookID 	= $postInfo[0]['facebookID'];
				$facebookInfo				= $facebook->api("$organizationFacebookID");
				$numberOfLikes				= $facebookInfo['likes'];
				
				if ($numberOfLikes == "")
				{
					$numberOfLikes = 0;
				}
				
				$organizationTotalPosts 	= calculateTotalPosts($organizationFacebookID);
				
				echo 
					"<div class='singlePageHeaderPost singlePageHeaderOrganization'>";
					
					echo   
						"<div class='mainSection' style='width: 620px'>";
							
							echo "<div class='organizationBadgeContainer'>";
							
								include_once ('lib/php/foreground/pieces/organizationBadge.php');
								generatePiece_organizationBadge($postInfo[0]['facebookID']);
							
							echo "</div>";
							
							echo "<div class='thinLineVertical'></div>";
							
						echo
							"<div class='organizationHeaderContainer' style='width: 350px;'>
							
								<div class='organizationName textFit' style='height: 18px;'>
									<span>
										$organizationName
									</span>
								</div>
								
								
								<div class='organizationInfo'>
									<a href='archive.php?article=1&photo=1&video=1&organization=$organizationFacebookID&header=view all posts by $organizationName'>$organizationTotalPosts";
									 
									 if ($organizationTotalPosts != 1)
									 {
									 	echo " posts";
									 }
									 else
									 {
									 	echo " post";
									 }
									 
									 echo "
									 </a>
									<a>|</a>
									<a>$numberOfLikes likes</a>
								</div>
								
							
							</div>
							
						 </div>
																 
				 	</div>
					";
					
					if ($organizationBlurb != "")
					{
						echo "<div class='userProfileText' style='margin-top: 0; margin-bottom: 10px;'>";
							echo $organizationBlurb;
						echo "</div>";
					}
			}
			else if ($pageType == "user")
			{
				global $facebook;
				$userFacebookID 	= $postInfo[0]['facebookID'];
				$userBlurb		 	= stripslashes($postInfo[0]['blurb']);
				$fqlQuery			= "SELECT name,first_name,pic_big FROM user WHERE uid='$userFacebookID' ";
				$facebookInfo		= $facebook->api(array('method' => 'fql.query','query' =>$fqlQuery));
				$userProfilePicture	= $facebookInfo[0]['pic_big'];
				$userTotalPosts 	= calculateTotalPosts($userFacebookID);
				$userName			= $facebookInfo[0]['name'];
				$userFirstName		= $facebookInfo[0]['first_name'];
				
				$userLikes			= $facebook->api("$userFacebookID/likes");
				$numberOfLikes 		= count($userLikes['data']) - 1;
				
				for ($i = 0; $i <= $numberOfLikes; $i++)
				{
					$likesList .= $userLikes[data][$i]['id'];
					
					if ($i < $numberOfLikes)
					{
						$likesList .= ",";
					}
				}
				error_reporting(0);
					$userLikedOrganizations = generateQueryArray("SELECT name,facebookID FROM users WHERE facebookID IN ($likesList)");
				error_reporting(E_ERROR | E_WARNING | E_PARSE);
				
				$totalLikedOrganizations = count($userLikedOrganizations) - 1;
				
						
				echo "<div style='width: 180px; display: inline-block;'>";
					echo "<img src='$userProfilePicture' style='border: 1px solid #BAC9D1; position: relative; z-index: 10; width: 179px; border-bottom: 1px solid white; border-radius-topleft: 4px; -moz-border-radius-topleft: 4px; border-radius-topright: 4px; -moz-border-radius-topright: 4px;'>";
					
					echo "<div class='userProfileButtons'>";
						echo "<a href='#' class='left comingSoonButton' style='position: relative;'>";
							
							echo "
								<span class='comingSoonTooltip' style='position: absolute; top: 30px; left: 50px; z-index: 100;'>
									coming soon
								</span>
							";
							
							echo "<div class='icon'>";
								generatePiece_icon(_contact);
							echo "</div>";
							echo "<div class='label'>";
								echo "contact";
							echo "</div>";
						echo "</a>";
						echo "<a href='#' class='right comingSoonButton' style='position: relative;'>";
							
							echo "
								<span class='comingSoonTooltip' style='position: absolute; top: 30px; left: 50px; z-index: 100;'>
									coming soon
								</span>
							";
							
							echo "<div class='icon'>";
								generatePiece_icon(_rss);
							echo "</div>";
							echo "<div class='label'>";
								echo "subscribe";
							echo "</div>";
						echo "</a>";
					echo "</div>";
				
				echo "</div>";
				
				echo "<div style='width: 450px; display: inline-block; vertical-align: top;'>";
					
					echo "<div style='margin-top: 10px; border-bottom: 1px solid #E2E9ED; height: 45px;'>";
						
						echo "<div style='width: 1px; height: 20px; background: #CFDDE2; margin-left: 12px; margin-right: 12px; margin-top: 5px; display: inline-block; vertical-align: top;'></div>";
						
						echo "<div style='display: inline-block;'>";
							
							echo "<div style='border-bottom: 1px solid #CFDDE2; color: #33464C; font-family: museosans500; font-size: 20px; padding-bottom: 1px;'>";
								echo $userName;
							echo "</div>";
							
							echo "<a class='userNameSubTitle' href='archive.php?article=1&photo=1&video=1&organization=$userFacebookID&header=view all posts by $userName'>";
								echo $userTotalPosts;
								
								if ($userTotalPosts != 1)
								{
									echo " posts";
								}
								else
								{
									echo " post";
								}
							echo "</a>";
							
						echo "</div>";
						
					echo "</div>";
					
					echo "<div class='userProfileText'>";
					
						if ($userBlurb != "")
						{
							echo $userBlurb;
						}
						else
						{
							echo "<div class='userProfilePresenter'>";
								echo "Organizations that $userFirstName likes: ";
							echo "</div>";
							
							if ($userLikedOrganizations)
							{
								for ($i = 0; $i <= $totalLikedOrganizations; $i++)
								{
									$organizationLink  = "organization.php?id=";
									$organizationLink .= $userLikedOrganizations[$i]['facebookID'];
										
									echo "<a href='$organizationLink' style='display: inline;'>";
										echo $userLikedOrganizations[$i]['name'];
									echo "</a>";
									
									if ($i < $totalLikedOrganizations)
									{
										echo ", ";
									}
								}
							}
							else
							{
								echo "$userFirstName does not like any organizations yet.";
							}
						}
					
					echo "</div>";
				
				echo "</div>";
				
				
								
			}
		
		echo "</div>";
	}
?>