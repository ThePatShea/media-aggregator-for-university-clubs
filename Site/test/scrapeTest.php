<?php 

	for ($i = 16061; $i <= 16061; $i++)
	{
		$url = "http://emorywheel.com/detail.php?n=$i";
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$curl_scraped_page = curl_exec($ch);
		curl_close($ch);
		
		$data = $curl_scraped_page;
			
		$regex = "#<h2>(.+?)</h2>#";
		preg_match($regex,$data,$match);
		$name = $match[1];
		
		
		$regex = "#<strong>Posted: (.+?)</strong>#";
		preg_match($regex,$data,$match);
		$created_time_unformatted = $match[1];
		$created_time = "$created_time_unformatted 00:00:00";
		
			
		$regex = '#img src="(.+?)_medium.jpg" id="pprimary"#';
		preg_match($regex,$data,$match);
		$image_unformatted = $match[1];
		$image = "http://emorywheel.com$image_unformatted.jpg";
		
		
		$regex = '#<div class="detailContent">(.+?)</div>#sm';
		preg_match($regex,$data,$match);
		$description = $match[1];
		
		echo $name;
		echo "<br><br>";
		
		
		echo $created_time;
		echo "<br><br>";
		
		echo "<img src='$image'>";
		echo "<br><br>";
		
		echo $description;
		echo "<br><br>";
		
	}
?>