<?php

	include_once('facebookPostFunctions.php');
	
	for ($i = 16061; $i <= 30327; $i++)
	{
		$url = "http://emorywheel.com/detail.php?n=$i";
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$curl_scraped_page = curl_exec($ch);
		curl_close($ch);
		
		$data = $curl_scraped_page;
			
		$regex = "#<h2>(.+?)</h2>#";
		preg_match($regex,$data,$match);
		$name_unformatted = $match[1];
		$name = addslashes($name_unformatted);
		
		$regex = "#<strong>Posted: (.+?)</strong>#";
		preg_match($regex,$data,$match);
		$created_date = $match[1];
		$created_time_unformatted = str_replace('/', '-', $created_date);
		$created_time = "$created_time_unformatted 00:00:00";
		
			
		$regex = '#img src="(.+?)_medium.jpg" id="pprimary"#';
		preg_match($regex,$data,$match);
		$image_unformatted = $match[1];
		
		if ($image_unformatted)
		{
			$image = "http://emorywheel.com$image_unformatted.jpg";
		}
		else
		{
			$image = "";
		}
		
		$regex = '#<div class="detailContent">(.+?)</div>#sm';
		preg_match($regex,$data,$match);
		$description_unformatted = $match[1];
		$description = addslashes($description_unformatted);
		
		
		$regex = "#section.php\?c=(.+?)\'#";
		preg_match($regex,$data,$match);
		$wheelCategory = $match[1];
		
		if ($wheelCategory == 2)
		{
			$category = 'news';
		}
		else if ($wheelCategory == 3)
		{
			$category = 'community';
		}
		else if ($wheelCategory == 4)
		{
			$category = 'athletics';
		}
		else if ($wheelCategory == 5)
		{
			$category = 'arts';
		}
		else
		{
			$category = 'news';
		}
		
		
		
		
		/*
		echo $name					. "<br><br>";		
		echo $created_time			. "<br><br>";		
		echo "<img src='$image'>"	. "<br><br>";		
		echo $description			. "<br><br>";
		echo $category 				. "<br><br>";
		*/
		
		$accountFacebookID	= "67408779409";
		$accountName		= "The Emory Wheel";
		
		
		$query = mysql_query("INSERT INTO articles (accountFacebookID, accountName, name, description, created_time, image, category) VALUES ('$accountFacebookID', '$accountName', '$name', '$description', '$created_time', '$image', '$category')");
		
	}

?>