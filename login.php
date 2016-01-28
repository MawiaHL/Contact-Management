<?php
$id = $_GET['id'];
$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'].'/';
$filename = $DOCUMENT_ROOT.'data/'.'guestbook.txt';

$person = file($filename);


?>
<span style="text-align:left; margin:0px 0px;"><img src="../img/ok.png" width="23">
<strong>&nbsp;Personal Info</strong>
<button onclick="kharna();" style="float:right; background-color:red;"><strong>X</strong></button></span>
<br><br>
<div style="margin:0px 0px; padding:0px 0px;">
	<table align="center" class="nostyle">
		<tr>

		<?php 
		$line =  $person[$id]; 

		list($lastname, $firstname, $contactchoice, $phoneormemail, $city, $contact_date, $comments) = explode('|', $line);
		echo "<td>Hming</td>";
		echo "<td>:&nbsp;&nbsp;".$firstname ."&nbsp;".$lastname."</td>";
		
		?>
	</tr>
	<tr>
		<?php
			echo "<td>Contact</td>";
			echo "<td>:&nbsp;&nbsp;".$phoneormemail."</td>";
		?>

	</tr>
	<tr>
		<?php
			echo "<td>City</td>";
			echo "<td>:&nbsp;&nbsp;".$city."</td>";
		?>

	</tr>
	</table>
</div>
<p></p>
