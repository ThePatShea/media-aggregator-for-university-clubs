<?php
	
	function cycleArray($inputFunction, $inputArray)
	{
		$arraySize = count($inputArray) - 1;
		
		for ($i = 0; $i <= $arraySize; $i++)
		{
			$outputArray[$i] = $inputFunction($inputArray[$i]);
		}
		return $outputArray;
	}
	
		function listArrayValues($inputArray)
		{
			$inputFunction = function($name)
			{
				echo $name."<br><br>";
			};
			
			cycleArray($inputFunction, $inputArray);
		}
		
		function convertArrayTimesToUnix($inputArray)
		{
			$inputFunction = function($name)
			{
				$unixTime = strtotime($name);
				
				return $unixTime;
			};
			
			$unixTimeArray = cycleArray($inputFunction, $inputArray);
			
			return $unixTimeArray;
		}
	
	
	function scrapeTrumba($url)
	{
		$ch 					= curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$curl_scraped_page 		= curl_exec($ch);
		curl_close($ch);
		$data 					= $curl_scraped_page;	
		
		$regex					= "#<title>(.+?)</title>#sm";
		preg_match_all($regex,$data,$match);
		$nameList 				= fixScrapedNames($match[1]);
		
		$regex 					= "#<xCal:description(.+?)<xCal:uid>#sm";
		preg_match_all($regex,$data,$match);
		$descriptionList		= fixScrapedData($match[1]);
		
		$regex 					= "#<xCal:location(.+?)<xCal:dtstart>#sm";
		preg_match_all($regex,$data,$match);
		$locationList			= fixScrapedData($match[1]);
		
		$regex 					= "#<x-trumba:localstart tzAbbr=\"E(.+?)T\" tzCode=\"20400\">(.+?)</x-trumba:localstart>#sm";
		preg_match_all($regex,$data,$match);
		$startTimeList	 		= $match[2];
		$unixStartTimeList 		= convertArrayTimesToUnix($startTimeList);
		
		$regex 					= "#<x-trumba:localend tzAbbr=\"E(.+?)T\" tzCode=\"20400\">(.+?)</x-trumba:localend>#sm";
		preg_match_all($regex,$data,$match);
		$endTimeList	 		= $match[2];
		$unixEndTimeList 		= convertArrayTimesToUnix($endTimeList);
		
		
		$arraySize 				= count($nameList) - 1;
		$created_time 			= time();
		
		for ($i = 0; $i <= $arraySize; $i++)
		{
			$previousPosts = generateQueryArray
			("
				SELECT campusBubbleEventID
				FROM events
				ORDER BY campusBubbleEventID DESC
				LIMIT 1
			");
			
			$prevBubbleEventID	= $previousPosts[0][0];
			$postFacebookID		= "eb$prevBubbleEventID";
						
			$existingPosts = generateQueryArray
			("
				SELECT count(*)
				FROM events 
				WHERE name = '".addslashes($nameList[$i])."' AND start_time = '".$unixStartTimeList[$i]."'
				ORDER BY campusBubbleEventID DESC
				LIMIT 1
			");
						
			if ($existingPosts[0][0] == 0)
			{
				$query = mysql_query
				("
					INSERT INTO 
					events 
					(postFacebookID, accountFacebookID, name, description, updated_time, start_time, end_time, location)
					VALUES 
					('$postFacebookID', '42543126981', '".addslashes($nameList[$i])."', '".addslashes($descriptionList[$i])."', '$created_time', '".$unixStartTimeList[$i]."', '".$unixEndTimeList[$i]."', '".addslashes($locationList[$i])."')
				");
			}
			
			
		}
		
		
	}
	
		function fixScrapedData($listGrab)
		{
			$arraySize = count($listGrab) - 1;
			
			for ($i = 0; $i <= $arraySize; $i++)
			{
				$list[$i] = substr($listGrab[$i], 1);
				
				if (strlen($list[$i]) == 7)
				{
					$list[$i] = "";
				}
				
				if (strpos($list[$i], "</xCal:description>"))
				{
					$newStringLength = strlen($list[$i]) - 24;
					$list[$i] = substr($list[$i], 0, $newStringLength);
				}
				
				if (strpos($list[$i], "</xCal:location>"))
				{
					$newStringLength = strlen($list[$i]) - 21;
					$list[$i] = substr($list[$i], 0, $newStringLength);
				}
				
			}
			
			return $list;
		}
		
		function fixScrapedNames($nameListGrab)
		{
			$arraySize = count($nameListGrab) - 1;
			
			for ($i = 2; $i <= $arraySize; $i++)
			{
				$nameList[$i - 2] = $nameListGrab[$i];
			}
			
			return $nameList;
		}
				

	$url = "http://www.trumba.com/calendars/emory-events.rss";
	scrapeTrumba($url);
	
	
	
/*
	$query = mysql_query
	("
		DELETE
		FROM posts
		WHERE type = 'event'
	");

	$query = mysql_query
	("
		DELETE
		FROM bubbleIDs
		WHERE type = 'event'
	");
*/
/*
	$query = generateQueryArray
	("
		SELECT COUNT(*)
		FROM posts
		WHERE type = 'event'
	");
*/
	print_r($query);
?>