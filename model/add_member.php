<?php 
session_start();
if(!($_SESSION['username'])){
	header("location: ../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add Contact</title>
	<link rel="stylesheet" href="../css/style.css">
	<link href="../img/favicon.ico" rel="icon" type="image/gif"/>
</head>
	<body>
		<div class="wrapper">	
			<?php include "../view/header.tmp.php"; ?>
			<ul id="nav">
				<li><a href="../index.php">View Contact</a></li>
				<li><a href="../logout.php">Logout</a></li>
			</ul>
<form method="post" action="../controller/add_member.php">
	<h4>Please Add new contact to contact list management</h4>
		<ul>
			<li><label for="fname">First Name:&nbsp;<input type="text" autocomplete="off" name="firstname" tabindex="1" required></li>
			<li><label for="lname">Last Name:&nbsp;<input type="text" name="lastname" required tabindex="2"></li>
			<li>
				<label for="contact">Choose Contact Type:<br>
				<input type="radio" name="contact" value="Phone" checked="checked" tabindex="3">Phone
				<input type="radio" name="contact" value="Email" tabindex="4" />Email<br>
				Phone or Mail: <input type="text" name="phoneormemail" tabindex="5">
			</li>
			<li>City:
				<select name="city" required tabindex="6">
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
			<li>Comments:<br /><textarea name="comments" cols="25" rows="3" tabindex="7"></textarea></li>
			<li><input type="submit" value="Submit" /></li>
			</ul>
		</form>
		<?php include "../view/footer.tmp.php"; ?>
	</div>
</body>
</html>
