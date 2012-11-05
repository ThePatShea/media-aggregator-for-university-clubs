var req;

function dayClick(cur) {
        var url = "currentDayEventList.php?cur="+cur;
        if(window.XMLHttpRequest) {
                req = new XMLHttpRequest();
        } else if(window.ActiveXObject) {
                req = new ActiveXObject("Microsoft.XMLHTTP");
        }
        req.open("GET", url, true);
        req.onreadystatechange = dayClickCallback;
        req.send(null);
}

	function dayClickCallback() {        
	        obj2 = document.getElementById("calendarBottom");
	        setFade(0);
	        
			if(req.readyState == 4) {
	                if(req.status == 200) {
	                        response = req.responseText;
	                        obj2.innerHTML = response;
	                        fade(0);
	                } else {
	                        alert("There was a problem retrieving the data:\n" + req.statusText);
	                }
	        }
	}

function navigate(month,year,cur) {
        var url = "calendar.php?month="+month+"&year="+year+"&day="+cur;
        if(window.XMLHttpRequest) {
                req = new XMLHttpRequest();
        } else if(window.ActiveXObject) {
                req = new ActiveXObject("Microsoft.XMLHTTP");
        }
        req.open("GET", url, true);
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
		amt += 25;
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