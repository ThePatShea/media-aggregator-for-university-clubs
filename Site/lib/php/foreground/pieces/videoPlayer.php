<?php

	$videoURL  = "http://www.youtube.com/watch?v=";
	$videoURL .= $_GET['id'];
	$videoURL .= "&autostart=true";
	
	echo "
	
	<SCRIPT LANGUAGE='JavaScript'>
	
		var x=6;
		
		function CountDown()
		{
			x--;
			
			if (x>=10)
				document.form1.clock.value = x + ' secs';
			else
				document.form1.clock.value = '0' + x + ' secs';
			
			if(x>0)
			{
				timerID=setTimeout('CountDown()', 1000)
			}
			else
			{
				location.href='$nextVideoLink'
			}
		}
	
	</script>
	
	<script type='text/javascript' src='lib/js/swfobject-1.5.js'></script>
	  
	  <div id='mediaspace' style='position: relative; z-index: 100;'>You must enable Flash and JavaScript in your browser to play this video.</div>
	  
	  <script type='text/javascript'>
	    var player = null;
	    function playerReady(thePlayer) {
	      player = document.getElementsByName('ply')[0];
		    addListeners(); 
	    }
	    function stateMonitor(obj)
	    {
	      if(obj.newstate == 'COMPLETED')
	      {
	        var continuousPlay = readCookie('continuousPlay');
	        
	        if(continuousPlay != 'off')
	        {
	        	document.getElementById('nextVideo').innerHTML = 'next video in';
	        
	       		window.setTimeout('CountDown()',100);
	       	}
	        
	      }
	    };
	    function addListeners() {
		    if (player) { player.addModelListener('STATE', 'stateMonitor'); } 
		    else { setTimeout('addListeners()',100); }
	    }
	   	 
		   

		

		var s1 = new SWFObject('lib/swf/player.swf','ply','630','379','9','#000000');
		s1.addParam('allowfullscreen','true');
		s1.addParam('allowscriptaccess','always');
		s1.addVariable('file', 'file=$videoURL');
		s1.addVariable('skin', 'lib/js/videoplayerskin.zip');
		s1.write('mediaspace');

		
		
	  </script>";

?>