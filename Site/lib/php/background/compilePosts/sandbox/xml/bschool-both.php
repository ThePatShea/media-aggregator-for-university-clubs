<?php

/* Important
 * ---------
 * Please do not delete this file for future reference.
 * http://php.net/manual/en/book.simplexml.php
 *
 * Something is wrong with the original xml file 
 * edits had to be made so 
 * DO NOT automate this job without talking to Nir
 */

$file = 'bschool-events.xml';
$xml = simplexml_load_file($file);

foreach( $xml->channel->item as $key => $value){
	$value->title;
	$value->description;
	$value->link;
	$value->pubDate; // the date of the event, NOT date the event was created
}

$file = 'bschool-articles.xml';
	// https://newsroom.goizueta.emory.edu/gnr/feed/

$xml = simplexml_load_file($file);

foreach( $xml->channel->item as $key => $value){
	echo "$value->title" . "<br />";
	echo "$value->description" . "<br />";
	echo "$value->link" . "<br />";
	echo "$value->pubDate" . "<br />";
}

?>

