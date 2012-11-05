<!-- CSS STYLES	-->
	<section>
		<!-- IMPORT OTHER CSS -->
			<section> <?php echo "<div></div><style>
				
				@import url('lib/css/reset.css');
				@import url('lib/css/fonts.css');
				@import url('http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css');
				
			</style>";?></section>
			
		<!-- PARAMETER SETTERS -->
			<section> <?php echo "<div></div><style>					
					
					a:link, a:visited, a:hover, a:active
					{
					  text-decoration:  	none;
					  display: 				inline-block;
					}
									
					pre
					{
						white-space: pre-wrap;       /* css-3 */
						white-space: -moz-pre-wrap;  /* Mozilla, since 1999 */
						white-space: -pre-wrap;      /* Opera 4-6 */
						white-space: -o-pre-wrap;    /* Opera 7 */
						word-wrap: break-word;       /* Internet Explorer 5.5+ */
					}
					
					.comingSoonTooltip
					{
						display:		none;
						position: 		absolute;
						top: 			0;
					}
					
						a.comingSoonButton:hover .comingSoonTooltip
						{
							display:			block;
							position: 			relative;
							top: 				-25px;
							left: 				40%;
							z-index: 			100;
							background: 		white;
							border-radius:		4px;
							-moz-border-radius:	4px;
							border: 			1px solid #99B1C1;
							width: 				60px;
							padding: 			5px;
							font-size:  		8px;
						}
						
					.unselectableWithDefault
					{
						-webkit-user-select: none;
						-khtml-user-select: none;
						-moz-user-select: none;
						-o-user-select: none;
						user-select: none;
						cursor: default;
					}
					
					.unselectableWithPointer
					{
						-webkit-user-select: none;
						-khtml-user-select: none;
						-moz-user-select: none;
						-o-user-select: none;
						user-select: none;
						cursor: pointer;
					}
					
					.crop
					{
						float:left;
						overflow:hidden;
						position:relative;
						border-radius: 4px;
						-moz-border-radius: 4px;
						width: 240px;
						height: 70px;
					}
					
						.crop img
						{
							position:absolute;
							top:-20px;
						}
						
						.crop div
						{
							position:absolute;
						}
					
					.crop2
					{
						//float:left;
						overflow:hidden;
						position:relative;
						width: 225px;
						height: 20px;
					}
					
						.crop2 img
						{
							position:absolute;
						}
					
					.authorProfileInfo .triangle1
					{
						border-color: 		transparent transparent transparent #3D5563;
						border-width:		4px;
						display: 			inline-block;
						position: 			relative;
						top: 				1px;
						z-index: 			2;
					}
					
					.authorProfileInfo .triangle1shadow
					{
						border-color: 		transparent transparent transparent rgba(255,255,255,0.65);
						border-width:		4px;
						display: 			inline-block;
						position: 			relative;
						top: 				2px;
						left: 				-11px;
						z-index: 			1;
					}
					
					.authorProfileInfo a:hover
					{
						text-decoration: 	underline;
					}
					
					.postTeaser
					{
						
					}
					
						.postTeaser:hover
						{
							//background:		rgba(190,207,215,.19);
						}
						
						.postTeaser div
						{
							text-shadow:			1px 1px 0px white;
						}
						
						.postTeaser .postName
						{
							
						}
						
							.postTeaser .postName:hover
							{
								text-decoration: underline;
							}
						
						.postTeaser .authorLink
						{
							
						}
						
							.postTeaser .authorLink:hover
							{
								text-decoration: underline;
							}
					
					
					
					.greyBox
					{
						border-top: 			1px solid white; 
						border-bottom: 			1px solid #CFDDE2; 
						box-shadow: 			1px 1px 0px #809FB1; 
						-webkit-box-shadow: 	1px 1px 0px #809FB1; 
						background: 			#B8C9D2; 
						position: 				relative; 
						display: 				inline-block;
						
						font-family: 			'Lucida Sans Unicode'; 
						font-size: 				10px;
						text-shadow: 			1px 1px 0px rgba(255,255,255,.65); 
						text-transform: 		uppercase;
						text-align:				center;
						color: 					#53778B;
						
						border-radius: 			4px;
						-moz-border-radius: 	4px;
						
						border-left: 			1px solid white; 
						border-right: 			1px solid #CFDDE2;
					}
						
						.greyBox:link, .greyBox:visited
						{
							color: 					#53778B;
						}
					
						.greyBox:hover
						{
							color: 					#598196;
							background: 			#BFD0DA;
							text-decoration:		underline;
						}
					
					.dynamicGreyButton
					{
						font-family: 		'Lucida Sans';
						font-size:	 		9px;
						color: 				#678DA4;
						text-align: 		center;
						text-transform: 	uppercase;
						text-shadow: 		1px 1px 0px rgba(255,255,255,0.65);
						background-color: 	#B8C9D2;
						border: 			1px solid #CFDDE2;
						border-radius: 		4px;
						-moz-border-radius: 4px;
						z-index: 			5;
						display: 			inline-block;
						box-shadow:			1px 1px 0px #7596AA;
						-webkit-box-shadow:	1px 1px 0px #7596AA;
					}
					
						.dynamicGreyButton:hover
						{
							background: 		#BECFD9;
							color: 				#6D95AE;
						}
					
					.greyButton
					{
						padding: 			10px;
						
						background: 		#B8C9D2;
						border: 			1px solid #CFDDE2;
						border-radius: 		4px;
						-moz-border-radius: 4px;
						box-shadow:			1px 1px 0px #809FB1;
						-webkit-box-shadow:	1px 1px 0px #809FB1;
						
						font-family: 		'Lucida Sans Unicode', 'Lucida Grande', sans-serif; 
						font-size: 			10px; 
						color: 				#52778B;
						text-shadow: 		1px 1px 0px rgba(255,255,255,.65);
						text-transform: 	uppercase;
					}
					
						.greyButton:hover
						{
							color: 				#52778B;
						}
						
						.greyButton:link, .greyButton:visited
						{
							color: 				#52778B;
						}
					
					.widget
					{
						background: 		#E2E9ED;
						margin-bottom: 		20px;
					}
					
					.pageSpacer
					{
						width: 				30px;
						display: 			inline-block;
					}
					
					.largeBox 
					{
						width: 				960px;
						display:			inline-block;
						vertical-align: 	top;
					}
					
					.medBox 
					{
						width: 				630px;
						display: 			inline-block;
						vertical-align: 	top;
					}
						
						.medBox .titleAndDateContainer
						{
							
						}
						
						.twoColumn .titleAndDateContainer
						{
							
						}
					
					.smallBox 
					{
						width: 				300px;
						display: 			inline-block;
						vertical-align: 	top;
					}
						
						.smallBox .titleAndDateContainer
						{
							width:	90%;
						}
							
						.smallBox .body 
						{
							background-color: #E2E9ED;
						}
					
					.thinLine 
					{
						height: 			1px;
						background-color: 	#CCD8E0;
					}
					
					.postTitle 
					{ 
						font-family: 		'Lucida Sans Unicode', 'Lucida Grande', sans-serif; 
						font-size: 			12px; 
						color: 				#333333;
						text-transform: 	capitalize;
						text-shadow: 		1px 1px 1px #FFF;
						text-align: 		left;
						display: 			inline-block;
					}
					
						.postTitle:link, .postTitle:visited
						{ 
							color: 			#333333;
						}
						
						.postTitle:hover
						{ 
							color: 			#505050;
						}
						
					.postDate 
					{ 
						font-family: 		'Lucida Sans Unicode', 'Lucida Grande', sans-serif; 
						font-size: 			8px; 
						color: 				#666666;
						text-align: 		right;
						display: 			inline-block;
					}
					
					.postInfo {
						font-family: 		'Lucida Sans Unicode', 'Lucida Grande', sans-serif;
						font-size: 			10px;
						color: 				#668CA4;
						text-shadow: 		1px 1px 1px #FFF;
						text-transform: 	uppercase;
						display: 			inline-block;
					}
					
					.pageContainer
					{
						width:			960px;
						margin-left: 	auto;
						margin-right:	auto;
					}
					
					.contentContainer
					{
						margin-top: 	30px;
					}
					
					.titleAndDateContainer
					{
						display: 			inline-block;
					}
						
						.titleAndDateContainer .postDate
						{
							text-align: 		right;
							float: 				right;
							padding-right: 		5px;
						}
					
					.postImage
					{
						width: 				100%;
						height: 			100%;
					}
					
					.triangle
					{
						width:				0;
						height:				0;
						border-style:		solid;
					}
					
						.calendarNavButtons .triangle 
						{
							border-width:		4px;
							display: 			inline-block;
						}
						
						.calendarNavButtons .triangle1
						{
							border-color: 		transparent #5E7E91 transparent transparent;
							position: 			absolute;
							top: 				5px;
							z-index: 			10;
						}
						
						.calendarNavButtons .triangle1shadow
						{
							border-color: 		transparent rgba(255,255,255,.25) transparent transparent;
							position: 			absolute;
							top: 				6px;
							left: 				1px;
							z-index: 			5;
						}
						
						.calendarNavButtons .triangle2
						{
							border-color: 		transparent transparent transparent #5E7E91;
							position: 			absolute;
							top: 				6px;
							left: 				3px;
							z-index: 			10;
						}
						
						.calendarNavButtons .triangle2shadow
						{
							border-color: 		transparent transparent transparent rgba(255,255,255,.25);
							position: 			absolute;
							top: 				7px;
							left: 				2px;
							z-index: 			5;
						}
						
					
					.categoryAndTypeBox
					{
						width: 			35px;
					}
					
					.category
					{
						text-shadow: 		1px 1px 0px #FFF;
					}
					
						.category_all
						{
							color: 				#3D5563;
							background-color: 	#5E7E91;
							border:				5px solid 	#698A9E;
							text-shadow: 		1px 1px 0px #354955;
							box-shadow:			1px 1px 0px #466373;
							-webkit-box-shadow:	1px 1px 0px #466373;
						}
						
						.category_news 
						{
							color: 				#764546;
							background-color: 	#AD6163;
							border:				5px solid 	#B36C6F;
							text-shadow: 		1px 1px 0px #503031;
							box-shadow:			1px 1px 0px #A46466;
							-webkit-box-shadow:	1px 1px 0px #A46466;
						}
						
						.category_community 
						{
							color: 				#44683F;
							background-color: 	#6DA065;
							border:				5px solid 	#79A873;
							text-shadow:	 	1px 1px 0px #2D4628;
							box-shadow:			1px 1px 0px #64A469;
							-webkit-box-shadow:	1px 1px 0px #64A469;
						}
						
						.category_arts 
						{
							color: 				#A6A649;
							background-color: 	#CCD075;
							border:				5px solid 	#DBD991;
							text-shadow: 		1px 1px 0px #7B792B;
							box-shadow:			1px 1px 0px #AFB553;
							-webkit-box-shadow:	1px 1px 0px #AFB553;
						}
						
						.category_entertainment 
						{
							color: 				#59339F;
							background-color:	#8C68D9;
							border:				5px solid 	#9674DC;
							text-shadow: 		1px 1px 0px #411D61;
							box-shadow:			1px 1px 0px #894EBA;
							-webkit-box-shadow:	1px 1px 0px #894EBA;
						}
						
						.category_politics 
						{
							color: 				#AC7E26;
							background-color: 	#FFA620;
							border:				5px solid 	#FFB546;
							text-shadow: 		1px 1px 0px #856523;
							box-shadow:			1px 1px 0px #BF8448;
							-webkit-box-shadow:	1px 1px 0px #BF8448;
						}
						
						.category_athletics 
						{
							color: 				#EB59BF;
							background-color: 	#FF99CC;
							border:				5px solid 	#FFAED7;
							text-shadow: 		1px 1px 0px #8A228C;
							box-shadow:			1px 1px 0px #C876D1;
							-webkit-box-shadow:	1px 1px 0px #C876D1;
						}
						
						.category_academics 
						{
							color: 				#7F7F7F;
							background-color: 	#ADADAD;
							border:				5px solid 	#C4C4C4;
							text-shadow: 		1px 1px 0px #5F5F5F;
							box-shadow:			1px 1px 0px #666666;
							-webkit-box-shadow:	1px 1px 0px #666666;
						}
				
				</style>";?></section>
				
		<!-- SMALL PIECES -->
			<section>
			
						<!-- PIECE: ORGANIZATION WALL -->
							<section> <?php echo "<div></div><style>
							
								.organizationWall .organizationName
								{
									font-family: 			'Lucida Grande';
									font-size: 				14px;
									color: 					#33464C;
									text-shadow: 			1px 1px 0px white;
									margin-bottom: 			3px;
									border-bottom:			1px solid #CFDDE2;
									padding-bottom: 		4px;
									display: 				block;
								}
								
								.organizationWall .wallPost
								{
									font-family: 			'Lucida Grande';
									font-size: 				11px;
									color: 					#7892A3;
									text-shadow: 			1px 1px 0px white;
									line-height: 			15px;
									display: 				block;
								}
							
							</style>";?></section>
					
						<!-- PIECE: ORGANIZATION LIST -->
							<section> <?php echo "<div></div><style>
							
								.organizationList .organizationName
								{
									font-family: 			'Lucida Grande';
									font-size: 				14px;
									color: 					#33464C;
									text-shadow: 			1px 1px 0px white;
									display: 				inline-block;
									width: 					225px;
								}
								
								.organizationList .organizationType
								{
									font-family: 			museosans500;
									font-size: 				11px;
									color: 					#7892A3;
									text-shadow: 			1px 1px 0px white;
									display: 				inline-block;
									width: 					225px;
									text-transform:			uppercase;
									padding-top: 			3px;
								}
							
									.organizationList a:hover
									{
										text-decoration: 		underline;
									}
							
							</style>";?></section>
						
						<!-- PIECE: PHOTO VIEWER BUTTONS -->
							<section> <?php echo "<div></div><style>
							
								.photoViewerButtons
								{
									position: 				relative;
									top: 					-30px;
									left:					-5px;
									width:					720px;
								}
								
									.photoViewerButtons a
									{
										width: 					50px;
										height: 				65px; 
										
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
									
										.photoViewerButtons .left:hover, .middle:hover, .right:hover
										{
											background: 			#BFD0DA;
										}
										
											.photoViewerButtons a:hover .label
											{
												color: 					#588196;
											}
										
										.photoViewerButtons a:link 
										{
											color: 					#52778B;
										}
										
										.photoViewerButtons a:visited
										{
											color: 					#52778B;
										}
										
										.photoViewerButtons a .icon
										{
											margin-top: 			11px;
											margin-bottom: 			17px;
											margin-left: 			9px;
											display: 				block;
										}
										
										.photoViewerButtons a .label
										{
											width: 					50px;
											text-align: 			center;
											display: 				block;
											
										}
									
									.photoViewerButtons .left
									{
										left: 					-1px;
										z-index: 				9;
									}
										
									.photoViewerButtons .middle
									{
										width: 					60px;
										left: 					-11px;
										z-index: 				8;
									}
									
										.photoViewerButtons .middle .icon
										{
											margin-left: 			13px;
										}
										
										.photoViewerButtons .middle .label
										{
											margin-left: 			10px;
										}
									
									.photoViewerButtons .right
									{
										width: 					60px;
										left: 					-22px;
										z-index: 				7;
									}
									
										.photoViewerButtons .right .icon
										{
											margin-left: 			14px;
										}
										
										.photoViewerButtons .right .label
										{
											margin-left: 			10px;
										}
										
									.photoViewerButtons .titleBar
									{
										width: 					650px;
										left: 					-13px;
										z-index: 				6;
										vertical-align: 		top;
									}
									
										.photoViewerButtons .titleBar .label
										{
											margin-left: 			30px;
											margin-top: 			35px;
											width: 					480px;
											text-align: 			left;
											font-size: 				15px;
											text-transform: 		capitalize;
										}
									
									.photoViewerButtons .photoCounter
									{
										position:				absolute;
										right:					0;
										top:					0;
										float:					right;
										z-index: 				9;
										
										height: 				65px; 
										
										border-top: 			1px solid white; 
										border-bottom: 			1px solid #CFDDE2; 
										box-shadow: 			1px 1px 0px #809FB1; 
										-webkit-box-shadow: 	1px 1px 0px #809FB1; 
										background: 			#B8C9D2; 
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
							
							</style>";?></section>
										
						<!-- PIECE: USER PROFILE BUTTON -->
							<section> <?php echo "<div></div><style>
							
								.userProfileButtons
								{
									position: 				relative;
									top: 					-20px;
								}
								
									.userProfileButtons a
									{
										width: 					88px;
										height: 				65px; 
										
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
									}
									
										.userProfileButtons a:hover
										{
											background: 			#BFD0DA;
										}
										
											.userProfileButtons a:hover .label
											{
												color: 					#588196;
											}
										
										.userProfileButtons a:link 
										{
											color: 					#52778B;
										}
										
										.userProfileButtons a:visited
										{
											color: 					#52778B;
										}
										
										.userProfileButtons a .icon
										{
											margin-top: 			11px;
											margin-bottom: 			17px;
											margin-left: 			18px;
											display: 				block;
										}
										
										.userProfileButtons a .label
										{
											width: 					88px;
											text-align: 			center;
											display: 				block;
											
										}
									
									.userProfileButtons .left
									{
										border-radius-bottomleft: 		4px;
										-moz-border-radius-bottomleft: 	4px;
										border-left: 					1px solid #BAC9D1; 
										border-right: 					1px solid #CFDDE2;
									}
									
									.userProfileButtons .right
									{
										border-radius-bottomright: 		4px;
										-moz-border-radius-bottomright: 4px;
										border-left: 					1px solid #809FB1; 
										border-right: 					1px solid #CFDDE2;
									}
									
									.userNameSubTitle
									{
										font-family: 		museosans500; 
										color: 				#8CA9B8; 
										font-size: 			10px; 
										text-transform: 	uppercase; 
										padding-top: 		3px;
									}
									
									.userNameSubTitle:link, .userNameSubTitle:visited
									{
										color: 				#8CA9B8;
									}
									
									.userNameSubTitle:hover
									{
										text-decoration: 	underline;
									}
									
									.userProfileText
									{
										font-family: 		'Lucida Grande';
										font-size: 			11px;
										color: 				#333333;
										line-height: 		20px;
										display: 			inline-block;
										margin-top: 		10px;
										margin-left: 		15px;
									}
									
										.userProfileText a:link
										{
											color: 				#333333;
										}
										
										.userProfileText a:visited
										{
											color: 				#333333;
										}
										
										.userProfileText a:hover
										{
											text-decoration: 	underline;
										}
									
									.userProfilePresenter
									{
										display: 			block;
										color: 				#8CA9B8;
										font-size: 			12px;
										text-transform: 	uppercase;
										font-family: 		museosans500;
										vertical-align: 	top;
										line-height: 		22px;
									}
							
							</style>";?></section>
					
						<!-- PIECE: TEASER TYPE ICON -->
							<section> <?php echo "<div></div><style>
							
								.postTeaserTypeIcon
								{
									width: 					50px; 
									height: 				40px; 
									border-radius: 			4px; 
									-moz-border-radius: 	4px; 
									border-top: 			1px solid white; 
									border-left: 			1px solid white; 
									border-right: 			1px solid #CFDDE2; 
									border-bottom: 			1px solid #CFDDE2; 
									box-shadow: 			1px 1px 0px #809FB1; 
									-webkit-box-shadow: 	1px 1px 0px #809FB1; 
									background: 			#B8C9D2; 
									position: 				relative; 
									top: 					57px; 
									left: 					-5px; 
									font-family: 			'Lucida Sans Unicode'; 
									font-size: 				10px;
									color: 					#52778B; 
									text-shadow: 			1px 1px 0px rgba(255,255,255,.65); 
									text-transform: 		uppercase;
								}
							
							</style>";?></section>
						
						<!-- PIECE: REGISTER ICON -->
							<section> <?php echo "<div></div><style>
							
								.registerIcon2
								{
									padding: 			2px;
									padding-bottom: 	6px;
									font-family: 		'Lucida Grande';
									font-size: 			11px;
									color: 				#666666;
									text-shadow: 		1px 1px 0px white;
									text-align: 		center;
									display: 			inline-block;
									margin-right: 		10px;
									margin-bottom: 		10px;
									border-radius: 		4px; 
									-moz-border-radius: 4px; 
									border: 			1px solid #E2E9ED;
									width: 				100px;
								}
							
								.registerIcon
								{
									padding: 			2px;
									font-family: 		'Lucida Grande';
									font-size: 			11px;
									color: 				#666666;
									text-shadow: 		1px 1px 0px white;
									text-align: 		center;
									display: 			block;
									margin-right: 		5px;
								}
								
									.registerCategoryLabel
									{
										font-family: 		'Lucida Grande';
										font-size: 			11px;
										color: 				#666666;
										text-shadow: 		1px 1px 0px white;
										text-align: 		center;
										display: 			block;
										width: 				75px;
										padding-top: 		4px;
									}
								
								.registerIcon:hover
								{
									background: 		#E2E9ED;
								}
							
							</style>";?></section>
						
						
						
						
						<!-- PIECE: LIST -->
							<section> <?php echo "<div></div><style>
							
								.columnContainer 
								{
									display: 	inline-block;
									width: 		100%;
									
								}	
								
									.columnContainer .row_dark
									{
										
									}
										
										.columnContainer .row_dark:nth-child(odd)
										{
										    background:	#E2E9ED;
										}
										
										.columnContainer .row_dark:nth-child(even)
										{
										    background:	#EEF2F5;
										}
									
									.columnContainer .row_bright
									{
										
									}
										
										.columnContainer .row_bright:nth-child(odd)
										{
										    background:	white;
										}
											
										.columnContainer .row_bright:nth-child(even)
										{
										    background:	#EEF2F5;
										}
									
									.columnContainer .heightSmall 
									{
										height: 35px;
									}
									
										.columnContainer .heightSmall .categoryDotContainer
										{
											line-height: 		35px;
										}
										
										.columnContainer .heightSmall .categoryDot
										{
											line-height: 		35px;
										}
										
										.columnContainer .heightSmall .postTitle
										{
											line-height: 		35px;
										}
										
											.columnContainer .heightSmall .postTitle:hover
											{
												text-decoration: 	underline;
											}
										
										.columnContainer .heightSmall .postDate
										{
											line-height: 		35px;
										}
									
										.columnContainer .heightSmall .postInfo
										{
											line-height: 		35px;
											padding-right:		5px;
										}
									
									.column1, .column2
									{
										display: 	inline;
									}
									
									.contentSelector
									{
										height: 	205px;
									}
										.contentSelector .body
										{
											position: 	relative;
											top: 		36px;
										}
										
										.contentSelector .header
										{
											position: relative;
										}
										
											.contentSelector .header .contentCategoryButton
											{
												border-radius: 		5px;
												-moz-border-radius: 5px;
												padding-left: 		5px;
												padding-right: 		5px;
												font-size: 			12px;
												height: 			25px;
												font-family: 		nevisBold;
												text-transform: 	uppercase;
												display: 			inline-block;
												position: 			absolute;
											}
											
												.contentSelector .header .category_all
												{
													z-index:	8;
													text-shadow: 		1px 1px 0px #6891AA;
												}
												
												.contentSelector .header .category_news
												{
													left: 		41px;
													z-index: 	7;
													text-shadow: 		1px 1px 0px #BC8184;
												}
												
												.contentSelector .header .category_community
												{
													left: 		95px;
													z-index: 	6;
													text-shadow:	 	1px 1px 0px #9ABD95;
												}
												
												.contentSelector .header .category_arts
												{
													left: 		191px;
													z-index: 	5;
													text-shadow: 		1px 1px 0px #E8EE85;
												}
												
												.contentSelector .header .category_entertainment
												{
													left: 		242px;
													z-index: 	4;
													text-shadow: 		1px 1px 0px #AE94E4;
												}
												
												.contentSelector .header .category_politics
												{
													left: 		369px;
													z-index: 	3;
													text-shadow: 		1px 1px 0px #FFDDAA;
												}
												
												.contentSelector .header .category_athletics
												{
													left: 		443px;
													z-index: 	2;
													text-shadow: 		1px 1px 0px #FFD2E9;
												}
												
												.contentSelector .header .category_academics
												{
													left: 		531px;
													z-index: 	1;
													text-shadow: 		1px 1px 0px #DFDFDF;
												}
									
										.contentSelector .columnContainer .heightLarge
										{
											height: 60px;
										}
										
										.contentSelector .columnContainer .heightSmall
										{
											height: 30px;
										}
										
											.contentSelector .columnContainer .heightSmall .categoryDotContainer
											{
												line-height: 		30px;
											}
											
											.contentSelector .columnContainer .heightSmall .categoryDot
											{
												line-height: 		30px;
											}
											
											.contentSelector .columnContainer .heightSmall .postTitle
											{
												line-height: 		30px;
											}
											
											.contentSelector .columnContainer .heightSmall .postDate
											{
												line-height: 		30px;
											}
										
										.contentSelector .column1 .columnContainer .heightSmall
										{
											border-right: 1px solid #D8E0E7;
										}
										
										.contentSelector .column1
										{
										
										}
										
											.contentSelector .column1 .row_bright:nth-child(odd)
											{
											    background:	#EEF2F5;
											}
											
											.contentSelector .column1 .row_bright:nth-child(even)
											{
											    background:	white;
											}
										
										.contentSelector .column2 
										{
											border-right: 0;
										}
											
											.contentSelector .column2 .row_bright:nth-child(odd)
											{
											    background:	white;
											}
											
											.contentSelector .column2 .row_bright:nth-child(even)
											{
											    background:	#EEF2F5;
											}
										
									.columnContainer .heightLarge
									{
										//height: 62px;
									}
								
								.heightLarge .leftSide
								{
									width: 					15%;
									display: 				inline-block;
									vertical-align: 		top;
									text-align: 			center;
								}
								
									.heightLarge .container
									{
										padding-left: 			15px;
										padding-right: 			15px;
										padding-top: 			10px;
										padding-bottom: 		6px;
									}
								
									.ribbon .leftSide .categoryBoxContainer
									{
										margin-bottom: 		10px;
									}
									
									.heightLarge .verticalAlignWrapper 
									{
										display:				table;
										height: 				43px;
									}
								
								.heightLarge .rightSide
								{
									display: 				inline-block;
									width: 					200px;
									margin-left: 			15px;
								}
								
									.heightLarge .titleAndOrganizationContainer
									{
										display:				table-cell;
										vertical-align:			middle;
									}
									
										.heightLarge .rightSide .titleAndOrganizationContainer .titleAndOrganizationContent
										{
											
										}
								
										.heightLarge .titleAndOrganizationContainer .title
										{
											color: 					#33464C;
											text-shadow: 			1px 1px 0px #FFF;
											font-family: 			'Lucida Grande';
											font-size: 				12px;
											text-transform: 		capitalize;
											line-height: 			13px;
										}
										
										.heightLarge .titleAndOrganizationContainer .organizationName
										{
											color: 					#8CA9B8;
											text-shadow: 			1px 1px 0px #FFF;
											font-family: 			museosans500;
											font-size: 				11px;
											text-transform: 		uppercase;
											padding-top: 			5px;
										}
							
							</style>";?></section>
				
						<!-- PIECE: POSTED BY -->
							<section> <?php echo "<div></div><style>
							
								.postedBy
								{
									width: 				285px;
									padding-left: 		15px;
									padding-top: 		15px;
									padding-bottom: 	25px;
									display: 			inline-block;
								}
								
									.postedBy .organizationHeading
									{
										font-family: 		museosans500;
										font-size: 			13px;
										color: 				#39505E;
										text-shadow: 		1px 1px 0px white;
										text-transform: 	uppercase;
										display: 			inline-block;
										margin-bottom: 		5px;
										display: 			block;
										width: 				230px;
										line-height: 		17px;
									}
									
									.postedBy .organizationText
									{
										font-family: 		'Lucida Grande';
										font-size: 			11px;
										color: 				#666666;
										text-shadow: 		1px 1px 0px white;
										display: 			inline-block;
										line-height: 		17px;
										margin-top: 		5px;
									}
							
								</style>";?></section>
						
						<!-- PIECE: ORGANIZATION BADGE -->
							<section> <?php echo "<div></div><style>
								
									#trailimageid {
										position:absolute;
										opacity: 0;
										filter: Alpha(opacity=0);
										z-index: 50;
									}
									
									.organizationBadge
									{
										width: 				300px;
										height: 			55px;
										display: 			inline-block;
									}
									
										.organizationBadge div, a
										{
											display: 			inline-block;
											user-select: 		none;
											-moz-user-select: 	none;
											-khtml-user-select: none;
											font-family: 		'Lucida Sans Unicode';
										}
									
										.organizationBadge .organizationLogoContainer
										{
											width: 				55px;
											height: 			55px;
											border: 			1px solid #BAC9D1;
											border-right: 		1px solid #97AFBD;
											position: 			relative;
											z-index: 			3;
											top: 				1px;
											
											box-shadow:			0px -1px 0px white;
											-webkit-box-shadow:	0px -1px 0px white;
										}
										
											.organizationBadge .organizationLogoContainer img
											{
												height: 		100%;
											}
									
										.organizationBadge .buttonHolder
										{
											height: 			100%;
											border: 			1px solid #CFDDE2;
											border-radius: 		4px;
											-moz-border-radius: 4px;
											background: 		#B8C9D2;
											
											box-shadow:			1px 1px 0px #7EA0B1;
											-webkit-box-shadow:	1px 1px 0px #7EA0B1;
											
											border-top: 		1px solid white;
											vertical-align: 	top;
											
											font-family: 		'Lucida Sans Unicode';
											font-size: 			10px;
											color: 				#54778B;
											text-shadow: 		1px 1px 0px rgba(255,255,255,.65);
											text-transform: 	uppercase;
											cursor: 			pointer;
										}
											
											.organizationBadge .buttonHolder a:hover
											{
												cursor: 		pointer;
												background: 	#BCCDD7;
												color: 			#6995AF;
											}
											
											.organizationBadge .buttonHolder a:link
											{
												color: 			#54778B;
											}
											
											.organizationBadge .buttonHolder a:visited
											{
												color: 			#54778B;
											}
											
											.organizationBadge .buttonHover
											{
												cursor: 		pointer;
												background: 	#BCCDD7;
												color: 			#6995AF;
											}
											
											.organizationBadge .left
											{
												width:  		74px;
												position: 		relative;
												z-index: 		2;
												left: 			-10px;
											}
											
											.organizationBadge .right
											{
												width:  		110px;
												position: 		relative;
												z-index: 		1;
												left: 			-25px;
											}
										
											.organizationBadge .clicked
											{
												display: 		none;
											}
											
											.organizationBadge .inlineBlock
											{
												display: 		inline-block;
											}
										
											.organizationBadge .buttonHolder .customLikeButton
											{
												height: 						28px;
												border-bottom: 					1px solid #7EA0B1;
												width: 							100%;
												border-radius-topright: 		4px;
												-moz-border-radius-topright: 	4px;
											}
												
												.organizationBadge .buttonHolder .customLikeButton .iconHolder
												{
													margin-left: 		16px;
													margin-top: 		6px;
													vertical-align: 	top;
												}
												
												.organizationBadge .buttonHolder .customLikeButton .wordHolder
												{
													margin-left: 		2px;
													vertical-align: 	top;
													margin-top: 		10px;
												}
												
											
											.organizationBadge .buttonHolder .joinButton
											{
												height: 						25px;
												border-top: 					1px solid #CFDDE2;
												width: 							100%;
												border-radius-bottomright: 		4px;
												-moz-border-radius-bottomright: 4px;
												position: 						relative;
											}
												
												.organizationBadge .buttonHolder .joinButton .iconHolder
												{
													margin-left: 		16px;
													margin-top: 		4px;
													vertical-align: 	top;
												}
												
												.organizationBadge .buttonHolder .joinButton .wordHolder
												{
													margin-left: 		2px;
													vertical-align: 	top;
													margin-top: 		7px;
												}
											
											.organizationBadge .buttonHolder .profileButton
											{
												height: 						28px;
												border-bottom: 					1px solid #7EA0B1;
												width: 							100%;
												border-radius-topright: 		4px;
												-moz-border-radius-topright: 	4px;
											}
											
												.organizationBadge .buttonHolder .profileButton .iconHolder
												{
													margin-left: 		22px;
													margin-top: 		6px;
													vertical-align: 	top;
												}
												
												.organizationBadge .buttonHolder .profileButton .wordHolder
												{
													margin-left: 		2px;
													vertical-align: 	top;
													margin-top: 		9px;
												}
											
											.organizationBadge .buttonHolder .contactButton
											{
												height: 						25px;
												border-top: 					1px solid #CFDDE2;
												width: 							100%;
												border-radius-bottomright: 		4px;
												-moz-border-radius-bottomright: 4px;
											}
											
												.organizationBadge .buttonHolder .contactButton .iconHolder
												{
													margin-left: 		22px;
													margin-top: 		4px;
													vertical-align: 	top;
												}
												
												.organizationBadge .buttonHolder .contactButton .wordHolder
												{
													margin-left: 		2px;
													vertical-align: 	top;
													margin-top: 		8px;
												}
									
											
											#trailimageid
											{
											overflow:		hidden;
											position:		relative;
											cursor: 		pointer;
											}
											
											#facebooklike
											{
											position:		absolute;
											top:			-4px;
											left:			-6px;
											cursor: 		pointer;
											}
								
							</style>";?></section>
						
						<!-- PIECE: DROP DOWN MENU -->
							<section> <?php echo "<div></div><style>
							
								.dropDownMenu {
									
									}
									.dropDownMenu .triangle1 {
										border-color: 		transparent transparent #B8C9D2 transparent;
										border-width:		6px;
										display: 			inline-block;
										position: 			relative;
										left: 				100%;
										top: 				-14px;
									}
									.dropDownMenu .triangle2 {
										border-color: 		#3D5563 transparent transparent transparent;
										border-width:		4px;
										display: 			inline-block;
										position: 			relative;
										top: 				2px;
										z-index: 			2;
										}
										.dropDownMenu .triangle2 .rotate{
											border-color: 		#3D5563 transparent transparent transparent;
											border-width:		4px;
											display: 			inline-block;
											position: 			relative;
											top: 				3px;
											z-index: 			2;
										}
									.dropDownMenu .triangle2shadow {
										border-color: 		rgba(255,255,255,0.25) transparent transparent transparent;
										border-width:		4px;
										display: 			inline-block;
										position: 			relative;
										top: 				3px;
										left: 				-11px;
										z-index: 			1;
										}
										.dropDownMenu .triangle2shadow .rotate {
											border-color: 		rgba(255,255,255,0.25) transparent transparent transparent;
											border-width:		4px;
											display: 			inline-block;
											position: 			relative;
											top: 				4px;
											left: 				-11px;
											z-index: 			1;
										}
									
									.dropDownMenu em, a, span {
										text-decoration: 	none;
										font-style: 		regular;
									}
									.dropDownMenu ul {
										display: 			block;
										}
										.dropDownMenu ul li {
												position:		relative;
											}
											.dropDownMenu ul li:hover {
												
											}
											.dropDownMenu ul li a {
												display: 		block;
												padding-right: 	3px;
												text-transform: uppercase;
												
												text-decoration: none;
												}
												.dropDownMenu ul li a span{
													font-family: 		'Lucida Sans Unicode';
													font-size: 			10px;
													color: 				#53778B;
													text-shadow: 		1px 1px 0px rgba(255,255,255,0.65);
													}
													.dropDownMenu ul li a span:hover{
														color: 					#53778B;
													}
																	
												.dropDownMenu ul li a:hover {
													
												}
												.dropDownMenu ul li a span {
													text-decoration: 	none;
													font-style: 		regular;
												}
											.dropDownMenu ul li ul {
												display: 				none;
												position: 				absolute;
												top: 					21px;
												left: 					-50%;
												
												border: 				1px solid #CFDDE2;
												border-radius: 			4px;
												-moz-border-radius: 	4px;
												box-shadow:				1px 1px 0px #809FB1;
												-webkit-box-shadow:		1px 1px 0px #809FB1;
																
												background: 			#B8C9D2;
												padding: 				0 0 0 0;
												padding-bottom: 		3px;
												}
												.dropDownMenu ul li ul li {
													float: 				none;
													padding-top: 		5px;
													padding-bottom: 	5px;
													padding-left: 		8px;
													padding-right: 		8px;
													margin: 			0;
													height: 			100%;
												}
												.dropDownMenu ul li ul li:hover {
													background: 		none;
													}
													.dropDownMenu ul li ul li a {
														font-family: 		'Lucida Sans Unicode';
														font-size: 			10px;
														color: 				#53778B;
														text-shadow: 		1px 1px 0px rgba(255,255,255,0.65);
														display: 			inline-block;
														float: 				none;
														margin-right: 		10px;
														margin-left: 		8px;
														padding-top: 		3px;
														padding-bottom: 	3px;
													}
													.dropDownMenu ul li ul li a:hover {
														
													}
																		
													.dropDownMenu ul li ul li:nth-child(odd)
													{
													    background:			#B8C9D2;
													}
													
														.dropDownMenu ul li ul li:nth-child(odd):hover
														{
														    background:			#BCCCD6;
														}
													
													.dropDownMenu ul li ul li:nth-child(even)
													{
													    background:			rgba(255,255,255,0.2);
													}
													
														.dropDownMenu ul li ul li:nth-child(even):hover
														{
														    background:		rgba(255,255,255,0.25);
													}
							
							</style>";?></section>
					
					<!-- PIECE: LIKE BUTTON -->
						<section> <?php echo "<div></div><style>
						
							.likeButtonContainer
							{
								
							}	
									
								.likeButtonContainer .likeButton
								{
									position: 			absolute;
									z-index: 			1;
									height: 			20px;
									vertical-align: 	top;
								}
								
								.likeButtonContainer .hider
								{
									position: 			absolute;
									background: 		white;
									z-index: 			10;
									width: 				45px;
									height: 			20px;
									vertical-align: 	top;
									left: 				50px;
								}
						
						</style>";?></section>
						
					<!-- PIECE: ICON -->
						<section> <?php echo "<div></div><style>
						
							.icon
							{
								width: 				19px;
								height: 			17px;
								color: 			 	white;
								font-weight: 		bold;
								font-size: 			8px;
								font-family: 		'Lucida Grande';
								text-align: 		center;
								padding-top: 		4px;
							}
							
						</style>";?></section>
						
					<!-- PIECE: CATEGORY BOX, TYPE BOX, AND CATEGORY DOT -->
						<section> <?php echo "<div></div><style>
						
							.categoryDotContainer
							{
								width:				20px;
								display: 			inline-block;
								text-align: 		left;
								padding-left: 		10px;
							}
								
								.categoryDot
								{
									height:				10px;
									width: 				10px;
									border:				0;
									border-radius: 		2px;
									-moz-border-radius: 2px;
									font-size: 			9px;
									box-shadow:			1px 1px 0px rgba(255,255,255,1);
									-webkit-box-shadow:	1px 1px 0px rgba(255,255,255,1);
								}
							
							.categoryBox
							{				
								color:				white;
								border-radius: 		5px;
								-moz-border-radius: 5px;
								font-family: 		nevisBold; 
								font-size: 			12px;
								text-transform: 	uppercase;
								padding-top: 		3px;
								height: 			18px;
								width: 				22px;
								z-index: 			1;
								display: 			inline-block;
								text-align: 		center;
							}
										
							.typeBox
							{
								font-family: 		'Lucida Sans';
								font-size:	 		8px;
								color: 				#678DA4;
								text-align: 		center;
								text-transform: 	uppercase;
								text-shadow: 		1px 1px 0px rgba(255,255,255,0.65);
								width: 				30px;
								height: 			12px;
								padding-top: 		3px;
								background-color: 	#B8C9D2;
								border: 			1px solid #CFDDE2;
								border-radius: 		4px;
								-moz-border-radius: 4px;
								z-index: 			5;
								display: 			inline-block;
								box-shadow:			1px 1px 0px #7596AA;
								-webkit-box-shadow:	1px 1px 0px #7596AA;
								position: 			relative;
								top: 				-8px;
							}
						
						</style>";?></section>
						
					<!-- PIECE: HEADER -->
						<section> <?php echo "<div></div><style>
						
							.header 
							{
							    line-height: 25px;
							}
							
							    .header .thinLine 
							    {
							    	background-color: 	#CCD8E0;
							    	margin-bottom: 		1px;
							    }
							    							    
							    .header .title 
							    {
							    	font-family:	museosans500;
							    	font-size: 		15px;
							    	color: 			#39505E;
							    	text-transform: uppercase;
							    	padding-left: 	4px;
							    	display: 		inline-block;
							    	width: 			49%;
							    }
							
									.eventAccordion .header .title 
									{
										font-family:	museosans500;
										font-size: 		15px;
										color: 			#39505E;
										text-transform: uppercase;
										padding-left: 	4px;
										display: 		inline-block;
										width: 			49%;
									}
							
							    .header .link 
							    {
							    	display: 		inline-block;
							    	text-transform: uppercase;
							    	text-align: 	right;
							    	width: 			49%;
							    }
							    
							    	.header .link a:hover
							    	{
							    		text-decoration: underline;
							    	}
							    	
							    	.header .link .plus 
							    	{
							    		color: 			#39505E;
							    		font-family: 	Arial;
							    		font-size:	 	12px;
							    		display: 		inline;
							    	}
							    	
							    	.header .link .text 
							    	{
							    		color:			#668CA4;
							    		font-family: 	'Lucida Sans';
							    		font-size:	 	10px;
							    		display: 		inline;
							    	}
						
						</style>";?></section>
					
					<!-- PIECE: RIBBON -->
						<section> <?php echo "<div></div><style>
						
							.ribbon
							{
								background-color: 	#E2E9ED;
								width: 				288px;
								margin-left: 		10px;
								position: 			relative;
								top: 				-20px;
								z-index: 			1;
							}
							
								.ribbon .ribbonText
								{
									font-family: 		'Lucida Grande';
									font-size: 			11px;
									color: 				#666666;
									text-shadow: 		1px 1px 0px white;
									display: 			inline-block;
									line-height: 		17px;
								}
							
								.ribbonFooterBlank
								{
									border-top: 		1px solid #FFFFFF;
									height: 			30px;
									background: 		#E2E9ED;
								}
							
								.ribbon .ribbonFooter
								{
									
								}
								
									.ribbon .ribbonFooter .spacer
									{
										border-bottom: 		1px solid #B7C8D2;
										height: 			20px;
									}
									
									.ribbon .ribbonFooter .ender
									{
										border-top: 		1px solid #FFFFFF;
										height: 			25px;
										line-height: 		25px;
										color: 				#53778B;
										text-shadow: 		1px 1px 0px rgba(255,255,255,.65);
										font-family: 		'Lucida Sans Unicode';
										font-size: 			10px;
										text-transform: 	uppercase;
										padding-left: 		20px;
									}
									
									.ribbon .ribbonFooter .ender .link
									{
										margin-right: 		3px;
										display: 			inline-block;
									}
									
										.ribbon .ribbonFooter .ender .link:link, .link:visited
										{
											color: 				#53778B;
										}
									
									.ribbon .ribbonFooter .triangle1
									{
										border-color: 		transparent transparent transparent #3D5563;
										border-width:		4px;
										display: 			inline-block;
										position: 			relative;
										top: 				1px;
										z-index: 			2;
									}
									
									.ribbon .ribbonFooter .triangle1shadow {
										border-color: 		transparent transparent transparent rgba(255,255,255,0.65);
										border-width:		4px;
										display: 			inline-block;
										position: 			relative;
										top: 				2px;
										left: 				-11px;
										z-index: 			1;
									}
									
							
								.ribbonHeader
								{
									
								}
									
									.ribbonHeader .bottomBox
									{
										
									}			
								
										.ribbonHeader .bottomBox .triangle 
										{
											border-color: 		#466373 transparent transparent transparent;
											border-width:		10px;
											display: 			inline-block;
											position: 			relative;
											vertical-align: 	top;	
										}
								
									.ribbonHeader .topBox
									{
										background-color: 		#5E7E91;
										border: 				5px solid #698A9E;
										box-shadow:				1px 1px 0px #466373;
										-moz-box-shadow:		1px 1px 0px #466373;
										position: 				relative;
										z-index: 				2;
									}
									
										.ribbonHeader .topBox .title
										{
											color: 					white;
											font-family: 			nevisbold;
											font-size: 				13px;
											text-shadow: 			1px 1px 0px rgba(44,64,73,0.82);
											text-transform: 		uppercase;
											line-height: 			25px;
											margin-left: 			10px;
											display: 				inline-block;
											width: 					60%;
										}
										
										.ribbonHeader .topBox .dropDownTitle
										{
											display: 				inline-block;
										}
															
								.ribbon .ribbonContents
								{
									margin: 				15px;
								}
								
								.ribbon .leftSide
								{
									width: 					15%;
									display: 				inline-block;
									vertical-align: 		top;
									text-align: 			center;
								}
								
									.ribbon .leftSide .categoryBoxContainer
									{
										margin-bottom: 		1px;
									}
								
									.ribbon .leftSide .commentContainer
									{
										margin-left: 		8px;
									}
									
									.ribbon .leftSide .postDate
									{
										
									}
								
								
								.ribbon .rightSide
								{
									display: 				inline-block;
									width: 					200px;
									vertical-align: 		top;
									margin-left: 			15px;
								}
								
								.ribbon .thinLine
								{
									background-color: 		#FFF;
									height: 				1px;
									margin-top: 			1px;
								}
							
								.ribbon .ribbonTop
								{
									border-bottom: 		1px solid #B7C8D2;
								}
							
									.ribbon .ribbonTop .title
									{
										font-family:		museosans500;
										font-size: 			20px;
										color: 				#33464C;
										text-shadow: 		1px 1px 0px #FFFFFF;
										text-transform: 	capitalize;
										margin-bottom: 		10px;
									}
									
									.ribbon .ribbonTopEnder
									{
										border-top: 		1px solid #FFFFFF;
										height:  			10px;
									}
						
						</style>";?></section>
					
				</section>
					
				<!-- ELEMENTS -->
					<section>
					
						<!-- CONTINUOUS PLAY -->
							<section> <?php echo "<div></div><style>
							
								.continuousPlay .onOffBox
								{
									display: 			inline-block;
									cursor: 			pointer;
									position: 			relative;
									left: 				23px;
									top: 				-1px;
								}
							
									.continuousPlay .onOffBox .button
									{
										display: 			inline-block;
										font-family: 		nevisbold;
										font-size: 			9.5px;
										border-radius:      4px;
										-moz-border-radius: 4px;
										position: 			relative;
										text-transform: 	uppercase;
										height: 			12px;
										padding-top: 		3px;
										text-align: 		center;
									}
																		
									.continuousPlay .onOffBox .onButton
									{
										background: 		#62B42C;
										box-shadow:			1px 1px 0px #89D656;
										-webkit-box-shadow:	1px 1px 0px #89D656;
										width: 				30px;
										left: 				4px;
									}
									
									.continuousPlay .onOffBox .offButton
									{
										background: 		#990000;
										box-shadow:			1px 1px 0px #D50000;
										-webkit-box-shadow:	1px 1px 0px #D50000;
										width: 				33px;
									}
									
									.continuousPlay .onOffBox .onButtonUnselected
									{
										z-index: 			1;
										color: 				#366418;
										text-shadow: 		1px 1px 0px #89D656;
									}
									
									.continuousPlay .onOffBox .onButtonSelected
									{
										z-index: 			2;
										color: 				white;
										text-shadow: 		1px 1px 0px rgba(0,0,0,.3);
									}
									
									
									
									.continuousPlay .onOffBox .offButtonUnselected
									{
										z-index: 			1;
										color: 				#4A0000;
										text-shadow: 		1px 1px 0px #D50000;
									}
									
									.continuousPlay .onOffBox .offButtonSelected
									{
										z-index: 			2;
										color: 				white;
										text-shadow: 		1px 1px 0px rgba(0,0,0,.3);
									}
								
								.continuousPlay .nextVideoInfo
								{
									width: 					85px;
									height: 				100px;
									display: 				inline-block;
									vertical-align: 		top;
								}
								
									.continuousPlay .nextVideoInfo div
									{
										display: 				inline-block;
										vertical-align: 		top;
									}
								
									.continuousPlay .nextVideoInfo .static
									{
										font-family: 			museosans500;
										font-size: 				15px;
										color:					#678597;
										text-shadow: 			1px 1px 0px white;
										text-transform: 		uppercase;
										display: 				inline-block;
									}
									
									.continuousPlay .nextVideoInfo .timeRemaining
									{
										font-family: 			museosans500;
										font-size: 				18px;
										color:					#33464C;
										text-shadow: 			1px 1px 0px white;
										text-transform: 		uppercase;
										padding-top: 			2px;
										background: 			#E2E9ED;
										border: 				0;
										display: 				inline-block;
										width: 					72px;
										text-align: 			right;
									}
									
									.continuousPlay .nextVideoInfo .ender
									{
										line-height: 			12px;
										border: 				0;
										padding: 				0;
										margin: 				0;
										margin-top: 			33px;
										cursor: 				pointer;
									}
									
										.continuousPlay .nextVideoInfo .ender div:hover
										{
											text-decoration: 		underline;
										}
							
								.continuousPlay .upNextBox
								{
									width: 				175px;
									height: 			100px;
									display: 			inline-block;
									position: 			relative;
									left: 				-13px;
								}
								
									.continuousPlay .upNextBox:hover 
									{
										
									}
								
									.continuousPlay .upNextBox:hover .upNextBox_label
									{
										color: 					#F1F1F1;
										background-color:		rgba(0,0,0,0.65);
									}
								
									.continuousPlay .continuousPlayInfo
									{
										padding-left: 			15px;
										padding-top: 			23px;
										padding-bottom: 		23px;
									}
									
									.continuousPlay .postImage
									{
										position: 			relative;
										z-index: 			1;
										box-shadow:			1px 1px 0px white;
										-moz-box-shadow:	1px 1px 0px white;
									}
									
									.continuousPlay .upNextBox_label
									{
										background-color:	rgba(0,0,0,0.55);
										padding-top: 		5px;
										padding-bottom: 	5px;
										color:				white;
										font-family: 		'Lucida Grande';
										font-size: 			12px;
										text-align: 		center;
										line-height: 		14px;
										text-overflow: 		ellipsis;
										text-transform:		capitalize;
										position: 			relative;
										z-index: 			2;
										top: 				-60px;
									}
								
							
							</style>";?></section>
				
				<!-- NAV HEADER AND NAV FOOTER -->
					<section>
					
						<!-- ELEMENT: NAV HEADER -->
							<section> <?php echo "<div></div><style>
							
								.navHeaderContainer
								{
									
								}
									
										.navHeaderContainer .border
										{
											height: 6px;
										}
									
									.navHeader
									{
										padding-bottom: 15px;
									}
										
										.navHeader .logInRegister
										{
											display: 			block;
											float:				right;
											margin-right:		1px;
											position:			relative;
											top:				15px;
											margin-bottom:		15px;
										}
								
										.logo
										{
											display: 			inline-block;
											width: 				127px;
											height: 			78px;
											vertical-align: 	top;
											margin-right: 		20px;
										}
										
										.navHeader .innerButtonContainer
										{
											display: 			inline-block;
											border-top: 		1px solid #ADC1CC;
											border-bottom: 		1px solid #ADC1CC;
											border-right: 		1px solid #7A9AAD;
											border-left: 		1px solid #9FB7C4;
											background: 		#99B1C1;
											vertical-align: 	top;
										}
											
										.navHeader .buttonContainer
										{
											display: 			inline-block;
											float: 				right;
											position:			relative;
											z-index:			20;
										}
																							
											.navHeader .buttonContainer .button
											{
												display: 			inline-block;
												background-color: 	#8DA9B9;
												
												padding-left: 		25px;
												padding-top: 		20px;
												padding-bottom: 	20px;
												height: 			16px;
												
												margin-top: 		5px;
												margin-bottom: 		5px;
											}
											
												.navHeader .buttonContainer .button .searchContainer
												{
													position: 			relative;
													top: 				-5px;
												}
												
													.navHeader .buttonContainer .button .searchContainer .subtitle
													{
														margin-left: 		5px;
													}
												
												.navHeader .buttonContainer .button .searchBox
												{
													background-color: 	#5E7E91;
													border: 			1px solid #ACC1CC;
													width: 				110px;
													padding-left: 		5px;
													padding-right: 		10px;
													height: 			25px;
													box-shadow:			inset 1px 1px 0px rgba(0,0,0,0.1);
													-webkit-box-shadow:	inset 1px 1px 0px rgba(0,0,0,0.1);					
													border-radius:      4px;
													-moz-border-radius: 4px;
													display: 			inline-block;
													vertical-align: 	middle;
													margin-left: 		5px;
													
													color: 				#BBCCD5;
													font-family: 		'Lucida Grande';
													font-size:			10px;
												}
												
												.navHeader .buttonContainer .button .goButton 
												{
													border-radius:      4px;
													-moz-border-radius: 4px;		
													box-shadow:			1px 1px 0px rgba(0,0,0,0.15);
													-webkit-box-shadow:	1px 1px 0px rgba(0,0,0,0.15);
													background-color: 	#B8C9D2;
													border: 			1px solid #CFDDE2;
													width: 				26px;
													height: 			26px;
													text-transform: 	uppercase;
													text-align: 		center;
													color: 				#5E7E91;
													font-family: 		nevisBold;
													font-size: 			10px;
													text-shadow: 		1px 1px 0px #CFDBE0;
													display: 			inline-block;
													position: 			relative;
													left: 				-6px;
													vertical-align: 	middle;
												}
													
													.navHeader .buttonContainer .button .goButton:hover
													{
														color: 				#64859A;
														background: 		#BECFD9;
														cursor: 			pointer;
													}
											
												.navHeader .buttonContainer .button .triangle
												{
													vertical-align: 	middle;
													display: 			inline-block;
													position: 			relative;
													top: 				-2px;
													left: 				3px;
												}
												
													.navHeader .buttonContainer .button .triangle .foreground
													{
														border-color: 		#5E7E91 transparent transparent transparent;
													  	border-style:		solid;
													  	border-width:		4px;
													  	width:				0;
													  	height:				0;
													  	display: 			inline-block;
													  	position: 			relative;
													  	z-index: 			2;
													}
													
													.navHeader .buttonContainer .button .triangle .background
													{
														border-color: 		rgba(255,255,255,.25) transparent transparent transparent;
													  	border-style:		solid;
													  	border-width:		4px;
													  	width:				0;
													  	height:				0;
													  	display: 			inline-block;
													  	position: 			relative;
													  	top: 				-7px;
													  	left: 				1px;
													  	z-index: 			1;
													}
												
												.navHeader .buttonContainer .left
												{
													border-left: 					1px solid #ADC1CC;
													
													border-top-left-radius:			4px;
													-moz-border-top-left-radius:	4px;
													border-bottom-left-radius:		4px;
													-moz-border-bottom-left-radius:	4px;
													
													padding-left:					5px;
												}
												
													.navHeader .innerButtonContainer .left
													{
														border-top-left-radius:			4px;
														-moz-border-top-left-radius:	4px;
														border-bottom-left-radius:		4px;
														-moz-border-bottom-left-radius:	4px;
														
														border-left: 					0;
														
														padding-left: 					22px;
													}
													
												.navHeader .buttonContainer .right
												{
													border-right: 						1px solid #ADC1CC;
													
													border-bottom-right-radius:			4px;
													-moz-border-bottom-right-radius:	4px;
													
													padding-right:						5px;
												}
													
													.navHeader .innerButtonContainer .right
													{
														border-bottom-right-radius:			4px;
														-moz-border-bottom-right-radius:	4px;
														
														border-right: 						0;
														padding-left: 						10px;
													}
													
												
												.navHeader .buttonContainer .right
												{
													
												}
												
											.navHeader .buttonContainer .title 
											{
												font-family: 		nevisBold;
												font-size: 			15px;
												color: 	 	 		white;
												text-shadow: 		1px 1px 0px #4A6879;
												text-transform: 	uppercase;
												line-height: 		6px;
											}
											
											.navHeader .buttonContainer .subtitle
											{
												font-family: 		nevisBold;
												font-size: 			10px;
												color: 				#BBCCD5;
												text-shadow: 		1px 1px 0px rgba(0,0,0,0.25);
												text-transform: 	uppercase;
												display: 			inline-block;
												margin-top: 		5px;
											}
										
										.navHeader .featuredSliderContainer
										{
											display: 			inline-block;
											margin-top:			5px;
										}
							
							</style>";?></section>
					
						<!-- ELEMENT: NAV FOOTER -->
							<section> <?php echo "<div></div><style>
							
								.navFooterContainer
									{
										margin-top: 		70px;
									}
									
										.navFooterContainer .border
										{
											height: 			6px;
										}
										
										.navFooterContainer .navFooter
										{
											height: 			220px;
											
										}
										
											.navFooter .footerSpacer
											{
												display:			inline-block;
												width: 				54px;
											}
											
											.navFooter .footerElementHolder
											{
												height: 			150px;
												margin-top: 		35px;
											}
											
												.footerElementHolder .siteLinks
												{
													font-family:		Arial;
													font-size: 			10px;
													color:				white;
													text-transform: 	uppercase;
													text-shadow: 		1px 1px 0px #374D59;
													cursor: 			pointer;
												}
													
													.footerElementHolder .siteLinks:hover
													{
														color:		 		#F3F3F3;
													}
												
												.footerElementHolder .thinLine
												{
													width: 				100%;
													background-color: 	white;
													opacity: 			.25;
												}
												
													.footerElementHolder .siteLinks .thinLine
													{	
														margin-top: 		5px;
														margin-bottom: 		5px;
														width: 				135px;
													}
													
													.footerElementHolder .popularArticlesBox .thinLine
													{	
														margin-top: 		5px;
														margin-bottom: 		1px;
														width: 				225px;
													}
													
													.footerElementHolder .recentComments .thinLine
													{
														margin-bottom: 		5px;
													}
												
													.footerElementHolder .contactUsBox .thinLine
													{
														margin-top: 		5px;
														margin-bottom: 		5px;
													}
												
												.footerElementHolder .title 
												{
													font-family: 		nevisBold;
													font-size: 			15px;
													color: 				white;
													text-shadow: 		1px 1px 0px #4A6879;
													text-transform: 	uppercase;
												}
												
												.footerElementHolder .footerBox 
												{
													display: 			inline-block;
													vertical-align: 	top;
												}
												
												.footerElementHolder .popularArticles 
												{
													color: 				#002E48;
													font-family: 		Arial;
													font-size: 			10px;
													text-shadow: 		1px 1px 0px #BDCCD7;
													text-transform: 	capitalize;
													line-height: 		20px;
													width: 				225px;
												}
													
													.footerElementHolder .popularArticles:hover
													{
														color: 				#384D5B;
													}
													
												.footerElementHolder .recentComments
												{
													width: 				225px;
												}
													
													.footerElementHolder .triangle 
													{
														border-color: 		rgba(255,255,255,0.07) transparent transparent rgba(255,255,255,0.07);
														border-style:		solid;
														border-width:		5px;
														width:				0;
														height:				0;
														position: 			relative;
														top: 				-8px;
														opacity: 			.7;
													}
													
													.footerElementHolder .triangleBorder 
													{
														border-color: 		#809FB1 transparent transparent #809FB1;
														border-style:		solid;
														border-width:		8px;
														margin-left: 		15%;	
														width:				0;
														height:				0;
													}
													
													.footerElementHolder .commentBubble 
													{
														background-color:	rgba(255,255,255,0.07);
														border: 			1px solid rgba(255,255,255,0.3);
														border-radius:      7px;
														-moz-border-radius: 7px;
														font-family: 		Arial;
														font-size: 			10px;
														color:			 	white;
														text-shadow:		1px 1px 0px rgba(0,0,0,0.65);
														text-align:			center;
														height: 			17px;
														padding-top:		6px;
														padding-left: 		15px;
														padding-right:		20px;
														margin-bottom: 		4px;
													}
													
														.footerElementHolder .footerComment0
														{
															
														}
												
														.footerElementHolder .footerComment1
														{
															
														}
														
														.footerElementHolder .footerComment2
														{
															
														}
														
														.footerElementHolder .footerComment3
														{
															
														}
												
												.footerElementHolder .contactUs
												{
													width: 				200px;
													height: 			80px;
												}
												
													.footerElementHolder .contactUs .contactField
													{
														background-color: 	#7394A8;
														font-family: 		Arial;
														font-size: 			10px;
														color: 				white;
														box-shadow:			inset 1px 1px 0px #516876;
														-moz-box-shadow:	inset 1px 1px 0px #516876;
														border-top:			1px solid #95A7B0;
														border-left:		1px solid #95A7B0;
														border-right:		1px solid #BCD3DF;
														border-bottom:		1px solid #BCD3DF;
														border-radius:      4px;
														-moz-border-radius: 4px;
														padding-top:		3px;
														padding-left:		7px;
														padding-right:		7px;
														display: 			inline-block;
														text-shadow: 		1px 1px 0px #374D59;
													}
													
														
														.footerElementHolder .contactUs .topField1
														{
															width: 			98px;
															height: 		25px;
														}
														
														.footerElementHolder .contactUs .topField2
														{
															width: 			98px;
															height: 		25px;
															margin-left: 	4px;
														}
														
														.footerElementHolder .contactUs .bottomField
														{
															margin-top: 	5px;
															padding-top:	7px;
															padding-bottom:	7px;
															width: 			200px;
															height: 		50px;
														}
								
													.footerElementHolder .contactUs .submitButton {
														font-family:		nevisBold;
														font-size:			10px;
														color:				#7F9FB1;
														text-shadow:		1px 1px 0px #CFDBE0;
														text-transform:		uppercase;
														background-color:	#B8C9D2;
														
														box-shadow:			1px 1px 0px #516876;
														-moz-box-shadow:	1px 1px 0px #516876;
														border:				1px solid #CFDDE2;
														border-radius:      4px;
														-moz-border-radius: 4px;
														
														width:				50px;
														height:				20px;
														text-align:			center;
														margin-top: 		5px;
														margin-left: 		149px;
														
														padding-top:		0;
														padding-left: 		6px;
														padding-bottom: 	2px;
													}
													
														.footerElementHolder .contactUs .submitButton:hover
														{
															cursor: 			pointer;
															background: 		#BFD0D9;
															color: 				#759CAF;
														}
							
							</style>";?></section>
					
					</section>
				
				<!-- HOME PAGE ELEMENTS -->
					<section>
					
						<!-- ELEMENT: FEATURED SLIDER -->
							<section> <?php echo "<div></div><style>
							
								.featuredSlider 
								{
									background-color: #99B1C1;
									height: 245px;
									border-radius:      4px;
									-moz-border-radius: 4px;
									
									padding-left: 5px;
									padding-top: 5px;
									
									border-top: 1px solid rgba(255,255,255,.5);
									border-left: 1px solid rgba(255,255,255,.5);
									border-bottom: 1px solid #3C505C;
									border-right: 1px solid #3C505C;
									
									position: relative;
								}
								
									.featuredSlider .featuredSlider_label 
									{
										background-color:rgba(0,0,0,0.5);
										width: 340px;
										z-index: 10;
										color: white;
										
										
										text-align: center;
										padding-left: 3px;
										padding-right: 3px;
										line-height: 30px;
										text-overflow: ellipsis;
										text-transform: uppercase;
									}
									
										.featuredSlider .featuredSlider_label .labelTopLine
										{
											font-family: nevisbold;
											font-size: 24px;
										}
										
										.featuredSlider .featuredSlider_label .labelBottomLine
										{
											font-family: 'Lucida Grande';
											font-weight: bold;
											font-size: 16px;
										}
									
									.featuredSlider .featuredSlider_image 
									{
										width: 948px;
										height: 175px;
										color: white;
										padding-top: 65px;
										border-radius:      4px;
										-moz-border-radius: 4px;
										position: relative;
										z-index: 1;
									}
									
									
								
									.featuredSlider .circle 
									{
										display: inline-block;
										width: 7px;
										height: 7px;
										background: #7F9FB1;
										-moz-border-radius: 40px;
										-webkit-border-radius: 40px;
										
										box-shadow:			1px 1px 0px #DAE2E7;
										-moz-box-shadow:	1px 1px 0px #DAE2E7;
										
										vertical-align: top;
										
										margin: 4px;
									}
									
									.featuredSlider .selected 
									{
										background-color: #4E6D7E;
									}
									
									.featuredSlider .tabBox 
									{
										padding-top: 		4px;
										padding-bottom: 	4px;
										padding-left: 		8px;
										width: 				72px;
										
										border-radius:      4px;
										-moz-border-radius: 4px;
										background-color: #B8C9D2;
										border: 1px solid #CFDDE2;
										
										box-shadow:			1px 1px 0px rgba(0,0,0,0.25);
										-moz-box-shadow:	1px 1px 0px rgba(0,0,0,0.25);
										
										position: absolute;
										top: 195px;
										left: 879px;
										z-index: 10;		
									}
									
										.featuredSlider .circle:hover
										{
											background-color: #4E6D7E;
											cursor: pointer;
										}
										
										.featuredSlider .on
										{
											background-color: #4E6D7E;
										}
							
							</style>";?></section>
							
						<!-- ELEMENT: EVENT ACCORDION -->
							<section> <?php echo "<div></div><style>
							
								.eventAccordion
								{
									height:				300px;
								}
								
									.eventAccordion .date 
									{ 
										font-family: 		nevisBold;
										font-size: 			13px; 
										color: 				#99B1BF;
										text-transform: 	uppercase;
										text-shadow: 		1px 1px 1px #FFF;
										padding-left: 		10px;
										display: 			inline-block;
										width: 				90px;
									}
									
									.eventAccordion .title
									{ 
										font-family: 		arial; 
										font-size: 			10px; 
										color: 				#39505E;
										text-transform: 	capitalize;
										text-shadow: 		1px 1px 1px #FFF;
										display: 			inline-block;
										width: 				200px;
									}
									
									.eventAccordion .rowContent
									{
										border-bottom: 		1px solid #fff;
										border-left:   		1px solid #B8C7D3;
										border-top:    		1px solid #B8C7D3;
										border-right:  		1px solid #FFF;
										background-color: 	#D8E0E7;
										margin: 			0;
										text-transform: 	capitalize;
									}
									
									.eventAccordion .organizationLogoContainer
									{
										margin: 			12px;
										width: 				56.25px;
										height: 			56.25px;
										border: 			1px solid #BAC9D1;
										display: 			inline-block;
									}
										
									.eventAccordion .eventInfoLabel{
										font-family: 		arial; 
										font-size: 			10px; 
										color: 				#658A9F;
										text-shadow: 		1px 1px 1px #FFF;
										padding-top: 		13px;
										display: 			inline-block;
										vertical-align: 	top;
										margin-top: 		3px;
									}
									
									.eventAccordion .eventInfoContent{
										font-family: 		arial; 
										font-size: 			10px; 
										color:	 			#47575F;
										text-shadow: 		1px 1px 1px #FFF;
										text-align: 		right;
										padding-top: 		13px;
										text-transform: 	capitalize;
										display: 			inline-block;
										width: 				155px;
										vertical-align: 	top;
										margin-top: 		3px;
									}
									
										.eventAccordion .eventInfo
										{
											margin-top: 		5px;
											margin-bottom: 		5px;
										}
									
									
									.eventAccordion .row
									{
										height: 			15px;
										line-height: 		15px;
										padding-top: 		10px;
										padding-bottom: 	10px;
									}
									
										.eventAccordion .odd
										{
										    background:	#E2E9ED;
										}
										
										.eventAccordion .even
										{
										    background:	#EEF2F5;
										}
							
							</style>";?></section>
						
						<!-- ELEMENT: SOCIAL MEDIA -->
							<section> <?php echo "<div></div><style>
							
								.socialMedia
								{
									background-color: 	#E2E9ED;
									padding-left: 		15px;
									padding-right: 		15px;
									height: 			340px;
								}
								
									.socialMediaHider1
									{
										width: 				270px;
										height:				15px;
										background-color: 	#E2E9ED;
										position: 			relative;
										top: 				324px;
										border-top: 		1px solid #668BA2
									}
									
									.socialMediaHider2
									{
										width: 				300px;
										height:				20px;
										background-color: 	white;
										position: 			relative;
										top: 				-20px;
										left: 				-15px;
									}
							
							</style>";?></section>
					
						<!-- ELEMENT: SPOTLIGHT ARTICLES -->
							<section> <?php echo "<div></div><style>
							
								.spotlightArticles
								{
									
								}
								
									.spotlightArticles .thinLine
									{
										margin-bottom: 		3px;
									}
								
								.spotlightBox
								{
									
								}
								
									.spotlightImages_container
									{
										height: 			170px;
									}
									.spotlightBox_image
									{
										width: 				200px;
										height: 			50px;
										color: 				white;
										padding-top: 		70px;
										border-radius:      4px;
										-moz-border-radius: 4px;		
										margin-left: 		5px;
										margin-right: 		5px;
										margin-top: 		15px;
										display: 			inline-block;
									}
									
									.spotlightBox_label
									{
										background-color:	rgba(0,0,0,0.5);
										width: 				194px;
										height: 			30px;
										z-index: 			10;
										color:				white;
										font-family: 		'Lucida Grande';
										font-size: 			14px;
										text-align: 		center;
										padding-left: 		3px;
										padding-right: 		3px;
										line-height: 		14px;
										text-overflow: 		ellipsis;
									}
								
							
							</style>";?></section>
						
						<!-- ELEMENT: MAIN ARTICLES -->
							<section> <?php echo "<div></div><style>
							
								.mainArticles
									{
										
									}
									
										.mainArticles .thinLine
										{
											background-color: 	#99B1C1;
											margin-top: 		20px;
											margin-bottom: 		25px;
										}
										
									.articleBox
									{
										width:					300px;
										height:					110px;
										display: 				inline-block;
										font-family: 			'Lucida Grande';
										vertical-align: 		top;
									}
								
										.articleBox .leftSide
										{
											width: 					15%;
											display: 				inline-block;
											vertical-align: 		top;
											text-align: 			center;
										}
										
											.articleBox .leftSide .categoryBoxContainer
											{
												margin-bottom: 		10px;
											}
										
											.articleBox .leftSide .commentContainer
											{
												margin-left: 		12px;
												margin-top: 		15px; 
											}
										
										.articleBox .rightSide
										{
											width: 					85%;
											display: 				inline-block;
										}
										
										.articleBox .title 
										{
											color: 					#333333;
											font-size: 				18px;
										}
										
										.articleBox .text 
										{
											color: 					#333333;
											font-size: 				12px;
											height: 				75px;
											line-height: 			20px;
										}
										
										.articleBox .thinLine
										{
											background-color: 		#99B1C1;
											margin-top: 			10px;
											margin-bottom: 			5px;
										}
										
										.articleBox .thinLine
										{
											background-color: 		#99B1C1;
											margin-top: 			10px;
											margin-bottom: 			5px;
										}
										
										.articleBox_Spacer
										{
											width: 					25px;
											display: 				inline-block;
										}
							
							</style>";?></section>
					
					</section>
				
				<!-- SINGLE PAGE ELEMENTS -->
					<section>
					
						<!-- SINGLE PAGE: MULTIPLE -->
							<section>
							
								<!-- ELEMENT: FACEBOOK LIKES -->
									<section> <?php echo "<div></div><style>
									
										.facebookLikes
										{
											
										}
										
											.facebookLikes .likeBlock
											{
												padding-left: 		462px;
												position:			relative;
												top: 				-127px;
											}
											
												.facebookLikes .likeBlock .thinLine
												{
													height: 			1px;
													background-color: 	#CFDDE2;
												}
											
											.facebookLikes .faceBlock
											{			
												border-top: 		1px solid #CCCCCC;
												padding-top: 		2px;
												padding-left: 		25px;
											}
									
									</style>";?></section>
							
								<!-- ELEMENT: SINGLE PAGE HEADER - EVENT -->
									<section> <?php echo "<div></div><style>
									
										.singlePageHeaderPost .mainSectionEvent
										{
											margin-left: 		8px;
											width: 				457px;
											vertical-align: 	top;
										}
									
										.singlePageHeaderPost .thinLineSpacer
										{
											width: 				1px;
											height: 			20px;
											margin-left: 		15px;
											margin-right: 		10px;
											margin-top: 		5px;
											background: 		#CFDDE2;
											vertical-align: 	top;
										}
									
										.eventInfoLeftBox
										{
											display: 				inline-block;
											width: 					100px;
											height: 				175px;
										}
										
											.eventInfoLeftBox div
											{
												display: 			inline-block;
												vertical-align: 	top;
												
												border: 			1px solid #EAF0F2;
												
												border-radius: 		4px;
												-moz-border-radius: 4px;
												
												color: 				#54778B;
												font-family: 		'Lucida Sans Unicode', 'Lucida Grande', sans-serif;
												font-size: 			10px;
												text-transform: 	uppercase;
												text-align: 		center;
												text-shadow: 		1px 1px 0px rgba(255,255,255,.65);
											}
											
											.eventInfoLeftBox .dayAndDateBox
											{
												background: 		#B8C9D2;
												
												width: 				100%;
												
												box-shadow:			1px 1px 0px #809FB1;
												-webkit-box-shadow:	1px 1px 0px #809FB1;
												border-top: 		1px solid white;
												border-left: 		1px solid white;
												
												position: 			relative;
												z-index: 			2;
											}
											
												.eventInfoLeftBox .dayAndDateBox div
												{
													border: 			0;
													font-family: 		museosans500;
													font-size: 			13px;
													width: 				100%;
													height: 			27px;
													line-height: 		27px;
												}	
												
												.eventInfoLeftBox .dayAndDateBox .dayBox
												{
													border-bottom: 					1px solid #ADC0CB;
													
													border-radius-bottomleft: 		0;
													-moz-border-radius-bottomleft: 	0;
													border-radius-bottomright: 		0;
													-moz-border-radius-bottomright: 0;
													
													color: 							#3A4D53;
												}
												
												.eventInfoLeftBox .dayAndDateBox .dateBox
												{
													border-top: 					1px solid white;
													
													border-radius-topleft: 			0;
													-moz-border-radius-topleft: 	0;
													border-radius-topright: 		0;
													-moz-border-radius-topright: 	0;
													
													color:							#53778B;
													background: 					#CDDAE0;
												}
											
											.eventInfoLeftBox .likeAndMapBox
											{
												border: 			1px solid #CFDDE2;
												position: 			relative;
												z-index: 			1;
												top: 				-8px;
												left: 				-1px;
											}
											
												.eventInfoLeftBox .likeAndMapBox div
												{
													height: 			52px;
												}
																										
													.eventInfoLeftBox .likeAndMapBox div div
													{
														padding: 		0;
														height: 		17px;
														width: 			17px;
														border: 		0;
														display: 		block;
														margin-left: 	16px;
														margin-top: 	12px;
														margin-bottom: 	5px;
													}
												
												.eventInfoLeftBox .likeAndMapBox .likeBox
												{
													background: 		#B8C9D2;
													
													width: 				50px;
													z-index: 			2;
													
													box-shadow:			1px 1px 0px #809FB1;
													-webkit-box-shadow:	1px 1px 0px #809FB1;
													border-top: 		1px solid white;
													border-left: 		1px solid white;
													position: 			absolute;
												}
												
												.eventInfoLeftBox .likeAndMapBox .mapBox
												{
													background: 		#B8C9D2;
													
													width: 				50px;
													padding-left: 		10px;
													z-index: 			1;
													left: 				40px;
													
													box-shadow:			1px 1px 0px #809FB1;
													-webkit-box-shadow:	1px 1px 0px #809FB1;
													border-top: 		1px solid white;
													border-left: 		1px solid white;
													position: 			absolute;
												}
											
											.eventInfoLeftBox .attendBox
											{
												background: 		#B8C9D2;
												
												width: 				100%;
												height: 			17px;
												padding-top: 		28px;
												
												box-shadow:			1px 1px 0px #809FB1;
												-webkit-box-shadow:	1px 1px 0px #809FB1;
												border-top: 		1px solid white;
												border-left: 		1px solid white;
												
												position: 			relative;
												z-index: 			0;
												top: 				26px;
											}
											
												.eventInfoLeftBox .attendBox div
												{
													padding: 		0;
													height: 		17px;
													width: 			17px;
													border: 		0;
													position: 		relative;
													top: 			-4px;
													left: 			-4px;
												}
											
											.eventInfoLeftBox .answerBox
											{
												border: 			1px solid #CFDDE2;
												position: 			relative;
												z-index: 			-1;
												top: 				13px;
											}
											
												.eventInfoLeftBox .answerBox div
												{
													height: 			38px;
													width: 				32px;
													padding-top: 		20px;
													position: 			absolute;
													top: 				-5px;
												}
													
													.eventInfoLeftBox .answerBox div div
													{
														padding: 		0;
														height: 		17px;
														width: 			17px;
														border: 		0;
														display: 		block;
														margin-left: 	7px;
														margin-top: 	7px;
														position: 		relative;
													}
											
												.eventInfoLeftBox .answerBox .yesBox
												{
													background: 		#B8C9D2;
													
													box-shadow:			1px 1px 0px #809FB1;
													-webkit-box-shadow:	1px 1px 0px #809FB1;
													border-top: 		1px solid white;
													border-left: 		1px solid white;
													left: 				-1px;
												}
												
												.eventInfoLeftBox .answerBox .skipBox
												{
													background: 		#B8C9D2;
													
													box-shadow:			1px 1px 0px #809FB1;
													-webkit-box-shadow:	1px 1px 0px #809FB1;
													border-top: 		1px solid white;
													border-left: 		1px solid white;
													
													padding-left: 		8px;
													left: 				27px;
												}
												
												.eventInfoLeftBox .answerBox .idkBox
												{
													background: 		#B8C9D2;
													
													box-shadow:			1px 1px 0px #809FB1;
													-webkit-box-shadow:	1px 1px 0px #809FB1;
													border-top: 		1px solid white;
													border-left: 		1px solid white;
													
													padding-left: 		8px;
													left: 				59px;
												}
										
										.eventInfoBottomBox
										{
											display: 			inline-block;
											position: 			relative;
											left: 				-43px;
											height: 			130px;
											width: 				460px;
											padding-top: 		5px;
										}
										
											.eventInfoBottomBox .presenterStatic
											{
												margin-top: 		4px;
												margin-bottom: 		4px;
												
												display: 			inline-block;
												color: 				#8CA9B8;
												font-size: 			12px;
												text-transform: 	uppercase;
												font-family: 		museosans500;
												width: 				65px;
												vertical-align: 	top;
												line-height: 		22px;
											}
											
											.eventInfoBottomBox .presenterDynamic
											{
												margin-top: 		4px;
												margin-bottom: 		4px;
												
												display: 			inline-block;
												color:		 		#333333;
												font-size: 			12px;
												text-transform: 	capitalize;
												font-family: 		'Lucida Grande';
												vertical-align: 	top;
												line-height: 		22px;
											}
											
												.eventInfoBottomBox .presenterDynamicWhen
												{
													margin-top: 		4px;
													margin-bottom: 		4px;
													
													display: 			inline-block;
													color:		 		#333333;
													font-size: 			12px;
													font-family: 		'Lucida Grande';
													vertical-align: 	top;
													line-height: 		22px;
												}
											
											.eventInfoBottomBox .thinLineWhite
											{
												background: 		#FFFFFF;
												height: 			1px;
												display: 			block;
											}
											
											.eventInfoBottomBox #postLocationID, #postStreetID
											{
												display: 			block;
											}
											
											.eventDescription
											{
												display: 			inline-block;
												color:		 		#333333;
												font-size: 			13px;
												font-family: 		'Lucida Grande';
												line-height: 		27px;
												width: 				630px;
												position: 			relative;
												top: 				-25px;
											}
											
																							
									</style>";?></section>
							
								<!-- ELEMENT: SINGLE PAGE HEADER - POST -->
									<section> <?php echo "<div></div><style>
									
										.singlePageHeaderOrganization
										{
											height: 				60px;	
										}
									
										.singlePageHeaderPost
										{
											display: 			inline-block;
											margin-bottom: 		22px;
										}
											
											.singlePageHeaderPost .commentContainer
											{
												float: 				right;
											}
										
											.singlePageHeaderPost .facebookContainer
											{
												position: 			absolute;
												left: 				-2px;
											}
											
											.singlePageHeaderPost .sendButtonContainer
											{
												display: 			block;
												position: 			absolute;
												top: 				25px;
											}
											
											.singlePageHeaderPost .likeButtonContainer
											{
												display: 			block;
												position: 			relative;
												left: 				6px;
											}
											
											.singlePageHeaderPost div
											{
												display: inline-block;
											}
										
											.singlePageHeaderPost .mainSection
											{
												margin-left: 		8px;
												vertical-align: 	top;
												width: 				530px;
											}
											
											.singlePageHeaderPost .rightSection
											{
												vertical-align: 	top;
												position: 			relative;
											}
											
											.singlePageHeaderPost .leftSection
											{
												vertical-align: 	top;
											}
										
											.singlePageHeaderPost .postName
											{
												color: 				#33464C;
												font-family: 		museosans500;
												text-transform: 	uppercase;
												height: 			20px;
												width: 				300px;
												font-size: 			8px;
											}
											
												.mainSectionEvent .postName, .postLongDate 
												{
													width:  		inherit;
												}
												
												.mainSectionEvent .presenterDynamic
												{
													width: 			390px;
												}
											
											.singlePageHeaderPost .organizationName
											{
												text-transform: 	capitalize;
												color: 				#33464C;
												font-family: 		museosans500;
												text-transform: 	uppercase;
												vertical-align: 	top;
												border-bottom: 		1px solid #CFDDE2;
												display: 			block;
												
												margin-bottom: 		3px;
												padding-bottom: 	3px;
											}
											
											.singlePageHeaderPost .organizationHeaderContainer
											{
												vertical-align: 	top;
												margin-top: 		10px;
												margin-left: 		15px;
											}
											
											.singlePageHeaderPost .organizationInfo
											{
												vertical-align: 	top;
												cursor: 			pointer;
											}
											
											.singlePageHeaderPost .organizationInfo a
											{
												text-transform: 	uppercase;
												font-family: 		museosans500;
												color: 				#8CA9B8;
												font-size: 			10px;
												vertical-align: 	top;
											}
											
												.singlePageHeaderPost .organizationInfo a:hover
												{
													text-decoration: 		underline;
												}
											
											.singlePageHeaderPost .organizationBadgeContainer
											{
												display: 			inline-block;
												width:				245px;
											}
																								
											.singlePageHeaderPost .postLongDate
											{
												text-transform: 	uppercase;
												font-family: 		museosans500;
												color: 				#668597;
												font-size: 			15px;
												vertical-align: 	top;
											}
											
											.singlePageHeaderPost .thinLine
											{
												display: 		block;
												background: 	#CFDDE2;
												margin-bottom: 	3px;
											}
											
											.singlePageHeaderPost .thinLineVertical
											{
												display: 		inline-block;
												background: 	#CFDDE2;
												width: 			1px;
												height: 		20px;
												vertical-align: top;
												margin-top: 	20px;
											}
									
									</style>";?></section>
							
							</section>
							
						<!-- SINGLE PAGE: VIDEO -->
							<section>
							
								<!-- ELEMENT: CONTENT BOX - VIDEO -->
									<section> <?php echo "<div></div><style>
									
										.videoDescription
										{
											display: 		inline-block;
										}
										
											.videoDescription .topLine
											{
												display: 		inline-block;
												margin-top: 	15px;
												margin-bottom: 	15px;
											}
											
											.videoDescription .spacer
											{
												display: 		inline-block;
												width: 			13px;
											}
											
												.videoDescription .presenterStatic
												{
													display: 			inline-block;
													color: 				#8CA9B8;
													font-size: 			12px;
													text-transform: 	uppercase;
													font-family: 		museosans500;
												}
												
												.videoDescription .presenterDynamic
												{
													display: 			inline-block;
													color:		 		#333333;
													font-size: 			12px;
													font-family: 		'Lucida Grande';
												}
												
													.videoDescription .author
													{
														text-transform: 		capitalize;
													}
														
														.videoDescription .author:hover
														{
															text-decoration: 		underline;
														}
													
											.videoDescription .videoText
											{
												display: 			inline-block;
												color:		 		#333333;
												font-size: 			13px;
												font-family: 		'Lucida Grande';
												line-height: 		27px;
												width: 				630px;
											}
											
											.videoDescription .videoText img
											{
												width: 					100%;
												background: 			#E2E9ED;
												padding: 				5px;
												display: 				inline;
											}
										
										#mediaspace
										{
											display: 			inline-block;
											color:		 		#990000;
											font-size: 			13px;
											font-family: 		'Lucida Grande';
											height: 			380px;
										}
									
									</style>";?></section>
							
							</section>
							
						<!-- SINGLE PAGE: ORGANIZATION PROFILE -->
							<section>
							
								<!-- ELEMENT: EXECUTIVE BOARD -->
									<section> <?php echo "<div></div><style>
									
										.execContainer 
										{ 
											padding-left:			10px;
											padding-right: 			10px;
										}
										
											.halfWidth
											{ 
												width: 				50%;
											}
											
											.execName
											{ 
												text-align: 		right;
											}
											
											.execPosition
											{
												color: 				#39505E;
											}
									
									</style>";?></section>
							
							</section>
						
						<!-- SINGLE PAGE: ADMINISTRATION -->
							<section>
							
								<!-- ELEMENT: CONTENT BOX - ADMINISTRATION -->
									<section> <?php echo "<div></div><style>
									
										.administration
										{
											
										}
									
											.administration .topHeader 
											{ 
												font-family: 		museosans500;
												color: 				#33464C;
												font-size: 			25px;
												border-bottom: 		1px solid #CCD9E0;
												text-transform: 	uppercase;
												padding-bottom: 	2px;
												margin-bottom: 		25px;
											}
											
											.administration .sectionHeader 
											{ 
												font-family: 		nevisbold;
												color: 				#5E7E91;
												font-size: 			12px;
												border-bottom: 		1px solid #CCD9E0;
												text-transform: 	uppercase;
												padding-bottom: 	2px;
												margin-bottom: 		10px;
											}
											
											.administration .sectionText
											{ 
												font-family: 		'Lucida Grande';
												font-size: 			11px;
												color: 				#666666;
												text-shadow: 		1px 1px 0px white;
												display: 			block;
												line-height: 		17px;
												margin-bottom: 		10px;
											}
									
									</style>";?></section>
							
							</section>
					
					</section>
				
			</section>
			
	</section>