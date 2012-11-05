<?php

	function calculateTotalPosts($selectedOrganization)
	{
		$postQuery = "SELECT * FROM articles ";
			
			if ($selectedOrganization != 'all')
			{
				$postQuery .= "WHERE accountFacebookID = $selectedOrganization ";
			
				if ($search != '0')
				{
					$postQuery .= "AND (name LIKE '%$search%' OR accountName LIKE '%$search%' OR description LIKE '%$search%') ";
				}
			}
			else
			{
				if ($search != '0')
				{
					$postQuery .= "WHERE (name LIKE '%$search%' OR accountName LIKE '%$search%' OR description LIKE '%$search%') ";
				}
			}
			
			if ($includedTypes['articleSort'] == 'random')
			{
				$postQuery .= "ORDER BY rand() ";
			}
			else
			{
				$postQuery .= "ORDER BY created_time DESC ";
			}
			
			$totalArticleList = generateQueryArray($postQuery);
		
		
		
		
			$postQuery = "SELECT * FROM galleries WHERE albumType = 'normal' ";
			
			if ($selectedOrganization != 'all')
			{
				$postQuery .= "AND accountFacebookID = $selectedOrganization ";
			}
			
			if ($search != '0')
			{
				$postQuery .= "AND (name LIKE '%$search%' OR accountName LIKE '%$search%' OR description LIKE '%$search%') ";
			}
					
			if ($includedTypes['photoSort'] == 'random')
			{
				$postQuery .= "ORDER BY rand() ";
			}
			else
			{
				$postQuery .= "ORDER BY created_time DESC ";
			}
			
			$totalGalleryList = generateQueryArray($postQuery);
			
		
		
		
		
			$postQuery = "SELECT * FROM videos ";
			
			if ($selectedOrganization != 'all')
			{
				$postQuery .= "WHERE accountFacebookID = $selectedOrganization ";
				
				if ($search != '0')
				{
					$postQuery .= "AND (name LIKE '%$search%' OR accountName LIKE '%$search%' OR description LIKE '%$search%') ";
				}
			}
			else
			{
				if ($search != '0')
				{
					$postQuery .= "WHERE (name LIKE '%$search%' OR accountName LIKE '%$search%' OR description LIKE '%$search%') ";
				}
			}
			
			if ($includedTypes['videoSort'] == 'random')
			{
				$postQuery .= "ORDER BY rand() ";
			}
			else
			{
				$postQuery .= "ORDER BY created_time DESC ";
			}
			
			$totalVideoList = generateQueryArray($postQuery);		
		
		
		
			$currentTime = time();
			
			$postQuery = "SELECT * FROM events WHERE start_time > $currentTime ";
			
			if ($selectedOrganization != 'all')
			{
				$postQuery .= "AND accountFacebookID = $selectedOrganization ";
			}
			
			if ($search != '0')
			{
				$postQuery .= "AND (name LIKE '%$search%' OR accountName LIKE '%$search%' OR description LIKE '%$search%') ";
			}
			
			if ($includedTypes['eventSort'] == 'random')
			{
				$postQuery .= "ORDER BY rand() ";
			}
			else
			{
				$postQuery .= "ORDER BY start_time ASC ";
			}
			
			$totalEventList = generateQueryArray($postQuery);
		
		
			
		$totalPosts = count($totalArticleList) + count($totalGalleryList) + count($totalVideoList) + count($totalEventList);
		
		return $totalPosts;
	}
	
	function currentPageURL()
	{
	 $pageURL = 'http';
	 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	 $pageURL .= "://";
	 if ($_SERVER["SERVER_PORT"] != "80") {
	  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	 } else {
	  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	 }
	 return $pageURL;
	}
	
	function get_string_between($string, $start, $end){
		$string = " ".$string;
		$ini = strpos($string,$start);
		if ($ini == 0) return "";
		$ini += strlen($start);
		$len = strpos($string,$end,$ini) - $ini;
		return substr($string,$ini,$len);
	}

	function generateQueryArray($query)
	{
		$result = mysql_query($query);
		
		$i = 0;
		
		while ($row = mysql_fetch_array($result))
		{
			$queryArray[$i] = $row;
			$i++;
		}
		
		return ($queryArray);
	}
		
		function generateQueryArray_oneColumn($query)
		{
			$result = mysql_query($query);
			
			$i = 0;
			
			while ($row = mysql_fetch_array($result))
			{
				$queryArray[$i] = $row[0];
				$i++;
			}
			
			return ($queryArray);
		}

	echo "
		<script>
		(function($) {
		    $.fn.textfill = function(options) {
		        var fontSize = options.maxFontPixels;
		        var ourText = $('span:visible:first', this);
		        var maxHeight = $(this).height();
		        var maxWidth = $(this).width();
		        var textHeight;
		        var textWidth;
		        do {
		            ourText.css('font-size', fontSize);
		            textHeight = ourText.height();
		            textWidth = ourText.width();
		            fontSize = fontSize - 1;
		        } while ((textHeight > maxHeight || textWidth > maxWidth) && fontSize > 3);
		        return this;
		    }
		})(jQuery);
		
		$(document).ready(function() {
		    $('.textFit').textfill({ maxFontPixels: 20 });
		});
		</script>
				
	";

?>