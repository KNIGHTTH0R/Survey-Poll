<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

if (!isset($_GET['id'])) {
  echo 'Error: ID not set!';
  exit;
}

$questionId = $_GET['id'];

require('config.php');

$query = $conn->prepare("DELETE FROM questions WHERE id=?");
$query->bindParam('1', $questionId);
$query->execute();

header('Location: admin.php');

?>
