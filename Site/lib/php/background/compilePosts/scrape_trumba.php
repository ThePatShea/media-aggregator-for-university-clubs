<?php

	include_once('facebookPostFunctions.php');
	
		$url = "http://www.trumba.com/calendars/emory-events.rss";
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$curl_scraped_page = curl_exec($ch);
		curl_close($ch);
		
		$data = $curl_scraped_page;
		echo $data;
	
	/*
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
		
		$category = 'community';		
	*/
		
		/*
		echo $name					. "<br><br>";		
		echo $created_time			. "<br><br>";		
		echo "<img src='$image'>"	. "<br><br>";		
		echo $description			. "<br><br>";
		echo $category 				. "<br><br>";
		*/
		
		$accountFacebookID	= "42543126981";
		$accountName		= "Emory University";
		
		
		//$query = mysql_query("INSERT INTO articles (accountFacebookID, accountName, name, description, created_time, image, category) VALUES ('$accountFacebookID', '$accountName', '$name', '$description', '$created_time', '$image', '$category')");
		
	

?>