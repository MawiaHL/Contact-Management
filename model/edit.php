<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Contact</title>
	<link rel="stylesheet" href="../css/style.css">
	<link href="../img/favicon.ico" rel="icon" type="image/gif"/>
</head>
<body>
	<div class="wrapper">	
			<?php include "../view/header.tmp.php";
			$edit = @$_GET['line'];
			$hming = $_GET['name'];
			 ?>
			<ul id="nav">
				<li><a href="../index.php">View Contact</a></li>
				<li><a href="../logout.php">Logout</a></li>
			</ul>
<form method="post" action="../controller/edit.php">
	<h4>Edit <?php echo ucfirst($hming); ?> as neccessary:</h4>
	<?php 
		
		$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'].'/';
		$filename = $DOCUMENT_ROOT.'data/'.'guestbook.txt';
		$textFile = file($filename);
		if (file_exists($filename))
		{
			$fhander = fopen($filename, 'r');   //opens the file for reading
			$linesh = count($textFile);
			if($edit != "" && $edit >! $linesh || $edit === '0') {
				for($a=0; $a<$linesh; $a++) {	

		list($lastname, $firstname, $contactchoice, $phoneormemail, $city, $contact_date, $comments) = explode('|', $textFile[$edit]);
	?>
		<ul>
			<li><label for="fname">First Name:&nbsp;
			<input type="text" autocomplete="off" name="firstname" value="<?php echo $firstname; ?>" required></li>
			<li><label for="lname">Last Name:&nbsp;
			<input type="text" name="lastname" value="<?php echo $lastname; ?>" required></li>
			<li>
				<label for="contact">Choose Contact Type:<br>
				<?php if($contactchoice=="Phone"){ ?>
				<input type="radio" name="contact" value="Phone" checked="checked">Phone
				<input type="radio" name="contact" value="Email" />Email<br>
				<?php } else{ ?>
				<input type="radio" name="contact" value="Phone" >Phone
				<input type="radio" name="contact" value="Email" checked="checked" />Email<br>
				<?php } ?>
				Phone or Mail: <input type="text" value="<?php echo $phoneormemail; ?>" name="phoneormemail">
			</li>
			<li>City:
				<select name="city" required>
					<option value="<?php echo $city; ?>" selected="selected"><?php echo $city; ?></option>
				<?php
					$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'].'/';
					$filename = $DOCUMENT_ROOT.'data/'.'cities.txt';
					$lines_in_file = count(file($filename));
					//print "<br>lines: ".$lines_in_file;
					$fp = fopen($filename, 'r');   //opens the file for reading
					for ($ii = 1; $ii <= $lines_in_file; $ii++)
					{
						$line = fgets($fp);
						$file_city = trim($line);
						print '<option value="'.$file_city.'">'.$file_city.'</option>';
					}
					fclose($fp);
				?>
				</select>
			</li>
			<li>Comments:<br /><textarea name="comments" cols="25" rows="3"><?php echo $comments; ?></textarea></li>
			<li><input type="hidden" value="<?php echo $edit; ?>" name="edit"><input type="submit" value="Submit" /></li>
			</ul>
		</form>
		<?php break; } } }
	include "../view/footer.tmp.php"; ?>
	</div>
	
</body>
</html>
