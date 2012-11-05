<script type="text/javascript">
	
	$(document).ready(function(){
		//Initialize
		//Set the selector in the first tab
		$(".tabContainer .TabMenu span:first").addClass("selector");
		
		
		//Basic hover action
		$(".tabContainer .TabMenu span").mouseover(function(){
			$(this).addClass("hovering");
		});
		$(".tabContainer .TabMenu span").mouseout(function(){
			$(this).removeClass("hovering");
		});				
		
		//Add click action to tab menu
		$(".tabContainer .TabMenu span").click(function(){
			//Remove the exist selector
			$(".selector").removeClass("selector");
			//Add the selector class to the sender
			$(this).addClass("selector");
			
			//Find the width of a tab
			var TabWidth = $(".TabContent:first").width();
			if(parseInt($(".TabContent:first").css("margin-left")) > 0)
				TabWidth += parseInt($(".TabContent:first").css("margin-left"));
			if(parseInt($(".TabContent:first").css("margin-right")) >0)
				TabWidth += parseInt($(".TabContent:first").css("margin-right"));
			//But wait, how far we slide to? Let find out
			var newLeft = -1* $("span").index(this) * TabWidth;
			//Ok, now slide
			$(".AllTabs").animate({
				left: + newLeft + "px"
			},500);
		});
	});

</script>