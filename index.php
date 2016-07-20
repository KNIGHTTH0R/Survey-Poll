<link rel="stylesheet" href="./css/style.css" type="text/css" media="screen" />
<?php
	ini_set('display_errors', '1');
	require('config.php');

	if(isset($_POST['vote']) && isset($_POST['questions'])){
		$query = mysql_query("SELECT `questions`.`pid` FROM  `responses`, `questions` WHERE `responses`.`qid`=`questions`.`id` AND `responses`.`ip`='".$_SERVER['REMOTE_ADDR']."' AND pid=(SELECT pid FROM `questions` WHERE id='".$_POST['questions']."' LIMIT 1)");
		if(mysql_num_rows($query) == 0){
			$query = mysql_query("INSERT INTO `responses` (`qid`, `ip`) VALUES ('".$_POST['questions']."', '".$_SERVER['REMOTE_ADDR']."')");
		} else {
			$error = 'You Already Voted';
		}
	} else if(!isset($_POST['questions']) && isset($_POST['vote'])){
		$error = 'You Need To Select a Question';
	}

	include('poll.php');

// Create a new image instance
//$im = imagecreatetruecolor(100, 100);

// Make the background white
//imagefilledrectangle($im, 0, 0, 99, 99, 0x9966ff);

// Draw a text string on the image
//imagestring($im, 3, 40, 20, 'GD Library', 0x6600cc);

// Output the image to browser
//header('Content-Type: http://giphy.com/gifs/XtkuVAmGUXqfe/html5');

//imagegif($im);
//imagedestroy($im);
?>
