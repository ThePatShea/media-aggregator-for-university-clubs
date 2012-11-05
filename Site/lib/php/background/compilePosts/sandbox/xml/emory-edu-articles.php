<?php

/* Important
 * ---------
 * Please do not delete this file for future reference.
 * http://php.net/manual/en/book.simplexml.php
 */

/* Array of Files Given a List of All Emory RSS Feeds
 * Important, all files have the same XML syntax. 
 * Exceptions: 
 * - Emory Events 
 * - B School (http://feeds.feedburner.com/goizuetanewsroom) -- newsroom.xml
 * - Carter Center News -- carter.xml
 *
 * Lacking RSS
 * - http://bigthink.com/emoryuniversity
 *
 * -------------------------------------------------- */

$files = array(
	"emory-edu.xml",
	"faculty-experts.xml", 
	"admission-finaid.xml",
	"arts-humanities.xml", // Liberal Arts dept.
	"emory_report_rss.xml", // Emory Report
	"international.xml", // Emory's International Stuff
	"law.xml", // Emory Law
	"people.xml", // Emory People ie: deaths and recognitions
	"politics.xml", // PoliSci Dept.
	"religion-ethics.xml", // Dept.
	"research.xml",
	"student-life.xml",
	"sustainability.xml",
	"teaching.xml",
	"university.xml", // General University News
	"index.xml", // Emory mentions in the Press
	"construction.xml", // Emory Construction
	"healthsciences.xml", // Public Health School, Woodruff Health Sciences Center
);

foreach ($files as &$filesvalue) {
	$xml = simplexml_load_file($filesvalue);
	echo "<h1>$filesvalue</h1>";
	foreach( $xml->channel->item as $key => $value){
		echo "$value->title <br />";
		$value->description;
		$value->link;
		$value->pubDate;
	}
}

?>
