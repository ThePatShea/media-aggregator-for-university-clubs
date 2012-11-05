<?php

	function generateElement_postTeaser_index()
	{
		$includedTypes['article']		= 1;
		$includedTypes['photo']			= 1;
		$includedTypes['video']			= 1;
		$includedTypes['articleSort']	= 'random';
		$includedTypes['photoSort']		= 'random';
		$includedTypes['videoSort']		= 'random';
		
		$numberOfPosts = 6;
		
		generatePiece_teaserBlockHeader('spotlight posts', 'view all posts', 'archive.php?article=1&photo=1&video=1&header=view all posts');
		generatePiece_PostTeaserList($numberOfPosts, $includedTypes, $includedCategories);
	}
	
	generateElement_postTeaser_index();

?>