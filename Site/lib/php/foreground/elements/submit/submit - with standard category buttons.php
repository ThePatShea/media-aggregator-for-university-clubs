<?php 
	
	session_start();
	
	include_once('../../../background/databaseConnect.php');
	include_once('../../../background/getPosts.php');
	include_once('../../../background/universalBackground.php');
	include_once("../../../foreground/pieces/universalPieces.php");
	include_once('../../../../css/style.php');
	include_once("../../../foreground/pieces/list.php");
	require("../../../background/registerFacebook.php");

	function generatePiece_categoryStandardButtons($type,$facebookID)
	{
		echo "<a class='registerIcon' style='color: #666666; width: 85px; vertical-align: top; padding-top: 4px; padding-bottom: 4px; margin-bottom: 10px;' href='javascript:navigate(\"&submitStep=4&type=$type&facebookID=$facebookID&category=news\")'>";
		
			echo "<div class='categoryBox category_news'>NE</div>";
			
			echo "<div style='margin-top: 2px'>";
				echo "news";
			echo "</div>";
		
		echo "</a>";
		
		echo "<a class='registerIcon' style='color: #666666; width: 80px; vertical-align: top; padding-top: 4px; padding-bottom: 4px; margin-bottom: 10px;' href='javascript:navigate(\"&submitStep=4&type=$type&facebookID=$facebookID&category=community\")'>";
		
			echo "<div class='categoryBox category_community'>CM</div>";
			
			echo "<div style='margin-top: 2px'>";
				echo "community";
			echo "</div>";
		
		echo "</a>";
		
		echo "<a class='registerIcon' style='color: #666666; width: 80px; vertical-align: top; padding-top: 4px; padding-bottom: 4px; margin-bottom: 10px;' href='javascript:navigate(\"&submitStep=4&type=$type&facebookID=$facebookID&category=arts\")'>";
		
			echo "<div class='categoryBox category_arts'>AR</div>";
			
			echo "<div style='margin-top: 2px'>";
				echo "arts";
			echo "</div>";
		
		echo "</a>";
		
		echo "<a class='registerIcon' style='color: #666666; width: 80px; vertical-align: top; padding-top: 4px; padding-bottom: 4px; margin-bottom: 10px;' href='javascript:navigate(\"&submitStep=4&type=$type&facebookID=$facebookID&category=entertainment\")'>";
		
			echo "<div class='categoryBox category_entertainment'>ET</div>";
			
			echo "<div style='margin-top: 2px'>";
				echo "entertainment";
			echo "</div>";
		
		echo "</a>";
		
		echo "<a class='registerIcon' style='color: #666666; width: 80px; vertical-align: top; padding-top: 4px; padding-bottom: 4px; margin-bottom: 10px;' href='javascript:navigate(\"&submitStep=4&type=$type&facebookID=$facebookID&category=politics\")'>";
		
			echo "<div class='categoryBox category_politics'>PL</div>";
			
			echo "<div style='margin-top: 2px'>";
				echo "politics";
			echo "</div>";
		
		echo "</a>";
		
		echo "<a class='registerIcon' style='color: #666666; width: 80px; vertical-align: top; padding-top: 4px; padding-bottom: 4px; margin-bottom: 10px;' href='javascript:navigate(\"&submitStep=4&type=$type&facebookID=$facebookID&category=athletics\")'>";
		
			echo "<div class='categoryBox category_athletics'>AT</div>";
			
			echo "<div style='margin-top: 2px'>";
				echo "athletics";
			echo "</div>";
		
		echo "</a>";
		
		echo "<a class='registerIcon' style='color: #666666; width: 80px; vertical-align: top; padding-top: 4px; padding-bottom: 4px; margin-bottom: 10px;' href='javascript:navigate(\"&submitStep=4&type=$type&facebookID=$facebookID&category=academics\")'>";
		
			echo "<div class='categoryBox category_academics'>AC</div>";
			
			echo "<div style='margin-top: 2px'>";
				echo "academics";
			echo "</div>";
		
		echo "</a>";
	}

	$_SESSION['developerKey'] = 'AI39si5Mo3UUmOLCCs7R3s76T3UdjolGGAzOaGYC43FMkLXxgSQtxjW3VbDuIm23lAW-9HUskCYKt8ro3Bi81-RxLzMsAadB1g';
	 
	function uploadStatus($status, $code = null, $videoId = null)
	{
	    switch ($status) {
	        case $status < 400:
	            echo  'Success ! Entry created (id: '. $videoId .
	                  ') <a href="#" onclick=" ytVideoApp.checkUploadDetails(\''.
	                  $videoId .'\'); ">(check details)</a>';
	            break;
	        default:
	            echo 'There seems to have been an error: '. $code .
	                 '<a href="#" onclick=" ytVideoApp.checkUploadDetails(\''.
	                 $videoId . '\'); ">(check details)</a>';
	    }
	}
	
	function authenticated()
	{
	    if (isset($_SESSION['sessionToken'])) {
	        return true;
	    }
	}
	
	/**
	 * Helper function to print a list of authenticated actions for a user.
	 */
	function printAuthenticatedActions()
	{
	   echo 
	   '
	   		<body onload="ytVideoApp.prepareUploadForm();
	   		return false;">
	        
	        	<div id="syndicatedUploadDiv"></div>
	        	<div id="syndicatedUploadStatusDiv"></div>
	        
	        </body>
	   ';
	}
	

	echo "
	
		<style>
		
			#syndicatedUploadDiv
				{
					font-family: 		'Lucida Grande';
					font-size: 			11px;
					color: 				#666666;
					text-shadow: 		1px 1px 0px white;
					display: 			block;
					line-height: 		17px;
					margin-bottom: 		10px;
				}
			
					#syndicatedUploadDiv textarea
					{
						resize: 			none;
						border-radius: 		4px;
						-moz-border-radius: 4px;
						border: 			1px solid #E2E9ED;
						box-shadow:			inset 1px 1px 0px #CCCCCC;
						-moz-box-shadow:	inset 1px 1px 0px #CCCCCC;
						padding-top: 		3px;
						padding-bottom: 	3px;
						padding-left: 		7px;
						padding-right: 		7px;
						width: 				430px;
						
						font-family: 		'Lucida Grande';
						font-size: 			11px;
						color: 				#666666;
						text-shadow: 		1px 1px 0px white;
						display: 			block;
						line-height: 		17px;
						margin-bottom: 		10px;
					}
					
					.submitFormText
					{
						border-radius: 		4px;
						-moz-border-radius: 4px;
						border: 			1px solid #E2E9ED;
						box-shadow:			inset 1px 1px 0px #CCCCCC;
						-moz-box-shadow:	inset 1px 1px 0px #CCCCCC;
						padding-top: 		3px;
						padding-bottom: 	3px;
						padding-left: 		7px;
						padding-right: 		7px;
						width: 				430px;
						
						font-family: 		'Lucida Grande';
						font-size: 			11px;
						color: 				#666666;
						text-shadow: 		1px 1px 0px white;
						display: 			block;
						line-height: 		17px;
						margin-bottom: 		10px;
					}
					
					.submitNextButton
					{
						position: 			relative;
						display:			block;
						width:	 			50px; 
						height: 			25px; 
						padding-top: 		4px;
					}
		
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
	
	if(!empty($session) && $_SESSION['loggedOut'] != 'true') {
		# Active session, let's try getting the user id (getUser()) and user info (api->('/me'))
		try{
			$uid = $facebook->getUser();
			$user = $facebook->api('/me');
		} catch (Exception $e){}
		
		echo "<div class='submitFrame' style='position: relative; top: -10px; height: 500px;'>";
			
			echo "<div class='administration' style='background: white;'>";
			
				echo "<div class='topHeader'>";
					
					$submitType = $_GET['submitType'];
					
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
						$displayStep = $submitStep + 1;
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
					
					echo "<a class='greyButton unselectableWithPointer submitPostButton' style='height: 65px; width: 65px; position: relative; padding: 0; margin-right: 20px;' href='javascript:navigate($urlVarsArticle)'>";
						
						echo "<div style='display: block; font-family: Lucida Sans; font-size: 13px; text-transform: capitalize; position: absolute; left: 12px; top: 8px;'>";
							echo "article";
						echo "</div>";
						
						echo "<img src='../../../../images/other/submitArticle.png' style='position: absolute; left: 18px; top: 28px;'>";
						
					echo "</a>";
					
					echo "<a class='greyButton unselectableWithPointer submitPostButton' style='height: 65px; width: 65px; position: relative; padding: 0; margin-right: 20px;' href='javascript:navigate($urlVarsVideo)'>";
						
						echo "<div style='display: block; font-family: Lucida Sans; font-size: 13px; text-transform: capitalize; position: absolute; left: 14px; top: 8px;'>";
							echo "video";
						echo "</div>";
						
						echo "<img src='../../../../images/other/submitVideo.png' style='position: absolute; left: 16px; top: 28px;'>";
						
					echo "</a>";
					
					echo "<a class='greyButton unselectableWithPointer submitPostButton' style='height: 65px; width: 65px; position: relative; padding: 0; margin-right: 20px;' href='javascript:navigate($urlVarsPhoto)'>";
						
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
						$displayStep = $submitStep + 1;
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
						echo "step $displayStep: choose who to post for";
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
										
					if($type == 'article' || $type == 'video')
					{
						
						$fqlQuery	= "SELECT name,uid,pic_square from user WHERE uid=me() ";
						$response2	= $facebook->api(array('method' => 'fql.query','query' =>$fqlQuery));
						
						$urlVarsUser  = "\"&submitStep=3&type=$type&facebookID=";
						$urlVarsUser .= $response2[0]['uid'];
						$urlVarsUser .= "\"";
						
						echo "<a class='registerIcon' style='color: #666666; width: 115px; vertical-align: top; padding-top: 4px; padding-bottom: 4px; margin-bottom: 10px;' href='javascript:navigate(". $urlVarsUser .")'>";
						
							echo "<img style= 'border: 1px solid #BAC9D1' src='" . $response2[0][pic_square] . "'>";
							
							echo "<div style='margin-top: 2px'>";
								echo $response2[0][name];
							echo "</div>";
						
						echo "</a>";
					}
					
					$fqlQuery	= "SELECT page_id from page_admin WHERE uid=me() ";
					$response	= $facebook->api(array('method' => 'fql.query','query' =>$fqlQuery));
					
					$numberOfPages = count($response) - 1;
					
					for ($i = 0; $i<= $numberOfPages; $i++)
					{
						$pageResult = generateQueryArray("SELECT facebookID FROM users WHERE facebookID = " . $response[$i][page_id]);
						
						if ($pageResult)
						{
							$fqlQuery	= "SELECT name,page_id,pic_square from page WHERE page_id=" . $response[$i][page_id];
							$response2	= $facebook->api(array('method' => 'fql.query','query' =>$fqlQuery));
							
							if ($response2[0][name] != 'Unnamed App')
							{
								$urlVars[$i]  = "\"&submitStep=3&type=$type&facebookID=";
								$urlVars[$i] .= $response2[0]['page_id'];
								$urlVars[$i] .= "\"";
								
								echo "<a class='registerIcon' style='color: #666666; width: 115px; vertical-align: top; padding-top: 4px; padding-bottom: 4px; margin-bottom: 10px;' href='javascript:navigate(". $urlVars[$i] .")'>";
								
									echo "<img style= 'border: 1px solid #BAC9D1' src='" . $response2[0][pic_square] . "'>";
									
									echo "<div style='margin-top: 2px'>";
										echo $response2[0][name];
									echo "</div>";
								
								echo "</a>";
							}
						}
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
						$displayStep = $submitStep + 1;
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
						echo "Step $displayStep: select a category";
					echo "</div>";
					
					echo "<div class='sectionText'>";
						echo "What is the category of your $displayType?";
					echo "</div>";
					
					generatePiece_categoryStandardButtons($type,$facebookID);
												
				}
				else if ($submitStep == 4)
				{
					$category	= $_GET['category'];
					$type		= $_GET['type'];
					$facebookID	= $_GET['facebookID'];
										
					if ($type != 'event')
					{
						$displayStep = $submitStep;
					}
					else
					{
						$displayStep = $submitStep + 1;
					}
											
					if ($type == 'article')
					{
						echo "<div class='sectionHeader'>";
							echo "step $displayStep: write your article";
						echo "</div>";
					}
					else if ($type == 'video')
					{
						echo "<div class='sectionHeader'>";
							echo "step $displayStep: enter your video details";
						echo "</div>";
						
						echo '<script src="video_app.js" type="text/javascript"></script>';
						    // if $_GET['status'] is populated then we have a response
						    // about a syndicated upload from YouTube's servers
						if (isset($_GET['status'])) {
						    (isset($_GET['code']) ? $code = $_GET['code'] : $code = null);
						    (isset($_GET['id']) ? $id = $_GET['id'] : $id = null);
						    print '<div id="generalStatus">' .
						          uploadStatus($_GET['status'], $code, $id) .
						          '<div id="detailedUploadStatus"></div></div>';
						 }
						
						if (authenticated()) {
						    printAuthenticatedActions();
						}
					}
					else if ($type == 'photo')
					{
						
					}
					else if ($type == 'event')
					{
						
					}
									
				}
				else if ($submitStep == 5)
				{
					$type = $_GET['type'];
					
					if ($type == 'article')
					{
						
					}
					else if ($type == 'video')
					{
						echo "success!";
					}
					else if ($type == 'photo')
					{
						
					}
					else if ($type == 'event')
					{
						
					}
				}
			
			echo "</div>";		
			
		echo "</div>";
	
	}
	else
	{
		echo "you must be logged in to make a post";
	}

?>
