<?php

	function generatePiece_categoryRadioButtons()
	{
		echo "<a class='registerIcon2 unselectableWithDefault'>";
			echo "<div style='display: inline-block; padding-bottom: 4px;'>";
				echo "<input type='radio' name='category' value='news' checked='checked'>";
				echo "News";
			echo "</div>";
			echo "<div>";
				echo "<div class='categoryBox category_news'>NE</div>";
			echo "</div>";
		echo "</a>";
		
		echo "<a class='registerIcon2 unselectableWithDefault'>";
			echo "<div style='display: inline-block; padding-bottom: 4px;'>";
				echo "<input type='radio' name='category' value='community'>";
				echo "Community";
			echo "</div>";
			echo "<div>";
				echo "<div class='categoryBox category_community'>CM</div>";
			echo "</div>";
		echo "</a>";
		
		echo "<a class='registerIcon2 unselectableWithDefault'>";
			echo "<div style='display: inline-block; padding-bottom: 4px;'>";
				echo "<input type='radio' name='category' value='arts'>";
				echo "Arts";
			echo "</div>";
			echo "<div>";
				echo "<div class='categoryBox category_arts'>AR</div>";
			echo "</div>";
		echo "</a>";
		
		echo "<a class='registerIcon2 unselectableWithDefault'>";
			echo "<div style='display: inline-block; padding-bottom: 4px;'>";
				echo "<input type='radio' name='category' value='entertainment'>";
				echo "Entertainment";
			echo "</div>";
			echo "<div>";
				echo "<div class='categoryBox category_entertainment'>ET</div>";
			echo "</div>";
		echo "</a>";
		
		echo "<br>";
		
		echo "<a class='registerIcon2 unselectableWithDefault'>";
			echo "<div style='display: inline-block; padding-bottom: 4px;'>";
				echo "<input type='radio' name='category' value='politics'>";
				echo "Politics";
			echo "</div>";
			echo "<div>";
				echo "<div class='categoryBox category_politics'>PL</div>";
			echo "</div>";
		echo "</a>";
		
		echo "<a class='registerIcon2 unselectableWithDefault'>";
			echo "<div style='display: inline-block; padding-bottom: 4px;'>";
				echo "<input type='radio' name='category' value='athletics'>";
				echo "Athletics";
			echo "</div>";
			echo "<div>";
				echo "<div class='categoryBox category_athletics'>AT</div>";
			echo "</div>";
		echo "</a>";
		
		echo "<a class='registerIcon2 unselectableWithDefault'>";
			echo "<div style='display: inline-block; padding-bottom: 4px;'>";
				echo "<input type='radio' name='category' value='academics'>";
				echo "Academics";
			echo "</div>";
			echo "<div>";
				echo "<div class='categoryBox category_academics'>AC</div>";
			echo "</div>";
		echo "</a>";
	}

	echo "<div class='medBox'>";
		
		echo "<div class='administration'>";
		
			echo "<div class='topHeader'>";
				if ($registerStep == 1 || $registerStep == 2 || $registerStep == 5)
				{
					echo "register";
				}
				else
				{
					echo "create an organization";
				}
			echo "</div>";
					
			if ($registerStep == 1)
			{
				echo "<div class='sectionHeader'>";
						echo "step 1: register with facebook";
					echo "</div>";
				
				echo "<div class='sectionText'>";
					echo "Click here to register for The Emory Bubble with your Facebook account.";
				echo "</div>";
				
				echo "<a class='registerIcon' style='color: #666666' href='register1.php'>";
					echo "<img style='display:block' src='lib/images/registerIcons/registerIcon_facebook.png'>";
					echo "Facebook";
				echo "</a>";
			}
			else if ($registerStep == 2 || $registerStep == 4)
			{
					$organizationFacebookID = $_GET['organizationFacebookID'];
					$organizationName		= $_GET['organizationName'];
					
					if ($organizationFacebookID)
					{
						$_SESSION['organizationFacebookID'] = $organizationFacebookID;
						$_SESSION['organizationName'] 		= $organizationName;
					}
					
					if ($_SESSION['organizationFacebookID'])
					{
						$insertName	= $_SESSION['organizationName'];
						$insertID	= $_SESSION['organizationFacebookID'];
						$query		= mysql_query("INSERT INTO users (facebookID, accountType, name) VALUES ('$insertID', 'organization', '$insertName')");
					}
				
					$_SESSION['developerKey'] = 'AI39si5Mo3UUmOLCCs7R3s76T3UdjolGGAzOaGYC43FMkLXxgSQtxjW3VbDuIm23lAW-9HUskCYKt8ro3Bi81-RxLzMsAadB1g';
					
					function authenticated()
					{
					    if (isset($_SESSION['sessionToken'])) {
					        return true;
					    }
					}
						
					require_once 'Zend/Loader.php';
					Zend_Loader::loadClass('Zend_Gdata_YouTube');
					Zend_Loader::loadClass('Zend_Gdata_AuthSub');
					Zend_Loader::loadClass('Zend_Gdata_App_Exception');
						
					function getYtService()
					{
						$applicationId = "YTAViewer";
						$clientId = $GLOBALS['ytaviewer_config']['client_id'];
						$devKey = $GLOBALS['ytaviewer_config']['dev_key'];
						$httpClient = Zend_Gdata_AuthSub::getHttpClient($_SESSION['sessionToken']);
						$yt = new Zend_Gdata_YouTube($httpClient, $applicationId, $clientId, $devKey);
						$yt->setMajorProtocolVersion(2);
						return $yt;
					}
					
					function youtubeAuthenticationStart($facebookID)
					{
						if (authenticated())
						{
						    $yt = getYtService();
						    $userProfile = $yt->getUserProfile('default');
						    $currentUserName = $userProfile->username->text;
						    
						    $queryUserName  = "UPDATE users SET youtubeID = '$currentUserName' WHERE facebookID = $facebookID ";
						    $query = mysql_query($queryUserName);
						    
						    echo '<a class="registerIcon" style="color: #666666;"><img style="display:block" src="lib/images/registerIcons/registerIcon_youtube_complete.png">YouTube</a>';
					
						} else {
						    
						    echo "<script src='video_app.js' type='text/javascript'></script>";
						    
							echo 
							   "<body onload='ytVideoApp.presentAuthLink(); return false;'>
									<div id='generateAuthSubLink'></div>
								</body>
							   ";
						   
						}
					
					}
						
					if(!empty($_SESSION)){
				
						# Creating the facebook object
						$facebook = new Facebook2(array(
							'appId'  => '219781404699497',
							'secret' => '11efd0dea9edbb5461a0b74c6227ff42',
							'cookie' => true
						));
						
						# Let's see if we have an active session
						$session = $facebook->getSession();
						
						if(!empty($session)) {
							# Active session, let's try getting the user id (getUser()) and user info (api->('/me'))
							try{
								$uid = $facebook->getUser();
							} catch (Exception $e){}
										
							if(!empty($uid)){
									
									if ($registerStep == 2)
									{
										$userFacebookID = $_SESSION['facebookID'];
									}
									else
									{
										$userFacebookID = $_SESSION['organizationFacebookID'];
									}
									
									
									echo "<div class='sectionHeader'>";
											echo "step 2: sync with other social media sites";
										echo "</div>";
									
									echo "<div class='sectionText'>";
										if ($registerStep == 2)
										{
											echo "The Emory Bubble allows you to sync your profile with your pre-existing YouTube videos, tweets, and blog posts. Please select whichever sites you would like to sync with your Emory Bubble account.";
										}
										else
										{
											echo "The Emory Bubble allows you to sync your organization's profile with its pre-existing YouTube videos, tweets, and blog posts. Please select whichever sites you would like to sync with your Emory Bubble organization.";
										}
									echo "</div>";
									
									echo "<div style='display: inline-block'>";
										youtubeAuthenticationStart($userFacebookID);
									echo "</div>";
									
									echo "<a class='registerIcon' style='color: #666666' href='#'>";
										echo "<img style='display:block' src='lib/images/registerIcons/registerIcon_twitter.png'>";
										echo "Twitter";
									echo "</a>";
									
									echo "<a class='registerIcon' style='color: #666666' href='#'>";
										echo "<img style='display:block' src='lib/images/registerIcons/registerIcon_wordpress.png'>";
										echo "WordPress";
									echo "</a>";
									
									echo "<a class='registerIcon' style='color: #666666' href='#'>";
										echo "<img style='display:block' src='lib/images/registerIcons/registerIcon_blogger.png'>";
										echo "Blogger";
									echo "</a>";
									
									echo "<a class='registerIcon' style='color: #666666' href='#'>";
										echo "<img style='display:block' src='lib/images/registerIcons/registerIcon_tumblr.png'>";
										echo "Tumblr";
									echo "</a>";
								if ($registerStep == 2)
								{
									echo "<a href='register5.php' style='margin-top: 15px; position: relative; display:block; width: 25px; height: 5px;' class='greyButton'>";
								}
								else
								{
									echo "<a href='register6.php' style='margin-top: 15px; position: relative; display:block; width: 25px; height: 5px;' class='greyButton'>";
								}	
										echo "next";
									echo "</a>";
								
							} else {
								# For testing purposes, if there was an error, let's kill the script
								die("There was an error.");
							}
						} else {
							header("Location: register1.php");
						}
							
					} else {
						header("Location: register1.php");
					}				
			}
			else if ($registerStep == 3)
			{
				# Creating the facebook object
				$facebook = new Facebook2(array(
					'appId'  => '219781404699497',
					'secret' => '11efd0dea9edbb5461a0b74c6227ff42',
					'cookie' => true
				));
				
				# Let's see if we have an active session
				$session = $facebook->getSession();
				
				echo "<div class='sectionHeader'>";
						echo "step 1: select a facebook page";
					echo "</div>";
				
				echo "<div class='sectionText'>";
					echo "Every organization on The Emory Bubble must be linked to an existing Facebook page. This allows you to sync your Facebook page's events, photos, and fans with your Emory Bubble organization. You may select from these pages that you administrate on Facebook. If you do not see your desired Facebook page, then either you are not an admin of the page, or the organization has already been registered on The Emory Bubble.";
				echo "</div>";
				
				global $facebook;
				
				$fqlQuery	= "SELECT page_id from page_admin WHERE uid=me() ";
				$response	= $facebook->api(array('method' => 'fql.query','query' =>$fqlQuery));
				
				$numberOfPages = count($response) - 1;
				
				for ($i = 0; $i<= $numberOfPages; $i++)
				{
					$pageResult = generateQueryArray("SELECT facebookID FROM users WHERE facebookID = " . $response[$i][page_id]);
					
					if (!$pageResult)
					{
						$fqlQuery	= "SELECT name,page_id,pic_square from page WHERE page_id=" . $response[$i][page_id];
						$response2	= $facebook->api(array('method' => 'fql.query','query' =>$fqlQuery));
						
						if ($response2[0][name] != 'Unnamed App')
						{
							echo "<a class='registerIcon' style='color: #666666; width: 115px; vertical-align: top; padding-top: 4px; padding-bottom: 4px; margin-bottom: 10px;' href='register2.php?organizationFacebookID=" . $response2[0][page_id] . "&organizationName=" . $response2[0][name] . "'>";
							
							
								echo "<img style= 'border: 1px solid #BAC9D1' src='" . $response2[0][pic_square] . "'>";
								
								echo "<div style='margin-top: 2px'>";
									echo $response2[0][name];
								echo "</div>";
							
							
							echo "</a>";
						}
					}
				}
				
			}
			else if ($registerStep == 5)
			{
				echo "<div class='sectionHeader'>";
						echo "step 3: personalize your profile";
					echo "</div>";
				
				echo "<form name='registerform' method='post' action='register7.php'>";
				
					echo "<div class='sectionText'>";
						echo "The Emory Bubble groups its posts into categories to help users find what interests them. Please select one of the following as the default category for your posts. This choice is not binding. At any time, you may change your default category or submit a post with a different category.";
					echo "</div>";
					
					generatePiece_categoryRadioButtons();
					
					echo "<div class='sectionText' style='margin-top: 20px;'>";
						echo "Lastly, please write a quick blurb about yourself. Who are you? What do you do on campus?";
					echo "</div>";
									
					echo "<textarea name='blurb' maxlength='1000' style='resize: none; border-radius: 4px; -moz-border-radius: 4px; border: 1px solid #E2E9ED; box-shadow:	inset 1px 1px 0px #CCCCCC; -moz-box-shadow:	inset 1px 1px 0px #CCCCCC; padding-top: 3px; padding-bottom: 3px; padding-left: 7px; padding-right: 7px; width: 430px;' class='sectionText'></textarea>";
					
					echo "<input type='submit' value='done' style='position: relative; display:block; width: 50px; height: 25px; padding-top: 4px;' class='greyButton unselectableWithPointer'>";
				
				echo "</form>";
			}
			else if ($registerStep == 6)
			{
				echo "<div class='sectionHeader'>";
						echo "step 3: personalize your organization";
					echo "</div>";
					
				echo "<form name='registerform' method='post' action='register8.php'>";
				
					echo "<div class='sectionText'>";
						echo "What is the name of your organization?";
					echo "</div>";
					
					echo "<input type='text' name='name' maxlength='50' style='border-radius: 4px; -moz-border-radius: 4px; border: 1px solid #E2E9ED; box-shadow:	inset 1px 1px 0px #CCCCCC; -moz-box-shadow:	inset 1px 1px 0px #CCCCCC; padding-top: 3px; padding-bottom: 3px; padding-left: 7px; padding-right: 7px; width: 430px;' class='sectionText'>";
					
					echo "<div class='sectionText'>";
						echo "The Emory Bubble groups its posts into categories to help users find what interests them. Please select one of the following as the default category for your organization's posts. This choice is not binding. At any time, you may change your organization's default category or submit a post with a different category.";
					echo "</div>";
					
					generatePiece_categoryRadioButtons();
					
					echo "<div class='sectionText' style='margin-top: 20px;'>";
						echo "Lastly, please write a quick blurb about your organization. What is your mission? What do you do on campus?";
					echo "</div>";
									
					echo "<textarea name='blurb' maxlength='1000' style='resize: none; border-radius: 4px; -moz-border-radius: 4px; border: 1px solid #E2E9ED; box-shadow:	inset 1px 1px 0px #CCCCCC; -moz-box-shadow:	inset 1px 1px 0px #CCCCCC; padding-top: 3px; padding-bottom: 3px; padding-left: 7px; padding-right: 7px; width: 430px;' class='sectionText'></textarea>";
					
					echo "<input type='submit' value='done' style='position: relative; display:block; width: 50px; height: 25px; padding-top: 4px;' class='greyButton unselectableWithPointer'>";
				
				echo "</form>";
			}
			
	
		echo "</div>";
		
	echo "</div>";	
?>