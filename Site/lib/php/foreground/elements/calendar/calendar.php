<?php 
	
	session_start();
	
	include_once('../../../background/databaseConnect.php');
	include_once('../../../background/getPosts.php');
	include_once('../../../background/universalBackground.php');
	include_once("../../../foreground/pieces/universalPieces.php");
	include_once('../../../../css/style.php');
	include_once("../../../foreground/pieces/list.php");

?>

<style>

	@font-face {
	    font-family: 'nevisBold';
	    src: url('../../../../fonts/nevis/nevis-webfont.eot');
	    src: url('../../../../fonts/nevis/nevis-webfont.eot?#iefix') format('embedded-opentype'),
	         url('../../../../fonts/nevis/nevis-webfont.woff') format('woff'),
	         url('../../../../fonts/nevis/nevis-webfont.ttf') format('truetype'),
	         url('../../../../fonts/nevis/nevis-webfont.svg#nevisBold') format('svg');
	    font-weight: normal;
	    font-style: normal;
		}
	
	@font-face {
	    font-family: 'MuseoSans500';
	    src: url('../../../../fonts/museosans/museosans_500-webfont.eot');
	    src: url('../../../../fonts/museosans/museosans_500-webfont.eot?#iefix') format('embedded-opentype'),
	         url('../../../../fonts/museosans/museosans_500-webfont.woff') format('woff'),
	         url('../../../../fonts/museosans/museosans_500-webfont.ttf') format('truetype'),
	         url('../../../../fonts/museosans/museosans_500-webfont.svg#MuseoSans500') format('svg');
	    font-weight: normal;
	    font-style: normal;
	    }

	#calback {
		background: url('../../../../images/other/ajaxLoader.gif');
		background-repeat:no-repeat;
		background-attachment:fixed;
		background-position:50% 10%; 
		margin: 0 auto;
		width: 960px;
	}
	
	#calendar {
		width: 100%;
		height: 100%;
	}
	
		#calendar .thinLine
		{
			background: 	#E2E9ED;
			height: 		1px;
		}
	
		#calendar .thinLine_white
		{
			background: 	white;
			height: 		1px;
		}
	
	#calendar .cal {
		background: #E2E9ED;
		width: 		100%; 
	}
	
	#calendar .calhead {
		width: 100%;
		font-weight: bold;
		color: black;
		font-size: 20px;      
	}
	
	#calendar .calhead img {
		border: none;
	}
	
	#calendar .dayhead {
		
	}
		
	#calendar .dayhead div 
	{
		text-align: 		center;
		color: 				#A5B8C7;
		font-family:	 	nevisbold;
		font-size: 			13px;
		text-shadow: 		1px 1px 0px white;
		text-transform: 	uppercase;
		vertical-align: 	bottom;
		display: 			inline-block;
	}
	
	#calendar .dayrow {
		position: relative;
	}
	
	#calendar .dayrow .fullDay {
		overflow: 		hidden;
	}
	
	#calendar .dayrow .fullDayUnselected {
		width: 100px;
		height: 125px;
		background-color: #D8E0E7;
		border-radius: 5px;
		-moz-border-radius: 5px;
		border-top: 1px solid #B8C7D3;
		border-left: 1px solid #B8C7D3;
		border-bottom: 1px solid #FFF;
		border-right: 1px solid #FFF;
		text-shadow: 1px 1px 1px #FFF;
		margin: 10px;
		position: relative;
	}
	
	#calendar .dayrow .fullDaySelected {
		width: 100px;
		height: 125px;
		background-color: #B5C6D2;
		border-radius: 5px;
		-moz-border-radius: 5px;
		border-top: 1px solid #B8C7D3;
		border-left: 1px solid #B8C7D3;
		border-bottom: 1px solid #FFF;
		border-right: 1px solid #FFF;
		text-shadow: 1px 1px 1px #FFF;
		margin: 10px;
		position: relative;
	}
	
	#calendar .dayrow .blankDay {
		background:	#E2E9ED;
	}
	
	#calendar .dayrow .fullDay:hover {
		background: #B5C6D2;
		cursor: pointer;
	}
	
	#calendar .day {
		font-family: 	nevisbold;
		font-size: 		40px;
		color: 			#FFF;
		text-shadow: 	1px 1px 0px #8DA9B9;
		z-index: 		1;
		width: 			60px;
		text-align: 	right;
		position: 		absolute;
		top: 			40px;
		left: 			55px;
	}
	
	#calendar .day .month
	{
		font-size: 		22px;
		text-transform: uppercase;
		position: 		relative;
		top: 			15px;
	}
	
	#calendar .calendarEventContainer {
		position: relative;
		height: 120px;
		width: 120px;
	}
	
	#calendar .calendarEvent {
		font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
		font-size: 10px;
		color: #506B7C;
		margin-top: 10px;
		margin-left: 10px;
		margin-right: 10px;
		line-height: 12px;
		position: relative;
		z-index: 2;
		display: inline-block;
	}
	
	#calendar .on {
		
	}
	
	.unselectable {
		-moz-user-select: -moz-none;
		-khtml-user-select: none;
		-webkit-user-select: none;
		user-select: none;
	}
	
	.fullDayClick
	{
		
	}
	
		.fullDayClick:hover
		{
			background: #B5C6D2;
		}
	
