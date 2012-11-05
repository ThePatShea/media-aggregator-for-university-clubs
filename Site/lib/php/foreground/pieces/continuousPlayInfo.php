<?php
	function generatePiece_continuousPlayInfo()
	{
		$tableSize 		= generateQueryArray("SELECT count(*) FROM videos");
		$maxNumber		= $tableSize[0][0] - 1;
		$randomNumer 	= rand(0,$maxNumber);
		$nextVideo		= generateQueryArray("SELECT postYouTubeID,name,image FROM videos LIMIT $randomNumer,1");
		
		$nextVideoName		= $nextVideo[0]['name'];
		$nextVideoImage		= $nextVideo[0]['image'];
		$nextVideoLink		= "video.php?id=";
		$nextVideoLink	   .= $nextVideo[0]['postYouTubeID'];
		
		echo
			"<div class='continuousPlayInfo'>
				
				<div class='nextVideoInfo'>
				
					<div id='nextVideo' class='static'>
						next video:
					</div>
					
					<div class='timeRemaining'>
					
						<form name='form1'>
							<input class='timeRemaining' type='text' NAME='clock'> 
						</form> 
																		
					</div>
					
					<div class='ribbonFooter'>
					
						<a href='archive.php?video=1&header=view all videos' class='ender'>
							<div class='link'>all videos</div>
							<div class='triangle triangle1'></div>
							<div class='triangle triangle1shadow'></div>
						</a>
					
					</div>
				
				</div>
				
				<a class='upNextBox' href='$nextVideoLink'>
				
					<img class='postImage' src='$nextVideoImage'>
					
					<div class='upNextBox_label'>$nextVideoName</div>
					
				</a>	
				
			</div>";
			
			return $nextVideoLink;
	}

	$nextVideoLink = generatePiece_continuousPlayInfo();
?>