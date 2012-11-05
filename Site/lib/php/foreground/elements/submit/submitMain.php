<?php

	$submitType = $_GET['submitType'];

?>

<script type='text/javascript'>

	var req;
	
	function navigate(urlVars) {
	        var url = 'submit.php?submitType=<?php echo $submitType;?>'+urlVars;
	        if(window.XMLHttpRequest) {
	                req = new XMLHttpRequest();
	        } else if(window.ActiveXObject) {
	                req = new ActiveXObject('Microsoft.XMLHTTP');
	        }
	        req.open('GET', url, true);
	        req.onreadystatechange = callback;
	        req.send(null);
	        
	}
	
	function callback() {        
	        obj = document.getElementById("calendar");
	        setFade(0);
	        
			if(req.readyState == 4) {
	                if(req.status == 200) {
	                        response = req.responseText;
	                        obj.innerHTML = response;
	                        fade(0);
	                } else {
	                        alert("There was a problem retrieving the data:\n" + req.statusText);
	                }
	        }
	}
	
	function fade(amt) {
		if(amt <= 100) {
			setFade(amt);
			amt += 10;
			setTimeout("fade("+amt+")", 5);
	    }
	}
	
	function setFade(amt) {
		obj = document.getElementById("calendar");
		
		amt = (amt == 100)?99.999:amt;
	  
		// IE
		obj.style.filter = "alpha(opacity:"+amt+")";
	  
		// Safari<1.2, Konqueror
		obj.style.KHTMLOpacity = amt/100;
	  
		// Mozilla and Firefox
		obj.style.MozOpacity = amt/100;
	  
		// Safari 1.2, newer Firefox and Mozilla, CSS3
		obj.style.opacity = amt/100;
	}

</script>

<body onLoad='navigate("","")'>

	<div id="calback" style="background: url('../../../../images/other/ajaxLoader.gif'); background-repeat:no-repeat; background-attachment:fixed; background-position:50% 10%;">
		<div id="calendar" class="unselectable"></div>
	</div>

</body>