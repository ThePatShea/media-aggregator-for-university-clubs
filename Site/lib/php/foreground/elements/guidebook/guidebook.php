<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="lib/php/foreground/elements/guidebook/ooc.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<script type="text/javascript" src="http://use.typekit.com/txy8tmh.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
	<script src="lib/php/foreground/elements/guidebook/modernizr.js"></script>


<style>
.1{
    position:relative; /*this is the key*/
    z-index:24; 
    }

.info:hover { z-index:25; cursor: help;}

.info span{display: none}

.info:hover span{ /*the span will display just on :hover state*/
    display:block;
    position: absolute;
    top: 0; left: 0; margin-left: 15px;
    background-color:#fff; color:#000;
	text-align: center;
	border: 2px solid #ccc;
	}
h1
{
    font-family:         museosans500;
    color:               #33464C;
    font-size:           25px;
    text-transform:     uppercase;
	font-weight:        100;
	padding-bottom:     0px;
	margin-bottom:     0px;
}
.guidebookCSS .subtitle
{
	font-family: museosans500;
	text-transform: uppercase;
	font-size: 12px;
	color: #8CA9B8;
	border-bottom:         1px solid #CCD9E0;
	padding-bottom:     2px;
	padding-top:     4px;
	margin-top:     0px;
}
.guidebookCSS .subtitlenb
{
	font-family: museosans500;
	text-transform: uppercase;
	font-size: 12px;
	color: #8CA9B8;
	padding-bottom:     2px;
	padding-top:     0px;
	margin-top:     0px;
}
.guidebookCSS .text
{
	font-family: Lucida Grande;
	font-size: 13px;
	color: #33464C;
	line-height: 22px;
	
}
.guidebookCSS .text2
{
	font-family: Lucida Grande;
	font-size: 12px;
	color: #33464C;
	line-height: 22px;
	padding-left: 10px;
	margin-left: 10px;
	margin-top: 8px;
	border-left: 1px solid #CCD9E0;
	
}
.guidebookCSS .text2 a:link
{
	color: #33464C;
	text-decoration:underline;
}
.guidebookCSS .text2 a:hover
{
	color: #8CA9B8;
	text-decoration:none;
}
.guidebookCSS .text2 a:visited
{
	color: #33464C;
}
.guidebookCSS .text a:link
{
	color: #33464C;
	text-decoration:underline;
}
.guidebookCSS .text a:hover
{
	color: #8CA9B8;
	text-decoration:none;
}
.guidebookCSS .text a:visited
{
	color: #33464C;
}

.guidebookCSS h2
{
	font-family: museosans500;
	text-transform: uppercase;
	font-size: 15px;
	color: #39505E;
	border-bottom: 1px solid #CCD9E0;
	text-transform: uppercase;
	padding-bottom: 2px;
	margin-bottom: 5px;
	font-weight:   200;
}

.guidebookCSS h3
{
    font-family: museosans500; 
    text-transform: uppercase; 
    font-size: 12px; 
    color: #8CA9B8;
}
.greybox
{
	padding:10px;
}
.tabs 
{
	margin-top:5px;
}
</style>

</head>
<div class='guidebookCSS'>
<body>
	<div class="container">
		<header>
		  <h1>A Quick Introduction to the Bubble</h1>
          <span class="subtitle">Check out how the site works and some some handpicked content to get you started</span><br /><br />
		</header>
		<div class="content">
			<div id="1">
            <br />
			  <h2>1. The Basics</h2>
			  <p class="text">The Emory Bubble homepage allows you to view a selection of spotlight content, search, filter content by category, and view some events.</p>
                <br />
				<img src="lib/php/foreground/elements/guidebook/images/1.png" /><br /><br />
			  <p class="subtitlenb">CLICK A FEATURE BELOW TO LEARN MORE:</p>
				<div class="tabs">
                	<a class="greybox section" href="#content-filter">Content Filter</a>
					<a class="greybox section" href="#search-engine">Search Engine</a>
					<a class="greybox section" href="#events-expander">Events Accordion</a>
					<p class="text2" id="content-filter">
					We have hundreds of articles, thousands of videos, and don't ask how many photos. Sort out what you don't care about by clicking on the category that interests you. In the Entertainment category, <a href="http://thecampusbubble.com/emory/video.php?id=YivWwrmV74w">We've got video of when the chickens went loose in the library</a>.	
					</p>
                    <p class="text2" id="search-engine">
					Search Emory like never before. Give it a try and try a search for <a href="http://emorybubble.com/archive.php?article=1&photo=1&video=1&event=1&header=search%20results%20for:%20dooley&search=dooley">"Dooley"</a> or <a href="http://emorybubble.com/archive.php?article=1&photo=1&video=1&event=1&header=search%20results%20for:%20wagner&search=wagner">"Wagner"</a></li> or <a href="http://emorybubble.com/archive.php?article=1&photo=1&video=1&event=1&header=search%20results%20for:%20atel&search=atel">"ATeL"</a>. Try searching your name. No results? <a href="http://emorybubble.com/register.php">Time to contribute</a>.</p>
				  <p class="text2" id="events-expander">
					The events accordion displays the latest events and allows you to quickly see the details. For example, take a look the upcoming <a href="http://emorybubble.com/event.php?id=227918700568366">Hauntlanta event</a>
					</p>
				</div>
                <br /><br /><br />
			</div>
