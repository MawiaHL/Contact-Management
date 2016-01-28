<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>About Contact Management</title>
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<div class="wrapper">
		<?php include "header.tmp.php"; ?>
			<ul id="nav">
				<li><a href="../model/add_member.php">Add Contact</a></li>
				<li><a href="/../index.php">View Contact</a></li>
				<li><a href="../logout.php">Logout</a></li>
			</ul>
			<div class="content">
			<h3>About this Contact Book</h3>
				<p>This contact book is meant to be for educational purpose only and must be not used or hosted in any online sites.</p>
				<dl align="center">
					<dt>Technology Used:</dt>
					<dd>PHP, CSS, HTML, JS, Flatfile DB</dd>
					<dt>Developed By</dt>
					<dd>Mawia HL, Armed Veng</dd>
				</dl>
			</div>
			<?php include "footer.tmp.php"; ?>
	</div>
	
</body>
</html>
