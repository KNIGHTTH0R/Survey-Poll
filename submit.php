<?php

//require_once(dirname(__FILE__) . '/poll.php');

error_reporting(E_ALL);
ini_set('display_errors', '1');

function show_error() {
	global $vote_error_message;
	echo(htmlspecialchars($vote_error_message));
}

// Handle action
/*if(isset( $_REQUEST[''] ) ) {

	// Reset error message
	global $vote_error_message;
	$vote_error_message = NULL;

	// Get parameter values from post
	$pid = trim($_POST[$POLL_ID_PARAM_NAME]);
	if(isset( $_POST[$VOTE_PARAM_NAME] )) {
		$vote = trim($_POST[$VOTE_PARAM_NAME]);
	} else {
		$vote = NULL;
	}

	// For use in template functions
	global $requested_pid;
	$requested_pid = $pid;

	// Attempt to add a new rating
	if(add_new_vote($pid, $vote) === TRUE) {

		// Display success page
		include_once(dirname(__FILE__) . '/template/success.php');

	} else {

		// Display error page
		include_once(dirname(__FILE__) . '/template/failure.php');

	}

} else {

	die("Invalid request.");

}*/

require('config.php');

$query = $conn->query("SELECT * FROM questions");
$arr = $query->fetchAll();

foreach($arr as $val) {
	if (isset($_REQUEST['question_' . $val['id']])) {
		if ($_REQUEST['question_' . $val['id']] == '') {
			echo 'Error submitting: Please fill out all the answers and try again.';
			exit;
		}
	}
}

echo '<h1>Answers</h1>';

foreach($arr as $val) {
	if (isset($_REQUEST['question_' . $val['id']])) {
		echo '<h2>' . $val['question'] . '</h2>';

		$question = $_REQUEST['question_' . $val['id']];

		echo $val['id'];

		$query = $conn->prepare("INSERT INTO responses (qid, correct, num_sel, answer, ip) VALUES (?, 0, 0, ?, '127.0.0.1')");
		$query->bindParam(1, $val['id']);
		$query->bindParam(2, $question);
		$query->execute();

		$query = $conn->query("SELECT * FROM responses WHERE qid=" . $val['id']);
		$arr = $query->fetchAll();

		$answers = array();
		$answers_count = array();

		foreach($arr as $key=>$val) {
			$answeradded = false;
			foreach($answers as $anskey=>$ans) {
				if ($ans === $val['answer']) {
					$answers_count[$anskey] += 1;
					$answeradded = true;
				}
			}

			if (!$answeradded) {
				array_push($answers, $val['answer']);
				array_push($answers_count, 1);
			}
		}

		echo '<table><tr><td><b>Answer</b></td><td><b>Count</b></td></tr>';
		foreach($answers as $key=>$val) {
			echo '<tr><td>';
			echo $val;
			echo '</td><td>';
			echo $answers_count[$key];
			echo '</td></tr>';
		}
		echo '</table>';

		//var_dump($arr[0]['answer']);
	} else {
		echo 'Error submitting: Please fill out all the answers.';
	}
}

?>
