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

$file = 'arts-at-emory.xml'; // http://www.trumba.com/calendars/arts-at-emory.rss
$xml = simplexml_load_file($file);

foreach( $xml->channel->item as $key => $value){
	$value->title;
	$value->description;
	$value->link;
	$value->localstart;
	$value->localend;
}

$file = 'emoryhillel.xml'; // http://www.trumba.com/calendars/emoryhillel.rss
$xml = simplexml_load_file($file);

foreach( $xml->channel->item as $key => $value){
	$value->title;
	$value->description;
	$value->link;
	$value->pubDate;
}
?>
