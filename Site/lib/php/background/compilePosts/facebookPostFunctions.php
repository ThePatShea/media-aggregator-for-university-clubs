<?php

	include_once("../facebookSDK/fbmain.php");
	include_once("../databaseConnect.php");	
	include_once("../universalBackground.php");	
	
	function compileEvents_oneOrganization($organization)
	{
		global $facebook;
		
		$eventsGrab		= $facebook->api("/$organization/events");
		$events			= $eventsGrab['data'];
		
		$eventArraySize = count($events) - 1;
		
		for ($i = 0; $i <= $eventArraySize; $i++)
		{
			$singleEvent[$i] = $facebook->api($events[$i]['id']);
			
			$postFacebookID			= addslashes($singleEvent[$i]['id']);
			$accountFacebookID		= addslashes($singleEvent[$i]['owner']['id']);
			$accountName			= addslashes($singleEvent[$i]['owner']['name']);
			$name					= addslashes($singleEvent[$i]['name']);
			$description			= addslashes($singleEvent[$i]['description']);
			$start_time				= addslashes( strtotime($singleEvent[$i]['start_time']) );
			$end_time				= addslashes( strtotime($singleEvent[$i]['end_time']) );
			$location				= addslashes($singleEvent[$i]['location']);
			$street					= addslashes($singleEvent[$i]['venue']['street']);
			$city					= addslashes($singleEvent[$i]['venue']['city']);
			$state					= addslashes($singleEvent[$i]['venue']['state']);
			$zip					= addslashes($singleEvent[$i]['venue']['zip']);
			$country				= addslashes($singleEvent[$i]['venue']['country']);
			$latitude				= addslashes($singleEvent[$i]['venue']['latitude']);
			$longitude				= addslashes($singleEvent[$i]['venue']['longitude']);
			$privacy				= addslashes($singleEvent[$i]['privacy']);
			$updated_time			= addslashes($singleEvent[$i]['updated_time']);
			
			
			$postedCheck = generateQueryArray_oneColumn("SELECT name FROM events WHERE postFacebookID = '$postFacebookID' ");
			
			echo "$accountName: ";
			
			if ($postedCheck[0])
			{
				echo "No more new events" ."<br><br>";
				break;
			}
			else
			{
				echo "New event" ."<br><br>";
			}
			
			
			$fqlQuery	= "SELECT pic_big FROM event WHERE eid='$postFacebookID' ";
			$response	= $facebook->api(array('method' => 'fql.query','query' =>$fqlQuery));
			$image	= $response[0]['pic_big'];
				
			$query = mysql_query("INSERT INTO events (postFacebookID, accountFacebookID, accountName, name, description, start_time, end_time, location, street, city, state, zip, country, latitude, longitude, privacy, updated_time, image, category) VALUES ('$postFacebookID', '$accountFacebookID', '$accountName', '$name', '$description', '$start_time', '$end_time', '$location', '$street', '$city', '$state', '$zip', '$country', '$latitude', '$longitude', '$privacy', '$updated_time', '$image', 'community')");
		}
	}
	
		function compileEvents_allOrganizations()
		{
			$facebookIDList = generateQueryArray_oneColumn("SELECT facebookID FROM users WHERE accountType = 'organization' ");
			$arraySize = count($facebookIDList) - 1;
			
			for ($i = 0; $i <= $arraySize; $i++)
			{
				compileEvents_oneOrganization($facebookIDList[$i]);
			}
			
		}
	
	function compileGalleries_oneOrganization($organization)
	{
		global $facebook;
		
		$galleriesGrab		= $facebook->api("/$organization/albums");
		$galleries			= $galleriesGrab['data'];
		
		$galleryArraySize	= count($galleries) - 1;
		
		for ($i = 0; $i <= $galleryArraySize; $i++)
		{			
			$postFacebookID			= addslashes($galleries[$i]['id']);
			$accountFacebookID		= addslashes($galleries[$i]['from']['id']);
			$accountName			= addslashes($galleries[$i]['from']['name']);
			$name					= addslashes($galleries[$i]['name']);
			$description			= addslashes($galleries[$i]['description']);
			$location				= addslashes($galleries[$i]['location']);
			$link					= addslashes($galleries[$i]['link']);
			$cover_photo			= addslashes($galleries[$i]['cover_photo']);
			$privacy				= addslashes($galleries[$i]['privacy']);
			$count					= addslashes($galleries[$i]['count']);
			$albumType				= addslashes($galleries[$i]['type']);
			$created_time			= addslashes($galleries[$i]['created_time']);
			$updated_time			= addslashes($galleries[$i]['updated_time']);
			$albumID				= $postFacebookID;
			
			$postedCheck = generateQueryArray_oneColumn("SELECT name FROM galleries WHERE postFacebookID = '$postFacebookID' ");
			
			echo "$accountName: ";
			
			if ($postedCheck[0])
			{
				echo "No more new galleries" ."<br><br>";
				break;
			}
			else
			{
				echo "New gallery" ."<br><br>";
			}
			
			
			//Check if the album has a cover photo. If it has no cover photo, then it also has no photos so this prevents it from getting added to the Campus Bubble database.
			if ($cover_photo)
			{
				$query = mysql_query("INSERT INTO galleries (postFacebookID, accountFacebookID, accountName, name, description, location, link, cover_photo, privacy, count, albumType, created_time, updated_time) VALUES ('$postFacebookID', '$accountFacebookID', '$accountName', '$name', '$description', '$location', '$link', '$cover_photo', '$privacy', '$count', '$albumType', '$created_time', '$updated_time')");
				
				
				$galleryID = $galleries[$i]['id'];
				$photosGrab = $facebook->api("/$galleryID/photos?limit=0");
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
			}
			
		}
		
		
	}
		
		function compileGalleries_allOrganizations()
		{
			$facebookIDList = generateQueryArray_oneColumn("SELECT facebookID FROM users WHERE accountType = 'organization' ");
			$arraySize = count($facebookIDList) - 1;
			
			for ($i = 0; $i <= $arraySize; $i++)
			{
				compileGalleries_oneOrganization($facebookIDList[$i]);
			}
			
		}
		
?>