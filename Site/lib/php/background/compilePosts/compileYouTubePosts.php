<?php

	include_once('youTubePostFunctions.php');
		
	compileVideos_all();	
	compileVideos_specialQuery_all('\"Emory College\" -emoryuniversity -campusmoviefest');
	compileVideos_specialQuery_all('\"Emory University\" -emoryuniversity -campusmoviefest');
	
?>