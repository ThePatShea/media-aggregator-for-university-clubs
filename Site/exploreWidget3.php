<?php
	
	include_once("lib/php/background/allBackground.php");
	
	echo '<div class="topBox" style="position: relative;">';
		
		echo '<div class="dropDownTitle unselectableWithDefault" style="position: relative; left: 1px; z-index: 95; background: #B8C9D2; border: 1px solid #CFDDE2; padding: 5px 8px 5px 8px; border-radius-topright: 4px; -moz-border-radius-topright: 4px; border-radius-topleftt: 4px; -moz-border-radius-topleft: 4px; height: 20px; color: #7893A3; display: inline-block; vertical-align: top; font-family: lucida sans unicode; font-size: 10px; text-shadow: 1px 1px 0px rgba(255,255,255,.65); text-transform: uppercase; box-shadow: -1px 1px 0px #809FB1; -webkit-box-shadow: -1px 1px 0px #809FB1; width: 200px;">';
			echo '<div style="margin-top: 6px;">';
				echo 'filter posts by recency';
			echo '</div>';	
		echo '</div>';
		
		
		echo '<div class="dropDownTitle unselectableWithPointer" style="position: absolute; right: 15px; top: 0; z-index: 100; background: #B8C9D2; border: 1px solid #CFDDE2; width: 100px; padding: 5px 0px 5px 8px; border-radius-topright: 4px; -moz-border-radius-topright: 4px; border-radius-topleftt: 4px; -moz-border-radius-topleft: 4px; height: 20px; display: inline-block; vertical-align: top; box-shadow: -1px 1px 0px #809FB1; -webkit-box-shadow: -1px 1px 0px #809FB1;">';
			
			echo '<div>';
				generatePiece_exploreDropDown("recency");
			echo '</div>';
			
		echo '</div>';
		
	echo '</div>';	

?>


<script type="text/javascript" src="lib/js/ajaxMenu.js"></script>

<script type="text/javascript">
		
	var ajax = new sack();
	var articleListObj;
	var activeArticle = false;
	var clickedArticle = false;
	var contentObj	// Reference to article content <div>
	
	function mouseoverArticle()	// Highlight article
	{
		if(this==clickedArticle)return;
		if(activeArticle && activeArticle!=this){
			if(activeArticle==clickedArticle)
				activeArticle.className='articleClick';
			else
				activeArticle.className='';
			
		}
		this.className='articleMouseOver';
		activeArticle = this;	// Storing reference to this article
	}
	
	function showContent()	// Displaying content in the content <div>
	{
		contentObj.innerHTML = ajax.response;	// ajax.response is a variable that contains the content of the external file	
	}
	
	function showWaitMessage()
	{
		contentObj.innerHTML = "<img src='lib/images/other/ajaxLoader.gif' style='margin: 10px;'>";
	}
	function getAjaxFile(fileName)
	{
		ajax.requestFile = fileName;	// Specifying which file to get
		ajax.onCompletion = showContent;	// Specify function that will be executed after file has been found
		ajax.onLoading = showWaitMessage;	// Action when AJAX is loading the file
		ajax.runAJAX();		// Execute AJAX function	
	}
	
	function selectArticle()	// User have clicked on an article
	{
		getAjaxFile(this.id + '.php');	// Calling the getAjasFile function. argument to the function is id of this <li> + '.html', example "article1.html"
		if(clickedArticle && clickedArticle!=this)clickedArticle.className='articleMouseOver';
		this.className='articleClick';
		clickedArticle = this;
	}
	
	function selectFirstArticle()	// User have clicked on an article
	{
		getAjaxFile('exploreTab12.php');	// Calling the getAjasFile function. argument to the function is id of this <li> + '.html', example "article1.html"
		if(clickedArticle && clickedArticle!=this)clickedArticle.className='articleMouseOver';
		this.className='articleClick';
		clickedArticle = this;
	}
	
	
	function initAjaxDemo()
	{
		articleListObj = document.getElementById('articleList');
		var articles = articleListObj.getElementsByTagName('LI');
		for(var no=0;no<articles.length;no++){
			articles[no].onmouseover = mouseoverArticle;
			articles[no].onclick = selectArticle;
		}	
		
		contentObj = document.getElementById('contentContainer');
	}
	
	window.onload = initAjaxDemo;
	selectFirstArticle();

</script>



<div class="smallBox widget" style="min-height: 600px; width:  310px; padding-left:  5px;">	
	<div id="contentContainer">
		<img src='lib/images/other/ajaxLoader.gif' style='margin: 10px;'>
	</div>
</div>