</style>


<? 

$output = '';
$month = $_GET['month'];
$year = $_GET['year'];

if($month == '' && $year == '') { 
	$time = time();
	$month = date('n',$time);
    $year = date('Y',$time);
}

$date = getdate(mktime(0,0,0,$month,1,$year));
$today = getdate();
$hours = $today['hours'];
$mins = $today['minutes'];
$secs = $today['seconds'];

$shortenedMonth = date("M", mktime(0,0,0,$month,1,$year));

if(strlen($hours)<2) $hours="0".$hours;
if(strlen($mins)<2) $mins="0".$mins;
if(strlen($secs)<2) $secs="0".$secs;

$days=date("t",mktime(0,0,0,$month,1,$year));
$start = $date['wday']+1;
$name = $date['month'];
$year2 = $date['year'];
$offset = $days + $start - 1;
 
if($month==12) { 
	$next=1; 
	$nexty=$year + 1; 
} else { 
	$next=$month + 1; 
	$nexty=$year; 
}

if($month==1) { 
	$prev=12; 
	$prevy=$year - 1; 
} else { 
	$prev=$month - 1; 
	$prevy=$year; 
}

if($offset <= 28) $weeks=28; 
elseif($offset > 35) $weeks = 42; 
else $weeks = 35; 

$selectedDay = $_GET['day'];

if ($selectedDay == 'undefined')
{
	$selectedDay = $today[mday];
}

$output .= '<div class="ribbonHeader" style="position: relative; left: -10px; top: 12px; z-index: 5;">';
	
	$output .= '<div class="topBox" style="height: 30px; width: 960px;">';
		
	$output .= '<div class="title" style="width:930px; font-size: 18px; margin-top: 2px;">';
		
		$output .=
		"
		<div class='calendarNavButtons' style='margin-bottom: 5px; width: 265px; margin-left: auto; margin-right: auto; position: relative; left: 30px;'>
			<a href='javascript:navigate($prev,$prevy,$selectedDay)'>
				<div style='width: 11px; height: 20px; border-radius: 4px; -moz-border-radius: 4px; background: #B8C9D2; border: 1px solid #CFDDE2; box-shadow: 1px 1px 0px #809FB1; -webkit-box-shadow: -1px 1px 0px #809FB1; position: relative; top: 2px;'>
					<div class='triangle triangle1'></div>
					<div class='triangle triangle1shadow'></div>
				</div>
			</a>
			
			<div style='display: inline-block; margin-left: 5px; margin-right: 5px; width: 175px; text-align: center; position: relative; top: -1px;'>$name $year2</div>
			
			<a href='javascript:navigate($next,$nexty,$selectedDay)'>
				<div style='width: 11px; height: 20px; border-radius: 4px; -moz-border-radius: 4px; background: #B8C9D2; border: 1px solid #CFDDE2; box-shadow: -1px 1px 0px #809FB1; -webkit-box-shadow: -1px 1px 0px #809FB1; position: relative; top: 2px;'>
					<div class='triangle triangle2'></div>
					<div class='triangle triangle2shadow'></div>
				</div>
			</a>
			
		</div>
		";
	$output .= '</div>';
	
	$output .= '</div>';
	
	$output .= '<div class="bottomBox" style="position: relative;">';
		$output .= '<div class="triangle"></div>';
		$output .= '<div style="width: 960px; height: 10px; background: #E2E9ED; position: absolute; top: 0; left: 10px;"></div>';
	$output .= '</div>';
	
