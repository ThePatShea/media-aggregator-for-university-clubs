<?php

	include_once("lib/php/background/allBackground.php");
	include_once("lib/php/foreground/elements/comments_custom.php");
	
	$id 			= $_GET['id'];
	$currentPhoto 	= $_GET['currentPhoto'];
	$photoArray 	= generateQueryArray("SELECT * FROM photos WHERE albumID = $id");
	$numberOfPhotos = count($photoArray) - 1;
	
	$albumInfo		= $facebook->api("$id");
	$albumName		= $albumInfo['name'];
	
	

	echo
	"
		<style>
			#page-wrap							{ width: 720px; margin: 0; }
			
			
			.ui-tabs 							{ zoom: 1; }
			.ui-tabs .ui-tabs-nav 				{ list-style: none; position: relative; padding: 0; overflow: hidden; 
												  top: 1px; z-index: 0; }
			.ui-tabs .ui-tabs-nav li 			{ position: relative; float: left; border: 0; 
												  border-bottom-width: 0 !important; margin: 0;  }
			.ui-tabs .ui-tabs-nav li a 			{ float: left; text-decoration: none; padding: 0; color: black; }
			.ui-tabs .ui-tabs-nav 
			li.ui-tabs-selected 				{ padding-bottom: 0; border-bottom-width: 0; }
			.ui-tabs .ui-tabs-nav 
			li.ui-tabs-selected a, .ui-tabs 
			.ui-tabs-nav li.ui-state-disabled a, 
			.ui-tabs .ui-tabs-nav 
			li.ui-state-processing a 			{ cursor: text; }
			.ui-tabs .ui-tabs-nav li a, 
			.ui-tabs.ui-tabs-collapsible 
			.ui-tabs-nav li.ui-tabs-selected a  { cursor: pointer; } /* first selector in group seems obsolete, but required to overcome bug in Opera applying cursor: text overall if defined elsewhere... */
			.ui-tabs .ui-tabs-panel 			{ padding: 0; display: block; border-width: 0; 
												  border: 0; position: relative; min-height: 200px; }
			.ui-tabs .ui-tabs-hide 				{ display: none !important; }
			
			
			
			
			a.mover
			{
				
			}
				
				.mover .triangleRight
				{
					border-color: 		transparent transparent transparent #5E7E91;
					border-width:		7px;
					display: 			inline-block;
					position: 			absolute;
					top: 				38px;
					left:				10px;
					z-index: 			2;
				}
				
				.mover .triangleRightShadow {
					border-color: 		transparent transparent transparent rgba(255,255,255,0.25);
					border-width:		7px;
					display: 			inline-block;
					position: 			absolute;
					top: 				39px;
					left:				10px;
					z-index: 			1;
				}
				
				.mover .triangleLeft
				{
					border-color: 		transparent #5E7E91 transparent transparent;
					border-width:		7px;
					display: 			inline-block;
					position: 			absolute;
					top: 				38px;
					right:				10px;
					z-index: 			2;
				}
				
				.mover .triangleLeftShadow {
					border-color: 		transparent rgba(255,255,255,0.25) transparent transparent;
					border-width:		7px;
					display: 			inline-block;
					position: 			absolute;
					top: 				39px;
					right:				10px;
					z-index: 			1;
				}
				
			
			a.moverProperties
			{
				padding: 0;
				position: absolute;
				color: white; 
				font-weight: bold; 
				text-decoration: none;
			}
			
			.next-tab
			{
				
			}
			
			.nextTabProperties
			{
				-moz-border-radius-topleft: 		0; 
				-webkit-border-top-left-radius: 	0; 
				position: 							absolute; 
				z-index: 							15; 
				top: 								100px; 
				left: 								708px;
				background: red;
				
				
				
				width: 					25px;
				height: 				93px; 
				
				border-top: 			1px solid white; 
				border-bottom: 			1px solid #CFDDE2; 
				box-shadow: 			1px 1px 0px #809FB1; 
				-webkit-box-shadow: 	1px 1px 0px #809FB1; 
				background: 			#B8C9D2; 
				position: 				relative; 
				display: 				inline-block;
				
				font-family: 			'Lucida Sans Unicode'; 
				font-size: 				10px;
				color: 					#52778B; 
				text-shadow: 			1px 1px 0px rgba(255,255,255,.65); 
				text-transform: 		uppercase;
				color: 					#52778B;
				
				border-radius: 			4px;
				-moz-border-radius: 	4px;
				
				border-left: 					1px solid white; 
				border-right: 					1px solid #CFDDE2;
			}
			
				.nextTabProperties:hover
				{
					background: 			#BFD0DA;
				}
			
			.prev-tab
			{ 
				-moz-border-radius-topright: 		0; 
				-webkit-border-top-right-radius: 	0; 
				position: 							absolute; 
				z-index: 							15; 
				top: 								100px; 
				left: 								-24px;
				
				
				width: 					25px;
				height: 				93px; 
				
				border-top: 			1px solid white; 
				border-bottom: 			1px solid #CFDDE2; 
				box-shadow: 			1px 1px 0px #809FB1; 
				-webkit-box-shadow: 	1px 1px 0px #809FB1; 
				background: 			#B8C9D2; 
				position: 				relative; 
				display: 				inline-block;
				
				font-family: 			'Lucida Sans Unicode'; 
				font-size: 				10px;
				color: 					#52778B; 
				text-shadow: 			1px 1px 0px rgba(255,255,255,.65); 
				text-transform: 		uppercase;
				color: 					#52778B;
				
				border-radius: 			4px;
				-moz-border-radius: 	4px;
				
				border-left: 					1px solid white; 
				border-right: 					1px solid #CFDDE2;
			}
			
				.prev-tab:hover
				{
					background: 			#BFD0DA;
				}
				
		</style>
	";

	echo "<div style='border-radius: 4px; -moz-border-radius: 4px; background: #E2E9ED; border-left: 1px solid white; border-top: 1px solid white; border-right: 1px solid #CFDDE2; border-bottom: 1px solid #CFDDE2; box-shadow: 1px 1px 0px #809FB1; -webkit-box-shadow: 1px 1px 0px #809FB1; width: 740px; margin-left: auto; margin-right: auto;'>";
	
		echo "<div style='margin: 10px;'>";
			echo "<div id='page-wrap' >";
				echo "<div id='tabs'>";
					echo "<ul>";
						for ($i = 0; $i <= $numberOfPhotos; $i++)
						{
							$photoNumber = $i + 1;
							
							echo "<li><a href='#fragment-$photoNumber'></a></li>";
						}
					echo "</ul>";
								
					for ($i = 0; $i <= $numberOfPhotos; $i++)
					{
						$photoNumber			= $i + 1;
						$nextPhoto				= $photoNumber + 1;
						$actualNumberOfPhotos 	= $numberOfPhotos + 1;
												
						if ($nextPhoto > $numberOfPhotos)
						{
							$nextPhoto = 1;
						}
						
						$imageSource 	= $photoArray[$i]['source'];
						if ($i != $currentPhoto)
						{
							echo "<div id='fragment-$photoNumber' class='ui-tabs-panel ui-tabs-hide' style='margin-bottom: -50px;'>";
						}
						else
						{
							echo "<div id='fragment-$photoNumber' class='ui-tabs-panel' style='margin-bottom: -50px;'>";
						}
								echo "<a href='#' class='next-tab mover' rel='$nextPhoto'>"; 
									echo "<div style='width: 720px; background: #D5DCDF; position: relative; left: -5px; top: -8px; z-index: 10; border-top: 1px solid #45606D; border-left: 1px solid #45606D; border-bottom: 1px solid white; border-right: 1px solid white;'>";
										echo "<img src='$imageSource' style=' display: block; max-width: 720px; max-height: 540px; margin-left: auto; margin-right: auto;'>";
									echo "</div>";
								echo "</a>";
								
								echo "<div class='photoViewerButtons'>";
								
									echo "<a href='#' class='left comingSoonButton'>";
										echo "
											<span class='comingSoonTooltip' style='position: absolute; top: 30px; left: 20px; z-index: 100;'>
												coming soon
											</span>
										";
										echo "<div class='icon'>";
											generatePiece_icon(_like);
										echo "</div>";
										echo "<div class='label'>";
											echo "like";
										echo "</div>";
									echo "</a>";
									/*
									echo "<a href='#' class='middle'>";
										echo "<div class='icon'>";
											generatePiece_icon(_save);
										echo "</div>";
										echo "<div class='label'>";
											echo "save";
										echo "</div>";
									echo "</a>";
									
									echo "<a href='#' class='right'>";
										echo "<div class='icon'>";
											generatePiece_icon(_flag);
										echo "</div>";
										echo "<div class='label'>";
											echo "flag";
										echo "</div>";
									echo "</a>";
									*/
									echo "<a class='titleBar'>";
										echo "<div class='label'>";
											echo "gallery: " . $albumName;
										echo "</div>";
									echo "</a>";
									
									echo "<div class='photoCounter'>";
										echo "<div style='position: relative; top:35px; padding-left: 8px; padding-right: 8px;'>";
											
											echo "<div style='display: inline-block;'>";
											
												echo "<div class='label unselectableWithDefault' style='font-size: 27px; margin-right: 2px;'>";
													echo "$photoNumber";
												echo "</div>";
												
											echo "</div>";
											
											echo "<div style='display: inline-block; margin-left: 2px;'>";
											
												echo "<div class='label unselectableWithDefault' style='text-align: left;'>";
													echo "of";
												echo "</div>";
												
												echo "<div class='label unselectableWithDefault' style='font-size: 12px; text-align: left;'>";
													echo "$actualNumberOfPhotos";
												echo "</div>";
												
											echo "</div>";
											
										echo "</div>";
									echo "</div>";
									
								echo "</div>";
								
								$currentURL = "thecampusbubble.com/emory/photo.php?photoNumber=$i";
								
								echo '<div style="position: relative; top: -40px; left: -5px; width: 720px; background: #E2E9ED;">';
									echo "<div style='margin-top: 10px;'>";
										generateElement_comments_custom($currentURL, 5, 720);
									echo "</div>";
								echo '</div>';
																								
							echo "</div>";
					}
				echo "</div>";
			echo "</div>";
			
			
			
		echo "</div>";
		
		
		
	echo "</div>";
	
?>

	
<script type="text/javascript">
	$(function() {

		var $tabs = $('#tabs').tabs();

		$(".ui-tabs-panel").each(function(i){

		  var totalSize = $(".ui-tabs-panel").size() - 1;

		  if (i != totalSize) 
		  {
		  	next = i + 2;
		  }
		  else
		  {
		 	next = 1;
		  }
		  
		  $(this).append("<a href='#' class='next-tab mover moverProperties nextTabProperties' rel='" + next + "'><div class='triangle triangleRight'></div><div class='triangle triangleRightShadow'></div></a>");
  
		  if (i != 0) 
		  {
		      prev = i;
		  }
		  else
		  {
		  	prev = totalSize + 1;
		  }
		  
		  $(this).append("<a href='#' class='prev-tab mover moverProperties' rel='" + prev + "'><div class='triangle triangleLeft'></div><div class='triangle triangleLeftShadow'></div></a>");
	
		});

		$('.next-tab, .prev-tab').click(function() { 
	           $tabs.tabs('select', $(this).attr("rel"));
	           return false;
	       });
	    
	    $tabs.tabs('select', <?php echo $currentPhoto; ?>);
   

	});
</script>