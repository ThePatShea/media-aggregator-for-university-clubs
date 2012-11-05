<script>
										
	$(document).ready(function(){
	
		$(".dropDownMenu li div").click(function() {
	   		
	   		var hidden = $(this).parents("li").children("ul").is(":hidden");
	   		
			$(".dropDownMenu>ul>li>ul").hide();       
		   	$(".dropDownMenu>ul>li>a").removeClass();
		   		
		   	if (hidden) {
		   		$(this)
			   		.parents("li").children("ul").toggle();
			   	} 
		});
		
		$(".dropDownMenu li ul li").click(function() {
				
				var hidden = $(this).parents("li").children("ul").is(":hidden");
				
			$(".dropDownMenu>ul>li>ul").hide(); 
			$(".dropDownMenu>ul>li>div>a").hide();
			        
		   	$(".dropDownMenu>ul>li>a").removeClass();
		   		
		   	if (hidden) {
		   		$(this)
			   		.parents("li").children("ul").toggle();
			   	} 
		});
		
		$("#exploreTab1").click(function() {
			$("#dropdownHeaderArticle").show(); 
		});
		
		$("#exploreTab2").click(function() {
			$("#dropdownHeaderPhoto").show(); 
		});
		
		$("#exploreTab3").click(function() {
			$("#dropdownHeaderVideo").show(); 
		});
		
		$("#exploreTab4").click(function() {
			$("#dropdownHeaderEvent").show(); 
		});
		
		
		
		
		
		
		$("#exploreTab5").click(function() {
			$("#dropdownHeaderNews").show(); 
		});
		
		$("#exploreTab6").click(function() {
			$("#dropdownHeaderCommunity").show(); 
		});
		
		$("#exploreTab7").click(function() {
			$("#dropdownHeaderArts").show(); 
		});
		
		$("#exploreTab8").click(function() {
			$("#dropdownHeaderEntertainment").show(); 
		});
		
		$("#exploreTab9").click(function() {
			$("#dropdownHeaderPolitics").show(); 
		});
		
		$("#exploreTab10").click(function() {
			$("#dropdownHeaderAthletics").show(); 
		});
		
		$("#exploreTab11").click(function() {
			$("#dropdownHeaderAcademics").show(); 
		});
		
		
		
		
		
		$("#exploreTab12").click(function() {
			$("#dropdownHeaderNewest").show(); 
		});
		
		$("#exploreTab13").click(function() {
			$("#dropdownHeaderOldest").show(); 
		});
		
		
		$("#dropdownHeaderPhoto").hide();
		$("#dropdownHeaderVideo").hide();  
		$("#dropdownHeaderEvent").hide();
		
		$("#dropdownHeaderCommunity").hide();
		$("#dropdownHeaderArts").hide();
		$("#dropdownHeaderEntertainment").hide();
		$("#dropdownHeaderPolitics").hide();
		$("#dropdownHeaderAthletics").hide();
		$("#dropdownHeaderAcademics").hide();		
		
		$("#dropdownHeaderOldest").hide(); 
		 
		
	});

</script>

