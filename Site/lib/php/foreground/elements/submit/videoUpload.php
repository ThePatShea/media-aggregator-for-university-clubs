<?php

session_start();

$_SESSION['homeUrl'] = "http://emorybubble.com/videoRedirect.php";

echo "

	<style>
	
		#syndicatedUploadDiv
		{
			font-family: 		'Lucida Grande';
			font-size: 			11px;
			color: 				#666666;
			text-shadow: 		1px 1px 0px white;
			display: 			block;
			line-height: 		17px;
			margin-bottom: 		10px;
		}
	
			#syndicatedUploadDiv textarea
			{
				resize: 			none;
				border-radius: 		4px;
				-moz-border-radius: 4px;
				border: 			1px solid #E2E9ED;
				box-shadow:			inset 1px 1px 0px #CCCCCC;
				-moz-box-shadow:	inset 1px 1px 0px #CCCCCC;
				padding-top: 		3px;
				padding-bottom: 	3px;
				padding-left: 		7px;
				padding-right: 		7px;
				width: 				430px;
				
				font-family: 		'Lucida Grande';
				font-size: 			11px;
				color: 				#666666;
				text-shadow: 		1px 1px 0px white;
				display: 			block;
				line-height: 		17px;
				margin-bottom: 		10px;
			}
			
			.submitFormText
			{
				border-radius: 		4px;
				-moz-border-radius: 4px;
				border: 			1px solid #E2E9ED;
				box-shadow:			inset 1px 1px 0px #CCCCCC;
				-moz-box-shadow:	inset 1px 1px 0px #CCCCCC;
				padding-top: 		3px;
				padding-bottom: 	3px;
				padding-left: 		7px;
				padding-right: 		7px;
				width: 				430px;
				
				font-family: 		'Lucida Grande';
				font-size: 			11px;
				color: 				#666666;
				text-shadow: 		1px 1px 0px white;
				display: 			block;
				line-height: 		17px;
				margin-bottom: 		10px;
			}
			
			.submitNextButton
			{
				position: 			relative;
				display:			block;
				width:	 			50px; 
				height: 			25px; 
				padding-top: 		4px;
			}
			
	</style>

";



$_SESSION['developerKey'] = 'AI39si7J9jqecQB_csYiHG-zuNELKjFTpdFP7jNP7Pc7sL5tL14ym22-EMZF_mt-cxhD9WaaoOPJSPNZ3HyS84dJIDjMTsZTgQ';
 
function uploadStatus($status, $code = null, $videoId = null)
{
    switch ($status) {
        case $status < 400:
            echo  'Success ! Entry created (id: '. $videoId .
                  ') <a href="#" onclick=" ytVideoApp.checkUploadDetails(\''.
                  $videoId .'\'); ">(check details)</a>';
            break;
        default:
            echo 'There seems to have been an error: '. $code .
                 '<a href="#" onclick=" ytVideoApp.checkUploadDetails(\''.
                 $videoId . '\'); ">(check details)</a>';
    }
}

function authenticated()
{
    if (isset($_SESSION['sessionToken'])) {
        return true;
    }
}

/**
 * Helper function to print a list of authenticated actions for a user.
 */
function printAuthenticatedActions()
{
   echo 
   '
   		<body onload="ytVideoApp.prepareUploadForm();
   		return false;">
        
        	<div id="syndicatedUploadDiv"></div>
        	<div id="syndicatedUploadStatusDiv"></div>
        
        </body>
   ';
}

?>
<script src="video_app.js" type="text/javascript"></script>
<?php
    // if $_GET['status'] is populated then we have a response
    // about a syndicated upload from YouTube's servers
    if (isset($_GET['status'])) {
        (isset($_GET['code']) ? $code = $_GET['code'] : $code = null);
        (isset($_GET['id']) ? $id = $_GET['id'] : $id = null);
        print '<div id="generalStatus">' .
              uploadStatus($_GET['status'], $code, $id) .
              '<div id="detailedUploadStatus"></div></div>';
     }
?>

<?php
    if (authenticated()) {
        printAuthenticatedActions();
    }
?>