/*-----------------------------------------------------------------------------------*/
/* Author: Laith Serhan */
/*-----------------------------------------------------------------------------------*/
/* jQuery Cookies */
/*-----------------------------------------------------------------------------------*/
jQuery.cookie=function(name,value,options){if(typeof value!='undefined'){options=options||{};if(value===null){value='';options.expires=-1;}
var expires='';if(options.expires&&(typeof options.expires=='number'||options.expires.toUTCString)){var date;if(typeof options.expires=='number'){date=new Date();date.setTime(date.getTime()+(options.expires*24*60*60*1000));}else{date=options.expires;}
expires='; expires='+date.toUTCString();}
var path=options.path?'; path='+(options.path):'';var domain=options.domain?'; domain='+(options.domain):'';var secure=options.secure?'; secure':'';document.cookie=[name,'=',encodeURIComponent(value),expires,path,domain,secure].join('');}else{var cookieValue=null;if(document.cookie&&document.cookie!=''){var cookies=document.cookie.split(';');for(var i=0;i<cookies.length;i++){var cookie=jQuery.trim(cookies[i]);if(cookie.substring(0,name.length+1)==(name+'=')){cookieValue=decodeURIComponent(cookie.substring(name.length+1));break;}}}
return cookieValue;}};
/*-----------------------------------------------------------------------------------*/
/* Hello Bar */
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function() {
if(closeDate != null) {
if (closeDate < today)
{
jQuery('#hello_bar').hide();
jQuery('#hello_bar_open').hide();
}
jQuery('#hello_bar .close').click( function () {
jQuery('#hello_bar').animate({marginTop: -40}, 200, function() {
jQuery('#hello_bar_open').animate({marginTop: 0}, 200).animate({marginTop: -15}, 90).animate({marginTop: 0}, 90);
jQuery.cookie("helloBar", "close", { path: '/' });
});
});
jQuery('#hello_bar_open').click( function () {
jQuery(this).animate({marginTop: -100}, 400, '', function () {
jQuery('#hello_bar').animate({marginTop: 0}, 200).animate({marginTop: -15}, 90).animate({marginTop: 0}, 90)
jQuery.cookie("helloBar", "open", { path: '/' });
});
});
if(jQuery.cookie("helloBar") === 'close')
{
jQuery('#hello_bar').css("marginTop", -40);
jQuery('#hello_bar_open').css("marginTop", 0);
}
else
{
jQuery('#hello_bar').css("marginTop", 0);
jQuery('#hello_bar_open').css("marginTop", -100);
}
}
}); 
/*-----------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------*/