<?php
	
	function generatePiece_teaserBlockHeader($titleText, $linkText, $linkLocation)
	{
		echo "<div style='display:block'>";
		
			echo "<div style='height: 1px; background: #D7DFE3;margin-top: 10px; margin-bottom: 10px;'></div>";
			
			echo "<div style='line-height: 18px; display: inline-block; margin-left: 15px; color: #39505E; font-family: museosans500; text-transform: uppercase; font-size: 15px;'>";
				echo $titleText;
			echo "</div>";
			
			echo "<a href='$linkLocation' style='line-height: 18px; display: inline-block; float: right; margin-right: 15px; color: #3D5463; font-family: Lucida Grande; text-transform: uppercase; font-size: 10px; font-weight: bold;'>";
				echo "+ " . $linkText;
			echo "</a>";
		
		echo "</div>";
	}
	
	function generatePiece_dropDown()
	{
		echo
		"<div class='dropDownMenu'>
			<ul>
				<li>
					<div>	
						<a href='#'>
							<span>
								popularity
							</span>
							<span class='triangle triangle2'></span>
							<span class='triangle triangle2shadow'></span>
						</a>
					</div>
					<ul>
						<li>
							<a href='#'>
								latest
								<span class='triangle triangle1'></span>
							</a>
						</li>
						<li><a href='#'>popularity</a></li>
						<li><a href='#'>trending</a></li>
					</ul>
				</li>
			</ul>
		</div>
		";
	}
	
	function generatePiece_exploreDropDown($dropDownFilter)
	{
		if ($dropDownFilter == "type")
		{
			echo
			"<div class='dropDownMenu'>
				<ul>
					<li>
						<div style='float: right;'>	
							<a id='dropdownHeaderArticle' target='_self' href='#'>
								<img style='position: relative; top: 3px;' src='lib/images/icons/_postArticle.png'>
								<span>
									articles
								</span>
								<span class='triangle triangle2'></span>
								<span class='triangle triangle2shadow'></span>
							</a>
							<a id='dropdownHeaderPhoto' target='_self' href='#'>
								<img style='position: relative; top: 3px;' src='lib/images/icons/_postPhoto.png'>
								<span>
									photos
								</span>
								<span class='triangle triangle2'></span>
								<span class='triangle triangle2shadow'></span>
							</a>
							<a id='dropdownHeaderVideo' target='_self' href='#'>
								<img style='position: relative; top: 3px;' src='lib/images/icons/_postVideo.png'>
								<span>
									videos
								</span>
								<span class='triangle triangle2'></span>
								<span class='triangle triangle2shadow'></span>
							</a>
						</div>
						<ul id='articleList' class='articleList' style='margin-left: 40px; width: 110px;'>
							<li id='exploreTab1'>
								<div style='width: 20px; display: inline-block;'>
									<img style='position: relative; left: 7px; top: 3px;' src='lib/images/icons/_postArticle.png'>
								</div>
								<a>articles</a>
							</li>
							<li id='exploreTab2'>
								<div style='width: 20px; display: inline-block;'>
									<img style='position: relative; left: 3px; top: 3px;' src='lib/images/icons/_postPhoto.png'>
								</div>
								<a>photos</a>
							</li>
							<li id='exploreTab3'>
								<div style='width: 20px; display: inline-block;'>
									<img style='position: relative; left: 5px; top: 3px;' src='lib/images/icons/_postVideo.png'>
								</div>
								<a>videos</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
			";
		}
		else if ($dropDownFilter == "category")
		{
			echo
			"<div class='dropDownMenu'>
				<ul>
					<li>
						<div style='float: right; margin-top: 2px;'>	
							<a id='dropdownHeaderNews' target='_self' href='#'>
								<div class='categoryDot category_news' style='position: relative; top: 1px; box-shadow: 1px 1px 0px rgba(255,255,255,.62); -moz-box-shadow: 1px 1px 0px rgba(255,255,255,.62); display: inline-block;'></div>
								<span>
									news
								</span>
								<span class='triangle triangle2'></span>
								<span class='triangle triangle2shadow'></span>
							</a>
							<a id='dropdownHeaderCommunity' target='_self' href='#'>
								<div class='categoryDot category_community' style='position: relative; top: 1px; box-shadow: 1px 1px 0px rgba(255,255,255,.62); -moz-box-shadow: 1px 1px 0px rgba(255,255,255,.62); display: inline-block;'></div>
								<span>
									community
								</span>
								<span class='triangle triangle2'></span>
								<span class='triangle triangle2shadow'></span>
							</a>
							<a id='dropdownHeaderArts' target='_self' href='#'>
								<div class='categoryDot category_arts' style='position: relative; top: 1px; box-shadow: 1px 1px 0px rgba(255,255,255,.62); -moz-box-shadow: 1px 1px 0px rgba(255,255,255,.62); display: inline-block;'></div>
								<span>
									arts
								</span>
								<span class='triangle triangle2'></span>
								<span class='triangle triangle2shadow'></span>
							</a>
							<a id='dropdownHeaderEntertainment' target='_self' href='#'>
								<div class='categoryDot category_entertainment' style='position: relative; top: 1px; box-shadow: 1px 1px 0px rgba(255,255,255,.62); -moz-box-shadow: 1px 1px 0px rgba(255,255,255,.62); display: inline-block;'></div>
								<span>
									entertainment
								</span>
								<span class='triangle triangle2'></span>
								<span class='triangle triangle2shadow'></span>
							</a>
							<a id='dropdownHeaderPolitics' target='_self' href='#'>
								<div class='categoryDot category_politics' style='position: relative; top: 1px; box-shadow: 1px 1px 0px rgba(255,255,255,.62); -moz-box-shadow: 1px 1px 0px rgba(255,255,255,.62); display: inline-block;'></div>
								<span>
									politics
								</span>
								<span class='triangle triangle2'></span>
								<span class='triangle triangle2shadow'></span>
							</a>
							<a id='dropdownHeaderAthletics' target='_self' href='#'>
								<div class='categoryDot category_athletics' style='position: relative; top: 1px; box-shadow: 1px 1px 0px rgba(255,255,255,.62); -moz-box-shadow: 1px 1px 0px rgba(255,255,255,.62); display: inline-block;'></div>
								<span>
									athletics
								</span>
								<span class='triangle triangle2'></span>
								<span class='triangle triangle2shadow'></span>
							</a>
							<a id='dropdownHeaderAcademics' target='_self' href='#'>
								<div class='categoryDot category_academics' style='position: relative; top: 1px; box-shadow: 1px 1px 0px rgba(255,255,255,.62); -moz-box-shadow: 1px 1px 0px rgba(255,255,255,.62); display: inline-block;'></div>
								<span>
									academics
								</span>
								<span class='triangle triangle2'></span>
								<span class='triangle triangle2shadow'></span>
							</a>
						</div>
						<ul id='articleList2' class='articleList' style='width: 160px; margin-left: 28px;'>
							<li id='exploreTab5'>
								<div style='display: inline-block;' class='categoryBox category_news'			>NE</div>
								<a>news</a>
							</li>
							<li id='exploreTab6'>
								<div style='display: inline-block;' class='categoryBox category_community'			>CM</div>
								<a>community</a>
							</li>
							<li id='exploreTab7'>
								<div style='display: inline-block;' class='categoryBox category_arts'			>AR</div>
								<a>arts</a>
							</li>
							<li id='exploreTab8'>
								<div style='display: inline-block;' class='categoryBox category_entertainment'			>ET</div>
								<a>entertainment</a>
							</li>
							<li id='exploreTab9'>
								<div style='display: inline-block;' class='categoryBox category_politics'			>PL</div>
								<a>politics</a>
							</li>
							<li id='exploreTab10'>
								<div style='display: inline-block;' class='categoryBox category_athletics'			>AT</div>
								<a>athletics</a>
							</li>
							<li id='exploreTab11'>
								<div style='display: inline-block;' class='categoryBox category_academics'			>AC</div>
								<a>academics</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
			";
		}
		else if ($dropDownFilter == "recency")
		{
			echo
			"<div class='dropDownMenu'>
				<ul>
					<li>
						<div style='float: right;'>	
							<a id='dropdownHeaderNewest' target='_self' href='#'>
								<img style='position: relative; top: 3px;' src='lib/images/icons/_postEvent.png'>
								<span>
									newest
								</span>
								<span class='triangle triangle2'></span>
								<span class='triangle triangle2shadow'></span>
							</a>
							<a id='dropdownHeaderOldest' target='_self' href='#'>
								<img style='position: relative; top: 3px;' src='lib/images/icons/_postEvent.png'>
								<span>
									oldest
								</span>
								<span class='triangle triangle2'></span>
								<span class='triangle triangle2shadow'></span>
							</a>
						</div>
						<ul id='articleList' class='articleList' style='margin-left: 40px; width: 110px;'>
							<li id='exploreTab12'>
								<div style='width: 20px; display: inline-block;'>
									<img style='position: relative; left: 7px; top: 3px;' src='lib/images/icons/_postEvent.png'>
								</div>
								<a>newest</a>
							</li>
							<li id='exploreTab13'>
								<div style='width: 20px; display: inline-block;'>
									<img style='position: relative; left: 7px; top: 3px;' src='lib/images/icons/_postEvent.png'>
								</div>
								<a>oldest</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
			";
		}
	}
	
	
	function generatePiece_categoryBox($category, $type)
	{
		echo "<div class='categoryAndTypeBox unselectableWithDefault'>";
			
			categorySelect($category);
			
			generatePiece_typeBox($type);
		
		echo "</div>";
	}
	
		function generatePiece_categoryBox_categoryOnly($category)
		{
			echo "<div class='categoryAndTypeBox'>";
				
				categorySelect($category);
							
			echo "</div>";
		}
		
			function categorySelect($category)
			{
				switch ($category)
				{
					 case "news":			echo "<a class='categoryBox category_news'			>NE</a>"; break;
					 case "community":		echo "<a class='categoryBox category_community'		>CM</a>"; break;
					 case "arts":			echo "<a class='categoryBox category_arts'			>AR</a>"; break;
					 case "entertainment":	echo "<a class='categoryBox category_entertainment'	>ET</a>"; break;
					 case "politics":		echo "<a class='categoryBox category_politics'		>PL</a>"; break;
					 case "athletics":		echo "<a class='categoryBox category_athletics'		>AT</a>"; break;
					 case "academics":		echo "<a class='categoryBox category_academics'		>AC</a>"; break;	  
				}
			}
			
		
			function generatePiece_typeBox($type)
			{
				echo '<div class="typeBox">';
				
					if ($type != 'article')
					{
						echo $type;
					}
					else
					{
						echo 'text';
					}
						
				echo '</div>';
			}
		
		function generatePiece_categoryDot($category)
		{
			switch ($category)
			{
				 case "news":			echo "<a class='categoryDot category_news'			></a>"; break;
				 case "community":		echo "<a class='categoryDot category_community'		></a>"; break;
				 case "arts":			echo "<a class='categoryDot category_arts'			></a>"; break;
				 case "entertainment":	echo "<a class='categoryDot category_entertainment'	></a>"; break;
				 case "politics":		echo "<a class='categoryDot category_politics'		></a>"; break;
				 case "athletics":		echo "<a class='categoryDot category_athletics'		></a>"; break;
				 case "academics":		echo "<a class='categoryDot category_academics'		></a>"; break;	  
			}
		}	
				
		function generatePiece_header($titleText, $linkText="", $linkLocation="")
		{
			echo "<div class='header'>";
			    
			    echo "<div class='title unselectableWithDefault'>";
			    	echo $titleText;
			    echo "</div>";
			    
			    if ($linkText != ""){
			  	  echo "<div class='link'>";
			  	  
			  	  		echo "<div class='plus unselectableWithDefault'>";
			  	  			echo "+";
			  	  		echo "</div>";
			  	  	
			  	  		echo "<a href='$linkLocation' class='text'>";
			  	  			echo $linkText;
			  	  		echo "</a>";
			  	  
			  	  echo "</div>";
			    }
			    
			    echo "<div class='thinLine'></div>";
			    
			echo "</div>";	
		}
		
		function generatePiece_header_bigTitle($titleText, $linkText="")
		{
			echo "<div class='header'>";
			    
			    echo "<div class='title' style='width: 296px;'>";
			    	echo $titleText;
			    echo "</div>";
			    
			    echo "<div class='thinLine'></div>";
			    
			echo "</div>";	
		}
		
		function generatePiece_icon($iconName)
		{
			if($iconIteration == "")
			{
				$iconIteration = 0;
				global $iconIteration;
			}
			$iconIteration++;
													
			$bgImage = "lib/images/icons/$iconName.png";
			
			
			$imageGroup = get_string_between($bgImage, '_', '_');
								
			echo 
			"
				<style>
					
					.backgroundImage$iconIteration
					{
						background-image: 	url($bgImage);
						background-repeat:	no-repeat;
					}
					
				</style>
			";
			
			
			echo "<div class='icon backgroundImage$iconIteration'>";
				
				if ($imageGroup == 'commentBubble')
				{
					echo "#";
				}
				
			echo "</div>";
			
			
		}
		
	?>