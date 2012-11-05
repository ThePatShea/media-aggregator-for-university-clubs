<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script src="http://hieu.co.uk/api/jquery.js" type="text/javascript"></script>
		
		<?php 
			
			include_once ('lib/php/foreground/pieces/list.php');
			include_once ('lib/php/background/tabProperties.php');
			include_once ('lib/css/tabCSS_contentSelector.php');
			
			$includedTypes['article']	= 1;
			$includedTypes['photo']		= 1;
			$includedTypes['video']		= 1;
			$includedTypes['event']		= 1;
			
			$numberOfPosts = 10;
			
		?>
		
    </head>
    <body>
		<div class="tabContainer contentSelector" style="margin-bottom: 20px;">
			<div class="TabMenu header">			
				<span> <div class='contentCategoryButton category_all unselectableWithPointer'>all</div></span>
				<span> <div class='contentCategoryButton category_news unselectableWithPointer'>news</div></span>
				<span> <div class='contentCategoryButton category_community unselectableWithPointer'>community</div></span>
				<span> <div class='contentCategoryButton category_arts unselectableWithPointer'>arts</div></span>
				<span> <div class='contentCategoryButton category_entertainment unselectableWithPointer'>entertainment</div></span>
				<span> <div class='contentCategoryButton category_politics unselectableWithPointer'>politics</div></span>
				<span> <div class='contentCategoryButton category_athletics unselectableWithPointer'>athletics</div></span>
				<span> <div class='contentCategoryButton category_academics unselectableWithPointer'>academics</div></span>
			</div>
			<div class="ContentFrame body">
				<div class="AllTabs">
					<div class="TabContent">
						<?php 
							$postList = getPosts($numberOfPosts, $includedTypes, "all");
							generatePiece_list($postList, "small", "small", "bright", 10, 2);
						?>
					</div>
					<div class="TabContent">
						<?php 
							$postList = getPosts($numberOfPosts, $includedTypes, "news");
							generatePiece_list($postList, "small", "small", "bright", 10, 2);
						?>
					</div>
					<div class="TabContent">
						<?php 
							$postList = getPosts($numberOfPosts, $includedTypes, "community");
							generatePiece_list($postList, "small", "small", "bright", 10, 2);
						?>
					</div>
					<div class="TabContent">
						<?php 
							$postList = getPosts($numberOfPosts, $includedTypes, "arts");
							generatePiece_list($postList, "small", "small", "bright", 10, 2);
						?>
					</div>
					<div class="TabContent">
						<?php 
							$postList = getPosts($numberOfPosts, $includedTypes, "entertainment");
							generatePiece_list($postList, "small", "small", "bright", 10, 2);
						?>
					</div>
					<div class="TabContent">
						<?php 
							$postList = getPosts($numberOfPosts, $includedTypes, "politics");
							generatePiece_list($postList, "small", "small", "bright", 10, 2);
						?>
					</div>
					<div class="TabContent">
						<?php 
							$postList = getPosts($numberOfPosts, $includedTypes, "athletics");
							generatePiece_list($postList, "small", "small", "bright", 10, 2);
						?>
					</div>
					<div class="TabContent">
						<?php 
							$postList = getPosts($numberOfPosts, $includedTypes, "academics");
							generatePiece_list($postList, "small", "small", "bright", 10, 2);
						?>
					</div>
				</div>
			</div>
		</div>
    </body>
</html>
