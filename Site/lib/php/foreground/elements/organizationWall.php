<?php
	
	function generateFacebookWall($id)
	{
		global $facebook;
		
		$post				= getSinglePost("SELECT * FROM users WHERE facebookID = $id");
		$organizationName 	= stripslashes($post[0]['name']);
	
		echo "<div class='smallBox' style='position: relative; z-index: 10;'>";
			generatePiece_header_bigTitle("$organizationName's Wall");
			echo "<div class='widget organizationWall'>";
				$organizationWall = $facebook->api("$id/feed");
				
				if($organizationWall['data'])
				{
					for ($i = 0; $i <= 9; $i++)
					{
						if ($organizationWall['data'][$i])
						{
							if ($i % 2 == 0)
							{
								echo "<div style='padding: 10px; width: 280px; background: #E2E9ED;'>";
							}
							else
							{
								echo "<div style='padding: 10px; width: 280px; background: #EEF2F5;'>";
									
							}
								echo "<div class='organizationName'>";
									echo $organizationWall['data'][$i]['from']['name'];
								echo "</div>";
								
								echo "<div class='wallPost'>";
									echo $organizationWall['data'][$i]['message'];
								echo "</div>";
								
							echo "</div>";
						}
						
					}
				}
				else
				{
					echo "<div class='organizationList'>";
						echo "<div class='organizationName' style='padding: 10px; font-size: 12px; width: 280px; border-bottom: 0;'>";
							echo "$organizationName has not yet posted anything to its wall.";
						echo "</div>";
					echo "</div>";
				}
				
			echo "</div>";
		echo "</div>";
	}
	
	$id = $_GET['id'];
	generateFacebookWall($id);
	
?>