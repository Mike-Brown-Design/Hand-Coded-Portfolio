
<?php
	// Step 1 - Put your MailChimp API - How get your Mailchimp API KEY - http://kb.mailchimp.com/article/where-can-i-find-my-api-key
	$api_key = 'mailchimp_api_key';
	// Step 2 - Put your list Id here - How get your Mailchimp LIST ID - http://kb.mailchimp.com/article/how-can-i-find-my-list-id
	$list_id = 'mailchimp_list_id';
	// Let's start by including the MailChimp API wrapper
	include('mailchimp/MailChimp.php');
	// Then call/use the class
	use \DrewM\MailChimp\MailChimp;
	$MailChimp = new MailChimp($api_key);
	// Submit subscriber data to MailChimp
	// For parameters doc, refer to: http://developer.mailchimp.com/documentation/mailchimp/reference/lists/members/
	// For wrapper's doc, visit: https://github.com/drewm/mailchimp-api
	$result = $MailChimp->post("lists/$list_id/members", [
							'email_address' => $_POST["n-email"],
							// 'merge_fields'  => ['FNAME'=>$_POST["fname"], 'LNAME'=>$_POST["lname"]],
							'status'        => 'subscribed',
						]);
	if ($MailChimp->success()) {
		// Success message
		echo "<h4>Thank you, you have been added to our mailing list.</h4>";
	} else {
		// Display error
		echo $MailChimp->getLastError();
		// Alternatively you can use a generic error message like:
		// echo "<h4>Please try again.</h4>";
	}
