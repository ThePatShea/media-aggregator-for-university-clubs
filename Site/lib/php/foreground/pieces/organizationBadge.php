<?php	
	
	function generatePiece_organizationBadge($organizationID)
		{
			$userInfo = generateQueryArray("SELECT pic_square,facebookLink FROM users WHERE facebookID = $organizationID");
			
			$organizationImage	= $userInfo[0]['pic_square'];
			$facebookLink		= $userInfo[0]['link'];
			
			echo
			"
			
				<script type='text/javascript'>
					
					/*
					Simple Image Trail script- By JavaScriptKit.com
					Visit http://www.javascriptkit.com for this script and more
					This notice must stay intact
					*/
					
					var trailimage=['test.gif', 100, 99] //image path, plus width and height
					var offsetfrommouse=[-3,-3] //image x,y offsets from cursor position in pixels. Enter 0,0 for no offset
					var displayduration=0 //duration in seconds image should remain visible. 0 for always.
					
					if (document.getElementById || document.all)
					document.write(\"<div id='trailimageid' onmouseover='addHoverClass()' onmouseout='removeHoverClass()' style='position:absolute;visibility:visible;left:0px;top:0px;width:14px;height:14px;'><iframe id='facebooklike' src='http://www.facebook.com/plugins/like.php?app_id=151151081634833&amp;href=$facebookLink&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21' scrolling='no' frameborder='0' style='border:none; overflow:hidden; width:14px; height:14px;' allowTransparency='true'></iframe></div>\")
					
					function gettrailobj(){
					if (document.getElementById)
					return document.getElementById('trailimageid').style
					else if (document.all)
					return document.all.trailimagid.style
					}
					
					function truebody(){
					return (!window.opera && document.compatMode && document.compatMode!='BackCompat')? document.documentElement : document.body
					}
					
					function hidetrail(){
					document.onmousemove=''
					
					}
					
					function followmouse(e){
					var xcoord=offsetfrommouse[0]
					var ycoord=offsetfrommouse[1]
					if (typeof e != 'undefined'){
					xcoord+=e.pageX
					ycoord+=e.pageY
					}
					else if (typeof window.event !='undefined'){
					xcoord+=truebody().scrollLeft+event.clientX
					ycoord+=truebody().scrollTop+event.clientY
					}
					var docwidth=document.all? truebody().scrollLeft+truebody().clientWidth : pageXOffset+window.innerWidth-15
					var docheight=document.all? Math.max(truebody().scrollHeight, truebody().clientHeight) : Math.max(document.body.offsetHeight, window.innerHeight)
					if (xcoord+trailimage[1]+3>docwidth || ycoord+trailimage[2]> docheight)
					gettrailobj().display='none'
					else 
					gettrailobj().display=''
					gettrailobj().left=xcoord+'px'
					gettrailobj().top=ycoord+'px'
					}
					
					function startFollow(){
						
						document.onmousemove=followmouse
						
					}
					
					function addHoverClass()
					{
						$('.customLikeButton').addClass('buttonHover')
					}
					
					function removeHoverClass()
					{
						$('.customLikeButton').removeClass('buttonHover')
					}
					
					function showClickedLike()
					{
						$('.customLikeButton .unclicked').hide()
						$('.customLikeButton .clicked').addClass('inlineBlock')
					}
					
					function showClickedJoin()
					{
						$('.joinButton .unclicked').hide()
						$('.joinButton .clicked').addClass('inlineBlock')
					}
					
					
					if (displayduration>0)
					setTimeout('hidetrail()', displayduration*1000)
					
						
					var inIframe = false;
					function checkClick() {
						if (document.activeElement && document.activeElement === document.getElementById('facebooklike')) {
							if (inIframe == false) {
								$('#facebooklike').remove();
								inIframe = true;
								showClickedLike();
							}
						} else {
							inIframe = false;
						}
					}
					setInterval(checkClick, 1000);
					
				</script>
			
			";
			
			
			
			
							
			echo 
				"<div class='organizationBadge'>
				
					<a class='organizationLogoContainer' href='organization.php?id=". $organizationID ."'>
						<img src='$organizationImage'>
					</a>
					
					<div class='buttonHolder left'>
					
						<a class='customLikeButton' onmouseover='startFollow(); addHoverClass();' onmouseout='hidetrail(); removeHoverClass();'>
							
							<div class='iconHolder unclicked'>";
								generatePiece_icon(_like);
								echo "<div></div>
							</div>
							
							<div class='iconHolder clicked'>";
								generatePiece_icon(_check);
								echo "<div></div>
							</div>
							
							<div class='wordHolder'>
								like
							</div>
							
						</a>
						
						<a class='joinButton comingSoonButton' onclick='showClickedJoin()'>
							
							<div class='iconHolder unclicked'>";
								generatePiece_icon(_join);
								echo "<div></div>
							</div>
							
							
							<div class='iconHolder clicked'>";
								generatePiece_icon(_check);
								echo "<div></div>
							</div>
							
							<div class='wordHolder'>
								join
							</div>
							
							<span class='comingSoonTooltip' style='position: relative; z-index: 100;'>
								coming soon
							</span>
							
						</a>
					
					</div>
					
					<div class='buttonHolder right'>
					
						<a class='profileButton' href='organization.php?id=". $organizationID ."'>
							
							<div class='iconHolder'>";
								generatePiece_icon(_organizationProfile);
								echo "<div></div>
								
							</div>
							
							<div class='wordHolder'>
								profile
							</div>
							
						</a>
						
						<a class='contactButton comingSoonButton'>
							
							<div class='iconHolder'>";
								generatePiece_icon(_contact);
								echo "<div></div>
								
							</div>
							
							<div class='wordHolder'>
								contact
							</div>
							
							<span class='comingSoonTooltip' style='position: relative; z-index: 100;'>
								coming soon
							</span>
							
						</a>
					
					</div>
				
				</div>
				";
		}
?>