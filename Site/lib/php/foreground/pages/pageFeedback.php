<?php
if(isset($_POST['email'])) {
	
	global $feedbackSuccess;
	
	$feedbackSuccess = 1;
	
	echo "<div class='administration'>";
	
		echo "<div class='topHeader'>";
			echo "feedback";
		echo "</div>";
		
		echo "<div class='sectionText' style='position: relative; top: -22px;'>";
	
	$email_to 		= "feedback@emorybubble.com";
	$email_subject 	= "Emory Bubble Feedback";
	
	
	function died($error) 
	{
		echo "<b> We're sorry, but we've found the following errors with your feedback:</b><br />";
		echo $error."<br />";
		echo "Please submit your feedback again.<br /><br />";
		
		global $feedbackSuccess;
		$feedbackSuccess = 0;
	}
	
	// validation expected data exists
	if(!isset($_POST['first_name']) ||
		!isset($_POST['email']) ||
		!isset($_POST['comments'])) {
		died('We are sorry, but there appears to be a problem with the form you submitted.');		
	}
	
	$first_name = $_POST['first_name']; // required
	$email_from = $_POST['email']; // required
	$comments = $_POST['comments']; // required
	
	$error_message = "";
	$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
  	$error_message .= '- The email address you entered does not appear to be valid.<br />';
  }
	$string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$first_name)) {
  	$error_message .= '- The name you entered does not appear to be valid.<br />';
  }
  if(strlen($comments) < 2) {
  	$error_message .= '- The message you entered does not appear to be valid.<br />';
  }
  if(strlen($error_message) > 0) {
  	died($error_message);
  }
	
	function clean_string($string) {
	  $bad = array("content-type","bcc:","to:","cc:","href");
	  return str_replace($bad,"",$string);
	}
	
	$email_message = "Name: ".clean_string($first_name)."\n";
	$email_message .= "Email: ".clean_string($email_from)."\n";
	$email_message .= "Message: ".clean_string($comments)."\n";
	
	
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
?>

<!-- place your own success html below -->
<?php
			if ($feedbackSuccess == 1)
			{
				echo "Thank you, your feedback has been sent.";
			}
		echo "</div>";
		
	echo "</div>";
	
	
}
?>
