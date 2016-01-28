<?php
//***************************************
// Gather Data from Form
//***************************************
session_start();
$firstname = htmlspecialchars($_POST['firstname']);
$lastname = htmlspecialchars($_POST['lastname']);
$contactchoice = htmlspecialchars($_POST['contact']);
$phoneormemail = htmlspecialchars($_POST['phoneormemail']);
$city = htmlspecialchars($_POST['city']);
$comments = htmlspecialchars($_POST['comments']);
$cont_date = date('Y-m-d');

$delete = $firstname.'|'.$lastname.'|'.$contactchoice.'|'.$phoneormemail.'|'.$city.'|'.$cont_date.'|'.$comments;
$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'].'/';
$file = $DOCUMENT_ROOT.'data/'.'guestbook.txt';
$data = file($file);
// print_r($data);
// exit;
$out = array();
foreach($data as $line):
	if(trim($line)==$delete){
		echo "Already Added";
		exit;
	}
endforeach;

//***************************************
//Add Contact Information to File
//***************************************

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'].'/';
$filename = $DOCUMENT_ROOT.'data/'.'guestbook.txt';
$fp = fopen($filename, 'a');   //opens the file for appending
$contact_date = date('Y-m-d');
$output_line = $lastname.'|'.$firstname.'|'.$contactchoice.'|'.$phoneormemail.'|'.$city.'|'.$contact_date.'|'.$comments.'|'."\n";
fwrite($fp, $output_line);
fclose($fp );   
$fullname = $firstname.' '.$lastname;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Adding Member</title>
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<div class="wrapper">
	<ul id="nav">
				<li><a href="../index.php">View Contact</a></li>
				<li><a href="../logout.php">Logout</a></li>
	</ul>
	<?php  
		print "<p>Thank You! </p>";
		print "<p>Information Submitted for: $fullname </p>";
		print "<p>Your $contactchoice is $phoneormemail <br />";
		print "and you are interested in living in $city </p>";
		print "<p>Review your comments below:</p>";
		print "<textarea cols='25' rows='5' disabled='disabled'>";
		print $comments;
		print "</textarea>";
	?>
	
	</div>
</body>
</html>
