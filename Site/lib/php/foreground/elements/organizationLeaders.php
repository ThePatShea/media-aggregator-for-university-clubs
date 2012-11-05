<?php
	global $typeName;
	$typeName   = $_GET['typeName'];
	
	if ($typeName == 'photo')
	{
		global $albumOwner;
										
		$fqlQuery = "SELECT name,pic_square FROM page WHERE page_id=$albumOwner";
		
		global $response3;
		$response3 = $facebook->api(array('method' => 'fql.query','query' =>$fqlQuery));
	}
	
	function generatePiece_organizationLeaders($organizationID)
		{
			global $facebook;
			$adminInfo = $facebook->api("$organizationID");
			
			print_r($adminInfo);
			
			echo 
			"
					
				
			";
		}
?>