<?php	
	
	function generatePiece_authorProfile($authorID)
	{
		$authorInfo			= generateQueryArray("SELECT name,pic_square FROM users WHERE facebookID = $authorID");
		$authorName			= $authorInfo[0]['name'];
		$organizationImage	= $authorInfo[0]['pic_square'];
			
		$authorLink			= "user.php?id=";
		$authorLink		   .= $authorID;
		
		 
		
		$viewAllLink		= "archive.php?article=1&photo=1&video=1&organization=$authorID&header=view all posts by $authorName";
		
		echo "<div style='width:50px; display: inline-block;'>";
			
			echo "<a href='$authorLink'>";
				echo "<img src='$organizationImage' style='width: 50px; height: 50px; position: relative; z-index: 10; border: 1px solid #7596AA; '>";
			echo "</a>";
			
			echo "<a href='$authorLink' class='dynamicGreyButton' style='width: 41px; height: 10px; padding: 4px; padding-top: 8px; position: relative; top: -4px;'>";
				echo "profile";
			echo "</a>";
			
		echo "</div>";
		
		echo "<div style='display: inline-block; padding-left: 8px; vertical-align: top;'>";
			echo "<a href='$authorLink'>";
				echo "<div style='font-family: museosans500; color: #33464C; font-size: 16px; text-shadow: 1px 1px 0px white; text-transform: uppercase;'>";
					echo "$authorName";
				echo "</div>";
			echo "</a>";
			echo "<div style='font-family: museosans500; color: #8CA9B8; font-size: 12px; text-shadow: 1px 1px 0px white; text-transform: uppercase; margin-top: 2px;'>";
				echo "Emory University";
			echo "</div>";
			
			echo "<div class='authorProfileInfo'>
								
					<a style='color: #53778B; text-shadow: 1px 1px 0px rgba(255,255,255,.65); font-family: Lucida Sans Unicode; font-size: 10px; text-transform: uppercase; margin-top: 20px;' href='". $viewAllLink ."'>view all posts by $authorName</a>
					<div style='display: inline-block; position: relative; left: 1px; top: -1px'>
						<div class='triangle triangle1'></div>
						<div class='triangle triangle1shadow'></div>
					</div>
					
				  </div>
			 ";
			
		echo "</div>";
	}
?>