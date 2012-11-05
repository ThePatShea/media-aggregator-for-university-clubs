<?php
	
	function generatePiece_navHeader($pageName)
	{	
		$source = getSources();
		
		echo "<div class='navHeaderContainer'>";
		
			echo "<div style='background-image: url(" . $source['headerBG'] . ")'>";
			
				echo "<div class='pageContainer'>";
					echo "<div class='largeBox navHeader'>";
							generatePiece_navHeader_logInRegister();
							generatePiece_navHeader_buttonContainer();
						generatePiece_navHeader_featuredSliderContainer($pageName);		
					echo "</div>";
				echo "</div>";
				
			echo "</div>";
			
			echo "<div class='border' style='background-image: url(" . $source['headerBorder'] . ")'></div>";
		
		echo "</div>";
	}
		
		function generatePiece_navHeader_logInRegister()
		{
			
			$facebook = new Facebook2(array(
				'appId'  => '219781404699497',
				'secret' => '11efd0dea9edbb5461a0b74c6227ff42',
				'cookie' => true
			));
			
			$session = $facebook->getSession();
			
			$logOutURL = $facebook->getLogoutUrl();
			$_SESSION['currentURL'] = currentPageURL();
			
			echo "<div class='logInRegister'>";
				
				if($_SESSION['facebookID'] > 1) {
				
					$id = $facebook->getUser();			
					$userInfo = generateQueryArray("SELECT name from users WHERE facebookID = $id");
					$userName = $userInfo[0]['name'];
					
					
					
					echo "<a href='user.php?id=$id' class='greyBox' style='padding-left: 10px; padding-right: 10px; padding-top: 7px; padding-bottom: 5px; position: relative; left: 10px; z-index: 10; border-radius-bottomleft: 		0; -moz-border-radius-bottomleft: 	0; border-radius-bottomright: 		0; -moz-border-radius-bottomright: 0;'>";
						echo "$userName";
					echo "</a>";
					echo "<a href='logout.php' class='greyBox' style='padding-left: 20px; padding-right: 10px; padding-top: 7px; padding-bottom: 5px; border-radius-bottomleft: 		0; -moz-border-radius-bottomleft: 	0; border-radius-bottomright: 		0; -moz-border-radius-bottomright: 0; box-shadow: none; -webkit-box-shadow: none; position: relative; left: 1px;'>";
						echo "log out";
					echo "</a>";
				}
				else
				{
					echo "<a href='login.php' class='greyBox' style='padding-left: 10px; padding-right: 10px; padding-top: 7px; padding-bottom: 5px; position: relative; left: 10px; z-index: 10; border-radius-bottomleft: 		0; -moz-border-radius-bottomleft: 	0; border-radius-bottomright: 		0; -moz-border-radius-bottomright: 0;'>";
						echo "log in";
					echo "</a>";
					
					echo "<a href='register.php' class='greyBox' style='padding-left: 20px; padding-right: 10px; padding-top: 7px; padding-bottom: 5px; border-radius-bottomleft: 		0; -moz-border-radius-bottomleft: 	0; border-radius-bottomright: 		0; -moz-border-radius-bottomright: 0; box-shadow: none; -webkit-box-shadow: none; position: relative; left: 1px;'>";
						echo "sign up";
					echo "</a>";
				}
				
			echo "</div>";
			
			
		}
		
		function generatePiece_navHeader_logo()
		{
			$source = getSources();
			
			echo "<a href='index.php'>";
				echo "<div class='logo' style='background-image: url(" . $source['logo1'] . "); position: relative; top: -11px; left: -6px; height: 88px;'></div>";
			echo "</a>";
		}
		
		function generatePiece_navHeader_buttonContainer()
		{
			echo "<div class='buttonContainer'>";
				generatePiece_navHeader_logo();
				echo "<div class='innerButtonContainer left'>";
				
					echo "<a href='index.php'>";
						echo "<div class='button left' style='width: 101px'>";
							$dropdownList1 = 1;
							generatePiece_navHeader_buttonContainer_button($dropdownList1, "home", "see it all");
						echo "</div>";
					echo "</a>";
				
				echo "</div>";
				
					
				
				echo "<div class='innerButtonContainer'>";
				
					echo "<a href='calendar.php'>";
						echo "<div class='button' style='width: 149px'>";
							$dropdownList2 = 1;
							generatePiece_navHeader_buttonContainer_button($dropdownList2, "events", "what's happening?");
						echo "</div>";
					echo "</a>";
				
				echo "</div>";
				
				echo "<div class='innerButtonContainer'>";
				
					echo "<a href='explore.php'>";
						echo "<div class='button' style='padding-right: 25px'>";
							$dropdownList3 = 1;
							generatePiece_navHeader_buttonContainer_button($dropdownList3, "explore", "student media");
						echo "</div>";
					echo "</a>";
				
				echo "</div>";
				
				echo "<div class='innerButtonContainer'>";
				
					echo "<a href='buzz.php'>";
						echo "<div class='button' style='width: 105px'>";
							$dropdownList4 = 1;
							generatePiece_navHeader_buttonContainer_button($dropdownList4, "buzz", "coming soon");
						echo "</div>";
					echo "</a>";
				
				echo "</div>";
				
				echo "<div class='innerButtonContainer right'>";
				
					echo "<div class='button right' style='width: 200px'>";
						generatePiece_navHeader_buttonContainer_searchBox();
					echo "</div>";
				
				echo "</div>";

			echo "</div>";
		}
		
			function generatePiece_navHeader_buttonContainer_button($dropdownList, $title, $subtitle)
			{
				echo "<div class='title'>";
					echo $title;
				echo "</div>";
				
				echo "<div class='subtitle'>";
					echo $subtitle;
				echo "</div>";
				/*
				echo "<div class='triangle'>";
					echo "<div class='foreground'></div>";
					echo "<div class='background'></div>";
				echo "</div>";
				*/
			}
			
			function generatePiece_navHeader_buttonContainer_searchBox()
			{
				echo "<div class='searchContainer'>";
				
					echo "<form name='form2' method='post' action='search.php'>";
					
						echo "<div class='subtitle'>";
							echo "search:";
						echo "</div>";
					
						echo "<input input name='search' type='text' id='search' class='searchBox'></input>";
											
						echo "<input type='submit' name='Submit' value='go' class='goButton'></input>";
					
					echo "</form>";
				
				echo "</div>";
			}
			
		
		function generatePiece_navHeader_featuredSliderContainer($pageName)
		{
			if ($pageName == 'pageIndex')
			{
				echo "<div class='featuredSliderContainer'>";
					include_once("lib/php/foreground/elements/featuredSlider.php");
				echo "</div>";
			}
		}
		
	//include("helloBar/helloBar.php");
	generatePiece_navHeader($pageName);
	
?>