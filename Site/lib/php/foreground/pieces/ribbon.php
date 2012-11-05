<?php
	
	function generatePiece_ribbonTop($ribbonTopTitle)
		{
			echo "<div class='smallBox ribbon'>";
				
				echo "<div class='ribbonTop'>";
					
					echo '<div class="thinLine"></div>';
					
					echo "<div class='ribbonContents'>";
					
						echo "<div class='title'>";
							echo $ribbonTopTitle;
						echo '</div>';
					
					echo '</div>';
					
				echo "</div>";
				
				echo "<div class='ribbonTopEnder'></div>";
				
			echo "</div>";
		}
		
		function generatePiece_ribbonHeader($titleText)
		{
			global $onOff;
			
			echo '<div class="ribbonHeader">';
				
				echo '<div class="topBox">';
					
					if ($titleText != 'registration' && $titleText != 'creating an organization')
					{
						echo '<div class="title">';
							echo $titleText;
						echo '</div>';
					/*	
						echo '<div class="dropDownTitle">';
							generatePiece_dropDown();
						echo '</div>';
					*/	
					}
					else
					{
						echo '<div class="title" style="width:270px;">';
							echo $titleText;
						echo '</div>';
					}
					
				
				echo '</div>';
				
				echo '<div class="bottomBox">';
					echo '<div class="triangle"></div>';
				echo '</div>';
				
			echo '</div>';
			
		}
		
		function generatePiece_ribbonHeader_withOnOffBox($titleText)
		{
			echo 
				"<div></div>
					
					<script type='text/javascript'>
					
						function selectOffButton()
						{
							$('.offButton').removeClass('offButtonUnselected');
							$('.offButton').addClass('offButtonSelected');
							
							$('.onButton').addClass('onButtonUnselected');
							$('.onButton').removeClass('onButtonSelected');
						}
					
						function selectOnButton()
						{
							$('.offButton').addClass('offButtonUnselected');
							$('.offButton').removeClass('offButtonSelected');
							
							$('.onButton').removeClass('onButtonUnselected');
							$('.onButton').addClass('onButtonSelected');
						}
						
						function setContinuousPlayCookie()
						{
							
						}
					
					</script>
					
				";
													
			echo '<div class="ribbonHeader">';
				
				echo '<div class="topBox">';
				
					echo '<div class="title">';
						echo $titleText;
					echo '</div>';
					
					echo '<div class="onOffBox">';
					
						if ($_COOKIE["continuousPlay"] == 'off')
						{
							echo '<div class="button onButton onButtonUnselected" onclick="selectOnButton(); continuousPlayOn();">';
								echo 'on';
							echo '</div>';
							
							echo '<div class="button offButton offButtonSelected" onclick="selectOffButton(); continuousPlayOff();">';
								echo 'off';
							echo '</div>';
						}
						else
						{
							echo '<div class="button onButton onButtonSelected" onclick="selectOnButton(); continuousPlayOn();">';
								echo 'on';
							echo '</div>';
							
							echo '<div class="button offButton offButtonUnselected" onclick="selectOffButton(); continuousPlayOff();">';
								echo 'off';
							echo '</div>';
						}
						
						
					echo '</div>';
				
				echo '</div>';
				
				echo '<div class="bottomBox">';
					echo '<div class="triangle"></div>';
				echo '</div>';
				
			echo '</div>';
			
		}
		
		function generatePiece_ribbonFooter($linkText, $linkLocation)
		{
			echo 
			"<div class='ribbonFooter'>
				
				<div class='spacer'>
					
				</div>
				
				<div class='ender'>
					<a class='link' href='". $linkLocation ."'>$linkText</a>
					<div class='triangle triangle1'></div>
					<div class='triangle triangle1shadow'></div>
				</div>
				
			 </div>
			";
		}
		
	?>