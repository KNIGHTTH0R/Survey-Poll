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
  echo '  <a href="delete.php?id=' . $val['id'] . '">X</a>';
	echo '<br><br>';
  echo '<form action="update.php"><input type="text" name="question"><input type="hidden" name="id" value="' .$val['id'] . '"><input type="submit" value="Update"></form>';
  echo '</div>';
  echo '<br>';
}

echo '<h2>Create new question</h2>';
echo '<form action="create.php"><input type="text" name="question"><input type="submit" value="Create"></form>';

echo '<h2>Reset survey</h2>';
echo 'Warning: this will delete all answer data!';
echo '<form action="reset.php"><input type="submit" value="Reset"></form>';

?>
