<?php

require_once(dirname(__FILE__) . '/poll.php');

 // Handle action
if(isset( $_GET[$POLL_ID_PARAM_NAME] )) {

	// Get poll ID
	global $requested_pid;
	$requested_pid = trim($_GET[$POLL_ID_PARAM_NAME]);

	// Validate poll ID
	if( is_valid_pid($requested_pid) ) {

		// Display results page from template
		include_once(dirname(__FILE__) . '/Survey_Poll/results.php');

	} else {

		die("Invalid poll ID.");

	}


} else {

	die("Invalid request.");

}
