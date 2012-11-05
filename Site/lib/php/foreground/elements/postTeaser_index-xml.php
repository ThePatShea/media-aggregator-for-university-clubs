<?php

	function generateElement_postTeaser_index()
	{
		$includedTypes['article']		= 1;
		$includedTypes['photo']			= 1;
		$includedTypes['video']			= 1;
		$includedTypes['articleSort']	= 'random';
		$includedTypes['photoSort']		= 'random';
		$includedTypes['videoSort']		= 'random';
		
		$numberOfPosts = 20;
		
		generatePiece_PostTeaserList($numberOfPosts, $includedTypes, $includedCategories);
	}
	
	generateElement_postTeaser_index();

?>
