<?php

//database settings

$servername = "localhost";
$username = "root";
$password = "root";

try {
    $conn = new PDO("mysql:host=$servername;dbname=Survey_Poll", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

    //$conn_vote = $query = $conn->query($hostname_conn_vote, $username_conn_vote, $password_conn_vote) or trigger_error(mysql_error(),E_USER_ERROR);
    //$conn_vote = $query = $conn->query($hostname_conn_vote, $username_conn_vote, $password_conn_vote) or die('Can\'t create connection: '.mysql_error());
    //mysql_select_db($database_conn_vote, $conn_vote) or die('Can\'t access specified db: '.mysql_error());
?>
