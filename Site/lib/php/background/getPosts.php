<?php

	function getPosts($numberOfPosts, $includedTypes, $includedCategories = 'all', $selectedOrganization = 'all', $startingRow = 0, $search = 0, $postsFeaturing = 0)
	{
		$articleCounter	= 0;
		$galleryCounter	= 0;
		$videoCounter	= 0;
		$eventCounter	= 0;
		
		for ($i = 0; $i <= $numberOfPosts - 1; $i++)
		{
			if ($includedTypes['article'] == 1)
			{
				if ($articleCounter == 0)
				{
					$postQuery = "";
					
					if ($selectedOrganization != 'all')
					{
						$postQuery .= "WHERE accountFacebookID = $selectedOrganization ";
					
						if ($search != '0')
						{
							$postQuery .= "AND (name LIKE '%$search%' OR accountName LIKE '%$search%' OR description LIKE '%$search%') ";
							
							if ($postsFeaturing != '0')
							{
								$postQuery .= "AND accountName != '$search' ";
							}
						}
					}
					else
					{
						if ($search != '0')
						{
							$postQuery .= "WHERE (name LIKE '%$search%' OR accountName LIKE '%$search%' OR description LIKE '%$search%') ";
							
							if ($postsFeaturing != '0')
							{
								$postQuery .= "AND accountName != '$search' ";
							}
						}
					}
					
					if ($includedTypes['articleSort'] == 'oldest')
					{
						$postQuery .= "ORDER BY created_time ASC ";
					}
					else
					{
						$postQuery .= "ORDER BY created_time DESC ";
					}
					
					if ($includedCategories == 'all')
					{
						if ($startingRow['article'])
						{
							$postQuery .= "LIMIT ";
							$postQuery .= $startingRow['article'];
							$postQuery .= ",$numberOfPosts";
						}
						else
						{
							if ($includedTypes['articleSort'] == 'random')
							{
								$countBeginningQuery = "SELECT count(*) FROM articles ";
								
								if ($search != '0')
								{
									$countBeginningQuery .= "AND (name LIKE '%$search%' OR accountName LIKE '%$search%' OR description LIKE '%$search%') ";
									
									if ($postsFeaturing != '0')
									{
										$countBeginningQuery .= "AND accountName != '$search' ";
									}
									
								}
								
								$countFinalQuery	 = "$countBeginningQuery $postQuery";
								$tableSize 			 = generateQueryArray($countFinalQuery);
																
								$maxValue			 = $tableSize[0][0] - $numberOfPosts;
																
								$randomNumer 		 = rand(0,$maxValue);
								
								$postQuery .= "LIMIT $randomNumer,$numberOfPosts";
							}
							else
							{
								$postQuery .= "LIMIT $numberOfPosts";
							}
						}
					}
					
					$beginningQuery = "SELECT * FROM articles ";
					$finalQuery		= "$beginningQuery $postQuery";
										
					error_reporting(0);
						$articleList = generateQueryArray($finalQuery);
					error_reporting(E_ERROR | E_WARNING | E_PARSE);
					
					if (!$articleList)
					{
						$includedTypes['article'] = 0;
					}
				}
				
				if ($includedTypes['article'] == 1 && $articleList[$articleCounter])
				{
					$categoryCheck				= getPostCategory($articleList[$articleCounter]);
					
					if ($categoryCheck == $includedCategories ||  $includedCategories == 'all')
					{
						$postList[$i]				= $articleList[$articleCounter];
						$postList[$i]['type']		= 'article';
						$postList[$i]['category']	= getPostCategory($postList[$i]);
						$postList[$i]['link']		= "article.php?id=";
						$postList[$i]['link']	   .= $postList[$i]['postCampusBubbleID'];
						$i++;
					}
					
					$articleCounter++;
				}
			}
			if ($includedTypes['photo'] == 1)
			{
				
				if ($galleryCounter == 0)
				{
					$postQuery = "";
					
					if ($selectedOrganization != 'all')
					{
						$postQuery .= "AND accountFacebookID = $selectedOrganization ";
					}
					
					if ($search != '0')
					{
						$postQuery .= "AND (name LIKE '%$search%' OR accountName LIKE '%$search%' OR description LIKE '%$search%') ";
						
						if ($postsFeaturing != '0')
						{
							$postQuery .= "AND accountName != '$search' ";
						}
						
					}
					
					
					if ($includedTypes['photoSort'] == 'oldest')
					{
						$postQuery .= "ORDER BY created_time ASC ";
					}
					else
					{
						$postQuery .= "ORDER BY created_time DESC ";
					}
					
					if ($includedCategories == 'all')
					{
						
						if ($startingRow['gallery'])
						{	
							$postQuery .= "LIMIT ";
							$postQuery .= $startingRow['gallery'];
							$postQuery .= ",$numberOfPosts";
						}
						else
						{
							if ($includedTypes['photoSort'] == 'random')
							{
								$countBeginningQuery = "SELECT count(*) FROM galleries WHERE albumType = 'normal' ";
								
								if ($search != '0')
								{
									$countBeginningQuery .= "AND (name LIKE '%$search%' OR accountName LIKE '%$search%' OR description LIKE '%$search%') ";
									
									if ($postsFeaturing != '0')
									{
										$countBeginningQuery .= "AND accountName != '$search' ";
									}
									
								}
								
								$countFinalQuery	 = "$countBeginningQuery $postQuery";
								$tableSize 			 = generateQueryArray($countFinalQuery);
								
								$maxValue			 = $tableSize[0][0] - $numberOfPosts;
								$randomNumer 		 = rand(0,$maxValue);
								
								$postQuery .= "LIMIT $randomNumer,$numberOfPosts";
							}
							else
							{
								$postQuery .= "LIMIT $numberOfPosts";
							}
						}
						
					}
					
					$beginningQuery = "SELECT * FROM galleries WHERE albumType = 'normal' ";
					$finalQuery		= "$beginningQuery $postQuery";
					
					
					
					error_reporting(0);
						$galleryList = generateQueryArray($finalQuery);
					error_reporting(E_ERROR | E_WARNING | E_PARSE);
					
					if (!$galleryList)
					{
						$includedTypes['photo'] = 0;
					}
				}
				
				if ($includedTypes['photo'] == 1 && $galleryList[$galleryCounter])
				{
					$categoryCheck				= getPostCategory($galleryList[$galleryCounter]);
					
					if ($categoryCheck == $includedCategories ||  $includedCategories == 'all')
					{
						$postList[$i] 				= $galleryList[$galleryCounter];
						$postList[$i]['type'] 		= 'photo';
						$postList[$i]['category'] 	= getPostCategory($postList[$i]);
						$postList[$i]['link']		= "photo.php?id=";
						$postList[$i]['link']	   .= $postList[$i]['postFacebookID'];
						$i++;
					}
					
					$galleryCounter++;
				}
			}
			if ($includedTypes['video'] == 1)
			{
				if ($videoCounter == 0)
				{
					$postQuery = "";
					
					if ($selectedOrganization != 'all')
					{
						$postQuery .= "WHERE accountFacebookID = $selectedOrganization ";
						
						if ($search != '0')
						{
							$postQuery .= "AND (name LIKE '%$search%' OR accountName LIKE '%$search%' OR description LIKE '%$search%') ";
							
							if ($postsFeaturing != '0')
							{
								$postQuery .= "AND accountName != '$search' ";
							}
						}
					}
					else
					{
						if ($search != '0')
						{
							$postQuery .= "WHERE (name LIKE '%$search%' OR accountName LIKE '%$search%' OR description LIKE '%$search%') ";
							
							if ($postsFeaturing != '0')
							{
								$postQuery .= "AND accountName != '$search' ";
							}
						}
					}
					
					if ($includedTypes['videoSort'] == 'oldest')
					{
						$postQuery .= "ORDER BY created_time ASC ";
					}
					else
					{
						$postQuery .= "ORDER BY created_time DESC ";
					}
					
					if ($includedCategories == 'all')
					{
						if ($startingRow['video'])
						{
							$postQuery .= "LIMIT ";
							$postQuery .= $startingRow['video'];
							$postQuery .= ",$numberOfPosts";
						}
						else
						{
							if ($includedTypes['videoSort'] == 'random')
							{
								$countBeginningQuery = "SELECT count(*) FROM videos ";
								
								if ($search != '0')
								{
									$countBeginningQuery .= "AND (name LIKE '%$search%' OR accountName LIKE '%$search%' OR description LIKE '%$search%') ";
									
									if ($postsFeaturing != '0')
									{
										$countBeginningQuery .= "AND accountName != '$search' ";
									}
									
								}
								
								$countFinalQuery	 = "$countBeginningQuery $postQuery";
								$tableSize 			 = generateQueryArray($countFinalQuery);
								
								$maxValue			 = $tableSize[0][0] - $numberOfPosts;
								$randomNumer 		 = rand(0,$maxValue);
								
								$postQuery .= "LIMIT $randomNumer,$numberOfPosts";
							}
							else
							{
								$postQuery .= "LIMIT $numberOfPosts";
							}
						}
					}
					
					$beginningQuery = "SELECT * FROM videos ";
					$finalQuery		= "$beginningQuery $postQuery";
					
					error_reporting(0);
						$videoList = generateQueryArray($finalQuery);
					error_reporting(E_ERROR | E_WARNING | E_PARSE);
					
					if (!$videoList)
					{
						$includedTypes['video'] = 0;
					}					
					
					
				}
				
				if ($includedTypes['video'] == 1 && $videoList[$videoCounter])
				{
					$categoryCheck				= getPostCategory($videoList[$videoCounter]);
					
					if ($categoryCheck == $includedCategories ||  $includedCategories == 'all')
					{
						$postList[$i] 				= $videoList[$videoCounter];
						$postList[$i]['type'] 		= 'video';
						$postList[$i]['category'] 	= getPostCategory($postList[$i]);
						$postList[$i]['link']		= "video.php?id=";
						$postList[$i]['link']	   .= $postList[$i]['postYouTubeID'];
						$i++;
					}
					
					$videoCounter++;
				}
			}
			if ($includedTypes['event'] == 1)
			{
				if ($eventCounter == 0)
				{
					$currentTime = time();
					
					$postQuery = "";
					
					if ($selectedOrganization != 'all')
					{
						$postQuery .= "AND accountFacebookID = $selectedOrganization ";
					}
					
					if ($search != '0')
					{
						$postQuery .= "AND (name LIKE '%$search%' OR accountName LIKE '%$search%' OR description LIKE '%$search%') ";
						
						if ($postsFeaturing != '0')
						{
							$postQuery .= "AND accountName != '$search' ";
						}
					}
					
					if ($includedTypes['eventSort'] == 'oldest')
					{
						$postQuery .= "ORDER BY created_time ASC ";
					}
					else
					{
						$postQuery .= "ORDER BY start_time ASC ";
					}
					
					if ($includedCategories == 'all')
					{
						if ($startingRow['event'])
						{	
							$postQuery .= "LIMIT ";
							$postQuery .= $startingRow['event'];
							$postQuery .= ",$numberOfPosts";
						}
						else
						{
							if ($includedTypes['eventSort'] == 'random')
							{
								$countBeginningQuery = "SELECT count(*) FROM events WHERE start_time > $currentTime ";
								
								if ($search != '0')
								{
									$countBeginningQuery .= "AND (name LIKE '%$search%' OR accountName LIKE '%$search%' OR description LIKE '%$search%') ";
									
									if ($postsFeaturing != '0')
									{
										$countBeginningQuery .= "AND accountName != '$search' ";
									}
									
								}
								
								$countFinalQuery	 = "$countBeginningQuery $postQuery";
								$tableSize 			 = generateQueryArray($countFinalQuery);
								
								$maxValue			 = $tableSize[0][0] - $numberOfPosts;
								$randomNumer 		 = rand(0,$maxValue);
								
								$postQuery .= "LIMIT $randomNumer,$numberOfPosts";
							}
							else
							{
								$postQuery .= "LIMIT $numberOfPosts";
							}
						}
					}
					
					$beginningQuery = "SELECT * FROM events WHERE start_time > $currentTime ";
					$finalQuery		= "$beginningQuery $postQuery";
					
					error_reporting(0);
						$eventList = generateQueryArray($finalQuery);
					error_reporting(E_ERROR | E_WARNING | E_PARSE);
					
					if (!$eventList)
					{
						$includedTypes['event'] = 0;
					}
				}
				
				if ($includedTypes['event'] == 1 && $eventList[$eventCounter])
				{
					$categoryCheck				= getPostCategory($eventList[$eventCounter]);
					
					if ($categoryCheck == $includedCategories ||  $includedCategories == 'all')
					{
						$postList[$i] 				= $eventList[$eventCounter];
						$postList[$i]['type'] 		= 'event';
						$postList[$i]['category'] 	= getPostCategory($postList[$i]);
						$postList[$i]['link']		= "event.php?id=";
						$postList[$i]['link']	   .= $postList[$i]['postFacebookID'];
						$i++;
					}
					
					$eventCounter++;
				}
			}
			
			if (!$articleList[$articleCounter] && !$galleryList[$galleryCounter] && !$videoList[$videoCounter] && !$eventList[$eventCounter])
			{
				global $existingPosts;
				$existingPosts[$i] = 'false';
				break;
			}
			
			$i--;
			
		}
			
		return $postList;
	}
	
	function getPostCategory($post)
	{
		if ($post['category'])
		{
			$postCategory 		= $post['category'];
		}
		else
		{
			$accountFacebookID	= $post['accountFacebookID'];
			$userInfo			= generateQueryArray("SELECT category FROM users WHERE facebookID = $accountFacebookID");
			$postCategory 		= $userInfo[0]['category'];
		}
		
		return $postCategory;
	}
	
	function getSinglePost($query)
	{
		$post	= generateQueryArray($query);
		$post['category']	= getPostCategory($post[0]);
		
		
		if ($post[0]['postYouTubeID'])
		{
			$post[0]['link']		= "video.php?id=";
			$post[0]['link']	   .= $post[0]['postYouTubeID'];
		}
		else if ($post[0]['albumType'])
		{
			$post[0]['link']		= "photo.php?id=";
			$post[0]['link']	   .= $post[0]['postFacebookID'];
		}
		else if ($post[0]['start_time'])
		{
			$post[0]['link']		= "event.php?id=";
			$post[0]['link']	   .= $post[0]['postFacebookID'];
		}
		else if ($post[0]['postCampusBubbleID'])
		{
			$post[0]['link']		= "article.php?id=";
			$post[0]['link']	   .= $post[0]['postCampusBubbleID'];
		}
		
		return $post;
	}
	
?>