<h2>2. All Emory Events. In One Place.</h2>
				<p class="text">We have events from organizations, venues, departments, and more. The Bubble will automatically import and Facebook events added to an organization's page. Remember: You can only add events as an organization, not as your personal profile.</p>
<br />
				<img src="lib/php/foreground/elements/guidebook/images/2.png" /><br /><br />
				<p class="subtitlenb">CLICK A FEATURE BELOW TO LEARN MORE:</p>
				<div class="tabs">
				  <a class="greybox section" href="#calendar-view">Calendar View</a>
				  <a class="greybox section" href="#related-events">Related Events</a>
				  <a class="greybox section" href="#action-box">Event Panel</a>
				  <p class="text2" id="calendar-view">Easy access to today's events and their details. Underneath, view the entire month. When you click on a day, the calendar will refresh and you'll see that day's events at the top. <a href="http://emorybubble.com/event.php?id=207479695984098">Check out the Aids Walk 5k event</a> and get a feel for our beautiful single event view.</p>
				  <p class="text2" id="related-events">If the event you're viewing doesn't appeal to you, explore similar events by just working your way down the list. If you still don't like anything, it's definitely <a href="http://emorybubble.com/register.php">time to contribute</a>.</p>
				  <p class="text2" id="action-box">The Event Panel lets you quickly view a map of the event location, like the event, RSVP, and more! We're still ironing out the kinks on this one so bare with us.<p>
				</div>
<br /><br /><br />

				<h2>3. Explore The Creativity of Your Peers</h2>
				<p class="text">What are you in the mood for? Control of the content is in your hands. View articles, video, and photos from all sources related to Emory.</p>
<br />
				<img src="lib/php/foreground/elements/guidebook/images/3.png" /><br /><br />
				<p class="subtitlenb">CLICK A FEATURE BELOW TO LEARN MORE:</p>
				<div class="tabs">
					<a class="greybox section" href="#content-filters">Content Filters</a>
					<a class="greybox section" href="#explore-authors">Explore Authors</a>
					<a class="greybox section" href="#explore-organizations">Connect with Organizations</a>
					<p class="text2" id="content-filters">Use the explore page filters to find content you like according to type, category, and recency. Still can't find anything you like? <a href="http://emorybubble.com/register.php">Time to contribute</a>. A Bubble Gem:<a href="http://thecampusbubble.com/emory/video.php?id=532oWEw8G-A">See how an Emory professor debunks Holloywood Physics</a>.</p>
					<p class="text2" id="explore-authors">Credit is always given. Make sure you click on the uploading organization or author to see an archive of all of their media.</p>
					<p class="text2" id="explore-organizations">Explore organizations even further by connecting with them, checking out their Facebook wall, and reading their articles, all in one place. <a href="http://thecampusbubble.com/emory/organization.php?id=67408779409">Explore The Wheel in a new light</a>.</p>

<br /><br /><br /><br />

				<h2>Now It's In Your Hands</h2>
				<ul class="text">
					<li>+<a href="http://emorybubble.com/video.php?id=BqraZ3U_QIo">Tag your friends and share your thoughts using Facebook comments.</a></li>
					<li>+<a href="http://emorybubble.com/register.php">Sign up with one click through your Facebook account. <strong>Start Posting.</strong></a></li>
					<li>+<a href="http://emorybubble.com/organization.php?id=67408779409">Connect with Emory Organizations and keep doing great things!</a></li>

				<br /><br />

				<h2>Please Spread The Love (free prizes for top sharers coming soon):</h2>

				<div class="fb-like" data-href="http://emorybubble.com" data-send="true" data-width="450" data-show-faces="true"></div>

<br />

<script src="//platform.twitter.com/widgets.js" type="text/javascript"></script>
				<a class="twitter-share-button" href="https://twitter.com/share" >Tweet to Followers</a>

				<br /><br />


			</div></div>
		<footer>

<script type="text/javascript">
	$(function() {


$(document).ready(function(){
$('.tabs p').hide();
$('.tabs p:first').show();
$('.tabs a:first').addClass('active');

$('.tabs a.section').click(function(){
$('.tabs a.section').removeClass('active');
$(this).parent().addClass('active');
var currentTab = $(this).attr('href');
$('.tabs p').hide();
$(currentTab).show();
return false;
});
});
			


	});
</script>


<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=219781404699497";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>



		</footer>
	</div>
</body>
</div>
</html>
