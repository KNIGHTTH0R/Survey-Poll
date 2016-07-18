<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require('config.php');

$query = $conn->prepare("DELETE FROM responses");
$query->execute();

echo 'Survey answers have been reset.';

?>
