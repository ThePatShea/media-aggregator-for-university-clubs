<?php
	function generatePiece_list($postList, $listHeight, $listWidth, $colorScheme, $numberOfPosts, $numberOfColumns)
		{
			if ($numberOfColumns == 1)
			{
				generatePiece_list_column($postList, $listHeight, $listWidth, $colorScheme, $numberOfPosts, $numberOfColumns);
			}
			else if ($numberOfColumns == 2)
			{
				generatePiece_list_column($postList, $listHeight, $listWidth, $colorScheme, $numberOfPosts, $numberOfColumns);
			}
			
		}
		
			function generatePiece_list_column($postList, $listHeight, $listWidth, $colorScheme, $numberOfPosts, $numberOfColumns)
			{
				if 		($numberOfColumns == 1)
				{
					echo "<div class='columnContainer'>";
						for ($i = 0; $i <= ($numberOfPosts/$numberOfColumns) - 1; $i++)
						{
						    generatePiece_list_row($postList, $listHeight, $listWidth, $colorScheme, $i);
						}
					echo "</div>";
				}
				else if ($numberOfColumns == 2)
				{
					echo "<div class='column1' style='vertical-align: top;'>";
						echo "<div class='columnContainer' style='width:50%'>";
							for ($i = 0; $i <= ($numberOfPosts/$numberOfColumns)-1; $i++)
							{
							    generatePiece_list_row($postList, $listHeight, $listWidth, $colorScheme, $i);
							}
						echo "</div>";
					echo "</div>";
					
					echo "<div class='column2' style='vertical-align: top;'>";
						echo "<div class='columnContainer' style='width:50%'>";
							for ($i = $numberOfPosts/$numberOfColumns; $i <= $numberOfPosts-1; $i++)
							{
							    generatePiece_list_row($postList, $listHeight, $listWidth, $colorScheme, $i);
							}
						echo "</div>";
					echo "</div>";
				}
			}
				
				function generatePiece_list_row($postList, $listHeight, $listWidth, $colorScheme, $i)
				{						
					if ($listHeight == 'small')
					{
						generatePiece_list_row_small($postList, $listHeight, $listWidth, $colorScheme, $i);
					}
					else if ($listHeight == 'large')
					{
						generatePiece_list_row_large($postList, $listHeight, $listWidth, $colorScheme, $i);
					}
											        
				}
				
					function generatePiece_list_row_large($postList, $listHeight, $listWidth, $colorScheme, $i)
					{
						echo "<div class='row_{$colorScheme} heightLarge'>";
							
							echo "<div class='container'>";
							
								echo "<div class='leftSide'>";
								
									echo "<div class='categoryBoxContainer'>";
										generatePiece_categoryBox($postList[$i]['category'], $postList[$i]['type']);
									echo "</div>";
									
								echo "</div>";
								
								echo '<div class="rightSide">';
								
									echo '<div class="verticalAlignWrapper">';
									
										echo '<div class="titleAndOrganizationContainer">';
											
											echo '<div class="titleAndOrganizationContent">';
												
												echo "<a class='title unselectableWithPointer' style=' width: 210px;' href='". $postList[$i]['link'] ."'>";
														echo $postList[$i]['name'];
													echo "</a>";
												
												echo '<div class="organizationName">';
													
													echo $postList[$i]['accountName'];
													
												echo '</div>';
											
											echo '</div>';
										
										echo '</div>';
									
									echo '</div>';
																				
								echo '</div>';
							
							echo '</div>';
								
						echo "</div>";
						
					}
					
					function generatePiece_list_row_small($postList, $listHeight, $listWidth, $colorScheme, $i)
					{						
						if ($postList[$i] && !$postList[$i]['category'])
						{
							$postList[$i]['category'] = getPostCategory($postList[$i]);
						}
						
						echo "<div class='row_{$colorScheme} heightSmall'>";
						
						if ($listWidth != 'large')
						{
							echo "<div style='display:inline-block; vertical-align:top; padding-left: 10px; padding-right: 10px; padding-top: 9px;'>";
						}
						else
						{
							echo "<div style='display:inline-block; vertical-align:top; padding-left: 10px; padding-right: 10px; padding-top: 9px; position: relative; left: 3px; top: 2px;'>";
						}							
							generatePiece_categoryDot($postList[$i]['category']);
						echo "</div>";
						
						echo "<div class='titleAndDateContainer' style='position: relative;'>";
							
							if ($listWidth == "small")
							{
							    
							    
							    echo "<a class='postTitle crop2 unselectableWithPointer' style='height: 30px' href='". $postList[$i]['link'] ."'>";
							   		
							   		echo "<div class='postTitle' style='font-size: 8px; text-transform: uppercase; width: 35px; margin-right: 5px;'>";
							   			echo $postList[$i]['type'];
							   		echo "</div>";
							   		
							   		echo $postList[$i]['name'];
							   		
							   	echo "</a>";
							   	
							   	echo "<div class='postDate' style='width: 50px'>";
							    	if ($postList[$i]['name'] != "")
							    		echo date( "m/d", strtotime($postList[$i]['created_time']) );
							    echo "</div>";
							} 
							else if ($listWidth == "large")
							{
								if (!$postList[$i]['link'])
								{
									$postList[$i]['link']  = '../../../../../event.php?id=';
									$postList[$i]['link'] .= $postList[$i]['postFacebookID'];
								}
								
								if ($postList[$i]['name'])
								{
									echo "<a target='_parent' class='postTitle crop2 unselectableWithPointer' style='height: 30px; width: 100px;' href='". $postList[$i]['link'] ."'>";
										echo "<div class='postInfo' style='vertical-align: top;'>";
										   	echo " | "; 
										   	echo $postList[$i]['location'];
										   	echo " | ";
										   	echo date('g:i A', $postList[$i]['start_time']);
										   	echo " | ";
										echo "</div>";
									echo "</a>";
									
									echo "<a target='_parent' class='postTitle crop2 unselectableWithPointer' style='height: 30px; width: 325px;' href='". $postList[$i]['link'] ."'>";
										
										echo "<div class='postTitle' style='display: inline; vertical-align: top;'>";
										 	echo $postList[$i]['name'];
										echo "</div>";
									echo "</a>";
									
																			
									
									
									
								}
								
							}
						
						echo "</div>";
						
						
							
						echo "</div>";
					}
	?>