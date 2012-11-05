<?php
	
	if ($HTTP_POST_VARS)
	{
		$redirectURL  = "archive.php?article=1&photo=1&video=1&event=1&header=search results for: ";
		$redirectURL .= $HTTP_POST_VARS['search'];
		$redirectURL .= "&search=";
		$redirectURL .= $HTTP_POST_VARS['search'];		
		echo "<META HTTP-EQUIV='Refresh' Content='0; URL=$redirectURL'>";
	}
	
?>