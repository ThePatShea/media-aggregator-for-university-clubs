<?php
	
	function generatePiece_FacebookLikes($organizationID)
	{
		global $facebook;
		
		$organizationInfo = $facebook->api($organizationID);
		$OrganizationLink = $organizationInfo['link'];
		
		$accountInfo = generateQueryArray("SELECT accountType from users WHERE facebookID = $organizationID");

		if ($accountInfo[0]['accountType'] == 'organization')
		{		
			
			echo "<div style='margin-top: 35px; position: relative; top: 20px;'>";
		
				
				echo "<div class='header'>";
				    
				    echo "<div class='title unselectableWithDefault'>";
				    	echo "drop a like";
				    echo "</div>";
				    
				    echo "<div class='thinLine' style='background: #D8DFEA;'></div>";
				    
				echo "</div>";
				
				
		
				echo "<div style='position: relative; left: -6px;'>";
					echo
					"
						<div id='fb-root'></div>
						<script>(function(d, s, id) {
						  var js, fjs = d.getElementsByTagName(s)[0];
						  if (d.getElementById(id)) {return;}
						  js = d.createElement(s); js.id = id;
						  js.src = '//connect.facebook.net/en_US/all.js#xfbml=1';
						  fjs.parentNode.insertBefore(js, fjs);
						}(document, 'script', 'facebook-jssdk'));</script>
						
						<div class='fb-like-box' data-href='$OrganizationLink' data-width='642' data-show-faces='true' data-border-color='white' data-stream='false' data-header='false'></div>
					";
				echo "</div>";
			
				echo "<div style='width: 630px; height: 30px; position: relative; top: -20px; background: white;'></div>";
			
			echo "</div>";
		}
	}
	
?>
