<?php

//require_once(dirname(__FILE__) . '/poll.php');

error_reporting(E_ALL);
ini_set('display_errors', '1');

function show_error() {
	global $vote_error_message;
	echo(htmlspecialchars($vote_error_message));
}

require('config.php');

echo '<h2>Question Administration</h2>';

$query = $conn->query("SELECT * FROM questions");
$arr = $query->fetchAll();

foreach($arr as $val) {
  echo '<div style="background-color: #cce6ff">';
  echo $val['question'];
  echo ' <a href="delete.php">Delete</a>';
  echo '<form action="update.php"><input type="text" name="question"><input type="submit" value="Update"></form>';
  echo '</div>';
  echo '<br>';
}

?>
