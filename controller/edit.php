<?php
//***************************************
// Gather Data from Form
//***************************************
session_start();
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$contactchoice = $_POST['contact'];
$phoneormemail = $_POST['phoneormemail'];
$city = $_POST['city'];
$comments = $_POST['comments'];
$cont_date = date('Y-m-d');

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
//Delete the previous one
$edit = @$_POST['edit'];
$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'].'/';
$file = $DOCUMENT_ROOT.'data/'.'guestbook.txt';
$textFile = file($file);
$lines = count($textFile);
if($edit != "" && $edit >! $lines || $edit === '0') {
    $textFile[$edit] = "";
    $fileUpdate = fopen($file, "wb");
    for($a=0; $a<$lines; $a++) {
           fwrite($fileUpdate, $textFile[$a]);
    }
    fclose($fileUpdate);
    
 }else{
	$status= "Failed";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Adding Contact</title>
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<div class="wrapper">

	<ul id="nav">
				<li><a href="../index.php">View Contact Book</a></li>
				<li><a href="../logout.php">Logout</a></li>
	</ul>
	<?php
					if($status){ ?>
					<span style="color:white; text-align:center; background-color:red; padding:5px 5px;"><?php echo $status; ?></span>
					<?php } ?>
	<?php  
		print "<p>Thank You!  A representative will contact you soon</p>";
		print "<p>Information Submitted for: $fullname </p>";
		print "<p>Your $contactchoice is $phoneormemail <br />";
		print "and you are interested in living in $city </p>";
		print "<p>Our representive will review your comments below:</p>";
		print "<textarea cols='25' rows='5' disabled='disabled'>";
		print $comments;
		print "</textarea>";
	?>
	
	</div>
</body>
</html>
