<?php

	echo 'test1';
	try {
		$query = $conn->query("SELECT * FROM `poll` ORDER BY `id` DESC LIMIT 1");
	} catch(Exception $e) {
		echo 'Exception thrown';
		echo $e;
	}

	$rows = $query->fetchAll();

	echo count($rows);

	if(count($rows > 0)) {
		$poll = $rows[0];
		$title = $poll['name'];
	} else {
		$title = 'No Poll Yet';
	}

	$query = $conn->query("SELECT * FROM `responses`");

	$arr = $query->fetchAll();

	$me = count($arr);

	$query = $conn->query("SELECT pid FROM questions WHERE pid='".$poll['id']."'");
	$questioncount = count($query->fetchAll());

	echo 'count: ' . $questioncount;

	if($questioncount > 0){
	$query = $conn->query("SELECT `questions`.`pid` FROM  `responses`, `questions` WHERE `responses`.`qid`=`questions`.`id` AND pid='".$poll['id']."'");
	$total = count($query->fetchAll());
?>

<table width="300" cellpadding="0" cellspacing="0" border="0" class="maintable" align="center">
	<tr>
		<td valign="top" align="center" class="title"><?php echo $title; ?></td>
	</tr>
	<?php
		$query = $conn->query("SELECT * FROM `questions` WHERE `pid`='".$poll['id']."' ORDER BY `question`");
		$questions = $query->fetchAll();
		if(count($questions) > 0){
	?>
	<tr>
		<td valign="top" style="padding: 5px;">
		<table width="100%" cellpadding="0" cellspacing="0" border="0" class="question">
			<tr>
				<td valign="top">
					<form action="submit.php">
			<?php
				foreach($questions as $question){
					$responses = $conn->query("SELECT count(id) as total FROM `responses` WHERE qid='".$question['id']."'");
					$responses = $responses->fetchAll();

					$numselectquery = $conn->query("SELECT * FROM responses WHERE qid='" . $question['id'] . "' LIMIT 1");
					$numselectres = $numselectquery->fetchAll();

					/*foreach($numselectres as $val) {
						$max = $val;
						echo 'test123';
					}

					$max = $max['num_sel'];

					if($total > 0 && count($responses) > 0){
						$percentage = round((count($responses) / $max) * 100);
					} else {
						$percentage = 0;
					}

					$percentage2 = 100 - $percentage;*/
			?>

							<?php echo $question['question']; ?>
							<input type="text" name="question_<?php echo $question['id']; ?>">
							<br>


			<?php
			}
			?>
						<br>
						<input type="submit" value="Submit">
					</form>
				</td>
			</tr>
			<tr>
				<td valign="top" colspan="3" align="center" style="padding: 10px 0px 0px 0px;">Total Votes: <?php echo ($total / count($questions)); ?></td>
			</tr>
		</table>
		</td>
	</tr>
	<?php
		}
	?>
</table>
<?php
	} else {
?>
<table width="300" cellpadding="0" cellspacing="0" border="0" class="maintable" align="center">
	<tr>
		<td valign="top" align="center" class="title"><?php echo $title; ?></td>
	</tr>
	<?php
		$query = $conn->query("SELECT * FROM `questions` WHERE `pid`='".$poll['id']."' ORDER BY `question`");
		$questions = $query->fetchAll();
		if(count($questions) > 0){
	?>
	<tr>
		<td valign="top" style="padding: 5px;">
		<form name="poll" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<table width="100%" cellpadding="0" cellspacing="0" border="0" class="question">
		<?php
			if(isset($error)){
		?>
			<tr>
				<td valign="top" colspan="2" align="center" style="padding: 0px 0px 10px 0px;"><?php echo $error; ?></td>
			</tr>
		<?php
			}
		?>
			<?php
				foreach($query as $question){
			?>
				<tr>
					<td valign="top" style="padding: 0px 10px 0px 0px;"><input type="radio" name="questions" value="<?php echo $question['id']; ?>" /></td>
					<td valign="top" width="100%"><?php echo $question['question']; ?></td>
				</tr>
			<?php
			}
			?>
			<tr>
				<td valign="top" colspan="2" align="center" style="padding: 10px 0px 0px 0px;"><input type="submit" name="vote" value="Submit Vote" /><br /><a href="http://www.codelouisville.org/">http://www.codelouisville.org/</a></td>
			</tr>
		</table>
		</form>
		</td>
	</tr>
	<?php
		}
	?>
</table>
<?php
	}
?>
<table width="300" cellpadding="0" cellspacing="0" border="0" align="center">
	<tr>
		<td valign="top" align="right"><a href="http://www.codelouisville.org/">http://www.codelouisville.org/</a></td>
	</tr>
</table>