$output .= '</div>';



/*
	echo "<a href='javascript:navigate(\"\",\"\")'><img src='calCenter.gif'></a>";
*/

$output .= "<div class='thinLine'></div>";
$output .= "<div class='thinLine_white'></div>";

$output .= "<div class='cal'>

<div class='dayhead'>
	<div style='width: 138px'>Sunday</div>
	<div style='width: 134px'>Monday</div>
	<div style='width: 130px'>Tuesday</div>
	<div style='width: 132px'>Wednesday</div>
	<div style='width: 132px'>Thursday</div>
	<div style='width: 130px'>Friday</div>
	<div style='width: 132px'>Saturday</div>
</div>
</div>

<table class='cal' cellspacing='10' style='height: 500px;'>

";

$col=1;
$cur=1;
$next=0;

for($i=1;$i<=$weeks;$i++) { 
	if($next==3) $next=0;
	if($col==1) $output.="<tr class='dayrow'>"; 
  	  	
  	
  	if($selectedDay == $cur && $i >= $start)
  	{
  		$output.="<td id='calDay$i' class='fullDay fullDaySelected' style='background:#B5C6D2'>";
  	}
  	else if ($cur==$today[mday] && $name==$today[month])
  	{
  		$output.="<td id='calDay$i' class='fullDay fullDaySelected' style='background:#BFD1DE'>";
  	}
  	else
  	{
  		if($i <= ($days+($start-1)) && $i >= $start)
  		{
  			$output.="<td id='calDay$i' class='fullDay fullDayUnselected' onClick='addClass_calendarDaySelected()'>";
  			
  			
  		}
  		else
  		{
  			$output.="<td class='blankDay'>";
  			
  		}
  	}

	$output .= "<a class='fullDayClick' href='javascript:navigate($month,$year,$cur)' style='border-radius: 4px; -moz-border-radius: 4px;'>";
	
	if($i <= ($days+($start-1)) && $i >= $start) {
		
		$currentDateTimeStart = $month;
		$currentDateTimeStart .= "/";
		$currentDateTimeStart .= $cur;
		$currentDateTimeStart .= "/";
		$currentDateTimeStart .= $year;
		$currentDateTimeStart .= " ";
		
		$currentDateTimeEnd = $currentDateTimeStart;
		
		$currentDateTimeStart .= "00:00:00";
		$currentDateTimeEnd   .= "23:59:59";
		
		$currentUnixTimestampStart = strtotime($currentDateTimeStart);
		$currentUnixTimestampEnd = strtotime($currentDateTimeEnd);
		 
		error_reporting(0);
		$postList = generateQueryArray("SELECT * FROM events WHERE start_time > $currentUnixTimestampStart AND start_time < $currentUnixTimestampEnd ORDER BY start_time");
	
		if ($cur == $selectedDay)
		{
			$todayPostList			= $postList;
			
			$dayStringUnformatted	= "$month/$cur/$year";
			$dayString				= date("l F jS, Y", strtotime($dayStringUnformatted) );
			
			$currentNumberOfPosts	= count($postList);
			$numberOfPostsToPrint	= $currentNumberOfPosts;
				
			if ($currentNumberOfPosts % 2 != 0)
			{
				$numberOfPostsToPrint++;
			}
		}
	
		
	/*
		$_SESSION["calendarPostList$cur"] = $postList;
		
		$dayStringUnformatted = "$month/$cur/$year";
		
		$_SESSION["dayString$cur"] = date("l F jS, Y", strtotime($dayStringUnformatted) );
				
		$currentNumberOfPosts = count($postList);
		
		$numberOfPostsToPrint = $currentNumberOfPosts;
			
		if ($currentNumberOfPosts % 2 != 0)
		{
			$numberOfPostsToPrint++;
		}
		
		$_SESSION["calendarNumberOfPostsToPrint$cur"] = $numberOfPostsToPrint;
	*/
		
		$postName0 = substr($postList[0]["name"], 0, 30);
			if ($postName0 != "") {$postName0 .= "...";}
		$postName1 = substr($postList[1]["name"], 0, 30);
			if ($postName1 != "") {$postName1 .= "...";}
		$postName2 = substr($postList[2]["name"], 0, 30);
			if ($postName2 != "") {$postName2 .= "...";}
		
		$output .= "<div class='calendarEventContainer'>";
		 	$output .= "<div class='calendarEvent unselectableWithPointer'>$postName0</div>";
		 	$output .= "<div class='calendarEvent unselectableWithPointer'>$postName1</div>";
		 	$output .= "<div class='calendarEvent unselectableWithPointer'>$postName2</div>";
		  	
		$output.=
		"<div class='day unselectableWithPointer'>
			
			<div class='month'>
				$shortenedMonth
			</div>";
			
			if ($cur < 10)
			{
				$output.="0";
				$output.="$cur";
			}
			else
			{
				$output.="$cur";
			}
			
		$output.="
		</div>
		
		</div>
		
		</a>
		</td>
		";

		$cur++; 
		$col++; 
		
	} else { 
		$output.="&nbsp;</div></td>"; 
		$col++; 
	}  
	    
    if($col==8) { 
	    $output.="</tr>"; 
	    $col=1; 
    }
}

