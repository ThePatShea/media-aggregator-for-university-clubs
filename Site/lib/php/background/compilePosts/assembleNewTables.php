<?php

	include_once('facebookPostFunctions.php');
	
	function scrapeLearnLink()
	{
		$url = "http://emorybubble.com/lib/php/background/compilePosts/emoryPeopleList.html";
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$curl_scraped_page = curl_exec($ch);
		curl_close($ch);
		
		$data = $curl_scraped_page;	
				
		$regex = '#</a></td><td valign="top"><a class="rp0" href="https://www.learnlink.emory.edu/Login/%7E(.+?)/">(.+?)&nbsp;</a></td><td align="left" valign="top"><a class="rp0" href="https://www.learnlink.emory.edu/Login/%7E(.+?)/">Emory College Class of (.+?)&nbsp#';
		preg_match_all($regex,$data,$match);
		
		$arraySize = count($match[1]) - 1;
		
		for ($i = 0; $i <= $arraySize; $i++)
		{
			$name_unf	= $match[2][$i];
			
				$boldName = substr("$name_unf", 0, 1);
				
				if ($boldName != "<")
				{
					$name = $name_unf;
				}
				else
				{
					$name = get_string_between($name_unf, ">", "<");
				}
			
			
			$email_unf 	= $match[3][$i];
			
				$emailEdu = substr("$email_unf", -10);
				
				if ($emailEdu == "@emory.edu")
				{
					$email = $email_unf;
				}
				else
				{
					$email = "$email_unf@emory.edu";
				}
								
			$gradYear 	= $match[4][$i];
						
			$query = mysql_query("INSERT INTO beta2_students (name, email, gradYear) VALUES ('$name', '$email', '$gradYear')");
		}
		
	}
	
	scrapeLearnLink();
	
?>