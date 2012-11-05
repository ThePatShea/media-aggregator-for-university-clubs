<?php
	
	echo "<div style='font-family:museosans500; font-size:28px; text-transform:uppercase; color:#33464C; margin-bottom:20px;'>";
		echo $_GET['header'];
	echo "</div>";

	$urlVariables = '?';
	
	if ($_GET['category'])
	{
		$includedCategories	= $_GET['category'];
		$urlVariables .= "category=$includedCategories&";
	}
	
	if ($_GET['article'])
	{
		$urlVariables .= 'article=1&';
		$includedTypes['article'] = $_GET['article'];
	}
	else
	{
		$outOfArticles = 1;
	}
	if ($_GET['photo'])
	{
		$urlVariables .= 'photo=1&';
		$includedTypes['photo'] = $_GET['photo'];
	}
	else
	{
		$outOfGalleries = 1;
	}
	if ($_GET['video'])
	{
		$urlVariables .= 'video=1&';
		$includedTypes['video'] = $_GET['video'];
	}
	else
	{
		$outOfVideos = 1;
	}
	if ($_GET['event'])
	{
		$urlVariables .= 'event=1&';
		$includedTypes['event'] = $_GET['event'];
	}
	else
	{
		$outOfEvents = 1;
	}
	if ($_GET['organization'])
	{
		$selectedOrganization = $_GET['organization'];
		$urlVariables .= "organization=$selectedOrganization&";
	}
	else
	{
		$selectedOrganization = 'all';
	}
	
	$urlVariables .= "search=$search&";
	
	if ($_GET['postsFeaturing'])
	{
		$postsFeaturing = $_GET['postsFeaturing'];
		$urlVariables .= "postsFeaturing=$postsFeaturing&";
	}
	else
	{
		$postsFeaturing = 0;
	}
	

	if ($includedTypes['article'] == 1)
	{
		
		$postQuery = "SELECT * FROM articles ";
		
		if ($selectedOrganization != 'all')
		{
			$postQuery .= "WHERE accountFacebookID = $selectedOrganization ";
		
			if ($search != '0')
			{
				$postQuery .= "AND (name LIKE '%$search%' OR accountName LIKE '%$search%' OR description LIKE '%$search%') ";
				
				if ($postsFeaturing != '0')
				{
					$postQuery .= "AND accountName != '$search' ";
				}
			}
		}
		else
		{
			if ($search != '0')
			{
				$postQuery .= "WHERE (name LIKE '%$search%' OR accountName LIKE '%$search%' OR description LIKE '%$search%') ";
				
				if ($postsFeaturing != '0')
				{
					$postQuery .= "AND accountName != '$search' ";
				}
			}
		}
		
		if ($includedTypes['articleSort'] == 'random')
		{
			$postQuery .= "ORDER BY rand() ";
		}
		else
		{
			$postQuery .= "ORDER BY created_time DESC ";
		}
		
		$totalArticleList = generateQueryArray($postQuery);
	}
	if ($includedTypes['photo'] == 1)
	{
		$postQuery = "SELECT * FROM galleries WHERE albumType = 'normal' ";
		
		if ($selectedOrganization != 'all')
		{
			$postQuery .= "AND accountFacebookID = $selectedOrganization ";
		}
		
		if ($search != '0')
		{
			$postQuery .= "AND (name LIKE '%$search%' OR accountName LIKE '%$search%' OR description LIKE '%$search%') ";
			
			if ($postsFeaturing != '0')
			{
				$postQuery .= "AND accountName != '$search' ";
			}
		}
				
		if ($includedTypes['photoSort'] == 'random')
		{
			$postQuery .= "ORDER BY rand() ";
		}
		else
		{
			$postQuery .= "ORDER BY created_time DESC ";
		}
		
		$totalGalleryList = generateQueryArray($postQuery);
		
	}
	if ($includedTypes['video'] == 1)
	{
		$postQuery = "SELECT * FROM videos ";
		
		if ($selectedOrganization != 'all')
		{
			$postQuery .= "WHERE accountFacebookID = $selectedOrganization ";
			
			if ($search != '0')
			{
				$postQuery .= "AND (name LIKE '%$search%' OR accountName LIKE '%$search%' OR description LIKE '%$search%') ";
				
				if ($postsFeaturing != '0')
				{
					$postQuery .= "AND accountName != '$search' ";
				}
			}
		}
		else
		{
			if ($search != '0')
			{
				$postQuery .= "WHERE (name LIKE '%$search%' OR accountName LIKE '%$search%' OR description LIKE '%$search%') ";
				
				if ($postsFeaturing != '0')
				{
					$postQuery .= "AND accountName != '$search' ";
				}
			}
		}
		
		if ($includedTypes['videoSort'] == 'random')
		{
			$postQuery .= "ORDER BY rand() ";
		}
		else
		{
			$postQuery .= "ORDER BY created_time DESC ";
		}
		
		$totalVideoList = generateQueryArray($postQuery);		
	}
	if ($includedTypes['event'] == 1)
	{
		$currentTime = time();
		
		$postQuery = "SELECT * FROM events WHERE start_time > $currentTime ";
		
		if ($selectedOrganization != 'all')
		{
			$postQuery .= "AND accountFacebookID = $selectedOrganization ";
		}
		
		if ($search != '0')
		{
			$postQuery .= "AND (name LIKE '%$search%' OR accountName LIKE '%$search%' OR description LIKE '%$search%') ";
			
			if ($postsFeaturing != '0')
			{
				$postQuery .= "AND accountName != '$search' ";
			}
		}
		
		if ($includedTypes['eventSort'] == 'random')
		{
			$postQuery .= "ORDER BY rand() ";
		}
		else
		{
			$postQuery .= "ORDER BY start_time ASC ";
		}
		
		$totalEventList = generateQueryArray($postQuery);
	}
	
		
	$totalPosts = count($totalArticleList) + count($totalGalleryList) + count($totalVideoList) + count($totalEventList);	
	
	$numberOfTypes = $_GET['article'] + $_GET['photo'] + $_GET['video'] + $_GET['event'];
	$postsOfTypePerPage = 12 / $numberOfTypes;
	
	$pagesWithArticles	= count($totalArticleList)/$postsOfTypePerPage;
	$pagesWithGalleries = count($totalGalleryList)/$postsOfTypePerPage;
	$pagesWithVideos	= count($totalVideoList)/$postsOfTypePerPage;
	$pagesWithEvents	= count($totalEventList)/$postsOfTypePerPage;
	
	echo 
	"
		<script type='text/javascript' src='lib/js/ajaxtabs.js'>
			/***********************************************
			* Ajax Tabs Content script v2.2- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
			* This notice MUST stay intact for legal use
			* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
			***********************************************/
		</script>
		
		<div id='teaserContainer4'></div>";
	
	echo 
	"
		<style>
		
			.postTeaserPageNumbers a
			{
				color:			#7F9FB1;
				font-family:	Lucida Grande;
				font-size:		14px;
				border:			1px solid #D1DBE0; 
				padding-top:	4px; 
				padding-bottom: 4px; 
				width:			34px; 
				text-align:		center; 
				margin:			2px;
			}
			
				.postTeaserPageNumbers a:hover
				{
					background: #E9FAF7;
				}
				
				.postTeaserPageNumbers .postTeaserPageSelected
				{
					background: #E9FAF7;
				}
		
		</style>
		
		<div id='teaserTabs4' style='display: inline-block;'>
			<ul>";
				
				echo "<li class='postTeaserPageNumbers' style='display: inline-block;'>";
					?> <a href='javascript:myflowers.cycleit("prev")'><<</a> <?php
				echo "</li>";
				
				$currentStartingRowArticle	= 0;
				$currentStartingRowGallery	= 0;
				$currentStartingRowVideo	= 0;
				$currentStartingRowEvent	= 0;
				
				$totalPages = $totalPosts / 12;
				
				if ($totalPosts % 12 != 0)
					$totalPages++;
				
				if ($totalPages > 22)
				{
					$totalPages = 22;
				}
				
				for ($i = 1; $i <= $totalPages; $i++)
				{
					if ($i < 10)
						$pageNumber = 0;
					else
						$pageNumber = "";
					
					$pageNumber .= $i;
					
					echo "<li class='postTeaserPageNumbers' style='display: inline-block;'><a href='postTeaserTabs_oneSchool.php". $urlVariables . "startingRowArticle=$currentStartingRowArticle&startingRowGallery=$currentStartingRowGallery&startingRowVideo=$currentStartingRowVideo&startingRowEvent=$currentStartingRowEvent&className=$className" ."' rel='flowerdivcontainer'>$pageNumber</a></li>";
					
					if ($pageNumber > $pagesWithArticles && $outOfArticles != 1)
					{
						$oldRatioArticles	= count($totalArticleList)/$postsOfTypePerPage;
						$oldRatioGalleries	= count($totalGalleryList)/$postsOfTypePerPage;
						$oldRatioVideos		= count($totalVideoList)/$postsOfTypePerPage;
						$oldRatioEvents		= count($totalEventList)/$postsOfTypePerPage;
						
						$numberOfTypes--;
						
						if ($numberOfTypes != 0)
						{
							$postsOfTypePerPage = 12 / $numberOfTypes;
						}
						
						$newRatioArticles	= count($totalArticleList)/$postsOfTypePerPage;
						$newRatioGalleries	= count($totalGalleryList)/$postsOfTypePerPage;
						$newRatioVideos		= count($totalVideoList)/$postsOfTypePerPage;
						$newRatioEvents		= count($totalEventList)/$postsOfTypePerPage;
						
						$pagesWithArticles	= ($oldRatioArticles*$pageNumber)/$totalPages + ($newRatioArticles*($totalPages-$pageNumber))/$totalPages;
						$pagesWithGalleries = ($oldRatioGalleries*$pageNumber)/$totalPages + ($newRatioGalleries*($totalPages-$pageNumber))/$totalPages;
						$pagesWithVideos	= ($oldRatioVideos*$pageNumber)/$totalPages + ($newRatioVideos*($totalPages-$pageNumber))/$totalPages;
						$pagesWithEvents	= ($oldRatioEvents*$pageNumber)/$totalPages + ($newRatioEvents*($totalPages-$pageNumber))/$totalPages;
						
						$outOfArticles = 1;
					}
					if ($pageNumber > $pagesWithGalleries  && $outOfGalleries != 1)
					{
						$oldRatioArticles	= count($totalArticleList)/$postsOfTypePerPage;
						$oldRatioGalleries	= count($totalGalleryList)/$postsOfTypePerPage;
						$oldRatioVideos		= count($totalVideoList)/$postsOfTypePerPage;
						$oldRatioEvents		= count($totalEventList)/$postsOfTypePerPage;
						
						$numberOfTypes--;
						
						if ($numberOfTypes != 0)
						{
							$postsOfTypePerPage = 12 / $numberOfTypes;
						}
						
						$newRatioArticles	= count($totalArticleList)/$postsOfTypePerPage;
						$newRatioGalleries	= count($totalGalleryList)/$postsOfTypePerPage;
						$newRatioVideos		= count($totalVideoList)/$postsOfTypePerPage;
						$newRatioEvents		= count($totalEventList)/$postsOfTypePerPage;
						
						$pagesWithArticles	= ($oldRatioArticles*$pageNumber)/$totalPages + ($newRatioArticles*($totalPages-$pageNumber))/$totalPages;
						$pagesWithGalleries = ($oldRatioGalleries*$pageNumber)/$totalPages + ($newRatioGalleries*($totalPages-$pageNumber))/$totalPages;
						$pagesWithVideos	= ($oldRatioVideos*$pageNumber)/$totalPages + ($newRatioVideos*($totalPages-$pageNumber))/$totalPages;
						$pagesWithEvents	= ($oldRatioEvents*$pageNumber)/$totalPages + ($newRatioEvents*($totalPages-$pageNumber))/$totalPages;
						
						$outOfGalleries = 1;
					}
					if ($pageNumber > $pagesWithVideos && $outOfVideos != 1)
					{
						$oldRatioArticles	= count($totalArticleList)/$postsOfTypePerPage;
						$oldRatioGalleries	= count($totalGalleryList)/$postsOfTypePerPage;
						$oldRatioVideos		= count($totalVideoList)/$postsOfTypePerPage;
						$oldRatioEvents		= count($totalEventList)/$postsOfTypePerPage;
						
						$numberOfTypes--;
						
						if ($numberOfTypes != 0)
						{
							$postsOfTypePerPage = 12 / $numberOfTypes;
						}
						
						$newRatioArticles	= count($totalArticleList)/$postsOfTypePerPage;
						$newRatioGalleries	= count($totalGalleryList)/$postsOfTypePerPage;
						$newRatioVideos		= count($totalVideoList)/$postsOfTypePerPage;
						$newRatioEvents		= count($totalEventList)/$postsOfTypePerPage;
						
						$pagesWithArticles	= ($oldRatioArticles*$pageNumber)/$totalPages + ($newRatioArticles*($totalPages-$pageNumber))/$totalPages;
						$pagesWithGalleries = ($oldRatioGalleries*$pageNumber)/$totalPages + ($newRatioGalleries*($totalPages-$pageNumber))/$totalPages;
						$pagesWithVideos	= ($oldRatioVideos*$pageNumber)/$totalPages + ($newRatioVideos*($totalPages-$pageNumber))/$totalPages;
						$pagesWithEvents	= ($oldRatioEvents*$pageNumber)/$totalPages + ($newRatioEvents*($totalPages-$pageNumber))/$totalPages;
						
						$outOfVideos = 1;
					}
					if ($pageNumber > $pagesWithEvents && $outOfEvents != 1)
					{
						$oldRatioArticles	= count($totalArticleList)/$postsOfTypePerPage;
						$oldRatioGalleries	= count($totalGalleryList)/$postsOfTypePerPage;
						$oldRatioVideos		= count($totalVideoList)/$postsOfTypePerPage;
						$oldRatioEvents		= count($totalEventList)/$postsOfTypePerPage;
						
						$numberOfTypes--;
						
						if ($numberOfTypes != 0)
						{
							$postsOfTypePerPage = 12 / $numberOfTypes;
						}
						
						$newRatioArticles	= count($totalArticleList)/$postsOfTypePerPage;
						$newRatioGalleries	= count($totalGalleryList)/$postsOfTypePerPage;
						$newRatioVideos		= count($totalVideoList)/$postsOfTypePerPage;
						$newRatioEvents		= count($totalEventList)/$postsOfTypePerPage;
						
						$pagesWithArticles	= ($oldRatioArticles*$pageNumber)/$totalPages + ($newRatioArticles*($totalPages-$pageNumber))/$totalPages;
						$pagesWithGalleries = ($oldRatioGalleries*$pageNumber)/$totalPages + ($newRatioGalleries*($totalPages-$pageNumber))/$totalPages;
						$pagesWithVideos	= ($oldRatioVideos*$pageNumber)/$totalPages + ($newRatioVideos*($totalPages-$pageNumber))/$totalPages;
						$pagesWithEvents	= ($oldRatioEvents*$pageNumber)/$totalPages + ($newRatioEvents*($totalPages-$pageNumber))/$totalPages;
						
						$outOfEvents = 1;
					}
					
					$currentStartingRowArticle	+= $postsOfTypePerPage;
					$currentStartingRowGallery	+= $postsOfTypePerPage;
					$currentStartingRowVideo	+= $postsOfTypePerPage;
					$currentStartingRowEvent	+= $postsOfTypePerPage;
				}
				
				echo "<li class='postTeaserPageNumbers' style='display: inline-block;'>";
					?> <a href='javascript:myflowers.cycleit("next")'>>></a> <?php
				echo "</li>";
				
			echo "
			</ul>
		</div>";
				
?>




<script type='text/javascript'>
	var myflowers=new ddajaxtabs('teaserTabs4', 'teaserContainer4')
	myflowers.setpersist(true)
	myflowers.setselectedClassTarget('link') //'link' or 'linkparent'
	myflowers.init()
</script>