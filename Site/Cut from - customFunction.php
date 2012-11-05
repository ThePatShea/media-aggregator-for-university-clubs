<!-- SITE FUNCTIONS	-->
	<section>
		
		<!-- BACKGROUND FUNCTIONS -->
			<section>
																		
				<!-- FORMATTERS -->
					<section>
						<?php		
							
								
								//CATEGORY LIST
									global $categoryList;
										$categoryList = array("all", "news", "community", "arts", "entertainment", "politics", "athletics", "academics");
																	
							
							
						
						?>
					</section>

			</section>
								
		<!-- CORE FUNCTIONS -->
			<section>
						
				<!-- PIECES -->
					<section>
						
							
												
						
						<!-- POST LIST AND TEASER -->
							
							<?php
								
									function generatePiece_teaserBlockHeader()
									{
										echo "<div style='display:block'>";
										
											echo "<div style='height: 1px; background: #D7DFE3;margin-top: 10px; margin-bottom: 10px;'></div>";
											
											echo "<div style='line-height: 18px; display: inline-block; margin-left: 15px; color: #39505E; font-family: museosans500; text-transform: uppercase; font-size: 15px;'>";
												echo "spotlight posts";
											echo "</div>";
											
											echo "<div style='line-height: 18px; display: inline-block; float: right; margin-right: 15px; color: #3D5463; font-family: Lucida Grande; text-transform: uppercase; font-size: 10px; font-weight: bold;'>";
												echo "+ what's the buzz?";
											echo "</div>";
										
										echo "</div>";
									}
									
									
									function generatePostList($postlimit, $includedTypes)
									{		
										global $postList;
										global $counterArticle;
											$counterArticle = 1;
										global $includedTypes;
										
										for ( $i = 1; $i <= $postlimit; $i++ )
										{
											for ($j = 1; $j <= 4; $j++)
											{
												if ($i <= $postlimit && $includedTypes[$j] == 1)
												{
													generatePostList_type($i, $j);
													$i++;
												}
											}
											
											$i--;
										}
										
									}
									
										function generatePostList_type($i, $j)
										{
											if ($j == 1)
												generatePostList_photo($i);
											if ($j == 2)
												generatePostList_event($i);
											if ($j == 3)
												generatePostList_video($i);
											if ($j == 4)
												generatePostList_article($i);
										}
										
										function generatePostList_photo($i)
										{
											global $postList;
											global $currentPhotoAuthor;
											global $facebook;
											global $albumRecord;
												global $albumRecordCounter;
											global $connector;
											
											$accountID   = $_GET['accountID'];	
																						
											while (!$displayEvent)
											{
												if ($accountID)
												{
													$currentEventAuthor = $accountID;
												}
												else
												{
													$resultAuthorQuery = $connector->query('SELECT facebookID FROM users WHERE accountType = "organization" ORDER BY rand()');
													$resultAuthor = $connector->fetchArray($resultAuthorQuery);
													
													$currentEventAuthor = $resultAuthor[facebookID];
												}
												
												$fqlQuery	= "SELECT aid,owner,name,created,photo_count FROM album WHERE name != 'Wall Photos' AND name != 'Profile Pictures' AND owner='" . $currentEventAuthor . "' ORDER BY created DESC ";
												$response	 = $facebook->api(array('method' => 'fql.query','query' =>$fqlQuery));
												$dataCounter = 0;
												$currentEvent2 = $response[$dataCounter][aid];
												
												for($j = 0; $j <= $albumRecordCounter; $j++)
												{
													if ($currentEvent2 == $albumRecord[$j])
													{
														$dataCounter++;
														$currentEvent2 = $response[$dataCounter][aid];
														$j = 0;
													}
												}
												
												$displayEvent = $currentEvent2;
												
												if ($accountID)
												{
													if ($displayEvent == "")
													{
														$postExist[$i] = 'false';
														$includedTypes[2] = 0;
													}
													
													break;
												}
											}
											
											$albumRecordCounter++;
											$albumRecord[$albumRecordCounter] = $displayEvent;
											
											
											
											$albumID	= $displayEvent;
											$fqlQuery	= "SELECT src_big FROM photo WHERE aid='$albumID' ";
											$response2	= $facebook->api(array('method' => 'fql.query','query' =>$fqlQuery));
											
											$albumOwner = $response[0][owner];
											$fqlQuery	= "SELECT name from page WHERE page_id = $albumOwner";
											$response3	= $facebook->api(array('method' => 'fql.query','query' =>$fqlQuery));
											
											$postList[$i][typeName]					= 'photo';
											$postList[$i][categoryName]				= 'entertainment';
											
											$postList[$i][postContent][id]			= $response[$dataCounter][aid];
											$postList[$i][postContent][author]		= $response3[0][name];	
											$postList[$i][postContent][name]		= $response[$dataCounter][name];
											$postList[$i][postContent][timestamp]	= $response[$dataCounter][created];
											$postList[$i][postContent][photo_count]	= $response[$dataCounter][photo_count];
											$postList[$i][postContent][image]		= $response2[0][src_big];	
											$postList[$i][postContent][link] 		= "http://thecampusbubble.com/site/pages/page.php?pageType=post&typeName=photo&categoryName=entertainment&facebookID=$albumID";
										}
										
										function getUpcomingEvents($organization)
										{
											global $facebook;
											
											$currentEvent  = $facebook->api("/$organization/events");
											$arrayLength = count($currentEvent['data']);
											
											for ($i = 0; $i <= $arrayLength; $i++)
											{
												$currentEvent['data'][$i]['timestamp'] = strtotime($currentEvent['data'][$i]['end_time']);
												
												if ($currentEvent['data'][$i]['timestamp'] < time() )
												{
													unset($currentEvent['data'][$i]);
												}
											}
											
											return($currentEvent['data']);
										}
										
										function generateQueryArray($query)
										{
											$result = mysql_query($query);
											
											$i = 0;
											
											while ($row = mysql_fetch_array($result))
											{
												$queryArray[$i] = $row;
												$i++;
											}
											return ($queryArray);
										}
										
										function getFacebookID($range)
										{
											if ($range = 'organization')
											{
												$facebookIDList = generateQueryArray("SELECT facebookID FROM users WHERE accountType = 'organization'");
											} else if ($range = 'user')
											{
												$facebookIDList = generateQueryArray("SELECT facebookID FROM users WHERE accountType = 'user'");
											} else if ($range = 'all')
											{
												$facebookIDList = generateQueryArray("SELECT facebookID FROM users");
											}
											
											return $facebookIDList;
										}
										
										function generateUpcomingEventList($organization = 'all', $accountType = 'organization')
										{
											if ($organization == 'all')
											{
												$facebookIDList =  getFacebookID($accountType);
												
												$arraySize = count($facebookIDList) - 1;
												
												for ($i = 0; $i <= $arraySize; $i++)
												{
													$organizationEvents[$i] = getUpcomingEvents($facebookIDList[$i]['facebookID']);
												}
											} 
											else
											{
												$organizationEvents[0] = getUpcomingEvents($organization);
											}
											
											return $organizationEvents;
											
										}
										
										
										function generatePostList_event($i)
										{
											global $postList;
											global $facebook;
											global $eventRecord;
												global $eventRecordCounter;
											global $connector;
											
											global $postExist;
											
											$accountID   = $_GET['accountID'];
											
											//WORKING ON CONVERTING THIS EVENT FUNCTION TO THE GRAPH API. I NEED TO RE-TOOL THE ENTIRE GENERATEPOSTLIST FUNCTION. RIGHT NOW IT IS CALLING EACH sub-function (such as generatePostList_event) more than once. That's very inefficient and doesn't need to happen now that I'm using the graph API
											/*
											if ($accountID)
											{
												$upcomingEvents = generateUpcomingEventList($accountID);
											}
											else
											{
												$upcomingEvents = generateUpcomingEventList('all');
											}
											print_r($upcomingEvents);
											*/
											
											while (!$displayEvent)
											{
												if ($accountID)
												{
													$currentEventAuthor = $accountID;
												}
												else
												{
													$resultAuthorQuery = $connector->query('SELECT facebookID FROM users WHERE accountType = "organization" ORDER BY rand()');
													$resultAuthor = $connector->fetchArray($resultAuthorQuery);
													
													$currentEventAuthor = $resultAuthor[facebookID];
												}
												
												$currentEvent  = $facebook->api("$currentEventAuthor/events");
												$dataCounter = 0;
												$currentEvent2 = $currentEvent[data][$dataCounter][id];
												
												$currentEventTimestamp = strtotime($currentEvent[data][$dataCounter][end_time]) - 10800;
												$currentTime = time();
												
												for($j = 0; $j <= $eventRecordCounter; $j++)
												{
													if ($currentEvent3 == $eventRecord[$j])
													{
														$dataCounter++;
														
														$currentEventTimestamp = strtotime($currentEvent[data][$dataCounter][end_time]) - 10800;
														$currentTime = time();
														
														if ($currentEventTimestamp > $currentTime)
														{
															$currentEvent3 = $currentEvent[data][$dataCounter][id];
															$j = 0;
														}
													}
												}
												
												$displayEvent = $currentEvent3;
												
												if ($accountID)
												{
													if ($displayEvent == "")
													{
														$postExist[$i] = 'false';
														$includedTypes[2] = 0;
													}
													
													break;
												}
											}
											
											$eventRecordCounter++;
											$eventRecord[$eventRecordCounter] = $displayEvent;
										
											$fqlQuery	= "SELECT eid,name,host,creator,description,start_time,end_time,location,venue,pic_big FROM event WHERE eid='" . $displayEvent . "' ";
											$response	= $facebook->api(array('method' => 'fql.query','query' =>$fqlQuery));
											
											$creatorID = $response[0][creator];
											$fqlQuery	= "SELECT pic_square FROM page WHERE page_id='$creatorID' ";
											$response2	= $facebook->api(array('method' => 'fql.query','query' =>$fqlQuery));
											$authorImage = $response2[0][pic_square];
											
											$postList[$i][typeName]					= 'event';
											$postList[$i][categoryName]				= 'community';
											
											$postList[$i][postContent][id]			= $response[0][eid];
											$postList[$i][postContent][name]		= $response[0][name];
											$postList[$i][postContent][author]		= $response[0][host];
											$postList[$i][postContent][authorImage]	= $authorImage;
											$postList[$i][postContent][venue]		= $response[0][venue];
											$postList[$i][postContent][end_time]	= $response[0][end_time]-10800;
											$postList[$i][postContent][location]	= $response[0][location];
											$postList[$i][postContent][start_time]	= $response[0][start_time]-10800;
											$postList[$i][postContent][timestamp]	= $response[0][start_time]-10800;
											$postList[$i][postContent][description]	= $response[0][description];
											$postList[$i][postContent][image]		= $response[0][pic_big];
											$postList[$i][postContent][link] 		= "http://thecampusbubble.com/site/pages/page.php?pageType=post&typeName=event&categoryName=community&facebookID=$displayEvent";
										}	
										
										function generatePostList_video($i)
										{	
											global $postList;
											global $eventRecord;
												global $eventRecordCounter;
											global $connector;
											
											global $postExist;
											
											$accountID   = $_GET['accountID'];
											
											session_start();
											
											$_SESSION['developerKey'] = 'AI39si5Mo3UUmOLCCs7R3s76T3UdjolGGAzOaGYC43FMkLXxgSQtxjW3VbDuIm23lAW-9HUskCYKt8ro3Bi81-RxLzMsAadB1g';
											
											require_once 'Zend/Loader.php';
											Zend_Loader::loadClass('Zend_Gdata_YouTube');
											
											while (!$displayEvent)
											{
												if ($accountID)
												{
													$resultAuthorQuery = $connector->query("SELECT youtubeID FROM users WHERE facebookID = $accountID");
												}
												else
												{
													$resultAuthorQuery = $connector->query('SELECT youtubeID FROM users WHERE youtubeID != "NULL" ORDER BY rand()');
												}
												
												$resultAuthor = $connector->fetchArray($resultAuthorQuery);
												$currentEventAuthor = $resultAuthor[youtubeID];
																								
												$yt = new Zend_Gdata_YouTube();
												$query = $yt->newVideoQuery();
												$query->author = $currentEventAuthor;
												$query->startIndex = 1;
												$query->maxResults = 1;
												
												if ($currentEventAuthor == 'campusmoviefest')
												{
													$query->videoQuery = '\"Emory University\"';
												}
												 
												$videoFeed = $yt->getVideoFeed($query);
												
												foreach ($videoFeed as $videoEntry)
												{
													$currentEvent = $videoEntry->getVideoID();
												}
												
												$dataCounter = 0;
												//$currentEvent2 = $currentEvent[data][$dataCounter][id];
												$currentEvent2 = $currentEvent;
												
												for($j = 0; $j <= $eventRecordCounter; $j++)
												{
													if ($currentEvent2 == $eventRecord[$j])
													{
														$dataCounter++;
														
														$yt = new Zend_Gdata_YouTube();
														$query = $yt->newVideoQuery();
														$query->author = $currentEventAuthor;
														$query->startIndex = 1;
														$query->maxResults = $dataCounter;
														
														if ($currentEventAuthor == 'campusmoviefest')
														{
															$query->videoQuery = '\"Emory University"';
														}
														
														$videoFeed = $yt->getVideoFeed($query);
														
														foreach ($videoFeed as $videoEntry)
														{
															$currentEvent = $videoEntry->getVideoID();
														}
														
														
														
														
														$currentEvent2 = $currentEvent;
														$j = 0;
													}
												}
												
												$displayEvent = $currentEvent2;
												
												if (!$currentEventAuthor)
												{
													$postExist[$i] = 'false';
													$includedTypes[3] = 0;
												}
											}
											
											$eventRecordCounter++;
											$eventRecord[$eventRecordCounter] = $displayEvent;
											
											foreach ($videoFeed as $videoEntry)
											{
											    $thumbnail1 = $videoEntry->getVideoThumbnails();
											    
											    $postList[$i][typeName]					= 'video';
												$postList[$i][categoryName]				= 'arts';
											
											
												$postList[$i][postContent][id]			= $videoEntry->getVideoID();
													$youtubeID = $postList[$i][postContent][id];
												$postList[$i][postContent][name]		= $videoEntry->getVideoTitle();
												$postList[$i][postContent][description]	= $videoEntry->getVideoDescription();
												$postList[$i][postContent][author]		= $videoEntry->author[0]->name->text;
												$postList[$i][postContent][timestamp]	= strtotime($videoEntry->published->text);
												$postList[$i][postContent][image]		= $thumbnail1[0][url];
												$postList[$i][postContent][link] 		= "http://thecampusbubble.com/site/pages/page.php?pageType=post&typeName=video&categoryName=arts&youtubeID=$youtubeID";
											}
										
										}	
										
										function generatePostList_article($i)
										{	
											global $postList;
											global $counterArticle;
											global $facebook;
											global $includedTypes;
											
											global $postExist;
											
											$accountID   = $_GET['accountID'];
											
											if ($accountID)
											{
												try {
												    $result = mysql_query("SELECT postName,postText,userFacebookID,postID,timestamp FROM posts WHERE typeName = 'article' AND userFacebookID = $accountID ORDER BY timestamp DESC");
												}
												catch (Exception $e)
												{
												    $postExist[$i] = 'false';
												    $includedTypes[4] = 0;
												}
												
												if ($postExist[$i] != 'false')
												{
													getPosts("SELECT postName,postText,userFacebookID,postID,timestamp FROM posts WHERE typeName = 'article' AND userFacebookID = $accountID ORDER BY timestamp DESC");
												}
												
											}
											else
											{
												try {
												     $result = mysql_query('SELECT postName,postText,userFacebookID,postID,timestamp FROM posts WHERE typeName = "article" ORDER BY timestamp DESC');
												}
												catch (Exception $e)
												{
												   $postExist[$i] = 'false';
												   $includedTypes[4] = 0;
												}
												
												if ($postExist[$i] != 'false')
												{
													getPosts('SELECT postName,postText,userFacebookID,postID,timestamp FROM posts WHERE typeName = "article" ORDER BY timestamp DESC');
												}
												
											}
																						
											global $post;
											
											$userFacebookID = $post[$counterArticle][userFacebookID];
											$fqlQuery	= "SELECT name from page WHERE page_id = $userFacebookID";
											
											try {
											     $response	= $facebook->api(array('method' => 'fql.query','query' =>$fqlQuery));
											}
											catch (Exception $e)
											{
											   $postExist[$i] = 'false';
											   $includedTypes[4] = 0;
											}
											
											$postList[$i][typeName]					= 'article';
											$postList[$i][categoryName]				= 'news';
											
											$postList[$i][postContent][id]			= $post[$counterArticle][postID];
											$postList[$i][postContent][name]		= $post[$counterArticle][postName];
											$postList[$i][postContent][description]	= $post[$counterArticle][postText];
											$postList[$i][postContent][author]		= $response[0][name];
											$postList[$i][postContent][timestamp]	= strtotime($post[$counterArticle][timestamp]);
											
											$counterArticle++;
										}
									
									
									global $includedTypes;
									$includedTypes[1] = 1;
									$includedTypes[2] = 1;
									$includedTypes[3] = 1;
									$includedTypes[4] = 1;
								
								
									function generatePiece_PostTeaserList($numberOfPosts)
									{
										global $includedTypes;
										global $numberOfPostsExtended;
										
										$numberOfPostsExtended = $numberOfPosts;
															
										generatePostList($numberOfPostsExtended, $includedTypes);
										
										for ($i = 1; $i <= $numberOfPostsExtended; $i++)
										{
											generatePiece_PostTeaser($i);
										}
									}
									
										function generatePiece_PostTeaser($i)
										{
											global $postList;
											global $postExist;
											global $numberOfPostsExtended;
											
											if ($postExist[$i] != 'false')
											{
												echo "<div class='smallBox postTeaser' style='margin:7px; border-top: 1px solid #D7DFE3; padding-top: 15px;'>";
												
													echo "<div style='display: inline-block; vertical-align: top;'>";
														
														echo "<div>";
															generatePiece_categoryBox($postList[$i][categoryName], $postList[$i][typeName]);
														echo "</div>";
														
														echo "<div style='margin-left: 6px; margin-bottom: 3px;'>";
															generatePiece_icon(_commentBubble_1);
														echo "</div>";
														
														echo "<div class='postDate' style='margin-left: 5px; font-weight: bold; font-family: Lucida Grande;'>";
															echo date( "m/d", $postList[$i][postContent][timestamp] );
														echo "</div>";
																
													echo "</div>";
													
													echo "<div style='width: 1px; height: 20px; background: #BECFD7; margin-left: 10px; margin-right: 10px; margin-top: 5px; display: inline-block; vertical-align: top;'></div>";
													
													echo "<div style='display: inline-block; vertical-align: top;'>";
													
														echo "<div style='text-transform: capitalize; font-family: Lucida Grande; font-size: 14px; color: #33464C; display: block; margin-bottom: 3px; width: 240px;'>";
															echo $postList[$i][postContent][name];
														echo "</div>";
														
														echo "<div style='font-family: museosans500; text-transform: uppercase; font-size: 11px; color: #7892A3; display: block; width: 240px; height: 25px;'>";
															echo $postList[$i][postContent][author];
														echo "</div>";
													
														if ($postList[$i][typeName]	== 'photo')
														{
															echo "<a href='" . $postList[$i][postContent][link] ."'>";
																echo "<div class='crop' style='height:156px'>";
																	echo "<img style='width:240px; border-radius: 4px; -moz-border-radius: 4px;' src='" . $postList[$i][postContent][image]. "'>";
																echo "</div>";
															echo "</a>";
														} 
														else if ($postList[$i][typeName] == 'event')
														{
															echo "<div style='display:inline-block; width: 200px;'>";
															
																echo "<a href='" . $postList[$i][postContent][link] ."'>";
																	echo "<div class='crop'>";
																		echo "<img style='width:240px;' src='" . $postList[$i][postContent][image]. "'>";
																	echo "</div>";
																echo "</a>";
																
																echo "<div class='crop' style='font-family: Lucida Grande; font-size: 11px; color: #33464C; width:240px; line-height: 22px;'>";
																	echo "<div>";
																		echo $postList[$i][postContent][description];
																	echo "</div>";
																echo "</div>";
																
															echo "</div>";
														} 
														else if ($postList[$i][typeName] == 'video')
														{
															echo "<a href='" . $postList[$i][postContent][link] ."'>";
																echo "<div class='crop' style='height:156px;'>";
																	echo "<img style='width:300px; border-radius: 4px; -moz-border-radius: 4px; top: -30px; left: -30px;' src='" . $postList[$i][postContent][image]. "'>";
																echo "</div>";
															echo "</a>";
														} 
														else if ($postList[$i][typeName] == 'article')
														{
															echo "<div class='crop' style='font-family: Lucida Grande; font-size: 11px; color: #33464C; width:240px; line-height: 22px; height: 135px;'>";
																echo "<div>";
																	echo $postList[$i][postContent][description];
																echo "</div>";
															echo "</div>";
														}
													
													echo "</div>";
												
												echo "</div>";
											}
											else
											{
												$numberOfPostsExtended++;									
												global $postList;
												global $includedTypes;
												
												for ($j = 1; $j <= 4; $j++)
												{
													if ($includedTypes[$j] == 1)
													{
														generatePostList_type($numberOfPostsExtended, $j);
														$j = 4;
													}
												}
											} 	
										}

							?>
						
						<!-- POSTED BY: NAME AND INFO --> 
							
						
								
						<!-- LISTS -->
							
						
						
						
						<!-- TABS -->
							<?php
								function generatePiece_tabs($tabAmount, $tabType, $paneType)
									{
										echo "<ul class='tabs header'>";
											for ($i = 0; $i <= $tabAmount-1; $i++)
											{
											    echo "<li><a href='#'>";
											    	generatePiece_tabContent($tabType, $i);
											    echo "</a></li>";
											}
										echo "</ul>";
										
										echo "<div class='panes body' style='position:relative; top:-165px;'>";
											
											generatePiece_paneContent($paneType, 0);
											/*
											for ($i = 0; $i <= $tabAmount; $i++)
											{
												echo "<div>";
													generatePiece_paneContent($paneType, $i);
												echo "</div>";
											}
											*/
										echo "</div>";
									}
										
										function generatePiece_tabContent($tabType, $i)
										{
											switch ($tabType)
											{
												 case "contentSelector":
												 	global $categoryList;
												 	generatePiece_contentSelector_button($categoryList[$i]);
												 break;
											}
										
										}
										
											function generatePiece_contentSelector_button($buttonCategory)
												{
													echo "<div class='contentCategoryButton category_{$buttonCategory}'>";
														echo $buttonCategory;
													echo "</div>";
												}
										
										function generatePiece_paneContent($paneType, $i)
										{				
											switch ($paneType)
											{
												 case "contentSelector":
												 	echo "<div class='body'>";
												 		
												 		global $categoryList;
												 		global $post;
												 		
												 		if($categoryList[$i] == "all")
												 		{
												 			global $connector;
												 			
												 			$result = $connector->query("SELECT postName,timestamp,categoryName,typeName FROM posts LIMIT 10");
												 			
												 			$numberOfPostsFound = 0;
												 			
												 			while ($result2 = $connector->fetchArray($result))
												 			{
												 				$numberOfPostsFound++;
												 				$post[$numberOfPostsFound-1] = $result2;
												 			}	
												 			
												 		}
												 		else
												 		{
												 			$currentCategory = $categoryList[$i];
												 			global $connector;
												 			
												 			$result = $connector->query("SELECT postName,timestamp,categoryName,typeName FROM posts WHERE categoryName = '$currentCategory' ORDER BY timestamp LIMIT 10");
												 			
												 			$numberOfPostsFound = 0;
												 			
												 			while ($result2 = $connector->fetchArray($result))
												 			{
												 				$numberOfPostsFound++;
												 				$post[$numberOfPostsFound-1] = $result2;
												 			}
												 			
												 		}
												 		
												 		generatePiece_list("small", "small", "bright", 10, 2);
												 	
												 	echo "</div>";
												 break;
											}
										
										}
										
								?>
																				
					</section>
				
				<!-- ELEMENTS -->
					<section>
						<?php
								
							function generateElement_continuousPlay()
							{															
								$postID = $_GET['postID'];
								
								getPosts("SELECT postName,postURL,postID FROM posts WHERE typeName = 'video' AND postID != $postID AND postURL != 'url.com' ORDER BY RAND()");
																
								echo "<div class='smallBox continuousPlay'>";
									generatePiece_ribbonHeader_withOnOffBox("continuous play");
									echo "<div class='ribbon'>";
										generatePiece_continuousPlayInfo();
									echo "</div>";
								echo "</div>";
							}
							
							function generateElement_ribbonPostedBy()
							{															
								echo "<div class='smallBox'>";
								
									generatePiece_ribbonHeader("posted by");
									
									echo "<div class='ribbon postedBy' style='width: 270px; padding-left: 18px; padding-top: 20px; padding-bottom: 25px;'>";
										generatePiece_postedByName();
										generatePiece_organizationBadge();
									echo "</div>";
									
								echo "</div>";
							}
							
							function generateElement_ribbonRegister()
							{															
								global $registerStep;
								
								echo "<div class='smallBox'>";
								
									if ($registerStep == 1 || $registerStep == 2)
										generatePiece_ribbonHeader("registration");
									if ($registerStep == 3 || $registerStep == 4)
										generatePiece_ribbonHeader("creating an organization");
									
									echo "<div class='ribbon' style='width: 288px'>";
									
										echo "<div style='padding: 20px; border-bottom: 1px solid #B7C8D2;' class='ribbonText'>";
											
											if ($registerStep == 1 || $registerStep == 2)
											{
												echo "Signing up for The Emory Bubble is quick and easy. All you need to do is connect your Facebook account, and you'll be ready to start posting. From there, you can also connect your Emory Bubble profile to your accounts on other sites. This allows you to sync your YouTube videos, blog posts, and more.";
											}
											else if ($registerStep == 3 || $registerStep == 4)
											{
												echo "Creating an organization on The Emory Bubble is simple. All you need to do is connect with an existing Facebook page, and you'll be ready to start posting. From there, you can also connect your Emory Bubble organization to your group's accounts on other sites. This allows you to sync your organization's YouTube videos, blog posts, and more.";
											}
											
											
										echo "</div>";
										
										echo "<div class='ribbonFooterBlank'></div>";
											
									echo "</div>";
									
								echo "</div>";
							}
							
							function generateElement_postedBy()
							{
								echo "<div class='smallBox'>";
									
									generatePiece_header("posted by");
									
									echo "<div class='widget postedBy'>";
										generatePiece_postedByName();
										generatePiece_organizationBadge();
									echo "</div>";
								
								echo "</div>";
								
							}
							
							function generateElement_contentBox_organizationProfile()
							{
								$accountID  = $_GET['accountID'];
								$facebookID = $accountID;
								
								echo "<div class='medBox'>";
									generatePiece_singlePageHeader("organizationProfile");
									//generatePiece_organizationAdmins();
									generatePiece_PostTeaserList(4);
									generatePiece_comments();
								echo "</div>";
							}
							
							function generateElement_contentBox_video()
							{
								$postID   = $_GET['postID'];
								
								getPosts("SELECT postName,postURL,postText,postTags,userFacebookID,organizationID,categoryName,typeName, timestamp FROM posts WHERE typeName = 'video' AND postID = $postID");
								
								echo "<div class='medBox'>";
									generatePiece_singlePageHeader(post);
									generatePiece_videoPlayer();
									generatePiece_postDescription();
								echo "</div>";
							}
							
							function generateElement_contentBox_event()
							{
								$facebookID   = $_GET['facebookID'];								
								
								echo "<div class='medBox'>";
									generatePiece_singlePageHeader(event);
								echo "</div>";
							}
							
							function generateElement_contentBox_article()
							{
								$facebookID   = $_GET['facebookID'];								
								
								echo "<div class='medBox'>";
									generatePiece_singlePageHeader(post);
									generatePiece_postDescription();
								echo "</div>";
							}
							
							function generateElement_contentBox_photo()
							{
								echo "<div class='medBox'>";
									generatePiece_singlePageHeader(post);
									generatePiece_photoAlbumBox();
								echo "</div>";
							}
							
							function generateElement_contentBox_createOrganization()
							{
								echo "<div class='medBox'>";
									
									echo "<div class='administration'>";
									
										echo "<div class='topHeader'>";
											echo "create an organization";
										echo "</div>";
									
										global $registerStep;
										
										if ($registerStep == 3)
										{
											echo "<div class='sectionHeader'>";
													echo "step 1: select a facebook page";
												echo "</div>";
											
											echo "<div class='sectionText'>";
												echo "Every organization on The Emory Bubble must be linked to an existing Facebook page. This allows you to sync your Facebook page's events, photos, and fans with your Emory Bubble organization. You may select from these pages that you administrate on Facebook.";
											echo "</div>";
											
											global $facebook;
											
											$fqlQuery	= "SELECT page_id from page_admin WHERE uid=me() ";
											$response	= $facebook->api(array('method' => 'fql.query','query' =>$fqlQuery));
											
											$numberOfPages = count($response) - 1;
											
											for ($i = 0; $i<= $numberOfPages; $i++)
											{
												$fqlQuery	= "SELECT name,page_id,pic_square from page WHERE page_id=" . $response[$i][page_id];
												$response2	= $facebook->api(array('method' => 'fql.query','query' =>$fqlQuery));
												
												if ($response2[0][name] != 'Unnamed App')
												{
													echo "<a class='registerIcon' style='color: #666666; width: 115px; vertical-align: top; padding-top: 4px; padding-bottom: 4px; margin-bottom: 10px;' href='http://thecampusbubble.com/site/registration/index.php?organizationFacebookID=" . $response2[0][page_id] . "'>";
													
													
														echo "<img style= 'border: 1px solid #BAC9D1' src='" . $response2[0][pic_square] . "'>";
														
														echo "<div style='margin-top: 2px'>";
															echo $response2[0][name];
														echo "</div>";
													
													
													echo "</a>";
												}
											}
											
										}
										else if ($registerStep == 4)
										{
											echo "<div class='sectionHeader'>";
													echo "step 2: sync with other social media sites";
												echo "</div>";
											
											echo "<div class='sectionText'>";
												echo "The Emory Bubble allows you to sync your organization's profile with its pre-existing YouTube videos, tweets, and blog posts. Please select whichever sites you would like to sync with your Emory Bubble organization.";
											echo "</div>";
											
											echo "<div style='display: inline-block'>";
												youtubeAuthenticationStart($_SESSION['organizationFacebookID']);
											echo "</div>";
											
											echo "<a class='registerIcon' style='color: #666666' href='#'>";
												echo "<img style='display:block' src='../lib/images/registerIcons/registerIcon_twitter.png'>";
												echo "Twitter";
											echo "</a>";
											
											echo "<a class='registerIcon' style='color: #666666' href='#'>";
												echo "<img style='display:block' src='../lib/images/registerIcons/registerIcon_wordpress.png'>";
												echo "WordPress";
											echo "</a>";
											
											echo "<a class='registerIcon' style='color: #666666' href='#'>";
												echo "<img style='display:block' src='../lib/images/registerIcons/registerIcon_blogger.png'>";
												echo "Blogger";
											echo "</a>";
											
											echo "<a class='registerIcon' style='color: #666666' href='#'>";
												echo "<img style='display:block' src='../lib/images/registerIcons/registerIcon_tumblr.png'>";
												echo "Tumblr";
											echo "</a>";
											
											echo "<a href='http://www.thecampusbubble.com/site/pages/page.php?pageType=organizationProfile&accountID=" . $_SESSION['organizationFacebookID'] . "' style='margin-top: 15px; position: relative; display:block; width: 50px;' class='greyButton'>";
												echo "done";
												echo "<img style='position: absolute; top: 7px; left: 45px;' src='../lib/images/icons/_check2.png'>";
											echo "</a>";
											
										}
								
									echo "</div>";
									
								echo "</div>";
							}
							
							function generateElement_contentBox_register()
							{
								echo "<div class='medBox'>";
									
									echo "<div class='administration'>";
									
										echo "<div class='topHeader'>";
											echo "register";
										echo "</div>";
									
										global $registerStep;
										
										if ($registerStep == 1)
										{
											echo "<div class='sectionHeader'>";
													echo "step 1: register with facebook";
												echo "</div>";
											
											echo "<div class='sectionText'>";
												echo "Click here to register for The Emory Bubble with your Facebook account.";
											echo "</div>";
											
											echo "<a class='registerIcon' style='color: #666666' href='register1.php'>";
												echo "<img style='display:block' src='../lib/images/registerIcons/registerIcon_facebook.png'>";
												echo "Facebook";
											echo "</a>";
										}
										else if ($registerStep == 2)
										{
											echo "<div class='sectionHeader'>";
													echo "step 2: sync with other social media sites";
												echo "</div>";
											
											echo "<div class='sectionText'>";
												echo "The Emory Bubble allows you to sync your profile with your pre-existing YouTube videos, tweets, and blog posts. Please select whichever sites you would like to sync with your Emory Bubble account.";
											echo "</div>";
											
											echo "<div style='display: inline-block'>";
												youtubeAuthenticationStart($_SESSION['facebookID']);
											echo "</div>";
											
											echo "<a class='registerIcon' style='color: #666666' href='#'>";
												echo "<img style='display:block' src='../lib/images/registerIcons/registerIcon_twitter.png'>";
												echo "Twitter";
											echo "</a>";
											
											echo "<a class='registerIcon' style='color: #666666' href='#'>";
												echo "<img style='display:block' src='../lib/images/registerIcons/registerIcon_wordpress.png'>";
												echo "WordPress";
											echo "</a>";
											
											echo "<a class='registerIcon' style='color: #666666' href='#'>";
												echo "<img style='display:block' src='../lib/images/registerIcons/registerIcon_blogger.png'>";
												echo "Blogger";
											echo "</a>";
											
											echo "<a class='registerIcon' style='color: #666666' href='#'>";
												echo "<img style='display:block' src='../lib/images/registerIcons/registerIcon_tumblr.png'>";
												echo "Tumblr";
											echo "</a>";
											
											echo "<a href='http://www.thecampusbubble.com/site/pages/page.php?pageType=home' style='margin-top: 15px; position: relative; display:block; width: 50px;' class='greyButton'>";
												echo "done";
												echo "<img style='position: absolute; top: 7px; left: 45px;' src='../lib/images/icons/_check2.png'>";
											echo "</a>";
											
										}
								
									echo "</div>";
									
								echo "</div>";
							}
							
							function generateElement_socialMedia()
							{
								echo "<div class='smallBox'>";
								
									generatePiece_header("social media");
								
									echo "<div class='socialMedia'>";
										generatePiece_socialMedia();
									echo "</div>";
									
								echo "</div>";
							}
							
							function generateElement_eventAccordion()
							{
								include("../lib/php/eventAccordion.php");
							}
							
							function generateElement_navFooter()
							{
								global $imageSource_footerBorder;
								
								echo "<div class='navFooterContainer'>";
									
									echo "<div class='border' style='background-image: url({$imageSource_footerBorder})'></div>";
								
									echo "<div class='pageContainer navFooter'>";
										generatePiece_navFooter();
									echo "</div>";
								
								echo "</div>";
							}
							
							function generateElement_navHeader()
							{
								global $imageSource_headerBG;
								global $imageSource_headerBorder;
								
								echo "<div class='navHeaderContainer'>";
								
									echo "<div style='background-image: url({$imageSource_headerBG})'>";
									
										echo "<div class='pageContainer'>";
											generatePiece_navHeader();
										echo "</div>";
										
									echo "</div>";
									
									echo "<div class='border' style='background-image: url({$imageSource_headerBorder})'></div>";
								
								echo "</div>";
							}
							
							function generateElement_contentSelector()
							{			
								include("../lib/php/contentSelector.php");
							}
							
							function generateElement_executiveBoard()
							{							
								global $elementType;
								$elementType = 'executiveBoard';
															
								getPosts('SELECT userFacebookID, userExecPosition FROM organizationPermissions WHERE organizationID = 1 AND userExecPosition != "member" ORDER BY userPermissionLevel');
								
								global $numberOfPostsFound;
								$numberOfPosts = $numberOfPostsFound;
															
								echo "<div class='smallBox contentSelector'>";
									generatePiece_header("executive board");
									generatePiece_list("small", "small", "dark", $numberOfPosts, 1);
								echo "</div>";
							}
							
							function generateElement_relatedArticlesSmall()
							{							
								global $elementType;
								$elementType = 'postList';
								
								$numberOfPosts = 10;
								
								getPosts('SELECT postName,postText,categoryName,typeName,timestamp FROM posts ORDER BY timestamp LIMIT ' .$numberOfPosts);
								
								echo "<div class='smallBox'>";
									generatePiece_header("related articles", "rss");
									generatePiece_list("small", "small", "dark", $numberOfPosts, 1);
								echo "</div>";
							}
							
							function generateElement_relatedEventsSmall()
							{							
								global $elementType;
								$elementType = 'postList';
								
								$numberOfPosts = 10;
								
								getPosts("SELECT postName,postText,categoryName,typeName,timestamp FROM posts WHERE typeName = 'event' ORDER BY timestamp LIMIT " .$numberOfPosts);
								
								echo "<div class='smallBox'>";
									generatePiece_header("related events", "rss");
									generatePiece_list("small", "small", "dark", $numberOfPosts, 1);
								echo "</div>";
							}
							
							function generateElement_relatedVideos()
							{							
								global $elementType;
								$elementType = 'postList';
								
								$numberOfPosts = 6;
								
								getPosts('SELECT postName,organizationID,userFacebookID,categoryName,typeName FROM posts WHERE typeName = "video" ORDER BY timestamp LIMIT ' .$numberOfPosts);
								
								echo "<div class='smallBox'>";
									generatePiece_ribbonHeader("related videos");
									echo "<div class='ribbon'>";
										generatePiece_list("large", "small", "dark", $numberOfPosts, 1);
										generatePiece_ribbonFooter("all videos");
									echo "</div>";
								echo "</div>";
							}
							
							function generateElement_relatedPhotos()
							{							
								global $elementType;
								$elementType = 'postList';
								
								$numberOfPosts = 10;
								
								getPosts('SELECT postName,organizationID,userFacebookID,categoryName,typeName FROM posts WHERE typeName = "video" ORDER BY timestamp LIMIT ' .$numberOfPosts);
								
								echo "<div class='smallBox'>";
									generatePiece_ribbonHeader("related photos");
									echo "<div class='ribbon'>";
										generatePiece_list("large", "small", "dark", $numberOfPosts, 1);
										generatePiece_ribbonFooter("all photo albums");
									echo "</div>";
								echo "</div>";
							}
							
							function generateElement_relatedArticlesLarge()
							{							
								global $elementType;
								$elementType = 'postList';
								
								$numberOfPosts = 4;
								
								getPosts('SELECT postName,postText,categoryName,typeName,timestamp FROM posts ORDER BY timestamp LIMIT ' .$numberOfPosts);
								
								echo "<div class='medBox'>";
									generatePiece_header("related articles", "rss");
									generatePiece_list("small", "large", "bright", $numberOfPosts, 1);
								echo "</div>";
							}
							
							
						?>
					</section>
					
				<!-- PAGES -->
					<section>
						
						<?php
							
							function generatePage()
							{
								include("../lib/js/facebookFunctions.php");
								
								generateElement_navHeader();
								
									echo "<div class='pageContainer contentContainer'>";
									
										global $pageType;
										
										if ($pageType != 'register')
										{
											$pageType = $_GET['pageType'];
										}
										
										if ($pageType == 'post')
										{
											$typeName = $_GET['typeName'];
											$postID   = $_GET['postID'];
											
											if ($typeName == 'video')
											{
												echo "<div class='smallBox' style='position:relative; left:-12px;'>";
												
													echo "<div style='position:relative; top:20px;'>";
														generatePiece_ribbonTop(videos);
													echo "</div>";
													
													echo "<div class='ribbonHolder'>";
														generateElement_ribbonPostedBy();
													echo "</div>";
													
													echo "<div style='position:relative; top:-20px;'>";
														generateElement_continuousPlay();
													echo "</div>";
													
													echo "<div style='position:relative; top:-40px;'>";
														generateElement_relatedVideos();
													echo "</div>";
													
												echo "</div>";
												
												echo "<div class='pageSpacer'></div>";
												
												echo "<div class='medBox'>";
													generateElement_contentBox_video();
													generatePiece_facebookLikes();
													generatePiece_comments();
												echo "</div>";
											}
											else if ($typeName == 'event')
											{
												echo "<body onload='fqlQuery_event()'>";
												
													echo "<div class='medBox' style='position:relative; top:4px'>";
														generateElement_contentBox_event();
														generatePiece_facebookLikes();
														generatePiece_comments();
													echo "</div>";
													
													echo "<div class='pageSpacer'></div>";
													
													echo "<div class='smallBox'>";
													
														generateElement_postedBy();
														generateElement_relatedArticlesSmall();
														
													echo "</div>";
												
												echo "</body>";
											}
											else if ($typeName == 'article')
											{
												echo "<body>";
												
													echo "<div class='medBox' style='position:relative; top:4px'>";
														generateElement_contentBox_article();
														generatePiece_facebookLikes();
														generatePiece_comments();
													echo "</div>";
													
													echo "<div class='pageSpacer'></div>";
													
													echo "<div class='smallBox'>";
													
														generateElement_postedBy();
														generateElement_relatedArticlesSmall();
														
													echo "</div>";
												
												echo "</body>";
											}
											else if ($typeName == 'photo')
											{
												echo "<body>";
												
													echo "<div class='smallBox' style='position:relative; left:-12px;'>";
													
														echo "<div style='position:relative; top:20px;'>";
															generatePiece_ribbonTop(photos);
														echo "</div>";
														
														echo "<div class='ribbonHolder'>";
															generateElement_ribbonPostedBy();
														echo "</div>";
														
														echo "<div style='position:relative; top:-20px;'>";
															generateElement_relatedPhotos();
														echo "</div>";
														
													echo "</div>";
													
													echo "<div class='pageSpacer'></div>";
													
													echo "<div class='medBox'>";
														generateElement_contentBox_photo();
														generatePiece_facebookLikes();
														generatePiece_comments();
													echo "</div>";
												
												echo "</body>";
											}											
										}
										else if ($pageType == "organizationProfile")
										{
											echo "<body>";
											
												echo "<div class='medBox' style='position:relative; top:4px'>";
													generateElement_contentBox_organizationProfile();
												echo "</div>";
												
												echo "<div class='pageSpacer'></div>";
												
												echo "<div class='smallBox'>";
													generateElement_relatedArticlesSmall();
												echo "</div>";
											
											echo "</body>";
										}
										
										else if ($pageType == "home")
										{
											echo "<div class='medBox'>";
												generateElement_contentSelector();
												generatePiece_spotlightPostsHeader();
												global $includedTypes;
												
												$includedTypes[1] = 1;
												$includedTypes[2] = 0;
												$includedTypes[3] = 1;
												$includedTypes[4] = 1;
												generatePiece_PostTeaserList(6);
											echo "</div>";
											
											echo "<div class='pageSpacer'></div>";
											
											echo "<div class='smallBox'>";
												generateElement_eventAccordion();
												generateElement_socialMedia();
											echo "</div>";
										}
										else if ($pageType == "archive")
										{
											global $includedTypes;
											$includedTypes[1] = 1;
											$includedTypes[2] = 1;
											$includedTypes[3] = 1;
											$includedTypes[4] = 1;
											
											echo "<div class='largeBox'>";
												generatePiece_PostTeaserList(12);
											echo "</div>";
										}
										else if ($pageType == "register")
										{
											echo "<div class='pageContainer contentContainer'>";
											
												global $registerStep;
												
												if ($registerStep == 1 || $registerStep == 2)
												{
													echo "<div class='smallBox' style='position:relative; left:-12px;'>";
													
														echo "<div style='position:relative; top:20px;'>";
															generatePiece_ribbonTop(administration);
														echo "</div>";
														
														echo "<div class='ribbonHolder'>";
															generateElement_ribbonRegister();
														echo "</div>";
														
													echo "</div>";
													
													echo "<div class='pageSpacer'></div>";
													
													echo "<div class='medBox'>";
														
														generateElement_contentBox_register();
													
													echo "</div>";
												}
												else if ($registerStep == 3 || $registerStep == 4)
												{
													echo "<div class='smallBox' style='position:relative; left:-12px;'>";
													
														echo "<div style='position:relative; top:20px;'>";
															generatePiece_ribbonTop(administration);
														echo "</div>";
														
														echo "<div class='ribbonHolder'>";
															generateElement_ribbonRegister();
														echo "</div>";
														
													echo "</div>";
													
													echo "<div class='pageSpacer'></div>";
													
													echo "<div class='medBox'>";
														
														generateElement_contentBox_createOrganization();
													
													echo "</div>";
												}
											
											echo "</div>";
										}

									echo "</div>";
								
								generateElement_navFooter();
							}
							
						?>
						
					</section>
					
			</section>
	
	</section>