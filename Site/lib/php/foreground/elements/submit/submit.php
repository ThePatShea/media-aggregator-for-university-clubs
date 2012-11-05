<?php 
	
	session_start();
	
	include_once('../../../background/facebookSDK/facebook.php');
	include_once('../../../background/databaseConnect.php');
	include_once('../../../background/getPosts.php');
	include_once('../../../background/universalBackground.php');
	include_once("../../../foreground/pieces/universalPieces.php");
	include_once('../../../../css/style.php');
	include_once("../../../foreground/pieces/list.php");
	require("../../../background/registerFacebook.php");

	

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

	echo "
	
		<style>
		
			@font-face {
			    font-family: 'nevisBold';
			    src: url('../../../../fonts/nevis/nevis-webfont.eot');
			    src: url('../../../../fonts/nevis/nevis-webfont.eot?#iefix') format('embedded-opentype'),
			         url('../../../../fonts/nevis/nevis-webfont.woff') format('woff'),
			         url('../../../../fonts/nevis/nevis-webfont.ttf') format('truetype'),
			         url('../../../../fonts/nevis/nevis-webfont.svg#nevisBold') format('svg');
			    font-weight: normal;
			    font-style: normal;
				}
			
			@font-face {
			    font-family: 'MuseoSans500';
			    src: url('../../../../fonts/museosans/museosans_500-webfont.eot');
			    src: url('../../../../fonts/museosans/museosans_500-webfont.eot?#iefix') format('embedded-opentype'),
			         url('../../../../fonts/museosans/museosans_500-webfont.woff') format('woff'),
			         url('../../../../fonts/museosans/museosans_500-webfont.ttf') format('truetype'),
			         url('../../../../fonts/museosans/museosans_500-webfont.svg#MuseoSans500') format('svg');
			    font-weight: normal;
			    font-style: normal;
			    }
		
			.submitFrame
			{
				background: 			url('../../../../images/other/ajaxLoader.gif');
				background-repeat:		no-repeat;
				background-attachment:	fixed;
				background-position:	top center;
			}
		
			.submitPostButton
			{
				color: 				#3F5564 !important;
			}
			
				.submitPostButton:hover
				{
					background:			#D3B6B6;
					border:				1px solid #E2CFCF;
					color:				#65413F !important;
					box-shadow:			1px 1px 0px #B18681;
					-moz-box-shadow:	1px 1px 0px #B18681;
				}
		
		</style>
	
	";	
	
	
	

	
	
	
	
	$facebook = new Facebook2(array(
		'appId'  => '219781404699497',
		'secret' => '11efd0dea9edbb5461a0b74c6227ff42',
		'cookie' => true
	));
	
	$session = $facebook->getSession();
	
	$submitType = $_GET['submitType'];
	
	$user		= $facebook->getUser();
	
	if ($_SESSION['facebookID'] > 1)
	{
		
		echo "<div class='submitFrame' style='position: relative; top: -10px; height: 500px;'>";
			
			echo "<div class='administration' style='background: white;'>";
			
				echo "<div class='topHeader'>";
					
					if ($submitType == "post")
					{
						echo "make a post";
					}
					else if ($submitType == "event")
					{
						echo "create an event";
					}
					
				echo "</div>";
			
				$submitStep = $_GET['submitStep'];
				
				if (!$submitStep)
				{
					$submitStep = 1;
					
					if ($submitType == "event")
					{
						$submitStep = 2;
					}
				}
				
				if ($submitStep == 1)
				{
					if ($type != 'event')
					{
						$displayStep = $submitStep;
					}
					else
					{
						$displayStep = $submitStep - 1;
					}
					
					$urlVarsArticle = "\"&submitStep=2&type=article\"";
					$urlVarsPhoto	= "\"&submitStep=2&type=photo\"";
					$urlVarsVideo	= "\"&submitStep=2&type=video\"";
					
					echo "<div class='sectionHeader'>";
						echo "step $displayStep: select a post type";
					echo "</div>";
					
					echo "<div class='sectionText'>";
						echo "What are you posting?";
					echo "</div>";
					
					echo "<a class='greyButton unselectableWithPointer submitPostButton' style='height: 65px; width: 65px; position: relative; padding: 0; margin-right: 10px;' href='javascript:navigate($urlVarsArticle)'>";
						
						echo "<div style='display: block; font-family: Lucida Sans; font-size: 13px; text-transform: capitalize; position: absolute; left: 12px; top: 8px;'>";
							echo "article";
						echo "</div>";
						
						echo "<img src='../../../../images/other/submitArticle.png' style='position: absolute; left: 18px; top: 28px;'>";
						
					echo "</a>";
					
					echo "<a class='greyButton unselectableWithPointer submitPostButton' style='height: 65px; width: 65px; position: relative; padding: 0; margin-right: 10px;' href='javascript:navigate($urlVarsVideo)'>";
						
						echo "<div style='display: block; font-family: Lucida Sans; font-size: 13px; text-transform: capitalize; position: absolute; left: 14px; top: 8px;'>";
							echo "video";
						echo "</div>";
						
						echo "<img src='../../../../images/other/submitVideo.png' style='position: absolute; left: 16px; top: 28px;'>";
						
					echo "</a>";
					
					echo "<a class='greyButton unselectableWithPointer submitPostButton' style='height: 65px; width: 65px; position: relative; padding: 0; margin-right: 10px;' href='javascript:navigate($urlVarsPhoto)'>";
						
						echo "<div style='display: block; font-family: Lucida Sans; font-size: 13px; text-transform: capitalize; position: absolute; left: 15px; top: 8px;'>";
							echo "photo";
						echo "</div>";
						
						echo "<img src='../../../../images/other/submitPhoto.png' style='position: absolute; left: 18px; top: 32px;'>";
						
					echo "</a>";
										
				}
				else if ($submitStep == 2)
				{
					$type = $_GET['type'];
					
					if ($submitType == 'event')
					{
						$type = 'event';
					}
					
					
					if ($type != 'event')
					{
						$displayStep = $submitStep;
					}
					else
					{
						$displayStep = $submitStep - 1;
					}
					
					
					if ($type != 'photo')
					{
						$displayType = $type;
					}
					else
					{
						$displayType = 'photo gallery';
					}
					
					echo "<div class='sectionHeader'>";
						echo "step $displayStep: choose an account";
					echo "</div>";
					
					if ($type == 'article' || $type == 'video')
					{
						echo "<div class='sectionText'>";
							echo "Who are you posting your $displayType for? If you choose yourself, the $displayType will be posted to your personal profile. If you choose an organization, the $displayType will be posted to the organization's page.";
						echo "</div>";
					}
					else
					{
						echo "<div class='sectionText'>";
							echo "Who are you posting your $displayType for?";
						echo "</div>";
					}
					
					$userFacebookID = $facebook->getUser();
								
					if($type == 'article' || $type == 'video')
					{
						$response2	  = generateQueryArray("SELECT name,pic_square from users WHERE facebookID=$userFacebookID");
						
						$urlVarsUser  = "\"&submitStep=3&type=$type&facebookID=";
						$urlVarsUser .= $userFacebookID;
						$urlVarsUser .= "\"";
						
						echo "<a class='registerIcon' style='color: #666666; width: 115px; vertical-align: top; padding-top: 4px; padding-bottom: 4px; margin-bottom: 10px;' href='javascript:navigate(". $urlVarsUser .")'>";
						
							echo "<img style= 'border: 1px solid #BAC9D1' src='" . $response2[0][pic_square] . "'>";
							
							echo "<div style='margin-top: 2px'>";
								echo $response2[0][name];
							echo "</div>";
						
						echo "</a>";
					}
					
					
					$accessToken = $session['access_token'];
					$accounts = $facebook->api("/$userFacebookID/accounts?access_token=$accessToken");
					$arraySize = count($accounts['data']) - 1;
					
					for ($i = 0; $i <= $arraySize; $i++)
					{
						$currentAccount = $accounts['data'][$i]['id'];
						$accountList   .= "'$currentAccount'";
						
						if ($i < $arraySize)
						{
							$accountList .= ",";
						}
					}
										
					$organizationInfo = generateQueryArray("SELECT name,pic_square,facebookID FROM users WHERE facebookID IN ($accountList)");
					$arraySize = count($organizationInfo) - 1;
					
					for ($i = 0; $i<= $arraySize; $i++)
					{
						$urlVars[$i]  = "\"&submitStep=3&type=$type&facebookID=";
						$urlVars[$i] .= $organizationInfo[$i]['facebookID'];
						$urlVars[$i] .= "\"";
						
						echo "<a class='registerIcon' style='color: #666666; width: 115px; vertical-align: top; padding-top: 4px; padding-bottom: 4px; margin-bottom: 10px;' href='javascript:navigate(". $urlVars[$i] .")'>";
						
							echo "<img style= 'border: 1px solid #BAC9D1' src='" . $organizationInfo[$i][pic_square] . "'>";
							
							echo "<div style='margin-top: 2px'>";
								echo $organizationInfo[$i][name];
							echo "</div>";
						
						echo "</a>";
					}
					
					
					
										
				}
				else if ($submitStep == 3)
				{
					$type		= $_GET['type'];
					$facebookID	= $_GET['facebookID'];
					
					if ($type != 'event')
					{
						$displayStep = $submitStep;
					}
					else
					{
						$displayStep = $submitStep - 1;
					}
					
					if ($type != 'photo')
					{
						$displayType = $type;
					}
					else
					{
						$displayType = 'photo gallery';
					}
					
					if ($type == 'video')
					{
						error_reporting(0);	
							$tokenInfo = generateQueryArray("SELECT token from tokens WHERE accountFacebookID=$facebookID AND site = 'youtube' ");
						error_reporting(E_ERROR | E_WARNING | E_PARSE);
						
						if ($tokenInfo)
						{
							$_SESSION['sessionToken'] = $tokenInfo[0]['token'];
						}
						else
						{
							$notConnected = 1;
						}
					}
					
					if ($notConnected != 1)
					{
						echo "<div class='sectionHeader'>";
							echo "Step $displayStep: select a category";
						echo "</div>";
						
						echo "<form name='submitform' method='post' action='submit.php?submitType=$submitType&submitStep=4&type=$type&facebookID=$facebookID'>";
											
							echo "<div class='sectionText'>";
								echo "What is the category of your $displayType?";
							echo "</div>";
							
							generatePiece_categoryRadioButtons();
							
							echo "<input type='submit' value='next' style='position: relative; display:block; width: 50px; height: 25px; padding-top: 4px;' class='greyButton unselectableWithPointer'>";
						
						echo "</form>";
					}
					else
					{
						echo "<div class='sectionHeader'>";
							echo "Connect your account to a YouTube Channel.";
						echo "</div>";
						
						echo "<div class='sectionText'>";
							echo "To post a video on The Emory Bubble, you must first connect your account to your YouTube channel.";
						echo "</div>";
						
						echo "<a href='../../../../../accounts.php?manageFacebookID=$facebookID' target='_parent' style='margin-top: 15px; position: relative; display:block;  height: 15px; width: 165px;' class='greyButton'>";
							echo "manage connected accounts";
						echo "</a>";
					}								
				}
				else if ($submitStep == 4)
				{
					$category	= $HTTP_POST_VARS['category'];
					$type		= $_GET['type'];
					$facebookID	= $_GET['facebookID'];
					
					if ($type != 'event')
					{
						$displayStep = $submitStep;
					}
					else
					{
						$displayStep = $submitStep - 1;
					}
											
					if ($type == 'article')
					{
						echo "<div class='sectionHeader'>";
								echo "step $displayStep: enter your article information";
							echo "</div>";
							
						echo "<form name='registerform' method='post' enctype='multipart/form-data' action='submit.php?submitType=$submitType&submitStep=5&type=$type&facebookID=$facebookID&category=$category'>";
						
							echo "<div class='sectionText'>";
								echo "What is the title of your article?";
							echo "</div>";
							
							echo "<input type='text' name='name' maxlength='50' style='border-radius: 4px; -moz-border-radius: 4px; border: 1px solid #E2E9ED; box-shadow:	inset 1px 1px 0px #CCCCCC; -moz-box-shadow:	inset 1px 1px 0px #CCCCCC; padding-top: 3px; padding-bottom: 3px; padding-left: 7px; padding-right: 7px; width: 430px;' class='sectionText'>";							
							
							echo "<div class='sectionText'>";
								echo "Write your article.";
							echo "</div>";
							
							echo "<textarea name='description' maxlength='1000' style='resize: none; border-radius: 4px; -moz-border-radius: 4px; border: 1px solid #E2E9ED; box-shadow:	inset 1px 1px 0px #CCCCCC; -moz-box-shadow:	inset 1px 1px 0px #CCCCCC; padding-top: 3px; padding-bottom: 3px; padding-left: 7px; padding-right: 7px; width: 430px;  height: 400px;' class='sectionText'></textarea>";
							
							echo "<input type='submit' value='post article' style='position: relative; display:block; height: 25px; padding-top: 4px;' class='greyButton unselectableWithPointer'>";
													
						echo "</form>";
					}
					else if ($type == 'video')
					{
						$_SESSION['videoOrganizationID']	= $facebookID;
						$_SESSION['videoPostCategory']		= $category;
						
						echo "<div class='sectionHeader'>";
							echo "step $displayStep: enter your video details";
						echo "</div>";
						
						include_once('videoUpload.php');
					}
					else if ($type == 'photo')
					{
						echo "<div class='sectionHeader'>";
								echo "step $displayStep: enter your gallery information";
							echo "</div>";
							
						echo "<form name='registerform' method='post' enctype='multipart/form-data' action='submit.php?submitType=$submitType&submitStep=5&type=$type&facebookID=$facebookID&category=$category'>";
						
							echo "<div class='sectionText'>";
								echo "Which photos would you like to upload?";
							echo "</div>";
							
							echo "<input type='file' name='file[]' multiple='' maxlength='50' style='border-radius: 4px; -moz-border-radius: 4px; border: 1px solid #E2E9ED; box-shadow:	inset 1px 1px 0px #CCCCCC; -moz-box-shadow:	inset 1px 1px 0px #CCCCCC; padding-top: 3px; padding-bottom: 3px; padding-left: 7px; padding-right: 7px; width: 430px;' class='sectionText'>";
						
							echo "<div class='sectionText'>";
								echo "What is the title of your photo gallery?";
							echo "</div>";
							
							echo "<input type='text' name='name' maxlength='50' style='border-radius: 4px; -moz-border-radius: 4px; border: 1px solid #E2E9ED; box-shadow:	inset 1px 1px 0px #CCCCCC; -moz-box-shadow:	inset 1px 1px 0px #CCCCCC; padding-top: 3px; padding-bottom: 3px; padding-left: 7px; padding-right: 7px; width: 430px;' class='sectionText'>";
							
							echo "<div class='sectionText'>";
								echo "Where were these photos taken?";
							echo "</div>";
							
							echo "<input type='text' name='location' maxlength='50' style='border-radius: 4px; -moz-border-radius: 4px; border: 1px solid #E2E9ED; box-shadow:	inset 1px 1px 0px #CCCCCC; -moz-box-shadow:	inset 1px 1px 0px #CCCCCC; padding-top: 3px; padding-bottom: 3px; padding-left: 7px; padding-right: 7px; width: 430px;' class='sectionText'>";
							
							echo "<div class='sectionText'>";
								echo "More info?";
							echo "</div>";
							
							echo "<input type='text' name='description' maxlength='50' style='border-radius: 4px; -moz-border-radius: 4px; border: 1px solid #E2E9ED; box-shadow:	inset 1px 1px 0px #CCCCCC; -moz-box-shadow:	inset 1px 1px 0px #CCCCCC; padding-top: 3px; padding-bottom: 3px; padding-left: 7px; padding-right: 7px; width: 430px; height: 180px;' class='sectionText'>";
							
							echo "<input type='submit' value='create photo gallery' style='position: relative; display:block; height: 25px; padding-top: 4px;' class='greyButton unselectableWithPointer'>";
													
						echo "</form>";
					}
					else if ($type == 'event')
					{
						echo "<div class='sectionHeader'>";
								echo "step $displayStep: enter your event information";
							echo "</div>";
							
						echo "<form name='registerform' method='post' action='submit.php?submitType=$submitType&submitStep=5&type=$type&facebookID=$facebookID&category=$category'>";
						
						
							echo "<div class='sectionText'>";
								echo "When does your event start?";
							echo "</div>";
							
							echo "<input type='text' value='00/00/00' name='start_date' maxlength='50' style='border-radius: 4px; -moz-border-radius: 4px; border: 1px solid #E2E9ED; box-shadow:	inset 1px 1px 0px #CCCCCC; -moz-box-shadow:	inset 1px 1px 0px #CCCCCC; padding-top: 3px; padding-bottom: 3px; padding-left: 7px; padding-right: 7px; margin-right: 8px; width: 200px; display: inline-block;' class='sectionText'>";
							
							echo "<input type='text' value='00:00 pm' name='start_time' maxlength='50' style='border-radius: 4px; -moz-border-radius: 4px; border: 1px solid #E2E9ED; box-shadow:	inset 1px 1px 0px #CCCCCC; -moz-box-shadow:	inset 1px 1px 0px #CCCCCC; padding-top: 3px; padding-bottom: 3px; padding-left: 7px; padding-right: 7px; width: 100px; display: inline-block;' class='sectionText'>";
							
							
							echo "<div class='sectionText'>";
								echo "When does your event end?";
							echo "</div>";
							
							echo "<input type='text' value='00/00/00' name='end_date' maxlength='50' style='border-radius: 4px; -moz-border-radius: 4px; border: 1px solid #E2E9ED; box-shadow:	inset 1px 1px 0px #CCCCCC; -moz-box-shadow:	inset 1px 1px 0px #CCCCCC; padding-top: 3px; padding-bottom: 3px; padding-left: 7px; padding-right: 7px; margin-right: 8px; width: 200px; display: inline-block;' class='sectionText'>";
							
							echo "<input type='text' value='00:00 pm' name='end_time' maxlength='50' style='border-radius: 4px; -moz-border-radius: 4px; border: 1px solid #E2E9ED; box-shadow:	inset 1px 1px 0px #CCCCCC; -moz-box-shadow:	inset 1px 1px 0px #CCCCCC; padding-top: 3px; padding-bottom: 3px; padding-left: 7px; padding-right: 7px; width: 100px; display: inline-block;' class='sectionText'>";
							
						
							echo "<div class='sectionText'>";
								echo "What is the title of your event?";
							echo "</div>";
							
							echo "<input type='text' name='name' style='border-radius: 4px; -moz-border-radius: 4px; border: 1px solid #E2E9ED; box-shadow:	inset 1px 1px 0px #CCCCCC; -moz-box-shadow:	inset 1px 1px 0px #CCCCCC; padding-top: 3px; padding-bottom: 3px; padding-left: 7px; padding-right: 7px; width: 430px;' class='sectionText'>";
							
							echo "<div class='sectionText'>";
								echo "Where is your event?";
							echo "</div>";
							
							echo "<input type='text' name='location' style='border-radius: 4px; -moz-border-radius: 4px; border: 1px solid #E2E9ED; box-shadow:	inset 1px 1px 0px #CCCCCC; -moz-box-shadow:	inset 1px 1px 0px #CCCCCC; padding-top: 3px; padding-bottom: 3px; padding-left: 7px; padding-right: 7px; width: 430px;' class='sectionText'>";
							
							echo "<div class='sectionText' style='margin-top: 20px;'>";
								echo "More info?";
							echo "</div>";
											
							echo "<textarea name='description' style='resize: none; border-radius: 4px; -moz-border-radius: 4px; border: 1px solid #E2E9ED; box-shadow:	inset 1px 1px 0px #CCCCCC; -moz-box-shadow:	inset 1px 1px 0px #CCCCCC; padding-top: 3px; padding-bottom: 3px; padding-left: 7px; padding-right: 7px; width: 430px;  height: 180px;' class='sectionText'></textarea>";
							
							echo "<input type='submit' value='create event' style='position: relative; display:block; height: 25px; padding-top: 4px;' class='greyButton unselectableWithPointer'>";
						
						echo "</form>";
					}
									
				}
				else if ($submitStep == 5)
				{
					$type 				= $_GET['type'];
					$category 			= $_GET['category'];
					$facebookID			= $_GET['facebookID'];
					
										
					if ($type == 'article')
					{
						echo "<img src='../../../../images/other/ajaxLoader.gif' style='margin-top: 20px; margin-left: 325px;'>";
						
						$name				= $HTTP_POST_VARS['name'];
						$description		= $HTTP_POST_VARS['description'];
						$accountNameGrab	= generateQueryArray("SELECT name FROM users where facebookID = $facebookID");
						
						$accountName 		= $accountNameGrab[0]['name'];
													
						$query = mysql_query("INSERT INTO articles (accountFacebookID, accountName, name, description, category) VALUES ('$facebookID', '$accountName', '$name', '$description', '$category')");
						
						$articleIDGrab  = generateQueryArray("SELECT postCampusBubbleID FROM articles WHERE accountFacebookID = $facebookID");
						$articleID		= $articleIDGrab[0]['postCampusBubbleID'];
						
						
						$redirectURL="../../../../../article.php?id=$articleID";
						
						echo "<div style='height: 200px; background: white; position: relative; top: -50px;'>";
							echo "<div class='sectionHeader'>";
								echo "success";
							echo "</div>";
							
							echo "<div class='sectionText'>";
								echo "Congratulations! You have successfully posted an article.";
							echo "</div>";
							
							echo "<a href='$redirectURL' target='_parent' class='dynamicGreyButton' style='padding: 5px; position: relative; top: 0; left: 10px;'>";
								echo "view article";
							echo "</a>";
						echo "</div>";	
						
					}
					else if ($type == 'video')
					{
						echo "success!";
					}
					else if ($type == 'photo')
					{
						echo "<img src='../../../../images/other/ajaxLoader.gif' style='margin-top: 20px; margin-left: 325px;'>";
						
						$name				= $HTTP_POST_VARS['name'];
						$location			= $HTTP_POST_VARS['location'];
						$description		= $HTTP_POST_VARS['description'];
						$file				= $_FILES['file'];
						$fileAddress		= $file['tmp_name'];
						
						$fileArraySize 		= count($fileAddress) - 1;
						
						$accessToken = $session['access_token'];
						
						$facebookAlt = new Facebook(array(
							'appId'  => '219781404699497',
							'secret' => '11efd0dea9edbb5461a0b74c6227ff42',
							'cookie' => true
						));
						
						$user 			= $facebook->getUser();
						$accountsGrab 	= $facebook->api("$user/accounts");
						$userAccounts	= $accountsGrab['data'];
						
						$arraySize		= count($userAccounts) - 1;
						
						for ($i = 0; $i <= $arraySize; $i++)
						{
							if ($facebookID == $userAccounts[$i]['id'])
							{
								$accessToken = $userAccounts[$i]['access_token'];
							}
						}
						
												
						//At the time of writing it is necessary to enable upload support in the Facebook SDK, you do this with the line:
						$facebookAlt->setFileUploadSupport(true);
						  
						//Create an album
						$album_details  	= array(
						    "access_token" 	=> "$accessToken",
						    'message'		=> $description,
						    'location'		=> $location,
						    'name'			=> $name
						);
						$create_album = $facebookAlt->api("/$facebookID/albums", "post", $album_details);
						  
						//Get album ID of the album you've just created
						$album_uid = $create_album['id'];
						
						$redirectURL = "../../../../../photo.php?id=$album_uid";
						
						 
						for ($i = 0; $i <= $fileArraySize; $i++)
						{
							$photo_details = array(
							    "access_token" 	=> "$accessToken"
							);
							
							$photo_details['image'] = '@' . realpath($fileAddress[$i]);
							  
							$upload_photo = $facebookAlt->api('/'.$album_uid.'/photos?limit=400&offset=0', 'post', $photo_details);
						}
						
						$galleriesGrab		= $facebook->api("/$facebookID/albums");
						$galleries			= $galleriesGrab['data'][0];
						
						$postFacebookID			= addslashes($galleries['id']);
						$accountFacebookID		= addslashes($galleries['from']['id']);
						$accountName			= addslashes($galleries['from']['name']);
						$name					= addslashes($galleries['name']);
						$description			= addslashes($galleries['description']);
						$location				= addslashes($galleries['location']);
						$link					= addslashes($galleries['link']);
						$cover_photo			= addslashes($galleries['cover_photo']);
						$privacy				= addslashes($galleries['privacy']);
						$count					= addslashes($galleries['count']);
						$albumType				= addslashes($galleries['type']);
						$created_time			= addslashes($galleries['created_time']);
						$updated_time			= addslashes($galleries['updated_time']);
						$albumID				= $postFacebookID;
						
						
							$query = mysql_query("INSERT INTO galleries (postFacebookID, accountFacebookID, accountName, name, description, location, link, cover_photo, privacy, count, albumType, created_time, updated_time, category) VALUES ('$postFacebookID', '$accountFacebookID', '$accountName', '$name', '$description', '$location', '$link', '$cover_photo', '$privacy', '$count', '$albumType', '$created_time', '$updated_time', '$category')");
							
							
							$galleryID = $galleries['id'];
							$photosGrab = $facebook->api("/$galleryID/photos");
							$photos = $photosGrab['data'];
							
							$arraySize	= count($photos) - 1;
							
							for ($j = 0; $j <= $arraySize; $j++)
							{
								$postFacebookID			= addslashes($photos[$j]['id']);
								$accountFacebookID		= addslashes($photos[$j]['from']['id']);
								$accountName			= addslashes($photos[$j]['from']['name']);
								$name					= addslashes($photos[$j]['name']);
								$icon					= addslashes($photos[$j]['icon']);
								$picture				= addslashes($photos[$j]['picture']);
								$source					= addslashes($photos[$j]['source']);
								$height					= addslashes($photos[$j]['height']);
								$width					= addslashes($photos[$j]['width']);
								$link					= addslashes($photos[$j]['link']);
								$created_time			= addslashes($photos[$j]['created_time']);
								$updated_time			= addslashes($photos[$j]['updated_time']);
								$position				= addslashes($photos[$j]['position']);
								
								$query = mysql_query("INSERT INTO photos (postFacebookID, accountFacebookID, accountName, name, icon, picture, source, height, width, link, created_time, updated_time, position, albumID) VALUES ('$postFacebookID', '$accountFacebookID', '$accountName', '$name', '$icon', '$picture', '$source', '$height', '$width', '$link', '$created_time', '$updated_time', '$position', '$albumID')");
							}
						
						
						echo "<div style='height: 200px; background: white; position: relative; top: -50px;'>";	
							echo "<div class='sectionHeader'>";
								echo "success";
							echo "</div>";
							
							echo "<div class='sectionText'>";
								echo "Congratulations! You have successfully created a photo gallery.";
							echo "</div>";
							
							echo "<a href='$redirectURL' target='_parent' class='dynamicGreyButton' style='padding: 5px; position: relative; top: 0; left: 10px;'>";
								echo "view photo gallery";
							echo "</a>";
						echo "</div>";
						
					}
					else if ($type == 'event')
					{
						echo "<img src='../../../../images/other/ajaxLoader.gif' style='margin-top: 20px; margin-left: 325px;'>";
						
						$name				= $HTTP_POST_VARS['name'];
						$location			= $HTTP_POST_VARS['location'];
						$description		= $HTTP_POST_VARS['description'];
						
						$inputStartDate 	= $HTTP_POST_VARS['start_date'];
						$inputStartTime 	= $HTTP_POST_VARS['start_time'];
						$inputStartDateTime = "$inputStartDate $inputStartTime";
						$startDateTime		= strtotime($inputStartDateTime) + 10800;
						
						$inputEndDate 		= $HTTP_POST_VARS['end_date'];
						$inputEndTime 		= $HTTP_POST_VARS['end_time'];
						$inputEndDateTime 	= "$inputEndDate $inputEndTime";
						$endDateTime		= strtotime($inputEndDateTime) + 10800;
						
						
						$accessToken = $session['access_token'];
						
						$event_param = array(
						    "access_token" 	=> $accessToken,
						    "name" 			=> $name,
						    "start_time" 	=> $startDateTime,
						    "end_time" 		=> $endDateTime,
						    "description" 	=> $description,
						    "location"		=> $location,
						    "page_id"		=> $facebookID
						);
						$event_id 	= $facebook->api("/$facebookID/events", "POST", $event_param);
						
						$pageEvents = $facebook->api("/$facebookID/events");
						$events		= $pageEvents['data'];
						
						$i = 0;
						$singleEvent[$i] = $facebook->api($events[$i]['id']);
											
						
						$postFacebookID			= addslashes($singleEvent[$i]['id']);
						$accountFacebookID		= addslashes($singleEvent[$i]['owner']['id']);
						$accountName			= addslashes($singleEvent[$i]['owner']['name']);
						$name					= addslashes($singleEvent[$i]['name']);
						$description			= addslashes($singleEvent[$i]['description']);
						$start_time				= addslashes( strtotime($singleEvent[$i]['start_time']) );
						$end_time				= addslashes( strtotime($singleEvent[$i]['end_time']) );
						$location				= addslashes($singleEvent[$i]['location']);
						$privacy				= addslashes($singleEvent[$i]['privacy']);
						$updated_time			= addslashes($singleEvent[$i]['updated_time']);
												
						/*
						$fqlQuery	= "SELECT pic_big FROM event WHERE eid='$postFacebookID' ";
						$response	= $facebook->api(array('method' => 'fql.query','query' =>$fqlQuery));
						$image		= $response[0]['pic_big'];
						*/
							
						$query = mysql_query("INSERT INTO events (postFacebookID, accountFacebookID, accountName, name, description, start_time, end_time, location, privacy, updated_time, category) VALUES ('$postFacebookID', '$accountFacebookID', '$accountName', '$name', '$description', '$start_time', '$end_time', '$location', '$privacy', '$updated_time', '$category')");
						
						$redirectURL="../../../../../event.php?id=$postFacebookID";
						
						echo "<div style='height: 200px; background: white; position: relative; top: -50px;'>";
							echo "<div class='sectionHeader'>";
								echo "success";
							echo "</div>";
							
							echo "<div class='sectionText'>";
								echo "Congratulations! You have successfully created an event.";
							echo "</div>";
							
							echo "<a href='$redirectURL' target='_parent' class='dynamicGreyButton' style='padding: 5px; position: relative; top: 0; left: 10px;'>";
								echo "view event";
							echo "</a>";
						echo "</div>";	
					}
				}
			
			echo "</div>";		
			
		echo "</div>";
	
	}
	else
	{
		echo "<div class='administration' style='background: white;'>";
			echo "<div class='sectionHeader'>";
				echo "Log in";
			echo "</div>";
			
			echo "<div class='sectionText'>";
				if ($submitType == "post")
				{
					echo "You must be logged in to make a post.";
				}
				else if ($submitType == "event")
				{
					echo "You must be logged in to create an event.";
				}
			echo "</div>";
			
			echo "<a href='../../../../../login.php' target='_parent' class='dynamicGreyButton' style='padding: 5px; position: relative; top: 0; left: 0;'>";
				echo "log in";
			echo "</a>";
			
			echo "<a href='../../../../../register.php' target='_parent' class='dynamicGreyButton' style='padding: 5px; position: relative; top: 0; left: 10px;'>";
				echo "sign up";
			echo "</a>";
		echo "</div>";
	}

?>