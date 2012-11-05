<?php

	include_once("lib/php/background/allBackground.php");
	
	$includedTypes['article']		= $_GET['article'];
	$includedTypes['photo']			= $_GET['photo'];
	$includedTypes['video']			= $_GET['video'];
	$includedTypes['event']			= $_GET['event'];
	
	$includedCategories				= $_GET['category'];
	
	$className = $_GET['className'];
	$courseInfo  = generateQueryArray("SELECT departmentName FROM courses WHERE courseName = '$className' ");
	$department  = $courseInfo[0]['departmentName'];
	
	$search = $department;
	
	if ($_GET['startingRowArticle'])
	{
		$startingRow['article'] = $_GET['startingRowArticle'];
	}
	else
	{
		$startingRow['article'] = 0;
	}
	if ($_GET['startingRowGallery'])
	{
		$startingRow['gallery'] = $_GET['startingRowGallery'];
	}
	else
	{
		$startingRow['gallery'] = 0;
	}
	if ($_GET['startingRowVideo'])
	{
		$startingRow['video'] = $_GET['startingRowVideo'];
	}
	else
	{
		$startingRow['video'] = 0;
	}
	if ($_GET['startingRowEvent'])
	{
		$startingRow['event'] = $_GET['startingRowEvent'];
	}
	else
	{
		$startingRow['event'] = 0;
	}
	
	if ($_GET['organization'])
	{
		$selectedOrganization = $_GET['organization'];
	}
	else
	{
		$selectedOrganization = 'all';
	}
		
	if ($_GET['postsFeaturing'])
	{
		$postsFeaturing = $_GET['postsFeaturing'];
	}
	else
	{
		$postsFeaturing = 0;
	}
	
	$numberOfPosts = 3;
		
	
	echo "<div style='font-family:museosans500; font-size:28px; text-transform:uppercase; color:#33464C; margin-bottom:0px;'>";
		echo $className;
	echo "</div>";
	
	generatePiece_PostTeaserList($numberOfPosts, $includedTypes, $includedCategories, $selectedOrganization, $startingRow, $search, $postsFeaturing);
	
?>