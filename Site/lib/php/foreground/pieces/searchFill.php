<html>

<head>
	<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/redmond/jquery-ui.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
</head>

<?php

$courseInfo  = generateQueryArray("SELECT courseName, departmentName FROM courses");
$arraySize = count($courseInfo) - 1;

?>

<body>
<script>
	$(function() {
		var availableTags =
			<?php
				
				echo "[";
				for ($i = 0; $i <= $arraySize; $i++)
				{
					echo "\"";
					echo $courseInfo[$i]['courseName'];
					echo "\"";
					echo ",";
					/*
					$b = $courseInfo[$i-1]['departmentName'];
					if ( $courseInfo[$i]['departmentName'] != $b )
						{
							echo "\"";
							echo $courseInfo[$i]['departmentName'];
							echo "\"";
							echo ",";
						}
					*/
				}
				echo "]";

			?>

		$( "#tags1" ).autocomplete({
			source: availableTags
		});
		
		$( "#tags2" ).autocomplete({
			source: availableTags
		});
		
		$( "#tags3" ).autocomplete({
			source: availableTags
		});
		
		$( "#tags4" ).autocomplete({
			source: availableTags
		});
	});

</script>


	
<div class="demo">

<div class="ui-widget" style="padding:10px; padding-top: 20px;">
	<form action="oneSchoolAPItest.php?article=1&photo=1&video=1&event=1" method="post">
	
	<div style='display: inline-block; margin-right: 15px;'>
		<div style='font-family:museosans500; font-size:20px; text-transform:uppercase; color:#33464C; margin-bottom:3px; margin-top: 10px;'>select class 1</div>
		<input id="tags1" name="class1name" style="width: 210px;">
	</div>
	
	<div style='display: inline-block; margin-right: 15px;'>
		<div style='font-family:museosans500; font-size:20px; text-transform:uppercase; color:#33464C; margin-bottom:3px; margin-top: 10px;'>select class 2</div>
		<input id="tags2" name="class2name" style="width: 210px;">
	</div>
	
	<div style='display: inline-block; margin-right: 15px;'>
		<div style='font-family:museosans500; font-size:20px; text-transform:uppercase; color:#33464C; margin-bottom:3px; margin-top: 10px;'>select class 3</div>
		<input id="tags3" name="class3name" style="width: 210px;">
	</div>
	
	<div style='display: inline-block; margin-right: 15px;'>
		<div style='font-family:museosans500; font-size:20px; text-transform:uppercase; color:#33464C; margin-bottom:3px; margin-top: 10px;'>select class 4</div>
		<input id="tags4" name="class4name" style="width: 210px;">
	</div>
	
	<input type="submit" value="GO" class="greyButton" style="display: block; padding: 3px; font-size: 14px; margin-top: 10px;" />
	</form>
</div>

</div>

</body>
</html>