$output.="</table>";
 

echo "<body onload='dayClick(1)'>";

echo '<div id="calendarBottom">';
	
	/*
	$cur = $_GET['cur'];
	$_SESSION['selectedDay'] = $cur;
	echo $_SESSION['selectedDay'];
	
	$dayString				= $_SESSION["dayString$cur"];
	
	$postList 				= $_SESSION["calendarPostList$cur"];
	$numberOfPostsToPrint 	= $_SESSION["calendarNumberOfPostsToPrint$cur"];
	*/
	echo '<div class="ribbonHeader" style="position: relative; left: -10px; z-index: 5;">';
		
		echo '<div class="topBox" style="height: 30px; width: 960px;">';
			
		echo '<div class="title" style="width:930px; font-size: 22px; margin-top: 2px;">';
			echo $dayString;
		echo '</div>';
		
		echo '</div>';
		
		echo '<div class="bottomBox" style="position: relative;">';
			echo '<div class="triangle"></div>';
			echo '<div style="width: 960px; height: 10px; background: #E2E9ED; position: absolute; top: 0; left: 10px;"></div>';
		echo '</div>';
		
	echo '</div>';
	
	echo '<div id="currentDayEventList" style="background: #E2E9ED; position: relative; top: -10px;">';
		
		if ($numberOfPostsToPrint > 0)
		{
			generatePiece_list($todayPostList, "small", "large", "dark", $numberOfPostsToPrint, 2);
		}
		else
		{
			echo '<div style="font-family: Lucida Grande; color: #506B7C; font-size: 10px; padding-left: 10px; padding-bottom: 20px; padding-top: 2px; text-shadow: 1px 1px 0px #FFFFFF;">';
				echo 'No one has posted any events for this day yet.';
			echo '</div.';
		}
	echo '</div>';
	
	
echo '</div>';

echo '<div style="position: relative; top: -22px;">';
	echo $output;
echo '</div>';


echo "</body>";

?>
