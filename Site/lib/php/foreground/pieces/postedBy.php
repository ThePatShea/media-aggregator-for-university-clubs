<?php
	include_once ('lib/php/foreground/pieces/organizationBadge.php');
	include_once ('lib/php/foreground/pieces/authorProfile.php');
	
	function generatePiece_postedByName($organizationName)
	{
		echo 
			"<div id='postedByOrganizationNameID' class='organizationHeading'>
				$organizationName
			</div>
			";
	}
	
	function generatePiece_postedByInfo()
	{
		echo 
			"<pre id='postedByOrganizationTextID' class='organizationText'>
			 	
			 </pre>
			";
	}
	
	function generateElement_ribbonPostedBy($post)
	{															
		$accountID		= $post[0]['accountFacebookID'];
		$accountInfo	= generateQueryArray("SELECT accountType FROM users WHERE facebookID = $accountID");
		
		echo "<div class='smallBox'>";
		
			generatePiece_ribbonHeader("posted by");
			
			echo "<div class='ribbon postedBy' style='width: 270px; padding-left: 18px; padding-top: 20px; padding-bottom: 25px;'>";
				if ($accountInfo[0]['accountType'] == 'organization')
				{
					generatePiece_postedByName($post[0]['accountName']);
					generatePiece_organizationBadge($post[0]['accountFacebookID']);
				}
				else
				{
					generatePiece_authorProfile($post[0]['accountFacebookID']);
				}
			echo "</div>";
			
		echo "</div>";
	}
	
	function generateElement_postedBy($post)
	{
		$accountID		= $post[0]['accountFacebookID'];
		$accountInfo	= generateQueryArray("SELECT accountType FROM users WHERE facebookID = $accountID");
		
		echo "<div class='smallBox'>";
			generatePiece_header("posted by");
			
			if ($accountInfo[0]['accountType'] == 'organization')
			{
				echo "<div class='widget postedBy'>";
					generatePiece_postedByName($post[0]['accountName']);
					generatePiece_organizationBadge($post[0]['accountFacebookID']);
				echo "</div>";
			}
			else
			{
				echo "<div class='widget postedBy'>";
					generatePiece_authorProfile($post[0]['accountFacebookID']);
				echo "</div>";
			}
		
		echo "</div>";
		
	}
	
	function generateElement_featuredOrganization()
	{
		$tableSize 		= generateQueryArray("SELECT count(*) FROM users WHERE accountType = 'organization'");
		$maxNumber		= $tableSize[0][0] - 1;
		$randomNumer 	= rand(0,$maxNumber);
		$organization	= generateQueryArray("SELECT * FROM users WHERE accountType = 'organization' LIMIT $randomNumer,1");
		
		echo "<div class='smallBox' style='width:  315px;'>";
			generatePiece_header_bigTitle("featured organization");
			
			echo "<div class='widget postedBy' style='width:  300px;'>";
				generatePiece_postedByName($organization[0]['name']);
				generatePiece_organizationBadge($organization[0]['facebookID']);
			echo "</div>";
		
		echo "</div>";
		
	}
	
	function generateElement_featuredOrganization_standard()
	{
		$tableSize 		= generateQueryArray("SELECT count(*) FROM users WHERE accountType = 'organization'");
		$maxNumber		= $tableSize[0][0] - 1;
		$randomNumer 	= rand(0,$maxNumber);
		$organization	= generateQueryArray("SELECT * FROM users WHERE accountType = 'organization' LIMIT $randomNumer,1");
		
		echo "<div class='smallBox' style='width:  300px;'>";
			generatePiece_header_bigTitle("featured organization");
			
			echo "<div class='widget postedBy' style='width:  285px;'>";
				generatePiece_postedByName($organization[0]['name']);
				generatePiece_organizationBadge($organization[0]['facebookID']);
			echo "</div>";
		
		echo "</div>";
		
	}
?>