<?php 

		echo "
		
		<script>
			$(document).ready(function($) {
			   $('#accordion dd:not(:first)').hide();
			   
			   $('#accordion dt a').click(function(){
			           $('#accordion dd').slideUp();
			           $(this).parent().next().slideDown();
			           return false;
			   });
			});
		</script>
		
		";
	
		function generatePiece_accordion2()
		{
			$includedTypes['event']		= 1;
			$postList					= getPosts(5, $includedTypes);
			
			echo "<dl id='accordion'>";
			
				for ($i = 0; $i <= 4; $i++)
				{
					$postName			= $postList[$i]['name'];
					$postStartTime		= $postList[$i]['start_time'];
					$postEndTime		= $postList[$i]['end_time'];
					$postLocation		= $postList[$i]['location'];
					$postAuthor 		= $postList[$i]['accountName'];
					$postAuthorID		= $postList[$i]['accountFacebookID'];
					$postText			= $postList[$i]['description'];
					$postLink			= $postList[$i]['link'];
					
					$userInfo = generateQueryArray("SELECT pic_square FROM users WHERE facebookID = $postAuthorID");
					$postIcon = $userInfo[0]['pic_square'];
					
					
					if ($i % 2 == 0)
						echo "<dt ><a class='row odd' href=''>";
					else
						echo "<dt ><a class='row even' href=''>";
						
							echo "<div class='date'>";
									echo date( "M d", $postStartTime );
								echo "</div>";
								
								echo "<div class='title' style='overflow:hidden; height: 15px; width: 175px; padding-right:25px;'>";
									echo $postName;
								echo "</div>";
								
						echo "</a></dt>";
					
					echo "<dd class='rowContent'>";
						
						echo "<a href='" .$postLink ."'>";
							echo "<div class='organizationLogoContainer' style='border-radius: 0; -moz-border-radius: 0;'>";
								echo "<img style='width:100%; height=100%;' src='" . $postIcon ."'/>";
							echo "</div>";
						echo "</a>";
												
						echo "<div class='eventInfoLabel' style='position: relative; top: -7px;'>";
							echo "<div class='eventInfo'>Host:</div>";	
							echo "<div class='eventInfo'>Start Time:</div>";
							echo "<div class='eventInfo'>End Time:</div>";
							echo "<div class='eventInfo'>Location:</div>";
						echo "</div>";
						
						echo "<div class='eventInfoContent' style='position: relative; top: -7px;'>";
						
							echo "<div class='eventInfo' style='overflow:hidden; height: 10px;'>";
								echo $postAuthor;
							echo "</div>";
							
							echo "<div class='eventInfo'>";
								echo date( "g:i A", $postStartTime );
							echo "</div>";
							
							echo "<div class='eventInfo'>";
								echo date( "g:i A", $postEndTime );
							echo "</div>";
							
							echo "<div class='eventInfo' style='overflow:hidden; height: 10px;'>";
								echo $postLocation;
							echo "</div>";
							
							
						echo "</div>";
		
					echo "</dd>";
				}	
		
			echo "</dl>";
			
		}
		
		
		echo "<div class='smallBox eventAccordion'>";
			generatePiece_header("upcoming events", "post an event", "submit.php?type=event");
			generatePiece_accordion2();
		echo "</div>";
	
?>