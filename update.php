<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

if (!isset($_GET['id'])) {
  echo 'Error: ID not set!';
  exit;
}

if (!isset($_GET['question'])) {
  echo 'Error: Question not set!';
  exit;
}

$questionId = $_GET['id'];
$questionText = $_GET['question'];

require('config.php');

$query = $conn->prepare("UPDATE questions SET question=? WHERE id=?");
$query->bindParam('1', $questionText);
$query->bindParam('2', $questionId);
$query->execute();

header('Location: admin.php');

?>
