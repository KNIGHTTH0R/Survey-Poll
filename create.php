<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

if (!isset($_GET['question'])) {
  echo 'Error: Question not set!';
  exit;
}

$questionText = $_GET['question'];

require('config.php');

$query = $conn->prepare("INSERT INTO questions (question, pid) VALUES (?, 0)");
$query->bindParam('1', $questionText);
$query->execute();

header('Location: admin.php');

?>
