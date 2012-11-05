<?php

	session_start();
	
	//REQUIRED YOUTUBE STUFF		
		$_SESSION['developerKey'] = 'AI39si5Mo3UUmOLCCs7R3s76T3UdjolGGAzOaGYC43FMkLXxgSQtxjW3VbDuIm23lAW-9HUskCYKt8ro3Bi81-RxLzMsAadB1g';
		
		require_once 'Zend/Loader.php';
		Zend_Loader::loadClass('Zend_Gdata_YouTube');	
	//REQUIRED YOUTUBE STUFF
	
	include_once('lib/php/background/facebookSDK/facebook.php');
	include_once('lib/php/background/databaseConnect.php');
	include_once('lib/php/background/getPosts.php');
	include_once('lib/php/background/universalBackground.php');
	include_once("lib/php/foreground/pieces/universalPieces.php");
	include_once("lib/php/foreground/pieces/list.php");
	include_once('lib/css/style.php');
	require("lib/php/background/registerFacebook.php");



	function compileVideos_oneOrganization_facebookIDandCategory($organizationID, $category)
	{
		$accountInfo = generateQueryArray("SELECT name,facebookID,youtubeID FROM users WHERE facebookID = 'organizationID' ");
				
		compileVideos_oneOrganization($accountInfo[0]);
		
	}
	
	function compileVideos_oneOrganization($accountInfo)
	{
		$arraySize	= 49;
		$startIndex	= 1;
		
		while($arraySize == 49)
		{
			$arraySize = compileVideos_oneSet($startIndex, $accountInfo);
			$startIndex += 50;
			if ($startIndex > 1000)
			{
				break;
			}
		}
	}
	
	function compileVideos_oneSet($startIndex, $accountInfo)
	{
		$yt = new Zend_Gdata_YouTube();
		$query = $yt->newVideoQuery();
		$query->author = $accountInfo['youtubeID'];
		$query->maxResults = 50;
		
		if ($accountInfo['youtubeID'] == 'campusmoviefest')
		{
			$query->videoQuery = '\"Emory University\"';
		}
		
		$query->startIndex = $startIndex;
		$query->orderby = 'published';
		
		$videoFeed = $yt->getVideoFeed($query);
		$i = 0;
		
		foreach ($videoFeed as $videoEntry)
		{
		    $thumbnail1 = $videoEntry->getVideoThumbnails();
		    
			$video[$i]['id']			= $videoEntry->getVideoID();
			$video[$i]['name']			= $videoEntry->getVideoTitle();
			$video[$i]['description']	= $videoEntry->getVideoDescription();
			$video[$i]['author']		= $videoEntry->author[0]->name->text;
			$video[$i]['created_time']	= strtotime($videoEntry->published->text);
			$video[$i]['image']			= $thumbnail1[0]['url'];
			$i++;		
		}	
		
		$arraySize = count($video) - 1;
		echo ($arraySize + 1) . " videos: ";
		
		for ($i = 0; $i <= $arraySize; $i++)
		{
			$postYouTubeID			= addslashes($video[$i]['id']);
			$accountFacebookID		= addslashes($accountInfo['facebookID']);
			$accountName			= addslashes($accountInfo['name']);
			$name					= addslashes($video[$i]['name']);
			$description			= addslashes($video[$i]['description']);
			$created_time			= addslashes($video[$i]['created_time']);
			$image					= addslashes($video[$i]['image']);
		
		
			$postedCheck = generateQueryArray("SELECT name,accountName FROM videos WHERE postYouTubeID = '$postYouTubeID' ");
			
			
			if ($postedCheck[0]['name'])
			{
				echo $postedCheck[0]['accountName'] ."<br><br>";
				
				if ($postedCheck[0]['accountName'] != 'Emory Bubble')
				{
					echo "No more new videos" ."<br><br>";
					$arraySize = 1001;
					break;
				}
				else
				{
					$query = mysql_query("UPDATE video SET accountFacebookID='$accountFacebookID', accountName='$accountName' WHERE postYouTubeID = '$postYouTubeID' ");
					echo "Swapped video from Emory Bubble profile" ."<br><br>";
				}
			}
			else
			{
				echo "New video" ."<br><br>";
			}
		
		
			$query = mysql_query("INSERT INTO videos (postYouTubeID, accountFacebookID, accountName, name, description, created_time, image) VALUES ('$postYouTubeID', '$accountFacebookID', '$accountName', '$name', '$description', '$created_time', '$image')");
		
		}
		
		return $arraySize;
	
	}




	$id 				= $_GET['id'];
	
	$organizationID 	= $_SESSION['videoOrganizationID'];
	$category 			= $_SESSION['videoPostCategory'];
	
	
	
	//compileVideos_oneOrganization_facebookIDandCategory($organizationID, $category);
	
	
	
	
	//$redirectURL = "video.php?id=$id";
	$redirectURL   = "index.php";
	
	echo "<div class='submitFrame' style='position: relative; height: 500px;'>";
		
		echo "<div class='administration' style='background: white;'>";
		
			echo "<div class='topHeader'>";
				echo "make a post";
			echo "</div>";
			
			echo "<div class='sectionHeader'>";
				echo "success";
			echo "</div>";
			
			echo "<div class='sectionText'>";
				echo "Congratulations! You have successfully uploaded a video.";
			echo "</div>";
			
			echo "<a href='$redirectURL' target='_parent' class='dynamicGreyButton' style='padding: 5px; position: relative; top: 0; left: 10px;'>";
				echo "home";
			echo "</a>";
		
		echo "</div>";
	
	echo "</div>";
	

?>