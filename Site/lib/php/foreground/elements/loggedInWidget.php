<?php

	function loggedInWidget()
	{
		$facebook = new Facebook2(array(
			'appId'  => '219781404699497',
			'secret' => '11efd0dea9edbb5461a0b74c6227ff42',
			'cookie' => true
		));
		
		$user		= $facebook->getUser();
		
		
			echo "<div class='smallBox'>";
				generatePiece_header("contribute");
				echo "<div class='widget'>";
					
						echo "<div class='organizationList'>";
						
							echo "<div style='padding: 10px; width: 280px; height: 30px; background: #E2E9ED;'>";
							
								echo "<img style='vertical-align: top; display: inline-block; width: 30px; height: 30px; position: relative; left: 3px;' src='lib/images/other/submitArticle.png'>";
								
								echo "<div style='width: 1px; height: 20px; background: #83A0B1; margin-left: 10px; margin-right: 10px; margin-top: 5px; display: inline-block; vertical-align: top;'></div>";
								
								echo "<div style='display: inline-block; width: 225px; padding-top: 1px;'>";
									
									echo "<a href='submit.php?type=post' class='organizationName'>";
										echo "Make a Post";
									echo "</a>";
									
									echo "<div class='organizationType unselectableWithDefault'>";
										echo "article, video, or photo";
									echo "</div>";
								
								echo "</div>";
								
							echo "</div>";
							
							
							
							
							echo "<div style='padding: 10px; width: 280px; height: 30px; background: #EEF2F5;'>";
							
								echo "<img style='vertical-align: top; display: inline-block; width: 30px; height: 30px; position: relative; left: 3px;' src='lib/images/other/submitEvent.png'>";
								
								echo "<div style='width: 1px; height: 20px; background: #83A0B1; margin-left: 10px; margin-right: 10px; margin-top: 5px; display: inline-block; vertical-align: top;'></div>";
								
								echo "<div style='display: inline-block; width: 225px; padding-top: 1px;'>";
									
									echo "<a href='submit.php?type=event' class='organizationName'>";
										echo "Create an Event";
									echo "</a>";
									
									echo "<div class='organizationType unselectableWithDefault'>";
										echo "what's happening?";
									echo "</div>";
								
								echo "</div>";
								
							echo "</div>";
							
							
							
							
							echo "<div style='padding: 10px; width: 280px; height: 30px; background: #E2E9ED;'>";
							
								echo "<img style='vertical-align: top; display: inline-block; width: 30px; height: 30px; position: relative; left: 3px;' src='lib/images/icons/_check2.png'>";
								
								echo "<div style='width: 1px; height: 20px; background: #83A0B1; margin-left: 10px; margin-right: 10px; margin-top: 5px; display: inline-block; vertical-align: top;'></div>";
								
								echo "<div style='display: inline-block; width: 225px; padding-top: 1px;'>";
									
									echo "<a href='register3.php' class='organizationName'>";
										echo "Add Your Organization";
									echo "</a>";
									
									echo "<div class='organizationType unselectableWithDefault'>";
										echo "join the fun";
									echo "</div>";
								
								echo "</div>";
								
							echo "</div>";
							
						echo "</div>";
					
				echo "</div>";
				
			echo "</div>";
		
	}

	loggedInWidget();

	

?>