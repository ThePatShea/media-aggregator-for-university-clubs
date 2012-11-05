<?php
	
	function generatePiece_PhotoAlbumBox($id, $albumInfo)
	{
		include_once ('lib/js/shadowbox/shadowbox.php');
		
		$photoArray 	= generateQueryArray("SELECT * FROM photos WHERE albumID = $id");
		$numberOfPhotos = count($photoArray) - 1;
		$albumName		= $albumInfo[0]['name'];
		
		echo "<div class='medbox' style='margin-bottom:20px'>";
		
			for ($i = 0; $i <= $numberOfPhotos; $i++)
			{
				$imageSource = $photoArray[$i]['source'];
				
				echo "<a href='photoViewer.php?id=$id&currentPhoto=$i&albumName=$albumName' rel='shadowbox' style='width: 135px; height: 100px; background:#E2E9ED; padding: 5px; display: inline-block; margin: 5px; position: relative; top: -15px;'>";
					echo "<div class='crop' style='height: 100px; width: 135px; border-radius: 0; -moz-border-radius: 0;'>";
						echo "<img style='width: 200px; top: 0px;' src = '$imageSource'> ";
					echo "</div>";
				echo "</a>";
			}
			
		echo "</div>";
	}
	
	generatePiece_PhotoAlbumBox($id, $post);

?>