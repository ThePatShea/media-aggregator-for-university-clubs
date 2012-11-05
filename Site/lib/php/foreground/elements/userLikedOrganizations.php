<?php

	function generateElement_userLikedOrganizations($userFacebookID)
	{
		global $facebook;
				
		$userLikes			= $facebook->api("$userFacebookID/likes");
		$numberOfLikes 		= count($userLikes['data']) - 1;
		
		for ($i = 0; $i <= $numberOfLikes; $i++)
		{
			$likesList .= $userLikes[data][$i]['id'];
			
			if ($i < $numberOfLikes)
			{
				$likesList .= ",";
			}
		}
		
		error_reporting(0);
			$userLikedOrganizations = generateQueryArray("SELECT name,facebookID,pic_square FROM users WHERE facebookID IN ($likesList)");
		error_reporting(E_ERROR | E_WARNING | E_PARSE);
		
		
		$userInfo		= generateQueryArray("SELECT first_name FROM users WHERE facebookID = '$userFacebookID' ");
		$userFirstName  = $userInfo[0]['first_name'];
		
		$totalLikedOrganizations = count($userLikedOrganizations) - 1;		
		
		if ($totalLikedOrganizations > 9)
		{
			$totalLikedOrganizations = 9;
		}
		
		echo "<div class='smallBox'>";
			generatePiece_header("$userFirstName's likes");
			echo "<div class='widget'>";
				
				if ($userLikedOrganizations)
				{
					echo "<div class='organizationList'>";
					
						for ($i = 0; $i <= $totalLikedOrganizations; $i++)
						{
							$organizationLink  = "organization.php?id=";
							$organizationLink .= $userLikedOrganizations[$i]['facebookID'];
							$currentFacebookID = $userLikedOrganizations[$i]['facebookID'];
							
							$currentOrganizationImage = $userLikedOrganizations[$i]['pic_square'];
							
							if ($i % 2 == 0)
							{
								echo "<div style='padding: 10px; width: 280px; height: 30px; background: #E2E9ED;'>";
							}
							else
							{
								echo "<div style='padding: 10px; width: 280px; height: 30px; background: #EEF2F5;'>";
									
							}
								echo "<img style='vertical-align: top; display: inline-block; width: 30px; height: 30px; border: 1px solid #A0B7C5;' src='$currentOrganizationImage'>";
								
								echo "<div style='width: 1px; height: 20px; background: #83A0B1; margin-left: 10px; margin-right: 10px; margin-top: 5px; display: inline-block; vertical-align: top;'></div>";
								
								echo "<div style='display: inline-block; width: 225px; padding-top: 1px;'>";
									
									echo "<a href='$organizationLink' class='organizationName'>";
										echo $userLikedOrganizations[$i]['name'];
									echo "</a>";
									
									echo "<div class='organizationType'>";
										echo "organization";
									echo "</div>";
								
								echo "</div>";
								
							echo "</div>";
							
						}
						
					echo "</div>";
				}
				else
				{
					echo "<div class='organizationList'>";
						echo "<div class='organizationName' style='padding: 10px; font-size: 12px; width: 280px;'>";
							echo "$userFirstName does not yet like any organizations.";
						echo "</div>";
					echo "</div>";
				}
				
			echo "</div>";
		echo "</div>";
	}
	
	$id	= $_GET['id'];
	generateElement_userLikedOrganizations($id);
		
?>