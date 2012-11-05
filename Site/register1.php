<?php

include_once ('lib/php/background/databaseConnect.php');

session_start();

if(!empty($_SESSION)){
	$userFacebookID = $_SESSION['facebookID'];
	header("Location: user.php?id=$userFacebookID");
}

# We require the library
require("lib/php/background/registerFacebook.php");

# Creating the facebook object
$facebook = new Facebook2(array(
	'appId'  => '219781404699497',
	'secret' => '11efd0dea9edbb5461a0b74c6227ff42',
	'cookie' => true
));


# Let's see if we have an active session
$session = $facebook->getSession();

if(!empty($session) && $_SESSION['loggedOut'] != 'true') {
	# Active session, let's try getting the user id (getUser()) and user info (api->('/me'))
	try{
		$uid = $facebook->getUser();
		$user = $facebook->api('/me');
	} catch (Exception $e){}
	
	if(!empty($user)){
		# We have an active session, let's check if we have already registered the user
		$query		= mysql_query("SELECT * FROM users WHERE facebookID = ". $user['id']);
		$result		= mysql_fetch_array($query);
		$userName	= $user['name'];
		$userEmail	= $user['email'];
		
		# If not, let's add it to the database
		if(empty($result)){
		
			$fqlQuery		= "SELECT pic_square,pic_big,first_name,middle_name,last_name FROM user WHERE uid='$uid' ";
			$response		= $facebook->api(array('method' => 'fql.query','query' =>$fqlQuery));
			
			$facebookLink 	= $user['link'];
			$pic_square		= $response[0]['pic_square'];
			$pic_big		= $response[0]['pic_big'];
			$first_name		= $response[0]['first_name'];
			$middle_name	= $response[0]['middle_name'];
			$last_name		= $response[0]['last_name'];
			
					
			$query = mysql_query("INSERT INTO users (facebookID, accountType, name, email, facebookLink, pic_square, pic_big, first_name, middle_name, last_name) VALUES ({$user['id']}, 'user', '$userName', '$userEmail', '$facebookLink', '$pic_square', '$pic_big', '$first_name', '$middle_name', '$last_name' )");
			$query = mysql_query("SELECT * FROM users WHERE facebookID = " . $user['id']);
			$result = mysql_fetch_array($query);
			
		}
		
		// this sets variables in the session 
		$_SESSION['facebookID'] = $result['facebookID'];
		
		header("Location: register2.php");
	} else {
		# For testing purposes, if there was an error, let's kill the script
		die("There was an error.");
	}
} else {
	
	$_SESSION['loggedOut'] = 'false';
	
	# There's no active session, let's generate one
	$login_url = $facebook->getLoginUrl(array(
		"req_perms" => "$req_perms"
	));
	header("Location: ".$login_url);
}